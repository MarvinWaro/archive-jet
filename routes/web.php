<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController; // Ensure this is present

Route::get('/', function () {
    return view('record-landing');
});

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('admin/acic', function () {
        return view('admin.acic');
    })->name('admin.acic');

    Route::get('admin/mds', function () {
        return view('admin.mds');
    })->name('admin.mds');

    Route::get('admin/completed', function () {
        return view('admin.completed');
    })->name('admin.completed');

    Route::get('admin/in-progress', function () {
        return view('admin.in-progress');
    })->name('admin.in-progress');

    // Admin folder routes
    // Route::get('admin/folders/create', [FolderController::class, 'create'])->name('admin.create_folder');
    // Route::post('admin/folders', [FolderController::class, 'store'])->name('admin.store_folder');
    // Route::get('admin/folders/{id}/edit', [FolderController::class, 'edit'])->name('admin.edit_folder');
    // Route::put('admin/folders/{id}', [FolderController::class, 'update'])->name('admin.update_folder');
    // Route::delete('admin/folders/{id}', [FolderController::class, 'destroy'])->name('admin.destroy_folder');
    // Route::get('admin/folders', [FolderController::class, 'index'])->name('admin.folders');

    Route::resource('admin/folders', FolderController::class)->names([
        'index' => 'admin.folders',
        'create' => 'admin.create_folder',
        'store' => 'admin.store_folder',
        'edit' => 'admin.edit_folder',
        'update' => 'admin.update_folder',
        'destroy' => 'admin.destroy_folder',
    ]);


});

