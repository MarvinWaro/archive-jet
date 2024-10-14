<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController; // Ensure this is present
use App\Http\Controllers\RecordController;

Route::get('/', function () {
    return view('record-landing');
});

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

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


    Route::resource('admin/folders', FolderController::class)->names([
        'index' => 'admin.folders',
        'create' => 'admin.create_folder',
        'store' => 'admin.store_folder',
        'edit' => 'admin.edit_folder',
        'update' => 'admin.update_folder',
        'destroy' => 'admin.destroy_folder',
    ]);


    Route::get('admin/recent', [FolderController::class, 'recentActivities'])->name('admin.recent');


    Route::controller(RecordController::class)->group(function() {
        Route::get('admin/dashboard', 'index')->name('admin.dashboard');
        Route::get('admin/records/create', 'create')->name('admin.dashboard_create_record');
        Route::post('admin/records', 'store')->name('admin.dashboard_store'); // Store new record
        // Other routes...
    });



});

