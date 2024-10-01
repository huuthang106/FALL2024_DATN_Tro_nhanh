@extends('layouts.main')
@section('titleUs', 'Dịch Vụ | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="pt-2 pb-10 pb-lg-17 page-title bg-overlay bg-img-cover-center"
            style="background-image: url('{{ asset('assets/images/BG3.jpg') }}');">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-light mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dịch vụ</li>
                    </ol>
                </nav>
                <h1 class="fs-22 fs-md-42 mb-0 text-white font-weight-normal text-center pt-17 pb-13 lh-15 px-lg-16"
                    data-animate="fadeInDown">
                    Trọ Nhanh là nền tảng giúp bạn tìm kiếm và quản lý phòng trọ một cách nhanh chóng và hiệu quả.
                </h1>
            </div>
        </section>
        <section class="bg-patten-05 mb-13">
            <div class="container">
                <div class="card mt-n13 z-index-3 pt-10 border-0">
                    <div class="card-body p-0">
                        <h2 class="text-dark lh-1625 text-center mb-2">Dịch Vụ Cung Cấp</h2>
                        <p class="mxw-751 text-center mb-8 px-8">Trọ Nhanh cung cấp các dịch vụ thuê trọ toàn diện, bao gồm
                            tìm kiếm phòng trọ, quản lý hợp đồng và hỗ trợ khách hàng. Chúng tôi cam kết mang đến cho bạn
                            những lựa chọn tốt nhất và dịch vụ tận tâm để đáp ứng nhu cầu của bạn.</p>
                    </div>
                </div>
                <div class="row mb-9">
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <div class="card border-hover shadow-hover-lg-1 px-7 pb-6 pt-4 h-100 bg-transparent bg-hover-white">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1"><svg class="icon icon-e1">
                                        <use xlink:href="#icon-e1"></use>
                                    </svg></span>
                            </div>
                            <div class="card-body px-0 pt-6 pb-0 text-center">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Dịch Vụ Thuê Trọ</h4>
                                <p class="card-text px-2">
                                    Trọ Nhanh cung cấp dịch vụ thuê trọ chuyên nghiệp, giúp bạn dễ dàng tìm kiếm và quản lý
                                    các không gian sống phù hợp với nhu cầu. Chúng tôi cam kết hỗ trợ bạn từ việc tìm kiếm
                                    phòng cho đến khi bạn chuyển vào.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <div class="card border-hover shadow-hover-lg-1 px-7 pb-6 pt-4 h-100 bg-transparent bg-hover-white">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1">
                                    <svg class="icon icon-e2">
                                        <use xlink:href="#icon-e2"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="card-body px-0 pt-6 pb-0 text-center">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Dịch Vụ Cho Thuê</h4>
                                <p class="card-text px-2">
                                    Trọ Nhanh cung cấp dịch vụ cho thuê phòng trọ với quy trình nhanh chóng và dễ dàng.
                                    Chúng tôi hỗ trợ bạn trong việc tìm kiếm các tùy chọn phù hợp và đảm bảo trải nghiệm
                                    thuê trọ của bạn là thuận tiện và hiệu quả.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <div class="card border-hover shadow-hover-lg-1 px-7 pb-6 pt-4 h-100 bg-transparent bg-hover-white">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1">
                                    <svg class="icon icon-e3">
                                        <use xlink:href="#icon-e3"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="card-body px-0 pt-6 text-center pb-0">
                                <a href="https://zalo.me/0389454682"
                                    class="card-body px-0 pt-6 text-center pb-0 d-block text-decoration-none"
                                    target="_blank" rel="noopener noreferrer">
                                    <h4 class="card-title fs-18 lh-17 text-dark mb-2">Dịch Vụ Tư Vấn Thuê Trọ</h4>
                                    <p class="card-text px-2 text-body">
                                        Trọ Nhanh cung cấp dịch vụ tư vấn chuyên nghiệp để giúp bạn lựa chọn phòng trọ phù
                                        hợp
                                        với nhu cầu và ngân sách của mình. Chúng tôi cung cấp thông tin chi tiết và hỗ trợ
                                        bạn
                                        trong mọi bước của quy trình thuê trọ.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <a href="{{ route('client.room-listing') }}"
                            class="card border-hover shadow-hover-lg-1 px-7 pb-6 pt-4 h-100 bg-transparent bg-hover-white text-decoration-none d-block">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1">
                                    <svg class="icon icon-e4">
                                        <use xlink:href="#icon-e4"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="card-body px-0 pt-6 pb-0 text-center">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Thuê Phòng</h4>
                                <p class="card-text px-2 text-body">
                                    Trọ Nhanh cung cấp dịch vụ thuê phòng hiệu quả, giúp bạn tìm kiếm và thuê phòng trọ
                                    nhanh chóng. Chúng tôi hỗ trợ bạn từ việc tìm hiểu các tùy chọn đến ký hợp đồng thuê,
                                    đảm bảo trải nghiệm của bạn là thuận tiện và dễ dàng.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <a href="{{ route('client.package') }}"
                            class="card border-hover shadow-hover-lg-1 px-7 pb-6 pt-4 h-100 bg-transparent bg-hover-white text-decoration-none d-block">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"
                                        fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                        <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                        <path
                                            d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="card-body px-0 pt-6 pb-0 text-center">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Gói Dịch Vụ</h4>
                                <p class="card-text px-2 text-body">
                                    Trọ Nhanh cung cấp các gói dịch vụ đa dạng để hỗ trợ bạn trong việc quảng bá và cho thuê
                                    phòng trọ.
                                    Từ gói cơ bản đến gói cao cấp, chúng tôi có nhiều lựa chọn phù hợp với nhu cầu và ngân
                                    sách của bạn,
                                    giúp tối ưu hóa hiệu quả quảng cáo và tìm kiếm khách thuê.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <div class="card border-hover shadow-hover-lg-1 px-7 pb-6 pt-4 h-100 bg-transparent bg-hover-white">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1">
                                    <svg class="icon icon-e6">
                                        <use xlink:href="#icon-e6"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="card-body px-0 pt-6 text-center pb-0">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Dịch Vụ Ký Gửi</h4>
                                <p class="card-text px-2">
                                    Trọ Nhanh cung cấp dịch vụ ký gửi để bảo đảm an toàn trong giao dịch thuê phòng. Chúng
                                    tôi giúp quản lý và bảo vệ quyền lợi của cả chủ nhà và người thuê, đảm bảo rằng mọi thỏa
                                    thuận được thực hiện một cách minh bạch và công bằng.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-11">
                <h2 class="text-heading mb-2 fs-22 fs-md-32 text-center lh-16 mxw-571 px-lg-8">
                    Bạn Đang Tìm Phòng Trọ?
                </h2>
                <p class="text-center mxw-670 mb-8">
                    Trọ Nhanh giúp bạn dễ dàng tìm kiếm phòng trọ phù hợp với nhu cầu của bạn. Hãy khám phá các tùy chọn của
                    chúng tôi và tìm cho mình không gian sống lý tưởng.
                </p>
                <form class="mxw-774" method="POST" action="{{ route('client.service-mail-store') }}" id="serviceMailForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" placeholder="Tên" class="form-control form-control-lg border-0"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input placeholder="Email" class="form-control form-control-lg border-0" type="email"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 px-2">
                            <div class="form-group">
                                <input type="text" placeholder="Số điện thoại" name="phone"
                                    class="form-control form-control-lg border-0" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-6">
                        <textarea class="form-control border-0" placeholder="Nội dung hỗ trợ..." name="message" rows="5">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary px-9">Gửi</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

@endsection
@push('styleUs')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Dịch Vụ | TRỌ NHANH</title>
    <!-- Google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
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
    <meta name="twitter:title" content="Home 01">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="images/homeid-social-logo.png">
    <!-- Facebook -->
    <meta property="og:url" content="home-01.html">
    <meta property="og:title" content="Home 01">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/homeid-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Các dịch vụ hỗ trợ tìm và thuê phòng trọ nhanh chóng, dễ dàng và an toàn với TRỌ NHANH.">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">

    <!-- Google Fonts -->
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
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TronNhanh">
    <meta name="twitter:creator" content="@TronNhanh">
    <meta name="twitter:title" content="Dịch Vụ Tìm Thuê Phòng Trọ | TRỌ NHANH">
    <meta name="twitter:description"
        content="Tìm kiếm và thuê phòng trọ dễ dàng với TRỌ NHANH - dịch vụ uy tín giúp bạn nhanh chóng tìm được nơi ở phù hợp.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url('/dich-vu') }}">
    <meta property="og:title" content="Dịch Vụ | TRỌ NHANH">
    <meta property="og:description"
        content="Dịch vụ hỗ trợ tìm phòng trọ nhanh chóng, hiệu quả với các tính năng vượt trội từ TRỌ NHANH.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
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
    <script src="{{ asset('assets/js/alert-update-user.js') }}"></script>
    <script src="{{ asset('assets/js/alert-report.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#serviceMailForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('client.service-mail-store') }}",
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: response.message,
                        });
                        $('#serviceMailForm')[0].reset();
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        for (let field in errors) {
                            errorMessage += errors[field][0] + '\n';
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi!',
                            text: errorMessage,
                        });
                    }
                });
            });
        });
    </script>
@endpush
