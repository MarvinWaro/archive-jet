<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome
                    :folders="$folders"
                    :records="$records"
                    :acicCount="$acicCount"
                    :mdsCount="$mdsCount"
                    :completedCount="$completedCount"
                    :inProgressCount="$inProgressCount"
                />
            </div>
        </div>
    </div>
</x-app-layout>

