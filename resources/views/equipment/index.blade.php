@extends('layouts.app')

@section('title','Transportation Submissions')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Equipment') }}</div>

                <div class="card-body">

                    <a href="./equipment/create" class="btn btn-primary btn-lg">New Quote</a>
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
                                @foreach ($equipments as $equipment)
                                <tr>
                                    <th scope="row">
                                        <a href="./equipment/{{ $equipment->display_id }}">{{ $equipment->display_id }}</a>
                                    </th>
                                    <td>{{ $equipment->named_insured }}</td>
                                    <td>{{ $equipment->mailing_city }}</td>
                                    <td>{{ $equipment->mailing_state }}</td>
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