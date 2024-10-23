// $(document).ready(function () {
//     $('.favorite-btn').on('click', function (e) {
//         e.preventDefault();
//         var btn = $(this);
//         var roomSlug = btn.data('room-slug');

//         $.ajax({
//             url: '/add-favourite/' + roomSlug,
//             type: 'POST',
//             data: {
//                 _token: $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (response) {
//                 if (response.status === 'added') {
//                     btn.addClass('favorited');
//                 } else if (response.status === 'removed') {
//                     btn.removeClass('favorited');
//                 }

//                 // Cập nhật số lượng yêu thích trên navbar
//                 updateFavoriteCount(response.favoriteCount);
//             },
//             error: function (xhr) {
//                 console.log('Error:', xhr);
//             }
//         });
//     });

//     // Hàm để cập nhật số lượng yêu thích
//     function updateFavoriteCount(count) {
//         var $favoriteCount = $('#favorite-count');
//         $favoriteCount.text(count);

//         // Thêm hiệu ứng để làm nổi bật sự thay đổi
//         $favoriteCount.addClass('highlight');
//         setTimeout(function () {
//             $favoriteCount.removeClass('highlight');
//         }, 300);
//     }
// });
// $(document).ready(function () {
//     $('.favorite-btn').on('click', function (e) {
//         e.preventDefault();
//         var btn = $(this);
//         var roomSlug = btn.data('room-slug');

//         $.ajax({
//             url: '/add-favourite/' + roomSlug,
//             type: 'POST',
//             data: {
//                 _token: $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (response) {
//                 if (response.status === 'added') {
//                     btn.addClass('favorited');
//                 } else if (response.status === 'removed') {
//                     btn.removeClass('favorited');
//                 }

//                 // Cập nhật số lượng yêu thích trên navbar
//                 updateFavoriteCount(response.favoriteCount);
//             },
//             error: function (xhr) {
//                 console.log('Error:', xhr);
//             }
//         });
//     });

//     // Hàm để cập nhật số lượng yêu thích
//     function updateFavoriteCount(count) {
//         var $favoriteCount1 = $('#favorite-count');
//         var $favoriteCount2 = $('#favorite-count-2');

//         $favoriteCount1.text(count);
//         $favoriteCount2.text(count);

//         // Thêm hiệu ứng để làm nổi bật sự thay đổi
//         $favoriteCount1.addClass('highlight');
//         $favoriteCount2.addClass('highlight');

//         setTimeout(function () {
//             $favoriteCount1.removeClass('highlight');
//             $favoriteCount2.removeClass('highlight');
//         }, 300);
//     }
// });

// $(document).ready(function () {
//     $('.favorite-btn').on('click', function (e) {
//         e.preventDefault();
//         var btn = $(this);
//         var zoneSlug = btn.data('zone-slug'); // Thay đổi từ zoneId thành zoneSlug

//         $.ajax({
//             url: '/add-favourite/' + zoneSlug, // Sử dụng zoneSlug trong URL
//             type: 'POST',
//             data: {
//                 _token: $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (response) {
//                 if (response.status === 'added') {
//                     btn.addClass('favorited');
//                 } else if (response.status === 'removed') {
//                     btn.removeClass('favorited');
//                 }

//                 // Cập nhật số lượng yêu thích trên navbar
//                 updateFavoriteCount(response.favoriteCount);
//             },
//             error: function (xhr) {
//                 console.log('Error:', xhr);
//             }
//         });
//     });

//     // Hàm để cập nhật số lượng yêu thích
//     function updateFavoriteCount(count) {
//         var $favoriteCount1 = $('#favorite-count');
//         var $favoriteCount2 = $('#favorite-count-2');

//         $favoriteCount1.text(count);
//         $favoriteCount2.text(count);

//         // Thêm hiệu ứng để làm nổi bật sự thay đổi
//         $favoriteCount1.addClass('highlight');
//         $favoriteCount2.addClass('highlight');

