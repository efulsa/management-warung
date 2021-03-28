$.ajax({
    header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-tokern"]').attr('content')
    }
});
$('.select2').select2();
var rp = 1;
var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function (e) {
    rupiah.value = formatRupiah(this.value, "Rp. ");
});
function add_fields() {
    rp++;
    var objTo = document.getElementById('room_fileds')
    var divtest = document.createElement("div");
    divtest.innerHTML =`<div class="content"><input type="text" id="rupiah${rp}" class="form-control form-control-sm mb-1" name="transaction[]" value="" /></div>`;
    objTo.appendChild(divtest)

    var a = document.getElementById("rupiah"+ rp);
    var b = document.getElementById("rupiah");
    a.addEventListener("keyup", function (e) {
        a.value = formatRupiah(this.value, "Rp. ");
    });
    b.addEventListener("keyup", function (e) {
        b.value = formatRupiah(this.value, "Rp. ");
    });
}
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }
    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? rupiah : "";
}
function formatNumber(x) {
    if(isNaN(x))return "";
    n= x.toString().split('.');
    return "Rp. " + n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".")+(n.length>1?"."+n[1]:"");
}
$('#form-borrow').on('submit', function (e) {
    e.preventDefault()
    $('#action_button').prop('disabled', false);
    $(this).validate({
        rules: {
            customer_id: {
                required: true,
            },
            'transaction[]': {
                required: true,
            }
        },
        messages: {
            'transaction[]': {
                required: 'Harap masukan transaksi anda.',
            }
        },
    });
    var isValid = $(this).valid();
    if (isValid) {
        $.ajax({
            url: $('#url-trans-store').val(),
            method: 'POST',
            data: $(this).serialize(),
            beforeSend: function () {
                $('#spinActionButton').addClass('fa-spinner fa-spin');
            },
            success: function (res) {
                $('#name-trans').text("Transaksi dari " + res.customer_name);
                $('#amount-trans').text("Rp." + res.customer_trans);
                $('#rupiah').html('')
                $('#room_fileds').html('<label for="transaction">Jumlah Transaksi</label><div class="content"><input type="text" class="form-control form-control-sm mb-1" name="transaction[]" id="rupiah"/> </div>');
                $('#form-borrow')[0].reset();
                $('#dtTableTrans').DataTable().draw();
                $('#spinActionButton').removeClass('fa-spinner fa-spin');
                if (res.errors) {
                    $('#spinActionButton').removeClass('fa-spinner fa-spin');
                    $('#action_button').prop('disabled', false);
                    Swal.fire({
                        title: 'Error',
                        icon: 'error',
                        text: "Error saat menginput data",
                    });
                    $('#spinActionButton').removeClass('fa-spinner fa-spin');
                } else {
                    setTimeout((function () {
                        toastr.options = {
                            positionClass: 'toast-top-center'
                        };
                        toastr.success("Transaksi Berhasil !");
                        var $notifyContainer = $('#toast-container').closest('.toast-top-center');
                        if ($notifyContainer) {
                            var windowHeight = $(window).height() - 90;
                            $notifyContainer.css("margin-top", windowHeight / 2);
                        }
                    }), 300)
                    $('#action_button').prop('disabled', false);
                }
            },
            error: function (res) {
                console.log(res.responseJSON);
                Swal.fire({
                    title: 'Error',
                    icon: 'error',
                    text: "Error saat menginput data",
                });
                $('#spinActionButton').removeClass('fa-spinner fa-spin');
            }
        })
    }
})
$('#customer_id').on('change', function(){
    $.ajax({
        url: $('#url-getTrans').val(),
        type: 'get',
        data: {
            'customer_id': $('#customer_id').val()
        },
        dataType: 'json',
        success: function (res) {
            $('#name-trans').html('');
            $('#amount-trans').text(formatNumber(res.trans))
        },
    })
})
$("#dtTableTrans").DataTable({
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
            url: $('#url-dtTableTrans').val(),
            data: res,
            dataType: 'json',
            beforeSend: function () {
                $('#dtTableTrans > tbody').block({
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
        });
    },
    createdRow: function (row, data, dataIndex) {
        if (data.credit !== undefined) {
            // 4 here is the cell number, it starts from 0 where this number should appear
            $(row).find('td:eq(4)').html(formatNumber(data.credit));
            $(row).find('td:eq(5)').html(formatNumber(data.debit));
            $(row).find('td:eq(6)').html(formatNumber(data.saldo));
            $(row).find('td:eq(7)').html(formatNumber(data.total));
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
            orderable : false,
            searchable: false
        },
        {
            name: 'created_at.timestamp',
            data: {
                _: 'created_at.display',
                sort: 'created_at'
            },
            orderable : true,
            searchable: true
        },
        {
            data: 'user',
            name: 'user',
            orderable : true,
            searchable: true
        },
        {
            name: 'credit',
            data: 'credit',
            orderable : false,
            searchable: false
        },
        {
            data: 'debit',
            name: 'debit',
            orderable : false,
            searchable: false
        },
        {
            data: 'saldo',
            name: 'saldo',
            orderable : false,
            searchable: false
        },
        {
            data: 'total',
            name: 'total',
            orderable : false,
            searchable: false
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
            orderable: true,
            className: "align-middle text-center text-nowrap",
        },
        {
            targets: 2,
            sortable: true,
            orderable: true,
            className: "align-middle text-center text-nowrap",
        },
        {
            targets: 3,
            sortable: true,
            orderable: true,
            className: "align-middle text-center text-nowrap",
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
            className: "align-middle text-nowrap",
        },
        {
            targets: 6,
            sortable: false,
            orderable: false,
            className: "align-middle text-nowrap",
        },
        {
            targets: 7,
            sortable: false,
            orderable: false,
            className: "align-middle text-nowrap",
        },
    ],
});

