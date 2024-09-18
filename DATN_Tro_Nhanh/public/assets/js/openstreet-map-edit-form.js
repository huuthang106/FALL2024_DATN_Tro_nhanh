var map;
// Lấy kinh độ và vĩ độ từ dữ liệu PHP
var currentPosition = [
    parseFloat(roomData.latitude) || 10.0354, // Vĩ độ, mặc định là 10.0354
    parseFloat(roomData.longitude) || 105.7553 // Kinh độ, mặc định là 105.7553
];
var marker; // Biến để lưu trữ marker

function initMap() {
    // Khởi tạo bản đồ với vị trí từ dữ liệu PHP
    map = L.map('map').setView(currentPosition, 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Tạo marker và cho phép kéo thả
    marker = L.marker(currentPosition, {
        draggable: true
    }).addTo(map);

    // Cập nhật giá trị vào các trường input ngay khi khởi tạo
    document.getElementById('latitude').value = currentPosition[0]; // Cập nhật vĩ độ
    document.getElementById('longitude').value = currentPosition[1]; // Cập nhật kinh độ

    // Lắng nghe sự kiện khi marker được kéo thả
    marker.on('dragend', function(event) {
        var position = marker.getLatLng(); // Lấy vị trí mới
        console.log("Kinh độ: " + position.lng + ", Vĩ độ: " + position.lat); // In ra kinh độ và vĩ độ

        // Cập nhật giá trị vào các trường input
        document.getElementById('latitude').value = position.lat; // Cập nhật vĩ độ
        document.getElementById('longitude').value = position.lng; // Cập nhật kinh độ
    });

    // Thêm nút quay lại vị trí hiện tại
    var returnButton = L.control({
        position: 'topright'
    });
    returnButton.onAdd = function() {
        var button = L.DomUtil.create('button', 'return-button');
        button.innerHTML = '<i class="fas fa-location-arrow"></i>'; // Sử dụng biểu tượng Font Awesome
        button.style.backgroundColor = 'white'; // Tùy chỉnh màu nền
        button.style.border = 'none'; // Bỏ viền
        button.style.borderRadius = '50%'; // Bo góc để tạo hình tròn
        button.style.width = '40px'; // Đặt chiều rộng
        button.style.height = '40px'; // Đặt chiều cao
        button.style.display = 'flex'; // Sử dụng flexbox để căn giữa
        button.style.alignItems = 'center'; // Căn giữa theo chiều dọc
        button.style.justifyContent = 'center'; // Căn giữa theo chiều ngang
        button.onclick = function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định
        map.setView(currentPosition, 13); // Quay lại vị trí hiện tại
        marker.setLatLng(currentPosition); // Đặt lại vị trí của marker
        
        document.getElementById('latitude').value = currentPosition[0]; // Cập nhật vĩ độ
        document.getElementById('longitude').value = currentPosition[1]; // Cập nhật kinh độ
   
    };
        return button;
    };
    returnButton.addTo(map);

    // Cập nhật kích thước bản đồ ngay sau khi khởi tạo
    updateMapSize();
}

function updateMapSize() {
    if (map) {
        map.invalidateSize(); // Cập nhật kích thước của bản đồ
    }
}

// Hàm để tìm kiếm tọa độ từ tên tỉnh, huyện hoặc xã
function geocodeLocation(location) {
    var apiUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(location)}`;

    return fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                return {
                    lat: data[0].lat,
                    lng: data[0].lon
                };
            } else {
                throw new Error('Không tìm thấy vị trí.');
            }
        });
}

// Lắng nghe sự kiện thay đổi cho dropdown tỉnh
document.getElementById('city-province').addEventListener('change', function() {
    var selectedProvince = this.options[this.selectedIndex].text; // Lấy tên tỉnh
    geocodeLocation(selectedProvince)
        .then(coords => {
            map.setView([coords.lat, coords.lng], 13); // Di chuyển bản đồ đến tỉnh đã chọn
            marker.setLatLng([coords.lat, coords.lng]); // Đặt lại vị trí của marker
            document.getElementById('latitude').value = coords.lat; // Cập nhật vĩ độ
            document.getElementById('longitude').value = coords.lng; // Cập nhật kinh độ
        })
        .catch(error => {
            console.error('Error:', error);
            showErrorMessage('Không thể tìm thấy vị trí cho tỉnh đã chọn.');
        });
});

// Lắng nghe sự kiện thay đổi cho dropdown huyện
document.getElementById('district-town').addEventListener('change', function() {
    var selectedDistrict = this.options[this.selectedIndex].text; // Lấy tên huyện
    geocodeLocation(selectedDistrict)
        .then(coords => {
            map.setView([coords.lat, coords.lng], 13); // Di chuyển bản đồ đến huyện đã chọn
            marker.setLatLng([coords.lat, coords.lng]); // Đặt lại vị trí của marker
            document.getElementById('latitude').value = coords.lat; // Cập nhật vĩ độ
            document.getElementById('longitude').value = coords.lng; // Cập nhật kinh độ
        })
        .catch(error => {
            console.error('Error:', error);
            showErrorMessage('Không thể tìm thấy vị trí cho huyện đã chọn.');
        });
});

// Lắng nghe sự kiện thay đổi cho dropdown xã
document.getElementById('ward-commune').addEventListener('change', function() {
    var selectedWard = this.options[this.selectedIndex].text; // Lấy tên xã
    geocodeLocation(selectedWard)
        .then(coords => {
            map.setView([coords.lat, coords.lng], 13); // Di chuyển bản đồ đến xã đã chọn
            marker.setLatLng([coords.lat, coords.lng]); // Đặt lại vị trí của marker
            document.getElementById('latitude').value = coords.lat; // Cập nhật vĩ độ
            document.getElementById('longitude').value = coords.lng; // Cập nhật kinh độ
        })
        .catch(error => {
            console.error('Error:', error);
            showErrorMessage('Không thể tìm thấy vị trí cho xã đã chọn.');
        });
});

document.addEventListener('DOMContentLoaded', function() {
    // Khởi tạo bản đồ
    initMap();

    // Kiểm tra xem có thông báo thành công trong session không
    if (window.successMessage) {
        showSuccessMessage(window.successMessage); // Gọi hàm để hiển thị thông báo
    }
});

// Hàm hiển thị thông báo thành công
function showSuccessMessage(message) {
    Swal.fire({
        icon: 'success',
        title: 'Thành công!',
        text: message,
        showConfirmButton: true
    });
}

// Hàm hiển thị thông báo lỗi
function showErrorMessage(message) {
    Swal.fire({
        icon: 'error',
        title: 'Lỗi!',
        text: message,
        showConfirmButton: true
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Khi tab location-tab được kích hoạt, cập nhật kích thước bản đồ
    var locationTab = document.querySelector('#location-tab');
    if (locationTab) {
        locationTab.addEventListener('click', function(e) {
            setTimeout(updateMapSize, 100); // Cập nhật kích thước bản đồ khi tab được nhấn
        });
    }
    // Gọi updateMapSize() ngay sau khi khởi tạo bản đồ
    updateMapSize(); // Đảm bảo bản đồ hiển thị đúng ngay khi tải trang
});