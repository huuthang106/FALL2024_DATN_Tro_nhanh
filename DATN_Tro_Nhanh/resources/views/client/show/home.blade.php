@extends('layouts.main')
@section('titleUs', 'Trang Chủ | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="d-flex flex-column">
            <div style="background-image: url('{{ asset('assets/images/bg-home-01.jpg') }}')"
                class="bg-cover d-flex align-items-center custom-vh-100">
                <div class="container pt-lg-15 py-8" data-animate="zoomIn">
                    <p class="text-white fs-md-22 fs-18 font-weight-500 letter-spacing-367 mb-6 text-center text-uppercase">
                        Xu hướng tìm nơi ở 2024</p>
                    <h2 class="text-white display-2 text-center mb-sm-13 mb-8">Trọ Nhanh công cụ hữu ích cho bạn</h2>
                    <form action="{{ route('client.room-listing') }}" method="GET"
                        class="property-search py-lg-0 z-index-2 position-relative d-none d-lg-block">
                        <div class="row no-gutters">
                            <div class="col-md-5 col-lg-4 col-xl-3">
                                <input class="search-field" type="hidden" name="status" value="for-sale"
                                    data-default-value="">
                                <ul class="nav nav-pills property-search-status-tab">
                                    {{-- <li class="nav-item bg-secondary rounded-top" role="presentation">
                                                <a href="#" role="tab" aria-selected="true"
                                                    class="nav-link btn shadow-none rounded-bottom-0 text-white text-btn-focus-secondary text-uppercase d-flex align-items-center fs-13 rounded-bottom-0 bg-active-white text-active-secondary letter-spacing-087 flex-md-1 px-4 py-2 "
                                                    data-toggle="pill" data-value="for-sale">
                                                    <svg class="icon icon-villa fs-22 mr-2">
                                                        <use xlink:href="#icon-villa"></use>
                                                    </svg>
                                                    Phòng
                                                </a>
                                            </li> --}}
                                    {{-- <li class="nav-item bg-secondary rounded-top" role="presentation">
                                                <a href="#" role="tab" aria-selected="true"
                                                    class="nav-link btn shadow-none rounded-bottom-0 text-white text-btn-focus-secondary text-uppercase d-flex align-items-center fs-13 rounded-bottom-0 bg-active-white text-active-secondary letter-spacing-087 flex-md-1 px-4 py-2"
                                                    data-toggle="pill" data-value="for-rent">
                                                    <svg class="icon icon-building fs-22 mr-2">
                                                        <use xlink:href="#icon-building"></use>
                                                    </svg>
                                                    Cho thuê
                                               </a>
                                            </li>  --}}
                                </ul>
                            </div>
                        </div>
                        <div class="bg-white px-6 rounded-bottom rounded-top-right pb-6 pb-lg-0">
                            <div class="row align-items-center" id="accordion-4">
                                <div class="col-md-6 col-lg-3 col-xl-3 pt-6 pt-lg-0 order-1">
                                    <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Loại phòng</label>
                                    <select
                                        class="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input"
                                        title="Chọn" data-style="p-0 h-24 lh-17 text-dark" name="category">
                                        <option value="">Tất cả loại phòng</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-5 pt-6 pt-lg-0 order-2">
                                    <label class="text-uppercase font-weight-500 letter-spacing-093">Tìm kiếm</label>
                                    <div class="position-relative">
                                        <input type="text" name="search"
                                            class="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 pl-0 pr-4 font-weight-600 border-color-input placeholder-muted"
                                            placeholder="Tìm kiếm...">
                                        <i
                                            class="far fa-search position-absolute pos-fixed-right-center pr-0 fs-18 mt-n3"></i>
                                    </div>
                                </div>
                                <div class="col-sm pr-lg-0 pt-6 pt-lg-0 order-3">
                                    <a href="#advanced-search-filters-4"
                                        class="btn advanced-search btn-accent h-lg-100 w-100 shadow-none text-secondary rounded-0 fs-14 fs-sm-16 font-weight-600 text-left d-flex align-items-center collapsed"
                                        data-toggle="collapse" data-target="#advanced-search-filters-4" aria-expanded="true"
                                        aria-controls="advanced-search-filters-4">
                                        Tìm kiếm nâng cao
                                    </a>
                                </div>
                                <div class="col-sm pt-6 pt-lg-0 order-sm-4 order-5">
                                    <button type="submit"
                                        class="btn btn-primary shadow-none fs-16 font-weight-600 w-100 py-lg-2 lh-213">
                                        Tìm kiếm
                                    </button>
                                </div>
                                <div id="advanced-search-filters-4" class="col-12 pt-4 pb-sm-4 order-sm-5 order-4 collapse"
                                    data-parent="#accordion-4">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-3 pt-6">
                                            <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Tất cả
                                                thành phố</label>
                                            <select
                                                class="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input"
                                                id="city-province" title="Tất cả thành phố" name="province"
                                                data-style="p-0 h-24 lh-17 text-dark">
                                                <option value='0'>Chọn Tỉnh/Thành Phố...</option>
                                                @foreach ([
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
            '96' => 'Tỉnh Cà Mau',
        ] as $code => $name)
                                                    @if (in_array($code, $provinces))
                                                        <option value='{{ $code }}'
                                                            {{ $province == $code ? 'selected' : '' }}>{{ $name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 pt-6">
                                            <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Tất cả
                                                quận/huyện</label>
                                            <select
                                                class="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input"
                                                id="district-town" name="district" title="Tất cả khu vực"
                                                data-style="p-0 h-24 lh-17 text-dark" id="location">
                                                <option value="0">Chọn Quận/Huyện...</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 pt-6">
                                            <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Tất cả
                                                xã/phường</label>
                                            <select
                                                class="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input"
                                                id="ward-commune" name="village" title="Tất cả khu vực"
                                                data-style="p-0 h-24 lh-17 text-dark" id="location">
                                                <option value="0">Chọn Xã/Phường...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('client.room-listing') }}" method="GET"
                        class="property-search property-search-mobile d-lg-none z-index-2 position-relative bg-white rounded mx-md-10">
                        <div class="row align-items-lg-center" id="accordion-4-mobile">
                            <div class="col-12">
                                <div class="form-group mb-0 position-relative">
                                    <a href="#advanced-search-filters-4-mobile"
                                        class="text-secondary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed"
                                        data-toggle="collapse" data-target="#advanced-search-filters-4-mobile"
                                        aria-expanded="true" aria-controls="advanced-search-filters-4-mobile">
                                    </a>
                                    <input type="text"
                                        class="form-control form-control-lg border shadow-none pr-9 pl-11 bg-white placeholder-muted"
                                        name="search" placeholder="Tìm kiếm...">
                                    <button type="submit"
                                        class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left">
                                        <i class="far fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="advanced-search-filters-4-mobile" class="col-12 pt-2 px-7 collapse"
                                data-parent="#accordion-4-mobile">
                                <div class="row mx-n2">
                                    {{-- <div class="col-sm-6 pt-4 px-2">
                                        <select
                                            class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            name="bedroom" title="Phòng ngủ"
                                            data-style="btn-lg py-2 h-52 bg-transparent">
                                            <option>Tất cả phòng ngủ</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select>
                                    </div> --}}
                                    <div class="col-sm-6 pt-4 px-2">
                                        {{-- <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Tất cả
                                            thành phố</label> --}}
                                        <select
                                            class="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input"
                                            id="city-province02" title="Tất cả thành phố" name="province"
                                            data-style="p-0 h-24 lh-17 text-dark">
                                            <option value='0'>Chọn Tỉnh/Thành Phố...</option>
                                            @foreach ([
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
            '96' => 'Tỉnh Cà Mau',
        ] as $code => $name)
                                                @if (in_array($code, $provinces))
                                                    <option value='{{ $code }}'
                                                        {{ $province == $code ? 'selected' : '' }}>{{ $name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
                                        {{-- <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Tất cả
                                            quận/huyện</label> --}}
                                        <select
                                            class="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input"
                                            id="district-town02" name="district" title="Tất cả khu vực"
                                            data-style="p-0 h-24 lh-17 text-dark" id="location">
                                            <option value="0">Chọn Quận/Huyện...</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
                                        {{-- <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Tất cả
                                            xã/phường</label> --}}
                                        <select
                                            class="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input"
                                            id="ward-commune02" name="village" title="Tất cả khu vực"
                                            data-style="p-0 h-24 lh-17 text-dark" id="location">
                                            <option value="0">Chọn Xã/Phường...</option>
                                        </select>
                                    </div>


                                    <div class="col-sm-6 pt-4 px-2 pb-2">
                                        <select
                                            class="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input"
                                            title="Chọn" data-style="p-0 h-24 lh-17 text-dark" name="category">
                                            <option value="">Tất cả loại phòng</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div class="row">

                                </div>
                            </div>
                        </div>
                </div>
                </form>

            </div>
            </div>
        </section>
        <section class="pt-lg-12 pb-lg-10 py-11">
            <div class="container container-xxl">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-heading">Nơi ở lý tưởng</h2>
                        <span class="heading-divider"></span>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{ route('client.room-listing') }}"
                            class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">Xem tất cả tài sản
                            <i class="far fa-long-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="slick-slider slick-dots-mt-0 custom-arrow-spacing-30"
                    data-slick-options='{"slidesToShow": 4, "autoplay": true, "dots": true, "responsive": [
        {"breakpoint": 1600, "settings": {"slidesToShow": 3, "arrows": false}},
        {"breakpoint": 992, "settings": {"slidesToShow": 2, "arrows": false}},
        {"breakpoint": 768, "settings": {"slidesToShow": 2, "arrows": false, "dots": true, "autoplay": true}},
        {"breakpoint": 576, "settings": {"slidesToShow": 1, "arrows": false, "dots": true, "autoplay": true}}
     ]}'>
                    @foreach ($rooms as $room)
                        <div class="box pb-7 pt-2">
                            <div class="card shadow-hover-2 h-100" data-animate="zoomIn">

                                <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top"
                                    style="height: 200px; overflow: hidden;">
                                    @if ($room->images->isNotEmpty())
                                        <img src="{{ asset('assets/images/' . $room->images->first()->filename) }}"
                                            alt="{{ $room->title }}" class="img-fluid w-100 h-100 rounded"
                                            style="object-fit: cover;">
                                    @else
                                        <img src="{{ asset('assets/images/properties-grid-01.jpg') }}"
                                            alt="{{ $room->title }}" class="img-fluid w-100 h-100 rounded"
                                            style="object-fit: cover;">
                                    @endif
                                    <div class="card-img-overlay p-2 d-flex flex-column">

                                        <div>
                                            @if ($room->residents->isNotEmpty())
                                                <span class="badge badge-orange">Hết phòng</span>
                                            @else
                                                <span class="badge badge-primary">Còn phòng</span>
                                            @endif
                                            @if ($room->expiration_date > now())
                                                <span class="badge bg-danger text-white" style="top: 1px; right: 1px;">
                                                    VIP
                                                </span>
                                            @endif
                                        </div>
                                        <ul class="list-inline mb-0 mt-auto hover-image">
                                            <li class="list-inline-item mr-2" data-toggle="tooltip" title="Ảnh">
                                                <a href="#" class="text-white hover-primary">
                                                    <i class="far fa-images"></i><span
                                                        class="pl-1">{{ $room->images()->count() }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body pt-3 d-flex flex-column">
                                    <h2 class="card-title fs-16 lh-2 mb-0">
                                        <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}"
                                            class="text-dark hover-primary"><small>{{ Str::limit($room->title, 70) }}</small></a>
                                    </h2>
                                    <p class="card-text font-weight-500 text-gray-light mb-2">
                                        {{ Str::limit($room->address, 100) }}</p>
                                    <ul class="list-inline d-flex mb-0 flex-wrap mr-n5 mt-auto">
                                        {{-- <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Phòng ngủ">
                                            <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-bedroom"></use>
                                            </svg>
                                            {{ $room->bedroom ?? '3' }} Phòng
                                        </li> --}}
                                        {{-- @if ($rooms->utility && $rooms->utility->bathrooms == 1)
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                data-toggle="tooltip" title="Phòng tắm">
                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                            </li>
                                        @endif
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Diện tích">
                                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-square"></use>
                                            </svg>
                                            @if ($rooms->acreage)
                                                {{ $rooms->acreage }}m²
                                            @else
                                                Chưa có thông tin
                                            @endif
                                        </li>
                                        @if ($rooms->utility && $rooms->utility->air_conditioning == 1)
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                data-toggle="tooltip" title="Máy điều hòa">
                                                <svg class="icon icon-heating fs-18 text-primary">
                                                    <use xlink:href="#icon-heating"></use>
                                                </svg>
                                                Máy điều hòa
                                            </li>
                                        @endif
                                        @if ($rooms->utility && $rooms->utility->wifi == 1)
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                data-toggle="tooltip" title="Wifi">
                                                <svg class="icon fs-18 text-primary mr-1" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 640 512">
                                                    <path fill="currentColor"
                                                        d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z" />
                                                </svg>
                                                Wifi
                                            </li>
                                        @endif --}}
                                        @if ($room->utility && $room->utility->bathrooms == 1)
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                data-toggle="tooltip" title="Phòng tắm">
                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                                Phòng tắm
                                            </li>
                                        @endif
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Diện tích">
                                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-square"></use>
                                            </svg>
                                            @if ($room->acreage)
                                                {{ $room->acreage }}m²
                                            @else
                                                Chưa có thông tin
                                            @endif
                                        </li>
                                        @if ($room->utility && $room->utility->wifi == 1)
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                data-toggle="tooltip" title="Wifi">
                                                <svg class="icon fs-18 text-primary mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                    <path fill="currentColor"
                                                        d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z" />
                                                </svg>
                                                Wifi
                                            </li>
                                        @endif
                                        @if ($room->utility && $room->utility->air_conditioning == 1)
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                data-toggle="tooltip" title="Máy điều hòa">
                                                <svg class="icon icon-heating fs-18 text-primary">
                                                    <use xlink:href="#icon-heating"></use>
                                                </svg>
                                                &nbsp;Máy điều hòa
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div
                                    class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                    <p class="fs-17 font-weight-bold text-heading mb-0">
                                        {{ number_format($room->price, 0, ',', '.') }} VND
                                    </p>
                                    <ul class="list-inline mb-0">
                                        {{-- <li class="list-inline-item">
                                            <a href="{{ route('client.add.favourite', ['slug' => $room->slug]) }}"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </li> --}}
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center favorite-btn {{ $room->isFavoritedByUser(auth()->id()) ? 'favorited' : '' }}"
                                                data-room-slug="{{ $room->slug }}">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

        </section>

        <section>
            <div class="bg-gray-02 py-lg-13 pt-11 pb-6">
                <div class="container container-xxl">
                    <div class="row">
                        <div class="col-lg-4 pr-xl-13" data-animate="fadeInLeft">
                            <h2 class="text-heading lh-1625">Xem thêm <br> Phân loại</h2>
                            <span class="heading-divider"></span>
                            <form action="{{ route('client.room-listing') }}" method="GET">
                                <div class="input-group input-group-lg ">
                                    <input type="text"
                                        class="form-control fs-13 font-weight-500 text-gray-light rounded-lg rounded-right-0 border-0 shadow-none h-52 bg-white"
                                        name="type" placeholder="Nhập loại phòng">
                                    <button type="submit"
                                        class="btn btn-primary fs-18 rounded-left-0 rounded-lg px-6 border-0">
                                        <i class="far fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-8" data-animate="fadeInRight">
                            <div class="slick-slider arrow-haft-inner custom-arrow-xxl-hide mx-0"
                                data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 3,"arrows":false,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 2,"arrows":false,"autoplay":true}}]}'>
                                <div class="box px-0 py-6">
                                    <a href="{{ route('client.room-listing', ['type' => 'Căn hộ']) }}"
                                        class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                                        <img src="{{ asset('assets/images/verified.png') }}" class="card-img-top"
                                            alt="Căn hộ">

                                        <div class="card-body px-0 pt-5 pb-0">
                                            <h4 class="card-title fs-16 lh-2 text-dark mb-0">Căn Hộ</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="box px-0 py-6">
                                    <a href="{{ route('client.room-listing', ['type' => 'Nhà ở']) }}"
                                        class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                                        <img src="{{ asset('assets/images/sofa.png') }}" class="card-img-top"
                                            alt="Nhà">

                                        <div class="card-body px-0 pt-5 pb-0">
                                            <h4 class="card-title fs-16 lh-2 text-dark mb-0">Nhà ở</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="box px-0 py-6">
                                    <a href="{{ route('client.room-listing', ['type' => 'Chung cư']) }}"
                                        class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                                        <img src="{{ asset('assets/images/architecture-and-city.png') }}"
                                            class="card-img-top" alt="Văn phòng">

                                        <div class="card-body px-0 pt-5 pb-0">
                                            <h4 class="card-title fs-16 lh-2 text-dark mb-0">Chung cư</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="box px-0 py-6">
                                    <a href="{{ route('client.room-listing', ['type' => 'Phòng trọ']) }}"
                                        class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                                        <img src="{{ asset('assets/images/eco-house.png') }}" class="card-img-top"
                                            alt="Biệt thự">

                                        <div class="card-body px-0 pt-5 pb-0">
                                            <h4 class="card-title fs-16 lh-2 text-dark mb-0">Phòng trọ</h4>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section>

        

        <section>
            <div class="bg-single-image pt-lg-13 pb-lg-12 py-11 bg-secondary">
                <div class="container container-xxl">
                    <div class="row align-items-center">
                        <div class="col-lg-6 pr-xl-8 pb-lg-0 pb-6" data-animate="fadeInLeft">
                            <a href="#" class="hover-shine d-block">
                                <img src="{{ asset('assets/images/single-image-01.jpg') }}" class="rounded-lg w-100"
                                    alt="Tìm khu phố của bạn">
                            </a>
                        </div>
                        <div class="col-lg-6 pl-xl-8" data-animate="fadeInRight">
                            <h2 class="text-white lh-1625">Tìm phòng trọ của bạn<br />
                            </h2>
                            <span class="heading-divider"></span>
                            <form action="{{ route('client.room-listing') }}" method="GET">
                                <div class="input-group input-group-lg pr-sm-17">
                                    <input type="text"
                                        class="form-control fs-13 font-weight-500 text-gray-light rounded-lg rounded-right-0 border-0 shadow-none h-52 bg-white"
                                        name="search" placeholder="Nhập địa chỉ, khu phố">
                                    <button type="submit"
                                        class="btn btn-primary fs-18 rounded-left-0 rounded-lg px-6 border-0">
                                        <i class="far fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-lg-12 pb-lg-11 py-11">
            <div class="container container-xxl">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-heading">Được quan tâm nhiều nhất</h2>
                        <span class="heading-divider"></span>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{ route('client.room-listing') }}"
                            class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">Xem tất cả bất động
                            sản
                            <i class="far fa-long-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <div class="slick-slider slick-dots-mt-0 custom-arrow-spacing-30"
                    data-slick-options='{"slidesToShow": 4,"dots":true,"arrows":false,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
                    @foreach ($roomClient as $room)
                        <div class="box pb-7 pt-2">
                            <div class="card shadow-hover-2 h-100" data-animate="zoomIn">
                                <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top"
                                    style="height: 200px; overflow: hidden;">
                                    @if ($room->images->isNotEmpty())
                                        <img src="{{ asset('assets/images/' . $room->images->first()->filename) }}"
                                            alt="{{ $room->title }}" class="img-fluid w-100 h-100 rounded"
                                            style="object-fit: cover;">
                                    @else
                                        <img src="{{ asset('assets/images/properties-grid-01.jpg') }}"
                                            alt="{{ $room->title }}" class="img-fluid w-100 h-100 rounded"
                                            style="object-fit: cover;">
                                    @endif
                                    <div class="card-img-overlay p-2 d-flex flex-column">

                                        <div>
                                            @if ($room->residents->isNotEmpty())
                                                <span class="badge badge-orange">Hết phòng</span>
                                            @else
                                                <span class="badge badge-primary">Còn phòng</span>
                                            @endif
                                            @if ($room->expiration_date > now())
                                                <span class="badge bg-danger text-white" style="top: 1px; right: 1px;">
                                                    VIP
                                                </span>
                                            @endif
                                        </div>
                                        <ul class="list-inline mb-0 mt-auto hover-image">
                                            <li class="list-inline-item mr-2" data-toggle="tooltip" title="Ảnh">
                                                <a href="#" class="text-white hover-primary">
                                                    <i class="far fa-images"></i><span
                                                        class="pl-1">{{ $room->images()->count() }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body pt-3 d-flex flex-column">
                                    <h2 class="card-title fs-16 lh-2 mb-0">
                                        <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}"
                                            class="text-dark hover-primary"><small>{{ Str::limit($room->title, 70) }}</small></a>
                                    </h2>
                                    <p class="card-text font-weight-500 text-gray-light mb-2">
                                        {{ Str::limit($room->address, 100) }}</p>
                                    <ul class="list-inline d-flex mb-0 flex-wrap mr-n5 mt-auto">
                                        @if ($room->utility && $room->utility->bathrooms == 1)
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                data-toggle="tooltip" title="Phòng tắm">
                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                                Phòng tắm
                                            </li>
                                        @endif
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Diện tích">
                                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-square"></use>
                                            </svg>
                                            @if ($room->acreage)
                                                {{ $room->acreage }}m²
                                            @else
                                                Chưa có thông tin
                                            @endif
                                        </li>
                                        @if ($room->utility && $room->utility->wifi == 1)
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                data-toggle="tooltip" title="Wifi">
                                                <svg class="icon fs-18 text-primary mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                    <path fill="currentColor"
                                                        d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z" />
                                                </svg>
                                                Wifi
                                            </li>
                                        @endif
                                        @if ($room->utility && $room->utility->air_conditioning == 1)
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                data-toggle="tooltip" title="Máy điều hòa">
                                                <svg class="icon icon-heating fs-18 text-primary">
                                                    <use xlink:href="#icon-heating"></use>
                                                </svg>
                                                &nbsp;Máy điều hòa
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div
                                    class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                    <p class="fs-17 font-weight-bold text-heading mb-0">
                                        {{ number_format($room->price, 0, ',', '.') }} VND</p>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center favorite-btn {{ $room->isFavoritedByUser(auth()->id()) ? 'favorited' : '' }}"
                                                data-room-slug="{{ $room->slug }}">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <section class="bg-accent pt-10 pb-lg-11 pb-8 bg-patten-04">
            <div class="container container-xxl">
                <h2 class="text-dark text-center mxw-751 fs-26 lh-184 px-md-8">
                    Chúng tôi có nhiều danh sách nhất và cập nhật liên tục.
                    Vì vậy bạn sẽ không bỏ lỡ thông tin nào.</h2>
                <span class="heading-divider mx-auto"></span>
                <div class="row mt-8">
                    <div class="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
                        <div class="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                            <div class="row no-gutters">
                                <div class="col-sm-3">
                                    <img src="{{ asset('assets/images/group-16.png') }}" alt="Mua nhà mới">

                                </div>
                                <div class="col-sm-9">
                                    <div class="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                                        <a href="{{ route('client.room-listing') }}"
                                            class="d-flex align-items-center text-dark hover-secondary">
                                            <h4 class="fs-20 lh-1625 mb-1">Tìm trọ mới</h4>
                                            <span
                                                class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                                                <svg class="icon icon-long-arrow">
                                                    <use xlink:href="#icon-long-arrow"></use>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
                        <div class="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                            <div class="row no-gutters">
                                <div class="col-sm-3">
                                    <img src="{{ asset('assets/images/group-17.png') }}" alt="Bán nhà">

                                </div>
                                <div class="col-sm-9">
                                    <div class="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                                        <a href="{{ auth()->check() && auth()->user()->role == 2 ? route('owners.add-room') : route('client.home') }}"
                                            class="d-flex align-items-center text-dark hover-secondary">
                                            <h4 class="fs-20 lh-1625 mb-1">Đăng tin</h4>
                                            <span
                                                class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                                                <svg class="icon icon-long-arrow">
                                                    <use xlink:href="#icon-long-arrow"></use>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
                        <div class="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                            <div class="row no-gutters">
                                <div class="col-sm-3">
                                    <img src="{{ asset('assets/images/group-21.png') }}" alt="Thuê nhà">

                                </div>
                                <div class="col-sm-9">
                                    <div class="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                                        <a href="{{ route('client.client-list-zone') }}"
                                            class="d-flex align-items-center text-dark hover-secondary">
                                            <h4 class="fs-20 lh-1625 mb-1">Tìm quanh đây</h4>
                                            <span
                                                class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                                                <svg class="icon icon-long-arrow">
                                                    <use xlink:href="#icon-long-arrow"></use>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container container-xxl">
                <div class="py-lg-8 py-6 border-top">
                    <div class="slick-slider mx-0 partners"
                        data-slick-options='{"slidesToShow": 6, "autoplay":true,"dots":false,"arrows":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":4}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 3}},{"breakpoint": 576,"settings": {"slidesToShow": 2}}]}'>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item position-relative hover-change-image">
                                <img src="{{ asset('assets/images/partner-hover-1.png') }}"
                                    class="hover-image position-absolute pos-fixed-top" alt="Đối tác 1">

                                <img src="{{ asset('assets/images/partner-1.png') }}" alt="Đối tác 1" class="image">

                            </a>
                        </div>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item position-relative hover-change-image">
                                <img src="{{ asset('assets/images/partner-hover-2.png') }}"
                                    class="hover-image position-absolute pos-fixed-top" alt="Đối tác 2">
                                <img src="{{ asset('assets/images/partner-2.png') }}" alt="Đối tác 2" class="image">
                            </a>

                        </div>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item position-relative hover-change-image">
                                <img src="{{ asset('assets/images/partner-hover-3.png') }}"
                                    class="hover-image position-absolute pos-fixed-top" alt="Đối tác 3">
                                <img src="{{ asset('assets/images/partner-3.png') }}" alt="Đối tác 3" class="image">
                            </a>

                        </div>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item">
                                <img src="{{ asset('assets/images/partner-4.png') }}" alt="Đối tác 4" class="image">
                            </a>
                        </div>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item position-relative hover-change-image">
                                <img src="{{ asset('assets/images/partner-hover-5.png') }}"
                                    class="hover-image position-absolute pos-fixed-top" alt="Đối tác 5">
                                <img src="{{ asset('assets/images/partner-5.png') }}" alt="Đối tác 5" class="image">
                            </a>

                        </div>
                        <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                            <a href="#" class="item">
                                <img src="{{ asset('assets/images/partner-6.png') }}" alt="Đối tác 6" class="image">
                            </a>
                        </div>
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
    <title>Trang chủ | TRỌ NHANH</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/hoangtuchile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Favicons -->
    <link rel="shortcut icon" witdh=300px; href="{{ asset('assets/images/logo-nav.png') }}" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Home 01">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url('home-01.html') }}">
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
        content="TRỌ NHANH cung cấp giải pháp cho thuê nhà và phòng trọ nhanh chóng và dễ dàng. Khám phá các dịch vụ của chúng tôi và tìm kiếm nơi ở phù hợp với nhu cầu của bạn ngay hôm nay.">
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
    <link rel="stylesheet" href="{{ asset('assets/css/hoangtuchile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TronNhanh">
    <meta name="twitter:creator" content="@TronNhanh">
    <meta name="twitter:title" content="Trang Chủ | TRỌ NHANH">
    <meta name="twitter:description"
        content="TRỌ NHANH cung cấp giải pháp cho thuê nhà và phòng trọ nhanh chóng và dễ dàng. Khám phá các dịch vụ của chúng tôi và tìm kiếm nơi ở phù hợp với nhu cầu của bạn ngay hôm nay.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="Trang Chủ | TRỌ NHANH">
    <meta property="og:description"
        content="TRỌ NHANH cung cấp giải pháp cho thuê nhà và phòng trọ nhanh chóng và dễ dàng. Khám phá các dịch vụ của chúng tôi và tìm kiếm nơi ở phù hợp với nhu cầu của bạn ngay hôm nay.">
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

    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var districts = @json($districts);
        var villages = @json($villages);
    </script>
    <script src="{{ asset('assets/js/search-api-vn.js') }}"></script>
    <script src="{{ asset('assets/js/yeuthich.js') }}"></script>
    {{-- <script>
        function toggleFavourite(event, element) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

            const slug = element.getAttribute('data-room-slug');
            const url = `{{ route('client.add.favourite', '') }}/${slug}`;

            fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest', // Đảm bảo yêu cầu được xử lý như một yêu cầu AJAX
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Cập nhật giao diện người dùng dựa trên phản hồi từ server
                    if (data.success) {
                        const icon = element.querySelector('i');
                        if (icon.classList.contains('far')) {
                            icon.classList.remove('far');
                            icon.classList.add('fas', 'text-danger');
                        } else {
                            icon.classList.remove('fas', 'text-danger');
                            icon.classList.add('far');
                        }
                        // Cập nhật tooltip title
                        const tooltipTitle = icon.classList.contains('text-danger') ? 'Đã thêm vào yêu thích' :
                            'Yêu thích';
                        element.setAttribute('title', tooltipTitle);
                    } else {
                        console.error('Có lỗi xảy ra khi thêm vào yêu thích.');
                    }
                })
                .catch(error => console.error('Có lỗi xảy ra:', error));
        }
    </script> --}}
    <script>
        // $(document).ready(function() {
        //     $('.favorite-btn').on('click', function(e) {
        //         e.preventDefault();
        //         var btn = $(this);
        //         var roomSlug = btn.data('room-slug');

        //         $.ajax({
        //             url: '/add-favourite/' + roomSlug,
        //             type: 'POST',
        //             data: {
        //                 _token: $('meta[name="csrf-token"]').attr('content')
        //             },
        //             success: function(response) {
        //                 if (response.status === 'added') {
        //                     btn.addClass('active');
        //                 } else if (response.status === 'removed') {
        //                     btn.removeClass('active');
        //                 }

        //                 // Cập nhật số lượng yêu thích trên navbar
        //                 updateFavoriteCount(response.favoriteCount);
        //             },
        //             error: function(xhr) {
        //                 console.log('Error:', xhr);
        //             }
        //         });
        //     });

        //     // Hàm mới để cập nhật số lượng yêu thích
        //     function updateFavoriteCount(count) {
        //         var $favoriteCount = $('#favorite-count');
        //         $favoriteCount.text(count);

        //         // Thêm hiệu ứng để làm nổi bật sự thay đổi
        //         $favoriteCount.addClass('highlight');
        //         setTimeout(function() {
        //             $favoriteCount.removeClass('highlight');
        //         }, 300);
        //     }
        // });

        // $(document).ready(function() {
        //     $('.favorite-btn').on('click', function(e) {
        //         e.preventDefault();
        //         var btn = $(this);
        //         var roomSlug = btn.data('room-slug');

        //         $.ajax({
        //             url: '/add-favourite/' + roomSlug,
        //             type: 'POST',
        //             data: {
        //                 _token: $('meta[name="csrf-token"]').attr('content')
        //             },
        //             success: function(response) {
        //                 if (response.status === 'added') {
        //                     btn.addClass('favorited');
        //                 } else if (response.status === 'removed') {
        //                     btn.removeClass('favorited');
        //                 }

        //                 // Cập nhật số lượng yêu thích trên navbar
        //                 updateFavoriteCount(response.favoriteCount);
        //             },
        //             error: function(xhr) {
        //                 console.log('Error:', xhr);
        //             }
        //         });
        //     });

        //     // Hàm để cập nhật số lượng yêu thích
        //     function updateFavoriteCount(count) {
        //         var $favoriteCount = $('#favorite-count');
        //         $favoriteCount.text(count);

        //         // Thêm hiệu ứng để làm nổi bật sự thay đổi
        //         $favoriteCount.addClass('highlight');
        //         setTimeout(function() {
        //             $favoriteCount.removeClass('highlight');
        //         }, 300);
        //     }
        // });
    </script>
@endpush
