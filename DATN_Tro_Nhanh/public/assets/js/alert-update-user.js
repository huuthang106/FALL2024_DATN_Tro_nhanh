document.addEventListener('DOMContentLoaded', function () {
    // Kiểm tra xem có thông báo thành công trong session không
    if (window.successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: window.successMessage,
            showConfirmButton: true
        });
    } else if (window.errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: window.errorMessage,
            showConfirmButton: true
        });
    }
});