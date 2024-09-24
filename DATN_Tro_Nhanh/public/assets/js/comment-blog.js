// $(document).ready(function () {
//     $('#commentForm').submit(function (e) {
//         e.preventDefault();

//         var form = $(this);
//         var content = form.find('textarea[name="content"]').val();

//         if (!userIsLoggedIn) { 
//             Swal.fire({
//                 title: 'Bạn chưa đăng nhập',
//                 text: 'Vui lòng đăng nhập để thực hiện hành động này.',
//                 icon: 'warning',
//                 confirmButtonText: 'Đăng nhập',
//                 preConfirm: () => {
//                     location.reload(); 
//                 }
//             });
//             return;
//         }

//         if (!content) {
//             Swal.fire({
//                 title: 'Nội dung không được để trống',
//                 text: 'Vui lòng nhập nội dung bình luận.',
//                 icon: 'warning',
//                 confirmButtonText: 'OK'
//             });
//             return;
//         }



//         $.ajax({
//             type: 'POST',
//             url: form.attr('action'),
//             data: form.serialize(),
//             success: function (response) {
//                 if (response.success) {
//                     Swal.fire({
//                         title: 'Thành công!',
//                         text: response.message,
//                         icon: 'success',
//                         confirmButtonText: 'OK'
//                     }).then(() => {
//                         location.reload(); 
//                     });
//                 } else {
//                     Swal.fire({
//                         title: 'Có lỗi xảy ra',
//                         text: response.message || 'Vui lòng thử lại.',
//                         icon: 'error',
//                         confirmButtonText: 'OK'
//                     });
//                 }
//             },
//             error: function (xhr, status, error) {
//                 console.error('Có lỗi xảy ra:', xhr.responseText); // In ra nội dung lỗi chi tiết từ server
//                 Swal.fire({
//                     title: 'Có lỗi xảy ra',
//                     text: xhr.responseText || 'Vui lòng thử lại.',
//                     icon: 'error',
//                     confirmButtonText: 'OK'
//                 });
//             }

//         });
//     });
// });
$(document).ready(function () {
    $('#commentForm').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var content = form.find('textarea[name="content"]').val();

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
                    let errorMessage = response.message || 'Vui lòng thử lại.';
                    let icon = 'error';

                    if (errorMessage.includes('Bạn đã bình luận')) {
                        icon = 'warning';
                        errorMessage += ' Nếu muốn bình luận lại, hãy xóa bình luận cũ trước.';
                    }

                    Swal.fire({
                        title: 'Không thể bình luận',
                        text: errorMessage,
                        icon: icon,
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Có lỗi xảy ra:', xhr.responseText);
                let errorMessage = 'Đã xảy ra lỗi khi gửi bình luận.';
                try {
                    let responseJson = JSON.parse(xhr.responseText);
                    if (responseJson && responseJson.message) {
                        errorMessage = responseJson.message;
                    }
                } catch (e) {
                    console.error('Không thể parse response JSON:', e);
                }
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