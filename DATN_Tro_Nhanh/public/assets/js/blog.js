
document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form.blogForm'); // Assuming your form has a class "blogForm"
    var titleInput = document.getElementById('title');
    var descriptionInput = document.getElementById('description');
    var imageInput = document.getElementById('images');
    var imagePreview = document.getElementById('imagePreview');
    var titleError = document.getElementById('titleError');
    var descriptionError = document.getElementById('descriptionError');
    var imageError = document.getElementById('imageError');
    var noImageError = document.getElementById('noImageError');

    // Function to preview images
    function previewImages() {
        var files = imageInput.files;
        var maxFileSize = 2 * 1024 * 1024; // 2MB
        var allowedTypes = ['image/jpeg', 'image/png'];
        var invalidFiles = [];
        var isValid = true;

        // Reset preview and error messages
        imagePreview.innerHTML = '';
        imageError.style.display = 'none';
        imageError.textContent = '';
        noImageError.style.display = 'none';

        Array.from(files).forEach(file => {
            var fileType = file.type;
            var fileSize = file.size;

            // Check file type
            if (!allowedTypes.includes(fileType)) {
                invalidFiles.push('Ảnh phải là JPG hoặc PNG.');
                isValid = false;
            }

            // Check file size
            if (fileSize > maxFileSize) {
                invalidFiles.push('Kích thước ảnh không được vượt quá 2MB.');
                isValid = false;
            }

            // Check image dimensions
            var img = new Image();
            img.onload = function() {
                if (this.width !== 1024 || this.height !== 768) {
                    invalidFiles.push('Ảnh phải có kích thước 1024x768.');
                    isValid = false;
                }

                // Display errors if any
                if (!isValid) {
                    imageError.textContent = invalidFiles.join(' ');
                    imageError.style.display = 'block';
                }
                
                // Display image previews
                if (isValid) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imgElement = document.createElement('img');
                        imgElement.src = e.target.result;
                        imgElement.style.width = '100px';
                        imgElement.style.height = 'auto';
                        imagePreview.appendChild(imgElement);
                    };
                    reader.readAsDataURL(file);
                }
            };
            img.src = URL.createObjectURL(file);
        });
    }

    // Event listener for image input
    imageInput.addEventListener('change', function() {
        previewImages();
        // Clear noImageError when images are selected
        noImageError.style.display = 'none';
    });

    // Event listener for form submission
    form.addEventListener('submit', function(event) {
        var title = titleInput.value.trim();
        var description = descriptionInput.value.trim();
        var files = imageInput.files;

        // Reset error messages
        titleError.style.display = 'none';
        descriptionError.style.display = 'none';
        noImageError.style.display = 'none';

        var isValid = true;

        // Validate title
        if (!title) {
            titleError.style.display = 'block';
            isValid = false;
        }

        // Validate description
        if (!description) {
            descriptionError.style.display = 'block';
            isValid = false;
        }

        // Validate images
        if (files.length === 0) {
            noImageError.style.display = 'block';
            isValid = false;
        }

        // Prevent form submission if invalid
        if (!isValid) {
            event.preventDefault(); // Prevent form from submitting
        }
    });
});

