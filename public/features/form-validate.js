$("#form").validate({
    rules: {
        email: {
            required: true,
        },
        password: {
            required: true,
        }
    },
    messages: {
        email: {
            required: ' * Harap masukan email anda.',
        },
        password: {
            required: ' * Harap masukan transaksi anda.',
        }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
})
