 document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                if (confirm('Bạn có chắc chắn muốn xóa?')) {
                    fetch(this.href, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            location.reload(); // Làm mới trang để cập nhật danh sách
                        } else {
                            alert(data.message);
                        }
                    });
                }
            });
        });
    });

