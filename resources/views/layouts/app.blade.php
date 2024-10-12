@include('partials._header')

        <x-banner />
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @stack('modals')
        @livewireScripts
        
        {{-- JS LINK SCRIPT TO PUCLIC --}}
        <script src="{{ asset('js/main.js') }}"></script>

@include('partials._footer')
