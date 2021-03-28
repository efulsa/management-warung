function formatNumber(x) {
    if(isNaN(x))return "";
    n= x.toString().split('.');
    return "Rp. " + n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".")+(n.length>1?"."+n[1]:"");
}
$('#dtTableDetail').DataTable({
    responsive: true,
    autoWidth: false,
    processing: true,
    searching: true,
    fixedHeader: {
        "header": false,
        "footer": false
    },
    pageLength: 10,
    lengthChange: true,
    serverSide: true,
    lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "All "]
    ],
    aaSorting: [],
    language: {
        info: " _START_ sampai _END_ dari _TOTAL_ data",
        emptyTable: "Data tidak dapat ditemukan.",
        infoEmpty: "Tidak dapat ditemukan",
        infoFiltered: "(filter dari _MAX_ total data)",
        zeroRecords: "Pencarian tidak dapat ditemukan.",
        lengthMenu: "_MENU_  Data per halaman",
        loadingRecords: "Loading...",
        search: "_INPUT_",
        searchPlaceholder: "Cari...",
        paginate: {
            first: "First",
            last: "Last",
            next: ">",
            previous: "<"
        },
        buttons: {
            copy: "Copy",
            excel: "Excel",
            csv: "CSV",
            pdf: "PDF",
            print: "Print",
            colvis: "Column visibility"
        },

        processing: ''
    },
    ajax: function (res, callback) {
        $.ajax({
            url: $('#url-detail').val() + '/' + $('#id-detail').val(),
            data: res,
            dataType: 'json',
            beforeSend: function () {
                $('#dtTableCustomer > tbody').block({
                    message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-primary"></i>',
                    overlayCSS: {
                        backgroundColor: 'white',
                        opacity: 100
                    },
                    css: {
                        border: '0px',
                        padding: '0px',
                        background: 'transparent',
                        '-webkit-border-radius': '0px',
                        '-moz-border-radius': '0px',
                        color: 'transparent'
                    },
                });
            },
            success: function (res) {
                callback(res);
            }
        })
    },
    createdRow: function (row, data, dataIndex) {
        if (data.credit !== undefined) {
            // 4 here is the cell number, it starts from 0 where this number should appear
            $(row).find('td:eq(3)').html(formatNumber(data.credit));
            $(row).find('td:eq(4)').html(formatNumber(data.debit));
            $(row).find('td:eq(6)').html(formatNumber(data.saldo));
        }
    },
    columns: [
        {
            data      : 'DT_RowIndex',
            name      : 'DT_RowIndex',
            orderable : false,
            searchable: false,
        },
        {
            data: 'id',
            name: 'id',
            searchable: false,
            orderable : false,
        },
        {
            name: 'created_at.timestamp',
            data: {
                _   : 'created_at.display',
                sort: 'created_at'
            },
            searchable: true,
            orderable : true,
        },
        {
            data: 'credit',
            name: 'credit',
            searchable: false,
            orderable : false,
        },
        {
            data: 'debit',
            name: 'debit',
            searchable: false,
            orderable : false,
        },
        {
            data: 'type',
            name: 'type',
            searchable: true,
            orderable : false,
        },
        {
            data: 'saldo',
            name: 'saldo',
            searchable: false,
            orderable : false,
        },
    ],
    order: [
        [2, 'desc']
    ],
    columnDefs: [
        {
            targets: 0,
            sortable: false,
            orderable: false,
            className: "align-middle text-center text-nowrap",
        },
        {
            targets: 1,
            sortable: false,
            orderable: false,
            className: "align-middle text-center text-nowrap",
        },
        {
            targets: 2,
            sortable: false,
            orderable: false,
            className: "align-middle text-center text-nowrap",
        },
        {
            targets: 3,
            sortable: true,
            orderable: true,
            className: "align-middle text-nowrap",
        },
        {
            targets: 4,
            sortable: false,
            orderable: false,
            className: "align-middle text-nowrap",
        },
        {
            targets: 5,
            sortable: false,
            orderable: false,
            className: "align-middle text-center text-nowrap",
        },
        {
            targets: 6,
            sortable: false,
            orderable: false,
            className: "align-middle text-nowrap",
        },
    ],
})
