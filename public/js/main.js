if (document.getElementById("filter-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#filter-table", {
        perPage: 5,  // Set default page length to 5
        perPageSelect: [5, 10, 15, 20], // Allow user to select different page lengths
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

    // Truncate folder description in the 7th column to 15 characters
    document.querySelectorAll('#filter-table tbody tr td:nth-child(7)').forEach(function(td) {
        const text = td.textContent.trim(); // Get the text and trim spaces
        if (text.length > 15) {
            td.textContent = text.substring(0, 15) + '...'; // Truncate to 15 characters and add ellipsis
        }
    });
}
