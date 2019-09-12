@extends('layouts.app')

@section('title','Transportation Submissions')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crash Data VIN: {{ $crashs[0]->vehicle_id_number }}</div>

                <div class="card-body">

                    <h3>Vehicle Crash Report</h3>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Dot Number</th>
                                    <th scope="col">Report Date</th>
                                    <th scope="col">Report State</th>
                                    <th scope="col">Fatalities</th>
                                    <th scope="col">Injuries</th>
                                    <th scope="col">Tow Away</th>
                                    <th scope="col">Road Surface Condition</th>
                                    <th scope="col">Weather Condition</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($crashs) > 0)
                                @foreach ($crashs as $crash)
                                <tr>
                                    <th scope="row">{{$crash->dot_number}}</th>
                                    <td>{{$crash->report_date}}</td>
                                    <td>{{$crash->report_state}}</td>
                                    <td>{{$crash->fatalities}}</td>
                                    <td>{{$crash->injuries}}</td>
                                    <td>{{$crash->tow_away}}</td>
                                    <td>{{$crash->road_surface_condition_desc}}</td>
                                    <td>{{$crash->weather_condition_desc}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="100%" style="text-align: center"> No Data</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>


@endsection
