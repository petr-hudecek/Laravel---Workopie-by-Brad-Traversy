@extends('layout')

@section('content')

<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h1 class="text-4xl text-center font-bold mb-4">Create Job Listing</h1>
        
    <form method="POST" action="/jobs" enctype="multipart/form-data">
        @csrf

        <x-inputs.text-input id="title" name="title" label="Job Title" placeholder="Software Engineer" />
        <x-inputs.text-area-input id="description" name="description" label="Description" placeholder="Bachelor's degree in Computer Science" rows='10' />            
        <x-inputs.text-input id="salary" name="salary" label="Salary" type="number" placeholder="90000" />
        <x-inputs.text-area-input id="requirements" name="requirements" label="Requirements" placeholder="Requirements..." />
        <x-inputs.text-area-input id="benefits" name="benefits" label="Benefits" placeholder="Health insurance, 401k, paid time off" />
        <x-inputs.text-input id="tags" name="tags" label="Tags (Comma separated)" placeholder="Development, Coding, Java, Python" />
        <x-inputs.select-input id="job_type" name="job_type" label="Job Type" value="{{old('job_type')}}" :options="[
        'Full-Time' => 'Full-Time',
        'Part-Time' => 'Part-Time',
        'Contract' => 'Contract',
        'Temporary' => 'Temporary',
        'Internship' => 'Internship',
        'Volunteer' => 'Volunteer',
        'On-Call' => 'On-Call']" />

        <x-inputs.select-input id="remote" name="remote" label="Remote" :options="[0 => 'No', 1 => 'Yes']" />
        <x-inputs.text-input id="address" name="address" label="Address" placeholder="123 Main St" />
        <x-inputs.text-input id="city" name="city" label="City" placeholder="Albany" />
        <x-inputs.text-input id="state" name="state" label="State" placeholder="NY" />
        <x-inputs.text-input id="zipcode" name="zipcode" label="Zipcode" placeholder="12201" />

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Company Info</h2>

        <x-inputs.text-input id="company_website" name="company_name" label="Company Name" placeholder="Company Name" />
        <x-inputs.text-area-input id="company_description" name="company_description" label="Company Description" placeholder="Company Description" />
        <x-inputs.text-input id="company_website" name="company_website" label="Company Website" placeholder="https://www.workopia.test" />
        <x-inputs.text-input id="contact_phone" name="contact_phone" label="Contact Phone" placeholder="+ 00 123 456 789" />
        <x-inputs.text-input id="contact_email" name="contact_email" label="Contact Dmail" placeholder="Email where you want to receive applications" />
        <x-inputs.file-input id="company_logo" name="company_logo" label="Company Logo"/>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Save</button>
    </form>
</div>
@endsection