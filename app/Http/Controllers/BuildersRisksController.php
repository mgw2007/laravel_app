<?php

namespace App\Http\Controllers;

use App\BuildersRisk;
use App\BuildersRiskFile;
use App\Library\Services\Submission\SubmissionService;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

class BuildersRisksController extends Controller
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
                return view('builders_risk.index', ['buildersRisks' => BuildersRisk::all()]);
            } else {
                return view('builders_risk.index', ['buildersRisks' => auth()->user()->buildersRisks]);
            }
        } else {
            return view('builders_risk.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('builders_risk.create');
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
            // 'dot_number' => ['required', 'integer'],
            'named_insured' => ['required', 'max:255'],
            'mailing_address' => ['required', 'max:128'],
            'mailing_city' => ['required', 'max:128'],
            'mailing_state' => ['required', 'max:20'],
            'mailing_zip' => ['required', 'max:20'],
            'project_name' => ['required', 'max:255'],
            'project_start_date' => ['required', 'date'], //date
            'project_end_date' => ['required', 'date'], //date
            'jobsite_address' => ['required', 'max:255'],
            'jobsite_city' => ['required', 'max:128'],
            'jobsite_state' => ['required', 'max:20'],
            'jobsite_zip' => ['required', 'max:20'],
            'number_of_buildings' => ['required', 'integer'], //number
            'construction_type' => ['required', 'max:255'],
            'percent_of_structural_elements_that_are_wood_frame' => ['required', 'numeric'],
            'sq_ft' => ['required', 'integer'],
            'stores_above_ground' => ['required', 'integer'],
            'jobsite_within_50_ft_of_water' => ['required', 'numeric'],
            'project_description' => ['required', 'max:350'],
            'intended_occupancy' => ['required', 'max:255'],
            'grond_up_construction_or_renovation' => ['required', 'max:255'],
            'public_protection_class' => ['numeric'],
            'list_site_security_and_theft_controls' => ['required'],
            'list_any_unique_architecture_or_engineering_features' => ['required'],
            'contractor_ame' => ['required', 'max:255'],
            'contractor_experience_with_similar_projects' => ['required'],
            'list_loss_payee_or_mortgagees' => ['required'],
            'total_hard_cost_physical_damage_limit' => ['required', 'integer'], //number
            'new_construction_value' => ['required', 'integer'], //number
            'renovation_value' => ['required', 'integer'], //number
            'existing_building_shell_structure' => ['required', 'integer'], //number
            'total_soft_cost' => ['required', 'integer'], //number
            'total_loss_of_revenue_or_rents' => ['required', 'integer'], //number
            'flood_limit' => ['required', 'integer'], //number
            'earthquake_limit' => ['required', 'integer'], //number
            'agree_terms' => ['required'],
            'email' => auth()->user() ? [] : ['required', 'email']
        ]);
        $data = request()->all();
        $data['project_start_date'] = request('project_start_date') ? date('Y-m-d', strtotime(request('project_start_date'))) : '';
        $data['project_end_date'] = request('project_end_date') ? date('Y-m-d', strtotime(request('project_end_date'))) : '';
        if (auth()->user()) {
            auth()->user()->addBuildersRisk($data);
        } else {
            BuildersRisk::create($data);
        }

        return redirect('/builders-risk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BuildersRisk  $buildersRisk
     * @return \Illuminate\Http\Response
     */
    public function show(BuildersRisk $buildersRisk)
    {
        abort_unless($buildersRisk && \Auth::check() &&  ($buildersRisk->user == auth()->user() || auth()->user()->canViewAllSubmissions()), 404);

        return view('builders_risk.show', compact('buildersRisk'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BuildersRisk  $buildersRisk
     * @return \Illuminate\Http\Response
     */
    public function edit(BuildersRisk $buildersRisk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BuildersRisk  $buildersRisk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuildersRisk $buildersRisk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BuildersRisk  $buildersRisk
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuildersRisk $buildersRisk)
    {
        //
    }
    public function downloadApp(BuildersRisk $submission)
    {
        return $this->submissionService->download($submission, 'builders_risk.pdfapp', 'BuildersRiskApp.pdf');
    }




    public function bind(BuildersRisk $buildersRisk)
    {
        return $this->submissionService->bind($buildersRisk);
    }

    public function bindRequest(BuildersRisk $buildersRisk)
    {
        return $this->submissionService->bindRequest($buildersRisk);
    }

    public function quote(BuildersRisk $buildersRisk)
    {
        return $this->submissionService->quote($buildersRisk);
    }

    public function quoteRequest(BuildersRisk $buildersRisk)
    {
        return $this->submissionService->quoteRequest($buildersRisk);
    }

    public function addFile(BuildersRisk $buildersRisk)
    {
        return $this->submissionService->addFile($buildersRisk, 'buildersRisk.downloadFile', 'buildersRisk.deleteFile');
    }
    public function downloadFile(BuildersRiskFile $buildersRiskFile)
    {
        return $this->submissionService->downloadFile($buildersRiskFile);
    }
    public function deleteFile(BuildersRiskFile $buildersRiskFile)
    {
        return $this->submissionService->deleteFile($buildersRiskFile);
    }
}
