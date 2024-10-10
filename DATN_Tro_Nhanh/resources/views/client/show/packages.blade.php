@extends('layouts.main')
@section('titleUs', 'Gói Tin | TRỌ NHANH')
@section('contentUs')

    @livewire('price-list-client')

@endsection
@push('styleUs')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Khám phá gói tin quảng cáo phòng trọ của chúng tôi! Đặt vị trí đăng bài nổi bật, tiếp cận hàng nghìn khách hàng tiềm năng và tăng cường khả năng tìm kiếm phòng trọ của bạn. Đừng bỏ lỡ cơ hội nâng cao sự hiện diện của bạn trên thị trường. Xem ngay để biết thêm chi tiết và nhận ưu đãi đặc biệt!">
    <meta name="keywords"
        content="quảng cáo phòng trọ, gói tin quảng cáo, vị trí đăng bài, tăng cường tìm kiếm phòng trọ, ưu đãi quảng cáo">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">
    <!-- Google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- CSS của nhà cung cấp -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome-pro-5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/timepicker/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dataTables/jquery.dataTables.min.css') }}">
    <!-- CSS cốt lõi của chủ đề -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Biểu tượng yêu thích -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Gói Tin Quảng Cáo Phòng Trọ - Tăng Cường Hiện Diện Của Bạn">
    <meta name="twitter:description"
        content="Đặt gói tin quảng cáo để có vị trí nổi bật cho phòng trọ của bạn. Nâng cao khả năng tìm kiếm và tiếp cận khách hàng tiềm năng với các ưu đãi đặc biệt. Khám phá ngay!">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Gói Tin Quảng Cáo Phòng Trọ - Tăng Cường Hiện Diện Của Bạn">
    <meta property="og:description"
        content="Mua gói tin quảng cáo để có vị trí đăng bài nổi bật cho phòng trọ của bạn. Tiếp cận khách hàng tiềm năng và nâng cao sự hiện diện trực tuyến của bạn. Xem ngay các ưu đãi đặc biệt và chi tiết gói tin của chúng tôi!">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="stylesheet" href="{{ asset('assets/css/mh.css') }}">
    <style>
        .custom-packages {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 50px;
                height: 19px;
                white-space: nowrap; /* Ngăn chữ xuống dòng */
            }
    </style>
@endpush

@push('scriptUs')
    <script src="{{ asset('assets/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/counter/countUp.js') }}"></script>
    <script src="{{ asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropzone/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/hc-sticky/hc-sticky.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jparallax/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.js') }}"></script>
    <script src="{{ asset('assets/vendors/dataTables/jquery.dataTables.min.js') }}"></script>
    <!-- Scripts của chủ đề -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Kiểm tra xem người dùng đã đăng nhập hay chưa, biến này sẽ là 'true' hoặc 'false'
            var isLoggedIn = '{{ Auth::check() ? 'true' : 'false' }}' === 'true';

            // Xử lý sự kiện click cho tất cả các nút "Thêm vào giỏ hàng"
            document.querySelectorAll('.add-to-cart-button').forEach(button => {
                button.addEventListener('click', function(event) {
                    event
                        .preventDefault(); // Ngăn chặn hành động mặc định (không cho trang load lại)

                    if (!isLoggedIn) {
                        // Nếu chưa đăng nhập, hiển thị modal đăng nhập
                        $('#login-register-modal').modal('show');
                    } else {
                        // Nếu đã đăng nhập, lấy productId và gửi request AJAX để thêm vào giỏ hàng
                        var priceListId = this.getAttribute('data-product-id');

                        // Gửi request AJAX đến route thêm vào giỏ hàng
                        fetch("{{ route('client.carts-add') }}", {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Gửi kèm token CSRF
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    price_list_id: priceListId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Nếu thêm thành công, chuyển hướng đến trang giỏ hàng
                                    window.location.href = "{{ route('client.carts-show') }}";
                                } else {
                                    // Nếu thêm thất bại, hiển thị thông báo lỗi
                                    alert("Lỗi: " + data.error);
                                }
                            })
                            .catch(error => {
                                console.error('Lỗi:', error);
                            });
                    }
                });
            });
        });
    </script>
@endpush
