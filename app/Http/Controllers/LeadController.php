<?php

namespace App\Http\Controllers;

use App\Imports\LeadsImport;
use App\LeadFile;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function uploadForm()
    {
    	return view('upload');
    }

    public function doUpload(Request $request)
    {
    	$request->validate([
            'file' => 'required',
        ]);

        $file = $request->file('file')->store('importLead');

        $lead_file_batch = new LeadFile;
        $lead_file_batch->file = $file;
        $lead_file_batch->user_id = auth()->user()->id;
        $lead_file_batch->save();

        (new LeadsImport($lead_file_batch->id, $lead_file_batch->user_id))->import($file, false);

        return redirect()->route('uploadLead')->with('status-success', 'File uploaded successfully');
    }
}
