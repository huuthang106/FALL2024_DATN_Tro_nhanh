// Xem ảnh
document.getElementById('uploadIcon').addEventListener('click', function() {
    document.getElementById('fileInput').click(); // Mở hộp thoại chọn file
});

document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0]; // Lấy file đầu tiên
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Thay thế nội dung của span uploadIcon bằng ảnh
            const uploadIcon = document.getElementById('uploadIcon');
            uploadIcon.innerHTML = `<img src="${e.target.result}" alt="Uploaded Image" style="width: 100px; height: auto; object-fit: cover;" />`;
            uploadIcon.style.display = 'inline-block'; // Đảm bảo rằng nó hiển thị như một block
        };
        reader.readAsDataURL(file); // Đọc file dưới dạng URL
    }
});
// Load address

document.addEventListener('DOMContentLoaded', function () {
    const citySelect = document.getElementById('city-province');
    const districtSelect = document.getElementById('district-town');
    const wardSelect = document.getElementById('ward-commune');
    const addressInput = document.getElementById('address');

    function updateAddress() {
        const city = citySelect.options[citySelect.selectedIndex].text.trim();
        const district = districtSelect.options[districtSelect.selectedIndex].text.trim();
        const ward = wardSelect.options[wardSelect.selectedIndex].text.trim();

        let addressParts = [];

        if (city) addressParts.push(city);
        if (district) addressParts.push(district);
        if (ward) addressParts.push(ward);

        addressInput.value = addressParts.join(', ');
    }

    citySelect.addEventListener('change', updateAddress);
    districtSelect.addEventListener('change', updateAddress);
    wardSelect.addEventListener('change', updateAddress);
});
// Preview hình ảnh ở Trang cập nhật phòng

function previewImages() {
    var preview = document.getElementById('imagePreview');
    preview.innerHTML = ''; // Xóa các hình ảnh trước đó

    var files = document.getElementById('fileInput').files;
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();

        reader.onload = (function (file) {
            return function (e) {
                var div = document.createElement('div');
                div.classList.add('image-preview');
                div.innerHTML = `
<img src="${e.target.result}" alt="${file.name}">
`;
                preview.appendChild(div);
            };
        })(file);

        reader.readAsDataURL(file);
    }
}
// Load address
// document.addEventListener('DOMContentLoaded', function () {
//     const citySelect = document.getElementById('city-province');
//     const districtSelect = document.getElementById('district-town');
//     const wardSelect = document.getElementById('ward-commune');
//     const addressInput = document.getElementById('address');

//     function updateAddress() {
//         const city = citySelect.options[citySelect.selectedIndex].text.trim();
//         const district = districtSelect.options[districtSelect.selectedIndex].text.trim();
//         const ward = wardSelect.options[wardSelect.selectedIndex].text.trim();

//         let addressParts = [];

//         if (city) addressParts.push(city);
//         if (district) addressParts.push(district);
//         if (ward) addressParts.push(ward);

//         addressInput.value = addressParts.join(', ');
//     }

//     citySelect.addEventListener('change', updateAddress);
//     districtSelect.addEventListener('change', updateAddress);
//     wardSelect.addEventListener('change', updateAddress);
// });
// document.addEventListener('DOMContentLoaded', function () {
//     const citySelect = document.getElementById('city-province');
//     const districtSelect = document.getElementById('district-town');
//     const wardSelect = document.getElementById('ward-commune');
//     const addressInput = document.getElementById('address');
//     const latitudeInput = document.getElementById('latitude');
//     const longitudeInput = document.getElementById('longitude');
//     const errorMessage = document.getElementById('error-message');

//     // Khởi tạo bản đồ với trung tâm Việt Nam
//     const map = L.map('map').setView([14.0583, 108.2772], 6); // Trung tâm Việt Nam (tọa độ có thể điều chỉnh)

//     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
//     }).addTo(map);

//     // Khởi tạo marker với tọa độ mặc định (có thể thay đổi theo nhu cầu)
//     let marker = L.marker([14.0583, 108.2772], { draggable: true }).addTo(map);

