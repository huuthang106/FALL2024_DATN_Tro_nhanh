// Thông báo
document.getElementById('add-room').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // Thêm tất cả các tệp ảnh vào formData
    const files = document.getElementById('fileInput').files;
    Array.from(files).forEach(file => {
        formData.append('images[]', file);
    });

    try {
        const response = await fetch('/quan-ly-tai-khoan/luu', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        });

        const result = await response.json();

        if (result.success) {
            // Hiển thị thông báo thành công
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: 'Phòng trọ được tạo thành công!',
                timer: 3000, // Thời gian hiển thị thông báo
                showConfirmButton: true, // Hiển thị nút xác nhận
                confirmButtonText: 'OK', // Văn bản của nút xác nhận
                timerProgressBar: true, // Hiển thị thanh tiến độ
            }).then(() => {
                window.location.href = '/quan-ly-tai-khoan/can-ho';
            });
        } else {
            // Hiển thị thông báo lỗi nếu có
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: result.message || 'Đã xảy ra lỗi.',
                confirmButtonText: 'OK', // Văn bản của nút xác nhận
                timerProgressBar: true // Hiển thị thanh tiến độ
            });
        }
        console.log(result);

    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Lỗi mạng!',
            text: 'Lỗi mạng hoặc sự cố với máy chủ.',
            confirmButtonText: 'OK', // Văn bản của nút xác nhận
            timerProgressBar: true // Hiển thị thanh tiến độ
        });
    }
});
// Xem ảnh
function previewImages() {
    const preview = document.getElementById('imagePreview');
    const files = document.getElementById('fileInput').files;

    // Xóa ảnh cũ trước khi thêm ảnh mới
    // preview.innerHTML = ''; // Bỏ dòng này nếu muốn giữ các ảnh đã tải lên

    if (files.length > 0) {
        Array.from(files).forEach(file => {
            const reader = new FileReader();

            reader.onload = function (e) {
                // Kiểm tra xem ảnh đã tồn tại trong khu vực xem trước chưa
                const existingImgs = Array.from(preview.querySelectorAll('img')).map(img => img.src);
                if (!existingImgs.includes(e.target.result)) {
                    const container = document.createElement('div');
                    container.style.display = 'inline-block';
                    container.style.position = 'relative';
                    container.style.margin = '5px';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px'; // Kích thước hiển thị của ảnh
                    img.style.height = 'auto';

                    const removeButton = document.createElement('button');
                    removeButton.innerText = 'Xóa';
                    removeButton.style.position = 'absolute';
                    removeButton.style.top = '0';
                    removeButton.style.right = '0';
                    removeButton.style.backgroundColor = 'red';
                    removeButton.style.color = 'white';
                    removeButton.style.border = 'none';
                    removeButton.style.cursor = 'pointer';

                    removeButton.addEventListener('click', function () {
                        container.remove();
                    });

                    container.appendChild(img);
                    container.appendChild(removeButton);
                    preview.appendChild(container);
                }
            };

            reader.readAsDataURL(file);
        });
    }
}