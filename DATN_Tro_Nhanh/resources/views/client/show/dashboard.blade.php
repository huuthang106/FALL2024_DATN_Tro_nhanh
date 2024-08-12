@extends('layouts.app')
@section('titleUs', 'Trang chủ trọ nhanh')
@section('contentAdmin')
    <div class="wrapper dashboard-wrapper">
        <div class="d-flex flex-wrap flex-xl-nowrap">
            <div class="page-content">
                <header class="main-header shadow-none shadow-lg-xs-1 bg-white position-relative d-none d-xl-block">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light py-0 row no-gutters px-3 px-lg-0">
                            <div class="col-md-4 px-0 px-md-6 order-1 order-md-0">
                                <form>
                                    <div class="input-group">
                                        <div class="input-group-prepend mr-0">
                                            <button class="btn border-0 shadow-none fs-20 text-muted p-0" type="submit"><i
                                                    class="far fa-search"></i></button>
                                        </div>
                                        <input type="text" class="form-control border-0 bg-transparent shadow-none"
                                            placeholder="Tìm kiếm..." name="search">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 d-flex flex-wrap justify-content-md-end order-0 order-md-1">
                                <div class="dropdown border-md-right border-0 py-3 text-right">
                                    <a href="#"
                                        class="dropdown-toggle text-heading pr-3 pr-sm-6 d-flex align-items-center justify-content-end"
                                        data-toggle="dropdown">
                                        <div class="mr-4 w-48px">
                                            <img src="{{ asset('assets/images/testimonial-5.jpg') }}" alt="Ronald Hunter"
                                                class="rounded-circle">
                                        </div>
                                        <div class="fs-13 font-weight-500 lh-1">
                                            Ronald Hunter
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right w-100">
                                        <a class="dropdown-item" href="dashboard-my-profiles.html">Hồ sơ của tôi</a>
                                        <a class="dropdown-item" href="#">Đăng xuất</a>
                                    </div>
                                </div>
                                <div
                                    class="dropdown no-caret py-3 px-3 px-sm-6 d-flex align-items-center justify-content-end notice">
                                    <a href="#" class="dropdown-toggle text-heading fs-20 font-weight-500 lh-1"
                                        data-toggle="dropdown">
                                        <i class="far fa-bell"></i>
                                        <span
                                            class="badge badge-primary badge-circle badge-absolute font-weight-bold fs-13">1</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Hoạt động</a>
                                        <a class="dropdown-item" href="#">Một hàng dộngd khác</a>
                                        <a class="dropdown-item" href="#">Có điều gì khác ở đây</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </header>
                <main id="content" class="bg-gray-01">
                    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
                        <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                            <div class="mr-0 mr-md-auto">
                                <h2 class="mb-0 text-heading fs-22 lh-15">Chào mừng trở lại, Ronald Hunter!</h2>
                            </div>
                            <div>
                                <a href="dashboard-add-new-property.html" class="btn btn-primary btn-lg">
                                    <span>Thêm thuộc tính mới</span>
                                    <span class="d-inline-block ml-1 fs-20 lh-1"><svg class="icon icon-add-new">
                                            <use xlink:href="#icon-add-new"></use>
                                        </svg></span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xxl-3 mb-6">
                                <div class="card">
                                    <div class="card-body row align-items-center px-6 py-7">
                                        <div class="col-5">
                                            <span
                                                class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-blue badge-circle">
                                                <svg class="icon icon-1">
                                                    <use xlink:href="#icon-1"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col-7 text-center">
                                            <p class="fs-42 lh-12 mb-0 counterup" data-start="0" data-end="29"
                                                data-decimals="0" data-duration="0" data-separator="">29</p>
                                            <p>Thuộc tính</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-3 mb-6">
                                <div class="card">
                                    <div class="card-body row align-items-center px-6 py-7">
                                        <div class="col-5">
                                            <span
                                                class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-green badge-circle">
                                                <svg class="icon icon-2">
                                                    <use xlink:href="#icon-2"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col-7 text-center">
                                            <p class="fs-42 lh-12 mb-0 counterup" data-start="0" data-end="1730"
                                                data-decimals="0" data-duration="0" data-separator="">1730</p>
                                            <p>Tổng số lượt xem</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-3 mb-6">
                                <div class="card">
                                    <div class="card-body row align-items-center px-6 py-7">
                                        <div class="col-4">
                                            <span
                                                class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-yellow badge-circle">
                                                <svg class="icon icon-review">
                                                    <use xlink:href="#icon-review"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col-8 text-center">
                                            <p class="fs-42 lh-12 mb-0 counterup" data-start="0" data-end="329"
                                                data-decimals="0" data-duration="0" data-separator="">329</p>
                                            <p>Tổng số lượt đánh giá của khách hàng</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-3 mb-6">
                                <div class="card">
                                    <div class="card-body row align-items-center px-6 py-7">
                                        <div class="col-5">
                                            <span
                                                class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-pink badge-circle">
                                                <svg class="icon icon-heart">
                                                    <use xlink:href="#icon-heart"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col-7 text-center">
                                            <p class="fs-42 lh-12 mb-0 counterup" data-start="0" data-end="914"
                                                data-decimals="0" data-duration="0" data-separator="">914</p>
                                            <p>Tổng số lượt yêu thích</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-8 mb-6">
                                <div class="card px-7 py-6 h-100 chart">
                                    <div class="card-body p-0 collapse-tabs">
                                        <div class="d-flex align-items-center mb-5">
                                            <h2 class="mb-0 text-heading fs-22 lh-15 mr-auto">Xem số liệu thống kê</h2>
                                            <ul class="nav nav-pills justify-content-end d-none d-sm-flex nav-pills-01"
                                                role="tablist">
                                                <li class="nav-item px-5 py-1">
                                                    <a class="nav-link active bg-transparent shadow-none p-0 letter-spacing-1"
                                                        id="hours-tab" data-toggle="tab" href="#hours" role="tab"
                                                        aria-controls="hours" aria-selected="true">Giờ</a>
                                                </li>
                                                <li class="nav-item px-5 py-1">
                                                    <a class="nav-link bg-transparent shadow-none p-0 letter-spacing-1"
                                                        id="weekly-tab" data-toggle="tab" href="#weekly" role="tab"
                                                        aria-controls="weekly" aria-selected="false">Hàng tuần</a>
                                                </li>
                                                <li class="nav-item px-5 py-1">
                                                    <a class="nav-link bg-transparent shadow-none p-0 letter-spacing-1"
                                                        id="monthly-tab" data-toggle="tab" href="#monthly"
                                                        role="tab" aria-controls="monthly" aria-selected="false">Hàng
                                                        tháng</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content shadow-none p-0">
                                            <div id="collapse-tabs-accordion">
                                                <div class="tab-pane tab-pane-parent fade show active px-0" id="hours"
                                                    role="tabpanel" aria-labelledby="hours-tab">
                                                    <div class="card bg-transparent mb-sm-0 border-0">
                                                        <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0"
                                                            id="headingHours">
                                                            <h5 class="mb-0">
                                                                <button
                                                                    class="btn collapse-parent font-size-h5 btn-block border shadow-none"
                                                                    data-toggle="collapse" data-target="#hours-collapse"
                                                                    aria-expanded="true" aria-controls="hours-collapse">
                                                                    Hours
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="hours-collapse" class="collapse show collapsible"
                                                            aria-labelledby="headingHours"
                                                            data-parent="#collapse-tabs-accordion">
                                                            <div class="card-body p-0 py-4">
                                                                <canvas class="chartjs" data-chart-options="[]"
                                                                    data-chart-labels='["05h","08h","11h","14h","17h","20h","23h"]'
                                                                    data-chart-datasets='[{"label":"Clicked","data":[0,7,10,3,15,30,10],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[10,9,18,20,28,40,27],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                                                                </canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane tab-pane-parent fade px-0" id="weekly"
                                                    role="tabpanel" aria-labelledby="weekly-tab">
                                                    <div class="card bg-transparent mb-sm-0 border-0">
                                                        <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0"
                                                            id="headingWeekly">
                                                            <h5 class="mb-0">
                                                                <button
                                                                    class="btn collapse-parent font-size-h5 btn-block collapsed border shadow-none"
                                                                    data-toggle="collapse" data-target="#weekly-collapse"
                                                                    aria-expanded="true" aria-controls="weekly-collapse">
                                                                    Weekly
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="weekly-collapse" class="collapse collapsible"
                                                            aria-labelledby="headingWeekly"
                                                            data-parent="#collapse-tabs-accordion">
                                                            <div class="card-body p-0 py-4">
                                                                <canvas class="chartjs" data-chart-options="[]"
                                                                    data-chart-labels='["Mar 12","Mar 13","Mar 14","Mar 15","Mar 16","Mar 17","Mar 18","Mar 19"]'
                                                                    data-chart-datasets='[{"label":"Clicked","data":[0,13,9,3,15,15,10,0],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[10,20,18,15,28,33,27,10],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                                                                </canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane tab-pane-parent fade px-0" id="monthly"
                                                    role="tabpanel" aria-labelledby="monthly-tab">
                                                    <div class="card bg-transparent mb-sm-0 border-0">
                                                        <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0"
                                                            id="headingMonthly">
                                                            <h5 class="mb-0">
                                                                <button
                                                                    class="btn btn-block collapse-parent collapsed border shadow-none"
                                                                    data-toggle="collapse" data-target="#monthly-collapse"
                                                                    aria-expanded="true" aria-controls="monthly-collapse">
                                                                    Monthly
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="monthly-collapse" class="collapse collapsible"
                                                            aria-labelledby="headingMonthly"
                                                            data-parent="#collapse-tabs-accordion">
                                                            <div class="card-body p-0 py-4">
                                                                <canvas class="chartjs" data-chart-options="[]"
                                                                    data-chart-labels='["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]'
                                                                    data-chart-datasets='[{"label":"Clicked","data":[2,15,20,10,15,20,10,0,20,30,10,0],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[10,20,18,15,28,33,27,10,20,30,10,0],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                                                                </canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 mb-6">
                                <div class="card px-7 py-6 h-100">
                                    <div class="card-body p-0">
                                        <h2 class="mb-2 text-heading fs-22 lh-15">Hoạt động gần đây</h2>
                                        <ul class="list-group list-group-no-border">
                                            <li class="list-group-item px-0 py-2">
                                                <div class="media align-items-center">
                                                    <div
                                                        class="badge badge-blue w-40px h-40 d-flex align-items-center justify-content-center property fs-18 mr-3">
                                                        <svg class="icon icon-1">
                                                            <use xlink:href="#icon-1"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body">
                                                        Danh sách Biệt thự Called Archangel của bạn đã được chấp thuận
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 py-2">
                                                <div class="media align-items-center">
                                                    <div
                                                        class="badge badge-yellow w-40px h-40 d-flex align-items-center justify-content-center fs-18 mr-3">
                                                        <svg class="icon icon-review">
                                                            <use xlink:href="#icon-review"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body">
                                                        Danh sách Biệt thự Called Archangel của bạn đã được chấp thuận
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 py-2">
                                                <div class="media align-items-center">
                                                    <div
                                                        class="badge badge-pink w-40px h-40 d-flex align-items-center justify-content-center fs-18 mr-3">
                                                        <svg class="icon icon-heart">
                                                            <use xlink:href="#icon-heart"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body">
                                                        Danh sách Biệt thự Called Archangel của bạn đã được chấp thuận
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 py-2">
                                                <div class="media align-items-center">
                                                    <div
                                                        class="badge badge-pink w-40px h-40 d-flex align-items-center justify-content-center fs-18 mr-3">
                                                        <svg class="icon icon-heart">
                                                            <use xlink:href="#icon-heart"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body">
                                                        Danh sách Biệt thự Called Archangel của bạn đã được chấp thuận
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 py-2">
                                                <div class="media align-items-center">
                                                    <div
                                                        class="badge badge-blue w-40px h-40 d-flex align-items-center justify-content-center fs-18 mr-3">
                                                        <svg class="icon icon-1">
                                                            <use xlink:href="#icon-1"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body">
                                                        Danh sách Biệt thự Called Archangel của bạn đã được chấp thuận
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 py-2">
                                                <div class="media align-items-center">
                                                    <div
                                                        class="badge badge-yellow w-40px h-40 d-flex align-items-center justify-content-center fs-18 mr-3">
                                                        <svg class="icon icon-review">
                                                            <use xlink:href="#icon-review"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body">
                                                        Danh sách Biệt thự Called Archangel của bạn đã được chấp thuận
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <a class="text-heading d-block text-center mt-4" role="button">
                                            Xem thêm
                                            <span class="text-primary d-inline-block ml-2"><i
                                                    class="fal fa-angle-down"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection

@push('styleAdmin')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Dashboard</title>
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
    <link rel="icon" href="images/favicon.ico">
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
    <meta property="og:image:height" content="630">
@endpush
@push('scriptAdmin')
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
