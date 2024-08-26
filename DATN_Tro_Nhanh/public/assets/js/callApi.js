let currentImgElementId = '';
let currentInputElementId = '';
let fileInputCount = 0;

function openCameraModal(imgElementId, inputElementId) {
    currentImgElementId = imgElementId;
    currentInputElementId = inputElementId;

    const video = document.getElementById('video');
    navigator.mediaDevices.getUserMedia({ video: true })
        .then((stream) => {
            video.srcObject = stream;
            $('#cameraModal').modal('show');
        })
        .catch((err) => {
            console.error('Error accessing the camera:', err);
        });
}

document.getElementById('captureButton').addEventListener('click', function () {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const imgElement = document.getElementById(currentImgElementId);
    const inputElement = document.getElementById(currentInputElementId);

    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);

    const imageDataUrl = canvas.toDataURL('image/png');
    imgElement.src = imageDataUrl;

    fetch(imageDataUrl)
        .then(res => res.blob())
        .then(blob => {
            const file = new File([blob], 'photo.png', { type: 'image/png' });
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            inputElement.files = dataTransfer.files;

            updateFileInputCount();

            if (fileInputCount >= 3) {
                submitForm();
            }
        });

    video.srcObject.getTracks().forEach(track => track.stop());
    $('#cameraModal').modal('hide');
});

function updateFileInputCount() {
    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputCount = Array.from(fileInputs).reduce((count, input) => {
        return count + (input.files.length > 0 ? 1 : 0);
    }, 0);
}

function checkFiles() {
    return fileInputCount >= 3;
}

function submitForm() {
    if (!checkFiles()) {
        Swal.fire({
            icon: 'warning',
            title: 'Chưa chọn ảnh',
            text: 'Vui lòng chọn tất cả các ảnh trước khi gửi.',
            confirmButtonText: 'OK'
        });
        return;
    }

    const form = document.getElementById('upload-form');
    const loadingOverlay = document.getElementById('loading-overlay');
    const memberRegistrationIdInput = document.getElementById('memberregistration_id');

    loadingOverlay.classList.remove('d-none');

    const formData = new FormData(form);

    if (memberRegistrationIdInput) {
        formData.append('memberregistration_id', memberRegistrationIdInput.value);
    }

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {


                // Hiển thị dữ liệu sau khi gửi thành công
                displayData(data);
            } else if (data.error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: data.error,
                    confirmButtonText: 'OK'
                });
            }
            loadingOverlay.classList.add('d-none');
        })
        .catch(error => {
            console.error('Có lỗi xảy ra:', error);
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: error.message || 'Có lỗi xảy ra, vui lòng thử lại.',
                confirmButtonText: 'OK'
            });
            loadingOverlay.classList.add('d-none');
        });
}

function displayData(data) {
    document.getElementById('cmnd_number').value = data.identification_number || '';
    document.getElementById('full_name').value = data.name || '';
    const genderInput = document.getElementById('gender');
    switch (data.gender) {
        case 1:
            genderInput.value = 'Nam';
            break;
        case 2:
            genderInput.value = 'Nữ';
            break;
        default:
            genderInput.value = 'Chưa xác định'; 
            break;
    }
    document.getElementById('issued_by').value = data.description || '';
    document.getElementById('cccdmt-path').value = data.cccdmt_path || '';
    document.getElementById('cccdms-path').value = data.cccdms_path || '';
    document.getElementById('fileface-path').value = data.fileface_path || '';
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('upload-form');
    const fileInputs = form.querySelectorAll('input[type="file"]');

    fileInputs.forEach(input => {
        input.addEventListener('change', function () {
            updateFileInputCount();
            if (checkFiles()) {
                submitForm();
            }
        });
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        submitForm();
    });
});
