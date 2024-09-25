$('#password-reset-form').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (response) {
            Swal.fire({
                title: 'Thành công!',
                text: response.status, // Hiển thị thông báo từ server
                icon: 'success',
                confirmButtonText: 'OK'
            });

            // Xóa thông báo lỗi nếu có
            $('#email').removeClass('is-invalid');
            $('.invalid-feedback').remove();
        },
        error: function (xhr) {
            if (xhr.status === 422) { // Lỗi xác thực
                let errors = xhr.responseJSON.errors;
                if (errors.email) {
                    $('#email').addClass('is-invalid');
                    $('.invalid-feedback').remove(); // Xóa các thông báo lỗi cũ
                    $('#email').after(
                        `<span class="invalid-feedback" role="alert"><strong>${errors.email[0]}</strong></span>`
                    );
                }
            } else {
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Có lỗi xảy ra, vui lòng thử lại sau.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    });
});

// Xóa thông báo lỗi khi người dùng thay đổi trường email
$('#email').on('input', function () {
    $(this).removeClass('is-invalid');
    $('.invalid-feedback').remove();
});
