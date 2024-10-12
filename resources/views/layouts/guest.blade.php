@include('partials._header')

    <div class="background-overlay">
        <div class="font-sans text-gray-900 antialiased content-container">
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
    {{-- JS LINK SCRIPT TO PUCLIC --}}
    <script src="{{ asset('js/main.js') }}"></script>

@include('partials._footer')
