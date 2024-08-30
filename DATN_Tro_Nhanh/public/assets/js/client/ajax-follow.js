document.getElementById('followForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn form submit ngay lập tức

    var button = document.getElementById('followButton');
    var label = button.querySelector('.indicator-label');
    var progress = button.querySelector('.indicator-progress');

    // Thay đổi trạng thái của nút
    label.classList.add('d-none');
    progress.classList.remove('d-none');

    // Gửi yêu cầu Ajax
    var formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json' // Đảm bảo rằng bạn mong đợi JSON trả về
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Xử lý sau khi thành công
            label.textContent = 'Đã theo dõi';
            label.classList.remove('d-none');
            progress.classList.add('d-none');
            button.classList.remove('btn-light'); // Loại bỏ màu cũ
            button.classList.add('btn-primary');  // Thêm class để thay đổi màu nền của nút
        } else {
            // Xử lý lỗi nếu có
            alert('Có lỗi xảy ra.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra, vui lòng thử lại.');
    });
});
