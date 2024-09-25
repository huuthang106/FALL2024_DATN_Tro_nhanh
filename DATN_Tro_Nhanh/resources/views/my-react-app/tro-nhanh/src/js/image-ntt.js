document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.querySelector('input[name="images[]"]');
    const selectedImagesContainer = document.getElementById('selected-images');
    const errorContainer = document.getElementById('image-limit-error');
    const maxImages = 15; // Số lượng ảnh tối đa

    if (imageInput) {
        imageInput.addEventListener('change', function (event) {
            const totalFiles = event.target.files.length;

            // Kiểm tra số lượng ảnh
            if (totalFiles > maxImages) {
                errorContainer.style.display = 'block'; // Hiển thị thông báo lỗi
                imageInput.value = ''; // Reset lại input nếu quá số lượng
                selectedImagesContainer.innerHTML = ''; // Xóa các ảnh đã hiển thị
                return;
            } else {
                errorContainer.style.display = 'none'; // Ẩn thông báo lỗi nếu đúng số lượng
            }

            selectedImagesContainer.innerHTML = ''; // Xóa các ảnh đã hiển thị
            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail m-1';
                    img.style.maxWidth = '60px'; // Kích thước ảnh nhỏ hơn
                    img.style.maxHeight = '50px'; // Kích thước ảnh nhỏ hơn

                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'btn btn-danger btn-sm position-absolute';
                    removeBtn.innerHTML = 'X';
                    removeBtn.style.top = '0';
                    removeBtn.style.right = '0';
                    removeBtn.style.fontSize = '0.45rem';
                    removeBtn.style.padding = '0.25rem 0.5rem';
                    removeBtn.addEventListener('click', function () {
                        img.remove(); // Xóa ảnh
                        removeBtn.remove(); // Xóa nút xóa
                    });

                    const wrapper = document.createElement('div');
                    wrapper.className = 'position-relative d-inline-block m-1';
                    wrapper.style.position = 'relative';
                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);

                    selectedImagesContainer.appendChild(wrapper);
                };
                
                reader.readAsDataURL(file);
            });
        });
    }
});
