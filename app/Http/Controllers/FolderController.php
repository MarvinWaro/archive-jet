<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\RecentActivity; // Add this at the top
use App\Models\Record;


class FolderController extends Controller
{
    // Display a listing of the folders
    public function index()
    {
        // Fetch only folders that are not excluded and are active
        $folders = Folder::where('exclude', 0)->where('activate', 1)->get();

        return view('admin.folders', compact('folders'));
    }

    // Show the form for creating a new folder
    public function create()
    {
        return view('admin.create_folder');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:folders,name', // Ensure name is unique in the folders table
        ], [
            'name.required' => 'Please enter a folder name.',
            'name.max' => 'Folder name must not exceed 255 characters.',
            'name.unique' => 'The folder name has already been taken.', // Custom message for uniqueness
        ]);

        // Convert the folder name to uppercase
        $folderName = strtoupper($request->name);

        // Check for an excluded folder to reuse
        $folder = Folder::where('exclude', 1)->first();

        if ($folder) {
            // Reuse the excluded folder
            $folder->update([
                'name' => $folderName,
                'exclude' => 0, // Reactivate the folder
                'activate' => 1, // Ensure the folder is active again
            ]);

            // Log the activity
            RecentActivity::create([
                'activity' => 'Added new folder: <strong>' . $folder->name . '</strong>'  . ' with ID#: <strong>' . $folder->id . '</strong>'
            ]);

        } else {
            // Create a new folder if no excluded one is found
            $folder = Folder::create([
                'name' => $folderName,
                'activate' => 1, // New folders should be active by default
            ]);

            // Log the activity
            RecentActivity::create([
                'activity' => 'Added new folder: <strong>' . $folder->name . '</strong>'  . ' with ID#: <strong>' . $folder->id . '</strong>'
            ]);
        }

        return redirect()->route('admin.folders')
            ->with('success', 'New Folder name saved successfully.');
    }

    // Show the form for editing a folder
    public function edit($id) // Changed to accept $id instead of Folder
    {
        $folder = Folder::findOrFail($id); // Find the folder by ID
        return view('admin.edit_folder', compact('folder'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:folders,name,' . $id, // Ensure name is unique, excluding the current folder
        ], [
            'name.required' => 'Please enter a folder name.',
            'name.max' => 'Folder name must not exceed 255 characters.',
            'name.unique' => 'The folder name has already been taken.', // Custom message for uniqueness
        ]);

        $folder = Folder::findOrFail($id); // Find the folder by ID
        $oldName = $folder->name; // Store the old name for logging

        // Convert the folder name to uppercase
        $folderName = strtoupper($request->name);

        $folder->update([
            'name' => $folderName,
        ]);

        // Log the activity for editing
        RecentActivity::create([
            'activity' => 'Edited folder name from: <strong>' . $oldName . '</strong> to: <strong>' . $folder->name . '</strong>'  . 'with ID#: <strong>' . $folder->id . '</strong>'
        ]);

        return redirect()->route('admin.folders')
            ->with('success', 'Folder updated successfully.');
    }

    // Remove the folder from the database (soft delete)
    public function destroy($id)
    {
        $folder = Folder::findOrFail($id); // Find the folder by ID

        // Mark the folder as excluded (soft delete) and set activate to 0
        $folder->update([
            'exclude' => 1, // Mark as excluded
            'activate' => 0, // Deactivate the folder
        ]);

        // Update related records in the records table
        Record::where('folder_id', $folder->id)->update([
            'exclude' => 1, // Mark related records as excluded
            'activate' => 0, // Deactivate the related records
        ]);

        // Log the activity
        RecentActivity::create([
            'activity' => 'Removed folder (Name: <strong>' . $folder->name . '</strong>) and its related records.',
        ]);


        return redirect()->route('admin.folders')
            ->with('deleted', 'Folder deleted successfully.');
    }

    public function recentActivities()
    {
        $activities = RecentActivity::orderBy('created_at', 'desc')->get(); // Get recent activities
        return view('admin.recent', compact('activities')); // Pass activities to view
    }

}
