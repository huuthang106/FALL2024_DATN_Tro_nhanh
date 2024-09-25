document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('blogForm');
    const nextButton = document.getElementById('nextButton');
    const fileInput = document.getElementById('fileInput');
    const submitButton = form.querySelector('button[type="submit"]');

    function validateTitle() {
        const title = document.getElementById('title').value.trim();
        if (title === '') {
            document.getElementById('titleError').style.display = 'block';
            return false;
        } else {
            document.getElementById('titleError').style.display = 'none';
            return true;
        }
    }

    function validateDescription() {
        const description = document.getElementById('description').value.trim();
        if (description === '') {
            document.getElementById('descriptionError').style.display = 'block';
            return false;
        } else {
            document.getElementById('descriptionError').style.display = 'none';
            return true;
        }
    }

    function validateForm() {
        const isTitleValid = validateTitle();
        const isDescriptionValid = validateDescription();
        const hasFile = fileInput.files.length > 0;

        if (!hasFile) {
            alert('Vui lòng chọn ít nhất một hình ảnh.');
        }

        return isTitleValid && isDescriptionValid && hasFile;
    }

    document.getElementById('title').addEventListener('input', validateTitle);
    document.getElementById('description').addEventListener('input', validateDescription);
    document.getElementById('title').addEventListener('blur', validateTitle);
    document.getElementById('description').addEventListener('blur', validateDescription);

    submitButton.addEventListener('click', function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    nextButton.addEventListener('click', function() {
        // Chuyển sang tab tiếp theo
        const nextTab = document.querySelector('#media');
        const tabs = document.querySelectorAll('.tab-pane');
        tabs.forEach(tab => tab.classList.remove('show', 'active'));
        nextTab.classList.add('show', 'active');
    });

    fileInput.addEventListener('change', function() {
        const fileList = this.files;
        const previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = '';

        for (let i = 0; i < fileList.length; i++) {
            const file = fileList[i];
            if (['image/jpeg', 'image/png'].includes(file.type)) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.margin = '5px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            } else {
                alert('Chỉ hỗ trợ định dạng JPEG và PNG.');
            }
        }
    });
});
