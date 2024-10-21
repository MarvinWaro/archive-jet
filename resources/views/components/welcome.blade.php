<div class="p-6 lg:p-8">

    <img src="{{ asset('img/CHED Logo New_20210406_CMYK_border_Logotype.svg') }}" alt="" class="max-w-[70%] hidden md:block"/>

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        CHED Record Archiving System
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        The CHED Record Archiving System streamlines the organization and retrieval of ACIC and MDS records,
        ensuring efficient access to crucial data. Designed to manage academic and financial documents,
        the system enhances document security, reduces manual effort, and supports compliance with
        regulatory standards. Users can quickly locate, update, and archive records, optimizing
        the workflow for educational institutions.
    </p>
</div>


<div class="card-container mb-6">
    <div class="flex justify-center items-center mb-6">
        <section class="grid gap-4 md:grid-cols-4 p-4 md:p-8 mx-auto w-full ">
            <a href="{{ url('admin/acic') }}">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ACIC</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">32</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-blue-500 dark:text-blue-400">
                            <span>Record Folders</span>

                            <i class="fa-solid fa-folder ps-2 text-lg"></i>
                        </dd>
                    </dl>
                </div>
            </a>

            <a href="{{ url('admin/mds') }}">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">MDS</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">54</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-blue-500 dark:text-blue-400">
                            <span>Record Folders</span>

                            <i class="fa-solid fa-folder ps-2 text-lg"></i>
                        </dd>
                    </dl>
                </div>
            </a>

            <a href="{{ url('admin/completed') }}">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">COMPLETED</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">21</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-blue-500 dark:text-blue-400">
                            <span>Record Folders</span>

                        <i class="fa-solid fa-check ps-2 text-lg"></i>
                        </dd>
                    </dl>
                </div>
            </a>

            <a href="{{ url('admin/in-progress') }}">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">IN-PROGRESS</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">12</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-blue-500 dark:text-blue-400">
                            <span>Record Folders</span>

                            <i class="fa-solid fa-spinner ps-2 text-lg"></i>
                        </dd>
                    </dl>
                </div>
            </a>
        </section>
    </div>
</div>

<hr class="w-[80%] mx-auto">

<div class="mt-6 p-6">

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <a href="{{ route('admin.dashboard_create_record') }}" type="button" class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 me-3">
            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
        </svg>
        Add New Record
    </a>

    <table id="filter-table">
        <thead>
            <tr>
                <th>
                    <span class="flex items-center text-gray-900">
                        Action
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Date
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Folder Name
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Folder Type
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Folder Number
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Submission Date
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Others
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Remarks
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Status
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
            <tr>
                <td>
                    <button id="dropdownDefaultButton-{{ $record->id }}" data-dropdown-toggle="dropdown-{{ $record->id }}" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown-{{ $record->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton-{{ $record->id }}">
                            <li>
                                <a href="#!" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <i class="fa-solid fa-eye me-2"></i>View
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.dashboard_edit_record', $record->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                </a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <form action="{{ route('admin.dashboard_delete_record', $record->id) }}" method="POST" class="block px-4 py-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>{{ strtoupper(\Carbon\Carbon::createFromFormat('m', $record->month)->format('F')) }}, {{ strtoupper($record->Year->year) }}</td>
                <td>{{ strtoupper($record->folder->name) }}</td> <!-- Uppercase for Folder Name -->
                <td>{{ strtoupper($record->folder_type) }}</td> <!-- Uppercase for Folder Type -->
                <td>{{ $record->folder_description }}</td>
                <!-- Submission Date: Month (formatted as capitalized name) and Year -->
                <td>{{ strtoupper(\Carbon\Carbon::createFromFormat('m', $record->submission_month)->format('F')) }}, {{ strtoupper($record->submissionYear->year) }}</td>
                <td>{{ $record->others }}</td>
                <td>{{ $record->remarks }}</td>
                <td class="{{ strtoupper($record->status) === 'IN_PROGRESS' ? 'text-orange-500' : (strtoupper($record->status) === 'COMPLETED' ? 'text-green-500' : 'text-gray-900') }}">
                    {{ strtoupper(str_replace('_', '-', $record->status)) }}
                </td>



            </tr>
            @endforeach
        </tbody>






</div>





