<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class FmcsaCensus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fmcsa_census';

    /**
     * @param dot number string
     * @return  FmcsaCensus
     */
    public static function findFmcsaCensusByDotNumber($key)
    {
        $data = [];
        $cacheKey = 'FmcsaCensusDotNumbers_' . $key;
        if (Cache::has($cacheKey) && Cache::get($cacheKey)) {
            $data = Cache::get($cacheKey);
        } else {
            //use (int) becuase dot_number in db has type int
            $fmcsaCensus = static::where('dot_number', (int) $key)->first();
            Cache::put($cacheKey, $fmcsaCensus, now()->addMinutes(60)); //just cache for 60 min
            $data = $fmcsaCensus;
        }
        return $data;
    }
}
