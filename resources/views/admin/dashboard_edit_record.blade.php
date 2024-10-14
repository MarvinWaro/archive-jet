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
                    <a href="{{ route('admin.folders') }}" type="button" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                        Back
                    </a>
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit record</h2>
                            <hr class="sm:col-span-2">
                            <form action="#" method="POST" class="mt-6">

                                @csrf

                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div>
                                        <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year <span class="text-red-500">*</span></label>
                                        <select id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="">Select year</option>
                                            <option value="2012">2012</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Month <span class="text-red-500">*</span></label>
                                        <select id="month" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="">Select month</option>
                                            <option value="January">January</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="folder_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folder Name <span class="text-red-500">*</span></label>
                                        <select id="folder_name" name="folder_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="">Select folder name</option>
                                            <option value="acic">ACIC</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="folder_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folder Type <span class="text-red-500">*</span></label>
                                        <select id="folder_type" name="folder_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="">Select folder type</option>
                                            <option value="acic_number">ACIC NUMBER</option>
                                        </select>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="folder_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folder Description (Number) <span class="text-red-500">*</span></label>
                                        <textarea id="folder_description" name="folder_description" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description number here"></textarea>
                                    </div>

                                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Record Submission Date</h2>

                                    <hr class="sm:col-span-2">

                                    <div>
                                        <label for="submission_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submission Year <span class="text-red-500">*</span></label>
                                        <select id="submission_year" name="submission_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="">Select Year</option>
                                            <option value="2012">2012</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="submission_month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submission Month <span class="text-red-500">*</span></label>
                                        <select id="submission_month" name="submission_month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="">Select Month</option>
                                            <option value="January">January</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Record Status <span class="text-red-500">*</span></label>
                                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="">Select Status</option>
                                            <option value="completed">Completed</option>
                                            <option value="inprogress">In-Progress</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="others" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Others <span class="text-red-500">*</span></label>
                                        <input type="text" name="others" id="others" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Others Folder Record Details" required="">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks/Comments</label>
                                        <textarea id="remarks" name="remarks" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your Remarks/Comments"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="inline-flex justify-center items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800 w-full">
                                    Update Record
                                </button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
