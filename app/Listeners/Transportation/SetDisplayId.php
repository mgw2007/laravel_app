<?php

namespace App\Listeners\Transportation;

use App\Events\Transportation\Creating;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetDisplayId
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
     * @param  Creating  $event
     * @return void
     */
    public function handle(Creating $event)
    {
        $transportationSubmission = $event->transportationSubmission;
        $transportationSubmission->display_id = date("y").sprintf('%05d', rand(0, 99999));
    }
}
