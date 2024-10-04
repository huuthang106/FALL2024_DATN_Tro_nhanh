// Lắng nghe sự kiện khi người dùng chọn checkbox tổng
document.getElementById('chonTatCa').addEventListener('change', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateSelectedCount();  // Cập nhật số lượng checkbox được chọn
});

// Lắng nghe sự kiện khi từng checkbox thay đổi
document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', updateSelectedCount);
});

// Hàm cập nhật số lượng checkbox đã chọn
function updateSelectedCount() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    const totalSelected = checkboxes.length;

    // Kiểm tra nếu có checkbox tổng được chọn thì trừ 1, nếu không thì để giá trị là 0
    const selectedCount = document.getElementById('chonTatCa').checked ? totalSelected - 1 : totalSelected;

    // Cập nhật hiển thị số lượng đã chọn vào nút và text
    document.getElementById('delete-all-btn').value = `Xóa tất cả (${Math.max(selectedCount, 0)})`;
    document.getElementById('selected-count').textContent = Math.max(selectedCount, 0);  // Đảm bảo không có giá trị âm
}

// Xử lý sự kiện khi nhấn nút "Xóa tất cả"
document.querySelector('.btn-danger').addEventListener('click', function (event) {
    event.preventDefault();  // Ngăn không cho form submit mặc định

    const selectedIds = Array.from(document.querySelectorAll('input[type="checkbox"]:checked'))
        .map(checkbox => checkbox.value)
        .filter(id => id !== 'on');  // Loại bỏ giá trị 'on' (checkbox tổng)

    if (selectedIds.length > 0) {
        // Gửi yêu cầu xóa tới server qua AJAX
        fetch("{{ route('blogs.delete-multiple') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ ids: selectedIds })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Nếu xóa thành công, chuyển hướng đến trang thùng rác hoặc reload lại trang
                    window.location.href = "{{ route('blogs.trash') }}";
                } else {
                    alert("Có lỗi xảy ra khi xóa các mục đã chọn.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    } else {
        alert("Vui lòng chọn ít nhất một mục để xóa.");
    }
});
