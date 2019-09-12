<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransportationSubmission;

class TrailersController extends Controller
{

    public function store(TransportationSubmission $transportation)
    {
        abort_unless($transportation, 404);
        request()->validate([
            'trailer_vehicle_id_number' => ['required'],
            'trailer_year' => ['required', 'integer'],
            'trailer_make' => ['required'],
            'trailer_model' => ['required'],
            'trailer_value' => ['required', 'integer']
        ]);

        $transportation->trailers()->Create([
            'transportation_submission_id' => $transportation->id,
            'vehicle_id_number' => request('trailer_vehicle_id_number'),
            'year' => request('trailer_year'),
            'make' => request('trailer_make'),
            'model' => request('trailer_model'),
            'value' => request('trailer_value')
        ]);

        return back();
    }

    public function vinCrashDetails(Vehicle $vehicle)
    {
        abort_unless($vehicle, 404);
        $crashs = $vehicle->getFmcsaCrashs();
        return view('transportation.crash', compact('crashs'));
    }
}
