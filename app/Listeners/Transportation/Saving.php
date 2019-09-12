<?php

namespace App\Listeners\Transportation;

use App\Events\Transportation\Saving as SavingEvent;
use App\TransportationSubmission;
use App\FmcsaCensus;

class Saving
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Saving  $event
     * @return void
     */
    public function handle(SavingEvent $event)
    {
        /**
         * @var TransportationSubmission $transportationSubmission
         */
        $transportationSubmission = $event->transportationSubmission;
        if ($transportationSubmission->isDirty('dot_number')) {
            // save values from fmcsa_census
            $fmcsaCensus = FmcsaCensus::findFmcsaCensusByDotNumber($transportationSubmission->dot_number);
            if ($fmcsaCensus) {

                $transportationSubmission->updateFmcsaCensus($fmcsaCensus);
            }
        }
        $transportationSubmission->calculatePolicyCost();
    }
}
