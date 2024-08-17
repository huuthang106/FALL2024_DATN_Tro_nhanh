// document.getElementById('add-room').addEventListener('submit', async function (e) {
//     e.preventDefault();

//     const form = e.target;
//     const formData = new FormData(form);

//     try {
//         const response = await fetch('/quan-ly-tai-khoan/luu', {
//             method: 'POST',
//             body: formData,
//             headers: {
//                 'X-Requested-With': 'XMLHttpRequest',
//             }
//         });

//         const result = await response.json();

//         if (result.success) {
//             // Hiển thị thông báo thành công
//             toastr.success('Phòng trọ được tạo thành công!');
//             setTimeout(() => {
//                 window.location.href = '/can-ho';
//             }, 1000); // Chờ 1 giây để thông báo hiển thị
//         } else {
//             // Hiển thị thông báo lỗi nếu có
//             toastr.error(result.message || 'Đã xảy ra lỗi.');
//         }
//         console.log(result);

//     } catch (error) {
//         toastr.error('Lỗi mạng hoặc sự cố với máy chủ.');
//     }
// });
// document.getElementById('add-room').addEventListener('submit', async function (e) {
//     e.preventDefault();

//     const form = e.target;
//     const formData = new FormData(form);

//     try {
//         const response = await fetch('/quan-ly-tai-khoan/luu', {
//             method: 'POST',
//             body: formData,
//             headers: {
//                 'X-Requested-With': 'XMLHttpRequest',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             }
//         });

//         const result = await response.json();

//         if (response.ok) {
//             if (result.success) {
//                 // Hiển thị thông báo thành công
//                 toastr.success('Phòng trọ được tạo thành công!');
//                 setTimeout(() => {
//                     window.location.href = '/can-ho';
//                 }, 1000); // Chờ 1 giây để thông báo hiển thị
//             } else {
//                 // Hiển thị thông báo lỗi nếu có
//                 toastr.error(result.message || 'Đã xảy ra lỗi.');
//             }
//         } else {
//             // Xử lý lỗi từ server (validation errors, etc.)
//             if (result.errors) {
//                 let errorMessages = 'Vui lòng kiểm tra lại các trường bị lỗi:\n';
//                 for (const [key, messages] of Object.entries(result.errors)) {
//                     errorMessages += `${messages.join(', ')}\n`;
//                 }
//                 toastr.error(errorMessages.trim() || 'Đã xảy ra lỗi.');
//             } else {
//                 toastr.error('Đã xảy ra lỗi không xác định.');
//             }
//         }

//         console.log(result);

//     } catch (error) {
//         toastr.error('Lỗi mạng hoặc sự cố với máy chủ.');
//         console.error('Error:', error);
//     }
// });
// document.getElementById('add-room').addEventListener('submit', async function (e) {
//     e.preventDefault();

//     const form = e.target;
//     const formData = new FormData(form);

//     try {
//         const response = await fetch('/quan-ly-tai-khoan/luu', {
//             method: 'POST',
//             body: formData,
//             headers: {
//                 'X-Requested-With': 'XMLHttpRequest',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             }
//         });

//         const result = await response.json();

//         if (response.ok) {
//             if (result.success) {
//                 // Hiển thị thông báo thành công
//                 toastr.success('Phòng trọ được tạo thành công!');
//                 setTimeout(() => {
//                     window.location.href = 'http://127.0.0.1:8000/quan-ly-tai-khoan/can-ho';
//                 }, 1000); // Chờ 1 giây để thông báo hiển thị
//             } else {
//                 // Hiển thị thông báo lỗi nếu có
//                 toastr.error(result.message || 'Đã xảy ra lỗi.');
//             }
//         } else {
//             // Xử lý lỗi từ server (validation errors, etc.)
//             if (result.errors) {
//                 toastr.error('Vui lòng nhập đầy đủ thông tin.');
//             } else {
//                 toastr.error('Đã xảy ra lỗi không xác định.');
//             }
//         }

//         // console.log(result);

//     } catch (error) {
//         toastr.error('Lỗi mạng hoặc sự cố với máy chủ.');
//         console.error('Error:', error);
//     }
// });
document.getElementById('add-room').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // Thêm tất cả các tệp ảnh vào formData
    const files = document.getElementById('fileInput').files;
    Array.from(files).forEach(file => {
        formData.append('images[]', file);
    });

    try {
        const response = await fetch('/quan-ly-tai-khoan/luu', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        });

        const result = await response.json();

        if (result.success) {
            // Hiển thị thông báo thành công
            toastr.success('Phòng trọ được tạo thành công!');
            setTimeout(() => {
                window.location.href = '/quan-ly-tai-khoan/can-ho';
            }, 1000); // Chờ 1 giây để thông báo hiển thị
        } else {
            // Hiển thị thông báo lỗi nếu có
            toastr.error(result.message || 'Đã xảy ra lỗi.');
        }
        console.log(result);

    } catch (error) {
        toastr.error('Lỗi mạng hoặc sự cố với máy chủ.');
    }
});
// Xem ảnh
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('fileInput');

    // Đảm bảo sự kiện chỉ được đăng ký một lần
    fileInput.removeEventListener('change', previewImages);
    fileInput.addEventListener('change', previewImages);
});

function previewImages() {
    const preview = document.getElementById('imagePreview');
    const files = document.getElementById('fileInput').files;

    // Xóa ảnh cũ trước khi thêm ảnh mới
    // preview.innerHTML = ''; // Bỏ dòng này nếu muốn giữ các ảnh đã tải lên

    if (files.length > 0) {
        Array.from(files).forEach(file => {
            const reader = new FileReader();

            reader.onload = function (e) {
                // Kiểm tra xem ảnh đã tồn tại trong khu vực xem trước chưa
                const existingImgs = Array.from(preview.querySelectorAll('img')).map(img => img.src);
                if (!existingImgs.includes(e.target.result)) {
                    const container = document.createElement('div');
                    container.style.display = 'inline-block';
                    container.style.position = 'relative';
                    container.style.margin = '5px';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px'; // Kích thước hiển thị của ảnh
                    img.style.height = 'auto';

                    const removeButton = document.createElement('button');
                    removeButton.innerText = 'Xóa';
                    removeButton.style.position = 'absolute';
                    removeButton.style.top = '0';
                    removeButton.style.right = '0';
                    removeButton.style.backgroundColor = 'red';
                    removeButton.style.color = 'white';
                    removeButton.style.border = 'none';
                    removeButton.style.cursor = 'pointer';

                    removeButton.addEventListener('click', function () {
                        container.remove();
                    });

                    container.appendChild(img);
                    container.appendChild(removeButton);
                    preview.appendChild(container);
                }
            };

            reader.readAsDataURL(file);
        });
    }
}



