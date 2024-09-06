document.addEventListener('DOMContentLoaded', function () {
    // Lấy các phần tử từ DOM
    const addImageInputButton = document.getElementById('add-image-input');
    const imageInputContainer = document.getElementById('image-input-container');

    // Kiểm tra xem các phần tử có tồn tại không
    if (addImageInputButton && imageInputContainer) {
        // Thêm sự kiện click cho nút
        addImageInputButton.addEventListener('click', function () {
            // Tạo một phần tử input mới
            const newImageInput = document.createElement('input');
            newImageInput.type = 'file';
            newImageInput.name = 'images[]';
            newImageInput.className = 'form-control form-control-lg form-control-solid mb-3';

            // Thêm input mới vào container
            imageInputContainer.appendChild(newImageInput);
        });
    } else {
        console.error('Element not found: add-image-input or image-input-container');
    }
});