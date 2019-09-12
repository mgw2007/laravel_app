<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Equipment extends Model implements Auditable, SubmissonInterface
{
    use \OwenIt\Auditing\Auditable;
    use SubmissionTriat;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'named_insured', 'mailing_street', 'mailing_city', 'mailing_state', 'mailing_zip', 'ineligible_operations', 'ineligible_equipment',
        'contractor_type', 'contractor_description', 'yard_address', 'yard_fence', 'lease_rent_loan_others',
        'business_3_years', 'equipment_serviced', 'employees_trained', 'transport_checks',
        'lease_rent_loan_average_year', 'loss_paid_year3', 'loss_count_year3', 'loss_paid_year2', 'loss_count_year2', 'loss_paid_year1',
        'loss_count_year1', 'scheduled_tiv', 'leased_rental_limit', 'unscheduled_limit', 'scheduled_rate_expiring', 'unscheduled_rate_expiring',
        'scheduled_rate_target', 'unscheduled_rate_target', 'email'
    ];
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'creating' => \App\Events\Equipment\Creating::class,
        'created' => \App\Events\Equipment\Created::class,
    ];

    function getDisplayId(): string
    {
        return $this->display_id;
    }
    function getUser(): User
    {
        return $this->user;
    }
    function getSubmissionType(): string
    {
        return 'Equipment';
    }
    function getFilesDirName(): string
    {
        return 'Equipment';
    }

    public function getRouteKeyName(): string
    {
        return 'display_id';
    }


    public function files()
    {
        return $this->hasMany(EquipmentFile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function addFile(array $data)
    {
        return $this->files()->create($data);
    }
}
