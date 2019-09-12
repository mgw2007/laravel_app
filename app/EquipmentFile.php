<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentFile extends Model implements SubmissonFileInterface
{
    use SubmissionFileTriat;

    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'token', 'equipment_id'
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
    public function getSubmission(): SubmissonInterface
    {
        return $this->equipment;
    }
}
