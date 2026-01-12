@extends('layout')

@section('content')

<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h1 class="text-4xl text-center font-bold mb-4">Create Job Listing</h1>
        
    <form method="POST" action="/jobs" enctype="multipart/form-data">
        @csrf

        <x-inputs.text-input id="title" name="name" label="Job Title" placeholder="Software Engineer" />

        <x-inputs.text-area-input id="description" name="description" label="Description" placeholder="Bachelor's degree in Computer Science" rows='10' />            

        <x-inputs.text-input id="salary" name="salary" label="Salary" type="number" placeholder="90000" />
        <x-inputs.text-area-input id="requirements" name="requirements" label="Requirements" placeholder="Requirements..." />
        <x-inputs.text-area-input id="benefits" name="benefits" label="Benefits" placeholder="Health insurance, 401k, paid time off" />

        <x-inputs.text-input id="tags" name="tags" label="Tags (Comma separated)" placeholder="Development, Coding, Java, Python" />

                    <div class="mb-4">
                        <label class="block text-gray-700" for="job_type"
                            >Job Type</label
                        >
                        <select
                            id="job_type"
                            name="job_type"
                            class="w-full px-4 py-2 border rounded focus:outline-none @error('job_type') border-red-500 @enderror"
                        >
                            <option value="Full-Time" {{old('job_type') == 'Full-Time' ? 'Selected' : ''}}>Full-Time</option>
                            <option value="Part-Time" {{old('job_type') == 'Part-Time' ? 'Selected' : ''}}>Part-Time</option>
                            <option value="Contract" {{old('job_type') == 'Contract' ? 'Selected' : ''}}>Contract</option>
                            <option value="Temporary" {{old('job_type') == 'Temporary' ? 'Selected' : ''}}>Temporary</option>
                            <option value="Internship" {{old('job_type') == 'Internship' ? 'Selected' : ''}}>Internship</option>
                            <option value="Volunteer" {{old('job_type') == 'Volunteer' ? 'Selected' : ''}}>Volunteer</option>
                            <option value="On-Call" {{old('job_type') == 'On-Call' ? 'Selected' : ''}}>On-Call</option>
                        </select>
                        @error('job_type')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700" for="remote"
                            >Remote</label
                        >
                        <select
                            id="remote"
                            name="remote"
                            class="w-full px-4 py-2 border rounded focus:outline-none"
                        >
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                        </select>
                    </div>

                    
                    <x-inputs.text-input id="address" name="address" label="Address" placeholder="123 Main St" />

                    
                    <x-inputs.text-input id="city" name="city" label="City" placeholder="Albany" />

                    
                    <x-inputs.text-input id="state" name="state" label="State" placeholder="NY" />

                    
                    <x-inputs.text-input id="zipcode" name="zipcode" label="Zipcode" placeholder="12201" />

                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Company Info</h2>

                    
                    <x-inputs.text-input id="company_website" name="company_name" label="Company Name" placeholder="Company Name" />

                    
                    <x-inputs.text-area-input id="company_description" name="company_description" label="Company Description" placeholder="Company Description" />

                    
                    <x-inputs.text-input id="company_website" name="company_website" label="Company Website" placeholder="Enter Website" />

                    
                    <x-inputs.text-input id="contact_phone" name="contact_phone" label="Contact Phone" placeholder="+ 00 123 456 789" />

                    <x-inputs.text-input id="contact_email" name="contact_email" label="Contact Dmail" placeholder="Email where you want to receive applications" />

                    <div class="mb-4">
                        <label class="block text-gray-700" for="company_logo"
                            >Company Logo</label
                        >
                        <input
                            id="company_logo"
                            type="file"
                            name="company_logo"
                            class="w-full px-4 py-2 border rounded focus:outline-none @error('company_logo') border-red-500 @enderror"
                        />
                        @error('company_logo')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none"
                    >
                        Save
                    </button>
                </form>
            </div>
@endsection