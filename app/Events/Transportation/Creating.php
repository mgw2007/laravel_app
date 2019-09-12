<?php

namespace App\Events\Transportation;

use App\TransportationSubmission;
use App\Events\Event;

class Creating extends Event
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
