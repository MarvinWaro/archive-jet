<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Welcome</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/flowbite@latest/dist/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body class="font-sans antialiased">
        <x-header-landing />


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                    <div class="content mb-5">
                        <h1 class="bg-purple-500 font-bold text-white p-6 text-lg rounded-xl">Mama Mo blue</h1>
                    </div>
                    {{-- Flex container for carousel and text, centered vertically --}}
                    <div class="flex items-center">
                        {{-- Carousel --}}
                        <div id="default-carousel" class="relative w-1/2" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('img/CHED Background Overlay_A.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('img/CHED Logo New_20210406_CMYK_border.svg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('img/1728423363604.jpeg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('img/1728423363623.jpeg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('img/1728423363645.jpeg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                            </div>
                            <!-- Slider indicators -->
                            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                            </div>
                            <!-- Slider controls -->
                            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                        {{-- Text Section, centered vertically --}}
                        <div class="w-1/2 p-4">
                            <h2 class="text-2xl font-bold text-center">Ched Archiving Records</h2>
                            <p class="mt-2 text-gray-600 text-center">
                                This is The repository of all records from ACIC and MDS Folder of the different Schools? Journal Voucher and its Number ADA.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            if (document.getElementById("filter-table") && typeof simpleDatatables.DataTable !== 'undefined') {
                const dataTable = new simpleDatatables.DataTable("#filter-table", {
                    tableRender: (_data, table, type) => {
                        if (type === "print") {
                            return table
                        }
                        const tHead = table.childNodes[0]
                        const filterHeaders = {
                            nodeName: "TR",
                            attributes: {
                                class: "search-filtering-row"
                            },
                            childNodes: tHead.childNodes[0].childNodes.map(
                                (_th, index) => ({nodeName: "TH",
                                    childNodes: [
                                        {
                                            nodeName: "INPUT",
                                            attributes: {
                                                class: "datatable-input",
                                                type: "search",
                                                "data-columns": "[" + index + "]"
                                            }
                                        }
                                    ]})
                            )
                        }
                        tHead.childNodes.push(filterHeaders)
                        return table
                    }
                });
            }
        </script>
    </body>


</html>
