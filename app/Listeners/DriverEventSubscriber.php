<?php

namespace App\Listeners;

use App\Events\Driver\Created;
use App\Driver;
use App\Library\Services\Checkr\DriverCheckrInterface;

class DriverEventSubscriber
{
    private $driverCheckr;
    public function __construct(DriverCheckrInterface $driverCheckr)
    {
        $this->driverCheckr = $driverCheckr;
    }

    /**
     * Handle user register events.
     */
    public function createCheckrCandidate(Created $event)
    {
        $this->driverCheckr->applyDriverCheker($event->driver);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            Created::class,
            self::class . '@createCheckrCandidate'
        );
    }
}
