<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @var BuildersRisk buildersRisk
 */
class BuildersRiskFile extends Model implements SubmissonFileInterface
{
    use SubmissionFileTriat;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'token', 'builders_risk_id'
    ];

    public function buildersRisk()
    {
        return $this->belongsTo(BuildersRisk::class, 'builders_risk_id');
    }
    public function getSubmission(): SubmissonInterface
    {
        return $this->buildersRisk;
    }
}
