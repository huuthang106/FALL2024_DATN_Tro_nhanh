document.addEventListener('DOMContentLoaded', function() {
    // Xử lý sự kiện submit form xóa ảnh
    document.querySelectorAll('.delete-image-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn sự kiện submit mặc định
            const imagePreview = this.closest('tr');

            fetch(this.action, {
                method: 'DELETE', // Sử dụng phương thức DELETE
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    
                    imagePreview.remove();
                    location.reload();
                } else {
                    // Hiển thị SweetAlert khi có lỗi
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: data.message,
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Có lỗi xảy ra khi xóa ảnh.',
                });
            });
        });
    });
});