<x-layout>
    <x-slot name="title">Create Job</x-slot>
    <div class="container mx-auto flex justify-between items-center">
        <nav class="hidden md:flex items-center space-x-4">
            <a href="jobs.html" class="text-white hover:underline py-2"
                >All Jobs</a
            >
            <a
                href="saved-jobs.html"
                class="text-white hover:underline py-2"
                >Saved Jobs</a
            >
            <a href="login.html" class="text-white hover:underline py-2"
                >Login</a
            >
            <a
                href="register.html"
                class="text-white hover:underline py-2"
                >Register</a
            >
            <a
                href="dashboard.html"
                class="text-white hover:underline py-2"
            >
                <i class="fa fa-gauge mr-1"></i> Dashboard
            </a>

        </nav>
        <button
            id="hamburger"
            class="text-white md:hidden flex items-center"
        >
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <nav
        id="mobile-menu"
        class="hidden md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2"
    >
        <a href="jobs.html" class="block px-4 py-2 hover:bg-blue-700"
            >All Jobs</a
        >
        <a
            href="saved-jobs.html"
            class="block px-4 py-2 hover:bg-blue-700"
            >Saved Jobs</a
        >
        <a
            href="dashboard.html"
            class="block px-4 py-2 hover:bg-blue-700"
            >Dashboard</a
        >
        <a href="login.html" class="block px-4 py-2 hover:bg-blue-700"
            >Login</a
        >
        <a
            href="register.html"
            class="block px-4 py-2 hover:bg-blue-700"
            >Register</a
        >
        <a
            href="create-job.html"
            class="block px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black"
        >
            <i class="fa fa-edit"></i> Create Job
        </a>
    </nav>
</header>

<!-- Create Job Form Box -->
<main class="container mx-auto p-4 mt-4">
    <div
        class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl"
    >
        <h2 class="text-4xl text-center font-bold mb-4">
            Create Job Listing
        </h2>
        <form
            method="POST"
            action="/jobs"
            enctype="multipart/form-data"
        >
        @csrf
            <h2
                class="text-2xl font-bold mb-6 text-center text-gray-500"
            >
                Job Info
            </h2>

            <x-inputs.text  id="title" name="title" label="Job Title" placeholder="Software Engineer"/>

            <div class="mb-4">
                <label class="block text-gray-700" for="description">Job Description</label>
                <textarea
                    cols="30"
                    rows="7"
                    id="description"
                    name="description"
                    class="w-full px-4 py-2 border rounded focus:outline-none @error('title') border-red-500 @enderror"
                    placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..."
                    >{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <x-inputs.text  id="salary" name="salary" label="Salary" placeholder="90000" type="number"/>

            <x-inputs.text-area id="requirements" name="requirements" label="Requirements" placeholder="Bachelor's degree in Computer Science" />

            <x-inputs.text-area id="benefits" name="benefits" label="Benefits" placeholder="Health insurance, 401k, paid time off" />

            <x-inputs.text  id="tags" name="tags" label="Tags (comma-separated)" placeholder="development,coding,java,python"/>

            <x-inputs.select id="job_type" name="job_type" label="Job Type" value="{{ old('job_type') }}"
            :options="['Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time',
                        'Contract' => 'Contract', 'Temporary' => 'Temporary',
                        'Internship' => 'Internship', 'Volunteer' => 'Volunteer',
                        'On-Call' => 'On-Call']"/>

            <x-inputs.select id="remote" name="remote" label="Remote"
            value="{{ old('remote') }}"
            :options="['0' => 'No', '1' => 'Yes']"/>


            <x-inputs.text  id="address" name="address" label="Address" placeholder="123 Main St"/>

            <x-inputs.text  id="city" name="city" label="City" placeholder="Albany"/>

            <x-inputs.text  id="state" name="state" label="State" placeholder="NY"/>

            <x-inputs.text  id="zipcode" name="zipcode" label="ZIP Code" placeholder="12201"/>

            <h2
                class="text-2xl font-bold mb-6 text-center text-gray-500"
            >
                Company Info
            </h2>

            <x-inputs.text  id="company_name" name="company_name" label="Company Name" placeholder="Company name"/>

            <x-inputs.text-area id="description" name="description" label="Description" placeholder="Company Description" />

            <x-inputs.text  id="company_website" name="company_website" label="Company Website" placeholder="Enter website" type="url" />

            <x-inputs.text  id="contact_phone" name="contact_phone" label="Contact Phone" placeholder="Enter phone"/>

            <x-inputs.text  id="contact_email" name="contact_email" label="Contact Email" placeholder="Email where you want to receive applications" type="email"/>

            <x-inputs.file id="company_logo" name="company_logo" label="Company Logo" />

            <button
                type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none"
            >
                Save
            </button>
        </form>
    </div>
</x-layout>