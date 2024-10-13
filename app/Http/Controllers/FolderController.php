<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


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
            'name' => 'required|string|max:255',
        ]);

        // Check for an excluded folder to reuse
        $folder = Folder::where('exclude', 1)->first();

        if ($folder) {
            // Reuse the excluded folder
            $folder->update([
                'name' => $request->name,
                'exclude' => 0, // Reactivate it
            ]);
        } else {
            // Create a new folder if no excluded one is found
            Folder::create([
                'name' => $request->name,
            ]);
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

    // Update the folder in the database
    public function update(Request $request, $id) // Changed to accept $id instead of Folder
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $folder = Folder::findOrFail($id); // Find the folder by ID
        $folder->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.folders')
            ->with('success', 'Folder updated successfully.');
    }

    // Remove the folder from the database
    public function destroy($id)
    {
        $folder = Folder::findOrFail($id); // Find the folder by ID
        $folder->update([
            'exclude' => 1, // Mark as excluded
        ]);

        return redirect()->route('admin.folders')
            ->with('success', 'Folder excluded successfully.');
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


}
