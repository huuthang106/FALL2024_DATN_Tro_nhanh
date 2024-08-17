// let map;
// let marker; // Biến để lưu trữ marker hiện tại

// function initMap() {
//     map = L.map('map').setView([16.0, 106.0], 5); // Tọa độ trung tâm Việt Nam
//     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         attribution: '© OpenStreetMap contributors'
//     }).addTo(map);
// }

// // Gọi hàm initMap khi trang được load
// document.addEventListener('DOMContentLoaded', initMap);

// function updateMap() {
//     const province = document.getElementById('city-province').options[document.getElementById('city-province')
//         .selectedIndex].text;
//     const district = document.getElementById('district-town').options[document.getElementById('district-town')
//         .selectedIndex].text;
//     const ward = document.getElementById('ward-commune').options[document.getElementById('ward-commune')
//         .selectedIndex].text;

//     const address = `${ward}, ${district}, ${province}, Việt Nam`;

//     // Sử dụng Nominatim API để lấy tọa độ
//     fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
//         .then(response => response.json())
//         .then(data => {
//             if (data.length > 0) {
//                 const lat = parseFloat(data[0].lat);
//                 const lon = parseFloat(data[0].lon);

//                 // Cập nhật các trường input
//                 document.getElementById('latitude').value = lat.toFixed(6);
//                 document.getElementById('longitude').value = lon.toFixed(6);

//                 // Xóa marker cũ nếu tồn tại
//                 if (marker) {
//                     map.removeLayer(marker);
//                 }

//                 // Cập nhật bản đồ với marker mới
//                 map.setView([lat, lon], 13);
//                 marker = L.marker([lat, lon]).addTo(map)
//                     .bindPopup(address)
//                     .openPopup();
//             } else {
//                 // alert('Không tìm thấy địa chỉ');
//                 // Xóa giá trị trong trường input nếu không tìm thấy địa chỉ
//                 document.getElementById('latitude').value = '';
//                 document.getElementById('longitude').value = '';
//             }
//         })
//         .catch(error => {
//             console.error('Error:', error);
//             // Xóa giá trị trong trường input nếu có lỗi
//             document.getElementById('latitude').value = '';
//             document.getElementById('longitude').value = '';
//         });
// }

// document.getElementById('city-province').addEventListener('change', updateMap);
// document.getElementById('district-town').addEventListener('change', updateMap);
// document.getElementById('ward-commune').addEventListener('change', updateMap);
// document.getElementById('latitude').addEventListener('change', updateMapFromCoordinates);
// document.getElementById('longitude').addEventListener('change', updateMapFromCoordinates);

// function updateMapFromCoordinates() {
//     const lat = parseFloat(document.getElementById('latitude').value);
//     const lon = parseFloat(document.getElementById('longitude').value);

//     if (!isNaN(lat) && !isNaN(lon)) {
//         // Xóa marker cũ nếu tồn tại
//         if (marker) {
//             map.removeLayer(marker);
//         }

//         // Cập nhật bản đồ với marker mới
//         map.setView([lat, lon], 13);
//         marker = L.marker([lat, lon]).addTo(map)
//             .bindPopup(`Vĩ độ: ${lat}, Kinh độ: ${lon}`)
//             .openPopup();
//     }
// }
let map;
let marker; // Biến để lưu trữ marker hiện tại

function initMap() {
    map = L.map('map').setView([16.0, 106.0], 5); // Tọa độ trung tâm Việt Nam
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
}

// Gọi hàm initMap khi trang được load
document.addEventListener('DOMContentLoaded', initMap);

function updateMap() {
    const provinceSelect = document.getElementById('city-province');
    const districtSelect = document.getElementById('district-town');
    const wardSelect = document.getElementById('ward-commune');

    const province = provinceSelect.options[provinceSelect.selectedIndex].text;
    const district = districtSelect.selectedIndex > 0 ? districtSelect.options[districtSelect.selectedIndex].text : '';
    const ward = wardSelect.selectedIndex > 0 ? wardSelect.options[wardSelect.selectedIndex].text : '';

    let address = `${province}, Việt Nam`;

    // Nếu có quận/huyện thì thêm vào địa chỉ
    if (district) {
        address = `${district}, ${address}`;
    }

    // Nếu có phường/xã thì thêm vào địa chỉ
    if (ward) {
        address = `${ward}, ${address}`;
    }

    // Sử dụng Nominatim API để lấy tọa độ
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                const lat = parseFloat(data[0].lat);
                const lon = parseFloat(data[0].lon);

                // Cập nhật các trường input
                document.getElementById('latitude').value = lat.toFixed(6);
                document.getElementById('longitude').value = lon.toFixed(6);

                // Xóa marker cũ nếu tồn tại
                if (marker) {
                    map.removeLayer(marker);
                }

                // Cập nhật bản đồ với marker mới
                map.setView([lat, lon], 13);
                marker = L.marker([lat, lon]).addTo(map)
                    .bindPopup(address)
                    .openPopup();
            } else {
                // Xóa giá trị trong trường input nếu không tìm thấy địa chỉ
                document.getElementById('latitude').value = '';
                document.getElementById('longitude').value = '';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Xóa giá trị trong trường input nếu có lỗi
            document.getElementById('latitude').value = '';
            document.getElementById('longitude').value = '';
        });
}

function updateMapFromCoordinates() {
    const lat = parseFloat(document.getElementById('latitude').value);
    const lon = parseFloat(document.getElementById('longitude').value);

    if (!isNaN(lat) && !isNaN(lon)) {
        // Xóa marker cũ nếu tồn tại
        if (marker) {
            map.removeLayer(marker);
        }

        // Cập nhật bản đồ với marker mới
        map.setView([lat, lon], 13);
        marker = L.marker([lat, lon]).addTo(map)
            .bindPopup(`Vĩ độ: ${lat}, Kinh độ: ${lon}`)
            .openPopup();
    }
}

// Gắn sự kiện khi người dùng thay đổi tỉnh/thành phố, quận/huyện hoặc phường/xã
document.getElementById('city-province').addEventListener('change', updateMap);
document.getElementById('district-town').addEventListener('change', updateMap);
document.getElementById('ward-commune').addEventListener('change', updateMap);

// Gắn sự kiện khi người dùng thay đổi vĩ độ và kinh độ
document.getElementById('latitude').addEventListener('change', updateMapFromCoordinates);
document.getElementById('longitude').addEventListener('change', updateMapFromCoordinates);
