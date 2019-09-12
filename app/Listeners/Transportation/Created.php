<?php

namespace App\Listeners\Transportation;

use App\Events\Transportation\Created as CreatedEvent;
use App\Mail\NewSubmissionCreatedEmail;
use App\User;

class Created
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *  
     * 
     * 
     * @param  Creating  $event
     * @return void
     */
    public function handle(CreatedEvent $event)
    {

        $transportationSubmission = $event->transportationSubmission;
        if (!$transportationSubmission->user_id) {
            $user =  User::where('email', $transportationSubmission->email)->first();
            if (!$user) {
                //create User
                $user = User::create([
                    'name' => explode('@', $transportationSubmission->email)[0],
                    'email' => $transportationSubmission->email,
                ]);
            }
            $user->transportationSubmissions()->save($transportationSubmission);
        }


        \Mail::to(env('NEW_SUBMISSION_CREATED_EMAIL_RECEIVER'))->send(
            new NewSubmissionCreatedEmail($transportationSubmission)
        );
    }
}
