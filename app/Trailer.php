<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Trailer extends Model implements Auditable
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
        'saved' => \App\Events\Trailer\Saved::class,
    ];


    public function transportationSubmission()
    {
        return $this->belongsTo(TransportationSubmission::class);
    }

    public function getFmcsaCrashsCounts()
    {
        return FmcsaCrash::getVinCounts($this->vehicle_id_number);
    }

    public function getFmcsaCrashs()
    {
        return FmcsaCrash::getAllByVin($this->vehicle_id_number);
    }
}
