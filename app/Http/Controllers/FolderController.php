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
        $folders = Folder::all();
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

        try {
            Folder::create([
                'name' => $request->name,
            ]);
            return redirect()->route('admin.folders')
                ->with('success', 'Folder created successfully.');
        } catch (\Exception $e) {
            Log::error('Folder creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Folder creation failed.');
        }
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
    public function destroy($id) // Changed to accept $id instead of Folder
    {
        $folder = Folder::findOrFail($id); // Find the folder by ID
        $folder->delete();

        return redirect()->route('admin.folders')
            ->with('success', 'Folder deleted successfully.');
    }
}
