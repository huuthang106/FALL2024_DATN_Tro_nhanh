@extends('layouts.main')
@section('titleUs', 'Danh Sách Khu Trọ | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="bg-secondary">
            <div class="container">
                <form action="{{ route('client.client-list-zone') }}" class="property-search d-none d-lg-block">
                    <div class="row align-items-lg-center" id="accordion-2">
                        <div class="col-xl-1 col-lg-1 col-md-4">
                            <div class="property-search-status-tab d-flex flex-row">
                                <input class="search-field" type="hidden" name="status" value="for-rent"
                                    data-default-value="">

                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 d-md-flex">
                            <select
                                class="form-control shadow-none form-control-lg selectpicker rounded-right-md-0 rounded-md-top-left-0 rounded-lg-top-left flex-md-1 mt-3 mt-md-0"
                                title="Chọn Thành Phố" data-style="btn-lg py-2 h-52 border-right bg-white" name="province"
                                id="city-province">
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
                                        <option value='{{ $code }}' {{ $province == $code ? 'selected' : '' }}>
                                            {{ $name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="form-group mb-0 position-relative flex-md-3 mt-3 mt-md-0">
                                <input type="text"
                                    class="form-control form-control-lg border-0 shadow-none rounded-left-md-0 pr-8 bg-white placeholder-muted"
                                    id="key-word-1" name="keyword" placeholder="Nhập tên khu trọ...">
                                <button type="submit"
                                    class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 mr-4 shadow-none">
                                    <i class="far fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <a href="#advanced-search-filters-2"
                                class="icon-primary btn advanced-search w-100 shadow-none text-white text-left rounded-0 fs-14 font-weight-600 position-relative collapsed px-0 d-flex align-items-center"
                                data-toggle="collapse" data-target="#advanced-search-filters-2" aria-expanded="true"
                                aria-controls="advanced-search-filters-2">
                                Tìm kiếm
                            </a>
                        </div>
                        <div id="advanced-search-filters-2" class="col-12 pb-6 pt-lg-2 collapse" data-parent="#accordion-2">
                            <div class="row mx-n2">
                                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        name="status" title="Trạng thái" data-style="btn-lg py-2 h-52 bg-white">
                                        <option>Trạng thái</option>
                                        <option>Cho thuê</option>
                                        <option>Cho mướn</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        name="bedroom" title="Phòng ngủ" data-style="btn-lg py-2 h-52 bg-white">
                                        <option>Phòng ngủ</option>
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
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        name="bathrooms" title="Phòng tắm" data-style="btn-lg py-2 h-52 bg-white">
                                        <option>Phòng tắm</option>
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
                                </div>


                                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                    <input type="text" class="form-control form-control-lg border-0 shadow-none bg-white"
                                        placeholder="Mã phòng trọ" name="">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </section>

        <section class="position-relative mt-1">
            <div class="container-fluid px-0">
                <div class="row no-gutters">
                    <div class="col-xl-6 col-xxl-5 px-3 px-xxl-6 pt-7 order-2 order-xl-1 pb-11">
                        <div class="row align-items-sm-center mb-6">
                            <div class="col-md-6 col-xl-5 col-xxl-6">
                                <h2 class="fs-15 text-dark mb-0">Chúng tôi đã tìm thấy <span
                                        class="text-primary">{{ $zones->total() > 0 ? $zones->total() : 0 }}</span> khu vực
                                    trọ
                                </h2>
                            </div>
                            <div class="col-md-6 col-xl-7 col-xxl-6 mt-6 mt-md-0">
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
                                            <option value="1">Xem nhiều nhất</option>
                                            <option value="2">Giá (thấp đến cao)</option>
                                            <option value="3">Giá (cao đến thấp)</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" id="zone-list">
                                @if ($zones->isEmpty())
                                    <div class="alert alert-info">
                                        Chưa có khu trọ nào ở đây.
                                    </div>
                                @else
                                    @foreach ($zones as $zone)
                                        <div class="card mb-8 mb-lg-6 border-0 zone-card" data-animate="fadeInUp"
                                            data-latitude="{{ $zone->latitude }}" data-longitude="{{ $zone->longitude }}"
                                            data-address="{{ $zone->address }}" data-rooms='@json($zone->rooms)'>
                                            <div class="row no-gutters">
                                                <div class="col-md-6 mb-5 mb-md-0 pr-md-6">
                                                    <div class="position-relative hover-change-image bg-hover-overlay h-100 pt-75 bg-img-cover-center rounded-lg"
                                                        style="background-image: url('{{ $zone->images->isNotEmpty()
                                                            ? asset('assets/images/' . $zone->images->first()->filename)
                                                            : asset('assets/images/properties-grid-08.jpg') }}');">
                                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                                            <div>
                                                                @if ($zone->status == 1)
                                                                    <span class="badge badge-primary">Hoạt động</span>
                                                                @elseif($zone->status == 2)
                                                                    <span class="badge badge-secondary">Chưa hoạt
                                                                        động</span>
                                                                @endif
                                                            </div>
                                                            {{-- <div class="mt-auto d-flex hover-image">
                                                                <ul
                                                                    class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                    <li class="list-inline-item mr-2"
                                                                        data-toggle="tooltip" title="9 Hình ảnh">
                                                                        <a href="#"
                                                                            class="text-white hover-primary">
                                                                            <i class="far fa-images"></i><span
                                                                                class="pl-1">9</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                                        title="2 Video">
                                                                        <a href="#"
                                                                            class="text-white hover-primary">
                                                                            <i class="far fa-play-circle"></i><span
                                                                                class="pl-1">2</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                    <li class="list-inline-item mr-3 h-32"
                                                                        data-toggle="tooltip" title="Yêu thích">
                                                                        <a href="#"
                                                                            class="text-white fs-20 hover-primary">
                                                                            <i class="far fa-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item h-32 mr-3"
                                                                        data-toggle="tooltip" title="So sánh">
                                                                        <a href="#"
                                                                            class="text-white fs-20 hover-primary">
                                                                            <i class="fas fa-exchange-alt"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="card-body p-0">
                                                        <h2 class="card-title my-0">
                                                            <a href="javascript:void(0);"
                                                                class="fs-16 lh-2 text-dark hover-primary d-block zone-link"
                                                                data-lat="{{ $zone->latitude }}"
                                                                data-lng="{{ $zone->longitude }}">
                                                                {{ $zone->name }}
                                                            </a>
                                                        </h2>
                                                        <p class="card-text mb-1 font-weight-500 text-gray-light">
                                                            {{ $zone->address }}</p>
                                                        <p class="card-text mb-2 ml-0">{{ $zone->description }}</p>
                                                        <p class="card-text fs-17 font-weight-bold text-heading mb-3">
                                                            Tổng số phòng: {{ $zoneServices->countRoomsInZone($zone->id) }}
                                                        </p>
                                                    </div>
                                                    <div class="card-footer pt-3 bg-transparent px-0 pb-0">
                                                        <ul
                                                            class="list-inline d-flex mb-0 flex-wrap justify-content-start mr-n2">
                                                            {{-- @foreach ($zone->utilities as $utility)
                                                                @if ($utility->wifi)
                                                                    <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                                        data-toggle="tooltip" title="WiFi">
                                                                        <i class="fas fa-wifi fs-10 text-primary mr-1"></i>
                                                                        <!-- Icon WiFi -->
                                                                        WiFi
                                                                    </li>
                                                                @endif
                                                                @if ($utility->bathrooms == 1)
                                                                    <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                                        data-toggle="tooltip" title="Phòng tắm">
                                                                        <i
                                                                            class="fas fa-shower fs-15 text-primary mr-1"></i>
                                                                        <!-- Icon phòng tắm -->
                                                                        Phòng tắm
                                                                    </li>
                                                                @endif
                                                                @if ($utility->garage)
                                                                    <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                                        data-toggle="tooltip" title="Ga-ra">
                                                                        <i
                                                                            class="fas fa-warehouse fs-10 text-primary mr-1"></i>
                                                                        <!-- Icon Ga-ra -->
                                                                        Ga-ra
                                                                    </li>
                                                                @endif
                                                            @endforeach --}}
                                                            @if ($zone->utility && $zone->utility->bathrooms == 1)
                                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                                    data-toggle="tooltip" title="Phòng tắm">
                                                                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                                        <use xlink:href="#icon-shower"></use>
                                                                    </svg>
                                                                    Phòng tắm
                                                                </li>
                                                            @endif
                                                            @if ($zone->utility && $zone->utility->wifi == 1)
                                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                                    data-toggle="tooltip" title="Wifi">
                                                                    <svg class="icon fs-18 text-primary mr-1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 640 512">
                                                                        <path fill="currentColor"
                                                                            d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z" />
                                                                    </svg>
                                                                    Wifi
                                                                </li>
                                                            @endif
                                                            @if ($zone->utility && $zone->utility->air_conditioning == 1)
                                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                                                    data-toggle="tooltip" title="Máy điều hòa">
                                                                    <svg class="icon icon-heating fs-18 text-primary">
                                                                        <use xlink:href="#icon-heating"></use>
                                                                    </svg>
                                                                    &nbsp;Máy điều hòa
                                                                </li>
                                                            @endif
                                                            @if ($zone->utility && $zone->utility->garage == 1)
                                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                                    data-toggle="tooltip" title="Ga-ra">
                                                                    <i
                                                                        class="fas fa-warehouse fs-10 text-primary mr-1"></i>
                                                                    <!-- Icon Ga-ra -->
                                                                    Ga-ra
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-12">
                                <nav class="pt-2 pt-lg-4">
                                    <ul class="pagination rounded-active justify-content-center">
                                        {{-- Liên kết Trang Đầu --}}
                                        <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $zones->url(1) }}"><i
                                                    class="far fa-angle-double-left"></i></a>
                                        </li>

                                        {{-- Liên kết Trang Trước --}}
                                        <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $zones->previousPageUrl() }}"><i
                                                    class="far fa-angle-left"></i></a>
                                        </li>

                                        {{-- Trang đầu tiên --}}
                                        @if ($zones->currentPage() > 2)
                                            <li class="page-item"><a class="page-link" href="{{ $zones->url(1) }}">1</a>
                                            </li>
                                        @endif

                                        {{-- Dấu ba chấm ở đầu nếu cần --}}
                                        @if ($zones->currentPage() > 3)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif

                                        {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                                        @for ($i = max(1, $zones->currentPage() - 1); $i <= min($zones->currentPage() + 1, $zones->lastPage()); $i++)
                                            <li class="page-item {{ $zones->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $zones->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        {{-- Dấu ba chấm ở cuối nếu cần --}}
                                        @if ($zones->currentPage() < $zones->lastPage() - 2)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif

                                        {{-- Trang cuối cùng --}}
                                        @if ($zones->currentPage() < $zones->lastPage() - 1)
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $zones->url($zones->lastPage()) }}">{{ $zones->lastPage() }}</a>
                                            </li>
                                        @endif

                                        {{-- Liên kết Trang Tiếp --}}
                                        <li
                                            class="page-item {{ $zones->currentPage() == $zones->lastPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $zones->nextPageUrl() }}"><i
                                                    class="far fa-angle-right"></i></a>
                                        </li>

                                        {{-- Liên kết Trang Cuối --}}
                                        <li
                                            class="page-item {{ $zones->currentPage() == $zones->lastPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $zones->url($zones->lastPage()) }}"><i
                                                    class="far fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-7 order-1 order-xl-2 primary-map map-sticky overflow-hidden"
                        id="map-sticky">
                        <div class="primary-map-inner">
                            <div class="mapbox-gl map-grid-property-01 xl-vh-100" id="map"></div>
                        </div>
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
        <div class="d-none" id="template-properties">
            <div class="marker-item" data-icon-marker="{{ asset('assets/images/googlle-market-02.png') }}"
                data-position="[-73.9893691, 40.6751204]"
                data-marker-style='{"className":"marker","style":{"width":"45px","height":"48px"},"popup":{"className":"popup-map-property-02","maxWidth":"319px"}}'>
                <div class="position-relative">
                    <div class="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                        <div class="col-3 mr-2 card border-0"><img
                                src="{{ asset('assets/images/properties-list-03.jpg') }}" class="card-img"
                                alt="Home in Metric Way"></div>
                        <div class="media-body">
                            <h2 class="my-0"><a href="single-property-1.html"
                                    class="fs-13 lh-2 text-dark hover-primary d-block">Nhà Mặt Phố</a></h2>
                            <p class="mb-0 font-weight-500 text-gray-light">Ninh Kiều, TP.Cần Thơ</p>
                            <p class="fs-17 font-weight-bold text-heading mb-0">1.250.000đ</p>
                        </div>
                    </div>
                    <ul class="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                <use xlink:href="#icon-bedroom"></use>
                            </svg>
                            3 Phòng
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-shower fs-18 text-primary mr-1">
                                <use xlink:href="#icon-shower"></use>
                            </svg>
                            3 Phòng tắm
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                <use xlink:href="#icon-square"></use>
                            </svg>
                            2300 m2
                        </li>
                    </ul>
                    <div class="badge badge-primary">For Sale</div>
                </div>
            </div>
            <div class="marker-item" data-icon-marker="{{ asset('assets/images/googlle-market-02.png') }}"
                data-position="[-73.9934889, 40.6743149]"
                data-marker-style='{"className":"marker","style":{"width":"45px","height":"48px"},"popup":{"className":"popup-map-property-02","maxWidth":"319px"}}'>
                <div class="position-relative">
                    <div class="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                        <div class="col-3 mr-2 card border-0"><img
                                src="{{ asset('assets/images/properties-list-04.jpg') }}" class="card-img"
                                alt="Home in Metric Way"></div>
                        <div class="media-body">
                            <h2 class="my-0"><a href="single-property-1.html"
                                    class="fs-13 lh-2 text-dark hover-primary d-block">Home
                                    in
                                    Metric
                                    Way</a></h2>
                            <p class="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                            <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                        </div>
                    </div>
                    <ul class="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                <use xlink:href="#icon-bedroom"></use>
                            </svg>
                            3 Br
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-shower fs-18 text-primary mr-1">
                                <use xlink:href="#icon-shower"></use>
                            </svg>
                            3 Ba
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                <use xlink:href="#icon-square"></use>
                            </svg>
                            2300 Sq.Ft
                        </li>
                    </ul>
                    <div class="badge badge-primary">For Sale</div>
                </div>
            </div>
            <div class="marker-item" data-icon-marker="{{ asset('assets/images/googlle-market-03.png') }}"
                data-position="[-73.9947227, 40.6734035]"
                data-marker-style='{"className":"marker","style":{"width":"45px","height":"48px"},"popup":{"className":"popup-map-property-02","maxWidth":"319px"}}'>
                <div class="position-relative">
                    <div class="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                        <div class="col-3 mr-2 card border-0"><img
                                src="{{ asset('assets/images/properties-list-11.jpg') }}" class="card-img"
                                alt="Home in Metric Way"></div>
                        <div class="media-body">
                            <h2 class="my-0"><a href="single-property-1.html"
                                    class="fs-13 lh-2 text-dark hover-primary d-block">Home
                                    in
                                    Metric
                                    Way</a></h2>
                            <p class="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                            <p class="fs-17 font-weight-bold text-heading mb-0">$2500<span
                                    class="fs-14 font-weight-500 text-gray-light"> /month</span></p>
                        </div>
                    </div>
                    <ul class="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                <use xlink:href="#icon-bedroom"></use>
                            </svg>
                            3 Br
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-shower fs-18 text-primary mr-1">
                                <use xlink:href="#icon-shower"></use>
                            </svg>
                            3 Ba
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                <use xlink:href="#icon-square"></use>
                            </svg>
                            2300 Sq.Ft
                        </li>
                    </ul>
                    <div class="badge badge-indigo">For Rent</div>
                </div>
            </div>
            <div class="marker-item" data-icon-marker="{{ asset('assets/images/googlle-market-02.png') }}"
                data-position="[-73.9968864, 40.6747657]"
                data-marker-style='{"className":"marker","style":{"width":"45px","height":"48px"},"popup":{"className":"popup-map-property-02","maxWidth":"319px"}}'>
                <div class="position-relative">
                    <div class="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                        <div class="col-3 mr-2 card border-0"><img
                                src="{{ asset('assets/images/properties-list-12.jpg') }}" class="card-img"
                                alt="Home in Metric Way"></div>
                        <div class="media-body">
                            <h2 class="my-0"><a href="single-property-1.html"
                                    class="fs-13 lh-2 text-dark hover-primary d-block">Home
                                    in
                                    Metric
                                    Way</a></h2>
                            <p class="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                            <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                        </div>
                    </div>
                    <ul class="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                <use xlink:href="#icon-bedroom"></use>
                            </svg>
                            3 Br
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-shower fs-18 text-primary mr-1">
                                <use xlink:href="#icon-shower"></use>
                            </svg>
                            3 Ba
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                <use xlink:href="#icon-square"></use>
                            </svg>
                            2300 Sq.Ft
                        </li>
                    </ul>
                    <div class="badge badge-primary">For Sale</div>
                </div>
            </div>
            <div class="marker-item" data-icon-marker="{{ asset('assets/images/googlle-market-02.png') }}"
                data-position="[-73.9929114, 40.6731454]"
                data-marker-style='{"className":"marker","style":{"width":"45px","height":"48px"},"popup":{"className":"popup-map-property-02","maxWidth":"319px"}}'>
                <div class="position-relative">
                    <div class="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                        <div class="col-3 mr-2 card border-0"><img
                                src="{{ asset('assets/images/properties-list-13.jpg') }}" class="card-img"
                                alt="Home in Metric Way"></div>
                        <div class="media-body">
                            <h2 class="my-0"><a href="single-property-1.html"
                                    class="fs-13 lh-2 text-dark hover-primary d-block">Home
                                    in
                                    Metric
                                    Way</a></h2>
                            <p class="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                            <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                        </div>
                    </div>
                    <ul class="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                <use xlink:href="#icon-bedroom"></use>
                            </svg>
                            3 Br
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-shower fs-18 text-primary mr-1">
                                <use xlink:href="#icon-shower"></use>
                            </svg>
                            3 Ba
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                <use xlink:href="#icon-square"></use>
                            </svg>
                            2300 Sq.Ft
                        </li>
                    </ul>
                    <div class="badge badge-primary">For Sale</div>
                </div>
            </div>
            <div class="marker-item" data-icon-marker="{{ asset('assets/images/googlle-market-03.png') }}"
                data-position="[-73.9927934, 40.674364]"
                data-marker-style='{"className":"marker","style":{"width":"45px","height":"48px"},"popup":{"className":"popup-map-property-02","maxWidth":"319px"}}'>
                <div class="position-relative">
                    <div class="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                        <div class="col-3 mr-2 card border-0"><img
                                src="{{ asset('assets/images/properties-list-03.jpg') }}" class="card-img"
                                alt="Home in Metric Way"></div>
                        <div class="media-body">
                            <h2 class="my-0"><a href="single-property-1.html"
                                    class="fs-13 lh-2 text-dark hover-primary d-block">Home
                                    in
                                    Metric
                                    Way</a></h2>
                            <p class="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                            <p class="fs-17 font-weight-bold text-heading mb-0">$2500<span
                                    class="fs-14 font-weight-500 text-gray-light"> /month</span></p>
                        </div>
                    </div>
                    <ul class="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                <use xlink:href="#icon-bedroom"></use>
                            </svg>
                            3 Br
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-shower fs-18 text-primary mr-1">
                                <use xlink:href="#icon-shower"></use>
                            </svg>
                            3 Ba
                        </li>
                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                <use xlink:href="#icon-square"></use>
                            </svg>
                            2300 Sq.Ft
                        </li>
                    </ul>
                    <div class="badge badge-indigo">For Rent</div>
                </div>
            </div>
        </div>
        <div id="overlay"></div>

    </main>

