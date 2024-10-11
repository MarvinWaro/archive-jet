<div class="p-6 lg:p-8">

    <img src="{{ asset('img/CHED Logo New_20210406_CMYK_border_Logotype.svg') }}" alt="" class="max-w-[70%] hidden md:block"/>

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
            <a href="{{ url('admin/acic') }}">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ACIC</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">32</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-blue-500 dark:text-blue-400">
                            <span>Record Folders</span>

                            <i class="fa-solid fa-folder ps-2 text-lg"></i>
                        </dd>
                    </dl>
                </div>
            </a>

            <a href="{{ url('admin/mds') }}">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">MDS</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">54</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-blue-500 dark:text-blue-400">
                            <span>Record Folders</span>

                            <i class="fa-solid fa-folder ps-2 text-lg"></i>
                        </dd>
                    </dl>
                </div>
            </a>

            <a href="{{ url('admin/completed') }}">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">COMPLETED</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">21</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-blue-500 dark:text-blue-400">
                            <span>Record Folders</span>

                        <i class="fa-solid fa-check ps-2 text-lg"></i>
                        </dd>
                    </dl>
                </div>
            </a>

            <a href="{{ url('admin/in-progress') }}">
                <div class="p-6 bg-white shadow-2xl rounded-2xl hover:bg-gray-300 hover:shadow-xl transition duration-300">
                    <dl class="space-y-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">IN-PROGRESS</dt>

                        <dd class="text-5xl font-light md:text-6xl text-dark">12</dd>

                        <dd class="flex items-center space-x-1 text-sm font-medium text-blue-500 dark:text-blue-400">
                            <span>Record Folders</span>

                            <i class="fa-solid fa-spinner ps-2 text-lg"></i>
                        </dd>
                    </dl>
                </div>
            </a>
        </section>
    </div>
</div>

<hr class="w-[80%] mx-auto">

<x-data-table />

{{-- <script>

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

</script> --}}



