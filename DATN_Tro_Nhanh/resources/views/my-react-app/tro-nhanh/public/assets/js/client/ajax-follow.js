// Hàm xử lý sự kiện gửi form
function handleFollowFormSubmit(event) {
    event.preventDefault(); // Ngăn chặn form submit ngay lập tức

    var form = event.target;
    var button = form.querySelector('button');
    var label = button.querySelector('.indicator-label');
    var progress = button.querySelector('.indicator-progress');
    
    // Lưu trạng thái hiện tại của nút
    var isFollowing = button.classList.contains('btn-light');

    // Thay đổi trạng thái của nút để hiển thị đang xử lý
    label.classList.add('d-none');
    progress.classList.remove('d-none');

    // Gửi yêu cầu Ajax
    var formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // console.log('Response Data:', data); // In ra toàn bộ dữ liệu phản hồi
        // console.log('Success:', data.success); // Truy cập `success`
        // console.log('Status:', data.status); // Truy cập `status`

        // Cập nhật giao diện người dùng dựa trên phản hồi
        if (data.original.success) {
            label.textContent = data.status;
            label.classList.remove('d-none');
            progress.classList.add('d-none');
            
            // Chuyển đổi trạng thái của nút dựa trên trạng thái hiện tại
            if (isFollowing) {
                // Nếu hiện tại là "theo dõi", chuyển sang "đã theo dõi"
                label.textContent = data.original.status;
                button.classList.remove('btn-light');
                button.classList.add('btn-primary');
            } else {
                // Nếu hiện tại là "đã theo dõi", chuyển sang "theo dõi"
                label.textContent = data.original.status;
                button.classList.remove('btn-primary');
                button.classList.add('btn-light');
            }
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra, vui lòng thử lại.');
    });
}

// Đăng ký sự kiện gửi form cho cả hai nút
document.addEventListener('DOMContentLoaded', function() {
    var followForms = document.querySelectorAll('#followForm, #unfollowForm');
    followForms.forEach(function(form) {
        form.addEventListener('submit', handleFollowFormSubmit);
    });
});
