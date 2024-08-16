$(document).ready(function() {
    // Xử lý form đăng ký
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {

                $('#registerForm').trigger('reset');
                $('#registerModal').modal('hide');

                Swal.fire({
                    title: 'Đăng ký thành công!',
                    text: 'Bạn đã đăng ký thành công. ',
                    icon: 'success',
                    confirmButtonText: 'Oki',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = response.redirect;
                    }
                });
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                $('#register-name-error').html('');
                $('#register-email-error').html('');
                $('#register-password-error').html('');
                if (errors.name) {
                    $('#register-name-error').html('<p>' + errors.name[0] + '</p>');
                }
                if (errors.email) {
                    $('#register-email-error').html('<p>' + errors.email[0] + '</p>');
                }
                if (errors.password) {
                    $('#register-password-error').html('<p>' + errors.password[0] +
                        '</p>');
                }
            }
        });
    });

    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {

                window.location.href = response.redirect;
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                $('#login-email-error').html('');
                $('#login-password-error').html('');
                if (errors.email) {
                    $('#login-email-error').html('<p>' + errors.email[0] + '</p>');
                }
                if (errors.password) {
                    $('#login-password-error').html('<p>' + errors.password[0] +
                        '</p>');
                }
            }
        });
    });
});