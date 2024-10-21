<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Recent Activities') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Loop through all activities grouped by date -->
            @foreach($activities->groupBy(function($activity) {
                return $activity->created_at->format('Y-m-d'); // Group by date
            }) as $date => $activitiesForDate)
                <div class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <time class="text-lg font-semibold text-gray-900 dark:text-white">{{ $date }}</time>
                    <ol class="mt-3 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($activitiesForDate as $activity)
                            <li>
                                <a href="#!" class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <div>
                                        <div class="text-m font-normal text-gray-600 dark:text-gray-400">
                                            {{ $activity->activity }}
                                        </div>
                                        <span class="text-muted text-sm">{{ $activity->created_at->diffForHumans() }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
