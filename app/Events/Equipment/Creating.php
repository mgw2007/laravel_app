<?php

namespace App\Events\Equipment;

use App\Equipment;
use App\Events\Event;

class Creating extends Event
{
    /**
     * @var Equipment
     */
    public $equipment;

    /**
     * Create a new event instance.
     *
     * @param  Equipment $equipment
     * @return void
     */
    public function __construct(Equipment $equipment)
    {
        $this->equipment = $equipment;
    }
}
