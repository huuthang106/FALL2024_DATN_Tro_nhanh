@extends('layouts.main')
@section('titleUs', 'Đổi Mật Khẩu | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="py-13">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="card border-0 shadow-xxs-2 login-register">
                            <div class="card-body p-6">
                                <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2">Quên mật khẩu?</h2>
                                <p class="mb-4">Chưa có tài khoản? <a href="signup-and-login.html"
                                        class="text-heading hover-primary"><u>Đăng ký miễn phí</u></a></p>
                                <form class="form">
                                    <div class="form-group">
                                        <label for="email" class="text-heading">Nhập địa chỉ email của bạn</label>
                                        <input type="email" name="mail" class="form-control form-control-lg border-0"
                                            id="email" placeholder="Nhập địa chỉ email của bạn">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg rounded">Nhận mật khẩu mới
                                    </button>
                                </form>
                                <div class="divider text-center my-2">
                                    <span class="px-4 bg-white lh-17 text text-heading">
                                        hoặc Đăng ký với
                                    </span>
                                </div>
                                <div class="row no-gutters mx-n2">
                                    <div class="col-sm-6 px-2 mb-4">
                                        <a href="#"
                                            class="btn btn-lg btn-block text-heading border px-0 rounded bg-hover-accent">
                                            <img src="{{ asset('assets/images/facebook.png') }}" alt="Facebook"
                                                class="mr-2">
                                            Facebook
                                        </a>
                                    </div>
                                    <div class="col-sm-6 px-2 mb-4">
                                        <a href="#"
                                            class="btn btn-lg btn-block text-heading border px-0 rounded bg-hover-accent">
                                            <img src="{{ asset('assets/images/google.png') }}" alt="Google">
                                            Google
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @push('styleUs')
        {{-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Real Estate Html Template">
        <meta name="author" content="TRỌ NHANH">
        <meta name="generator" content="TRỌ NHANH">
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
        <meta name="twitter:title" content="Signup and Login">
        <meta name="twitter:description" content="Real Estate Html Template">
        <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
        <!-- Facebook -->
        <meta property="og:url" content="{{ asset('assets/signup-and-login.html') }}">
        <meta property="og:title" content="Signup and Login">
        <meta property="og:description" content="Real Estate Html Template">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630"> --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description"
            content="TRỌ NHANH - Hệ thống tìm kiếm và đăng ký phòng trọ nhanh chóng và dễ dàng. Đăng nhập để quản lý phòng trọ của bạn hoặc đăng ký để khám phá các lựa chọn trọ phù hợp.">
        <meta name="author" content="TRỌ NHANH">
        <meta name="generator" content="TRỌ NHANH">
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
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@TroNhanh">
        <meta name="twitter:creator" content="@TroNhanh">
        <meta name="twitter:title" content="Đăng Ký và Đăng Nhập - TRỌ NHANH">
        <meta name="twitter:description"
            content="Truy cập TRỌ NHANH để tìm kiếm phòng trọ phù hợp và đăng ký tài khoản để trải nghiệm dịch vụ quản lý tiện ích của chúng tôi.">
        <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
        <!-- Facebook -->
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="Đăng Ký và Đăng Nhập - TRỌ NHANH">
        <meta property="og:description"
            content="Tìm kiếm và đăng ký phòng trọ nhanh chóng, dễ dàng với hệ thống của TRỌ NHANH. Đăng nhập để quản lý phòng trọ của bạn hoặc đăng ký để bắt đầu hành trình tìm trọ.">
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
    @endpush
