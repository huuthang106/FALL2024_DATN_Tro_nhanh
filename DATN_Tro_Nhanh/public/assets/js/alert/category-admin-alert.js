document.getElementById('demo').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch('http://127.0.0.1:8000/admin/category/store', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const result = await response.json();

        if (result.success) {
            // Hiển thị thông báo thành công và chuyển hướng
            toastr.success('Category được tạo thành công!');
            setTimeout(() => {
                // Đường dẫn chuyển trang
                window.location.href = 'admin/category/add-category';
            }, 1000); // Chờ 1 giây để thông báo hiển thị
        } else {
            // Hiển thị thông báo lỗi nếu có
            toastr.error(result.message || 'Đã xảy ra lỗi.');
        }
    } catch (error) {
        toastr.error('Lỗi mạng hoặc sự cố với máy chủ.');
    }
});