@endsection
@push('styleUs')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Danh Sách Khu Trọ | TRỌ NHANH</title>
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
    <meta name="twitter:title" content="Listing Half Map Grid Layout 1">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="listing-half-map-grid-layout-1.html">
    <meta property="og:title" content="Listing Half Map Grid Layout 1">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Tìm kiếm khu trọ dễ dàng với TRỌ NHANH - danh sách các khu trọ cập nhật, vị trí thuận tiện, giá cả hợp lý. Khám phá khu trọ phù hợp với bạn ngay bây giờ!">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/osm.css') }}">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TronNhanh">
    <meta name="twitter:creator" content="@TronNhanh">
    <meta name="twitter:title" content="Danh Sách Khu Trọ | TRỌ NHANH">
    <meta name="twitter:description"
        content="Khám phá danh sách khu trọ với giá cả hợp lý, vị trí thuận tiện và đầy đủ thông tin chi tiết tại TRỌ NHANH. Tìm khu trọ hoàn hảo cho bạn chỉ trong vài phút!">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url('/danh-sach-khu-tro') }}">
    <meta property="og:title" content="Danh Sách Khu Trọ | TRỌ NHANH">
    <meta property="og:description"
        content="Tìm kiếm khu trọ với vị trí thuận tiện và giá cả phải chăng tại TRỌ NHANH. Khám phá ngay danh sách các khu trọ đang được cập nhật liên tục.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
