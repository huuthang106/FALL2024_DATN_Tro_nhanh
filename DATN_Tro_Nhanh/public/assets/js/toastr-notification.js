// public/js/toastr-handler.js

document.addEventListener('DOMContentLoaded', function () {
    // Cấu hình Toastr với Progress Bar
    toastr.options = {
        "closeButton": true,
        "progressBar": true,  // Bật thanh tiến trình
        "positionClass": "toast-top-right",  // Vị trí hiển thị thông báo
        "timeOut": "5000",  // Thời gian tự động đóng thông báo
        "extendedTimeOut": "1000"
    };

    // Lưu thông báo từ session vào sessionStorage
    const successMessage = document.querySelector('meta[name="success"]').getAttribute('content');
    const errorMessage = document.querySelector('meta[name="error"]').getAttribute('content');

    if (successMessage) {
        sessionStorage.setItem('success', successMessage);
    }
    if (errorMessage) {
        sessionStorage.setItem('error', errorMessage);
    }

    // Hiển thị thông báo từ sessionStorage
    if (sessionStorage.getItem('success')) {
        toastr.success(sessionStorage.getItem('success'));
        sessionStorage.removeItem('success');
    }
    if (sessionStorage.getItem('error')) {
        toastr.error(sessionStorage.getItem('error'));
        sessionStorage.removeItem('error');
    }
});
