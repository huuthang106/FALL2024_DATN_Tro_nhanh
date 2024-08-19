document.addEventListener('DOMContentLoaded', function () {
    // Kiểm tra xem có thông báo thành công trong session không
    if (window.successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: window.successMessage,
            showConfirmButton: true
        });
    }
});