document.getElementById('demo').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch('admin/category/store', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        const result = await response.json();

        if (result.success) {
            toastr.success('Loại được tạo thành công!');
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

