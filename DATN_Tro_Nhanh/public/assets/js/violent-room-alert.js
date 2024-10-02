$(document).ready(function() {
    $('form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var submitButton = $('#submitButton');
        var buttonText = submitButton.find('.button-text');
        var spinner = submitButton.find('.spinner-border');
        var srOnly = submitButton.find('.sr-only');

        // Disable button and show loading spinner
        submitButton.prop('disabled', true);
        buttonText.addClass('d-none');
        spinner.removeClass('d-none');
        srOnly.removeClass('d-none');

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Thành công!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route("owners.properties") }}';
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Lỗi!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Đã xảy ra lỗi khi xử lý yêu cầu.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            },
            complete: function() {
                // Re-enable button and hide loading spinner
                submitButton.prop('disabled', false);
                buttonText.removeClass('d-none');
                spinner.addClass('d-none');
                srOnly.addClass('d-none');
            }
        });
    });
});