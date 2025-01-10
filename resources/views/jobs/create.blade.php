<x-layout>
    <x-slot name="title">Create Job</x-slot>
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="index.html">Workopia</a>
        </h1>
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
            <a
                href="create-job.html"
                class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"
            >
                <i class="fa fa-edit"></i> Create Job
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

            <div class="mb-4">
                <label class="block text-gray-700" for="requirements"
                    >Requirements</label
                >
                <textarea
                    id="requirements"
                    name="requirements"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    placeholder="Bachelor's degree in Computer Science"
                ></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700" for="benefits"
                    >Benefits</label
                >
                <textarea
                    id="benefits"
                    name="benefits"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    placeholder="Health insurance, 401k, paid time off"
                ></textarea>
            </div>

            <x-inputs.text  id="tags" name="tags" label="Tags (comma-separated)" placeholder="development,coding,java,python"/>

            <div class="mb-4">
                <label class="block text-gray-700" for="job_type"
                    >Job Type</label
                >
                <select
                    id="job_type"
                    name="job_type"
                    class="w-full px-4 py-2 border rounded focus:outline-none @error('job_type') border-red-500 @enderror"
                >
                    <option value="Full-Time" {{ old('job_type') == 'Full-Time' ? 'selected' : '' }}>
                        Full-Time
                    </option>
                    <option value="Part-Time" {{ old('job_type') == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                    <option value="Contract" {{ old('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                    <option value="Temporary" {{ old('job_type') == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                    <option value="Internship" {{ old('job_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                    <option value="Volunteer" {{ old('job_type') == 'Volunteer' ? 'selected' : '' }}>Volunteer</option>
                    <option value="On-Call" {{ old('job_type') == 'On-Call' ? 'selected' : '' }}>On-Call</option>
                </select>
                @error('job_type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
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

            <div class="mb-4">
                <label
                    class="block text-gray-700"
                    for="company_description"
                    >Company Description</label
                >
                <textarea
                    id="company_description"
                    name="company_description"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    placeholder="Company Description"
                ></textarea>
            </div>

            <x-inputs.text  id="company_website" name="company_website" label="Company Website" placeholder="Enter website"/>

            <x-inputs.text  id="contact_phone" name="contact_phone" label="Contact Phone" placeholder="Enter phone"/>

            <x-inputs.text  id="contact_email" name="contact_email" label="Contact Email" placeholder="Email where you want to receive applications" type="email"/>

            <div class="mb-4">
                <label class="block text-gray-700" for="company_logo"
                    >Company Logo</label
                >
                <input
                    id="company_logo"
                    type="file"
                    name="company_logo"
                    class="w-full px-4 py-2 border rounded focus:outline-none
                    @error('company_logo') border-red-500 @enderror"
                />
                @error('company_logo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
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
</x-layout>