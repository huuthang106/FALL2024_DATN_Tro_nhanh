@extends('layouts.main')
@section('titleUs', 'Trang chủ trọ nhanh')
@section('contentUs')

    @if (session('error'))
         <div class="alert alert-danger">
             {{ session('error') }}
         </div>
     @endif

     @if (session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
     @endif 

    <main id="content">
        <section class="pb-4 shadow-xs-5">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
                        <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thanh Toán Hoàn Tất</li>
                    </ol>
                </nav>
                <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600 mb-6">Thanh Toán Hoàn Tất</h1>
            </div>
        </section>
        <section class="pt-8 pb-11">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-8 mb-6 mb-md-0">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15">Đơn Hàng Của Tôi</h4>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Mã Đơn Hàng:</p>
                                <p class="font-weight-500 text-heading mb-0">{{ $payment->id }}</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Ngày:</p>
                                {{-- <p class="font-weight-500 text-heading mb-0">17 Tháng 9, 2020</p> --}}
                                <p class="font-weight-500 text-heading mb-0">
                                    @if ($payment->payment_date instanceof \Carbon\Carbon)
                                        {{ $payment->created_at->format('d/m/Y') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y') }}
                                    @endif
                                </p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Tổng Cộng:</p>
                                <p class="font-weight-500 text-heading mb-0">
                                    {{ number_format($payment->total_price, 0, ',', '.') }} VND</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Phương Thức Thanh Toán:</p>
                                <p class="font-weight-500 text-heading mb-0">Thanh toán bằng ví điện tử</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Loại Thanh Toán:</p>
                                <p class="font-weight-500 text-heading mb-0">{{ $payment->description }}</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Trạng Thái:</p>
                                <p class="font-weight-500 text-heading mb-0">
                                    @if ($payment->status == 1)
                                        Thành công
                                    @elseif($payment->status == 2)
                                        Thất bại
                                    @else
                                        Khác
                                    @endif
                                </p>
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="row">
                    <div class="col-md-4 col-sm-8 mb-6 mb-md-0">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15">Đơn Hàng Của Tôi</h4>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Mã Đơn Hàng:</p>
                                <p class="font-weight-500 text-heading mb-0">{{ $payment->id }}</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Ngày:</p>
                                <p class="font-weight-500 text-heading mb-0">
                                    {{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}
                                </p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Tổng Cộng:</p>
                                <p class="font-weight-500 text-heading mb-0">
                                    {{ number_format($payment->amount, 0, ',', '.') }} VND</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Phương Thức Thanh Toán:</p>
                                <p class="font-weight-500 text-heading mb-0">VNPay</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Loại Thanh Toán:</p>
                                <p class="font-weight-500 text-heading mb-0">{{ $payment->description }}</p>
                            </li>
                            <li class="d-flex justify-content-between lh-22">
                                <p class="text-gray-light mb-0">Trạng Thái:</p>
                                <p class="font-weight-500 text-heading mb-0">{{ $payment->status }}</p>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                    <div class="col-md-7 offset-md-1">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15">Cảm ơn bạn đã mua hàng</h4>
                        <p class="mb-5">
                            Vui lòng thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Hãy sử dụng Mã Đơn Hàng của
                            bạn làm tham chiếu thanh toán.
                            Xem Thm
                            Vui lòng thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Hãy sử dụng Mã Đơn Hàng của
                            bạn làm tham chiếu thanh toán.
                            Vui lòng thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Hãy sử dụng Mã Đơn Hàng của
                            bạn làm tham chiếu thanh toán.
                        </p>
                        <p class="mb-5">


                            <a href="{{ route('owners.lich-su-giao-dich') }}" class="btn btn-primary px-4 py-2 lh-238">Đi đến Bảng Điều Khiển</a>
                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection
@push('styleUs')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Checkout - HomeID</title>
    <!-- Google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Vendors CSS -->
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
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Checkout">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="{{ asset('assets/images/homeid-social-logo.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ asset('checkout-complete-1.html') }}">
    <meta property="og:title" content="Checkout">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/homeid-social.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
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
    <!-- Theme scripts -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>
@endpush
