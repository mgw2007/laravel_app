@extends('layouts.app')

@section('title','Trucking Submission')

@section('content')

<?php

use App\TransportationSubmission;
?>

<div class="container">
    <div class="row justify-content-center">



        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-sm-8">
                            Submission #{{$transportation->display_id }}
                        </div>
                        <div class="col-sm-4 text-right">
                            @if (!$transportation->status)
                            <span class="badge badge-pill badge-secondary">Submitted</span>
                            @endif

                            @if ($transportation->status == TransportationSubmission::STATUS_Bound)
                            <span class="badge badge-pill badge-success">Bound</span>
                            @endif

                            @if ($transportation->status == TransportationSubmission::STATUS_RequestToBind)
                            <span class="badge badge-pill badge-warning">Request to Bind</span>
                            @endif

                            @if ($transportation->status == TransportationSubmission::STATUS_Quoted)
                            <span class="badge badge-pill badge-success">Quoted</span>
                            @endif

                            @if ($transportation->status == TransportationSubmission::STATUS_RequestToQuote)
                            <span class="badge badge-pill badge-primary">Request to Quote</span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-8">
                            <h4>Insured</h4>
                        </div>
                        <div class="col-sm-4 text-right">
                            <a href="#updateInsured" data-toggle="modal" data-target="#updateInsured" class="btn btn-primary btn-sm">Update</a>
                        </div>
                    </div>

                    <hr />

                    <p><b>DOT #</b>{{$transportation->dot_number}}</p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Info</th>
                                    <th scope="col">Submission</th>
                                    <th scope="col">DOT Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $transportation->legal_name }}</td>
                                    <td>{{ $transportation->legalName() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">DBA</th>
                                    <td></td>
                                    <td>{{ $transportation->dbaName() }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Address</th>
                                    <td>{{ $transportation->phy_street }}<br />{{ $transportation->phy_city }}, {{ $transportation->phy_state }} {{ $transportation->phy_zip }}</td>
                                    <td>{{ $transportation->phyStreet() }}<br />{{ $transportation->phyCity() }}, {{ $transportation->phyState() }} {{ $transportation->phyZip() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-sm-8">
                            <h4>Underwriting</h4>
                        </div>
                        <div class="col-sm-4 text-right">
                            @if(auth()->user()->canViewAllSubmissions())
                            <a href="#updateUnderwriting" data-toggle="modal" data-target="#updateUnderwriting" class="btn btn-primary btn-sm">Update</a>
                            @endif
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">Risk Score</th>
                                    <td style="white-space: pre-wrap;"><span class="badge badge-pill badge-success">&nbsp;A-&nbsp;</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Summary</th>
                                    <td style="white-space: pre-wrap;">{{ $transportation->uw_summary }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Notes</th>
                                    <td style="white-space: pre-wrap;">{{ $transportation->uw_notes }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">Subjectivities</th>
                                    <td style="white-space: pre-wrap;">{{ $transportation->uw_subjectivities }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Exclusions or Limitations</th>
                                    <td style="white-space: pre-wrap;">{{ $transportation->uw_exclusions_limitations }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Sublimits</th>
                                    <td style="white-space: pre-wrap;">{{ $transportation->uw_sublimits }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Loss Experience</th>
                                    <td style="white-space: pre-wrap;">{{ $transportation->uw_loss_experience }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Underwriting Reports</th>
                                    <td style="white-space: pre-wrap;">{{ $transportation->uw_reports }}</td>

                                </tr>

                                <tr>
                                    <th scope="row">Carrier Guidelines</th>
                                    <td style="white-space: pre-wrap;">{{ $transportation->uw_carrier_guidelines }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Files</h4>
                        </div>
                    </div>
                    <form method="POST" action="./{{$transportation->display_id }}/addFile" id="addFileForm">
                        {{ csrf_field() }}
                        <input name="file" type="file" style="display:none" id="addFile" />
                        <input name="name" type="text" style="display:none" id="addFileName" />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="button" id="addTransportaionSubmissionFile">Add file </button>
                                    <button class="btn btn-primary" type="button" disabled id="uploadTransportaionSubmissionFile" style="display: none">
                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                        Uploading...
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="addTransportaionSubmissionFileErrorFileType" class="alert alert-danger" role="alert" style="display: none">
                            Supported filte types pdf, images, Excel (.xls, .xlsx, .xlsxm), Word (.doc, .docx), text (.txt), .csv
                        </div>
                        <div id="addTransportaionSubmissionFileErrorFileSize" class="alert alert-danger" role="alert" style="display: none">
                            Max File Size: 20MB
                        </div>
                        <div id="transportaionSubmissionFilesInputs"></div>

                    </form>

                    <div id="transportaionSubmissionFiles">
                        @foreach ($transportation->files->reverse() as $file)
                        <div class="row">
                            <div class="col-sm-12">
                                @if(Auth::check() && Auth::user()->canDeleteSubmissionFiles($transportation) )
                                <a href="{{ route('transportation.deleteFile', ['transportationFile'=>$file->id]) }}" class="btn btn-link  btn-sm removeFile" style="color: #e3342f">
                                    <i class="fa fa-times"></i>
                                </a>
                                @endif
                                <a href="{{ route('transportation.downloadFile', ['transportationFile'=>$file->id]) }}" target="_blank">{{$file->name}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr />


                    <div class="row">
                        <div class="col-sm-8">
                            <h4>Rates</h4>
                        </div>
                        <div class="col-sm-4 text-right">
                            @if(auth()->user()->canViewAllSubmissions())

                            <a href="#updateRates" data-toggle="modal" data-target="#updateRates" class="btn btn-primary btn-sm">Update</a>
                            @endif
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Coverage</th>
                                    <th scope="col" style="text-align:right;">Rate</th>
                                    <th scope="col" style="text-align:right;">Limit</th>
                                    <th scope="col" style="text-align:right;">Deductible</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">APD</th>
                                    <td style="text-align:right;">{{ $transportation->rate_apd }}%</td>
                                    <td style="text-align:right;">${{ number_format(($transportation->value_power_units + $transportation->value_trailers),0) }}</td>
                                    <td style="text-align:right;">${{ number_format($transportation->deductible_apd,0) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">MTC (Low)</th>
                                    <td style="text-align:right;">${{ number_format($transportation->rate_mtc_100,0) }}</td>
                                    <td style="text-align:right;">$100,000</td>
                                    <td style="text-align:right;">${{ number_format($transportation->deductible_mtc_100,0) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">MTC (Mid)</th>
                                    <td style="text-align:right;">${{ number_format($transportation->rate_mtc_250,0) }}</td>
                                    <td style="text-align:right;">$250,000</td>
                                    <td style="text-align:right;">${{ number_format($transportation->deductible_mtc_250,0) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">MTC (High)</th>
                                    <td style="text-align:right;">${{ number_format($transportation->rate_mtc_500,0) }}</td>
                                    <td style="text-align:right;">$500,000</td>
                                    <td style="text-align:right;">${{ number_format($transportation->deductible_mtc_500,0) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">MTC - Refrigeration</th>
                                    <td style="text-align:right;">${{ number_format($transportation->rate_mtc_ref,0) }}</td>
                                    <td style="text-align:right;">$100,000</td>
                                    <td style="text-align:right;">${{ number_format($transportation->deductible_mtc_ref,0) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <hr />

                    <h4>DOT Underwriting Checks</h4>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Info</th>
                                    <th scope="col">Scheduled</th>
                                    <th scope="col">DOT Data</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Vehicles</th>
                                    <td>{{ $transportation->num_power_units }}</td>
                                    <td>{{ $transportation->nbrPowerUnit() }}</td>
                                    <td><span class="badge badge-{{ ($transportation->nbrPowerUnit() > $transportation->num_power_units) ? 'warning' : 'success' }}">{{ ($transportation->nbrPowerUnit() > $transportation->num_power_units) ? 'Warning' : 'OK' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Drivers</th>
                                    <td>{{ $transportation->drivers->count() }}</td>
                                    <td>{{ $transportation->driversTotal() }}</td>
                                    <td><span class="badge badge-{{ ($transportation->driversTotal() > $transportation->drivers->count()) ? 'warning' : 'success' }}">{{ ($transportation->driversTotal() > $transportation->drivers->count()) ? 'Warning' : 'OK' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Crashes</th>
                                    <td>0</td>
                                    <td>{{ $transportation->countCrashed() }}</td>
                                    <td>
                                        <span class="badge badge-{{ ($transportation->driversTotal() > $transportation->drivers->count()) ? 'warning' : 'success' }}">{{ ($transportation->driversTotal() > $transportation->drivers->count()) ? 'Warning' : 'OK' }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <br />

                    <hr />

                    <h3>Vehicles</h3>
                    @if ($transportation->vehicles->count())

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">Crashes</th>
                                    <th scope="col">VIN</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Make</th>
                                    <th scope="col">Model</th>
                                    <th scope="col" style="text-align:right;">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transportation->vehicles as $vehicle)
                                <tr>
                                    <td align="center">
                                        <?php $fmcsaCrashsCounts = $vehicle->getFmcsaCrashsCounts(); ?>
                                        @if ($fmcsaCrashsCounts > 0)
                                        <a href="../vehicles/{{ $vehicle->id }}"><span class="badge badge-warning">{{ $fmcsaCrashsCounts }}</span></a>
                                        @else
                                        <span class="badge badge-success">{{ $fmcsaCrashsCounts }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $vehicle->vehicle_id_number }}</td>
                                    <td>{{ $vehicle->year }}</td>
                                    <td>{{ $vehicle->make }}</td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td align="right">${{ number_format($vehicle->value,0) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @endif

                    <a href="#AddVehicle" data-toggle="modal" data-target="#AddVehicle" class="btn btn-primary btn-sm">
                        Add Vehicle
                    </a>
                    <br /><br />

                    <hr />

                    <h3>Trailers</h3>
                    @if ($transportation->trailers->count())

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">Crashes</th>
                                    <th scope="col">VIN</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Make</th>
                                    <th scope="col">Model</th>
                                    <th scope="col" style="text-align:right;">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transportation->trailers as $trailer)
                                <tr>
                                    {{ $trailerFmcsaCrashsCounts = $trailer->getFmcsaCrashsCounts() }}
                                    <td align="center">
                                        @if ($trailerFmcsaCrashsCounts > 0)
                                        <a href="../trailers/{{ $trailer->id }}">{{ $trailerFmcsaCrashsCounts }}</a>
                                        @else
                                        {{ $trailerFmcsaCrashsCounts }}
                                        @endif
                                    </td>
                                    <td>{{ $trailer->vehicle_id_number }}</td>
                                    <td>{{ $trailer->year }}</td>
                                    <td>{{ $trailer->make }}</td>
                                    <td>{{ $trailer->model }}</td>
                                    <td align="right">${{ number_format($trailer->value,0) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @endif

                    <a href="#AddTrailer" data-toggle="modal" data-target="#AddTrailer" class="btn btn-primary btn-sm">
                        Add Trailer
                    </a>

                    <br /><br />

                    <hr />

                    <h3>Drivers</h3>
                    @if ($transportation->drivers->count())

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Eligibility</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Middle Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">License State</th>
                                    <th scope="col">License Number</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($transportation->drivers as $driver)
                                <tr>
                                    <td><span class="badge badge-success">Approved</span></td>
                                    <td>{{ $driver->name_first }}</td>
                                    <td>{{ $driver->name_middle }}</td>
                                    <td>{{ $driver->name_last }}</td>
                                    <td>{{ $driver->driver_date_of_birth }}</td>
                                    <td>{{ $driver->driver_license_state }}</td>
                                    <td>{{ $driver->driver_license_number }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @endif

                    <a href="#AddDriver" data-toggle="modal" data-target="#AddDriver" class="btn btn-primary btn-sm">
                        Add Driver
                    </a>

                </div>
            </div>
        </div>

        <div class="col-md-3">

            <div class="card">
                <div class="card-header text-center">Have Questions?
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <img src="https://media.licdn.com/dms/image/C4E03AQFsHf96PfoAiw/profile-displayphoto-shrink_200_200/0?e=1571270400&v=beta&t=aFTesvOpU0mZVxZFtXbEkdN8z-mLd98YMMYCXp_kVPY" class="rounded-circle" alt="Profile Image" width="70px">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            Dan
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center" style="text-decoration: none">
                            <h4><a href="tel:1-310-923-9425">(310) 923-9425</a></h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <a href="tel:tel:1-310-923-9425" style="text-decoration: none">
                                <i class="fa fa-phone-square fa-2x"></i><br />Call
                            </a>
                        </div>

                        <div class="col-sm-4 text-center">
                            <a href="javascript:$zopim.livechat.window.show();" style="text-decoration: none">
                                <i class="fa fa-comment fa-2x" style="color:#438BD7;"></i><br />Chat
                            </a>
                        </div>

                        <div class="col-sm-4 text-center">
                            <a href="mailto:&#104;&#101;&#108;&#108;&#111;&#64;&#99;&#111;&#118;&#101;&#114;&#119;&#104;&#97;&#108;&#101;&#46;&#99;&#111;&#109;" style="text-decoration: none">
                                <i class="fa fa-envelope-square fa-2x" style="color:#438BD7;"></i><br />Email
                            </a>
                        </div>

                    </div>

                    <div class="row mt-1">
                        <div class="col-sm-12 text-center">
                            Progress
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>





            <!--
            <div class="card mt-3">
                <div class="card-header text-center">Price Estimate
                </div>

                <div class="card-body">

                    <h1 class="card-title pricing-card-title text-center">

                        ${{ round(($transportation->num_power_units * 1200 / 12 * 1.1),0) }}

                        <small class="text-muted">/ month</small></h1>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <ul class="list-unstyled mt-3 mb-3">
                                <li>Auto-Pay Available</li>
                                <li>Pay each month</li>
                                <li>- or -</li>
                                <li>${{ $transportation->num_power_units * 1200 }} One Annual Payment</li>
                                <li><a href="./{{ $transportation->display_id }}/download" target="_blank">See Quote for Details</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
 -->


            <div class="card mt-3">
                <div class="card-header text-center">Documents
                </div>

                <div class="card-body">

                    <div class="row text-center">
                        <div class="col-sm-12 text-center">
                            <a href="./{{ $transportation->display_id }}/download" target="_blank">
                                <h3>Application</h3>
                            </a>
                        </div>
                    </div>

                    @if ($transportation->status == TransportationSubmission::STATUS_Quoted || $transportation->status == TransportationSubmission::STATUS_RequestToBind || $transportation->status == TransportationSubmission::STATUS_Bound)
                    <div class="row text-center">
                        <div class="col-sm-12 text-center">
                            <a href="./{{ $transportation->display_id }}/download" target="_blank">
                                <h3>Quote</h3>
                            </a>
                        </div>
                    </div>
                    @endif

                    @if ($transportation->status == TransportationSubmission::STATUS_Bound)

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="./{{ $transportation->display_id }}/download_binder" target="_blank">
                                <h3>Binder</h3>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="./{{ $transportation->display_id }}/download_policy" target="_blank">
                                <h3>Policy</h3>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="./{{ $transportation->display_id }}/download_certificates" target="_blank">
                                <h3>Certificates</h3>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="./{{ $transportation->display_id }}/download_invoice" target="_blank">
                                <h3>Invoice</h3>
                            </a>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
            <!-- END Documents -->

            <!-- ACTION BUTTONS -->

            @include('_submission/statusButtons', ['submission'=>$transportation])



        </div>


    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateInsured" tabindex="-1" role="dialog" aria-labelledby="updateInsuredLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateInsuredLabel">Insured</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="./{{$transportation->display_id }}/vehicles">
                <div class="modal-body">

                    {{ csrf_field() }}

                    <input type="hidden" id="transportation_submission_id" name="transportation_submission_id" value="{{$transportation->display_id }}">

                    <div class="form-group">
                        <label for="name">DOT Number</label>
                        <input class="form-control {{ $errors->has('vehicle_year') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_year') }}" id="vin_year" name="vehicle_year">
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control {{ $errors->has('vehicle_year') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_year') }}" id="vin_year" name="vehicle_year">
                    </div>

                    <div class="form-group">
                        <label for="name">Doing Business As ("DBA")</label>
                        <input class="form-control {{ $errors->has('vehicle_year') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_year') }}" id="vin_year" name="vehicle_year">
                        <small id="fileHelp" class="form-text text-muted">(Optional)</small>
                    </div>

                    <div class="form-group">
                        <label for="make">Address</label>
                        <input class="form-control {{ $errors->has('vehicle_make') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_make') }}" id="vin_make" name="vehicle_make">
                    </div>

                    <div class="form-group">
                        <label for="model">City</label>
                        <input class="form-control {{ $errors->has('vehicle_model') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_model') }}" id="vin_model" name="vehicle_model">
                    </div>

                    <div class="form-group">
                        <label for="value">State</label>
                        <input class="form-control {{ $errors->has('vehicle_value') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_value') }}" id="value" name="vehicle_value">
                    </div>

                    <div class="form-group">
                        <label for="value">ZIP</label>
                        <input class="form-control {{ $errors->has('vehicle_value') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_value') }}" id="value" name="vehicle_value">
                    </div>

                    @if ($errors->has('vehicle_vehicle_id_number') || $errors->has('vehicle_year') ||
                    $errors->has('vehicle_make') ||
                    $errors->has('vehicle_model') || $errors->has('vehicle_value'))
                    <br />
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <script>
                            setTimeout(() => $('#updateInsured').modal('show'), 500)
                        </script>

                    </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>
@if(auth()->user()->canViewAllSubmissions())

<!-- Modal -->
<div class="modal fade" id="updateUnderwriting" tabindex="-1" role="dialog" aria-labelledby="updateUnderwritingLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUnderwritingLabel">Underwriting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="./{{$transportation->display_id }}/underwriting">
                <div class="modal-body">

                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="name">Summary</label>
                        <textarea class="form-control {{ $errors->has('uw_summary') ? 'is-invalid' : '' }}" name="uw_summary" id="uw_summary">{{ old("uw_summary", $transportation->uw_summary) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Notes</label>
                        <textarea class="form-control {{ $errors->has('uw_notes') ? 'is-invalid' : '' }}" name="uw_notes" id="uw_notes">{{ old("uw_notes", $transportation->uw_notes) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="make">Subjectivities</label>
                        <textarea class="form-control {{ $errors->has('uw_subjectivities') ? 'is-invalid' : '' }}" name="uw_subjectivities" id="uw_subjectivities">{{ old("uw_subjectivities", $transportation->uw_subjectivities) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="model">Exclusions or Limitations</label>
                        <textarea class="form-control {{ $errors->has('uw_exclusions_limitations') ? 'is-invalid' : '' }}" name="uw_exclusions_limitations" id="uw_exclusions_limitations">{{ old("uw_exclusions_limitations", $transportation->uw_exclusions_limitations) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="value">Sublimits</label>
                        <textarea class="form-control {{ $errors->has('uw_sublimits') ? 'is-invalid' : '' }}" name="uw_sublimits" id="uw_sublimits">{{ old("uw_sublimits", $transportation->uw_sublimits) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="value">Loss Experience</label>
                        <textarea class="form-control {{ $errors->has('uw_loss_experience') ? 'is-invalid' : '' }}" name="uw_loss_experience" id="uw_loss_experience">{{ old("uw_loss_experience", $transportation->uw_loss_experience) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="value">Underwriting Reports</label>
                        <textarea class="form-control {{ $errors->has('uw_reports') ? 'is-invalid' : '' }}" name="uw_reports" id="uw_reports">{{ old("uw_reports", $transportation->uw_reports) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="value">Carrier Guidelines</label>
                        <textarea class="form-control {{ $errors->has('uw_carrier_guidelines') ? 'is-invalid' : '' }}" name="uw_carrier_guidelines" id="uw_carrier_guidelines">{{ old("uw_carrier_guidelines", $transportation->uw_carrier_guidelines) }}</textarea>
                    </div>

                    @if ($errors->has('uw_summary') || $errors->has('uw_notes') ||
                    $errors->has('uw_subjectivities') ||
                    $errors->has('uw_exclusions_limitations') || $errors->has('uw_sublimits')||
                    $errors->has('uw_loss_experience') || $errors->has('uw_reports')||
                    $errors->has('uw_carrier_guidelines')

                    )
                    <br />
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <script>
                            setTimeout(() => $('#updateUnderwriting').modal('show'), 500)
                        </script>

                    </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endif

@if(auth()->user()->canViewAllSubmissions())

<!-- Modal -->
<div class="modal fade" id="updateRates" tabindex="-1" role="dialog" aria-labelledby="updateRatesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateRatesLabel">Rates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="./{{$transportation->display_id }}/rates">
                <div class="modal-body">

                    {{ csrf_field() }}


                    <h5>Automobile Physical Damage</h5>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rate_apd">Rate <small class="text-muted">(of TIV)</small></label>
                                <div class="input-group">
                                    <input class="form-control {{ $errors->has('rate_apd') ? 'is-invalid' : '' }}" type="number" step="0.01" value="{{ old('rate_apd',$transportation->rate_apd) }}" id="rate_apd" name="rate_apd">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">

                                <label for="deductible_apd">Deductible</label>

                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>

                                    <input class="form-control {{ $errors->has('deductible_apd') ? 'is-invalid' : '' }}" type="number" value="{{ old('deductible_apd',$transportation->deductible_apd) }}" id="deductible_apd" name="deductible_apd">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <h5>Motor Truck Cargo: $100,000</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rate_mtc_100">Rate <small class="text-muted">(per Truck)</small></label>

                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control {{ $errors->has('rate_mtc_100') ? 'is-invalid' : '' }}" type="number" value="{{ old('rate_mtc_100',$transportation->rate_mtc_100) }}" id="rate_mtc_100" name="rate_mtc_100">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="deductible_mtc_100">Deductible</label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control {{ $errors->has('deductible_mtc_100') ? 'is-invalid' : '' }}" type="number" value="{{ old('deductible_mtc_100',$transportation->deductible_mtc_100) }}" id="deductible_mtc_100" name="deductible_mtc_100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <h5>Motor Truck Cargo: $250,000</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rate_mtc_250">Rate <small class="text-muted">(per Truck)</small></label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control {{ $errors->has('rate_mtc_250') ? 'is-invalid' : '' }}" type="number" value="{{ old('rate_mtc_250',$transportation->rate_mtc_250) }}" id="rate_mtc_250" name="rate_mtc_250">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="deductible_mtc_250">Deductible</label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control {{ $errors->has('deductible_mtc_250') ? 'is-invalid' : '' }}" type="number" value="{{ old('deductible_mtc_250',$transportation->deductible_mtc_250) }}" id="deductible_mtc_250" name="deductible_mtc_250">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <h5>Motor Truck Cargo: $500,000</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rate_mtc_500">Rate <small class="text-muted">(per Truck)</small></label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control {{ $errors->has('rate_mtc_500') ? 'is-invalid' : '' }}" type="number" value="{{ old('rate_mtc_500',$transportation->rate_mtc_500) }}" id="rate_mtc_500" name="rate_mtc_500">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="deductible_mtc_500">Deductible</label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control {{ $errors->has('deductible_mtc_500') ? 'is-invalid' : '' }}" type="number" value="{{ old('deductible_mtc_500',$transportation->deductible_mtc_500) }}" id="deductible_mtc_500" name="deductible_mtc_500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <h5>Motor Truck Cargo: Refrigeration</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rate_mtc_ref">Rate <small class="text-muted">(per Truck)</small></label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control {{ $errors->has('rate_mtc_ref') ? 'is-invalid' : '' }}" type="number" value="{{ old('rate_mtc_ref',$transportation->rate_mtc_ref) }}" id="rate_mtc_ref" name="rate_mtc_ref">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="deductible_mtc_ref">Deductible</label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control {{ $errors->has('deductible_mtc_ref') ? 'is-invalid' : '' }}" type="number" value="{{ old('deductible_mtc_ref',$transportation->deductible_mtc_ref) }}" id="deductible_mtc_ref" name="deductible_mtc_ref">
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($errors->has('rate_apd') || $errors->has('deductible_apd') ||
                    $errors->has('rate_mtc_100') || $errors->has('deductible_mtc_100') ||
                    $errors->has('rate_mtc_250') || $errors->has('deductible_mtc_250') ||
                    $errors->has('rate_mtc_500') || $errors->has('deductible_mtc_500') ||
                    $errors->has('rate_mtc_ref') || $errors->has('deductible_mtc_ref')
                    )
                    <br />
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <script>
                            setTimeout(() => $('#updateRates').modal('show'), 500)
                        </script>

                    </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endif
<!-- Modal -->
<div class="modal fade" id="AddVehicle" tabindex="-1" role="dialog" aria-labelledby="AddVehicleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddVehicleLabel">Add Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="./{{$transportation->display_id }}/vehicles">
                <div class="modal-body">

                    {{ csrf_field() }}

                    <input type="hidden" id="transportation_submission_id" name="transportation_submission_id" value="{{$transportation->display_id }}">

                    <label for="vehicle_id_number">Vehicle Identification Number (VIN)</label>
                    <div class="input-group">
                        <input class="form-control {{ $errors->has('vehicle_vehicle_id_number') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_vehicle_id_number') }}" id="vehicle_id_number" name="vehicle_vehicle_id_number">
                        <div class="input-group-append">
                            <button style="display: none" id="vin_lookup_disable" class="btn btn-primary" type="button" disabled>
                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                            <button class="btn btn-outline-primary vin_lookup" type="button">VIN
                                Lookup
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="year">Year</label>
                        <input class="form-control {{ $errors->has('vehicle_year') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_year') }}" id="vin_year" name="vehicle_year">
                    </div>

                    <div class="form-group">
                        <label for="make">Make or Manufacturer</label>
                        <input class="form-control {{ $errors->has('vehicle_make') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_make') }}" id="vin_make" name="vehicle_make">
                    </div>

                    <div class="form-group">
                        <label for="model">Model</label>
                        <input class="form-control {{ $errors->has('vehicle_model') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_model') }}" id="vin_model" name="vehicle_model">
                    </div>

                    <div class="form-group">
                        <label for="value">Value</label>
                        <input class="form-control {{ $errors->has('vehicle_value') ? 'is-invalid' : '' }}" type="text" value="{{ old('vehicle_value') }}" id="value" name="vehicle_value">
                        <small id="fileHelp" class="form-text text-muted">What would this vehicle sell for
                            today?</small>
                    </div>

                    @if ($errors->has('vehicle_vehicle_id_number') || $errors->has('vehicle_year') ||
                    $errors->has('vehicle_make') ||
                    $errors->has('vehicle_model') || $errors->has('vehicle_value'))
                    <br />
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <script>
                            setTimeout(() => $('#AddVehicle').modal('show'), 500)
                        </script>

                    </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Vehicle</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddTrailer" tabindex="-1" role="dialog" aria-labelledby="AddTrailerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddTrailerLabel">Add Trailer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="./{{$transportation->display_id }}/trailers">
                <div class="modal-body">

                    {{ csrf_field() }}

                    <input type="hidden" id="transportation_submission_id" name="transportation_submission_id" value="{{$transportation->display_id }}">

                    <label for="vehicle_id_number">Vehicle Identification Number (VIN)</label>
                    <div class="input-group">
                        <input class="form-control {{ $errors->has('trailer_vehicle_id_number') ? 'is-invalid' : '' }}" type="text" value="{{ old('trailer_vehicle_id_number') }}" id="vehicle_id_number" name="trailer_vehicle_id_number">
                        <div class="input-group-append">
                            <button style="display: none" id="vin_lookup_disable" class="btn btn-primary" type="button" disabled>
                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                            <button class="btn btn-outline-primary vin_lookup" type="button">VIN
                                Lookup
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="year">Year</label>
                        <input class="form-control {{ $errors->has('trailer_year') ? 'is-invalid' : '' }}" type="text" value="{{ old('trailer_year') }}" id="vin_year" name="trailer_year">
                    </div>

                    <div class="form-group">
                        <label for="make">Make or Manufacturer</label>
                        <input class="form-control {{ $errors->has('trailer_make') ? 'is-invalid' : '' }}" type="text" value="{{ old('trailer_make') }}" id="vin_make" name="trailer_make">
                    </div>

                    <div class="form-group">
                        <label for="model">Model</label>
                        <input class="form-control {{ $errors->has('trailer_model') ? 'is-invalid' : '' }}" type="text" value="{{ old('trailer_model') }}" id="vin_model" name="trailer_model">
                    </div>

                    <div class="form-group">
                        <label for="value">Value</label>
                        <input class="form-control {{ $errors->has('trailer_value') ? 'is-invalid' : '' }}" type="text" value="{{ old('trailer_value') }}" id="value" name="trailer_value">
                        <small id="fileHelp" class="form-text text-muted">What would this trailer sell for
                            today?</small>
                    </div>

                    @if ($errors->has('trailer_vehicle_id_number') || $errors->has('trailer_year') ||
                    $errors->has('trailer_make') ||
                    $errors->has('trailer_model') || $errors->has('trailer_value'))
                    <br />
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <script>
                            //console.log( "ready!" );
                            setTimeout(() => $('#AddTrailer').modal('show'), 500)
                        </script>

                    </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Trailer</button>
                </div>

            </form>

        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="AddDriver" tabindex="-1" role="dialog" aria-labelledby="AddDriverLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddVDriverLabel">Add Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="./{{$transportation->display_id }}/drivers">
                <div class="modal-body">

                    {{ csrf_field() }}

                    <input type="hidden" id="transportation_submission_id" name="transportation_submission_id" value="{{$transportation->display_id }}">

                    <div class="form-group">
                        <label for="name_first">First Name</label>
                        <input class="form-control {{ $errors->has('name_first') ? 'is-invalid' : '' }}" type="text" value="{{ old('name_first') }}" id="name_first" name="name_first">
                    </div>

                    <div class="form-group">
                        <label for="name_middle">Middle Name (optional)</label>
                        <input class="form-control {{ $errors->has('name_middle') ? 'is-invalid' : '' }}" type="text" value="{{ old('name_middle') }}" id="name_middle" name="name_middle">
                    </div>

                    <div class="form-group">
                        <label for="name_last">Last Name (Family Name)</label>
                        <input class="form-control {{ $errors->has('name_last') ? 'is-invalid' : '' }}" type="text" value="{{ old('name_last') }}" id="name_last" name="name_last">
                    </div>

                    <div class="form-group">
                        <label for="driver_license_state">Driver License State</label>
                        <input class="form-control {{ $errors->has('driver_license_state') ? 'is-invalid' : '' }}" type="text" value="{{ old('driver_license_state') }}" id="driver_license_state" name="driver_license_state">
                    </div>

                    <div class="form-group">
                        <label for="driver_license_number">Driver License Number</label>
                        <input class="form-control {{ $errors->has('driver_license_number') ? 'is-invalid' : '' }}" type="text" value="{{ old('driver_license_number') }}" id="driver_license_number" name="driver_license_number">
                    </div>

                    <div class="form-group">
                        <label for="driver_date_of_birth">Driver Date of Birth</label>
                        <input class="form-control {{ $errors->has('driver_date_of_birth') ? 'is-invalid' : '' }}" type="text" value="{{ old('driver_date_of_birth') }}" id="driver_date_of_birth" name="driver_date_of_birth">
                    </div>

                    <div class="form-group">
                        <label for="driver_date_of_hire">Driver Date of Hire</label>
                        <input class="form-control {{ $errors->has('driver_date_of_hire') ? 'is-invalid' : '' }}" type="text" value="{{ old('driver_date_of_hire') }}" id="driver_date_of_hire" name="driver_date_of_hire">
                    </div>

                    @if ($errors->has('name_first') || $errors->has('name_last') || $errors->has('driver_license_state')
                    || $errors->has('driver_license_number') || $errors->has('driver_date_of_birth') ||
                    $errors->has('driver_date_of_hire') || $errors->has('driver_global'))
                    <br />
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <script>
                            setTimeout(() => $('#AddDriver').modal('show'), 500)
                        </script>

                    </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Driver</button>
                </div>

            </form>

        </div>
    </div>
</div>



@endsection