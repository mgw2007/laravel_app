<?php

namespace App\Listeners;

use App\Events\BuildersRisk\Creating;
use App\Events\BuildersRisk\Created;
use App\Mail\NewSubmissionCreatedEmail;
use App\User;

class BuildersRiskSubscriber
{
    /**
     * Handle user register events.
     */
    public function onCreate(Creating $event)
    {
        $buildersRisk = $event->buildersRisk;
        $buildersRisk->display_id = date("y") . sprintf('%05d', rand(0, 99999));
    }

    /**
     * Handle user register events.
     */
    public function onCreated(Created $event)
    {
        $buildersRisk = $event->buildersRisk;
        if (!$buildersRisk->user_id) {
            $user =  User::where('email', $buildersRisk->email)->first();
            if (!$user) {
                //create User
                $user = User::create([
                    'name' => explode('@', $buildersRisk->email)[0],
                    'email' => $buildersRisk->email,
                ]);
            }
            $user->buildersRisks()->save($buildersRisk);
        }
        \Mail::to(env('NEW_SUBMISSION_CREATED_EMAIL_RECEIVER'))->send(
            new NewSubmissionCreatedEmail($buildersRisk)
        );
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            Creating::class,
            'App\Listeners\BuildersRiskSubscriber@onCreate'
        );
        $events->listen(
            Created::class,
            'App\Listeners\BuildersRiskSubscriber@onCreated'
        );
    }
}
