@props(['acic_records'])
<div class="mt-6 p-6">



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
                        Status
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        ID
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
                        Folder Number/Description
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
            </tr>
        </thead>
        <tbody>
            @foreach ($acic_records as $acicRecord)  <!-- Changed to $acic_records -->
                <tr>
                    <td>
                        <button id="dropdownDefaultButton-{{ $acicRecord->id }}" data-dropdown-toggle="dropdown-{{ $acicRecord->id }}" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown-{{ $acicRecord->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton-{{ $acicRecord->id }}">
                                <li>
                                    <a href="#!" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <i class="fa-solid fa-eye me-2"></i>View
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.dashboard_edit_record', $acicRecord->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                    </a>
                                </li>
                                <hr class="w-[90%] mx-auto">
                                <li>
                                    <form action="{{ route('admin.dashboard_delete_record', $acicRecord->id) }}" method="POST" class="delete-form delete-form-{{ $acicRecord->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="delete-button w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex items-center focus:outline-none" data-record-id="{{ $acicRecord->id }}">
                                            <i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td class="{{ strtoupper($acicRecord->status) === 'IN_PROGRESS' ? 'text-orange-500' : (strtoupper($acicRecord->status) === 'COMPLETED' ? 'text-green-500' : 'text-gray-900') }}">
                        {{ strtoupper(str_replace('_', '-', $acicRecord->status)) }}
                    </td>
                    <td>{{ $acicRecord->id }}</td>
                    <td>{{ strtoupper(\Carbon\Carbon::createFromFormat('m', $acicRecord->month)->format('F')) }}, {{ strtoupper($acicRecord->Year->year) }}</td>
                    <td>{{ strtoupper($acicRecord->folder->name) }}</td> <!-- Uppercase for Folder Name -->
                    <td>{{ strtoupper($acicRecord->folder_type) }} NUMBER</td> <!-- Uppercase for Folder Type -->
                    <td>{{ Str::limit($acicRecord->folder_description, 15, '...') }}</td>
                    <!-- Submission Date: Month (formatted as capitalized name) and Year -->
                    <td>{{ strtoupper(\Carbon\Carbon::createFromFormat('m', $acicRecord->submission_month)->format('F')) }}, {{ strtoupper($acicRecord->submissionYear->year) }}</td>
                    <td>{{ $acicRecord->others }}</td>
                    <td>{{ $acicRecord->remarks }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Select all delete buttons
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function(event) {
                    // Prevent form from submitting automatically
                    event.preventDefault();

                    const recordId = this.getAttribute('data-record-id');

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit the form if user confirms the deletion
                            document.querySelector(`.delete-form-${recordId}`).submit();
                        }
                    });
                });
            });
        });
    </script>

</div>



