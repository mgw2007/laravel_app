<?php

namespace App\Http\Controllers;

use App\TransportationSubmission;
use App\TransportationSubmissionFile;
use PDF;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class TransportationSubmissionsController_copy extends Controller
{
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
        abort_unless($transportation && ($transportation->user == auth()->user() || auth()->user()->canViewAllSubmissions()), 404);
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

    public function download(TransportationSubmission $transportation)
    {
        abort_unless($transportation && ($transportation->user == auth()->user() || auth()->user()->canViewAllSubmissions()), 404);


        $pdf = PDF::loadView(
            'transportation.quotepdf',
            compact('transportation'),
            [],
            [
                'title' => ' Quote',
                'margin_top' => 35
            ]
        );
        return $pdf->stream('MyQuote.pdf');
    }

    public function downloadBinder(TransportationSubmission $transportation)
    {
        abort_unless($transportation, 404);

        $pdf = PDF::loadView('transportation.pdfbinder', compact('transportation'));
        return $pdf->stream('Binder.pdf');
    }

    public function downloadPolicy(TransportationSubmission $transportation)
    {
        abort_unless($transportation, 404);

        $pdf = PDF::loadView('transportation.pdfpolicy', compact('transportation'));
        return $pdf->stream('Policy.pdf');
    }

    public function downloadCertificates(TransportationSubmission $transportation)
    {
        abort_unless($transportation, 404);

        $pdf = PDF::loadView('transportation.pdfcertificate', compact('transportation'));
        return $pdf->stream('Certificates.pdf');
    }

    public function downloadInvoice(TransportationSubmission $transportation)
    {
        abort_unless($transportation, 404);

        $pdf = PDF::loadView('transportation.pdfinvoice', compact('transportation'));
        return $pdf->stream('Invoice.pdf');
    }

    public function bind(TransportationSubmission $transportation)
    {
        //Bind:  Users with permission can "Approve Bind"
        abort_unless($transportation && auth()->user()->canApproveBind(), 404);
        $transportation->bind();
        $transportation->save();
        return back();
    }

    public function bindRequest(TransportationSubmission $transportation)
    {
        // Request Bind:  Users without permission can "Request to Bind" 
        abort_unless($transportation, 404);
        $transportation->bindRequest();
        $transportation->save();
        return back();
    }

    public function quote(TransportationSubmission $transportation)
    {
        //Approve Quote:  Users with permission can "Approve Quote"
        abort_unless($transportation && auth()->user()->canApproveBind(), 404);
        $transportation->quote();
        $transportation->save();
        return back();
    }

    public function quoteRequest(TransportationSubmission $transportation)
    {
        //Request Quote:  Users without permission can "Request Quote"
        abort_unless($transportation, 404);
        $transportation->quoteRequest();
        $transportation->save();
        return back();
    }

    public function saveUnderwriting(TransportationSubmission $transportation)
    {
        abort_unless($transportation && auth()->user()->canViewAllSubmissions(), 404);
        $transportation->update(request()->all());
        return back();
    }

    public function saveRates(TransportationSubmission $transportation)
    {
        abort_unless($transportation && auth()->user()->canViewAllSubmissions(), 404);
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
        $transportation->update(request()->all());
        return back();
    }

    public function addFile(TransportationSubmission $transportation)
    {
        abort_unless($transportation, 404);
        // abort_unless($transportation, 404);
        $maxSize = env('MAX_UPLOAD_FILE_SIZE', 20) * 1024 * 1024;
        request()->validate([
            'file' => ['required', 'mimes:jpeg,png,jpg,gif,xlsx,xls,doc,docs,csv,pdf', 'max:' . $maxSize]
        ]);

        $path = Storage::disk('s3')->put('Transportation/' . $transportation->display_id . '/Documents', request()->file('file'));
        if ($path) {
            $transportationFile = $transportation->addFile(['name' => request()->get('name'), 'token' => $path]);
            return  response()->json([
                'deleteLink'   => route('transportation.deleteFile', ['transportationFile' => $transportationFile->id]),
                'downloadLink'   => route('transportation.downloadFile', ['transportationFile' => $transportationFile->id]),
                'file_id' => $transportationFile->id,
            ]);
        } else {
            abort(409, "upload failed");
        }
    }
    public function downloadFile(TransportationSubmissionFile $transportationFile)
    {
        abort_unless($transportationFile && $transportationFile->transportationSubmission, 404);

        return Storage::disk('s3')->download($transportationFile->token, $transportationFile->name);
    }
    public function deleteFile(TransportationSubmissionFile $transportationFile)
    {
        abort_unless($transportationFile && $transportationFile->transportationSubmission, 404);
        $fileDirs = explode("/", $transportationFile->token);
        Storage::disk('s3')->move($transportationFile->token, 'Transportation/' . $transportationFile->transportationSubmission->display_id . '/Archived/' . $fileDirs[count($fileDirs) - 1]);

        $transportationFile->delete();

        return response()->json(true);
    }
}
