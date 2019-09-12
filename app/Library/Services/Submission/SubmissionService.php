<?php

namespace App\Library\Services\Submission;

use App\SubmissonFileInterface;
use App\SubmissonInterface;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;


final class SubmissionService
{

    public function download(SubmissonInterface $submission, $viewName,  $fileName)
    {
        abort_unless($submission && ($submission->user == auth()->user() || auth()->user()->canViewAllSubmissions()), 404);


        $pdf = PDF::loadView(
            $viewName,
            ['submission' => $submission],
            [],
            [
                'title' => ' Quote',
                'margin_top' => 35
            ]
        );
        return $pdf->stream($fileName);
    }



    public function bind(SubmissonInterface $submisson)
    {
        //Bind:  Users with permission can "Approve Bind"
        abort_unless($submisson && auth()->user()->canApproveBind(), 404);
        $submisson->bind();
        $submisson->save();
        return back();
    }

    public function bindRequest(SubmissonInterface $submisson)
    {
        // Request Bind:  Users without permission can "Request to Bind" 
        abort_unless($submisson, 404);
        $submisson->bindRequest();
        $submisson->save();
        return back();
    }

    public function quote(SubmissonInterface $submisson)
    {
        //Approve Quote:  Users with permission can "Approve Quote"
        abort_unless($submisson && auth()->user()->canApproveBind(), 404);
        $submisson->quote();
        $submisson->save();
        return back();
    }

    public function quoteRequest(SubmissonInterface $submisson)
    {
        //Request Quote:  Users without permission can "Request Quote"
        abort_unless($submisson, 404);
        $submisson->quoteRequest();
        $submisson->save();
        return back();
    }



    public function addFile(SubmissonInterface $submisson, $downloadRoute, $deleteRoute)
    {
        abort_unless($submisson, 404);
        $maxSize = env('MAX_UPLOAD_FILE_SIZE', 20) * 1024 * 1024;
        request()->validate([
            'file' => ['required', 'mimes:jpeg,png,jpg,gif,xlsx,xls,doc,docs,csv,pdf', 'max:' . $maxSize]
        ]);
        $path = Storage::disk('s3')->put($submisson->getFilesDirName() . '/' . $submisson->getDisplayId() . '/Documents', request()->file('file'));
        if ($path) {
            $file = $submisson->addFile(['name' => request()->get('name'), 'token' => $path]);
            return  response()->json([
                'deleteLink'   => route($deleteRoute, ['transportationFile' => $file->id]),
                'downloadLink'   => route($downloadRoute, ['transportationFile' => $file->id]),
                'file_id' => $file->id,
            ]);
        } else {
            abort(409, "upload failed");
        }
    }
    public function downloadFile(SubmissonFileInterface $submissonFile)
    {
        abort_unless($submissonFile && $submissonFile->getSubmission(), 404);

        return Storage::disk('s3')->download($submissonFile->getFilePath(), $submissonFile->getFileName());
    }
    public function deleteFile(SubmissonFileInterface $submissonFile)
    {
        abort_unless($submissonFile && Auth::check() && $submissonFile->getSubmission() &&  Auth::user()->canDeleteSubmissionFiles($submissonFile->getSubmission()), 404);
        $fileDirs = explode("/", $submissonFile->getFilePath());
        Storage::disk('s3')->move(
            $submissonFile->getFilePath(),
            $submissonFile->getSubmission()->getFilesDirName() . '/' . $submissonFile->getSubmission()->display_id . '/Archived/' . $fileDirs[count($fileDirs) - 1]
        );

        $submissonFile->delete();

        return response()->json(true);
    }
}
