@extends('layouts.main')
@section('titleUs', 'Danh Sách Trọ | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="pb-8 page-title shadow">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Danh sách phòng trọ</li>
                    </ol>
                    {{-- <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">Listing Grid With Left Filter</h1> --}}
                </nav>
            </div>
        </section>
        <section class="pt-8 pb-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 order-2 order-lg-1 primary-sidebar sidebar-sticky" id="sidebar">
                        <div class="primary-sidebar-inner">
                            <div class="card mb-4">
                                <div class="card-body px-6 py-4">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Tìm trọ của bạn</h4>
                                    <form>
                                        <div class="form-group">
                                            <label for="key-word" class="sr-only">Từ khóa tìm kiếm...</label>
                                            <input type="search" class="form-control form-control-lg border-0 shadow-none"
                                                id="key-word" name="search" placeholder="Nhập từ khóa...">
                                        </div>
                                        <div class="form-group">
                                            <label for="location" class="sr-only">Tỉnh</label>
                                            <select class="form-control border-0 shadow-none form-control-lg"
                                                    id="city-province" title="Tất cả thành phố" name="province"
                                                    data-style="btn-lg py-2 h-52">
                                                <option value='0'>Chọn Tỉnh/Thành Phố...</option>
                                                @foreach([
                                                    '01' => 'Thành phố Hà Nội',
                                                    '79' => 'Thành phố Hồ Chí Minh',
                                                    '31' => 'Thành phố Hải Phòng',
                                                    '48' => 'Thành phố Đà Nẵng',
                                                    '92' => 'Thành phố Cần Thơ',
                                                    '02' => 'Tỉnh Hà Giang',
                                                    '04' => 'Tỉnh Cao Bằng',
                                                    '06' => 'Tỉnh Bắc Kạn',
                                                    '08' => 'Tỉnh Tuyên Quang',
                                                    '10' => 'Tỉnh Lào Cai',
                                                    '11' => 'Tỉnh Điện Biên',
                                                    '12' => 'Tỉnh Lai Châu',
                                                    '14' => 'Tỉnh Sơn La',
                                                    '15' => 'Tỉnh Yên Bái',
                                                    '17' => 'Tỉnh Hoà Bình',
                                                    '19' => 'Tỉnh Thái Nguyên',
                                                    '20' => 'Tỉnh Lạng Sơn',
                                                    '22' => 'Tỉnh Quảng Ninh',
                                                    '24' => 'Tỉnh Bắc Giang',
                                                    '25' => 'Tỉnh Phú Thọ',
                                                    '26' => 'Tỉnh Vĩnh Phúc',
                                                    '27' => 'Tỉnh Bắc Ninh',
                                                    '30' => 'Tỉnh Hải Dương',
                                                    '33' => 'Tỉnh Hưng Yên',
                                                    '34' => 'Tỉnh Thái Bình',
                                                    '35' => 'Tỉnh Hà Nam',
                                                    '36' => 'Tỉnh Nam Định',
                                                    '37' => 'Tỉnh Ninh Bình',
                                                    '38' => 'Tỉnh Thanh Hóa',
                                                    '40' => 'Tỉnh Nghệ An',
                                                    '42' => 'Tỉnh Hà Tĩnh',
                                                    '44' => 'Tỉnh Quảng Bình',
                                                    '45' => 'Tỉnh Quảng Trị',
                                                    '46' => 'Tỉnh Thừa Thiên Huế',
                                                    '49' => 'Tỉnh Quảng Nam',
                                                    '51' => 'Tỉnh Quảng Ngãi',
                                                    '52' => 'Tỉnh Bình Định',
                                                    '54' => 'Tỉnh Phú Yên',
                                                    '56' => 'Tỉnh Khánh Hòa',
                                                    '58' => 'Tỉnh Ninh Thuận',
                                                    '60' => 'Tỉnh Bình Thuận',
                                                    '62' => 'Tỉnh Kon Tum',
                                                    '64' => 'Tỉnh Gia Lai',
                                                    '66' => 'Tỉnh Đắk Lắk',
                                                    '67' => 'Tỉnh Đắk Nông',
                                                    '68' => 'Tỉnh Lâm Đồng',
                                                    '70' => 'Tỉnh Bình Phước',
                                                    '72' => 'Tỉnh Tây Ninh',
                                                    '74' => 'Tỉnh Bình Dương',
                                                    '75' => 'Tỉnh Đồng Nai',
                                                    '77' => 'Tỉnh Bà Rịa - Vũng Tàu',
                                                    '80' => 'Tỉnh Long An',
                                                    '82' => 'Tỉnh Tiền Giang',
                                                    '83' => 'Tỉnh Bến Tre',
                                                    '84' => 'Tỉnh Trà Vinh',
                                                    '86' => 'Tỉnh Vĩnh Long',
                                                    '87' => 'Tỉnh Đồng Tháp',
                                                    '89' => 'Tỉnh An Giang',
                                                    '91' => 'Tỉnh Kiên Giang',
                                                    '93' => 'Tỉnh Hậu Giang',
                                                    '94' => 'Tỉnh Sóc Trăng',
                                                    '95' => 'Tỉnh Bạc Liêu',
                                                    '96' => 'Tỉnh Cà Mau'
                                                ] as $code => $name)
                                                    @if(in_array($code, $provinces))
                                                        <option value='{{ $code }}' {{ $province == $code ? 'selected' : '' }}>{{ $name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="location" class="sr-only">Huyện</label>
                                            <select class="form-control border-0 shadow-none form-control-lg "
                                                id="district-town" name="district" title="Vị trí"
                                                data-style="btn-lg py-2 h-52" id="location">
                                                <option value="0">Chọn Quận/Huyện...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="location" class="sr-only">Xã</label>
                                            <select class="form-control border-0 shadow-none form-control-lg "
                                                id="ward-commune" name="village" title="Vị trí"
                                                data-style="btn-lg py-2 h-52" id="location">
                                                <option value="0">Chọn Xã/Phường...</option>
                                            </select>
                                        </div>



                                        <a class="lh-17 d-inline-block" data-toggle="collapse" href="#other-feature"
                                            role="button" aria-expanded="false" aria-controls="other-feature">
                                            <span class="text-primary d-inline-block mr-1"><i
                                                    class="far fa-plus-square"></i></span>
                                            <span class="fs-15 text-heading font-weight-500 hover-primary">Các tính năng
                                                khác</span>
                                        </a>
                                        <div class="collapse" id="other-feature">
                                            <div class="card card-body border-0 px-0 pb-0 pt-3">
                                                <ul class="list-group list-group-no-border">
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check1">
                                                            <label class="custom-control-label"
                                                                for="check1">Wifi</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check2">
                                                            <label class="custom-control-label" for="check2">Máy điều
                                                                hòa</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check3">
                                                            <label class="custom-control-label" for="check3">Phòng
                                                                tắm</label>
                                                        </div>
                                                    </li>
                                                    {{-- <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check4">
                                                            <label class="custom-control-label" for="check4">Máy
                                                                giặt</label>
                                                        </div>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary btn-lg btn-block shadow-none mt-4">Tìm kiếm
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card property-widget mb-4">
                                <div class="card-body px-6 pt-5 pb-6">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Tin nổi bật</h4>
                                    <div class="slick-slider mx-0"
                                        data-slick-options='{"slidesToShow": 1, "autoplay":true}'>
                                        @foreach ($rooms ?? [] as $room)
                                            <div class="box px-0">
                                                <div class="card border-0">
                                                    @if ($room->images->isNotEmpty())
                                                        @php
                                                            // Get the first image
                                                            $image = $room->images->first();
                                                        @endphp
                                                        <img src="{{ asset('assets/images/' . $image->filename) }}"
                                                            alt="{{ $room->title }}" class="property-image">
                                                    @else
                                                        <img src="{{ asset('assets/images/properties-grid-01.jpg') }}"
                                                            alt="{{ $room->title }}" class="property-image">
                                                    @endif
                                                    <div
                                                        class="card-img-overlay d-flex flex-column bg-gradient-3 rounded-lg">
                                                        <div class="d-flex mb-auto">
                                                            <a href="#" class="mr-1 badge badge-orange">Nổi bật</a>
                                                            <a href="#" class="badge badge-indigo">Cho thuê</a>
                                                        </div>
                                                        <div class="px-2 pb-2">
                                                            <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}"
                                                                class="text-white">
                                                                <h5 class="card-title fs-16 lh-2 mb-0">
                                                                    <small>{{ $room->title }}</small>
                                                                </h5>
                                                            </a>
                                                            <p class="card-text text-gray-light mb-0 font-weight-500">
                                                                {{ $room->address }}</p>
                                                            <p class="text-white mb-0"><span
                                                                    class="fs-17 font-weight-bold">{{ $room->price }}VND</span>/tháng
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card">
                                <div class="card-body px-6 py-4">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Bài viết mới nhất</h4>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0 pt-0 pb-3">
                                            <div class="media">
                                                <div class="position-relative mr-3">
                                                    <a href="blog-details-1.html"
                                                        class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                                        style="background-image: url('images/post-02.jpg')">
                                                    </a>
                                                    <a href="blog-grid-with-sidebar.html"
                                                        class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                                                        Sáng tạo
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="fs-14 lh-186 mb-1">
                                                        <a href="blog-details-1.html" class="text-dark hover-primary">
                                                            Các ngân hàng bán lẻ thức tỉnh cho vay kỹ thuật số trong năm nay
                                                        </a>
                                                    </h4>
                                                    <div class="text-gray-light">
                                                        16 Tháng 12 2023
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item px-0 pt-0 pb-3">
                                            <div class="media">
                                                <div class="position-relative mr-3">
                                                    <a href="blog-details-1.html"
                                                        class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                                        style="background-image: url('images/post-02.jpg')">
                                                    </a>
                                                    <a href="blog-grid-with-sidebar.html"
                                                        class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                                                        Sáng tạo
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="fs-14 lh-186 mb-1">
                                                        <a href="blog-details-1.html" class="text-dark hover-primary">
                                                            Các ngân hàng bán lẻ thức tỉnh cho vay kỹ thuật số trong năm nay
                                                        </a>
                                                    </h4>
                                                    <div class="text-gray-light">
                                                        16 Tháng 12 2023
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item px-0 pt-0 pb-3">
                                            <div class="media">
                                                <div class="position-relative mr-3">
                                                    <a href="blog-details-1.html"
                                                        class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                                        style="background-image: url('images/post-02.jpg')">
                                                    </a>
                                                    <a href="blog-grid-with-sidebar.html"
                                                        class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                                                        Sáng tạo
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="fs-14 lh-186 mb-1">
                                                        <a href="blog-details-1.html" class="text-dark hover-primary">
                                                            Các ngân hàng bán lẻ thức tỉnh cho vay kỹ thuật số trong năm nay
                                                        </a>
                                                    </h4>
                                                    <div class="text-gray-light">
                                                        16 Tháng 12 2023
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-8 mb-8 mb-lg-0 order-1 order-lg-2">

                        @livewire('list-room-client')

                        {{-- @if ($rooms->hasPages())
                            <nav class="pt-4">
                                <ul class="pagination rounded-active justify-content-center">
                                    <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $rooms->previousPageUrl() }}"><i
                                                class="far fa-angle-double-left"></i></a>
                                    </li>
                                    @if ($rooms->currentPage() > 2)
                                        <li class="page-item"><a class="page-link" href="{{ $rooms->url(1) }}">1</a>
                                        </li>
                                    @endif
                                    @if ($rooms->currentPage() > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    @for ($i = max(1, $rooms->currentPage() - 1); $i <= min($rooms->currentPage() + 1, $rooms->lastPage()); $i++)
                                        <li class="page-item {{ $rooms->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $rooms->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($rooms->currentPage() < $rooms->lastPage() - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    @if ($rooms->currentPage() < $rooms->lastPage() - 1)
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $rooms->url($rooms->lastPage()) }}">{{ $rooms->lastPage() }}</a>
                                        </li>
                                    @endif
                                    <li
                                        class="page-item {{ $rooms->currentPage() == $rooms->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $rooms->nextPageUrl() }}"><i
                                                class="far fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        @endif --}}
                    </div>
                </div>
            </div>
        </section>
        {{-- <div id="compare" class="compare">
            <button
                class="btn shadow btn-open bg-white bg-hover-accent text-secondary rounded-right-0 d-flex justify-content-center align-items-center w-30px h-140 p-0">
            </button>
            <div class="list-group list-group-no-border bg-dark py-3">
                <a href="#" class="list-group-item bg-transparent text-white fs-22 text-center py-0">
                    <i class="far fa-bars"></i>
                </a>
                <div class="list-group-item card bg-transparent">
                    <div class="position-relative hover-change-image bg-hover-overlay">
                        <img src="{{ asset('assets/images/compare-01.jpg') }}" class="card-img" alt="properties">
                        <div class="card-img-overlay">
                            <a href="#"
                                class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i
                                    class="fal fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item card bg-transparent">
                    <div class="position-relative hover-change-image bg-hover-overlay">
                        <img src="{{ asset('assets/images/compare-02.jpg') }}" class="card-img" alt="properties">
                        <div class="card-img-overlay">
                            <a href="#"
                                class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i
                                    class="fal fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item card card bg-transparent">
                    <div class="position-relative hover-change-image bg-hover-overlay ">
                        <img src="{{ asset('assets/images/compare-03.jpg') }}" class="card-img" alt="properties">
                        <div class="card-img-overlay">
                            <a href="#"
                                class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i
                                    class="fal fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item bg-transparent">
                    <a href="compare-details.html"
                        class="btn btn-lg btn-primary w-100 px-0 d-flex justify-content-center">
                        So sánh
                    </a>
                </div>
            </div>
        </div> --}}
    </main>
    {{-- @livewire('list-room-client') --}}
@endsection

@push('styleUs')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Danh Sách Trọ | TRỌ NHANH</title>
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
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="home-01.html">
    <meta property="og:title" content="Home 01">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Khám phá danh sách trọ cập nhật nhất trên TRỌ NHANH. Tìm phòng trọ, nhà trọ với thông tin chi tiết, hình ảnh, giá cả hợp lý và vị trí thuận tiện.">
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
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TronNhanh">
    <meta name="twitter:creator" content="@TronNhanh">
    <meta name="twitter:title" content="Danh Sách Trọ | TRỌ NHANH">
    <meta name="twitter:description"
        content="Khám phá các tin đăng phòng trọ, nhà trọ giá tốt tại TRỌ NHANH. Phòng trọ chất lượng, dễ tìm kiếm và thông tin đầy đủ.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url('/danh-sach-tro') }}">
    <meta property="og:title" content="Danh Sách Trọ | TRỌ NHANH">
    <meta property="og:description"
        content="Khám phá danh sách phòng trọ, nhà trọ với giá cả hợp lý, thông tin chi tiết và vị trí thuận tiện. Hãy tìm trọ phù hợp với nhu cầu của bạn tại TRỌ NHANH.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="stylesheet" href="{{ asset('assets/css/css-nht.css') }}">
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var districts = @json($districts);
        var villages = @json($villages);
    </script>
    <script src="{{ asset('assets/js/search-api-vn.js') }}"></script>
    <script src="{{ asset('assets/js/yeuthich.js') }}"></script>
@endpush
