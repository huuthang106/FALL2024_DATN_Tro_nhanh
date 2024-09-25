document.getElementById('blogForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        const result = await response.json();

        if (result.success) {
         
            toastr.success('Blog được tạo thành công!');
            setTimeout(() => {
                // Chuyển hướng nếu cần
                window.location.href = result.redirectUrl || '/quan-ly-tai-khoan/them-blog'; // Thay đổi theo nhu cầu
            }, 1000); // Chờ 1 giây để thông báo hiển thị
        } else {
            // Hiển thị thông báo lỗi
            toastr.error(result.message || 'Đã xảy ra lỗi.');
        }
    } catch (error) {
        toastr.error('Lỗi mạng hoặc sự cố với máy chủ.');
    }
});
