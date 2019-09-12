<?php

namespace App\Events\Driver;

use App\Events\Event;
use App\Driver;

class Created extends Event
{
    /**
     * @var Driver
     */
    public $driver;
    /**
     * Create a new event instance.
     * @param Driver
     * @return void
     */
    public function __construct(Driver $driver)
    {
        $this->driver = $driver;
    }
}
