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

//  xử lý video 
let mediaRecorder;
let recordedChunks = [];

function openVideoModal() {
    const modalVideo = document.getElementById('modalVideo');
    const videoNotification = document.getElementById('videoNotification');

    // Mở modal quay video
    $('#videoModal').modal('show');

    // Bắt đầu quay video
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            modalVideo.srcObject = stream; // Gán stream video vào video trong modal
            modalVideo.style.display = 'block'; // Hiển thị video

            // Tạo MediaRecorder để ghi video
            mediaRecorder = new MediaRecorder(stream);
            
            // Gán hàm ondataavailable
            mediaRecorder.ondataavailable = function(event) {
                if (event.data.size > 0) {
                    recordedChunks.push(event.data);
                }
            };

            // Gán hàm onstop
            mediaRecorder.onstop = function() {
                console.log('Đã dừng ghi video'); // Kiểm tra xem hàm onstop có được gọi không
                const videoBlob = new Blob(recordedChunks, { type: 'video/webm' });
                const videoURL = URL.createObjectURL(videoBlob);
                
                // Cập nhật nguồn cho video đã quay
                const uploadedVideo = document.getElementById('uploadedVideo');
                uploadedVideo.src = videoURL; // Cập nhật nguồn video
            
                // Hiển thị thẻ div chứa video
                console.log('Hiên thi video');
                const videoDisplay = document.getElementById('videoDisplay');
                videoDisplay.style.display = 'block'; // Hiển thị thẻ div
            
                // Thêm sự kiện loadeddata
                uploadedVideo.addEventListener('loadeddata', function() {
                    console.log('Video đã được tải thành công');
                    uploadedVideo.play(); // Tự động phát video nếu cần
                });
            
                // Tắt modal
                $('#videoModal').modal('hide'); // Đóng modal
            };

            // Hiển thị thông báo
            videoNotification.style.display = 'block'; // Hiển thị thông báo

            // Bắt đầu ghi video
            mediaRecorder.start();
            console.log('Bắt đầu ghi video'); // Kiểm tra xem video có bắt đầu ghi không

            // Tự động dừng ghi sau 5 giây
            setTimeout(function() {
                console.log('Dừng ghi video'); // Kiểm tra xem hàm này có được gọi không
                mediaRecorder.stop(); // Dừng ghi video
                stream.getTracks().forEach(track => track.stop()); // Dừng stream video
                videoNotification.style.display = 'none'; // Ẩn thông báo
            }, 5000); // 5000ms = 5 giây
        })
        .catch(function(err) {
            console.error("Lỗi truy cập camera: ", err);
        });
}
// mediaRecorder.onstop = function() {
//     console.log('Đã dừng ghi video'); // Kiểm tra xem hàm onstop có được gọi không
//     if (recordedChunks.length === 0) {
//         console.error("Không có dữ liệu video nào được ghi lại.");
//         return; // Dừng lại nếu không có dữ liệu
//     }
//     const videoBlob = new Blob(recordedChunks, { type: 'video/webm' });
//     const videoURL = URL.createObjectURL(videoBlob);
    
//     // Tạo một video tạm thời để lấy khung hình
//     const tempVideo = document.createElement('video');
//     tempVideo.src = videoURL;
//     tempVideo.addEventListener('loadeddata', function() {
//         // Lấy khung hình đầu tiên
//         const canvas = document.createElement('canvas');
//         canvas.width = tempVideo.videoWidth;
//         canvas.height = tempVideo.videoHeight;
//         const context = canvas.getContext('2d');
//         context.drawImage(tempVideo, 0, 0, canvas.width, canvas.height);
        
//         // Cập nhật nguồn cho hình ảnh
//         const imgElement = document.getElementById('uploadedImage');
//         imgElement.src = canvas.toDataURL('image/png'); // Chuyển đổi canvas thành hình ảnh
//         document.getElementById('videoDisplay').style.display = 'block'; // Hiển thị hình ảnh
//     });

//     // Tắt modal
//     $('#videoModal').modal('hide'); // Đóng modal
// };