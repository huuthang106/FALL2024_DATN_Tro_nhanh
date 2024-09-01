document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('account-info-form');
    const modalElement = document.getElementById('accountInfoModal');
    const modal = new bootstrap.Modal(modalElement);

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Ngăn không cho form tự động gửi

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Thành công!',
                    text: 'Thông tin đã được gửi thành công.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Đóng modal và hiển thị thông báo
                        modal.hide();
                    }
                });
            } else {
                Swal.fire({
                    title: 'Lỗi!',
                    text: data.message || 'Có lỗi xảy ra khi gửi thông tin.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Lỗi!',
                text: 'Có lỗi xảy ra khi gửi thông tin.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    });
});
