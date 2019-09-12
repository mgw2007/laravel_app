<?php

namespace App\Events\Vehicle;

use App\Events\Event;
use App\Vehicle;

class Saved extends Event
{
    public $vehicle;

    /**
     * Create a new event instance.
     *
     * @param  Vehicle $vehicle
     * @return void
     */
    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }
}
