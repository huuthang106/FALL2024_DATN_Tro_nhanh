$(document).ready(function () {
    $('.favorite-btn').on('click', function (e) {
        e.preventDefault();
        var btn = $(this);
        var roomSlug = btn.data('room-slug');

        $.ajax({
            url: '/add-favourite/' + roomSlug,
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
            },
            error: function (xhr) {
                console.log('Error:', xhr);
            }
        });
    });

    // Hàm để cập nhật số lượng yêu thích
    function updateFavoriteCount(count) {
        var $favoriteCount = $('#favorite-count');
        $favoriteCount.text(count);

        // Thêm hiệu ứng để làm nổi bật sự thay đổi
        $favoriteCount.addClass('highlight');
        setTimeout(function () {
            $favoriteCount.removeClass('highlight');
        }, 300);
    }
});