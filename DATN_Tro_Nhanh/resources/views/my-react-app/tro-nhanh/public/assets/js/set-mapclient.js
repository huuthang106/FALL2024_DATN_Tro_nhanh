function initMap(latitude, longitude, roomName) {
    // Khởi tạo bản đồ tại vị trí room
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: latitude, lng: longitude }, // Tọa độ của room
        zoom: 15 // Độ zoom của bản đồ
    });

    // Thêm marker cho vị trí của room
    var marker = new google.maps.Marker({
        position: { lat: latitude, lng: longitude },
        map: map,
        title: roomName // Tiêu đề của marker (tên room)
    });
}
