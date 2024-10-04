function confirmToggleVisibility(status) {
    Swal.fire({
        title: status == 1 ? 'Công khai thông tin?' : 'Ẩn thông tin?',
        text: status == 1 ? 'Bạn có chắc muốn công khai thông tin này?' : 'Bạn có chắc muốn ẩn thông tin này?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('toggleVisibilityForm').submit();
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');

    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: successMessage.dataset.message,
        });
    }

    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: errorMessage.dataset.message,
        });
    }
});