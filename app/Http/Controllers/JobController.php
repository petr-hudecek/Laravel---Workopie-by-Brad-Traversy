<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jobs = Job::all();
        return view("Jobs.index")->with("jobs", $jobs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Jobs.create");
    }


    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string|max:255"
        ]);

        Job::create([
            "title" => $validatedData["title"],
            "description" => $validatedData["description"],
        ]);

        return redirect()->route("jobs.index");
    }


    public function show(Job $job): View
    {
        return view("jobs.show")->with("job", $job);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Destroy";
    }
}
