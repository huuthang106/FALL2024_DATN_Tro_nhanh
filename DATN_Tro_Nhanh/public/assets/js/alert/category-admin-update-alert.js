
// Update
document.getElementById('update').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const categoryId = form.getAttribute('data-id');

    try {
        const response = await fetch(`admin/category/cap-nhat-loai/${categoryId}`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        const result = await response.json();

        if (result.success) {
            toastr.success(result.message || 'Loại được cập nhật thành công!');
            setTimeout(() => {
                window.location.href = 'admin/category/danh-sach-loai';
            }, 1000);
        } else {
            toastr.error(result.message || 'Đã xảy ra lỗi.');
        }
    } catch (error) {
        toastr.error('Lỗi mạng hoặc sự cố với máy chủ.');
    }
});