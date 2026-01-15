<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

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

        $validatedData['user_id'] = $request->user()->id;

        if($request->hasFile("company_logo")) {
            $path = $request->file("company_logo")->store("logos", "public");
            $validatedData["company_logo"] = $path;
        }

        Job::create($validatedData);

        return redirect()->route("jobs.index")->with("success", "Job Listing created succesfully!");
    }


    public function show(Job $job): View
    {
        return view("jobs.show")->with("job", $job);
    }

    public function edit(Job $job): View
    {
        return view("jobs.edit")->with("job", $job);
    }

    public function update(Request $request, Job $job)
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

        if($request->hasFile("company_logo")) {
            Storage::delete("public/logos" . basename($job->company_logo));
            $path = $request->file("company_logo")->store("logos", "public");
            $validatedData["company_logo"] = $path;
        }

        $job->update($validatedData);

        return redirect()->route("jobs.show", $job->id)->with("success", "Job Listing edited succesfully!");
    }

    public function destroy(Job $job): RedirectResponse
    {
        if($job->company_logo) {
            Storage::delete("public/logos/" . $job->company_logo);
        }

        $job->delete();

        return redirect()->route("jobs.index")->with("success", "Job Listing deleted succesfully!");
    }
}
