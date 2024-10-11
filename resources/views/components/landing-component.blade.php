<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo and Brand Name -->
        <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/CHED Logo New_20210406_CMYK_border_Logotype.svg') }}" alt="CHED Logo" class="h-[100px] w-auto"/>
        </a>

        <!-- Mobile Menu Button -->
        <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <!-- Navigation Links -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 dark:divide-gray-600">
                <!-- Loop through your nav links using x-nav-link -->
                <li>
                    <x-nav-link href="{{ url('/') }}" :active="request()->is('/')">
                        {{ __('Home') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ url('about') }}" :active="request()->is('about')">
                        {{ __('About') }}
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</nav>

