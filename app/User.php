<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\TransportationSubmission;
use Spatie\Permission\Traits\HasRoles;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    use HasRoles;

    const PERMISSION_ApproveBind = 'approve-bind';
    const PERMISSION_ViewAllSubmissions = 'view_all_submissions';
    const PERMISSION_DeleteSubmissionFiles = 'delete_submission_files';
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => \App\Events\User\UserRegistered::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transportationSubmissions()
    {
        return $this->hasMany(TransportationSubmission::class);
    }

    public function addTransportationSubmission($data)
    {
        $this->transportationSubmissions()->create($data);
    }

    public function buildersRisks()
    {
        return $this->hasMany(BuildersRisk::class);
    }

    public function addBuildersRisk($data)
    {
        $this->buildersRisks()->create($data);
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function addEquipment($data)
    {
        $this->equipments()->create($data);
    }
    public function canApproveBind()
    {
        return $this->hasPermissionTo(self::PERMISSION_ApproveBind);
    }
    public function canViewAllSubmissions()
    {
        return $this->hasPermissionTo(self::PERMISSION_ViewAllSubmissions);
    }
    public function canDeleteSubmissionFiles(SubmissonInterface $submisson)
    {
        return $this->hasPermissionTo(self::PERMISSION_ViewAllSubmissions) || $this->id == $submisson->getUser()->id;
    }
}
