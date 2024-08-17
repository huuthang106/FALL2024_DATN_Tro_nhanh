@extends('layouts.main')
@section('titleUs', 'Danh Sách Người Đăng Tin | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="position-relative pb-15 pt-2 page-title bg-patten bg-secondary">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-light mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Người đăng tin</li>
                    </ol>
                </nav>
                <h1 class="fs-32 mb-0 text-white font-weight-600 text-center pt-11 mb-5 lh-17 mxw-478"
                    data-animate="fadeInDown">Gặp Gỡ Những Người Đăng Tin Trọ Đang Thay Đổi Thị Trường Cho Thuê Phòng Trọ
                </h1>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="mt-n8 bg-white px-6 py-3 shadow-sm-2 rounded-lg form-search-02 position-relative z-index-3">
                    <form class="d-none row d-md-flex flex-wrap align-items-center">
                        <div class="col-md-5 mb-3 mb-md-0">
                            <div class="row">
                                <div class="form-group mb-3 mb-md-0 col-md-6">
                                    <label for="language" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Ngôn
                                        ngữ</label>
                                    <select
                                        class="form-control form-control-sm font-weight-600  shadow-0 bg-white selectpicker"
                                        name="language" id="language" data-style="bg-white pl-0 text-dark rounded-0">
                                        <option>Chọn</option>
                                        <option>Tiếng Việt</option>
                                        <option>English</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 mb-md-0 col-md-6">
                                    <label for="region" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Khu
                                        vực</label>
                                    <select class="form-control font-weight-600 pl-0 bg-white selectpicker form-control-sm"
                                        name="region" id="region" data-style="bg-white pl-0 text-dark rounded-0">
                                        <option>Hà Nội</option>
                                        <option>TP. Hồ Chí Minh</option>
                                        <option>Đà Nẵng</option>
                                        <option>Hải Phòng</option>
                                        <option>Cần Thơ</option>
                                        <option>Nha Trang</option>
                                        <option>Huế</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 mb-lg-0 col-md-5">
                            <label for="search" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Tìm kiếm</label>
                            <div class="input-group input-group-sm">
                                <input type="text" id="search" class="form-control pl-0 rounded-0 bg-white"
                                    placeholder="Tìm kiếm theo tên người đăng tin…" name="search">
                                <div class="input-group-append ml-0">
                                    <span class="fs-18 input-group-text bg-white rounded-0"><i
                                            class="fal fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 pl-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Tìm kiếm
                            </button>
                        </div>
                    </form>
                    <form class="d-block d-md-none">
                        <div class="d-flex align-items-center">
                            <a class="text-body hover-primary d-inline-block fs-24 lh-1 mr-5" data-toggle="collapse"
                                href="#collapseMobileSearch" role="button" aria-expanded="false"
                                aria-controls="collapseMobileSearch">
                                <i class="fal fa-cog"></i>
                            </a>
                            <div class="input-group">
                                <input type="text" class="form-control pl-0 rounded-0 bg-white"
                                    placeholder="Tìm kiếm theo tên người đăng tin…" name="search">
                                <div class="input-group-append ml-0">
                                    <span class="fs-18 input-group-text bg-white rounded-0"><i
                                            class="fal fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="collapseMobileSearch">
                            <div class="card card-body border-0 px-0">
                                <div class="form-group mb-3">
                                    <label for="language-01" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Ngôn
                                        ngữ</label>
                                    <select
                                        class="form-control form-control-sm font-weight-600  shadow-0 bg-white selectpicker"
                                        name="language" id="language-01" data-style="bg-white pl-0 text-dark rounded-0">
                                        <option>Chọn</option>
                                        <option>Tiếng Việt</option>
                                        <option>English</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="region-01" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Khu
                                        vực</label>
                                    <select class="form-control font-weight-600 pl-0 bg-white selectpicker form-control-sm"
                                        name="region" id="region-01" data-style="bg-white pl-0 text-dark rounded-0">
                                        <option>Hà Nội</option>
                                        <option>TP. Hồ Chí Minh</option>
                                        <option>Đà Nẵng</option>
                                        <option>Hải Phòng</option>
                                        <option>Cần Thơ</option>
                                        <option>Nha Trang</option>
                                        <option>Huế</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="pt-12 pb-14">
            <div class="container">
                <div class="row align-items-sm-center mb-8">
                    <div class="col-sm-6 mb-6 mb-sm-0">
                        <span class="text-primary">{{ $users->total() }}</span> người đăng tin trọ cho bạn

                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="input-group border rounded input-group-lg w-auto mr-3">
                                <label
                                    class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3"
                                    for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>SẮP XẾP:</label>
                                <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker"
                                    data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0" id="inputGroupSelect01"
                                    name="sortby">
                                    <option selected>Tùy chọn</option>
                                    <option value="1">Ngẫu nhiên</option>
                                    <option value="1">Đánh giá</option>
                                    <option value="1">Số lượng phòng trọ</option>
                                </select>
                            </div>
                            <div class="d-none d-md-block list-layout">
                                <a class="fs-sm-18 text-muted" href="agents-list.html">
                                    <i class="fas fa-list"></i>
                                </a>
                                <span class="fs-sm-18 text-muted ml-5 active">
                                    <i class="fa fa-th-large"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($users as $item)
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card border-0 hover-change-image">
                                <div class="position-relative card-img-top">
                                    <a href="#">
                                        @if ($item->image)
                                            <img src="{{ asset('assets/images/' . $item->image) }}" alt="{{ $item->name }}">
                                        @else
                                            <img src="{{ asset('assets/images/agent-25.jpg') }}" alt="{{ $item->name }}">
                                        @endif
                                    </a>
                                    
                                    
                                    <div
                                        class="card-img-overlay bg-dark-opacity-06 hover-image d-flex flex-column rounded-lg p-4">
                                        <div class="mt-auto">
                                            <a href="tel:{{ $item->phone }}" class="text-white">
                                                <span class="text-primary"><i class="fal fa-phone"></i></span>
                                                <span class="d-inline-block ml-2">{{ $item->phone }}</span>
                                            </a>
                                            <a href="mailto:{{ $item->email }}"
                                                class="d-block text-center text-white">{{ $item->email }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-2 px-0">
                                    <a href="{{ route('client.client-agent-detail', ['slug' => $item->slug]) }}"
                                        class="card-title d-block fs-16 lh-214 text-dark font-weight-500 hover-primary mb-0">
                                        {{ $item->name }}
                                    </a>



                                    <p class="mb-3 card-text">Người đăng tin từ <a href="#"
                                            class="text-body"><u>Trọ Nhanh</u></a></p>
                                    <ul class="list-inline text-gray-lighter m-0">
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-32px h-32 rounded-lg bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-32px h-32 rounded-lg bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-32px h-32 rounded-lg bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-32px h-32 rounded-lg bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                

                <nav class="mt-4">
                    <ul class="pagination rounded-active justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($users->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link"><i class="far fa-angle-double-left"></i></span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->previousPageUrl() }}"><i
                                        class="far fa-angle-double-left"></i></a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                            @if ($page == $users->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($users->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->nextPageUrl() }}"><i
                                        class="far fa-angle-double-right"></i></a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link"><i class="far fa-angle-double-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </nav>

                <div class="text-center mt-2"> {{ $users->firstItem() }}-{{ $users->lastItem() }} trên
                    {{ $users->total() }} Kết quả</div>
            </div>
        </section>
        <section class="pt-12 pb-11 bg-overlay-secondary bg-img-cover-center"
            style="background-image: url('{{ asset('assets/images/BG3.jpg') }}');">
            <div class="container position-relative z-index-2 text-center text-white">
                <p class="fs-18 font-weight-bold text-uppercase lh-143 letter-spacing-5 mb-3 mt-1">Trở thành</p>
                <h2 class="fs-30 fs-lg-48 lh-13 font-weight-normal mb-7 text-white">Người Đăng Tin Cho Thuê Phòng Trọ</h2>
                <a href="#" class="btn btn-lg btn-primary px-9 mb-1">Đăng Ký</a>
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
    <title>Danh Sách Người Đăng Tin | TRỌ NHANH</title>
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
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
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
