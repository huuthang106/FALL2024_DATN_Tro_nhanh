$(document).ready(function () {
    // Xử lý form đăng ký
    $('#registerForm').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();
        // Hiển thị thông báo "Đang đăng nhập..." và hiệu ứng tải
        $('#register-loading').show();
        $('button[type="submit"]').prop('disabled', true);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function (response) {
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
            error: function (xhr) {
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
                    $('#register-password-error').html('<p>' + errors.password[0] + '</p>');
                }
                // Ẩn thông báo "Đang đăng nhập..." và hiệu ứng tải
                $('#register-loading').hide();
                $('button[type="submit"]').prop('disabled', false);
            }
        });
    });

    $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        // Hiển thị thông báo "Đang đăng nhập..." và hiệu ứng tải
        $('#login-loading').show();
        $('button[type="submit"]').prop('disabled', true);

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function (response) {
                window.location.href = response.redirect;
            },
            error: function (xhr) {
                var errors = xhr.responseJSON.errors;
                $('#login-email-error').html('');
                $('#login-password-error').html('');
                if (errors.email) {
                    $('#login-email-error').html('<p>' + errors.email[0] + '</p>');
                }
                if (errors.password) {
                    $('#login-password-error').html('<p>' + errors.password[0] + '</p>');
                }
                // Ẩn thông báo "Đang đăng nhập..." và hiệu ứng tải
                $('#login-loading').hide();
                $('button[type="submit"]').prop('disabled', false);
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    
    togglePasswordButtons.forEach(button => {
        button.addEventListener('click', function() {
            const passwordField = this.closest('.input-group').querySelector('input');
            
            // Chuyển đổi loại input
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            // Chuyển đổi biểu tượng
            this.querySelector('i').classList.toggle('fa-eye-slash');
            this.querySelector('i').classList.toggle('fa-eye');
        });
    });
});