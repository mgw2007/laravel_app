<?php
namespace App\Library\Services\Checkr;

use Carbon\Carbon;
use App\Driver;

interface DriverCheckrInterface
{
    public function applyDriverCheker(Driver $driver): void;
}
