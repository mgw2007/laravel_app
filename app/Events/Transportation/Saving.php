<?php

namespace App\Events\Transportation;

use App\Events\Event;
use App\TransportationSubmission;

class Saving extends Event
{
    public $transportationSubmission;

    /**
     * Create a new event instance.
     *
     * @param  TransportationSubmission $transportationSubmission
     * @return void
     */
    public function __construct(TransportationSubmission $transportationSubmission)
    {
        $this->transportationSubmission = $transportationSubmission;
    }
}
