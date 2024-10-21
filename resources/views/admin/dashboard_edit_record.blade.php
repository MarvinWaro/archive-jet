<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Record') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5">
                    <!-- Back Button -->
                    <a href="{{ route('admin.dashboard') }}" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                        Back
                    </a>

                    <!-- Edit Form Section -->
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Record</h2>
                            <hr class="mb-4">

                            <!-- Form Start -->
                            <form action="{{ route('admin.dashboard_update', $record->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Use PUT for updates -->

                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                                    <!-- Year Selection -->
                                    <div>
                                        <label for="yearSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year <span class="text-red-500">*</span></label>
                                        <select id="yearSelect" name="year_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" >
                                            <option value="">Select year</option>
                                            @foreach ($years as $item)
                                                <option value="{{ $item->id }}" {{ (old('year_id') ?? $record->year_id) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->year }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('year_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Month Selection -->
                                    <div>
                                        <label for="monthSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Month <span class="text-red-500">*</span></label>
                                        <select id="monthSelect" name="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" >
                                            <option value="">Select month</option>
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ str_pad($month, 2, '0', STR_PAD_LEFT) }}" {{ (old('month') ?? $record->month) == str_pad($month, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('month')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Folder Name -->
                                    <div>
                                        <label for="folder_name_select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folder Name <span class="text-red-500">*</span></label>
                                        <select id="folder_name_select" name="folder_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" >
                                            <option value="">Select folder name</option>
                                            @foreach ($folders as $folder)
                                                <option value="{{ $folder->id }}" {{ (old('folder_id') ?? $record->folder_id) == $folder->id ? 'selected' : '' }}>
                                                    {{ $folder->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('folder_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Folder Type -->
                                    <div>
                                        <label for="folder_number_select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folder Type <span class="text-red-500">*</span></label>
                                        <select id="folder_number_select" name="folder_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        >
                                            <option value="">Select folder type</option>
                                            <option value="acic" {{ (old('folder_type') ?? $record->folder_type) == 'acic' ? 'selected' : '' }}>ACIC NUMBER</option>
                                            <option value="check" {{ (old('folder_type') ?? $record->folder_type) == 'check' ? 'selected' : '' }}>CHECK NUMBER</option>
                                        </select>
                                        @error('folder_type')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Folder Description -->
                                    <div class="sm:col-span-2">
                                        <label for="folder_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folder Description (Number) <span class="text-red-500">*</span></label>
                                        <textarea id="folder_description" name="folder_description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        >{{ old('folder_description') ?? $record->folder_description }}</textarea>
                                        @error('folder_description')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Submission Year -->
                                    <div>
                                        <label for="submission_year_select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submission Year <span class="text-red-500">*</span></label>
                                        <select id="submission_year_select" name="submission_year_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        >
                                            <option value="">Select submission year</option>
                                            @foreach ($submission_years as $item)
                                                <option value="{{ $item->id }}" {{ (old('submission_year_id') ?? $record->submission_year_id) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->year }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('submission_year_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Submission Month -->
                                    <div>
                                        <label for="submission_month_select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submission Month <span class="text-red-500">*</span></label>
                                        <select id="submission_month_select" name="submission_month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        >
                                            <option value="">Select submission month</option>
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ str_pad($month, 2, '0', STR_PAD_LEFT) }}" {{ (old('submission_month') ?? $record->submission_month) == str_pad($month, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('submission_month')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Record Status -->
                                    <div>
                                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Record Status <span class="text-red-500">*</span>
                                        </label>
                                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        >
                                            <option value="">Select Status</option>
                                            <option value="in_progress" {{ (old('status') ?? $record->status) == 'in_progress' ? 'selected' : '' }}>In-Progress</option>
                                            <option value="completed" {{ (old('status') ?? $record->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                        @error('status')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <!-- Others Field -->
                                    <div>
                                        <label for="others" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Others <span class="text-red-500">*</span></label>
                                        <input type="text" id="others" name="others" value="{{ old('others', $record->others) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        >
                                        @error('others')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Remarks/Comments -->
                                    <div class="sm:col-span-2">
                                        <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks/Comments</label>
                                        <textarea id="remarks" name="remarks" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('remarks') ?? $record->remarks }}</textarea>
                                        @error('remarks')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-5">
                                    <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2">
                                        Update
                                    </button>
                                </div>

                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
