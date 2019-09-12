<?php

namespace App\Listeners;

use App\Events\Equipment\Creating;
use App\Events\Equipment\Created;
use App\Mail\NewSubmissionCreatedEmail;
use App\User;

class EquipmentSubscriber
{
    /**
     * Handle user register events.
     */
    public function onCreate(Creating $event)
    {
        $equipment = $event->equipment;
        $equipment->display_id = date("y") . sprintf('%05d', rand(0, 99999));
    }

    /**
     * Handle user register events.
     */
    public function onCreated(Created $event)
    {
        $equipment = $event->equipment;
        if (!$equipment->user_id) {
            $user =  User::where('email', $equipment->email)->first();
            if (!$user) {
                //create User
                $user = User::create([
                    'name' => explode('@', $equipment->email)[0],
                    'email' => $equipment->email,
                ]);
            }
            $user->equipments()->save($equipment);
        }
        \Mail::to(env('NEW_SUBMISSION_CREATED_EMAIL_RECEIVER'))->send(
            new NewSubmissionCreatedEmail($equipment)
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
            'App\Listeners\EquipmentSubscriber@onCreate'
        );
        $events->listen(
            Created::class,
            'App\Listeners\EquipmentSubscriber@onCreated'
        );
    }
}
