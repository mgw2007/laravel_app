@extends('layouts.app')

@section('title','Transportation Submissions')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transportation Submissions') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary btn-lg" href="./transportation/create">New Quote</a>
                    <br /><br />
                    @if(Auth::check())
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Submission #</th>
                                    <th scope="col">DOT Number</th>
                                    <th scope="col">Legal Name</th>
                                    <th scope="col">City</th>
                                    <th scope="col">State</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transportationSubmissions as $transportationSubmission)
                                <tr>
                                    <th scope="row"><a
                                            href="./transportation/{{ $transportationSubmission->display_id }}">{{ $transportationSubmission->display_id }}</a>
                                    </th>
                                    <td>{{ $transportationSubmission->dot_number }}</td>
                                    <td>{{ $transportationSubmission->legal_name }}</td>
                                    <td>{{ $transportationSubmission->phy_city }}</td>
                                    <td>{{ $transportationSubmission->phy_state }}</td>
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
