<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;




class AdminController extends Controller
{
    public function index()
    {
        $complaintsToday = Complaint::whereDate('created_at', Carbon::today())->count();
        $complaintsThisWeek = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $complaintsThisMonth = Complaint::whereMonth('created_at', Carbon::now()->month)->count();

        $academicComplaints = Complaint::where('category', 'Academic')->count();
        $facilitiesComplaints = Complaint::where('category', 'Facilities')->count();
        $administrationComplaints = Complaint::where('category', 'Administration')->count();

        $lowUrgencyComplaints = Complaint::where('urgency', 'Low')->count();
        $mediumUrgencyComplaints = Complaint::where('urgency', 'Medium')->count();
        $highUrgencyComplaints = Complaint::where('urgency', 'High')->count();
        $criticalUrgencyComplaints = Complaint::where('urgency', 'Critical')->count();

        $pendingComplaints = Complaint::where('status', 'pending')->count();
        $resolvedComplaints = Complaint::where('status', 'resolved')->count();
        $closedComplaints = Complaint::where('status', 'closed')->count();

        return view('admin.dashboard', compact(
            'complaintsToday',
            'complaintsThisWeek',
            'complaintsThisMonth',
            'academicComplaints',
            'facilitiesComplaints',
            'administrationComplaints',
            'lowUrgencyComplaints',
            'mediumUrgencyComplaints',
            'highUrgencyComplaints',
            'criticalUrgencyComplaints',
            'pendingComplaints',
            'resolvedComplaints',
            'closedComplaints'
        ));
    }

    public function show(Request $request)
    {
        $query = Complaint::with('complainant'); // Eager load user details
        
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        if ($request->has('urgency') && $request->urgency != '') {
            $query->where('urgency', $request->urgency);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('email') && $request->email != '') {
            $query->whereHas('complainant', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            });
        }

        if ($request->has('assigned_to') && $request->assigned_to != '') {
            $query->where('assign_to', $request->assigned_to);
        }
        

        if ($request->has('name') && $request->name != '') {
            $query->whereHas('complainant', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        $complaints = $query->latest()->get(); // Fetch results
        $resolvers = User::role('resolver')->get();


        return view('admin.show_complain', compact('complaints', 'resolvers'));
    }

    public function resolvers()
    {
        $resolvers = User::role('resolver')->withCount('assignedComplaints')->get();
        return view('admin.resolvers', compact('resolvers'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone_number' => 'required|string|max:15',
        ]);


        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'plain_password' => $request->password,
            'phone' => $request->phone_number,
            'role' => 'resolver',
        ]);

        $user->assignRole('resolver');

        return redirect()->route('resolvers.index')->with('success', 'Complaint Handler added successfully!');
    }

    public function destroy($id)
    {
        $resolver = User::find($id);

        if (!$resolver) {
            return response()->json(['status' => 'error', 'message' => 'Resolver not found'], 404);
        }

        Complaint::where('assign_to', $id)->update(['assign_to' => null]);

        $resolver->delete();

        return response()->json(['status' => 'success', 'message' => 'Complaint Handler deleted successfully']);
    }

    public function edit_resolver($id)
    {
        $resolver = User::findOrFail($id);
        return view('admin.edit_resolver', compact('resolver'));
    }

    public function update_resolver(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:15',
            'password' => 'nullable|string|min:6',
        ]);

        $resolver = User::findOrFail($id);
        
        $data = $request->only(['name', 'email', 'phone']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password); 
            $data['plain_password'] = $request->password;
        }

        $resolver->update($data);

        return redirect()->route('resolvers.index')->with('success', 'Complaint handler updated successfully.');
    }

    
}
