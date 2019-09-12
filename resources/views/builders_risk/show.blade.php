@extends('layouts.app')

@section('title','Builders Risk Submission')

@section('content')
<?php

use App\BuildersRisk;
?>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            Submission #{{$buildersRisk->display_id }}
                        </div>
                        <div class="col-sm-4 text-right">

                            <div class="col-sm-4 text-right">
                                @if (!$buildersRisk->status)
                                <span class="badge badge-pill badge-secondary">Submitted</span>
                                @endif

                                @if ($buildersRisk->status == BuildersRisk::STATUS_Bound)
                                <span class="badge badge-pill badge-success">Bound</span>
                                @endif

                                @if ($buildersRisk->status == BuildersRisk::STATUS_RequestToBind)
                                <span class="badge badge-pill badge-warning">Request to Bind</span>
                                @endif

                                @if ($buildersRisk->status == BuildersRisk::STATUS_Quoted)
                                <span class="badge badge-pill badge-success">Quoted</span>
                                @endif

                                @if ($buildersRisk->status == BuildersRisk::STATUS_RequestToQuote)
                                <span class="badge badge-pill badge-primary">Request to Quote</span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-8">
                            <h4>Insured</h4>
                        </div>
                        <div class="col-sm-4 text-right">
                            <!--
                        <a href="#updateInsured" data-toggle="modal" data-target="#updateInsured" class="btn btn-primary btn-sm">Update</a>
-->
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Info</th>
                                    <th scope="col">Submission</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $buildersRisk->named_insured }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">DBA</th>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th scope="row">Address</th>
                                    <td>{{ $buildersRisk->mailing_address }}<br />{{ $buildersRisk->mailing_city }}, {{ $buildersRisk->mailing_state }} {{ $buildersRisk->mailing_zip }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="row">
                        <div class="col-sm-8">
                            <h4>Project</h4>
                        </div>
                        <div class="col-sm-4 text-right">
                            <!--
                        <a href="#updateProject" data-toggle="modal" data-target="#updateProject" class="btn btn-primary btn-sm">Update</a>
-->
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Info</th>
                                    <th scope="col">Submission</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $buildersRisk->project_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>{{ $buildersRisk->jobsite_address }}<br />{{ $buildersRisk->jobsite_city }}, {{ $buildersRisk->jobsite_state }} {{ $buildersRisk->jobsite_zip }}</td>
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
                    <form method="POST" action="./{{$buildersRisk->display_id }}/addFile" id="addBuilderRiskFileForm">
                        {{ csrf_field() }}
                        <input name="file" type="file" style="display:none" id="addBuilderRiskFile" />
                        <input name="name" type="text" style="display:none" id="addBuilderRiskFileName" />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="button" id="addBuildersRiskFile">Add file </button>
                                    <button class="btn btn-primary" type="button" disabled id="uploadBuildersRiskFile" style="display: none">
                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                        Uploading...
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="addBuildersRiskFileErrorFileType" class="alert alert-danger" role="alert" style="display: none">
                            Supported filte types pdf, images, Excel (.xls, .xlsx, .xlsxm), Word (.doc, .docx), text (.txt), .csv
                        </div>
                        <div id="addBuildersRiskFileErrorFileSize" class="alert alert-danger" role="alert" style="display: none">
                            Max File Size: 20MB
                        </div>
                        <div id="buildersRiskFilesInputs"></div>

                    </form>

                    <div id="buildersRiskFiles">
                        @foreach ($buildersRisk->files->reverse() as $file)
                        <div class="row">
                            <div class="col-sm-12">
                                @if(Auth::check() && Auth::user()->canDeleteSubmissionFiles($buildersRisk) )
                                <a href="{{ route('buildersRisk.deleteFile', ['buildersRiskFile'=>$file->id]) }}" class="btn btn-link  btn-sm removeFile" style="color: #e3342f">
                                    <i class="fa fa-times"></i>
                                </a>
                                @endif
                                <a href="{{ route('buildersRisk.downloadFile', ['buildersRiskFile'=>$file->id]) }}" target="_blank">{{$file->name}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-sm-8">
                            <h4>Project Map</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="680" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{ str_replace(' ','+',$buildersRisk->jobsite_address) }}+{{ $buildersRisk->jobsite_zip }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 500px;
                                        width: 680px;
                                    }

                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 500px;
                                        width: 680px;
                                    }
                                </style>
                            </div>

                        </div>
                    </div>








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
                            <h4><a href="tel:1-323-402-5526">(323) 402-5526</a></h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <a href="tel:tel:1-323-402-5526" style="text-decoration: none">
                                <i class="fa fa-phone-square fa-2x"></i><br />Call
                            </a>
                        </div>

                        <div class="col-sm-4 text-center">
                            <a href="javascript:$zopim.livechat.window.show();" style="text-decoration: none">
                                <i class="fa fa-comment fa-2x" style="color:#438BD7;"></i><br />Chat
                            </a>
                        </div>

                        <div class="col-sm-4 text-center">
                            <a href="mailto:&#104;&#101;&#108;&#108;&#111;&#64;&#99;&#97;&#108;&#98;&#117;&#105;&#108;&#100;&#101;&#114;&#115;&#114;&#105;&#115;&#107;&#46;&#99;&#111;&#109;" style="text-decoration: none">
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
            </div><!-- END Contact INFO -->

            <div class="card mt-3">
                <div class="card-header text-center">Documents
                </div>

                <div class="card-body">

                    <div class="row text-center">
                        <div class="col-sm-12 text-center">
                            <a href="./{{ $buildersRisk->display_id }}/download_app" target="_blank">
                                <h3>Application</h3>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
            <!-- END Documents -->
            <!-- ACTION BUTTONS -->
            @include('_submission/statusButtons', ['submission'=>$buildersRisk])

        </div>
    </div>
</div>



@endsection