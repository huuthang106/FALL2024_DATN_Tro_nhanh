function initMap() {
    // Tạo một vị trí mặc định
    var defaultLat = 40.739011;
    var defaultLng = -73.981566;

    // Tạo bản đồ
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: defaultLat, lng: defaultLng },
        zoom: 13
    });

    // Tạo marker
    var marker = new google.maps.Marker({
        position: { lat: defaultLat, lng: defaultLng },
        map: map,
        draggable: true // Cho phép kéo marker
    });

    // Sử dụng Geolocation API để lấy vị trí hiện tại
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var currentLat = position.coords.latitude;
            var currentLng = position.coords.longitude;
            var currentPos = new google.maps.LatLng(currentLat, currentLng);

            // Cập nhật vị trí bản đồ và marker
            map.setCenter(currentPos);
            marker.setPosition(currentPos);

            // Cập nhật giá trị latitude và longitude
            document.getElementById('latitude').value = currentLat;
            document.getElementById('longitude').value = currentLng;
        }, function() {
            // Xử lý lỗi nếu không thể lấy vị trí
            handleLocationError(true, map.getCenter());
        });
    } else {
        // Nếu Geolocation không được hỗ trợ
        handleLocationError(false, map.getCenter());
    }

    // Cập nhật giá trị latitude và longitude khi marker được kéo
    marker.addListener('dragend', function(event) {
        document.getElementById('latitude').value = event.latLng.lat();
        document.getElementById('longitude').value = event.latLng.lng();
    });

    // Cập nhật vị trí marker khi giá trị latitude hoặc longitude thay đổi
    document.getElementById('latitude').addEventListener('input', function() {
        var lat = parseFloat(this.value);
        var lng = parseFloat(document.getElementById('longitude').value);
        var newPos = new google.maps.LatLng(lat, lng);
        marker.setPosition(newPos);
        map.setCenter(newPos);
    });

    document.getElementById('longitude').addEventListener('input', function() {
        var lat = parseFloat(document.getElementById('latitude').value);
        var lng = parseFloat(this.value);
        var newPos = new google.maps.LatLng(lat, lng);
        marker.setPosition(newPos);
        map.setCenter(newPos);
    });
}

// Xử lý lỗi khi không thể lấy vị trí
function handleLocationError(browserHasGeolocation, pos) {
    var infoWindow = new google.maps.InfoWindow();
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}

// Đảm bảo rằng hàm initMap được gọi khi tải trang
google.maps.event.addDomListener(window, 'load', initMap);
