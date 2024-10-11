<div class="p-6 lg:p-8">

    <img src="{{ asset('img/CHED Logo New_20210406_CMYK_border_Logotype.svg') }}" alt="" class="max-w-[70%]"/>

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

    {{-- <!-- Export Button -->
    <button id="export-csv-btn" class="mb-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Export to CSV</button> --}}

    <button type="button" class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 me-3">
            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
        </svg>

        Add New Record
    </button>

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
            <tr>
                <td>
                    <button id="dropdownDefaultButton-100" data-dropdown-toggle="dropdown-100" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown-100" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>January, 2024</td>
                <td>ACIC 101</td>
                <td>ACIC NUMBER</td>
                <td>1-12-023-15215-352</td>
                <td>March 2023</td>
                <td>Folder #1</td>
                <td>RD, DONE</td>
                <td class="text-green-600 font-bold">COMPLETED</td>
            </tr>
            <tr>
                <td>
                    <button id="dropdownDefaultButton-200" data-dropdown-toggle="dropdown-200" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown-200" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>December, 2023</td>
                <td>MDS 101</td>
                <td>CHECK NUMBER</td>
                <td>012-12-023-15215-125-12366-456</td>
                <td>March 2024</td>
                <td>Folder #2</td>
                <td>M, JL, DONE</td>
                <td class="text-orange-600 font-bold">IN-PROGRESS</td>
            </tr>
            <tr>
                <td>
                    <button id="dropdownDefaultButton-1" data-dropdown-toggle="dropdown-1" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>January, 2024</td>
                <td>ACIC 151</td>
                <td>ACIC NUMBER</td>
                <td>1-12-023-15215-352</td>
                <td>March 2023</td>
                <td>Folder #1</td>
                <td>RD, DONE</td>
                <td class="text-green-600 font-bold">COMPLETED</td>
            </tr>
            <tr>
                <td>
                    <button id="dropdownDefaultButton-2" data-dropdown-toggle="dropdown-2" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>December, 2023</td>
                <td>MDS 151</td>
                <td>CHECK NUMBER</td>
                <td>012-12-023-15215-125-12366-456</td>
                <td>March 2024</td>
                <td>Folder #2</td>
                <td>M, JL, DONE</td>
                <td class="text-orange-600 font-bold">IN-PROGRESS</td>
            </tr>
            <tr>
                <td>
                    <button id="dropdownDefaultButton-3" data-dropdown-toggle="dropdown-3" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-3" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>November, 2023</td>
                <td>ACIC 101</td>
                <td>ACIC NUMBER</td>
                <td>ABC-123-XYZ-456-DEF-789</td>
                <td>April 2024</td>
                <td>Folder #3</td>
                <td>RD, IN-PROGRESS</td>
                <td class="text-orange-600 font-bold">IN-PROGRESS</td>
            </tr>
            <tr>
                <td>
                    <button id="dropdownDefaultButton-4" data-dropdown-toggle="dropdown-4" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-4" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>February, 2024</td>
                <td>ACIC 101</td>
                <td>ACIC NUMBER</td>
                <td>1A2B3C4D5E6F7G8H9I0J1K2L3</td>
                <td>May 2024</td>
                <td>Folder #4</td>
                <td>RD, DONE</td>
                <td class="text-green-600 font-bold">COMPLETED</td>
            </tr>
            <tr>
                <td>
                    <button id="dropdownDefaultButton-5" data-dropdown-toggle="dropdown-5" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-5" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>April, 2024</td>
                <td>ACIC 151</td>
                <td>ACIC NUMBER</td>
                <td>8A7B6C5D4E3F2G1H0I9J8K7L</td>
                <td>June 2024</td>
                <td>Folder #5</td>
                <td>RD, IN-PROGRESS</td>
                <td class="text-orange-600 font-bold">IN-PROGRESS</td>
            </tr>
            <tr>
                <td>
                    <button id="dropdownDefaultButton-6" data-dropdown-toggle="dropdown-6" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-6" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>March, 2024</td>
                <td>ACIC COSCO</td>
                <td>ACIC NUMBER</td>
                <td>X1Y2Z3A4B5C6D7E8F9G0H1J2</td>
                <td>July 2024</td>
                <td>Folder #6</td>
                <td>RD, DONE</td>
                <td class="text-green-600 font-bold">COMPLETED</td>
            </tr>
            <tr>
                <td>
                    <button id="dropdownDefaultButton-7" data-dropdown-toggle="dropdown-7" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-7" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>May, 2024</td>
                <td>ACIC 101</td>
                <td>ACIC NUMBER</td>
                <td>A1B2C3D4E5F6G7H8I9J0K1L2</td>
                <td>August 2024</td>
                <td>Folder #7</td>
                <td>RD, IN-PROGRESS</td>
                <td class="text-green-600 font-bold">COMPLETED</td>
            </tr>
            <tr>
                <td>
                    <button id="dropdownDefaultButton-8" data-dropdown-toggle="dropdown-8" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-8" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>June, 2024</td>
                <td>MDS 101</td>
                <td>CHECK NUMBER</td>
                <td>B1A2S3G4T5U6H7J8Q9P0W1Z2</td>
                <td>September 2024</td>
                <td>Folder #8</td>
                <td>RD, DONE</td>
                <td class="text-green-600 font-bold">COMPLETED</td>
            </tr>
            <tr>
                <td>
                    <button id="dropdownDefaultButton-9" data-dropdown-toggle="dropdown-9" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-9" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                            </li>
                            <hr class="w-[90%] mx-auto">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500"><i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>July, 2024</td>
                <td>MDS 101</td>
                <td>CHECK NUMBER</td>
                <td>C1D2E3F4G5H6I7J8K9L0M1N2</td>
                <td>October 2024</td>
                <td>Folder #9 MSU</td>
                <td>RD, IN-PROGRESS</td>
                <td class="text-green-600 font-bold">COMPLETED</td>
            </tr>
        </tbody>
    </table>


</div>

{{-- <script>

    if (document.getElementById("filter-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        // Initialize the DataTable
        const dataTable = new simpleDatatables.DataTable("#filter-table", {
            tableRender: (_data, table, type) => {
                if (type === "print") {
                    return table;
                }
                const tHead = table.childNodes[0];
                const filterHeaders = {
                    nodeName: "TR",
                    attributes: {
                        class: "search-filtering-row"
                    },
                    childNodes: tHead.childNodes[0].childNodes.map(
                        (_th, index) => ({
                            nodeName: "TH",
                            childNodes: [
                                {
                                    nodeName: "INPUT",
                                    attributes: {
                                        class: "datatable-input",
                                        type: "search",
                                        "data-columns": "[" + index + "]"
                                    }
                                }
                            ]
                        })
                    )
                };
                tHead.childNodes.push(filterHeaders);
                return table;
            }
        });

        // CSV export functionality
        const exportCustomCSV = function (dataTable, userOptions = {}) {
            const clonedUserOptions = {
                ...userOptions
            };
            clonedUserOptions.download = false;
            const csv = simpleDatatables.exportCSV(dataTable, clonedUserOptions);
            if (!csv) return false;

            const defaults = {
                download: true,
                lineDelimiter: "\n",
                columnDelimiter: ";"
            };
            const options = {
                ...defaults,
                ...clonedUserOptions
            };

            const separatorRow = Array(
                dataTable.data.headings.filter((_heading, index) => !dataTable.columns.settings[index]?.hidden).length
            ).fill("+").join("+");

            const str = separatorRow + options.lineDelimiter + csv + options.lineDelimiter + separatorRow;

            if (userOptions.download) {
                const link = document.createElement("a");
                link.href = encodeURI("data:text/csv;charset=utf-8," + str);
                link.download = (options.filename || "datatable_export") + ".csv";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
            return str;
        };

        // Trigger CSV Export on button click
        document.getElementById('export-csv-btn').addEventListener('click', () => {
            exportCustomCSV(dataTable, { filename: "my_table_data" });
        });
    }

</script> --}}



