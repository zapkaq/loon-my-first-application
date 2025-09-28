<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Show paginated list of jobs with eager loading
    public function index()
    {
        $jobs = Job::with(['employer', 'tags'])->paginate(10);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    // Show the form to create a new job
    public function create()
    {
        return view('jobs.create');
    }

    // Store a new job in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => $request->title,
            'salary' => $request->salary,
            'employer_id' => 1 // hard-coded for now
        ]);

        return redirect('/jobs');
    }

    // Show a single job
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    // Show the edit form for a job
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    // Update a job in the database
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => $request->title,
            'salary' => $request->salary
        ]);

        return redirect('/jobs/' . $job->id);
    }

    // Delete a job from the database
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