//     // Cập nhật tọa độ vào các trường nhập liệu khi marker di chuyển
//     marker.on('dragend', function (event) {
//         const position = event.target.getLatLng();
//         latitudeInput.value = position.lat;
//         longitudeInput.value = position.lng;
//         map.setView(position, map.getZoom());
//     });

//     // Hàm cập nhật địa chỉ và vị trí marker dựa trên lựa chọn của người dùng
//     function updateAddress() {
//         const city = citySelect.options[citySelect.selectedIndex]?.text.trim() || '';
//         const district = districtSelect.options[districtSelect.selectedIndex]?.text.trim() || '';
//         const ward = wardSelect.options[wardSelect.selectedIndex]?.text.trim() || '';

//         let addressParts = [];

//         if (city) addressParts.push(city);
//         if (district) addressParts.push(district);
//         if (ward) addressParts.push(ward);

//         addressInput.value = addressParts.join(', ');
//         updateMap(addressParts.join(', '));
//     }

//     // Cập nhật bản đồ và marker dựa trên địa chỉ
//     function updateMap(address) {
//         fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
//             .then(response => {
//                 if (!response.ok) {
//                     throw new Error('Network response was not ok');
//                 }
//                 return response.json();
//             })
//             .then(data => {
//                 if (data.length > 0) {
//                     const lat = data[0].lat;
//                     const lon = data[0].lon;

//                     latitudeInput.value = lat;
//                     longitudeInput.value = lon;

//                     // Cập nhật vị trí marker
//                     marker.setLatLng([lat, lon]);
//                     map.setView([lat, lon], 13);
//                 }
//                 // else {
//                 //     alert('Không tìm thấy tọa độ cho địa chỉ này.');
//                 //     // Xử lý khi không tìm thấy địa chỉ
//                 // }
//             })
//             .catch(error => {
//                 console.error('Error fetching coordinates:', error);
//                 alert('Có lỗi xảy ra khi lấy tọa độ. Vui lòng thử lại sau.');
//             });
//     }

//     citySelect.addEventListener('change', updateAddress);
//     districtSelect.addEventListener('change', updateAddress);
//     wardSelect.addEventListener('change', updateAddress);

//     // Lấy tọa độ của người dùng khi trang tải
//     function getUserLocation() {
//         if (navigator.geolocation) {
//             navigator.geolocation.getCurrentPosition(function (position) {
//                 const lat = position.coords.latitude;
//                 const lon = position.coords.longitude;

//                 // Cập nhật vị trí marker và bản đồ với tọa độ của người dùng
//                 marker.setLatLng([lat, lon]);
//                 map.setView([lat, lon], 13);

//                 // Cập nhật các trường nhập liệu
//                 latitudeInput.value = lat;
//                 longitudeInput.value = lon;

//                 // Tìm địa chỉ dựa trên tọa độ người dùng
//                 fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`)
//                     .then(response => {
//                         if (!response.ok) {
//                             throw new Error('Network response was not ok');
//                         }
//                         return response.json();
//                     })
//                     .then(data => {
//                         if (data.address) {
//                             const address = [
//                                 data.address.road,
//                                 data.address.suburb,
//                                 data.address.city,
//                                 data.address.state,
//                                 data.address.country
//                             ].filter(Boolean).join(', ');

//                             addressInput.value = address;
//                         }
//                     })
//                     .catch(error => {
//                         console.error('Error fetching address:', error);
//                     });
//             }, function (error) {
//                 console.error('Error getting geolocation:', error);
//                 errorMessage.style.display = 'block'; // Hiển thị thông báo lỗi
//                 // Không cho phép tiếp tục sử dụng trang cho đến khi người dùng đồng ý cung cấp vị trí
//             });
//         } else {
//             errorMessage.style.display = 'block'; // Hiển thị thông báo lỗi
//             alert('Geolocation không được hỗ trợ trên trình duyệt của bạn.');
//         }
//     }

//     // Gọi hàm để lấy vị trí người dùng
//     getUserLocation();
// });
