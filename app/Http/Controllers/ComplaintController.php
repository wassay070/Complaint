<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;
use App\Mail\ComplaintSubmittedMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResolverAssignedMail;
use App\Models\User;

class ComplaintController extends Controller
{

    public function index()
    {
        return view('user.add_complain');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'urgency' => 'required|string',
            'description' => 'required|string',
        ]);

        $complaint = Complaint::create([
            'title' => $request->title,
            'category' => $request->category,
            'urgency' => $request->urgency,
            'status' => 'pending',
            'description' => $request->description,
            'complain_by' => auth()->user()->id,
        ]);

        Mail::to(auth()->user()->email)->send(new ComplaintSubmittedMail($complaint));

        return redirect()->route('user.show_complain')->with('success', 'Complaint submitted successfully! Email notification sent.');
    }

    public function assignResolver(Request $request)
    {
        $complaint = Complaint::findOrFail($request->complaint_id);
        $resolver = User::findOrFail($request->assigned_to);

        $user_id = $complaint->complain_by;
        $user_email = User::where('id', $user_id)->value('email');
    
        $complaint->assign_to = $request->assigned_to;
        $complaint->save();
    
        Mail::to($user_email)->send(new ResolverAssignedMail($complaint, $resolver));
    
        return response()->json(['success' => 'Resolver assigned successfully!']);
    }


    public function show(Request $request)
    {
        $query = Complaint::where('complain_by', Auth::id());
    
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
    
        if ($request->has('urgency') && $request->urgency != '') {
            $query->where('urgency', $request->urgency);
        }
    
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
    
        $complaints = $query->latest()->get();
    
        return view('user.show_complain', compact('complaints'));
    }
    

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();

        return response()->json(['success' => 'Complaint deleted successfully.']);
    }
    public function edit($id)
    {
        $complaint = Complaint::where('complain_by', auth()->id())->findOrFail($id);
        return view('user.edit', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'urgency' => 'required|string',
            'description' => 'required|string',
        ]);

        $complaint = Complaint::where('complain_by', auth()->id())->findOrFail($id);
        $complaint->update($request->all());

        return redirect()->route('user.show_complain')->with('success', 'Complaint updated successfully.');
    }


}
