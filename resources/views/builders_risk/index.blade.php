@extends('layouts.app')

@section('title','Transportation Submissions')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Builders Risk') }}</div>

                <div class="card-body">
                
                    <a href="./builders-risk/create" class="btn btn-primary btn-lg">New Quote</a>
                    <br /><br />
                    
                    @if(Auth::check())
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Submission #</th>
                                    <th scope="col">Insured Name</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Jobsite City</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buildersRisks as $buildersRisk)
                                <tr>
                                    <th scope="row">
                                        <a href="./builders-risk/{{ $buildersRisk->display_id }}">{{ $buildersRisk->display_id }}</a>
                                    </th>
                                    <td>{{ $buildersRisk->named_insured }}</td>
                                    <td>{{ $buildersRisk->project_name }}</td>
                                    <td>{{ $buildersRisk->jobsite_city }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <a href="./login">
                        Click here to login and see past submissions
                    </a>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
