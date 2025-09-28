<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Home Page
Route::get('/', function () {
    return view('home');
});

// Resourceful routes for jobs (handles all CRUD actions)
Route::resource('jobs', JobController::class);
