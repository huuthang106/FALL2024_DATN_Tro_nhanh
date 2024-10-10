$(document).ready(function () {
    $('#commentForm').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var content = form.find('textarea[name="content"]').val();
        var rating = form.find('input[name="rating"]:checked').val();

        if (!userIsLoggedIn) {
            Swal.fire({
                title: 'Bạn chưa đăng nhập',
                text: 'Vui lòng đăng nhập để thực hiện hành động này.',
                icon: 'warning',
                confirmButtonText: 'Đăng nhập',
                preConfirm: () => {
                    location.reload();
                }
            });
            return;
        }
        if (!rating) {
            Swal.fire({
                title: 'Số sao không được để trống',
                text: 'Vui lòng chọn số sao.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }
        if (!content) {
            Swal.fire({
                title: 'Nội dung không được để trống',
                text: 'Vui lòng nhập nội dung bình luận.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Thành công!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Có lỗi xảy ra',
                        text: response.message || 'Vui lòng thử lại.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function (xhr, status, error) {
                let errorMessage = 'Vui lòng thử lại.'; // Thông báo mặc định

                // Kiểm tra xem phản hồi có phải là JSON không
                try {
                    const response = JSON.parse(xhr.responseText);
                    errorMessage = response.message || errorMessage; // Lấy thông báo từ phản hồi nếu có
                } catch (e) {
                    console.error('Không thể phân tích cú pháp phản hồi:', e);
                }

                // Hiển thị thông báo lỗi bằng SweetAlert
                Swal.fire({
                    title: 'Có lỗi xảy ra',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }

        });
    });
});
