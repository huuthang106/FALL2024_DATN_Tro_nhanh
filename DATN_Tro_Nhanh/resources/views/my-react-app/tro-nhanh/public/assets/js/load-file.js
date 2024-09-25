document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('customFile');
    const imagePreview = document.getElementById('profileImagePreview');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});

//  nguyen huu thang đăng ký owner
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('CCCDMT');
    const imagePreview = document.getElementById('cccd-mt');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('CCCDMS');
    const imagePreview = document.getElementById('cccd-ms');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('FileFace');
    const imagePreview = document.getElementById('face');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});