//         setTimeout(function () {
//             $favoriteCount1.removeClass('highlight');
//             $favoriteCount2.removeClass('highlight');
//         }, 300);
//     }
// });

// $(document).ready(function () {
//     $(document).on('click', '.favorite-btn', function (e) {
//         e.preventDefault();
//         var btn = $(this);
//         var zoneSlug = btn.data('zone-slug');

//         $.ajax({
//             url: '/add-favourite/' + zoneSlug,
//             type: 'POST',
//             data: {
//                 _token: $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (response) {
//                 if (response.status === 'added') {
//                     btn.addClass('favorited');
//                 } else if (response.status === 'removed') {
//                     btn.removeClass('favorited');
//                 }

//                 // Cập nhật số lượng yêu thích trên navbar
//                 updateFavoriteCount(response.favoriteCount);

//                 // Cập nhật Livewire component
//                 if (typeof Livewire !== 'undefined') {
//                     Livewire.emit('favoriteUpdated', response.favoriteCount);
//                 }
//             },
//             error: function (xhr) {
//                 console.log('Error:', xhr);
//             }
//         });
//     });

//     function updateFavoriteCount(count) {
//         var $favoriteCount1 = $('#favorite-count');
//         var $favoriteCount2 = $('#favorite-count-2');

//         $favoriteCount1.text(count);
//         $favoriteCount2.text(count);

//         // Thêm hiệu ứng để làm nổi bật sự thay đổi
//         $favoriteCount1.addClass('highlight');
//         $favoriteCount2.addClass('highlight');

//         setTimeout(function () {
//             $favoriteCount1.removeClass('highlight');
//             $favoriteCount2.removeClass('highlight');
//         }, 300);
//     }
// });

$(document).ready(function () {
    $(document).on('click', '.favorite-btn', function (e) {
        e.preventDefault();
        var btn = $(this);
        var zoneSlug = btn.data('zone-slug');

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isUserLoggedIn()) {
            showLoginAlert();
            return;
        }

        $.ajax({
            url: '/add-favourite/' + zoneSlug,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.status === 'added') {
                    btn.addClass('favorited');
                } else if (response.status === 'removed') {
                    btn.removeClass('favorited');
                }

                // Cập nhật số lượng yêu thích trên navbar
                updateFavoriteCount(response.favoriteCount);

                // Cập nhật Livewire component
                if (typeof Livewire !== 'undefined') {
                    Livewire.emit('favoriteUpdated', response.favoriteCount);
                }
            },
            error: function (xhr) {
                console.log('Error:', xhr);
            }
        });
    });

    function updateFavoriteCount(count) {
        var $favoriteCount1 = $('#favorite-count');
        var $favoriteCount2 = $('#favorite-count-2');

        $favoriteCount1.text(count);
        $favoriteCount2.text(count);

        // Thêm hiệu ứng để làm nổi bật sự thay đổi
        $favoriteCount1.addClass('highlight');
        $favoriteCount2.addClass('highlight');

        setTimeout(function () {
            $favoriteCount1.removeClass('highlight');
            $favoriteCount2.removeClass('highlight');
        }, 300);
    }

    // Hàm kiểm tra đăng nhập
    function isUserLoggedIn() {
        // Đây chỉ là một ví dụ, bạn cần thay thế logic này
        // bằng cách kiểm tra thực tế trạng thái đăng nhập của người dùng
        return $('meta[name="user-logged-in"]').attr('content') === 'true';
    }

    // Hàm hiển thị thông báo đăng nhập
    function showLoginAlert() {
        Swal.fire({
            title: 'Bạn cần đăng nhập!',
            text: "Vui lòng đăng nhập để sử dụng tính năng yêu thích.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đăng nhập ngay',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                // Mở modal đăng nhập
                $('#login-register-modal').modal('show');
            }
        });
    }
});