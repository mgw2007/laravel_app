<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class FmcsaCrash extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fmcsa_crash';

    protected $guarded = [
        'id'
    ];
    /**
     * @param dot number string
     * @return  int
     */
    public static function countFmcsaCrashByDotNumber($key)
    {
        $data = [];
        $cacheKey = 'CountFmcsaCrashDotNumbers_' . $key;
        if (Cache::has($cacheKey) && Cache::get($cacheKey)) {
            $data = Cache::get($cacheKey);
        } else {
            //use (int) becuase dot_number in db has type int
            $fmcsaCrash = static::where('dot_number', (int) $key)->count();
            Cache::put($cacheKey, $fmcsaCrash, now()->addMinutes(60)); //just cache for 60 min
            $data = $fmcsaCrash;
        }
        return $data;
    }

    public static function getVinCounts($vehicle_id_number)
    {
        return self::where('vehicle_id_number', $vehicle_id_number)->count();
    }
    public static function getAllByVin($vehicle_id_number)
    {
        return self::where('vehicle_id_number', $vehicle_id_number)->get();
    }
}
