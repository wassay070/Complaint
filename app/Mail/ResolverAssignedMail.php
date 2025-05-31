<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ResolverAssignedMail extends Mailable 
{
    use Queueable, SerializesModels;

    public $complaint;
    public $resolver;

    public function __construct($complaint, $resolver)
    {
        $this->complaint = $complaint;
        $this->resolver = $resolver;
    }

    public function build()
    {
        return $this->subject('Complaint Assigned to Resolver')
                    ->view('emails.assign_resolver')
                    ->with([
                        'title' => $this->complaint->title,
                        'category' => $this->complaint->category,
                        'urgency' => $this->complaint->urgency,
                        'description' => $this->complaint->description,
                        'resolverName' => $this->resolver->name,
                        'resolverEmail' => $this->resolver->email,
                    ]);
    }
}
