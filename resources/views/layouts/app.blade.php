@include('partials._header')

            @if (session('success'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-right',
                        iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast',
                        },
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        icon: 'success',
                        title: "{{ session('success') }}",
                    });
                </script>
            @endif

            @if (session('deleted'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-right',
                        iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast',
                        },
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        icon: 'error', // Change this to 'error' for the trashcan icon
                        title: "{{ session('deleted') }}",
                        background: '#f44336', // Set the background color to red
                        iconHtml: '<i class="fas fa-trash-alt" style="color: white;"></i>', // Custom HTML for the trashcan icon
                    });
                </script>
            @endif


            <!-- Display error messages if exists -->
            {{-- @if ($errors->any())
                <div class="mb-4 p-4 text-red-700 bg-red-100 rounded-lg" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

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

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const yearSelect = document.getElementById('yearSelect');
                const monthSelect = document.getElementById('monthSelect');
                const subYearSelect = document.getElementById('submission_year_select');
                const subMonthSelect = document.getElementById('submission_month_select');

                function updateSubmissionYearOptions() {
                    const selectedYear = parseInt(yearSelect.value);

                    for (let option of subYearSelect.options) {
                        option.disabled = false;
                        option.hidden = false;
                    }

                    for (let option of subYearSelect.options) {
                        const year = parseInt(option.value);
                        if (year < selectedYear) {
                            option.disabled = true;
                            option.hidden = true;
                        }
                    }
                }

                function updateSubmissionMonthOptions() {
                    const selectedYear = parseInt(yearSelect.value);
                    const selectedMonth = parseInt(monthSelect.value);
                    const selectedSubYear = parseInt(subYearSelect.value);

                    for (let option of subMonthSelect.options) {
                        option.disabled = false;
                        option.hidden = false;
                    }

                    // If submission year is the same as folder year, restrict based on the selected folder month
                    if (selectedSubYear === selectedYear) {
                        for (let option of subMonthSelect.options) {
                            const month = parseInt(option.value);
                            if (month < selectedMonth) {
                                option.disabled = true;
                                option.hidden = true;
                            }
                        }
                    }
                }

                // Update submission month when submission year or folder year/month changes
                yearSelect.addEventListener('change', () => {
                    updateSubmissionYearOptions();
                    updateSubmissionMonthOptions();
                });

                monthSelect.addEventListener('change', updateSubmissionMonthOptions);
                subYearSelect.addEventListener('change', updateSubmissionMonthOptions);

                // Initial run
                updateSubmissionYearOptions();
                updateSubmissionMonthOptions();
            });
        </script>

@include('partials._footer')
