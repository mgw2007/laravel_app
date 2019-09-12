<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentFile;
use App\Library\Services\Submission\SubmissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class EquipmentController extends Controller
{
    /**
     * @var SubmissionService
     */
    private $submissionService;

    public function __construct(SubmissionService $submissionService)
    {
        $this->submissionService = $submissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::check()) {
            if (auth()->user()->canViewAllSubmissions()) {
                return view('equipment.index', ['equipments' => Equipment::all()]);
            } else {
                return view('equipment.index', ['equipments' => auth()->user()->equipments]);
            }
        } else {
            return view('equipment.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipment.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'named_insured' => ['required', 'max:255'],
            'mailing_street' => ['required', 'max:128'],
            'mailing_city' => ['required', 'max:128'],
            'mailing_state' => ['required', 'max:20'],
            'mailing_zip' => ['required', 'max:20'],
            'contractor_type' => ['required', 'max:255'],
            'contractor_description' => ['required', 'max:255'],
            'yard_address' => ['required'],
            'lease_rent_loan_average_year' => ['required', 'integer'],
            'loss_paid_year3' => ['required', 'integer'],
            'loss_count_year3' => ['required', 'integer'],
            'loss_paid_year2' => ['required', 'integer'],
            'loss_count_year2' => ['required', 'integer'],
            'loss_paid_year1' => ['required', 'integer'],
            'loss_count_year1' => ['required', 'integer'],
            'scheduled_tiv' => ['required', 'integer'],
            'leased_rental_limit' => ['required', 'integer'],
            'unscheduled_limit' => ['required', 'integer'],
            'agree_terms' => ['required'],
            'email' => auth()->user() ? [] : ['required', 'email']
        ]);
        $data = request()->all();
        if (auth()->user()) {
            auth()->user()->addEquipment($data);
        } else {
            Equipment::create($data);
        }

        return redirect('/equipment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        abort_unless($equipment && \Auth::check() &&  ($equipment->user == auth()->user() || auth()->user()->canViewAllSubmissions()), 404);

        return view('equipment.show', compact('equipment'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        //
    }


    public function downloadApp(Equipment $equipment)
    {
        return $this->submissionService->download($equipment, 'equipment.pdfapp',  'EquipmentApp.pdf');
    }


    public function bind(Equipment $equipment)
    {
        return $this->submissionService->bind($equipment);
    }

    public function bindRequest(Equipment $equipment)
    {
        return $this->submissionService->bindRequest($equipment);
    }

    public function quote(Equipment $equipment)
    {
        return $this->submissionService->quote($equipment);
    }

    public function quoteRequest(Equipment $equipment)
    {
        return $this->submissionService->quoteRequest($equipment);
    }

    public function addFile(Equipment $equipment)
    {
        return $this->submissionService->addFile($equipment, 'equipment.downloadFile', 'equipment.deleteFile');
    }
    public function downloadFile(EquipmentFile $equipmentFile)
    {
        return $this->submissionService->downloadFile($equipmentFile);
    }
    public function deleteFile(EquipmentFile $equipmentFile)
    {
        return $this->submissionService->deleteFile($equipmentFile);
    }
}
