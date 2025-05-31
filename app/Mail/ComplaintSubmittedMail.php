<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;

    /**
     * Create a new message instance.
     */
    public function __construct($complaint)
    {
        $this->complaint = $complaint;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Complaint Has Been Submitted')
                    ->view('emails.complaint_submitted')
                    ->with([
                        'title' => $this->complaint['title'],
                        'category' => $this->complaint['category'],
                        'urgency' => $this->complaint['urgency'],
                        'description' => $this->complaint['description'],
                    ]);
    }
}
