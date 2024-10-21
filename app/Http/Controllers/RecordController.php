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
        $years = Year::orderBy('year', 'desc')->get(); // Fetch years in descending order
        $submission_years = SubmissionYear::orderBy('year', 'desc')->get(); // Fetch submission years in descending order
        $folders = Folder::where('exclude', 0)->get(); // Assuming 'exclude' column indicates if the folder is active

        return view('admin.dashboard_create_record', compact('years', 'submission_years', 'folders'));
    }


    // Store a newly created record in storage
    public function store(Request $request) {
        // Validate the request data
        $request->validate([
            'year_id' => 'required|integer|exists:years,id',
            'month' => 'required|string|in:01,02,03,04,05,06,07,08,09,10,11,12',
            'folder_id' => 'required|integer|exists:folders,id',
            'folder_type' => 'required|string|in:acic,check',
            'folder_description' => 'required|string',
            'submission_year_id' => 'required|integer|exists:submission_years,id',
            'submission_month' => 'required|string|in:01,02,03,04,05,06,07,08,09,10,11,12',
            'status' => 'required|string|in:in_progress,completed',
            'others' => 'required|string',
            'remarks' => 'nullable|string',
        ], [
            'year_id.required' => 'You must choose a year from the dropdown.',
            'month.required' => 'You must choose a month from the dropdown.',
            'folder_id.required' => 'You must choose a folder from the dropdown.',
            'folder_type.required' => 'You must choose a folder type from the dropdown.',
            'folder_description.required' => 'Folder description is required.',
            'submission_year_id.required' => 'You must choose a submission year from the dropdown.',
            'submission_month.required' => 'You must choose a submission month from the dropdown.',
            'status.required' => 'You must choose a status from the dropdown.',
            'others.required' => 'The "Others" field is required.',
        ]);

        // Save the record
        $record = new Record();
        $record->year_id = $request->year_id;
        $record->month = $request->month;
        $record->folder_id = $request->folder_id;
        $record->folder_type = $request->folder_type;
        $record->folder_description = $request->folder_description;
        $record->submission_year_id = $request->submission_year_id;
        $record->submission_month = $request->submission_month;
        $record->status = $request->status;
        $record->others = $request->others;

        // Save remarks if present
        if ($request->filled('remarks')) {
            $record->remarks = $request->remarks;
        }

        $record->save();

        // Redirect with success message
        return redirect('admin/dashboard')->with('message', 'Record Created Successfully');
    }



    // Edit method - show the form for editing the record
    public function edit($id)
    {
        // Retrieve the record to be edited, or fail if it doesn't exist
        $record = Record::findOrFail($id);

        // Retrieve the necessary data for the dropdowns (years, submission years, folders)
        $years = Year::all();
        $submission_years = SubmissionYear::all();
        $folders = Folder::all();

        // Return the edit view with the record and necessary data
        return view('admin.dashboard_edit_record', compact('record', 'years', 'submission_years', 'folders'));
    }


    // Update method - save the updated record to the database
    public function update(Request $request, $id) {
        $request->validate([
            'year_id' => 'required|integer',
            'month' => 'required|string',
            'folder_id' => 'required|integer',
            'folder_type' => 'required|string',
            'folder_description' => 'required|string',
            'submission_year_id' => 'required|integer',
            'submission_month' => 'required|string',
            'status' => 'required|string',
            'others' => 'required|string',
        ]);

        $record = Record::findOrFail($id);
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

        return redirect()->route('admin.dashboard')->with('message', 'Record Updated Successfully');
    }


}
