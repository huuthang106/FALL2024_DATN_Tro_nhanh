document.addEventListener("DOMContentLoaded", function () {
    // Kiểm tra và hiển thị thông báo thành công
    if (document.getElementById('success-message')) {
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: document.getElementById('success-message').textContent,
            showConfirmButton: false,
            timer: 3000
        });
    }

    // Kiểm tra và hiển thị thông báo lỗi
    if (document.getElementById('error-message')) {
        Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: document.getElementById('error-message').textContent,
            showConfirmButton: false,
            timer: 3000
        });
    }
});
