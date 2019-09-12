<?php

namespace App\Events\Trailer;

use App\Events\Event;
use App\Trailer;

class Saved extends Event
{
    /**
     * @var Trailer
     */
    public $trailer;

    /**
     * Create a new event instance.
     *
     * @param  Trailer $trailer
     * @return void
     */
    public function __construct(Trailer $trailer)
    {
        $this->trailer = $trailer;
    }
}
