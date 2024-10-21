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
                    {{-- Flex container for carousel and text, centered vertically --}}
                    <section class="bg-center bg-no-repeat bg-gray-700 bg-blend-multiply" style="background-image: url('{{ asset('img/ched9.jpg') }}');">
                        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
                            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                                CHEDRO9 Record Archiving System
                            </h1>
                            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                                designed for tracking and managing signed or unsigned records and documents.
                                It focuses on retrieving and displaying data, making it easy to visualize the
                                current status of documents.
                            </p>
                            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                                <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                    Get started
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </section>

                    <section id="about" class="bg-center bg-no-repeat bg-gray-700 bg-blend-multiply" style="background-image: url('{{ asset('img/ched9.jpg') }}');">
                    
                    </section>

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
