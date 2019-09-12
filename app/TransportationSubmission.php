<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransportationSubmission extends Model  implements Auditable, SubmissonInterface
{
    use \OwenIt\Auditing\Auditable;
    use SubmissionTriat;

    public static $commodities = [
        'agricultural_equipment' => 'Agricultural Equipment',
        'alcoholic_beverages' => 'Alcoholic beverages (except beer and wine)',
        'appliances' => 'Appliances (except TV and stereos)',
        'automobile_parts_and_accessories' => 'Automobile parts and accessories',
        'beer_and_wine' => 'Beer and wine',
        'beverages' => 'Beverages (nonalcoholic)',
        'building_materials' => 'Building materials',
        'cameras_and_film' => 'Cameras and film',
        'canned_goods' => 'Canned goods',
        'cement_sand_or_gravel' => 'Cement, sand, or gravel',
        'china_and_ceramics' => 'China and ceramics',
        'cigarettes_and_cigars' => 'Cigarettes and cigars',
        'clothing' => 'Clothing',
        'ladies_and_mens_dress_apparel' => 'Ladies and mens dress apparel',
        'computers' => 'Computers',
        'contractors_heavy_equipment' => 'Contractors heavy equipment',
        'cosmetics_and_perfume' => 'Cosmetics and perfume',
        'dangerous_articles_explosives_corrosives_flamma' => 'Dangerous articles, explosives, corrosives, flamma...',
        'dairy_products' => 'Dairy products',
        'drugs' => 'Drugs (except narcotics)',
        'dry_goods' => 'Dry goods',
        'eggs_shell' => 'Eggs (shell)',
        'electrical_supplies_and_fixtures' => 'Electrical supplies and fixtures',
        'farm_products' => 'Farm products',
        'fertilizer' => 'Fertilizer',
        'fine_arts' => 'Fine arts',
        'food_products' => 'Food products',
        'frozen_or_refrigerated' => 'Frozen or refrigerated',
        'meat_or_seafood' => 'Meat or seafood',
        'furniture' => 'Furniture',
        'furs' => 'Furs',
        'general_merchandise' => 'General merchandise',
        'glassware' => 'Glassware',
        'grain_hay_feed' => 'Grain, hay, feed',
        'hardware_and_paint' => 'Hardware and paint',
        'household_effects' => 'Household effects',
        'jewelry' => 'Jewelry',
        'leather_goods' => 'Leather goods (except shoes)',
        'livestock_and_live_poultry' => 'Livestock and live poultry',
        'liquid_haulers' => 'Liquid haulers (bulk nonflammable)',
        'lumber' => 'Lumber',
        'machinery_and_heavy_equipment' => 'Machinery and heavy equipment',
        'specialized_heavy_haulers' => 'Specialized heavy haulers',
        'power_tools' => 'Power tools',
        'metal_and steel' => 'Metal and steel',
        'narcotics' => 'Narcotics',
        'office_equipment' => 'Office equipment',
        'paper_and_paper_products' => 'Paper and paper products',
        'petroleum_products' => 'Petroleum products (over 140 degres flashpoint)',
        'petroleum_products' => 'Petroleum products (under 140 degrees flashpoint)',
        'pipe_cable_and_wire' => 'Pipe, cable, and wire',
        'plumbing_supplies' => 'Plumbing supplies',
        'poultry' => 'Poultry (dressed)',
        'precious_metals' => 'Precious metals',
        'rugs_and_carpets' => 'Rugs and carpets (other than Oriental)',
        'rugs_and_carpets_oriental' => 'Rugs and carpets (Oriental)',
        'shoes' => 'Shoes',
        'sporting_goods_and_toys' => 'Sporting goods and toys',
        'textiles' => 'Textiles',
        'tires_and_tubes' => 'Tires and tubes',
        'tv_radios_and_stereo_equipment' => 'TV, radios, and stereo equipment',
        'video_equipment_and_tapes' => 'Video equipment and tapes',
        'automobiles_or_motorcycles' => 'Automobiles or Motorcycles',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "dot_number", "state", "num_power_units", "value_power_units", "num_trailers", "value_trailers", "ops_local", "ops_long_haul", "ops_intermodal_port",
        "ops_dump_truck_other", "ops_dump_truck_sand_gravel", "ops_end_dumper", "ops_logging", "ops_refrigerated", "ops_oversized_overnight",
        "ops_automobile_hauler", "ops_household_goods", "ops_tanker", "ineligible_operations", "years_business", "percent_hauls_over_500",
        "top_states_insured_hauls", "over_loads_brokered", "annual_revenue", "annual_mileage", "trailer_interchange", "commodity_1", "commodity_1_percentage",
        "commodity_2", "commodity_2_percentage", "commodity_3", "commodity_3_percentage", "prohibited_commodities_insured_transport", "refrigeration",
        "driver_2_accidents", "driver_3_moving", "driver_reckless", "ineligible_drivers", "loss_2_claims",
        "loss_exceeding", "ineligible_loss_experience", "total_losses_for_prior_3_years", "loss_paid_year5", "loss_count_year5", "loss_paid_year4", "loss_count_year4",
        "loss_paid_year3", "loss_count_year3", "loss_paid_year2", "loss_count_year2", "loss_paid_year1", "loss_count_year1",
        "freight_broker", "for_hire", "multi_trailer", "passengers", "loan_lease_others", "owned_operated_applicant", "other_nonscheduled_vehicles", "email",
        "uw_summary", "uw_notes", "uw_subjectivities", "uw_exclusions_limitations", "uw_sublimits", "uw_loss_experience", "uw_reports", "uw_carrier_guidelines",
        "rate_apd", "deductible_apd", "rate_mtc_100", "deductible_mtc_100", "rate_mtc_250", "deductible_mtc_250", "rate_mtc_500", "deductible_mtc_500", "rate_mtc_ref",
        "deductible_mtc_ref"
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'creating' => \App\Events\Transportation\Creating::class,
        'created' => \App\Events\Transportation\Created::class,
        'saving' => \App\Events\Transportation\Saving::class,
    ];
    function getSubmissionType(): string
    {
        return 'Trucking';
    }
    function getFilesDirName(): string
    {
        return 'Transportation';
    }


    public function getRouteKeyName():string
    {
        return 'display_id';
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function trailers()
    {
        return $this->hasMany(Trailer::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }

    public function files()
    {
        return $this->hasMany(TransportationSubmissionFile::class);
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

    public function phyZip()
    {
        $data = FmcsaCensus::findFmcsaCensusByDotNumber($this->dot_number);
        if ($data) {
            return $data->phy_zip;
        }
    }

    public function dbaName()
    {
        $data = FmcsaCensus::findFmcsaCensusByDotNumber($this->dot_number);
        if ($data) {
            return $data->dba_name;
        }
    }

    public function countCrashed()
    {
        return FmcsaCrash::countFmcsaCrashByDotNumber($this->dot_number);
    }


    public function calculateTotalValue()
    {
        $vehicles = $this->vehicles;
        $total = 0;
        foreach ($vehicles as $vehicle) {
            /* @var Vehicle $vehicle */
            $total += $vehicle->value;
        }
        $this->num_power_units = $vehicles->count();
        $this->value_power_units = $total;
        $this->calculatePolicyCost();
    }

    public function calculateTrailerValues()
    {
        $trailers = $this->trailers;
        $total = 0;
        foreach ($trailers as $trailer) {
            /* @var Trailer $trailer */
            $total += $trailer->value;
        }
        $this->value_trailers = $total;
        $this->num_trailers = $trailers->count();
        $this->calculatePolicyCost();
    }
    public function calculatePolicyCost()
    {
        $this->premium_apd = ($this->value_power_units + $this->value_trailers) * env('PREMIUM_APD', 0.07);
        $this->premium_mtc = ($this->num_power_units)  * env('PREMIUM_MTC', 1500);
    }
    public function updateFmcsaCensus(FmcsaCensus $fmcsaCensus)
    {
        $this->legal_name = $fmcsaCensus->legal_name;
        $this->phy_street = $fmcsaCensus->phy_street;
        $this->phy_city = $fmcsaCensus->phy_city;
        $this->phy_state = $fmcsaCensus->phy_state;
        $this->phy_zip = $fmcsaCensus->phy_zip;
        $this->phy_country = $fmcsaCensus->phy_country;
        $this->mailing_street = $fmcsaCensus->mailing_street;
        $this->mailing_city = $fmcsaCensus->mailing_city;
        $this->mailing_state = $fmcsaCensus->mailing_state;
        $this->mailing_zip = $fmcsaCensus->mailing_zip;
        $this->mailing_country = $fmcsaCensus->mailing_country;
    }

    public function storeUnderwriting(array $data)
    { }

    public function addFile(array $data)
    {
        return $this->files()->create($data);
    }
}
