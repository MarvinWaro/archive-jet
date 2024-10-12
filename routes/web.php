<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('record-landing');
});

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

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

    Route::get('admin/folders', function () {
        return view('admin.folders');
    })->name('admin.folders');


});
