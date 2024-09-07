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
                                                id="key-word" placeholder="Nhập từ khóa...">
                                        </div>
                                        <div class="form-group">
                                            <label for="location" class="sr-only">Tỉnh</label>
                                            <select class="form-control border-0 shadow-none form-control-lg "
                                                id="city-province" title="Tất cả thành phố" name="province"
                                                data-style="btn-lg py-2 h-52">
                                                <option value='0'>Chọn Tỉnh/Thành Phố...</option>
                                                <option value='01'>Thành phố Hà Nội</option>
                                                <option value='79'>Thành phố Hồ Chí Minh</option>
                                                <option value='31'>Thành phố Hải Phòng</option>
                                                <option value='48'>Thành phố Đà Nẵng</option>
                                                <option value='92'>Thành phố Cần Thơ</option>
                                                <option value='02'>Tỉnh Hà Giang</option>
                                                <option value='04'>Tỉnh Cao Bằng</option>
                                                <option value='06'>Tỉnh Bắc Kạn</option>
                                                <option value='08'>Tỉnh Tuyên Quang</option>
                                                <option value='10'>Tỉnh Lào Cai</option>
                                                <option value='11'>Tỉnh Điện Biên</option>
                                                <option value='12'>Tỉnh Lai Châu</option>
                                                <option value='14'>Tỉnh Sơn La</option>
                                                <option value='15'>Tỉnh Yên Bái</option>
                                                <option value='17'>Tỉnh Hoà Bình</option>
                                                <option value='19'>Tỉnh Thái Nguyên</option>
                                                <option value='20'>Tỉnh Lạng Sơn</option>
                                                <option value='22'>Tỉnh Quảng Ninh</option>
                                                <option value='24'>Tỉnh Bắc Giang</option>
                                                <option value='25'>Tỉnh Phú Thọ</option>
                                                <option value='26'>Tỉnh Vĩnh Phúc</option>
                                                <option value='27'>Tỉnh Bắc Ninh</option>
                                                <option value='30'>Tỉnh Hải Dương</option>
                                                <option value='33'>Tỉnh Hưng Yên</option>
                                                <option value='34'>Tỉnh Thái Bình</option>
                                                <option value='35'>Tỉnh Hà Nam</option>
                                                <option value='36'>Tỉnh Nam Định</option>
                                                <option value='37'>Tỉnh Ninh Bình</option>
                                                <option value='38'>Tỉnh Thanh Hóa</option>
                                                <option value='40'>Tỉnh Nghệ An</option>
                                                <option value='42'>Tỉnh Hà Tĩnh</option>
                                                <option value='44'>Tỉnh Quảng Bình</option>
                                                <option value='45'>Tỉnh Quảng Trị</option>
                                                <option value='46'>Tỉnh Thừa Thiên Huế</option>
                                                <option value='49'>Tỉnh Quảng Nam</option>
                                                <option value='51'>Tỉnh Quảng Ngãi</option>
                                                <option value='52'>Tỉnh Bình Định</option>
                                                <option value='54'>Tỉnh Phú Yên</option>
                                                <option value='56'>Tỉnh Khánh Hòa</option>
                                                <option value='58'>Tỉnh Ninh Thuận</option>
                                                <option value='60'>Tỉnh Bình Thuận</option>
                                                <option value='62'>Tỉnh Kon Tum</option>
                                                <option value='64'>Tỉnh Gia Lai</option>
                                                <option value='66'>Tỉnh Đắk Lắk</option>
                                                <option value='67'>Tỉnh Đắk Nông</option>
                                                <option value='68'>Tỉnh Lâm Đồng</option>
                                                <option value='70'>Tỉnh Bình Phước</option>
                                                <option value='72'>Tỉnh Tây Ninh</option>
                                                <option value='74'>Tỉnh Bình Dương</option>
                                                <option value='75'>Tỉnh Đồng Nai</option>
                                                <option value='77'>Tỉnh Bà Rịa - Vũng Tàu</option>
                                                <option value='80'>Tỉnh Long An</option>
                                                <option value='82'>Tỉnh Tiền Giang</option>
                                                <option value='83'>Tỉnh Bến Tre</option>
                                                <option value='84'>Tỉnh Trà Vinh</option>
                                                <option value='86'>Tỉnh Vĩnh Long</option>
                                                <option value='87'>Tỉnh Đồng Tháp</option>
                                                <option value='89'>Tỉnh An Giang</option>
                                                <option value='91'>Tỉnh Kiên Giang</option>
                                                <option value='93'>Tỉnh Hậu Giang</option>
                                                <option value='94'>Tỉnh Sóc Trăng</option>
                                                <option value='95'>Tỉnh Bạc Liêu</option>
                                                <option value='96'>Tỉnh Cà Mau</option>
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
                                                            <label class="custom-control-label" for="check1">Điều
                                                                hòa</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check2">
                                                            <label class="custom-control-label" for="check2">Giặt
                                                                ủi</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check3">
                                                            <label class="custom-control-label" for="check3">Tủ
                                                                lạnh</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check4">
                                                            <label class="custom-control-label" for="check4">Máy
                                                                giặt</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check5">
                                                            <label class="custom-control-label" for="check5">Đồ
                                                                nướng</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check6">
                                                            <label class="custom-control-label" for="check6">Bãi
                                                                cỏ</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check7">
                                                            <label class="custom-control-label" for="check7">Xông
                                                                hơi</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check8">
                                                            <label class="custom-control-label"
                                                                for="check8">WiFi</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check9">
                                                            <label class="custom-control-label" for="check9">Máy
                                                                sấy</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check10">
                                                            <label class="custom-control-label" for="check10">Lò vi
                                                                sóng</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check11">
                                                            <label class="custom-control-label" for="check11">Hồ
                                                                bơi</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check12">
                                                            <label class="custom-control-label" for="check12">Tấm che cửa
                                                                sổ</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check13">
                                                            <label class="custom-control-label" for="check13">Gym</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check14">
                                                            <label class="custom-control-label" for="check14">Vòi sen
                                                                ngoài trời</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pt-0 pb-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="check15">
                                                            <label class="custom-control-label" for="check15">TV Cáp
                                                                truyền hình</label>
                                                        </div>
                                                    </li>
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
                                        @foreach ($rooms as $room)
                                            <div class="box px-0">
                                                <div class="card border-0">
                                                    @if ($room->images->isNotEmpty())
                                                        @php
                                                            // Get the first image
                                                            $image = $room->images->first();
                                                        @endphp
                                                        <img src="{{ asset('assets/images/' . $image->filename) }}"
                                                            alt="{{ $room->title }}">
                                                    @else
                                                        <img src="{{ asset('assets/images/properties-grid-01.jpg') }}"
                                                            alt="{{ $room->title }}">
                                                    @endif
                                                    <div
                                                        class="card-img-overlay d-flex flex-column bg-gradient-3 rounded-lg">
                                                        <div class="d-flex mb-auto">
                                                            <a href="#" class="mr-1 badge badge-orange">Nổi bật</a>
                                                            <a href="#" class="badge badge-indigo">Cho thuê</a>
                                                        </div>
                                                        <div class="px-2 pb-2">
                                                            <a href="single-property-1.html" class="text-white">
                                                                <h5 class="card-title fs-16 lh-2 mb-0">{{ $room->title }}
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
                            <div class="card">
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
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-8 mb-lg-0 order-1 order-lg-2">
                        <div class="row align-items-sm-center mb-6">
                            <div class="col-md-6">
                                <h2 class="fs-15 text-dark mb-0">Chúng tôi đã tìm thấy <span
                                        class="text-primary">{{ $rooms->total() }}</span>
                                    phòng trọ dành cho bạn
                                </h2>
                            </div>
                            <div class="col-md-6 mt-6 mt-md-0">
                                <div class="d-flex justify-content-md-end align-items-center">
                                    <div class="input-group border rounded input-group-lg w-auto bg-white mr-3">
                                        <label
                                            class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3"
                                            for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>SẮP
                                            XẾP:</label>
                                        <select
                                            class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby"
                                            data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3"
                                            id="inputGroupSelect01" name="sortby">
                                            <option selected>Bán chạy nhất</option>
                                            <option value="1">Được xem nhiều nhất</option>
                                            <option value="2">Giá (thấp đến cao)</option>
                                            <option value="3">Giá (cao đến thấp)</option>
                                        </select>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <a class="fs-sm-18 text-dark opacity-2" href="listing-with-left-filter.html">
                                            <i class="fas fa-list"></i>
                                        </a>
                                        <a class="fs-sm-18 text-dark ml-5" href="#">
                                            <i class="fa fa-th-large"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($rooms->isNotEmpty())
                                @foreach ($rooms as $room)
                                    <div class="col-md-6 mb-6">
                                        <div class="card border-0" data-animate="fadeInUp">
                                            <div
                                                class="position-relative hover-change-image bg-hover-overlay rounded-lg card-img">
                                                @if ($room->images->isNotEmpty())
                                                    @php
                                                        // Get the first image
                                                        $image = $room->images->first();
                                                    @endphp
                                                    <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}">
                                                        <img src="{{ asset('assets/images/' . $image->filename) }}"
                                                            alt="{{ $room->title }}">
                                                    </a>
                                                @else
                                                    <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}">
                                                        <img src="{{ asset('assets/images/properties-grid-01.jpg') }}"
                                                            alt="{{ $room->title }}">
                                                    </a>
                                                @endif
                                                <div class="card-img-overlay d-flex flex-column">
                                                    <div><span class="badge badge-primary">Cần Bán</span></div>
                                                    <div class="mt-auto d-flex hover-image">
                                                        <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                            <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                                title="9 Images">
                                                                <a href="#" class="text-white hover-primary">
                                                                    <i class="far fa-images"></i><span
                                                                        class="pl-1">9</span>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item" data-toggle="tooltip"
                                                                title="2 Video">
                                                                <a href="#" class="text-white hover-primary">
                                                                    <i class="far fa-play-circle"></i><span
                                                                        class="pl-1">2</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                            <li class="list-inline-item mr-3 h-32" data-toggle="tooltip"
                                                                title="Wishlist">
                                                                <a href="{{ route('client.add.favourite', ['slug' => $room->slug]) }}"
                                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center">
                                                                    <i class="fas fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item mr-3 h-32" data-toggle="tooltip"
                                                                title="Compare">
                                                                <a href="#" class="text-white fs-20 hover-primary">
                                                                    <i class="fas fa-exchange-alt"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-3 px-0 pb-1">
                                                <h2 class="fs-16 mb-1">
                                                    <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}"
                                                        class="text-dark hover-primary">
                                                        {{ $room->title }}
                                                    </a>
                                                </h2>
                                                <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}">
                                                    <p class="font-weight-500 text-gray-light mb-0">{{ $room->address }}
                                                    </p>
                                                </a>
                                                <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}">
                                                    <p class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                        {{ $room->price }} VND
                                                    </p>
                                                </a>
                                            </div>
                                            <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                        data-toggle="tooltip" title="3 Giường">
                                                        <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                            <use xlink:href="#icon-bedroom"></use>
                                                        </svg>
                                                        3 Giường
                                                    </li>
                                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                        data-toggle="tooltip" title="3 Phòng tắm">
                                                        <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                            <use xlink:href="#icon-shower"></use>
                                                        </svg>
                                                        3 Phòng tắm
                                                    </li>
                                                    <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                        data-toggle="tooltip" title="Mét vuông">
                                                        <svg class="icon icon-square fs-18 text-primary mr-1">
                                                            <use xlink:href="#icon-square"></use>
                                                        </svg>
                                                        200 m²
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-center">Không có dữ liệu.</p>
                                </div>
                            @endif

                        </div>
                        @if ($rooms->hasPages())
                            <nav class="pt-4">
                                <ul class="pagination rounded-active justify-content-center">
                                    {{-- Trang trước --}}
                                    <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $rooms->previousPageUrl() }}"><i
                                                class="far fa-angle-double-left"></i></a>
                                    </li>

                                    {{-- Trang đầu tiên --}}
                                    @if ($rooms->currentPage() > 2)
                                        <li class="page-item"><a class="page-link" href="{{ $rooms->url(1) }}">1</a>
                                        </li>
                                    @endif

                                    {{-- Dấu ba chấm ở đầu nếu cần --}}
                                    @if ($rooms->currentPage() > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif

                                    {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                                    @for ($i = max(1, $rooms->currentPage() - 1); $i <= min($rooms->currentPage() + 1, $rooms->lastPage()); $i++)
                                        <li class="page-item {{ $rooms->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $rooms->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    {{-- Dấu ba chấm ở cuối nếu cần --}}
                                    @if ($rooms->currentPage() < $rooms->lastPage() - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif

                                    {{-- Trang cuối cùng --}}
                                    @if ($rooms->currentPage() < $rooms->lastPage() - 1)
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $rooms->url($rooms->lastPage()) }}">{{ $rooms->lastPage() }}</a>
                                        </li>
                                    @endif

                                    {{-- Trang tiếp theo --}}
                                    <li
                                        class="page-item {{ $rooms->currentPage() == $rooms->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $rooms->nextPageUrl() }}"><i
                                                class="far fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <div id="compare" class="compare">
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
        </div>
    </main>

@endsection

@push('styleUs')
    <meta charset="utf-8">
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{ asset('assets/js/api-country-vn-nht.js') }}"></script>
@endpush
