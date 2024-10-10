<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        CHED Record Archiving System
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        The CHED Record Archiving System streamlines the organization and retrieval of ACIC and MDS records,
        ensuring efficient access to crucial data. Designed to manage academic and financial documents,
        the system enhances document security, reduces manual effort, and supports compliance with
        regulatory standards. Users can quickly locate, update, and archive records, optimizing
        the workflow for educational institutions.
    </p>
</div>

<div class="card-container mb-6">
    <div class="flex justify-center items-center mb-6">
        <section class="grid gap-4 md:grid-cols-4 p-4 md:p-8 mx-auto w-full ">
            <a href="#!">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ACIC</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">32</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                            <span>Record Folders</span>

                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17.25 15.25V6.75H8.75"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 7L6.75 17.25"></path>
                            </svg>
                        </dd>
                    </dl>
                </div>
            </a>

            <a href="#!">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">MDS</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">54</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                            <span>Record Folders</span>

                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17.25 15.25V6.75H8.75"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 7L6.75 17.25"></path>
                            </svg>
                        </dd>
                    </dl>
                </div>
            </a>

            <a href="#!">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Completed</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">21</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                            <span>Record Folders</span>

                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17.25 15.25V6.75H8.75"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 7L6.75 17.25"></path>
                            </svg>
                        </dd>
                    </dl>
                </div>
            </a>

            <a href="#!">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">In-Progress</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">12</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                            <span>Record Folders</span>

                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17.25 15.25V6.75H8.75"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 7L6.75 17.25"></path>
                            </svg>
                        </dd>
                    </dl>
                </div>
            </a>
        </section>
    </div>
</div>

<hr>

<div class="mt-6 p-6">

    {{-- <!-- Export Button -->
    <button id="export-csv-btn" class="mb-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Export to CSV</button> --}}

    <table id="filter-table">
        <thead>
            <tr>
                <th>
                    <span class="flex items-center text-gray-900">
                        ID
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Date
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Folder Name
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Folder Type
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Folder Number
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Submission Date
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Others
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Remarks
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Status
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center text-gray-900">
                        Action
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">1</td>
                <td>January, 2023</td>
                <td>ACIC 105</td>
                <td>ACIC NUMBER</td>
                <td>012-12-023-15215-125-12366-456</td>
                <td>March 2023</td>
                <td>Folder #1</td>
                <td>RD, DONE</td>
                <td>IN-PROGRESS</td>
                <td>
                    Action
                </td>
            </tr>
            <tr>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">2</td>
                <td>March, 2023</td>
                <td>ACIC 105</td>
                <td>ACIC NUMBER</td>
                <td>012-12-023-15215-125-12366-456</td>
                <td>March 2023</td>
                <td>Folder #1</td>
                <td>RD, DONE</td>
                <td>IN-PROGRESS</td>
                <td>
                    Action
                </td>
            </tr>
        </tbody>
    </table>


</div>

<script>

    if (document.getElementById("filter-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        // Initialize the DataTable
        const dataTable = new simpleDatatables.DataTable("#filter-table", {
            tableRender: (_data, table, type) => {
                if (type === "print") {
                    return table;
                }
                const tHead = table.childNodes[0];
                const filterHeaders = {
                    nodeName: "TR",
                    attributes: {
                        class: "search-filtering-row"
                    },
                    childNodes: tHead.childNodes[0].childNodes.map(
                        (_th, index) => ({
                            nodeName: "TH",
                            childNodes: [
                                {
                                    nodeName: "INPUT",
                                    attributes: {
                                        class: "datatable-input",
                                        type: "search",
                                        "data-columns": "[" + index + "]"
                                    }
                                }
                            ]
                        })
                    )
                };
                tHead.childNodes.push(filterHeaders);
                return table;
            }
        });

        // CSV export functionality
        const exportCustomCSV = function (dataTable, userOptions = {}) {
            const clonedUserOptions = {
                ...userOptions
            };
            clonedUserOptions.download = false;
            const csv = simpleDatatables.exportCSV(dataTable, clonedUserOptions);
            if (!csv) return false;

            const defaults = {
                download: true,
                lineDelimiter: "\n",
                columnDelimiter: ";"
            };
            const options = {
                ...defaults,
                ...clonedUserOptions
            };

            const separatorRow = Array(
                dataTable.data.headings.filter((_heading, index) => !dataTable.columns.settings[index]?.hidden).length
            ).fill("+").join("+");

            const str = separatorRow + options.lineDelimiter + csv + options.lineDelimiter + separatorRow;

            if (userOptions.download) {
                const link = document.createElement("a");
                link.href = encodeURI("data:text/csv;charset=utf-8," + str);
                link.download = (options.filename || "datatable_export") + ".csv";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
            return str;
        };

        // Trigger CSV Export on button click
        document.getElementById('export-csv-btn').addEventListener('click', () => {
            exportCustomCSV(dataTable, { filename: "my_table_data" });
        });
    }

</script>



