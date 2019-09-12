<?php

namespace App\Http\Controllers;

use App\Library\Services\Submission\SubmissionService;
use App\TransportationSubmission;
use App\TransportationSubmissionFile;
use PDF;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class TransportationSubmissionsController extends Controller
{
    /**
     * @var SubmissionService
     */
    private $submissionService;
    public function __construct(SubmissionService $submissionService)
    {
        $this->submissionService = $submissionService;
    }
    public function index()
    {
        if (\Auth::check()) {
            if (auth()->user()->canViewAllSubmissions()) {
                return view('transportation.index', ['transportationSubmissions' => TransportationSubmission::all()]);
            } else {
                return view('transportation.index', ['transportationSubmissions' => auth()->user()->transportationSubmissions]);
            }
        } else {
            return view('transportation.index');
        }
    }

    public function create()
    {
        return view('transportation.create');
    }

    public function show(TransportationSubmission $transportation)
    {

        abort_unless($transportation && \Auth::check() && ($transportation->user == auth()->user() || auth()->user()->canViewAllSubmissions()), 404);
        return view('transportation.show', compact('transportation'));
    }

    public function edit()
    {
        return 'hello';
    }

    public function update()
    { }

    public function destroy()
    { }

    public function store()
    {
        request()->validate([
            'dot_number' => ['required', 'integer'],
            'value_power_units' => ['required', 'integer'],
            'value_trailers' => ['required', 'integer'],
            'years_business' => ['required', 'integer'],
            'annual_revenue' => ['required', 'integer'],
            'annual_mileage' => ['required', 'integer'],
            'total_losses_for_prior_3_years' => ['numeric'],
            'top_states_insured_hauls' => ['required'],
            'commodity_1_percentage' => [
                'min:0', 'max:100',
                function ($attribute, $value, $fail) {
                    $status = Input::get('commodity_1'); // Retrieve status
                    if ($status && !$value) {
                        return $fail("The commodity 1 percentage field is required");
                    }
                    if ($value && !is_numeric($value)) {
                        return $fail("The commodity 1 percentage must be a number.");
                    }
                    return true;
                }
            ],
            'commodity_2_percentage' => [
                'min:0', 'max:100',
                function ($attribute, $value, $fail) {
                    $status = Input::get('commodity_2'); // Retrieve status
                    if ($status && !$value) {
                        return $fail("The commodity 2 percentage field is required");
                    }
                    if ($value && !is_numeric($value)) {
                        return $fail("The commodity 2 percentage must be a number.");
                    }
                    return true;
                }
            ],
            'commodity_3_percentage' => [
                'min:0', 'max:100',
                function ($attribute, $value, $fail) {
                    $status = Input::get('commodity_3'); // Retrieve status
                    if ($status && !$value) {
                        return $fail("The commodity 3 percentage field is required");
                    }
                    if ($value && !is_numeric($value)) {
                        return $fail("The commodity 3 percentage must be a number.");
                    }
                    return true;
                }
            ],
            'loss_paid_year5' => ['required', 'integer'],
            'loss_count_year5' => ['required', 'integer'],
            'loss_paid_year4' => ['required', 'integer'],
            'loss_count_year4' => ['required', 'integer'],
            'loss_paid_year3' => ['required', 'integer'],
            'loss_count_year3' => ['required', 'integer'],
            'loss_paid_year2' => ['required', 'integer'],
            'loss_count_year2' => ['required', 'integer'],
            'loss_paid_year1' => ['required', 'integer'],
            'loss_count_year1' => ['required', 'integer'],
            'agree_terms' => ['required'],
            'email' => auth()->user() ? [] : ['required', 'email']
        ]);
        if (auth()->user()) {
            auth()->user()->addTransportationSubmission(request()->all());
        } else {
            TransportationSubmission::create(request()->all());
        }

        return redirect('/transportation');
    }

    public function download(TransportationSubmission $submission)
    {
        return $this->submissionService->download($submission, 'transportation.quotepdf',  'MyQuote.pdf');
    }

    public function downloadBinder(TransportationSubmission $submission)
    {
        abort_unless($submission, 404);

        $pdf = PDF::loadView('transportation.pdfbinder', compact('transportation'));
        return $pdf->stream('Binder.pdf');
    }

    public function downloadPolicy(TransportationSubmission $submission)
    {
        abort_unless($submission, 404);

        $pdf = PDF::loadView('transportation.pdfpolicy', compact('transportation'));
        return $pdf->stream('Policy.pdf');
    }

    public function downloadCertificates(TransportationSubmission $submission)
    {
        abort_unless($submission, 404);

        $pdf = PDF::loadView('transportation.pdfcertificate', compact('transportation'));
        return $pdf->stream('Certificates.pdf');
    }

    public function downloadInvoice(TransportationSubmission $submission)
    {
        abort_unless($submission, 404);

        $pdf = PDF::loadView('transportation.pdfinvoice', compact('transportation'));
        return $pdf->stream('Invoice.pdf');
    }

    public function bind(TransportationSubmission $submission)
    {
        return $this->submissionService->bind($submission);
    }

    public function bindRequest(TransportationSubmission $submission)
    {
        return $this->submissionService->bindRequest($submission);
    }

    public function quote(TransportationSubmission $submission)
    {
        return $this->submissionService->quote($submission);
    }

    public function quoteRequest(TransportationSubmission $submission)
    {
        return $this->submissionService->quoteRequest($submission);
    }

    public function saveUnderwriting(TransportationSubmission $submission)
    {
        abort_unless($submission && auth()->user()->canViewAllSubmissions(), 404);
        $submission->update(request()->all());
        return back();
    }

    public function saveRates(TransportationSubmission $submission)
    {
        abort_unless($submission && auth()->user()->canViewAllSubmissions(), 404);
        request()->validate([
            'rate_apd' => ['numeric', 'nullable'],
            'deductible_apd' => ['numeric', 'nullable'],
            'rate_mtc_100' => ['numeric', 'nullable'],
            'deductible_mtc_100' => ['numeric', 'nullable'],
            'rate_mtc_250' => ['numeric', 'nullable'],
            'deductible_mtc_250' => ['numeric', 'nullable'],
            'rate_mtc_500' => ['numeric', 'nullable'],
            'deductible_mtc_500' => ['numeric', 'nullable'],
            'rate_mtc_ref' => ['numeric', 'nullable'],
            'deductible_mtc_ref' => ['numeric', 'nullable'],
        ]);
        $submission->update(request()->all());
        return back();
    }

    public function addFile(TransportationSubmission $transportation)
    {
        return $this->submissionService->addFile($transportation, 'transportation.downloadFile', 'transportation.deleteFile');
    }
    public function downloadFile(TransportationSubmissionFile $transportationFile)
    {
        return $this->submissionService->downloadFile($transportationFile);
    }
    public function deleteFile(TransportationSubmissionFile $transportationFile)
    {
        return $this->submissionService->deleteFile($transportationFile);
    }
}
