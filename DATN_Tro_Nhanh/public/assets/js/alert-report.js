// Form Reports
// $(document).ready(function () {
//     // Xử lý form báo cáo
//     $('#reportForm').on('submit', function (e) {
//         e.preventDefault();

//         var formData = $(this).serialize();

//         $.ajax({
//             type: 'POST',
//             url: $(this).attr('action'),
//             data: formData,
//             success: function (response) {
//                 if (response.success) {
//                     $('#reportForm').trigger('reset');
//                     $('#reportModal').modal('hide');

//                     Swal.fire({
//                         title: 'Báo cáo thành công!',
//                         text: response.message,
//                         icon: 'success',
//                         confirmButtonText: 'OK',
//                         allowOutsideClick: false
//                     }).then((result) => {
//                         if (result.isConfirmed) {
//                             window.location.href = response.redirect;
//                         }
//                     });
//                 }
//             },
//             error: function (xhr) {
//                 var errors = xhr.responseJSON.errors;
//                 $('#description-error').html(
//                     '');

//                 if (errors && errors.description) {
//                     $('#description-error').html('<p>' + errors.description[0] +
//                         '</p>');
//                 }
//             }
//         });
//     });
// });
$(document).ready(function () {
    // Xử lý form báo cáo
    $('#reportForm').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function (response) {
                if (response.success) {
                    $('#reportForm').trigger('reset');
                    $('#reportModal').modal('hide');

                    Swal.fire({
                        title: 'Báo cáo thành công!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = response.redirect;
                        }
                    });
                } else {
                    // Xử lý trường hợp response.success là false
                    Swal.fire({
                        title: 'Lỗi!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function (xhr) {
                var errorMessage = 'Đã xảy ra lỗi. Vui lòng thử lại sau.';

                if (xhr.status === 422) {
                    var response = xhr.responseJSON;
                    if (response && response.message) {
                        errorMessage = response.message;
                    } else if (response && response.errors) {
                        errorMessage = Object.values(response.errors)[0][0];
                    }
                }

                Swal.fire({
                    title: 'Lỗi!',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });

                // Xóa thông báo lỗi cũ
                $('#description-error').html('');
            }
        });
    });
});
// Form Bills
$(document).ready(function () {
    // Xử lý form tạo hóa đơn cho tất cả các modal
    $('[id^=invoiceModal]').each(function () {
        var modal = $(this);
        var form = modal.find('form');

        form.on('submit', function (e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function (response) {
                    if (response.success) {
                        form[0].reset();
                        modal.modal('hide');

                        Swal.fire({
                            title: 'Tạo hóa đơn thành công!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                if (response.redirect) {
                                    window.location.href = response
                                        .redirect;
                                } else {
                                    location.reload();
                                }
                            }
                        });
                    }
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;

                    // Xóa tất cả thông báo lỗi cũ
                    form.find('.text-danger').html('');

                    // Hiển thị lỗi mới
                    if (errors) {
                        $.each(errors, function (key, value) {
                            form.find('#' + key + '-error').html('<p>' +
                                value[0] + '</p>');
                        });
                    }
                }
            });
        });
    });
});
