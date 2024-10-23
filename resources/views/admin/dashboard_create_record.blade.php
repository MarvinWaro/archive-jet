<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Record') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5">
                    <a href="{{ route('admin.dashboard') }}" type="button" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                        Back
                    </a>
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">New record</h2>
                            <hr class="sm:col-span-2">

                            <form action="{{ url('admin/records') }}" method="POST" class="mt-6">

                                @csrf

                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div>
                                        <label for="yearSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year <span class="text-red-500">*</span></label>
                                        <select id="yearSelect" name="year_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                            <option selected="" value="">Select year</option>
                                            @foreach ($years as $item)
                                                <option value="{{ $item->id }}" {{ old('year_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->year }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('year_id')
                                            <span class="text-red-500" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="monthSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Month <span class="text-red-500">*</span></label>
                                        <select id="monthSelect" name="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                            <option selected="" value="">Select month</option>
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ str_pad($month, 2, '0', STR_PAD_LEFT) }}" {{ old('month') == str_pad($month, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('month')
                                            <span class="text-red-500" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="folder_name_select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folder Name <span class="text-red-500">*</span></label>
                                        <select id="folder_name_select" name="folder_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected value="">Select folder name</option>
                                            @foreach($folders as $folder)
                                                <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('folder_id')
                                            <span class="text-red-500" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="folder_number_select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folder Type <span class="text-red-500">*</span></label>
                                        <select id="folder_number_select" name="folder_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="" value="">Select folder type</option>
                                            <option value="acic" {{ old('folder_type') == 'acic' ? 'selected' : '' }}>ACIC NUMBER</option>
                                            <option value="check" {{ old('folder_type') == 'check' ? 'selected' : '' }}>CHECK NUMBER</option>
                                        </select>
                                        @error('folder_type')
                                            <span class="text-red-500" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="text_num" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folder Description (Number) <span class="text-red-500">*</span></label>
                                        <textarea id="text_num" name="folder_description" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description number here">{{ old('folder_description') }}</textarea>
                                        @error('folder_description')
                                            <span class="text-red-500" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Record Submission Date</h2>

                                    <hr class="sm:col-span-2">
                                    <div>
                                        <label for="submission_year_select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submission Year <span class="text-red-500">*</span></label>
                                        <select id="submission_year_select" name="submission_year_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                            <option selected="" value="">Select Submission Year</option>
                                            @foreach ($submission_years as $item)
                                                <option value="{{ $item->id }}" {{ old('submission_year_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->year }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('submission_year_id')
                                            <span class="text-red-500" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="submission_month_select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submission Month <span class="text-red-500">*</span></label>
                                        <select id="submission_month_select" name="submission_month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                            <option selected="" value="">Select Month</option>
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ str_pad($month, 2, '0', STR_PAD_LEFT) }}" {{ old('submission_month') == str_pad($month, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('submission_month')
                                            <span class="text-red-500" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Record Status <span class="text-red-500">*</span></label>
                                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="" value="">Select Status</option>
                                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In-Progress</option>
                                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                        @error('status')
                                            <span class="text-red-500" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="others" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Others <span class="text-red-500">*</span></label>
                                        <input type="text" name="others" id="others" value="{{ old('others') }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Others Folder Record Details">
                                        @error('others')
                                            <span class="text-red-500" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks/Comments</label>
                                        <textarea id="remarks" name="remarks" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your Remarks/Comments">{{ old('remarks') }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="inline-flex justify-center items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800 w-full">
                                    Save Record
                                </button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const yearSelect = document.getElementById('yearSelect');
            const submissionYearSelect = document.getElementById('submission_year_select');

            // Ensure yearSelect exists before adding event listener
            if (yearSelect) {
                yearSelect.addEventListener('change', function () {
                    updateSubmissionYearOptions();
                    updateSubmissionMonthOptions();
                });
            }

            function updateSubmissionYearOptions() {
                // Your logic here to update options for submission years
            }

            function updateSubmissionMonthOptions() {
                // Your logic here to update options for submission months
            }
        });
    </script>


</x-app-layout>


