<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Year;
use App\Models\SubmissionYear;
use App\Models\Folder;
use App\Models\RecentActivity; // Add this at the top
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

        // Count ACIC records
        $acicCount = Record::whereHas('folder', function ($query) {
            $query->where('name', 'LIKE', '%acic%');
        })
        ->where('exclude', 0)
        ->where('activate', 1)
        ->count();

        // Count MDS records
        $mdsCount = Record::whereHas('folder', function ($query) {
            $query->where('name', 'LIKE', '%mds%');
        })
        ->where('exclude', 0)
        ->where('activate', 1)
        ->count();

        // Count Completed records
        $completedCount = Record::where('status', 'COMPLETED')
            ->where('exclude', 0)
            ->where('activate', 1)
            ->count();

        // Count In-Progress records
        $inProgressCount = Record::where('status', 'IN_PROGRESS')
            ->where('exclude', 0)
            ->where('activate', 1)
            ->count();

        // Pass the records, folders, and counts to the view
        return view("admin.dashboard", compact('records', 'folders', 'acicCount', 'mdsCount', 'completedCount', 'inProgressCount'));
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

            // Log the activity for reusing a record
            RecentActivity::create([
                'activity' => 'Added new record in records table: <strong>' . $record->folder->name . '</strong> with ID#: <strong>' . $record->id . '</strong>'
            ]);
        } else {
            // Create a new record if no excluded one is found
            $record = Record::create([
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
            ]);

            // Log the activity for creating a new record
            RecentActivity::create([
                'activity' => 'Added new record in records table: <strong>' . $record->folder->name . '</strong> with ID#: <strong>' . $record->id . '</strong>'
            ]);

        }

        // Redirect with success message
        return redirect('admin/dashboard')->with('success', 'Record Created Successfully');
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

        // Find the existing record by ID
        $record = Record::findOrFail($id);
        $oldFolder = $record->folder->name; // Store the old folder name for logging

        // Update the record with the new data
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
        ]);

        // Log the activity for editing the record
        RecentActivity::create([
            'activity' => 'Edited record from records table: <strong>' . $oldFolder . '</strong> with ID#: <strong>' . $record->id . '</strong>'
        ]);


        return redirect()->route('admin.dashboard')->with('success', 'Record Updated Successfully');
    }

    public function destroy($id) {
        // Find the record by ID
        $record = Record::findOrFail($id);
        $folderName = $record->folder->name;

        // Mark the record as excluded (soft delete) and set activate to 0
        $record->update([
            'exclude' => 1, // Mark as excluded
            'activate' => 0, // Deactivate the record
        ]);

        RecentActivity::create([
            'activity' => 'Removed record on Records Table: <strong>' . $folderName . '</strong>' . ' with ID#: <strong>' . $record->id . '</strong>'
        ]);

        return redirect()->route('admin.dashboard')->with('deleted', 'Record Deleted Successfully');
    }


    public function acic_records()
    {
        // Fetch the first folder with "acic" in its name that is not excluded
        $acicFolder = Folder::where('name', 'LIKE', '%acic%')
            ->where('exclude', 0) // Ensure the folder is not excluded
            ->where('activate', 1) // Ensure the folder is active
            ->first();

        // If the folder exists, fetch records related to it
        $acicRecords = $acicFolder ? Record::where('folder_id', $acicFolder->id)
            ->where('exclude', 0) // Include only records that are not excluded
            ->where('activate', 1) // Include only active records
            ->get() : collect(); // Return an empty collection if no folder found

        $years = Year::all(); // Assuming you fetch all years
        $folders = Folder::where('name', 'LIKE', '%acic%')->get(); // Fetch only folders that include 'acic' in their name
        $submission_years = SubmissionYear::all(); // Assuming you fetch all submission years

        return view('admin.acic', compact('acicFolder', 'acicRecords', 'years', 'folders', 'submission_years'));
    }


    public function mds_records()
    {
        // Fetch the first folder with "mds" in its name that is not excluded
        $mdsFolder = Folder::where('name', 'LIKE', '%mds%')
            ->where('exclude', 0) // Ensure the folder is not excluded
            ->where('activate', 1) // Ensure the folder is active
            ->first(); // Use LIKE to find matching names

        // If the folder exists, fetch records related to it, ensuring records are not excluded and are active
        $mdsRecords = $mdsFolder ? Record::where('folder_id', $mdsFolder->id)
            ->where('exclude', 0) // Include only records that are not excluded
            ->where('activate', 1) // Include only active records
            ->get() : collect(); // Return an empty collection if no folder found

        $years = Year::all(); // Assuming you fetch all years
        $folders = Folder::where('name', 'LIKE', '%mds%')->get(); // Fetch only folders that include 'mds' in their name
        $submission_years = SubmissionYear::all(); // Assuming you fetch all submission years

        return view('admin.mds', compact('mdsFolder', 'mdsRecords', 'years', 'folders', 'submission_years'));
    }











}
