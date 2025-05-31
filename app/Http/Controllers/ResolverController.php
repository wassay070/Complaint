<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;
use App\Mail\ComplaintStatusUpdatedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ResolverController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $complaints = Complaint::where('assign_to', $user->id)->latest()->get();

        // Complaint statistics
        $totalComplaints = $complaints->count();
        $resolvedComplaints = $complaints->where('status', 'resolved')->count();
        $closedComplaints = $complaints->where('status', 'closed')->count();
        $pendingComplaints = $complaints->where('status', 'pending')->count();

        return view('resolver.dashboard', compact('complaints', 'totalComplaints', 'resolvedComplaints', 'closedComplaints', 'pendingComplaints'));
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status' => 'required|in:pending,resolved,closed'
        ]);

        $complaint->update(['status' => $request->status]);

        // Get User Email
        $user_email = User::where('id', $complaint->complain_by)->value('email');

        // Send Email Notification
        Mail::to($user_email)->send(new ComplaintStatusUpdatedMail($complaint));

        return redirect()->back()->with('success', 'Complaint status updated successfully.');
    }
}
