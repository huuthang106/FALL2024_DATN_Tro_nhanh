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

            // Cập nhật số lượng file đã chọn
            updateFileInputCount();

            // Tạo sự kiện change và dispatch
            const event = new Event('change', { bubbles: true });
            inputElement.dispatchEvent(event); // Kích hoạt sự kiện change

          
        });

    video.srcObject.getTracks().forEach(track => track.stop());
    $('#cameraModal').modal('hide');
});

// Hàm cập nhật số lượng file đã chọn
function updateFileInputCount() {
    const cccdmtInput = document.getElementById('CCCDMT');
    const cccdmsInput = document.getElementById('CCCDMS');
    const fileFaceInput = document.getElementById('videoFile');

    fileInputCount = 0;

    // Kiểm tra số lượng hình ảnh
    if (cccdmtInput.files.length > 0) {
        fileInputCount++;
    }
    if (cccdmsInput.files.length > 0) {
        fileInputCount++;
    }

    // Kiểm tra video
    if (fileFaceInput.files.length > 0) {
        fileInputCount++;
    }
 // Tạo sự kiện change và dispatch
 
}


// Hàm kiểm tra nếu đủ file
function checkFiles() {
    return fileInputCount === 3; // Kiểm tra nếu đủ 3 file (2 hình ảnh + 1 video)
}


function submitForm() {
    const form = document.getElementById('upload-form');
    const formData = new FormData(form);
    const loadingOverlay = document.getElementById('loading-overlay'); // Tham chiếu đến phần tử loading overlay

    // Hiển thị loading overlay
    loadingOverlay.classList.remove('d-none');

    // Kiểm tra xem video đã được ghi và cập nhật vào input chưa
    const videoInput = document.getElementById('videoFile');
    if (videoInput.files.length === 0) {
        console.error('Không có video được ghi lại.');
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Vui lòng ghi video trước khi gửi.',
            confirmButtonText: 'OK'
        });
        loadingOverlay.classList.add('d-none'); // Ẩn loading overlay nếu không có video
        return;
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
            return response.json().then(err => {
                throw new Error(err.error || 'Có lỗi xảy ra khi gửi yêu cầu.');
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
                        // Hiển thị dữ liệu sau khi gửi thành công
                        displayData(data);
                        console.log(data);
                    } else if (data.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: data.error,
                            confirmButtonText: 'OK'
                        });
                    }
    })
    .catch(error => {
        console.error('Có lỗi xảy ra:', error);
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: error.message || 'Có lỗi xảy ra, vui lòng thử lại.',
            confirmButtonText: 'OK'
        });
    })
    .finally(() => {
        // Luôn ẩn loadingOverlay sau khi xử lý xong, kể cả khi có lỗi
        loadingOverlay.classList.add('d-none');
    });
}


// Bắt sự kiện khi DOM đã được tải
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('upload-form');
    const fileInputs = form.querySelectorAll('input[type="file"]');

    console.log('Chạy sự kiện DOMContentLoaded');

    // Gán sự kiện change cho từng input file
    fileInputs.forEach(input => {
        input.addEventListener('change', function () {
            console.log('Input đã được cập nhật:', input.id); // Log ID của input đã được cập nhật
            updateFileInputCount(); // Cập nhật số lượng file đã chọn
            console.log('Cập nhật số lượng file');

            // Kiểm tra nếu đủ file và gửi form
            if (checkFiles()) {
                console.log('Gửi form'); // Kiểm tra nếu đủ file
                submitForm(); // Gọi hàm gửi form
            }
        });
    });

    // Sự kiện submit cho form
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Ngăn chặn hành vi gửi form mặc định
        submitForm(); // Gọi hàm gửi form
    });
});

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



//  xử lý video 
let mediaRecorder;
let recordedChunks = [];
let videoBlob;

function openVideoModal() {
    const modalVideo = document.getElementById('modalVideo');
    const verificationMessage = document.getElementById('videoNotification');
    
    // Mở modal quay video
    $('#videoModal').modal('show');
    verificationMessage.style.display = 'block';

    // Bắt đầu quay video
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            modalVideo.srcObject = stream; // Gán stream video vào video trong modal
            modalVideo.style.display = 'block'; // Hiển thị video

            // Tạo MediaRecorder để ghi video
            mediaRecorder = new MediaRecorder(stream);
            recordedChunks = []; // Khởi tạo mảng để lưu trữ các đoạn video

            // Gán hàm ondataavailable
            mediaRecorder.ondataavailable = function(event) {
                if (event.data.size > 0) {
                    recordedChunks.push(event.data);
                }
            };

            // Gán hàm onstop
            mediaRecorder.onstop = function() {
                console.log('Đã dừng ghi video');
                
                // Tạo videoBlob
                videoBlob = new Blob(recordedChunks, { type: 'video/webm' });
                const videoURL = URL.createObjectURL(videoBlob);
                const uploadedVideo = document.getElementById('uploadedVideo');
                uploadedVideo.src = videoURL;
                document.getElementById('videoDisplay').style.display = 'block';
            
                // Cập nhật input file với video đã ghi
                const fileFaceInput = document.getElementById('videoFile'); // Đảm bảo ID đúng
                const dataTransfer = new DataTransfer();
                const file = new File([videoBlob], 'video.webm', { type: 'video/webm' });
                dataTransfer.items.add(file);
                fileFaceInput.files = dataTransfer.files; // Cập nhật input file
                console.log('Video file:', fileFaceInput.files[0]); // Kiểm tra file trong input
                console.log('Số lượng file trong input:', fileFaceInput.files.length); // Kiểm tra số lượng file
                updateFileInputCount();
                // Kiểm tra nếu đủ file trước khi gửi form
                if (checkFiles()) {
                    // Gọi hàm gửi form
                    submitForm();
                } else {
                    console.error('Không đủ file để gửi form.');
                }

                // Tắt modal
                $('#videoModal').modal('hide'); // Đóng modal
            };

            // Bắt đầu ghi video
            mediaRecorder.start();
            console.log('Bắt đầu ghi video'); // Kiểm tra xem video có bắt đầu ghi không

            // Tự động dừng ghi sau 5 giây
            setTimeout(function() {
                console.log('Dừng ghi video'); // Kiểm tra xem hàm này có được gọi không
                mediaRecorder.stop(); // Dừng ghi video
                stream.getTracks().forEach(track => track.stop()); // Dừng stream video
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
