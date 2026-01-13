<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;

class JobController extends Controller
{
    public function index(): View
    {
        $jobs = Job::all();
        return view("Jobs.index")->with("jobs", $jobs);
    }

    public function create()
    {
        return view("Jobs.create");
    }


    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'nullable|string',
            'contact_email' => 'required|string',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website' => 'nullable|url',
        ]);

        $validatedData['user_id'] = 1;

        Job::create($validatedData);

        return redirect()->route("jobs.index")->with("success", "Job Listing created succesfully!");
    }


    public function show(Job $job): View
    {
        return view("jobs.show")->with("job", $job);
    }

    public function edit(string $id)
    {
        return "Edit";
    }

    public function update(Request $request, string $id)
    {
        return "Update";
    }

    public function destroy(string $id)
    {
        return "Destroy";
    }
}
