<?php

namespace App\Mail;

use App\SubmissonInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class NewSubmissionCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @* @param SubmissonInterface
     */
    public $submisson;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SubmissonInterface $submisson)
    {
        $this->submisson = $submisson;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("New Submission: {$this->submisson->getSubmissionType()} #{$this->submisson->getDisplayId()}")
            ->markdown('emails.newSubmissionCreated');
    }
}
