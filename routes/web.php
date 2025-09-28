<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// Jobs Index (with pagination and eager loading)
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with(['employer', 'tags'])->paginate(10)
    ]);
});

// Show Create Job Form (must be BEFORE the {job} route)
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store a New Job
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// Show Single Job (Route Model Binding)
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});

// Show Edit Form
Route::get('/jobs/{job}/edit', function (\App\Models\Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

// Update a Job
Route::patch('/jobs/{job}', function (\App\Models\Job $job) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
});

// Delete a Job
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect('/jobs');
});
