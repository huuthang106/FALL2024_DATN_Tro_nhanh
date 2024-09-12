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
    const fileFaceInput = document.getElementById('FileFace');

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

// Hàm gửi form
// async function submitForm() {
//     const form = document.getElementById('upload-form'); // Thay đổi ID nếu cần
//     const loadingOverlay = document.getElementById('loading-overlay'); // Thay đổi ID nếu cần
//     const memberRegistrationIdInput = document.getElementById('memberregistration_id');

//     loadingOverlay.classList.remove('d-none');

//     const formData = new FormData(form);
//     for (let [key, value] of formData.entries()) {
//         console.log(key, value); // In ra từng cặp key-value
//     }
//     // Thêm video vào FormData
//     const uploadedVideo = document.getElementById('uploadedVideo').src;
//     if (uploadedVideo) {
//         const videoBlob = await fetch(uploadedVideo).then(res => res.blob());
//         formData.append('video', videoBlob, 'video.webm'); // Thay đổi tên file nếu cần
//     }

//     if (memberRegistrationIdInput) {
//         formData.append('memberregistration_id', memberRegistrationIdInput.value);
//     }

//     fetch(form.action, {
//         method: 'POST',
//         body: formData,
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//         },
//     })
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('loi day');
//         }
//         return response.json();
//     })
//     .then(data => {
//         if (data.success) {
//             // Hiển thị dữ liệu sau khi gửi thành công
//             displayData(data);
//         } else if (data.error) {
//             Swal.fire({
//                 icon: 'error',
//                 title: 'Lỗi',
//                 text: data.error,
//                 confirmButtonText: 'OK'
//             });
//         }
//         loadingOverlay.classList.add('d-none');
//     })
//     .catch(error => {
//         console.error('Có lỗi xảy ra:', error);
//         Swal.fire({
//             icon: 'error',
//             title: 'Lỗi',
//             text: error.message || 'Có lỗi xảy ra, vui lòng thử lại.',
//             confirmButtonText: 'OK'
//         });
//         loadingOverlay.classList.add('d-none');
//     });
// }
async function submitForm() {
    const form = document.getElementById('upload-form');
    const loadingOverlay = document.getElementById('loading-overlay');
    const memberRegistrationIdInput = document.getElementById('memberregistration_id');
    const videoElement = document.getElementById('uploadedVideo'); // Video element

    loadingOverlay.classList.remove('d-none');

    const formData = new FormData(form);

    // Kiểm tra và thêm videoBlob vào FormData nếu có
    if (videoElement && videoElement.src) {
        try {
            const videoBlob = await fetch(videoElement.src).then(res => res.blob());
            formData.append('FileFace', videoBlob, 'video.webm'); // Đặt tên file theo yêu cầu
        } catch (error) {
            console.error('Lỗi khi lấy video blob:', error);
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Không thể lấy video để gửi.',
                confirmButtonText: 'OK'
            });
            loadingOverlay.classList.add('d-none');
            return;
        }
    } else {
        console.error('Không có video để gửi.');
    }

    if (memberRegistrationIdInput) {
        formData.append('memberregistration_id', memberRegistrationIdInput.value);
    }

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        });

        if (!response.ok) {
            throw new Error('Lỗi xảy ra');
        }

        const data = await response.json();

        if (data.success) {
            displayData(data); // Hàm hiển thị dữ liệu sau khi thành công
        } else if (data.error) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: data.error,
                confirmButtonText: 'OK'
            });
        }
    } catch (error) {
        console.error('Có lỗi xảy ra:', error);
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: error.message || 'Có lỗi xảy ra, vui lòng thử lại.',
            confirmButtonText: 'OK'
        });
    } finally {
        // Luôn ẩn loadingOverlay sau khi xử lý xong, kể cả khi có lỗi
        loadingOverlay.classList.add('d-none');
    }
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
                console.log('Đã dừng ghi video');
                
                // Tạo videoBlob
                videoBlob = new Blob(recordedChunks, { type: 'video/webm' });
                const videoURL = URL.createObjectURL(videoBlob);
                const uploadedVideo = document.getElementById('uploadedVideo');
                uploadedVideo.src = videoURL;
                document.getElementById('videoDisplay').style.display = 'block';
            
                const fileFaceInput = document.getElementById('FileFace');
                const dataTransfer = new DataTransfer();
                const file = new File([videoBlob], 'video.webm', { type: 'video/webm' });
                dataTransfer.items.add(file);
                fileFaceInput.files = dataTransfer.files;
            
                // Tự động submit form sau khi video đã được đính kèm nếu cần
                if (checkFiles()) {
                    submitForm();
                }
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