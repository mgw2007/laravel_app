<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Driver extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $guarded = [
        'id'
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'creating' => \App\Events\Driver\Created::class,
    ];


    public function TransportationSubmission()
    {
        return $this->belongsTo(TransportationSubmission::class);
    }
}
