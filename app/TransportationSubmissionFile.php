<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @var TransportationSubmission transportationSubmission
 */
class TransportationSubmissionFile extends Model implements SubmissonFileInterface
{
    use SubmissionFileTriat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'token', 'transportation_submission_id'
    ];

    public function transportationSubmission()
    {
        return $this->belongsTo(TransportationSubmission::class, 'transportation_submission_id');
    }
    public function getSubmission(): SubmissonInterface
    {
        return $this->transportationSubmission;
    }
}
