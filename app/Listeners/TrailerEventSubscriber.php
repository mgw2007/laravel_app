<?php

namespace App\Listeners;

use App\Events\Trailer\Saved;

class TrailerEventSubscriber
{
    /**
     * Handle user register events.
     */
    public function updateVehicleTransportationTotalValue(Saved $event)
    {
        $transportationSubmission = $event->trailer->transportationSubmission;
        $transportationSubmission->calculateTrailerValues();
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
