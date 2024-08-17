document.getElementById('add-image-input').addEventListener('click', function () {
    // Tạo một input file mới
    var newInput = document.createElement('input');
    newInput.type = 'file';
    newInput.name = 'images[]';
    newInput.classList.add('form-control', 'form-control-lg', 'form-control-solid', 'mb-3');

    // Thêm input mới vào container
    document.getElementById('image-input-container').appendChild(newInput);
});