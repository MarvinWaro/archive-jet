<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Year;
use App\Models\SubmissionYear;
use App\Models\Folder;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function index() {
        // Get the records with eager loading of year and submission year
        $records = Record::with(['year', 'submissionYear'])->get();
        // Pass the records and counts to the view
        return view("admin.dashboard", compact('records'));
    }


    public function create() {
        $years = Year::all(); // Fetch years in descending order
        $submission_years = SubmissionYear::all(); // Fetch submission years in descending order
        $folders = Folder::where('exclude', 0)->get(); // Assuming 'exclude' column indicates if the folder is active

        return view('admin.dashboard_create_record', compact('years', 'submission_years', 'folders'));
    }

    // Store a newly created record in storage
    public function store(Request $request) {
        $request->validate([
            'year_id' => 'required',
            'month' => 'required',
            'folder_id' => 'required',
            'folder_type' => 'required',
            'folder_description' => 'required',
            'submission_year_id' => 'required',
            'submission_month' => 'required',
            'status' => 'required',
            'others' => 'required',
        ]);

        $record = new Record;
        $record->year_id = $request->year_id;
        $record->month = $request->month;
        $record->folder_id = $request->folder_id;
        $record->folder_type = $request->folder_type;
        $record->folder_description = $request->folder_description;
        $record->submission_year_id = $request->submission_year_id;
        $record->submission_month = $request->submission_month;
        $record->status = $request->status;
        $record->others = $request->others;
        $record->remarks = $request->remarks;

        $record->save();

        return redirect('admin/dashboard')->with('message', 'Record Created Successfully');
    }

}