@endpush
@push('scriptUs')
    <!-- Vendors scripts -->
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

    <script src="{{ asset('assets/js/search-api-vn.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-smooth-marker-bouncing@1.0.0/dist/leaflet.smoothmarkerbouncing.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC67NQzqFC2WplLzC_3PsL5gejG1_PZLDk&callback=initMap" async
        defer></script>

    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        function initMap() {
            var map = L.map('map').setView([0, 0], 2);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var userMarker;
            var userLat, userLng;
            var osmMarkers = [];

            var userIcon = L.icon({
                iconUrl: '{{ asset('assets/images/101-1015767_map-marker-circle-png.png') }}', // Đường dẫn đến biểu tượng tùy chỉnh của bạn
                iconSize: [38, 38],
                iconAnchor: [22, 38],
                popupAnchor: [-3, -38]
            });


            var hospitalIcon = L.icon({
                iconUrl: '{{ asset('assets/images/13297903.png') }}',
                iconSize: [15, 15],
                iconAnchor: [22, 38],
                popupAnchor: [-3, -38]
            });

            var schoolIcon = L.icon({
                iconUrl: '{{ asset('assets/images/167707.png') }}',
                iconSize: [15, 15],
                iconAnchor: [22, 38],
                popupAnchor: [-3, -38]
            });

            var universityIcon = L.icon({
                iconUrl: '{{ asset('assets/images/167707.png') }}',
                iconSize: [15, 15],
                iconAnchor: [22, 38],
                popupAnchor: [-3, -38]
            });

            var policeIcon = L.icon({
                iconUrl: '{{ asset('assets/images/police-officer-icon-1797x2048-bai6ylf5.png') }}',
                iconSize: [15, 15],
                iconAnchor: [22, 38],
                popupAnchor: [-3, -38]
            });

            var zoneIcon = L.icon({
                iconUrl: '{{ asset('assets/images/341144.png') }}',
                iconSize: [20, 20],
                iconAnchor: [22, 38],
                popupAnchor: [-3, -38]
            });

            function addMarkers(zones) {
                zones.forEach(zone => {
                    console.log('Zone Latitude:', zone.latitude, 'Zone Longitude:', zone
                        .longitude);

                    var marker = L.marker([zone.latitude, zone.longitude], {
                            icon: zoneIcon,
                            draggable: false
                        })
                        .addTo(map)
                        .bindPopup(`
                <b>${zone.name}</b><br>${zone.address}<br>
            `, {
                            className: 'custom-popup'
                        })
                        .openPopup();

                    marker.on('click', function() {
                        console.log('User Latitude:', userLat, 'User Longitude:',
                            userLng);

                        if (typeof marker.bounce === 'function') {
                            marker.bounce({
                                duration: 500,
                                height: 100
                            });
                        } else {
                            console.error('Bounce method not available on marker');
                        }

                        if (typeof routingControl !== 'undefined') {
                            map.removeControl(routingControl);
                        }

                        routingControl = L.Routing.control({
                            waypoints: [
                                L.latLng(userLat, userLng),
                                L.latLng(zone.latitude, zone.longitude)
                            ],
                            routeWhileDragging: true,
                            createMarker: function() {
                                return null;
                            },
                            geocoder: L.Control.Geocoder.nominatim(),
                            lineOptions: {
                                styles: [{
                                    color: 'blue',
                                    opacity: 1,
                                    weight: 5
                                }]
                            },
                            showAlternatives: true,
                            altLineOptions: {
                                styles: [{
                                    color: 'blue',
                                    opacity: 0.7,
                                    weight: 5
                                }]
                            }
                        }).on('routesfound', function(e) {
                            var routes = e.routes;
                            var summary = routes[0].summary;
                            var distance = (summary.totalDistance / 1000).toFixed(2) + ' km';
                            var time = (summary.totalTime / 60).toFixed(2) + ' phút';

                            var existingInstructions = document.querySelector(
                                '.custom-instructions');
                            if (existingInstructions) {
                                existingInstructions.remove();
                            }

                            var instructions = document.createElement('div');
                            instructions.className = 'custom-instructions';
                            instructions.innerHTML = '<strong>Khoảng cách:</strong> ' + distance +
                                '<br><strong>Thời gian:</strong> ' + time;
                            document.querySelector('.leaflet-routing-container').appendChild(
                                instructions);

                            var mainRoads = routes[0].instructions.map(function(step) {
                                return step.road;
                            }).filter(function(road, index, self) {
                                return road && self.indexOf(road) === index;
                            }).join(', ');

                            var district = document.createElement('div');
                            district.className = 'district';
                            district.innerHTML = '<strong>Đường đi:</strong> ' + mainRoads;
                            document.querySelector('.leaflet-routing-container').appendChild(
                                district);
                        }).addTo(map);
                    });
                });
            }

            function setMapViewToCenter(zones) {
                if (zones.length > 0) {
                    var latitudes = zones.map(zone => zone.latitude);
                    var longitudes = zones.map(zone => zone.longitude);

                    if (userLat && userLng) {
                        latitudes.push(userLat);
                        longitudes.push(userLng);
                    }

                    var avgLat = latitudes.reduce((a, b) => a + b, 0) / latitudes.length;
                    var avgLng = longitudes.reduce((a, b) => a + b, 0) / longitudes.length;
                    map.setView([avgLat, avgLng], 13);
                }
            }

            function fetchZonesWithinRadius(lat, lng, radius = 10) {

                $.ajax({
                    url: '{{ route('client.client-list-zone') }}',
                    method: 'GET',
                    data: {
                        latitude: lat,
                        longitude: lng,
                        radius: radius
                    },
                    success: function(response) {

                        if (response.zones.length > 0) {
                            addMarkers(response.zones);
                            setMapViewToCenter(response.zones);

                            let zoneList = $('#zone-list');
                            zoneList.empty();
                            response.zones.forEach(zone => {
                                zoneList.append(`
                            <div class="zone-item">
                                <h3>${zone.name}</h3>
                                <p>${zone.address}</p>
                            </div>
                        `);
                            });
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Thông báo',
                                text: response.message || 'Không tìm thấy khu trọ nào.'
                            });
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching zones:', error);
                    }
                });
            }

            function setUserMarker(lat, lng) {
                if (userMarker) {
                    map.removeLayer(userMarker);
                }
                userMarker = L.marker([lat, lng], {
                        icon: userIcon
                    }).addTo(map)
                    .bindPopup("Vị trí của bạn").openPopup();
                map.setView([lat, lng], 13);
            }

            var returnButton = L.control({
                position: 'topright'
            });
            returnButton.onAdd = function() {
                var button = L.DomUtil.create('button', 'return-button');
                button.innerHTML = '<i class="fas fa-location-arrow"></i>';
                button.style.backgroundColor = 'white';
                button.style.border = 'none';
                button.style.borderRadius = '60%';
                button.style.width = '50px';
                button.style.height = '50px';
                button.style.display = 'flex';
                button.style.alignItems = 'center';
                button.style.justifyContent = 'center';
                button.onclick = function(e) {
                    e.preventDefault();
                    map.setView([userLat, userLng], 13);
                    if (userMarker) {
                        userMarker.setLatLng([userLat, userLng]);
                    }
                };
                return button;
            };
            returnButton.addTo(map);

            function clearSearchStorage() {
                localStorage.removeItem('searchKeyword');
                localStorage.removeItem('searchProvince');
            }

            function fetchZones(keyword, province) {
                $.ajax({
                    url: '{{ route('client.client-list-zone') }}',
                    method: 'GET',
                    data: {
                        keyword: keyword,
                        province: province
                    },
                    success: function(response) {
                        map.eachLayer(function(layer) {
                            if (layer instanceof L.Marker && layer !== userMarker) {
                                map.removeLayer(layer);
                            }
                        });

                        if (response.zones.length > 0) {
                            addMarkers(response.zones);
                            setMapViewToCenter(response.zones);

                            let zoneList = $('#zone-list');
                            zoneList.empty();
                            response.zones.forEach(zone => {
                                zoneList.append(`
                            <div class="zone-item">
                                <h3>${zone.name}</h3>
                                <p>${zone.address}</p>
                            </div>
                        `);
                            });
                        } else {

                        }
                    }
                });
            }

            function initializeMap() {
                var urlParams = new URLSearchParams(window.location.search);
                var keyword = urlParams.get('keyword');
                var province = urlParams.get('province');

                if (!keyword && !province) {
                    clearSearchStorage();
                }

                if (localStorage.getItem('userLat') && localStorage.getItem('userLng')) {
                    userLat = parseFloat(localStorage.getItem('userLat'));
                    userLng = parseFloat(localStorage.getItem('userLng'));

                    setUserMarker(userLat, userLng);

                    if (!keyword && !province) {
                        fetchZonesWithinRadius(userLat, userLng);
                    } else {
                        fetchZones(keyword, province);
                    }
                } else {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            userLat = position.coords.latitude;
                            userLng = position.coords.longitude;

                            localStorage.setItem('userLat', userLat);
                            localStorage.setItem('userLng', userLng);

                            setUserMarker(userLat, userLng);

                            if (!keyword && !province) {
                                fetchZonesWithinRadius(userLat, userLng);
                            } else {
                                fetchZones(keyword, province);
                            }
                        }, function() {

                        });
                    } else {

                    }
                }

                if (localStorage.getItem('mapLat') && localStorage.getItem('mapLng') && localStorage.getItem('mapZoom')) {
                    var mapLat = parseFloat(localStorage.getItem('mapLat'));
                    var mapLng = parseFloat(localStorage.getItem('mapLng'));
                    var mapZoom = parseInt(localStorage.getItem('mapZoom'));

                    map.setView([mapLat, mapLng], mapZoom);
                }

                var searchKeyword = localStorage.getItem('searchKeyword');
                var searchProvince = localStorage.getItem('searchProvince');

                if (searchKeyword || searchProvince) {
                    $('#key-word-1').val(searchKeyword);
                    $('#city-province').val(searchProvince);

                    $.ajax({
                        url: '{{ route('client.client-list-zone') }}',
                        method: 'GET',
                        data: {
                            keyword: searchKeyword,
                            province: searchProvince
                        },
                        success: function(response) {
                            map.eachLayer(function(layer) {
                                if (layer instanceof L.Marker && layer !== userMarker) {
                                    map.removeLayer(layer);
                                }
                            });

                            if (response.zones.length > 0) {
                                addMarkers(response.zones);
                                setMapViewToCenter(response.zones);

                                let zoneList = $('#zone-list');
                                zoneList.empty();
                                response.zones.forEach(zone => {
                                    zoneList.append(`
                            <div class="zone-item">
                                <h3>${zone.name}</h3>
                                <p>${zone.address}</p>
                            </div>
                        `);
                                });
                            } else {

                            }
                        }
                    });
                }
            }

            initializeMap();

            $('.property-search').on('submit', function(e) {



                var keyword = $('#key-word-1').val();
                var province = $('#city-province').val();

                localStorage.setItem('searchKeyword', keyword);
                localStorage.setItem('searchProvince', province);

                var newUrl = new URL(window.location.href);
                newUrl.searchParams.set('keyword', keyword);
                newUrl.searchParams.set('province', province);
                history.pushState(null, '', newUrl.toString());

                $.ajax({
                    url: '{{ route('client.client-list-zone') }}',
                    method: 'GET',
                    data: {
                        keyword: keyword,
                        province: province
                    },
                    success: function(response) {
                        map.eachLayer(function(layer) {
                            if (layer instanceof L.Marker && layer !== userMarker) {
                                map.removeLayer(layer);
                            }
                        });

                        if (response.zones.length > 0) {
                            addMarkers(response.zones);
                            setMapViewToCenter(response.zones);

                            var latitudes = response.zones.map(zone => zone.latitude);
                            var longitudes = response.zones.map(zone => zone.longitude);
                            var avgLat = latitudes.reduce((a, b) => a + b, 0) / latitudes.length;
                            var avgLng = longitudes.reduce((a, b) => a + b, 0) / longitudes.length;
                            map.setView([avgLat, avgLng], 13);

                            let zoneList = $('#zone-list');
                            zoneList.empty();
                            response.zones.forEach(zone => {
                                zoneList.append(`
                                <div class="zone-item">
                                    <h3>${zone.name}</h3>
                                    <p>${zone.address}</p>
                                </div>
                            `);
                            });
                        } else {

                        }
                    }
                });
            });

            let updateUrlTimeout;

            map.on('moveend', function() {
                var center = map.getCenter();

                if (updateUrlTimeout) {
                    clearTimeout(updateUrlTimeout);
                }

                updateUrlTimeout = setTimeout(function() {
                    var newUrl = new URL(window.location.href);
                    newUrl.searchParams.set('lat', center.lat);
                    newUrl.searchParams.set('lng', center.lng);
                    newUrl.searchParams.set('zoom', map.getZoom());
                    history.pushState(null, '', newUrl.toString());

                    localStorage.setItem('mapLat', center.lat);
                    localStorage.setItem('mapLng', center.lng);
                    localStorage.setItem('mapZoom', map.getZoom());
                }, 1000);
            });

            window.addEventListener('popstate', function() {
                var urlParams = new URLSearchParams(window.location.search);
                var keyword = urlParams.get('keyword');
                var province = urlParams.get('province');

                if (!keyword && !province) {
                    clearSearchStorage();
                }

                initializeMap();
            });

            function addOSMMarkers() {
                var overpassUrl =
                    'https://overpass-api.de/api/interpreter?data=[out:json];(node["amenity"="hospital"](around:40000,' +
                    userLat + ',' + userLng + ');node["amenity"="school"](around:40000,' + userLat + ',' + userLng +
                    ');node["amenity"="university"](around:40000,' + userLat + ',' + userLng +
                    ');node["amenity"="police"](around:40000,' + userLat + ',' + userLng + '););out body;';

                $.getJSON(overpassUrl, function(data) {
                    data.elements.forEach(function(element) {
                        var icon;
                        var popupText = element.tags.name || 'No name';

                        if (element.tags.amenity === 'hospital') {
                            icon = hospitalIcon;
                            popupText = ' ' + popupText;
                        } else if (element.tags.amenity === 'school') {
                            icon = schoolIcon;
                            popupText = ' ' + popupText;
                        } else if (element.tags.amenity === 'university') {
                            icon = universityIcon;
                            popupText = ' ' + popupText;
                        } else if (element.tags.amenity === 'police') {
                            icon = policeIcon;
                            popupText = ' ' + popupText;
                        }

                        if (icon) {
                            var marker = L.marker([element.lat, element.lon], {
                                icon: icon
                            });
                            osmMarkers.push(marker);
                            marker.addTo(map).bindPopup(popupText, {
                                className: 'custom-popup'
                            });

                            marker.on('click', function() {
                                if (typeof routingControl !== 'undefined') {
                                    map.removeControl(routingControl);
                                }

                                routingControl = L.Routing.control({
                                    waypoints: [
                                        L.latLng(userLat, userLng),
                                        L.latLng(element.lat, element
                                            .lon)
                                    ],
                                    routeWhileDragging: true,
                                    createMarker: function() {
                                        return null;
                                    },
                                    geocoder: L.Control.Geocoder.nominatim(),
                                    lineOptions: {
                                        styles: [{
                                            color: 'blue',
                                            opacity: 1,
                                            weight: 5
                                        }]
                                    },
                                    showAlternatives: true,
                                    altLineOptions: {
                                        styles: [{
                                            color: 'blue',
                                            opacity: 0.7,
                                            weight: 5
                                        }]
                                    }
                                }).on('routesfound', function(e) {
                                    var routes = e.routes;
                                    var summary = routes[0].summary;
                                    var distance = (summary.totalDistance / 1000).toFixed(
                                        2) + ' km';
                                    var time = (summary.totalTime / 60).toFixed(2) +
                                        ' phút';

                                    var existingInstructions = document.querySelector(
                                        '.custom-instructions');
                                    if (existingInstructions) {
                                        existingInstructions.remove();
                                    }

                                    var instructions = document.createElement('div');
                                    instructions.className = 'custom-instructions';
                                    instructions.innerHTML =
                                        '<strong>Khoảng cách:</strong> ' + distance +
                                        '<br><strong>Thời gian:</strong> ' + time;
                                    document.querySelector('.leaflet-routing-container')
                                        .appendChild(instructions);

                                    // Thêm tên đường vào bảng chỉ đường
                                    var mainRoads = routes[0].instructions.map(function(
                                        step) {
                                        return step.road;
                                    }).filter(function(road, index, self) {
                                        return road && self.indexOf(road) === index;
                                    }).join(', ');

                                    var district = document.createElement('div');
                                    district.className = 'district';
                                    district.innerHTML = '<strong>Tên đường:</strong> ' +
                                        mainRoads;
                                    document.querySelector('.leaflet-routing-container')
                                        .appendChild(district);
                                }).addTo(map);
                            });
                        }
                    });
                });
            }

            function toggleOSMMarkers() {
                if (map.getZoom() >= 14) {
                    osmMarkers.forEach(marker => {
                        if (!map.hasLayer(marker)) {
                            map.addLayer(marker);
                        }
                    });
                } else {
                    osmMarkers.forEach(marker => {
                        if (map.hasLayer(marker)) {
                            map.removeLayer(marker);
                        }
                    });
                }
            }

            function setUserMarker(lat, lng) {
                if (userMarker) {
                    map.removeLayer(userMarker);
                }
                userMarker = L.marker([lat, lng], {
                        icon: userIcon
                    }).addTo(map)
                    .bindPopup("Vị trí của bạn").openPopup();
                map.setView([lat, lng], 13);
                addOSMMarkers();
            }

            map.on('zoomend', function() {
                toggleOSMMarkers();
            });

            function addZoneLinkClickHandlers() {
                document.querySelectorAll('.zone-link').forEach(function(link) {
                    link.addEventListener('click', function() {
                        var lat = parseFloat(this.getAttribute('data-lat'));
                        var lng = parseFloat(this.getAttribute('data-lng'));
                        map.panTo([lat, lng]);


                        map.eachLayer(function(layer) {
                            if (layer instanceof L.Marker) {
                                var markerLatLng = layer.getLatLng();
                                if (markerLatLng.lat === lat && markerLatLng.lng === lng) {
                                    layer.openPopup();
                                }
                            }
                        });
                    });
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                addZoneLinkClickHandlers();
            });
        }

        initMap();
    </script>

    <script>
        window.showLocationAlert = {{ json_encode($showLocationAlert) }};
    </script>
@endpush
