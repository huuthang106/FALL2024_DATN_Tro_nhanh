function confirmLeave(itemId) {
    Swal.fire({
        title: 'Xác Nhận',
        text: 'Bạn có chắc chắn không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Có',
        cancelButtonText: 'Không, Quay Lại'
    }).then((result) => {
        if (result.isConfirmed) {
            // Nếu người dùng nhấn OK, gửi form
            document.getElementById('leave-room-form-' + itemId).submit();
        }
    });
}