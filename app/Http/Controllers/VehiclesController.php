<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\TransportationSubmission;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function store(TransportationSubmission $transportation)
    {
        abort_unless($transportation, 404);
        request()->validate([
            'vehicle_vehicle_id_number' => ['required'],
            'vehicle_year' => ['required', 'integer'],
            'vehicle_make' => ['required'],
            'vehicle_model' => ['required'],
            'vehicle_value' => ['required', 'integer']
        ]);

        $transportation->vehicles()->Create([
            'transportation_submission_id' => $transportation->id,
            'vehicle_id_number' => request('vehicle_vehicle_id_number'),
            'year' => request('vehicle_year'),
            'make' => request('vehicle_make'),
            'model' => request('vehicle_model'),
            'value' => request('vehicle_value')
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
