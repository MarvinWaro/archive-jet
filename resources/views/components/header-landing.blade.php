<header class="shadow-lg">
    <div class="hide" style="display: none;">
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <script>
                        window.location.href = "{{ route('admin.dashboard') }}";
                    </script>
                @endauth
            </nav>
        @endif
    </div>

    {{-- links of nav --}}
    <x-landing-component />
</header>

