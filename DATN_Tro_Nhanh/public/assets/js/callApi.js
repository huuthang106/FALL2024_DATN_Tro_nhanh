// document.addEventListener('DOMContentLoaded', function() {
//     const form = document.getElementById('upload-form');
//     const loadingOverlay = document.getElementById('loading-overlay');
//     const fileInputs = form.querySelectorAll('input[type="file"]');
//     const memberRegistrationIdInput = document.getElementById('memberregistration_id'); // Input field for memberregistration_id

//     // Hàm kiểm tra xem tất cả ảnh đã được chọn chưa
//     function checkFiles() {
//         let allFilesSelected = true;
//         fileInputs.forEach(input => {
//             if (!input.files.length) {
//                 allFilesSelected = false;
//             }
//         });
//         return allFilesSelected;
//     }

//     // Hàm gửi form
//     function submitForm() {
//         if (!checkFiles()) {
//             Swal.fire({
//                 icon: 'warning',
//                 title: 'Chưa chọn ảnh',
//                 text: 'Vui lòng chọn tất cả các ảnh trước khi gửi.',
//                 confirmButtonText: 'OK'
//             });
//             return;
//         }

//         // Hiển thị lớp phủ tải
//         loadingOverlay.classList.remove('d-none');

//         // Tạo đối tượng FormData để gửi dữ liệu
//         const formData = new FormData(form);

//         // Thêm memberregistration_id vào FormData
//         if (memberRegistrationIdInput) {
//             formData.append('memberregistration_id', memberRegistrationIdInput.value);
//         }

//         // Gửi dữ liệu bằng fetch
//         fetch(form.action, {
//             method: 'POST',
//             body: formData,
//             headers: {
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//             },
//         })
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Network response was not ok');
//             }
//             return response.json();
//         })
//         .then(data => {
//             if (data.success) {
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'Thành công',
//                     text: 'Dữ liệu đã được gửi thành công!',
//                     confirmButtonText: 'OK'
//                 });

//                 // Hiển thị dữ liệu ngay sau khi thành công
//                 displayData(data);
//             } else if (data.error) {
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'Lỗi',
//                     text: data.error,
//                     confirmButtonText: 'OK'
//                 });
//             }
//             loadingOverlay.classList.add('d-none');
//         })
//         .catch(error => {
//             console.error('Có lỗi xảy ra:', error);
//             Swal.fire({
//                 icon: 'error',
//                 title: 'Lỗi',
//                 text: error.message || 'Có lỗi xảy ra, vui lòng thử lại.',
//                 confirmButtonText: 'OK'
//             });
//             loadingOverlay.classList.add('d-none');
//         });
//     }

//     // Hàm hiển thị dữ liệu
//     function displayData(data) {
//         console.log(data); // Kiểm tra dữ liệu
    
//         // Cập nhật các trường văn bản
//         document.getElementById('cmnd_number').value = data.identification_number || '';
//         document.getElementById('full_name').value = data.name || '';
//         document.getElementById('gender').value = data.gender || '';
//         document.getElementById('issued_by').value = data.description || '';
    
//         // Cập nhật các hình ảnh
//         document.getElementById('cccdmt-image').value = '/' + data.cccdmt_path;
//         document.getElementById('cccdms-image').value = '/' + data.cccdms_path;
//         document.getElementById('fileface-image').value = '/' + data.fileface_path;
//     }
    
    
    

//     // Gán sự kiện change cho các trường nhập liệu
//     fileInputs.forEach(input => {
//         input.addEventListener('change', function() {
//             if (checkFiles()) {
//                 submitForm();
//             }
//         });
//     });

//     // Nếu muốn gửi form khi nhấn nút gửi, cũng cần phải gán sự kiện cho nút gửi
//     form.addEventListener('submit', function(event) {
//         event.preventDefault(); // Ngăn chặn gửi form mặc định
//         submitForm();
//     });
// });
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('upload-form');
    const loadingOverlay = document.getElementById('loading-overlay');
    const fileInputs = form.querySelectorAll('input[type="file"]');
    const memberRegistrationIdInput = document.getElementById('memberregistration_id'); // Input field for memberregistration_id

    // Function to check if all files have been selected
    function checkFiles() {
        let allFilesSelected = true;
        fileInputs.forEach(input => {
            if (!input.files.length) {
                allFilesSelected = false;
            }
        });
        return allFilesSelected;
    }

    // Function to submit the form
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

        // Show loading overlay
        loadingOverlay.classList.remove('d-none');

        // Create FormData object to send data
        const formData = new FormData(form);

        // Add memberregistration_id to FormData
        if (memberRegistrationIdInput) {
            formData.append('memberregistration_id', memberRegistrationIdInput.value);
        }

        // Send data using fetch
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
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: 'Dữ liệu đã được gửi thành công!',
                    confirmButtonText: 'OK'
                });

                // Display data upon success
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

    // Function to display data
    function displayData(data) {
        console.log(data); // Check data

        // Update text fields
        document.getElementById('cmnd_number').value = data.identification_number || '';
        document.getElementById('full_name').value = data.name || '';
        document.getElementById('gender').value = data.gender || '';
        document.getElementById('issued_by').value = data.description || '';

        // Update image paths (if needed for display)
        // Note: This does not update the file input fields as they cannot be set programmatically
        document.getElementById('cccdmt-path').value = data.cccdmt_path || '';
        document.getElementById('cccdms-path').value = data.cccdms_path || '';
        document.getElementById('fileface-path').value = data.fileface_path || '';
    }

    // Add change event listener to file inputs
    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            if (checkFiles()) {
                submitForm();
            }
        });
    });

    // Add submit event listener to the form
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        submitForm();
    });
});
