<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class BuildersRisk extends Model implements Auditable, SubmissonInterface
{
    use \OwenIt\Auditing\Auditable;
    use SubmissionTriat;

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'creating' => \App\Events\BuildersRisk\Creating::class,
        'created' => \App\Events\BuildersRisk\Created::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "named_insured", "mailing_address", "mailing_city", "mailing_state", "mailing_zip", "project_name", "project_start_date",
        "project_end_date", "jobsite_address", "jobsite_city", "jobsite_state", "jobsite_zip", "number_of_buildings",
        "construction_type", "percent_of_structural_elements_that_are_wood_frame", "sq_ft", "stores_above_ground", "jobsite_within_50_ft_of_water",
        "project_description", "intended_occupancy", "grond_up_construction_or_renovation", "public_protection_class", "list_site_security_and_theft_controls",
        "list_any_unique_architecture_or_engineering_features", "contractor_ame", "contractor_experience_with_similar_projects", "list_loss_payee_or_mortgagees",
        "total_hard_cost_physical_damage_limit", "new_construction_value", "renovation_value", "existing_building_shell_structure", "total_soft_cost",
        "total_loss_of_revenue_or_rents", "flood_limit", "earthquake_limit", "email",
    ];

    static $constructionTypes = [
        'frame' => 'Frame',
        'joisted_masonry' => 'Joisted Masonry',
        'non_combustible' => 'Non-Combustible',
        'masonry' => 'Masonry Non-Combustible',
        'fire_resistive' => 'Fire Resistive',
        'modified_fire_resistive' => 'Modified Fire Resistive'
    ];
    function getSubmissionType(): string
    {
        return 'Builders Risk';
    }
    function getFilesDirName(): string
    {
        return 'BuildersRisk';
    }
    //
    public function getRouteKeyName(): string
    {
        return 'display_id';
    }
    public function files()
    {
        return $this->hasMany(BuildersRiskFile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nbrPowerUnit()
    {
        $data = FmcsaCensus::findFmcsaCensusByDotNumber($this->dot_number);
        if ($data) {
            return $data->nbr_power_unit;
        }
    }

    public function driversTotal()
    {
        $data = FmcsaCensus::findFmcsaCensusByDotNumber($this->dot_number);
        if ($data) {
            return $data->driver_total;
        }
    }

    public function legalName()
    {
        $data = FmcsaCensus::findFmcsaCensusByDotNumber($this->dot_number);
        if ($data) {
            return $data->legal_name;
        }
    }

    public function phyStreet()
    {
        $data = FmcsaCensus::findFmcsaCensusByDotNumber($this->dot_number);
        if ($data) {
            return $data->phy_street;
        }
    }

    public function phyCity()
    {
        $data = FmcsaCensus::findFmcsaCensusByDotNumber($this->dot_number);
        if ($data) {
            return $data->phy_city;
        }
    }

    public function phyState()
    {
        $data = FmcsaCensus::findFmcsaCensusByDotNumber($this->dot_number);
        if ($data) {
            return $data->phy_state;
        }
    }
    public function addFile(array $data)
    {
        return $this->files()->create($data);
    }
}
