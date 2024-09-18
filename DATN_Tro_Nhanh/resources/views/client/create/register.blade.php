@extends('layouts.main')
@section('titleUs', 'Đăng Ký | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="py-13 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card border-0 shadow-xxs-2 mb-6">
                            <div class="card-body px-8 py-6">
                                <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2 text-center">Đăng ký</h2>
                                <!-- <p class="mb-4 text-center">Chưa có tài khoản? <a href="#" class="text-heading hover-primary"><u>Đăng ký miễn phí</u></a></p> -->
                                <form class="form">
                                    <div class="form-group mb-4">
                                        <label for="firstName">Tên</label>
                                        <input type="text" class="form-control form-control-lg border-0" id="firstName"
                                            name="first-name" placeholder="Tên của bạn">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="lastName">Họ</label>
                                        <input type="text" class="form-control form-control-lg border-0" id="lastName"
                                            name="last-name" placeholder="Họ của bạn">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control form-control-lg border-0" id="email"
                                            name="email" placeholder="Email của bạn">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password-1">Mật khẩu</label>
                                        <div class="input-group input-group-lg">
                                            <input type="password" class="form-control border-0 shadow-none fs-13"
                                                id="password-1" name="password" placeholder="Mật khẩu">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                                    <i class="far fa-eye-slash"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="re-password">Nhập lại mật khẩu</label>
                                        <div class="input-group input-group-lg">
                                            <input type="password" class="form-control border-0 shadow-none fs-13"
                                                id="re-password" name="re-password" placeholder="Nhập lại mật khẩu">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                                    <i class="far fa-eye-slash"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-4">
                                        <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember-me-1" name="remember">
                                <label class="form-check-label" for="remember-me-1">
                                  Ghi nhớ đăng nhập
                                </label>
                              </div> -->
                                        <!-- <a href="password-recovery.html" class="d-inline-block ml-auto fs-13 lh-2 text-body">
                                <u>Quên mật khẩu?</u>
                              </a> -->
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Đăng ký</button>
                                </form>
                                <div class="divider text-center my-2">
                                    <span class="px-4 bg-white lh-17 text text-heading">
                                        hoặc Đăng ký bằng
                                    </span>
                                </div>
                                <div class="row no-gutters mx-n2">
                                    <div class="col-sm-6 px-2 mb-4">
                                        <a href="#"
                                            class="btn btn-lg btn-block text-heading border px-0 bg-hover-accent">
                                            <img src="{{ asset('assets/images/facebook.png') }}" alt="Facebook"
                                                class="mr-2">Facebook
                                        </a>
                                    </div>
                                    <div class="col-sm-6 px-2 mb-4">
                                        <a href="#"
                                            class="btn btn-lg btn-block text-heading border px-0 bg-hover-accent">
                                            <img src="{{ asset('assets/images/google.png') }}" alt="Google"> Google
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="media rounded-lg bg-gray-01 p-6 mb-6 mb-lg-0">
                        <div class="mr-6 fs-60 lh-1 text-primary">
                          <svg class="icon icon-r">
                            <use xlink:href="#icon-r"></use>
                          </svg>
                        </div>
                        <div class="media-body">
                          <p class="fs-13 text-heading lh-2 mb-0">Bạn có thể sử dụng các thông tin đăng nhập sau để thử nghiệm:</p>
                          <p class="fs-13 lh-2 mb-0">Tên đăng nhập: <span class="text-heading">demo</span></p>
                          <p class="fs-13 lh-2 mb-0">Mật khẩu: <span class="text-heading">demo123</span></p>
                        </div>
                      </div> -->
                    </div>
                </div>
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
    <meta name="twitter:image" content="{{ asset('assets/images/homeid-social-logo.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ asset('assets/signup-and-login.html') }}">
    <meta property="og:title" content="Signup and Login">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/homeid-social.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Đăng ký tài khoản trên TRỌ NHANH để tìm kiếm phòng trọ nhanh chóng và dễ dàng. Tham gia ngay để quản lý phòng trọ và khám phá nhiều lựa chọn phù hợp.">
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
    <meta name="twitter:title" content="Đăng Ký - TRỌ NHANH">
    <meta name="twitter:description"
        content="Tạo tài khoản TRỌ NHANH để tìm kiếm phòng trọ phù hợp với nhu cầu của bạn. Đăng ký ngay để quản lý phòng trọ của mình một cách dễ dàng.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Đăng Ký - TRỌ NHANH">
    <meta property="og:description"
        content="Đăng ký tài khoản trên TRỌ NHANH để trải nghiệm dịch vụ tìm kiếm và quản lý phòng trọ tiện lợi. Khám phá ngay các lựa chọn phòng trọ phù hợp với bạn.">
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
