@extends('layouts.app')

@section('title','Builders Risk - Inland Marine')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php

use App\BuildersRisk;

function input($name, $label, $errors, $type = "text")
{
    return '<div class="form-group">
                            <legend for="state">' . $label . '</legend>
                            <input class="form-control ' . ($errors->has('mailing_zip') ? 'is-invalid' : '') . '"
                            type="' . $type . '" 
                            value="' . old($name) . '"
                            id="' . $name . '" 
                            name="' . $name . '">
                        </div>';
}
function inputusd($name, $label, $errors, $type = "text")
{


    return '<div class="form-group">
                <legend for="state">' . $label . '</legend>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input class="form-control ' . ($errors->has('mailing_zip') ? 'is-invalid' : '') . '"
                        type="' . $type . '" 
                        value="' . old($name) . '"
                        id="' . $name . '" 
                        name="' . $name . '"
                    />
                </div>
            </div>';
}
?>
<div class="container">

    <div class="row justify-content-center">
        <div class="mb-2">
            <h1>Equipment</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-header">{{ __('Application') }}
                </div>


                <div class="card-body">
                    <form method="POST" action="../equipment">
                        {{ csrf_field() }}
                        <fieldset class="form-group">

                            <?= input("named_insured", 'Named Insured', $errors); ?>

                            <?= input("mailing_street", 'Mailing Address', $errors); ?>

                            <?= input("mailing_city", 'Mailing City', $errors); ?>

                            <div class="form-group">
                                <legend for="mailing_state">Mailing State</legend>
                                <?php
                                echo Form::select(
                                    'mailing_state',
                                    App\Library\USAStates::$states,
                                    old('mailing_state', 'CA'),
                                    array(
                                        'class'       => 'form-control'
                                    )
                                ); ?>
                            </div>


                            <?= input("mailing_zip", 'Mailing Zip', $errors); ?>


                            <fieldset class="form-group">
                                <legend>Ineligible Operations - Does the Insured conduct the following? :</legend>

                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">New Ventures</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">land clearning</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">Recycling</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">scrap Mining</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">Oil</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">gas</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">fracking</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">salt water disposal Offshore</label>
                                </div>

                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">Waterborne</label>
                                </div>

                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">Underwater, or on barges dredging</label>
                                </div>

                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">quarring Underground (more than 25 feet) Equipment located in Alasks, Hawaii, Florida, US Islands or Territories</label>
                                </div>

                                @include('_submission/radio', ['name'=>'ineligible_operations','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])
                            </fieldset>
                            <fieldset class="form-group">
                                <legend>Ineligible Equipment - Does the Insured have any of the following equipment? :</legend>
                                , , , , , ,
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">Oil or gas drill rigs</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">frac equipment tunneling</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">dredging</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">mining equipment logging equipment</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">fellow bunchers grinders</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">balers</label>
                                </div>
                                <div class="form-check" style="padding-left: 0px">
                                    <label class="form-check-label">conveyers Asphalt batch plants Equipment valued over $750,000 per item</label>
                                </div>
                                @include('_submission/radio', ['name'=>'ineligible_equipment','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])
                            </fieldset>




                            <?= input("contractor_type", 'Type of contractor', $errors); ?>

                            <div class="form-group">
                                <legend for="contractor_description">Description of work they perform</legend>
                                <textarea class="form-control {{ $errors->has('contractor_description') ? 'is-invalid' : '' }}" name="contractor_description" id="contractor_description"><?= old("contractor_description") ?></textarea>
                            </div>

                            <div class="form-group">
                                <legend for="yard_address">Yard locations address (where equipment is stored)</legend>
                                <textarea class="form-control {{ $errors->has('yard_address') ? 'is-invalid' : '' }}" name="yard_address" id="yard_address"><?= old("yard_address") ?></textarea>
                            </div>



                            <fieldset class="form-group">
                                <legend>Does the yard have a fence or site security?</legend>
                                @include('_submission/radio', ['name'=>'yard_fence','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])
                            </fieldset>

                            <fieldset class="form-group">
                                <legend>Does they lease, rent or loan equipment to Others?</legend>
                                @include('_submission/radio', ['name'=>'lease_rent_loan_others','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])
                            </fieldset>
                            <fieldset class="form-group">
                                <legend>More than 3 years in business?</legend>
                                @include('_submission/radio', ['name'=>'business_3_years','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                            </fieldset>
                            <fieldset class="form-group">
                                <legend>Is the equipment serviced per manufacturer recommendations?</legend>
                                @include('_submission/radio', ['name'=>'equipment_serviced','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])
                            </fieldset>
                            <fieldset class="form-group">
                                <legend>All employees trained on proper operatin of equipment?</legend>
                                @include('_submission/radio', ['name'=>'employees_trained','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                            </fieldset>
                            <fieldset class="form-group">
                                <legend>Transport equipment and tie downs checked before transport?</legend>
                                @include('_submission/radio', ['name'=>'transport_checks','values' => ['N'=>'No','Y'=>'Yes'],'checked'=>'N'])

                            </fieldset>



                            <fieldset class="form-group">
                                <legend>Average number of equipment rental or lease from others per year?</legend>
                                <input class="form-control {{ $errors->has('lease_rent_loan_average_year') ? 'is-invalid' : '' }}" type="number" value="{{ old('lease_rent_loan_average_year') }}" id="lease_rent_loan_average_year" name="lease_rent_loan_average_year">

                            </fieldset>

                            <hr />
                            <h2>Loss History</h2>
                            

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
                            <h2>Limits</h2>
                            <div class="form-group">
                                <legend for="loss_count_year1">Total Insured Value (TIV) of Scheduled Equipment </legend>
                                <input class="form-control {{ $errors->has('scheduled_tiv') ? 'is-invalid' : '' }}" type="number" value="{{ old('scheduled_tiv',0) }}" id="scheduled_tiv" name="scheduled_tiv">
                            </div>
                            <div class="form-group">
                                <legend for="loss_count_year1">Leased or Rental Equipment Limit</legend>
                                <input class="form-control {{ $errors->has('leased_rental_limit') ? 'is-invalid' : '' }}" type="number" value="{{ old('leased_rental_limit',0) }}" id="leased_rental_limit" name="leased_rental_limit">
                            </div>
                            <div class="form-group">
                                <legend for="loss_count_year1">Unscheduled Tool Timit</legend>
                                <input class="form-control {{ $errors->has('unscheduled_limit') ? 'is-invalid' : '' }}" type="number" value="{{ old('unscheduled_limit',0) }}" id="unscheduled_limit" name="unscheduled_limit">
                            </div>
                            <hr />
                            <h2>Rates</h2>
                            <div class="form-group">
                                <legend for="loss_count_year1">Scheduled Equipment: Expiring Rate</legend>
                                <input class="form-control {{ $errors->has('scheduled_rate_expiring') ? 'is-invalid' : '' }}" type="number" step="0.01" value="{{ old('scheduled_rate_expiring',0) }}" id="scheduled_rate_expiring" name="scheduled_rate_expiring">
                            </div>
                            <div class="form-group">
                                <legend for="loss_count_year1">Unscheduled Equipment: Expiring Rate</legend>
                                <input class="form-control {{ $errors->has('unscheduled_rate_expiring') ? 'is-invalid' : '' }}" type="number" step="0.01" value="{{ old('unscheduled_rate_expiring',0) }}" id="unscheduled_rate_expiring" name="unscheduled_rate_expiring">
                            </div>
                            <div class="form-group">
                                <legend for="loss_count_year1">Scheduled Equipment: Target Rate (this quote)</legend>
                                <input class="form-control {{ $errors->has('scheduled_rate_target') ? 'is-invalid' : '' }}" type="number" step="0.01" value="{{ old('scheduled_rate_target',0) }}" id="scheduled_rate_target" name="scheduled_rate_target">
                            </div>
                            <div class="form-group">
                                <legend for="loss_count_year1">Unscheduled Equipment: Target Rate (this quote)</legend>
                                <input class="form-control {{ $errors->has('scheduled_rate_target') ? 'is-invalid' : '' }}" type="number" step="0.01" value="{{ old('scheduled_rate_target',0) }}" id="scheduled_rate_target" name="scheduled_rate_target">
                            </div>
                            @if(!Auth::check())
                            <div class="form-group">
                                <legend for="value_trailers">Email</legend>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" value="{{ old('email') }}" id="email" name="email">
                                <small id="fileHelp" class="form-text text-muted">Your email address for receiving your
                                    quote information</small>
                            </div>
                            @endif
                        </fieldset>

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
                        <div class="col-sm-12 text-center" style="text-decoration: none">
                            <h3><a href="tel:1-323-402-5526">(323) 402-5526</a></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <a href="tel:1-323-402-5526" style="text-decoration: none">
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
                            <a href="mailto:&#104;&#101;&#108;&#108;&#111;&#64;&#99;&#97;&#108;&#98;&#117;&#105;&#108;&#100;&#101;&#114;&#115;&#114;&#105;&#115;&#107;&#46;&#99;&#111;&#109;" style="text-decoration: none">
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
                                <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
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