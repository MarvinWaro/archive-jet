<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\RecentActivity; // Add this at the top


class FolderController extends Controller
{
    // Display a listing of the folders
    public function index()
    {
        // Fetch only folders that are not excluded
        $folders = Folder::where('exclude', 0)->get();

        return view('admin.folders', compact('folders'));
    }


    // Show the form for creating a new folder
    public function create()
    {
        return view('admin.create_folder');
    }

    // Store a newly created folder in the database
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //     ]);

    //     Folder::create([
    //         'name' => $request->name,
    //     ]);

    //     return redirect()->route('admin.folders')
    //         ->with('success', 'Folder created successfully.');
    // }


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
            $oldName = $folder->name; // Store the old name for logging
            $folder->update([
                'name' => $folderName,
                'exclude' => 0, // Reactivate it
            ]);

            // Log the activity for reusing
            RecentActivity::create(['activity' => 'Added folder: ' . $folder->name]);
        } else {
            // Create a new folder if no excluded one is found
            $folder = Folder::create([
                'name' => $folderName,
            ]);

            // Log the activity for adding
            RecentActivity::create(['activity' => 'Added folder: ' . $folder->name]);
        }

        return redirect()->route('admin.folders')
            ->with('success', 'Folder saved successfully.');
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
        RecentActivity::create(['activity' => 'Edited folder from: ' . $oldName . ' to: ' . $folder->name]);

        return redirect()->route('admin.folders')
            ->with('success', 'Folder updated successfully.');
    }




    // Remove the folder from the database
    public function destroy($id)
    {
        $folder = Folder::findOrFail($id); // Find the folder by ID

        // Mark as excluded (soft delete)
        $folder->update([
            'exclude' => 1, // Mark as excluded
        ]);

        // Log the activity
        RecentActivity::create(['activity' => 'Removed folder (Name: ' . $folder->name . ')']);

        return redirect()->route('admin.folders')
            ->with('success', 'Folder deleted successfully.');
    }




    // for mode in one form
    // public function save(Request $request, $id = null)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //     ]);

    //     if ($id) {
    //         // Editing an existing folder
    //         $folder = Folder::findOrFail($id);
    //         $folder->update([
    //             'name' => $request->name,
    //         ]);
    //         return redirect()->route('admin.folders')->with('success', 'Folder updated successfully.');
    //     } else {
    //         // Adding a new folder
    //         Folder::create([
    //             'name' => $request->name,
    //         ]);
    //         return redirect()->route('admin.folders')->with('success', 'Folder created successfully.');
    //     }
    // }



    public function recentActivities()
    {
        $activities = RecentActivity::orderBy('created_at', 'desc')->get(); // Get recent activities
        return view('admin.recent', compact('activities')); // Pass activities to view
    }


}
