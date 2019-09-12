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
            <h1>Builders Risk</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-header">{{ __('Application') }}
                </div>


                <div class="card-body">
                    <form method="POST" action="../builders-risk">
                        {{ csrf_field() }}
                        <fieldset class="form-group">

                            <?= input("named_insured", 'Named Insured', $errors); ?>

                            <?= input("mailing_address", 'Mailing Address', $errors); ?>

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
                            <?= input("project_name", 'Project Name', $errors); ?>
                            <?= input("project_start_date", 'Project Start Date', $errors); ?>
                            <?= input("project_end_date", 'Project End Date', $errors); ?>
                            <?= input("jobsite_address", 'Jobsite Address', $errors); ?>
                            <?= input("jobsite_city", 'Jobsite City', $errors); ?>

                            <div class="form-group">
                                <legend for="jobsite_state">Jobsite State</legend>
                                <?php
                                echo Form::select(
                                    'jobsite_state',
                                    App\Library\USAStates::$states,
                                    old('jobsite_state', 'CA'),
                                    array(
                                        'class'       => 'form-control'
                                    )
                                ); ?>
                            </div>

                            <?= input("jobsite_zip", 'Jobsite Zip', $errors); ?>
                            <?= input("number_of_buildings", 'Number Of Buildings', $errors, 'number'); ?>

                            <div class="form-group">
                                <legend for="construction_type">Construction Type</legend>
                                <?php
                                echo Form::select(
                                    'construction_type',
                                    BuildersRisk::$constructionTypes,
                                    old('construction_type'),
                                    array(
                                        'class'       => 'form-control' . ($errors->has('construction_type') ?? 'is-invalid')
                                    )
                                ); ?>
                            </div>

                            <div class="form-group">
                                <legend for="percent_of_structural_elements_that_are_wood_frame">Percent Of Structural Elements That Are Wood Frame</legend>
                                <div class="input-group">
                                    <?php
                                    echo Form::select(
                                        'percent_of_structural_elements_that_are_wood_frame',
                                        range(0, 100, 10),
                                        old('percent_of_structural_elements_that_are_wood_frame'),
                                        array(
                                            'class'       => 'form-control input-group-lg ' . ($errors->has('percent_of_structural_elements_that_are_wood_frame') ?? ' is-invalid')
                                        )
                                    ); ?>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>

                            <?= input("sq_ft", 'Sq Ft', $errors, 'number'); ?>
                            <?= input("stores_above_ground", 'Stories Above Ground', $errors, 'number'); ?>
                            <div class="form-group">
                                <legend for="jobsite_within_50_ft_of_water">Jobsite Within 50 Ft Of Water</legend>
                                <div class="input-group">
                                    <?php
                                    echo Form::select(
                                        'jobsite_within_50_ft_of_water',
                                        range(0, 100, 10),
                                        old('jobsite_within_50_ft_of_water'),
                                        array(
                                            'class'       => 'form-control input-group-lg ' . ($errors->has('jobsite_within_50_ft_of_water') ?? ' is-invalid')
                                        )
                                    ); ?>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>

                            <?= input("project_description", 'Project Description', $errors); ?>
                            <?= input("intended_occupancy", 'Intended Occupancy', $errors); ?>
                            <?= input("grond_up_construction_or_renovation", 'Ground Up Construction Or Renovation', $errors); ?>

                            <div class="form-group">
                                <legend for="public_protection_class">Public Protection Class </legend>
                                <div class="input-group">
                                    <?php
                                    echo Form::select(
                                        'public_protection_class',
                                        range(1, 10, 1),
                                        old('public_protection_class'),
                                        array(
                                            'class'       => 'form-control input-group-lg ' . ($errors->has('public_protection_class') ?? ' is-invalid')
                                        )
                                    ); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <legend for="jobsite_state">Jobsite State</legend>
                                <?php
                                echo Form::select(
                                    'jobsite_state',
                                    App\Library\USAStates::$states,
                                    old('jobsite_state', 'CA'),
                                    array(
                                        'class'       => 'form-control'
                                    )
                                ); ?>
                            </div>

                            <div class="form-group">
                                <legend for="construction_type">List Site Security And Theft Controls</legend>
                                <textarea class="form-control {{ $errors->has('list_site_security_and_theft_controls') ? 'is-invalid' : '' }}" name="list_site_security_and_theft_controls" id="list_site_security_and_theft_controls"><?= old("list_site_security_and_theft_controls") ?></textarea>
                            </div>

                            <div class="form-group">
                                <legend for="construction_type">List Any Unique Architecture Or Engineering Features</legend>
                                <textarea class="form-control {{ $errors->has('list_any_unique_architecture_or_engineering_features') ? 'is-invalid' : '' }}" name="list_any_unique_architecture_or_engineering_features" id="list_any_unique_architecture_or_engineering_features"><?= old("list_any_unique_architecture_or_engineering_features") ?></textarea>
                            </div>

                            <?= input("contractor_ame", 'Contractor Name', $errors); ?>

                            <div class="form-group">
                                <legend for="construction_type">Contractor Experience With Similar Projects</legend>
                                <textarea class="form-control {{ $errors->has('contractor_experience_with_similar_projects') ? 'is-invalid' : '' }}" name="contractor_experience_with_similar_projects" id="contractor_experience_with_similar_projects"><?= old("contractor_experience_with_similar_projects") ?></textarea>
                            </div>

                            <div class="form-group">
                                <legend for="construction_type">List Loss Payee Or Mortgagees</legend>
                                <textarea class="form-control {{ $errors->has('list_loss_payee_or_mortgagees') ? 'is-invalid' : '' }}" name="list_loss_payee_or_mortgagees" id="list_loss_payee_or_mortgagees"><?= old("list_loss_payee_or_mortgagees") ?></textarea>
                            </div>

                            <?= inputusd("total_hard_cost_physical_damage_limit", 'Total Hard Cost (Physical Damage) Limit', $errors, 'number'); ?>
                            <?= inputusd("new_construction_value", 'New Construction Value', $errors, 'number'); ?>
                            <?= inputusd("renovation_value", 'Renovation Value (If Applicable)', $errors, 'number'); ?>
                            <?= inputusd("existing_building_shell_structure", 'Existing Building / Shell Structure (If Applicable)', $errors, 'number'); ?>
                            <?= inputusd("total_soft_cost", 'Total Soft Cost', $errors, 'number'); ?>
                            <?= inputusd("total_loss_of_revenue_or_rents", 'Total Loss Of Revenue Or Rents', $errors, 'number'); ?>
                            <?= inputusd("flood_limit", 'Flood Limit', $errors, 'number'); ?>
                            <?= inputusd("earthquake_limit", 'Earthquake Limit', $errors, 'number'); ?>

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
                            <input class="form-check-input" style="width: 1.75rem; height: 1.75rem;" type="checkbox" id="agree_terms" name="agree_terms" value="Y" checked>
                            <legend class="form-check-label" for="agree_terms">&nbsp;&nbsp;I agree to the <a href="/terms-of-use" target="_blank">Terms of Use</a> and <a href="https://www.calbuildersrisk.com/privacy-policy" target="_blank">Privacy Policy</a>.</legend>
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