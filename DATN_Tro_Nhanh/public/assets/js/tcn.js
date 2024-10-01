document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('fileInput');
    const previewContainer = document.getElementById('imagePreview');
    const dropzone = document.getElementById('myDropzone');
    const maxFileSize = 5 * 1024 * 1024; // 5MB

    // Xử lý kéo và thả
    dropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropzone.classList.add('dragover');
    });

    dropzone.addEventListener('dragleave', function() {
        dropzone.classList.remove('dragover');
    });

    dropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropzone.classList.remove('dragover');
        if (e.dataTransfer.files.length > 0) {
            handleFile(e.dataTransfer.files[0]);
        }
    });

    // Xử lý khi chọn file
    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            handleFile(this.files[0]);
        }
    });

    function handleFile(file) {
        previewContainer.innerHTML = '';

        if (file.size > maxFileSize) {
            alert(`File ${file.name} vượt quá kích thước cho phép (5MB).`);
            fileInput.value = '';
            return;
        }

        if (!['image/jpeg', 'image/png'].includes(file.type)) {
            alert(`File ${file.name} không phải là ảnh hợp lệ (chỉ chấp nhận JPEG hoặc PNG).`);
            fileInput.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            const wrapper = createImagePreview(e.target.result, file);
            previewContainer.appendChild(wrapper);
        };
        reader.readAsDataURL(file);

        // Cập nhật fileInput để chỉ chứa file được chọn
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        fileInput.files = dataTransfer.files;
    }

    function createImagePreview(src, file) {
        const wrapper = document.createElement('div');
        wrapper.className = 'image-preview-wrapper';
        wrapper.style.display = 'inline-block';
        wrapper.style.position = 'relative';
        wrapper.style.margin = '5px';

        const img = document.createElement('img');
        img.src = src;
        img.style.width = '100px';
        img.style.height = '100px';
        img.style.objectFit = 'cover';

        const removeBtn = document.createElement('button');
        removeBtn.textContent = 'X';
        removeBtn.className = 'remove-image-btn';
        removeBtn.style.position = 'absolute';
        removeBtn.style.top = '0';
        removeBtn.style.right = '0';
        removeBtn.style.backgroundColor = 'red';
        removeBtn.style.color = 'white';
        removeBtn.style.border = 'none';
        removeBtn.style.borderRadius = '50%';
        removeBtn.style.padding = '2px 5px';
        removeBtn.style.cursor = 'pointer';

        removeBtn.addEventListener('click', function() {
            wrapper.remove();
            fileInput.value = ''; // Xóa file đã chọn
        });

        wrapper.appendChild(img);
        wrapper.appendChild(removeBtn);
        return wrapper;
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('fileInput');
    const titleInput = document.getElementById('title');
    const descriptionTextarea = document.getElementById('description-field');
    const errorMessageTitle = document.getElementById('title-error');
    const errorMessageDescription = document.getElementById('description-error');
    const errorMessageImages = document.getElementById('images-error');

    // Ẩn thông báo lỗi khi người dùng chọn file
    fileInput.addEventListener('change', function () {
        if (errorMessageImages) {
            errorMessageImages.style.display = 'none'; // Ẩn thông báo lỗi ảnh
        }
    });

    // Ẩn thông báo lỗi khi người dùng nhập tiêu đề
    titleInput.addEventListener('input', function () {
        if (errorMessageTitle) {
            errorMessageTitle.style.display = 'none'; // Ẩn thông báo lỗi tiêu đề
        }
    });

    // Ẩn thông báo lỗi khi người dùng nhập nội dung
    descriptionTextarea.addEventListener('input', function () {
        if (errorMessageDescription) {
            errorMessageDescription.style.display = 'none'; // Ẩn thông báo lỗi nội dung
        }
    });

    // Optional: Ẩn thông báo lỗi khi kéo và thả ảnh
    const dropzone = document.getElementById('myDropzone');
    dropzone.addEventListener('drop', function () {
        if (errorMessageImages) {
            errorMessageImages.style.display = 'none'; // Ẩn thông báo lỗi khi kéo và thả ảnh
        }
    });

    // Optional: Xử lý khi người dùng nhấn vào nút tải lên để ẩn thông báo lỗi ảnh
    const uploadButton = document.querySelector('#myDropzone .btn');
    if (uploadButton) {
        uploadButton.addEventListener('click', function () {
            if (errorMessageImages) {
                errorMessageImages.style.display = 'none'; // Ẩn thông báo lỗi khi nhấn nút tải lên
            }
        });
    }
});







