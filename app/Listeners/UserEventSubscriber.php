<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Events\User\UserRegistered;
use App\Mail\RegisteredUserEmail;
use PHPUnit\Runner\Exception;

class UserEventSubscriber
{
    /**
     * Handle user register events.
     */
    public function onUserRegister(UserRegistered $event)
    {
        $user = $event->user;
        if (!$user->password) {

            try {
                Password::broker()->sendResetLink(['email' => $user->email]);
            } catch (\Exception $e) {
                if (\App::environment('local', 'staging')) {
                    throw $e;
                }
            }
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            UserRegistered::class,
            'App\Listeners\UserEventSubscriber@onUserRegister'
        );
    }
}
