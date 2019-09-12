<?php

namespace App\Events\BuildersRisk;

use App\BuildersRisk;
use App\Events\Event;

class Created extends Event
{
    /**
     * @var BuildersRisk
     */
    public $buildersRisk;

    /**
     * Create a new event instance.
     *
     * @param  BuildersRisk $buildersRisk
     * @return void
     */
    public function __construct(BuildersRisk $buildersRisk)
    {
        $this->buildersRisk = $buildersRisk;
    }
}
