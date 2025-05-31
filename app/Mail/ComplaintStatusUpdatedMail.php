<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Complaint;

class ComplaintStatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;

    public function __construct(Complaint $complaint)
    {
        $this->complaint = $complaint;
    }

    public function build()
    {
        return $this->subject('Complaint Status Updated')
                    ->view('emails.complaint_status_updated')
                    ->with([
                        'title' => $this->complaint->title,
                        'status' => $this->complaint->status,
                        'description' => $this->complaint->description,
                        'category' => $this->complaint->category,
                        'complain_by' => $this->complaint->complain_by

                    ]);
    }
}
