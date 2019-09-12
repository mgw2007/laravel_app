<?php

namespace App\Events\User;

use App\Events\Event;
use App\User;

class UserRegistered extends Event
{
    /** @var User */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
