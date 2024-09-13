@extends('layouts.main')
@section('titleUs', 'Trang chủ trọ nhanh')
@section('contentUs')
    <main id="content">
        <section class="pb-4 shadow-xs-5">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-6 pt-lg-0 mb-4">
                        <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hóa Đơn Thanh Toán</li>
                    </ol>
                </nav>
                <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600 mb-6">Hóa Đơn Thanh Toán</h1>
            </div>
        </section>
        <section class="pt-8 pb-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-8 mb-6 mb-md-0">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15">Gói Dịch Vụ Đã Chọn</h4>
                        <div class="card border-0">
                            @foreach ($cartItems as $item)
                                <div
                                    class="card-header bg-transparent d-flex justify-content-between align-items-center px-0 pb-3">
                                    <p class="fs-15 font-weight-bold text-heading mb-0 text-uppercase mr-2"> <span
                                            class="font-weight-500"></span>{{ $item->priceList->description }}</p>
                                    {{-- <a href="#" class="btn btn-outline-primary py-2 lh-238 px-4">Đổi Gói</a> --}}
                                </div>
                                <div class="card-body px-0 py-2">
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex justify-content-between lh-22">
                                            <p class="text-gray-light mb-0">Thời Gian Gói:</p>
                                            <p class="font-weight-500 text-heading mb-0">{{$item->priceList->duration_day}} ngày</p>
                                        </li>
                                         <li class="d-flex justify-content-between lh-22">
                                            <p class="text-gray-light mb-0">Giá:</p>
                                            <p class="font-weight-500 text-heading mb-0">{{ number_format($item->priceList->price, 0, ',', '.') }} VND</p>
                                        </li> 
                                        <li class="d-flex justify-content-between lh-22">
                                            <p class="text-gray-light mb-0">Số lượng:</p>
                                            <p class="font-weight-500 text-heading mb-0">{{$item->quantity}}</p>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                            <div class="card-footer bg-transparent d-flex justify-content-between p-0 align-items-center">
                                <p class="text-heading mb-0">Tổng Giá:</p>
                                <span class="fs-32 font-weight-bold text-heading">
                               {{ number_format($totalPrice, 0, ',', '.') }}
                                    VND
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-7 offset-lg-1">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15">Chọn Phương Thức Thanh Toán</h4>
                       
                        {{-- <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="paypal" name="pay" value="paypal" checked
                                class="custom-control-input">
                            <label for="paypal" class="font-weight-500 mb-0 custom-control-label">
                                <span class="fs-12 text-heading d-inline-block mr-1"><i class="fab fa-paypal"></i></span>
                                Thanh Toán Bằng Paypal</label>
                        </div> --}}
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="card" name="pay" value="card" class="custom-control-input">
                            <label for="card" class="font-weight-500 mb-0 custom-control-label"><span
                                    class="fs-12 text-heading d-inline-block mr-1"><i
                                        class="fas fa-credit-card"></i></span>Thanh Toán Bằng VNPAY</label>
                        </div>
                        {{-- <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="wire" name="pay" value="wire" class="custom-control-input">
                            <label for="wire" class="font-weight-500 mb-0 custom-control-label"><span
                                    class="text-heading fs-12  d-inline-block mr-1"><i
                                        class="fas fa-paper-plane"></i></span>Chuyển Khoản</label>
                        </div> --}}
                        <p class="text-heading font-weight-500 mb-0 pt-1">Xem Thêm</p>
                        
                        <p class="mb-6">Vui lòng đọc <a href="#"
                                class="text-heading font-weight-500 border-bottom hover-primary">Điều Khoản & Điều Kiện</a>
                            trước</p>
                        {{-- <a href="checkout-complete-2.html" class="btn btn-primary px-8 py-2 lh-238">Thanh Toán Ngay</a> --}}
                        <form action="{{ route('client.payment.process') }}" method="POST">
                            @csrf
                            <button type="submit" id="payButton" class="btn btn-primary">Thanh toán</button>
                        </form>
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
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
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
@endpush
