<?php

namespace App\Http\Controllers;

use App\Driver;
use App\TransportationSubmission;

use App\Exceptions\Model\CreateDriverException;

class DriversController extends Controller
{

    public function store(TransportationSubmission $transportation)
    {
        abort_unless($transportation, 404);

        request()->validate([
            'name_first' => ['required'],
            'name_last' => ['required'],
            'driver_license_state' => ['required'],
            'driver_license_number' => ['required'],
            'driver_date_of_birth' => ['required']
        ]);
        try {

            $transportation->drivers()->create([
                'transportation_submission_id' => $transportation->id,
                'name_first' => request('name_first'),
                'name_middle' => request('name_middle'),
                'name_last' => request('name_last'),
                'driver_license_state' => request('driver_license_state'),
                'driver_license_number' => request('driver_license_number'),
                'driver_date_of_birth' => request('driver_date_of_birth') ? date('Y-m-d', strtotime(request('driver_date_of_birth'))) : '',
                'driver_date_of_hire' => request('driver_date_of_hire') ? date('Y-m-d', strtotime(request('driver_date_of_hire'))) : '',
            ]);
        } catch (CreateDriverException $e) {
            return back()->withErrors(['driver_global' => json_decode($e->getMessage(), true)]);
        }

        return back();
    }
}
