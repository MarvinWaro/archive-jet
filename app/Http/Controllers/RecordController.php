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
        $records = Record::with(['year', 'submissionYear'])
            ->where('exclude', 0) // Only include records that are not excluded
            ->where('activate', 1) // Only include records that are active
            ->get();

        // Fetch folders that are not excluded and are active
        $folders = Folder::where('exclude', 0)->where('activate', 1)->get();

        // Pass the records and folders to the view
        return view("admin.dashboard", compact('records', 'folders'));
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

        // Check for excluded record to reuse its ID
        $record = Record::where('exclude', 1)->first();

        if ($record) {
            // Reuse the excluded record by updating it
            $record->update([
                'year_id' => $request->year_id,
                'month' => $request->month,
                'folder_id' => $request->folder_id,
                'folder_type' => $request->folder_type,
                'folder_description' => $request->folder_description,
                'submission_year_id' => $request->submission_year_id,
                'submission_month' => $request->submission_month,
                'status' => $request->status,
                'others' => $request->others,
                'remarks' => $request->remarks,
                'exclude' => 0, // Mark as active
                'activate' => 1, // Ensure the record is active again
            ]);
        } else {
            // Create a new record if no excluded one is found
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
        }

        // Redirect with success message
        return redirect('admin/dashboard')->with('message', 'Record Created Successfully');
    }





    // Edit method - show the form for editing the record
    public function edit($id)
    {
        // Retrieve the record to be edited, or fail if it doesn't exist
        $record = Record::findOrFail($id);

        // Retrieve the necessary data for the dropdowns (years, submission years, folders)
        $years = Year::orderBy('year', 'desc')->get(); // Fetch years in descending order
        $submission_years = SubmissionYear::orderBy('year', 'desc')->get(); // Fetch submission years in descending order
        $folders = Folder::where('exclude', 0)->get(); // Assuming 'exclude' column indicates if the folder is active

        // Return the edit view with the record and necessary data
        return view('admin.dashboard_edit_record', compact('record', 'years', 'submission_years', 'folders'));
    }


    // Update method - save the updated record to the database
    public function update(Request $request, $id) {
        $request->validate([
            'year_id' => 'required|integer|exists:years,id',
            'month' => 'required|string|in:01,02,03,04,05,06,07,08,09,10,11,12',
            'folder_id' => 'required|integer|exists:folders,id',
            'folder_type' => 'required|string|in:acic,check',
            'folder_description' => 'required|string',
            'submission_year_id' => 'required|integer|exists:submission_years,id',
            'submission_month' => 'required|string|in:01,02,03,04,05,06,07,08,09,10,11,12',
            'status' => 'required|string|in:in_progress,completed', // This line matches the values in your form
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

    public function destroy($id) {
        // Find the record by ID
        $record = Record::findOrFail($id);

        // Mark the record as excluded (soft delete) and set activate to 0
        $record->update([
            'exclude' => 1, // Mark as excluded
            'activate' => 0, // Deactivate the record
        ]);

        // Redirect back to the dashboard with a success message
        return redirect()->route('admin.dashboard')->with('message', 'Record Deleted Successfully');
    }




}
