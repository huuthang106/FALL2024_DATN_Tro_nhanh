document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.querySelector('input[name="images[]"]');
    const selectedImagesContainer = document.getElementById('selected-images');

    if (imageInput) {
        imageInput.addEventListener('change', function (event) {
            selectedImagesContainer.innerHTML = ''; // Clear existing images
            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail m-1';
                    img.style.maxWidth = '60px'; // Smaller image size
                    img.style.maxHeight = '50px'; // Smaller image size

                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'btn btn-danger btn-sm position-absolute';
                    removeBtn.innerHTML = 'X';
                    removeBtn.style.top = '0';
                    removeBtn.style.right = '0';
                    removeBtn.style.fontSize = '0.45rem';
                    removeBtn.style.padding = '0.25rem 0.5rem';
                    removeBtn.addEventListener('click', function () {
                        img.remove(); // Remove the image
                        removeBtn.remove(); // Remove the button
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
