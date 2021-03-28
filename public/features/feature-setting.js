$('#form-setting').on('submit', function(e){
    e.preventDefault()
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
                minlength: 8
            }
        },
        messages: {
            name: {
                required: ' * Harap masukan nama anda.',
            },
            email: {
                required: ' * Harap masukan email anda.',
            },
            password: {
                required: ' * Harap masukan transaksi anda.',
                minlength: ' * Password minimal 8 karakter.'
            }
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
    var isValid = $(this).valid()
    if(isValid){
        $.ajax({
            url: $('#url-setting').val(),
            method: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function () {
                $('#btn-loading').addClass('fa-spinner fa-spin')
            },
            success: function(res){
                console.log(res)
                $('#btn-loading').removeClass('fa-spinner fa-spin')
                $('#name').val(res.name)
                $('#email').val(res.email)
                setTimeout((function () {
                    toastr.options = {
                        positionClass: 'toast-top-center'
                    };

                    toastr.success("Data telah diubah", "Berhasil!!");

                    var $notifyContainer = $('#toast-container').closest('.toast-top-center');
                    if ($notifyContainer) {
                        var windowHeight = $(window).height() - 90;
                        $notifyContainer.css("margin-top", windowHeight / 2);
                    }
                }), 800);
            }
        })
    }
})
