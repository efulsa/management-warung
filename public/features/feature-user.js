$.ajax({
    header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-tokern"]').attr('content')
    }
});
function formatNumber(x) {
    if(isNaN(x))return "";
    n= x.toString().split('.');
    return "Rp. " + n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".")+(n.length>1?"."+n[1]:"");
}
$('#dtTableCustomer').DataTable({
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
            url: $('#url-dtTableCustomer').val(),
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
        if (data.borrow !== undefined) {
            // 4 here is the cell number, it starts from 0 where this number should appear
            $(row).find('td:eq(3)').html(formatNumber(data.borrow));
        }
    },
    columns: [
        {
            data: 'id',
            name: 'id',
            visible: false,
            searchable: false
        },
        {
            data      : 'DT_RowIndex',
            name      : 'DT_RowIndex',
            orderable : false,
            searchable: false,
        },
        {
            data: 'name',
            name: 'name',
            orderable : true,
            searchable: true
        },
        {
            name: 'email',
            data: 'email',
            orderable : true,
            searchable: true
        },
        {
            name: 'borrow',
            data: 'borrow',
            searchable: false
        },
        {
            name: 'option',
            data: 'option',
            searchable: false
        },
    ],
    order: [
        [2, 'asc']
    ],
    columnDefs: [
        {
            targets: 0,
            sortable: true,
            orderable: true
        },
        {
            targets: 1,
            sortable: true,
            orderable: true,
            className: "align-middle text-center",
            width: "5%"
        },
        {
            targets: 2,
            sortable: true,
            orderable: true,
            className: "align-middle",
        },
        {
            targets: 3,
            sortable: true,
            orderable: true,
            className: "align-middle",
        },
        {
            targets: 4,
            sortable: false,
            orderable: false,
            className: "align-middle",
        },
        {
            targets: 5,
            sortable: false,
            orderable: false,
            className: "align-middle text-center",
        },

    ],
})
$(document).on('click','#create-record', function (e) {
    e.preventDefault()
    $('#form-modal').modal('show')
    $('#action').val('create')
    $('#btn-submit').show()
    $('#form-customer')[0].reset()
    $('#password-hide').show()
    $('#form-modal').prop('disabled', true)
})

$(document).on('click','.show', function(e){
    e.preventDefault()
    $('#form-modal').modal('show')
    var id = $(this).attr('id')
    var url = $('#url-customer-show').val()
    var detail = $('#url-customer-detail').val()
    $('#btn-submit').hide('')
    $('#password-hide').hide('')
    $('#form-modal').prop('disabled', true)
    $.ajax({
        url : url+'/'+id,
        dataType: 'json',
        success: function (res){
            $('#name').prop('disabled', true).val(res.name)
            $('#email').prop('disabled', true).val(res.email)
            $('#btn-detail').html(`<a href="${detail}/${id}" class="btn btn-block btn-primary"><i id="btn-loading" class="fa "></i> Riwayat</a>`)
        }
    })
    $('#name').prop('enable', true)
    $('#email').prop('enable', true)
})

$(document).on('click','.edit', function (e){
    e.preventDefault()
    $('#form-modal').modal('show')
    $('#action').val('')
    $('#btn-submit').show()
    $('#form-customer')[0].reset()
    $('#password-hide').show()
    var url = $('#url-customer-edit').val()
    var id = $(this).attr('id')
    $('#form-modal').prop('disabled', true)
    $.ajax({
        url: url+'/'+id,
        dataType: 'json',
        success: function (res){
            $('#action').val('edit')
            $('.modal-title').text('Edit pelanggan')
            $('#id-customer').val(res.id)
            $('#name').val(res.name)
            $('#email').val(res.email)
            $('#password').val('12345678')
        }
    })
})

function deleteUser(idx) {
    Swal.fire({
        title             : 'Apakah anda yakin?',
        text              : "Anda tidak dapat mengembalikan data ini!",
        icon              : 'warning',
        showCancelButton  : true,
        cancelButtonColor : '#3085d6',
        confirmButtonColor: '#d33',
        cancelButtonText  : 'Kembali',
        confirmButtonText : 'Ya, hapus!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': document.getElementsByName("_token")[0].value
                },
                type: 'POST',
                url : $('#url-customer-delete').val(),
                data: {
                    id: idx
                },
                success: function (res) {
                    $('#dtTableCustomer').DataTable().draw();
                    setTimeout((function () {
                        toastr.options = {
                            positionClass: 'toast-top-center'
                        };

                        toastr.success("Data telah dihapus", "Berhasil!!");

                        var $notifyContainer = $('#toast-container').closest('.toast-top-center');
                        if ($notifyContainer) {
                            var windowHeight = $(window).height() - 90;
                            $notifyContainer.css("margin-top", windowHeight / 2);
                        }
                    }), 800);
                },
                error: function (res) {
                    console.log(res.responseJSON);
                    Swal.fire({
                        title: 'Error',
                        icon : 'error',
                        text : "Error when trying delete data",
                    });
                }
            });
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            toastr.options = {
                positionClass: 'toast-top-center',
                timeOut      : 500,
            };

            toastr.error("Data aman :)", "Dibatalkan!!");

            var $notifyContainer = $('#toast-container').closest('.toast-top-center');
            if ($notifyContainer) {
                var windowHeight = $(window).height() - 90;
                $notifyContainer.css("margin-top", windowHeight / 2);
            }
        }
    })
};

$('#form-customer').on('submit', function (e) {
    e.preventDefault();
    var url = ''

    if($('#action').val() == 'create'){
        toastText = 'ditambahkan';
        url = $('#url-customer-store').val()
    }
    if($('#action').val() == 'edit'){
        toastText = 'diubah';
        url = $('#url-customer-update').val()
    }
    $(this).validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            password: {
                required: true,
            }
        },
        messages: {
            email: {
                required: ' * Harap masukan email.',
            },
            password: {
                required: ' * Harap masukan password.',
            },
            name: {
                required: ' * Harap masukan nama.',
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    })
    var isValid = $(this).valid();
    if (isValid) {
        $.ajax({
            url: url,
            method: 'POST',
            data: $(this).serialize(),
            beforeSend: function () {
                $('#btn-loading').addClass('fa-spinner fa-spin')
            },
            success: function (res) {
                console.log($(this).serialize())
                console.log(res)
                if (res.errors) {
                    $('#btn-loading').removeClass('fa-spinner fa-spin')
                    $('#name').addClass('is-invalid')
                    $('#invalid-feedback').html(res.errors)
                    console.log(res.errors)
                } else {
                    $('#btn-loading').removeClass('fa-spinner fa-spin')
                    $('#form-modal').modal('hide')
                    $('#form-customer')[0].reset()
                    $('#dtTableCustomer').DataTable().draw()
                    setTimeout((function () {
                        toastr.options = {
                            positionClass: 'toast-top-center'
                        };

                        toastr.success("Data telah" + toastText + "", "Berhasil!!");

                        var $notifyContainer = $('#toast-container').closest('.toast-top-center');
                        if ($notifyContainer) {
                            var windowHeight = $(window).height() - 90;
                            $notifyContainer.css("margin-top", windowHeight / 2);
                        }

                    }), 800);
                }
            },
            error: function (res) {
                console.log(res.responseJSON);
                $('#btn-loading').removeClass('fa-spinner fa-spin')
                Swal.fire({
                    title: 'Error',
                    icon: 'error',
                    text: "Error when trying save data",
                });
            }
        })
    }
})
