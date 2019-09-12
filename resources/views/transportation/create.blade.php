@extends('layouts.app')

@section('title','Trucking - Commercial Auto')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="container">

    <div class="row justify-content-center">
        <div class="mb-2">
            <h1>Trucking</h1>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-header">{{ __('Application') }}
                </div>


                <div class="card-body">
                    <form method="POST" action="../transportation">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <legend for="dot_number">DOT Number</legend>
                            <input class="form-control {{ $errors->has('dot_number') ? 'is-invalid' : '' }}" type="text" value="{{ old('dot_number') }}" id="dot_number" name="dot_number">
                            <small id="fileHelp" class="form-text text-muted">Your "DOT Number" number issued by the
                                Federal Motor Carrier Safety Administration</small>
                        </div>

                        <div class="form-group">
                            <legend for="state">State of Operation</legend>
                            <select class="form-control" id="state" name="state">
                                <option value="CA"> California</option>
                            </select>
                        </div>

                        <hr />

                        <div class="form-group">
                            <h2>Vehicles &amp; Trailers:</h2>
                        </div>

                        <div class="form-group">
                            <legend for="num_power_units">Number of Vehicles (Power Units)</legend>
                            <select class="form-control" id="num_power_units" name="num_power_units">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <legend for="value_power_units">Total Value of Vehicles (Power Units)</legend>
                            <input class="form-control {{ $errors->has('value_power_units') ? 'is-invalid' : '' }}" type="text" value="{{ old('value_power_units') }}" id="value_power_units" name="value_power_units">
                            <small id="fileHelp" class="form-text text-muted">What would the above vehicles sell for
                                today?</small>
                        </div>
                        <div class="form-group">
                            <legend for="num_trailers">Number of Trailers</legend>
                            <select class="form-control" id="num_trailers" name="num_trailers">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <legend for="value_trailers">Total Value of Trailers</legend>
                            <input class="form-control {{ $errors->has('value_trailers') ? 'is-invalid' : '' }}" type="number" value="{{ old('value_trailers') }}" id="value_trailers" name="value_trailers">
                            <small id="fileHelp" class="form-text text-muted">What would the above trailers sell for
                                today?</small>
                        </div>

                        <hr />

                        <div class="form-group">
                            <h2>Operations:</h2>
                        </div>

                        <fieldset class="form-group">
                            <legend>Best Description of Operations</legend>
                            <small id="fileHelp" class="form-text text-muted">Choose any that apply:</small>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_local" name="ops_local" value="Y">
                                <label class="form-check-label" for="ops_local">Local Trucker</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_long_haul" name="ops_long_haul" value="Y">
                                <label class="form-check-label" for="ops_long_haul">Long Haul Trucker</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_intermodal_port" name="ops_intermodal_port" value="Y">
                                <label class="form-check-label" for="ops_intermodal_port">Intermodal or Port</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_dump_truck_other" name="ops_dump_truck_other" value="Y">
                                <label class="form-check-label" for="ops_dump_truck_other">Dump Trucks (Other)</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_dump_truck_sand_gravel" name="ops_dump_truck_sand_gravel" value="Y">
                                <label class="form-check-label" for="ops_dump_truck_sand_gravel">Dump Trucks (Sand and
                                    Gravel)</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_end_dumper" name="ops_end_dumper" value="Y">
                                <label class="form-check-label" for="ops_end_dumper">End Dumper Units</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_logging" name="ops_logging" value="Y">
                                <label class="form-check-label" for="ops_logging">Logging</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_refrigerated" name="ops_refrigerated" value="Y">
                                <label class="form-check-label" for="ops_refrigerated">Refrigerated Trailer</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_oversized_overnight" name="ops_oversized_overnight" value="Y">
                                <label class="form-check-label" for="ops_oversized_overnight">Oversized or
                                    Overweight</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_automobile_hauler" name="ops_automobile_hauler" value="Y">
                                <label class="form-check-label" for="ops_automobile_hauler">Automobile Hauler</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_household_goods" name="ops_household_goods" value="Y">
                                <label class="form-check-label" for="ops_household_goods">Household Goods Mover</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="checkbox" id="ops_tanker" name="ops_tanker" value="Y">
                                <label class="form-check-label" for="ops_tanker">Tankers</label>
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Does insured conduct any of the following Ineligible Operations:</legend>

                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">New Ventures</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Haul in Mexico, Canada, Alaska, Hawaii, US Islands or Territories</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Contingent cargo or freight broker operation</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Buses, taxis, livery operations</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Rental leasing firms</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Mobile cranes, drill rigs</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Cement, Ready Mix, pumpers</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Auto Haulers, Private Passenger Autos</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Tow trucks, repossession work</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Hazmat, Nuclear, Biological</label>
                            </div>
                            @include('_submission/radio', ['name'=>'ineligible_operations','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>

                        <div class="form-group">
                            <legend for="years_business">Number of Years in Business</legend>
                            <input class="form-control {{ $errors->has('years_business') ? 'is-invalid' : '' }}" type="number" value="{{ old('years_business') }}" id="years_business" name="years_business">
                        </div>
                        <div class="form-group">
                            <legend for="percent_hauls_over_500">% of Hauls over 500 miles</legend>
                            <select class="form-control" id="percent_hauls_over_500" name="percent_hauls_over_500">
                                <option value="0">0% (None)</option>
                                <option value="30">Less than 30%</option>
                                <option value="100">Greater than 30%</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <legend for="annual_revenue">Top 3 States insured Hauls in</legend>
                            <input class="form-control {{ $errors->has('top_states_insured_hauls') ? 'is-invalid' : '' }}" type="text" value="{{ old('top_states_insured_hauls')}}" id="top_states_insured_hauls" name="top_states_insured_hauls">
                        </div>

                        <fieldset class="form-group">
                            <legend>Are over 10% of loads brokered to other truckers?</legend>
                            @include('_submission/radio', ['name'=>'over_loads_brokered','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>
                        <div class="form-group">
                            <legend for="annual_revenue">Gross Annual Trucking Revenue</legend>
                            <input class="form-control {{ $errors->has('annual_revenue') ? 'is-invalid' : '' }}" type="number" value="{{ old('annual_revenue')}}" id="annual_revenue" name="annual_revenue">
                            <small id="fileHelp" class="form-text text-muted">What are your annual revenues from
                                Trucking?</small>
                        </div>

                        <div class="form-group">
                            <legend for="annual_mileage">Annual Mileage</legend>
                            <input class="form-control {{ $errors->has('annual_mileage') ? 'is-invalid' : '' }}" type="number" value="{{ old('annual_mileage') }}" id="annual_mileage" name="annual_mileage">
                        </div>

                        <fieldset class="form-group">
                            <legend>Do you haul non-owned trailers and require Trailer Interchange coverage?</legend>
                            @include('_submission/radio', ['name'=>'trailer_interchange','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>

                        <hr />

                        <div class="form-group">
                            <h2>Cargo:</h2>
                        </div>

                        <fieldset class="form-group">
                            <legend>Top 3 Commodities</legend>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <select class="form-control" name="commodity_1" title="Commoditie" placeholder="Commoditie">
                                            <option value="">--</option>
                                            @foreach (\App\TransportationSubmission::$commodities as $k=>$v)
                                            <option value="{{ $k }}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input class="form-control input-group-lg  {{ $errors->has('commodity_1_percentage') ? 'is-invalid' : '' }}" min="0" max="100" type="number" name="commodity_1_percentage" title="Percentage" placeholder="%">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <select class="form-control" name="commodity_2" title="Commoditie" placeholder="Commoditie">
                                            <option value="">--</option>
                                            @foreach (\App\TransportationSubmission::$commodities as $k=>$v)
                                            <option value="{{ $k }}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input class="form-control input-group-lg {{ $errors->has('commodity_2_percentage') ? 'is-invalid' : '' }}" min="0" max="100" type="number" name="commodity_2_percentage" title="Percentage" placeholder="%">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <select class="form-control" name="commodity_3" title="Commoditie" placeholder="Commoditie">
                                            <option value="">--</option>
                                            @foreach (\App\TransportationSubmission::$commodities as $k=>$v)
                                            <option value="{{ $k }}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input class="form-control input-group-lg {{ $errors->has('commodity_3_percentage') ? 'is-invalid' : '' }}" min="0" max="100" type="number" name="commodity_3_percentage" title="Percentage" placeholder="%">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <legend>Prohibited Commodities - Does the insured transport any of the following?</legend>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Live Animals, Hanging meat</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Pharmaceuticals, controlled substances</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Arms, ammunition, tobacco, fireworks, fire arms</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Autos, Boats, motorcycles, ATV’s</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Overweight or oversize hauls</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Mobile cranes, rigs</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Mobile homes, buildings, RV’s</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Courier operations</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Household Goods Movers</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Chlorine, liquid gas, LPG, ammonia, Explosive material, Radioactive Materials</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Fine arts, Furs, Money, currency, bullion, precious stones, jewelry, antiques</label>
                            </div>
                            <div class="form-check" style="padding-left: 0px">
                                <label class="form-check-label">Human tissue, organs, specimens</label>
                            </div>

                            @include('_submission/radio', ['name'=>'prohibited_commodities_insured_transport','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Refrigeration</legend>
                            <div class="form-check">
                                <label class="form-check-legend">
                                    <input type="radio" class="form-check-input" name="refrigeration" id="refrigeration" value="N" checked>
                                    No Regrigerated Goods Hauled &mdash; Refrigeration Breakdown Coverage Declined
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-legend">
                                    <input type="radio" class="form-check-input" name="refrigeration" id="refrigeration" value="Y">
                                    Yes, Refrigerated Goods Hauled &mdash; Refrigeration Breakdown Coverage Included
                                </label>
                            </div>
                        </fieldset>

                        <hr />

                        <div class="form-group">
                            <h2>Drivers:</h2>
                        </div>

                        <fieldset class="form-group">
                            <legend>Do any drivers have more than 2 accidents in prior 3 years?</legend>
                            @include('_submission/radio', ['name'=>'driver_2_accidents','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])


                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Do any drivers have more than 3 moving violations in prior 3 years?</legend>
                            @include('_submission/radio', ['name'=>'driver_3_moving','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Do any drivers have a DUI, reckless driving, racing, manslaughter, or drug violation
                                in prior 5 years?</legend>
                            @include('_submission/radio', ['name'=>'driver_reckless','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Do any drivers exceed the threshold for prior 36 months:</legend>

                            <div class="form-check" style="padding-left: 2em">
                                <label class="form-check-legend">Valid CDL for vehicle and +2 yrs CLD experience</label>
                            </div>

                            <div class="form-check" style="padding-left: 2em">
                                <label class="form-check-legend">2 Reported Accidents</label>
                            </div>
                            <div class="form-check" style="padding-left: 2em">
                                <label class="form-check-legend">3 Moving Violations </label>
                            </div>
                            <div class="form-check" style="padding-left: 2em">
                                <label class="form-check-legend">0 DUI, DWI, Drug, Homocide, or Reckless Driving</label>
                            </div>

                            @include('_submission/radio', ['name'=>'ineligible_drivers','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])


                        </fieldset>

                        <hr />

                        <div class="form-group">
                            <h2>Loss History:</h2>
                        </div>

                        <fieldset class="form-group">
                            <legend>Has the insured had 3 or more claims (Liability, Physical Damage, Cargo) in prior 3 years?</legend>

                            @include('_submission/radio', ['name'=>'loss_2_claims','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Has the insured incurred over $75,000 in Auto Physical Damage or Liability or Cargo
                                losses in prior 3 years?</legend>
                            @include('_submission/radio', ['name'=>'loss_exceeding','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Do insured paid, open or reserves claims (Liability, Physical Damage, Cargo) exceed $75,000 in the prior 36 months?</legend>
                            @include('_submission/radio', ['name'=>'ineligible_loss_experience','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])
                        </fieldset>

                        <fieldset class="form-group">
                            <div class="form-group">
                                <legend for="total_losses_for_prior_3_years">Total losses for prior 3 years (Liability, Physical Damage, Cargo)</legend>
                                <input class="form-control {{ $errors->has('total_losses_for_prior_3_years') ? 'is-invalid' : '' }}" type="number" value="{{ old('total_losses_for_prior_3_years',0) }}" id="total_losses_for_prior_3_years" name="total_losses_for_prior_3_years">
                            </div>

                        </fieldset>

                        <hr />

                        <div class="form-group">
                            <h2>2014-2015</h2>
                            <small id="fileHelp" class="form-text text-muted">Liability, Physical Damage, Cargo</small>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <legend for="loss_paid_year5">Losses Paid </legend>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>

                                        <input class="form-control {{ $errors->has('loss_paid_year5') ? 'is-invalid' : '' }}" type="number" value="{{ old('loss_paid_year5',0) }}" id="loss_paid_year5" name="loss_paid_year5"><br />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <legend for="loss_count_year5">Loss Count</legend>
                                    <input class="form-control {{ $errors->has('loss_count_year5') ? 'is-invalid' : '' }}" type="number" value="{{ old('loss_count_year5',0) }}" id="loss_count_year5" name="loss_count_year5">
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="form-group">
                            <h2>2015-2016</h2>
                            <small id="fileHelp" class="form-text text-muted">Liability, Physical Damage, Cargo</small>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <legend for="loss_paid_year4">Losses Paid </legend>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>

                                        <input class="form-control {{ $errors->has('loss_paid_year4') ? 'is-invalid' : '' }}" type="number" value="{{ old('loss_paid_year4',0) }}" id="loss_paid_year4" name="loss_paid_year4"><br />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <legend for="loss_count_year4">Loss Count</legend>
                                    <input class="form-control {{ $errors->has('loss_count_year4') ? 'is-invalid' : '' }}" type="number" value="{{ old('loss_count_year4',0) }}" id="loss_count_year4" name="loss_count_year4">
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="form-group">
                            <h2>2016-2017</h2>
                            <small id="fileHelp" class="form-text text-muted">Liability, Physical Damage, Cargo</small>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <legend for="loss_paid_year3">Losses Paid </legend>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>

                                        <input class="form-control {{ $errors->has('loss_paid_year3') ? 'is-invalid' : '' }}" type="number" value="{{ old('loss_paid_year3',0) }}" id="loss_paid_year3" name="loss_paid_year3"><br />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <legend for="loss_count_year3">Loss Count</legend>
                                    <input class="form-control {{ $errors->has('loss_count_year3') ? 'is-invalid' : '' }}" type="number" value="{{ old('loss_count_year3',0) }}" id="loss_count_year3" name="loss_count_year3">
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="form-group">
                            <h2>2017-2018</h2>
                            <small id="fileHelp" class="form-text text-muted">Liability, Physical Damage, Cargo</small>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <legend for="loss_paid_year2">Losses Paid </legend>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>

                                        <input class="form-control {{ $errors->has('loss_paid_year2') ? 'is-invalid' : '' }}" type="number" value="{{ old('loss_paid_year2',0) }}" id="loss_paid_year2" name="loss_paid_year2"><br />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <legend for="loss_count_year2">Loss Count</legend>
                                    <input class="form-control {{ $errors->has('loss_count_year2') ? 'is-invalid' : '' }}" type="number" value="{{ old('loss_count_year2',0) }}" id="loss_count_year2" name="loss_count_year2">
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="form-group">
                            <h2>2018-2019</h2>
                            <small id="fileHelp" class="form-text text-muted">Liability, Physical Damage, Cargo</small>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <legend for="loss_paid_year1">Losses Paid </legend>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>

                                        <input class="form-control {{ $errors->has('loss_paid_year1') ? 'is-invalid' : '' }}" type="number" value="{{ old('loss_paid_year1',0) }}" id="loss_paid_year1" name="loss_paid_year1"><br />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <legend for="loss_count_year1">Loss Count</legend>
                                    <input class="form-control {{ $errors->has('loss_count_year1') ? 'is-invalid' : '' }}" type="number" value="{{ old('loss_count_year1',0) }}" id="loss_count_year1" name="loss_count_year1">
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="form-group">
                            <h2>Underwriting:</h2>
                        </div>

                        <fieldset class="form-group">
                            <legend>Do you act as a freight broker or freight forwarder or arrange loads for others?
                            </legend>
                            @include('_submission/radio', ['name'=>'freight_broker','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Do any entities derive revenue from sources other than "for hire" trucking?</legend>

                            @include('_submission/radio', ['name'=>'for_hire','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Do you use double and or triple trailers?</legend>
                            @include('_submission/radio', ['name'=>'multi_trailer','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Are passengers ever allowed to accompany driver?</legend>
                            @include('_submission/radio', ['name'=>'passengers','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])
                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Do you lease, loan, or rent any of the vehicles to others?</legend>
                            @include('_submission/radio', ['name'=>'loan_lease_others','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])
                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Are all vehicles owned or operated under the applicants authority scheduled on this
                                application?</legend>
                            @include('_submission/radio', ['name'=>'owned_operated_applicant','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])
                        </fieldset>

                        <fieldset class="form-group">
                            <legend>Do you own, lease or use vehicles other than scheduled below, except personal
                                vehicles?</legend>
                            @include('_submission/radio', ['name'=>'other_nonscheduled_vehicles','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])
                        </fieldset>

                        <hr />

                        @if(!Auth::check())
                        <div class="form-group">
                            <legend for="value_trailers">Email</legend>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" value="{{ old('email') }}" id="email" name="email">
                            <small id="fileHelp" class="form-text text-muted">Your email address for receiving your
                                quote information</small>
                        </div>
                        @endif

                        <div class="form-group">
                            <div class="form-check form-check">
                                <input class="form-check-input" style="width: 1.75rem; height: 1.75rem;" type="checkbox" id="agree_terms" name="agree_terms" value="Y" checked>
                                <legend class="form-check-label" for="agree_terms">&nbsp;&nbsp;I agree to the <a href="/terms-of-use" target="_blank">Terms of Use</a> and <a href="https://www.coverwhale.com/privacy-policy" target="_blank">Privacy Policy</a>.</legend>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">Get Quote</button>
                    </form>
                    @if ($errors->any())
                    <br />
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>


                        <script>
                            $(document).ready(function() {
                                //console.log( "ready!" );
                                $('#exampleModal').modal('show');

                            });
                        </script>

                    </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">Need Help?</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <img src="https://media.licdn.com/dms/image/C4E03AQFsHf96PfoAiw/profile-displayphoto-shrink_200_200/0?e=1571270400&v=beta&t=aFTesvOpU0mZVxZFtXbEkdN8z-mLd98YMMYCXp_kVPY" class="rounded-circle" alt="Profile Image" style="max-width:125px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h3>Dan</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center style=" text-decoration: none"">
                            <h3><a href="tel:1-310-923-9425">(310) 923-9425</a></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <a href="tel:1-310-923-9425" style="text-decoration: none">
                                <i class="fa fa-phone-square fa-3x"></i>
                                <br />Call
                            </a>
                        </div>

                        <div class="col-sm-4 text-center">
                            <a href="javascript:$zopim.livechat.window.show();" style="text-decoration: none">
                                <i class="fa fa-comment fa-3x" style="color:#438BD7;"></i>
                                <br />Chat
                            </a>
                        </div>

                        <div class="col-sm-4 text-center">
                            <a href="mailto:&#104;&#101;&#108;&#108;&#111;&#64;&#99;&#111;&#118;&#101;&#114;&#119;&#104;&#97;&#108;&#101;&#46;&#99;&#111;&#109;" style="text-decoration: none">
                                <i class="fa fa-envelope-square fa-3x" style="color:#438BD7;"></i>
                                <br />Email
                            </a>
                        </div>

                    </div>

                    <div class="row mt-1">
                        <div class="col-sm-12 text-center">
                            <h4>Application Progress</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="progress" style="height: 40px;">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-legendledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Missing Info!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-legend="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection