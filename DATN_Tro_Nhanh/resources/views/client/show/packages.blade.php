@extends('layouts.main')
@section('titleUs', 'Trang chủ trọ nhanh')
@section('contentUs')
    <main id="content">
        <section class="pb-4 shadow-xs-5">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
                        <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gói</li>
                    </ol>
                </nav>
                <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600 mb-6">Gói</h1>
            </div>
        </section>
        <section class="py-8">
            <div class="container">
                <h4 class="mb-2 fs-22 lh-15 text-heading">Chọn gói phù hợp với doanh nghiệp của bạn</h4>
                <div class="row">
    @foreach ($priceLists as $priceList)
        <div class="col-xl-3 col-sm-6 mb-6">
            <div class="card bg-gray-01 border-0 p-4 overflow-hidden d-flex flex-column">
                <div class="card-header bg-transparent p-0">
                    <p class="fs-15 font-weight-bold text-heading mb-0">Gói <span
                            class="font-weight-500">{{ $priceList->name }}</span></p>
                    <p class="fs-32 font-weight-bold text-heading lh-15 mb-1">
                        {{ number_format($priceList->price, 0, ',', '.') }} VND</p>
                    <span class="fs-13 font-weight-500 text-white text-uppercase custom-packages">
                        {{ $priceList->location->name }}
                    </span>
                </div>
                <div class="card-body p-0 flex-grow-1">
                    <ul class="list-unstyled pt-2 mb-2">
                        <li class="d-flex justify-content-between">
                            <p class="text-gray-light mb-0">Hạn Sử Dụng</p>
                            <p class="font-weight-500 text-heading mb-0">{{ $priceList->duration_day }} ngày</p>
                        </li>
                        <li class="d-flex justify-content-between">
                            <p class="text-gray-light mb-0">Loại</p>
                            <p class="font-weight-500 text-heading mb-0">{{ $priceList->location->name }}</p>
                        </li>
                    </ul>
                </div>
                <div class="card-footer p-0 mt-auto d-flex justify-content-center">
                    <button id="add-to-cart-button" data-product-id="{{ $priceList->id }}"
                        class="btn btn-primary btn-block d-flex justify-content-between align-items-center add-to-cart-button">
                        Thêm vào giỏ hàng
                        <i class="far fa-shopping-cart ml-1"></i>
</button>
                </div>
            </div>
        </div>
    @endforeach

                </div>
            </div>




        </section>
    </main>

@endsection
@push('styleUs')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mẫu HTML Bất Động Sản">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Gói - HomeID</title>
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
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Gói">
    <meta name="twitter:description" content="Mẫu HTML Bất Động Sản">
    <meta name="twitter:image" content="{{ asset('assets/images/homeid-social-logo.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="packages.html">
    <meta property="og:title" content="Gói">
    <meta property="og:description" content="Mẫu HTML Bất Động Sản">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/homeid-social.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="stylesheet" href="{{ asset('assets/css/mh.css') }}">
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
    document.addEventListener('DOMContentLoaded', function () {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa, biến này sẽ là 'true' hoặc 'false'
        var isLoggedIn = '{{ Auth::check() ? 'true' : 'false' }}' === 'true';

        // Xử lý sự kiện click cho tất cả các nút "Thêm vào giỏ hàng"
        document.querySelectorAll('.add-to-cart-button').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định (không cho trang load lại)

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



c



@endpush
