<?php

namespace App\Listeners;

use App\Events\Vehicle\Saved;

class VehicleEventSubscriber
{
    /**
     * Handle user register events.
     */
    public function updateVehicleTransportationTotalValue(Saved $event)
    {
        $transportationSubmission = $event->vehicle->transportationSubmission;
        $transportationSubmission->calculateTotalValue();
        $transportationSubmission->save();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            Saved::class,
            self::class . '@updateVehicleTransportationTotalValue'
        );
    }
}
