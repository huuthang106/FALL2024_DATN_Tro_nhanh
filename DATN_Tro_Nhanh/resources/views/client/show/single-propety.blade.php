@extends('layouts.main')
@section('titleUs', $rooms->title . ' | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="bg-secondary py-6 py-lg-0">
            <div class="container">
                <form action="{{ route('client.room-listing') }}" method="GET" class="search-form d-none d-lg-block">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <label
                                        class="text-uppercase font-weight-500 opacity-7 text-white letter-spacing-093 mb-1">Loại
                                        Nhà</label>
                                    <select
                                        class="form-control selectpicker bg-transparent border-bottom rounded-0 border-input-opacity-02"
                                        name="category" title="Lựa chọn" data-style="p-0 h-24 lh-17 text-white">
                                         <option>Chung cư</option>
                                         @foreach($categories as $category)
                                         <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                             {{ $category->name }}
                                         </option>
                                     @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 pl-md-3 pt-md-0 pt-6">
                                    <label
                                        class="text-uppercase font-weight-500 opacity-7 text-white letter-spacing-093 mb-1">Vị
                                        Trí</label>
                                    <select
                                        class="form-control selectpicker bg-transparent border-bottom rounded-0 border-input-opacity-02"
                                        name="province" id="city-province" title="Lựa chọn"
                                        data-style="p-0 h-24 lh-17 text-white">
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
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 pt-lg-0 pt-6">
                            <label class="text-uppercase font-weight-500 opacity-7 text-white letter-spacing-093">Tìm
                                kiếm</label>
                            <div class="position-relative">
                                <input type="text" name="search"
                                    class="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 p-0 pr-md-5 text-white placeholder-light font-weight-500 border-input-opacity-02"
                                    placeholder="Nhập địa chỉ, khu phố...">
                                <i
                                    class="far fa-search position-absolute pos-fixed-right-center pr-0 fs-18 text-white pb-2 d-none d-md-block"></i>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 pt-lg-0 pt-7">
                            <button type="submit"
                                class="btn bg-white-opacity-01 bg-white-hover-opacity-03 h-lg-100 w-100 shadow-none text-white rounded-0 fs-16 font-weight-600">
                                Tìm Kiếm
                            </button>
                        </div>
                    </div>
                </form>
                <form class="property-search property-search-mobile d-lg-none">
                    <div class="row align-items-lg-center" id="accordion-mobile">
                        <div class="col-12">
                            <div class="form-group mb-0 position-relative">
                                <a href="#advanced-search-filters-mobile"
                                    class="icon-primary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed"
                                    data-toggle="collapse" data-target="#advanced-search-filters-mobile"
                                    aria-expanded="true" aria-controls="advanced-search-filters-mobile">
                                </a>
                                <input type="text"
                                    class="form-control form-control-lg border-0 shadow-none pr-9 pl-11 bg-white placeholder-muted"
                                    name="key-word" placeholder="Search...">
                                <button type="submit"
                                    class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left bg-white">
                                    <i class="far fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div id="advanced-search-filters-mobile" class="col-12 pt-2 collapse"
                            data-parent="#accordion-mobile">
                            <div class="row mx-n2">
                                <div class="col-sm-6 pt-4 px-2">
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        title="Loại Nhà" data-style="btn-lg py-2 h-52 bg-white" name="type">
                                        <option>Chung cư</option>
                                        <option>Nhà Dành Cho Một Gia Đình</option>
                                        <option>Nhà Phố</option>
                                        <option>Nhà Dành Cho Nhiều Gia Đình</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 pt-4 px-2">
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        name="bedroom" title="Vị Trí" data-style="btn-lg py-2 h-52 bg-white">
                                        <option>An Giang</option>
                                        <option>Hà Nội</option>
                                        <option>Cần Thơ</option>
                                        <option>Tp.Hồ Chí Minh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="bg-gray-01 py-8 py-lg-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb py-3">
                        <li class="breadcrumb-item letter-spacing-1">
                            <a href=".">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item letter-spacing-1">
                            <a href="{{ route('client.room-listing') }}">Danh sách</a>
                        </li>
                        <li class="breadcrumb-item letter-spacing-1 active">{{ $rooms->title }}</li>
                    </ol>
                </nav>
            </div>
        </section>
        <div class="primary-content bg-gray-01 pb-12">
            <div class="container">
                <div class="row">
                    <article class="col-lg-8">
                        <section>
                            <div class="galleries position-relative">
                                <div class="position-absolute pos-fixed-top-right z-index-3">
                                    <ul class="list-inline pt-4 pr-5">
                                        {{-- <li class="list-inline-item mr-2">
                                            <a href="{{ route('client.add.favourite', ['slug' => $rooms->slug]) }}"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </li> --}}
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center favorite-btn {{ $rooms->isFavoritedByUser(auth()->id()) ? 'favorited' : '' }}"
                                                data-room-slug="{{ $rooms->slug }}" title="Yêu thích">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </li>
                                        {{-- <li class="list-inline-item mr-2">
                                            <button type="button"
                                                class="btn btn-white p-0 d-flex align-items-center justify-content-center w-40px h-40 text-heading bg-hover-primary hover-white rounded-circle border-0 shadow-none"
                                                data-container="body" data-toggle="popover" data-placement="top"
                                                data-html="true"
                                                data-content=' <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
	                                                        class="fab fa-twitter"></i></a>
                          </li>
                          <li class="list-inline-item ">
                            <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
	                                                        class="fab fa-facebook-f"></i></a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
	                                                        class="fab fa-instagram"></i></a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
	                                                        class="fab fa-youtube"></i></a>
                          </li>
                        </ul>
                        '>
                                                <i class="far fa-share-alt"></i>
                                            </button>
                                        </li> --}}
                                        {{-- <li class="list-inline-item mr-2">
                                            <button type="button"
                                                class="btn btn-white p-0 d-flex align-items-center justify-content-center w-40px h-40 text-heading bg-hover-primary hover-white rounded-circle border-0 shadow-none"
                                                data-container="body" data-toggle="popover" data-placement="top"
                                                data-html="true"
                                                data-content=' <ul class="list-inline mb-0">
                                                                      <li class="list-inline-item ">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($rooms->title) }}&picture={{ urlencode(asset('assets/images/' . $rooms->images->first()->filename)) }}" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                        </ul>
                        '>
                                                <i class="far fa-share-alt"></i>
                                            </button>
                                        </li> --}}

                                        <li class="list-inline-item mr-2">
                                            <button type="button" id="share-btn"
                                                class="btn btn-white p-0 d-flex align-items-center justify-content-center w-40px h-40 text-heading bg-hover-primary hover-white rounded-circle border-0 shadow-none"
                                                title="Chia sẻ">
                                                <i class="far fa-share-alt"></i>
                                            </button>
                                        </li>
                                        {{-- <li class="list-inline-item">
                                            <a href="#" data-toggle="tooltip" title="In"
                                                class="d-flex align-items-center justify-content-center w-40px h-40 bg-white text-heading bg-hover-primary hover-white rounded-circle">
                                                <i class="far fa-print"></i>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                                <div class="slick-slider slider-for-01 arrow-haft-inner mx-0"
                                    data-slick-options='{"slidesToShow": 1, "autoplay":false,"dots":false,"arrows":false,"asNavFor": ".slider-nav-01"}'>
                                    @foreach ($rooms->images as $image)
                                        <div class="box px-0">
                                            <div class="item item-size-3-2">
                                                <div class="card p-0 hover-change-image">
                                                    <a href="{{ asset('assets/images/' . $image->filename) }}"
                                                        class="card-img" data-gtf-mfp="true" data-gallery-id="04"
                                                        style="background-image:url('{{ asset('assets/images/' . $image->filename) }}')">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="slick-slider slider-nav-01 mt-4 mx-n1 arrow-haft-inner"
                                    data-slick-options='{"slidesToShow": 5, "autoplay":false,"dots":false,"arrows":false,"asNavFor": ".slider-for-01","focusOnSelect": true,"responsive":[{"breakpoint": 768,"settings": {"slidesToShow": 4}},{"breakpoint": 576,"settings": {"slidesToShow": 2}}]}'>
                                    @foreach ($rooms->images as $image)
                                        <div class="box pb-6 px-0">
                                            <div class="bg-hover-white p-1 shadow-hover-xs-3 h-100 rounded-lg">
                                                <img src="{{ asset('assets/images/' . $image->filename) }}"
                                                    alt="Gallery 01" class="h-100 w-100 rounded-lg">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </section>
                        <section class="pb-8 px-6 pt-5 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-3">Mô tả</h4>
                            <p class="mb-0 lh-214">{{ $rooms->description }}</p>
                        </section>
                        <section class="mt-2 pb-3 px-6 pt-5 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-6">Tiện ích phòng</h4>
                            <div class="row">
                                <div class="col-lg-3 col-sm-4 mb-6">
                                    <div class="media">
                                        <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                            <svg class="icon icon-price fs-32 text-primary">
                                                <use xlink:href="#icon-price"></use>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                Diện tích</h5>
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">
                                                @if ($rooms->acreage)
                                                    {{ $rooms->acreage }}m²
                                                @else
                                                    Chưa có thông tin
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-lg-3 col-sm-4 mb-6">                                                                                                                                                                                     </div> -->
                                <div class="col-lg-3 col-sm-4 mb-6">
                                    <div class="media">
                                        <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                            <svg class="icon icon-sofa fs-32 text-primary">
                                                <use xlink:href="#icon-sofa"></use>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                Phòng tắm</h5>
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">
                                                {{ $utilities->bathroom ?? '2' }}</p>

                                        </div>
                                    </div>
                               
                                @if ($rooms->utility && $rooms->utility->garage == 1)
                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media align-items-center">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon icon-Garage fs-32 text-primary">
                                                    <use xlink:href="#icon-Garage"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5
                                                    class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                    GARAGE</h5>
                                                {{-- <p class="mb-0 fs-13 font-weight-bold text-heading">
                                                {{ $utilities->garage ?? '1' }}</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($rooms->utility && $rooms->utility->wifi == 1)
                                    <div class="col-lg-3 col-sm-4 mb-6">
                                        <div class="media align-items-center">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                <svg class="icon fs-32 text-primary" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 640 512">
                                                    <path fill="currentColor"
                                                        d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z" />
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5
                                                    class="my-0 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                    Wifi
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </section>

                                                                                                                                                                            </section> -->
                        <section class="mt-2 pb-7 px-6 pt-5 bg-white rounded-lg">

                            <h4 class="fs-22 text-heading mb-4">Tiện ích văn phòng</h4>
                            <ul class="list-unstyled mb-0 row no-gutters">
                                <li class="col-sm-3 col-6 mb-2">
                                    @if ($utilities && $utilities->wifi == 1)
                                        <i class="far fa-check mr-2 text-primary"></i>
                                    @endif
                                    WiFi
                                </li>

                                <li class="col-sm-3 col-6 mb-2">
                                    @if ($utilities && $utilities->air_conditioning == 1)
                                        <i class="far fa-check mr-2 text-primary"></i>
                                    @endif
                                    Máy điều hòa
                                </li>
                                <li class="col-sm-3 col-6 mb-2">
                                    @if ($utilities && $utilities->garage == 1)
                                        <i class="far fa-check mr-2 text-primary"></i>
                                    @endif
                                    Garage
                                </li>

                            </ul>

                        </section>
                                                                                                                                                                                  </section> -->

                        <section class="mt-2 pb-7 px-6 pt-6 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading lh-15 mb-5">Đánh giá & Nhận xét</h4>
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-sm-6 mb-6 mb-sm-0">
                                            <div class="bg-gray-01 rounded-lg pt-2 px-6 pb-6">
                                                <h5 class="fs-16 lh-2 text-heading mb-6">
                                                    Đánh giá trung bình của người dùng
                                                </h5>
                                                <p class="fs-40 text-heading font-weight-bold mb-6 lh-1">
                                                    {{ number_format($averageRating, 1) }} <span
                                                        class="fs-18 text-gray-light font-weight-normal">/5</span>
                                                </p>
                                                <ul class="list-inline">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li
                                                            class="list-inline-item w-46px h-46 rounded-lg d-inline-flex align-items-center justify-content-center fs-24 mb-1">
                                                            <!-- Tăng fs-18 lên fs-24 -->
                                                            @if ($i <= floor($averageRating))
                                                                <i class="fas fa-star text-warning"></i>
                                                            @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) > 0)
                                                                <i class="fas fa-star-half-alt text-warning"></i>
                                                            @else
                                                                <i class="far fa-star text-border"></i>
                                                            @endif
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 pt-3">
                                            <h5 class="fs-16 lh-2 text-heading mb-5">
                                                Phân tích đánh giá
                                            </h5>
                                            @foreach ($ratingsDistribution as $rating => $percentage)
                                                <div class="d-flex align-items-center mx-n1">
                                                    <ul class="list-inline d-flex px-1 mb-0">
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <li
                                                                class="list-inline-item {{ $rating >= $i ? 'text-warning' : 'text-border' }} mr-1">
                                                                <i class="fas fa-star"></i>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                    <div class="d-block w-100 px-1">
                                                        <div class="progress rating-progress">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: {{ $percentage }}%"
                                                                aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-muted px-1">{{ number_format($percentage, 0) }}%
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>



                        <section class="mt-2 pb-2 px-6 pt-6 bg-white rounded-lg">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <h3 class="fs-16 lh-2 text-heading mb-0 d-inline-block pr-4 border-bottom border-primary">
                                        {{ $comments->count() }} Đánh giá
                                    </h3>
                        
                                    @foreach ($comments as $comment)
                                        <div id="comment-{{ $comment->id }}" class="media border-top pt-7 pb-6 d-sm-flex d-block text-sm-left text-center">
                                            <img src="{{ $comment->user->image ? asset('assets/images/' . $comment->user->image) : asset('assets/images/review-07.jpg') }}"
                                                alt="{{ $comment->user->name }}"
                                                class="mr-sm-8 mb-4 mb-sm-0 custom-avatar">
                        
                                            <div class="media-body">
                                                <div class="row mb-1 align-items-center">
                                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                                        <h4 class="mb-0 text-heading fs-14">{{ $comment->user->name }}</h4>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <ul class="list-inline d-flex justify-content-sm-end justify-content-center mb-0">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <li class="list-inline-item mr-1">
                                                                    <span class="text-warning fs-12 lh-2">
                                                                        <i class="fas fa-star{{ $i <= $comment->rating ? '' : '-o' }}"></i>
                                                                    </span>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                                <p class="mb-3 pr-xl-17">{{ $comment->content }}</p>
                                                <div class="d-flex justify-content-sm-start justify-content-center">
                                                    <p class="mb-0 text-muted fs-13 lh-1">
                                                        {{ $comment->created_at->format('d/m/Y h:i A') }}
                                                        {{-- <a href="#"
                                                            class="mb-0 text-heading border-left border-dark hover-primary lh-1 ml-2 pl-2">Trả
                                                            lời</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>

                        <section class="mt-2 pb-7 px-6 pt-6 bg-white rounded-lg">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <h3 class="fs-16 lh-2 text-heading mb-4">Viết Đánh Giá</h3>
                                    <form id="commentForm" action="{{ route('client.danh-gia') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-4 d-flex justify-content-start">
                                            <div class="rate-input">
                                                <input type="radio" id="star5" name="rating" value="5">
                                                <label for="star5" title="text" class="mb-0 mr-1 lh-1">
                                                    <i class="fas fa-star"></i>
                                                </label>
                                                <input type="radio" id="star4" name="rating" value="4">
                                                <label for="star4" title="text" class="mb-0 mr-1 lh-1">
                                                    <i class="fas fa-star"></i>
                                                </label>
                                                <input type="radio" id="star3" name="rating" value="3">
                                                <label for="star3" title="text" class="mb-0 mr-1 lh-1">
                                                    <i class="fas fa-star"></i>
                                                </label>
                                                <input type="radio" id="star2" name="rating" value="2">
                                                <label for="star2" title="text" class="mb-0 mr-1 lh-1">
                                                    <i class="fas fa-star"></i>
                                                </label>
                                                <input type="radio" id="star1" name="rating" value="1">
                                                <label for="star1" title="text" class="mb-0 mr-1 lh-1">
                                                    <i class="fas fa-star"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-6">
                                            <textarea class="form-control form-control-lg border-0" placeholder="Đánh giá của bạn" name="content"
                                                rows="5"></textarea>
                                        </div>
                                        <input type="hidden" name="room_slug" value="{{ $rooms->slug }}">
                                        <button type="submit" class="btn btn-lg btn-primary px-10">Gửi</button>
                                    </form>



                                </div>
                            </div>
                        </section>
                        <!-- <section class="mt-2 pb-5 px-6 pt-6 bg-white rounded-lg">
                                                                                                                                                                                                                                                                                                                                                                                            <h4 class="fs-22 text-heading mb-5">Gần đó là gì?</h4>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="mt-4">
                                                                                                                                                                                                                                                                                                                                                                                                <h6 class="mb-0 mt-5"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                        class="fs-16 lh-2 text-heading border-bottom border-primary pb-1">Nhà hàng</a>
                                                                                                                                                                                                                                                                                                                                                                                                </h6>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="border-top pt-2">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="py-3 border-bottom d-sm-flex justify-content-sm-between">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="media align-items-sm-center d-sm-flex d-block">
                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="hover-shine">
                                                                                                                                                                                                                                                                                                                                                                                                                <img src="{{ asset('assets/images/single-detail-property-02.jpg') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                    class="mr-sm-4 rounded-lg w-sm-90"
                                                                                                                                                                                                                                                                                                                                                                                                                    alt="Bacchanal Buffet-Temporarily Closed">
                                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="mt-sm-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <h4 class="my-0"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                                        class="lh-186 fs-15 text-heading hover-primary">
                                                                                                                                                                                                                                                                                                                                                                                                                        Bacchanal Buffet-Tạm thời đóng cửa</a></h4>
                                                                                                                                                                                                                                                                                                                                                                                                                <p class="lh-186 fs-15 font-weight-500 mb-0">3570 S Las Vegas BlvdLas
                                                                                                                                                                                                                                                                                                                                                                                                                    Vegas, NV 89109</p>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                            <p class="mb-2 mb-0 lh-13">120 Đánh giá</p>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="py-3 border-bottom d-sm-flex justify-content-sm-between">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="media align-items-sm-center d-sm-flex d-block">
                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="hover-shine">
                                                                                                                                                                                                                                                                                                                                                                                                                <img src="{{ asset('assets/images/single-detail-property-03.jpg') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                    class="mr-sm-4 rounded-lg w-sm-90"
                                                                                                                                                                                                                                                                                                                                                                                                                    alt="Bacchanal Buffet-Temporarily Closed">
                                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="mt-sm-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <h4 class="my-0"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                                        class="lh-186 fs-15 text-heading hover-primary">
                                                                                                                                                                                                                                                                                                                                                                                                                        Bacchanal Buffet-Tạm thời đóng cửa</a></h4>
                                                                                                                                                                                                                                                                                                                                                                                                                <p class="lh-186 fs-15 font-weight-500 mb-0">3084 S Highland DrSte C</p>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                            <p class="mb-2 mb-0 lh-13">120 Đánh giá</p>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-1"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="py-3 border-bottom d-sm-flex justify-content-sm-between">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="media align-items-sm-center d-sm-flex d-block">
                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="hover-shine">
                                                                                                                                                                                                                                                                                                                                                                                                                <img src="{{ asset('assets/images/single-detail-property-04.jpg') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                    class="mr-sm-4 rounded-lg w-sm-90"
                                                                                                                                                                                                                                                                                                                                                                                                                    alt="Bacchanal Buffet-Temporarily Closed">
                                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="mt-sm-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <h4 class="my-0"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                                        class="lh-186 fs-15 text-heading hover-primary">
                                                                                                                                                                                                                                                                                                                                                                                                                        Bacchanal Buffet-Tạm thời đóng cửa</a></h4>
                                                                                                                                                                                                                                                                                                                                                                                                                <p class="lh-186 fs-15 font-weight-500 mb-0">3570 S Las Vegas BlvdLas
                                                                                                                                                                                                                                                                                                                                                                                                                    Vegas, NV 89109</p>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                            <p class="mb-2 mb-0 lh-13">120 Đánh giá</p>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <h6 class="mb-0 mt-5"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                        class="fs-16 lh-2 text-heading border-bottom border-primary pb-1">Giáo dục</a>
                                                                                                                                                                                                                                                                                                                                                                                                </h6>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="border-top pt-2">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="py-3 border-bottom d-sm-flex justify-content-sm-between">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="media align-items-sm-center d-sm-flex d-block">
                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="hover-shine">
                                                                                                                                                                                                                                                                                                                                                                                                                <img src="{{ asset('assets/images/single-detail-property-07.jpg') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                    class="mr-sm-4 rounded-lg w-sm-90"
                                                                                                                                                                                                                                                                                                                                                                                                                    alt="Bacchanal Buffet-Temporarily Closed">
                                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="mt-sm-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <h4 class="my-0"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                                        class="lh-186 fs-15 text-heading hover-primary">
                                                                                                                                                                                                                                                                                                                                                                                                                        Huấn luyện sử dụng vũ khí an toàn</a></h4>
                                                                                                                                                                                                                                                                                                                                                                                                                <p class="lh-186 fs-15 font-weight-500 mb-0">3570 S Las Vegas BlvdLas
                                                                                                                                                                                                                                                                                                                                                                                                                    Vegas, NV 89109</p>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                            <p class="mb-2 mb-0 lh-13">120 Đánh giá</p>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="py-3 border-bottom d-sm-flex justify-content-sm-between">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="media align-items-sm-center d-sm-flex d-block">
                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="hover-shine">
                                                                                                                                                                                                                                                                                                                                                                                                                <img src="{{ asset('assets/images/single-detail-property-08.jpg') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                    class="mr-sm-4 rounded-lg w-sm-90"
                                                                                                                                                                                                                                                                                                                                                                                                                    alt="Bacchanal Buffet-Temporarily Closed">
                                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="mt-sm-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <h4 class="my-0"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                                        class="lh-186 fs-15 text-heading hover-primary">Thầy tu Shai
                                                                                                                                                                                                                                                                                                                                                                                                                        Specht-Sandler</a></h4>
                                                                                                                                                                                                                                                                                                                                                                                                                <p class="lh-186 fs-15 font-weight-500 mb-0">3084 S Highland DrSte C</p>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                            <p class="mb-2 mb-0 lh-13">120 Đánh giá</p>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-1"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="py-3 border-bottom d-sm-flex justify-content-sm-between">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="media align-items-sm-center d-sm-flex d-block">
                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="hover-shine">
                                                                                                                                                                                                                                                                                                                                                                                                                <img src="{{ asset('assets/images/single-detail-property-09.jpg') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                    class="mr-sm-4 rounded-lg w-sm-90"
                                                                                                                                                                                                                                                                                                                                                                                                                    alt="Bacchanal Buffet-Temporarily Closed">
                                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="mt-sm-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <h4 class="my-0"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                                        class="lh-186 fs-15 text-heading hover-primary">
                                                                                                                                                                                                                                                                                                                                                                                                                        Huấn luyện sử dụng vũ khí an toàn</a></h4>
                                                                                                                                                                                                                                                                                                                                                                                                                <p class="lh-186 fs-15 font-weight-500 mb-0">3570 S Las Vegas BlvdLas
                                                                                                                                                                                                                                                                                                                                                                                                                    Vegas, NV 89109</p>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                            <p class="mb-2 mb-0 lh-13">120 Đánh giá</p>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <h6 class="mb-0 mt-5"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                        class="fs-16 lh-2 text-heading border-bottom border-primary pb-1">Sức khỏe & Y
                                                                                                                                                                                                                                                                                                                                                                                                        tế</a></h6>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="border-top pt-2">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="py-3 border-bottom d-sm-flex justify-content-sm-between">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="media align-items-sm-center d-sm-flex d-block">
                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="hover-shine">
                                                                                                                                                                                                                                                                                                                                                                                                                <img src="{{ asset('assets/images/single-detail-property-10.jpg') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                    class="mr-sm-4 rounded-lg w-sm-90"
                                                                                                                                                                                                                                                                                                                                                                                                                    alt="Bacchanal Buffet-Temporarily Closed">
                                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="mt-sm-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <h4 class="my-0"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                                        class="lh-186 fs-15 text-heading hover-primary">Coppola David F DC
                                                                                                                                                                                                                                                                                                                                                                                                                        & Assoc</a></h4>
                                                                                                                                                                                                                                                                                                                                                                                                                <p class="lh-186 fs-15 font-weight-500 mb-0">3570 S Las Vegas BlvdLas
                                                                                                                                                                                                                                                                                                                                                                                                                    Vegas, NV 89109</p>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                            <p class="mb-2 mb-0 lh-13">120 Đánh giá</p>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            <i
                                                                                                                                                                                                                                                                                                                                                                                                                class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm"></i>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="py-3 border-bottom d-sm-flex justify-content-sm-between">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="media align-items-sm-center d-sm-flex d-block">
                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="hover-shine">
                                                                                                                                                                                                                                                                                                                                                                                                                <img src="{{ asset('assets/images/single-detail-property-11.jpg') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                    class="mr-sm-4 rounded-lg w-sm-90"
                                                                                                                                                                                                                                                                                                                                                                                                                    alt="Bacchanal Buffet-Temporarily Closed">
                                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="mt-sm-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <h4 class="my-0"><a href="#"
                                                                                                                                                                                                                                                                                                                                                                                                                        class="lh-186 fs-15 text-heading hover-primary">
                                                                                                                                                                                                                                                                                                                                                                                                                        Trung tâm y tế Elite</a></h4>
                                                                                                                                                                                                                                                                                                                                                                                                                <p class="lh-186 fs-15 font-weight-500 mb-0">3084 S Highland DrSte C</p>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                            <p class="mb-2 mb-0 lh-13">120 Đánh giá</p>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="text-lg-right mt-lg-0 mt-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-7"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                <i
                                                                                                                                                                                                                                                                                                                                                                                                                    class="fas fa-star w-18px h-18 d-inline-flex justify-content-center align-items-center rate-bg-blue text-white fs-12 rounded-sm opacity-1"></i>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </section> -->
                        <!-- <section class="mt-2 pb-7 px-6 pt-6 bg-white rounded-lg">
                                                                                                                                                                                                                                                                                                                                                                                            <h4 class="fs-22 text-heading mb-6">Tài Liệu Đính Kèm</h4>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="d-sm-flex">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="w-sm-170 mb-sm-0 mb-6 mr-sm-6">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="card text-center pt-4">
                                                                                                                                                                                                                                                                                                                                                                                                        <img src="{{ asset('assets/images/single-detail-property-05.png') }}"
                                                                                                                                                                                                                                                                                                                                                                                                            class="card-img card-img w-78px mx-auto"
                                                                                                                                                                                                                                                                                                                                                                                                            alt="Tài liệu Word về Villa Called Archangel">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="card-body p-0 mt-4">
                                                                                                                                                                                                                                                                                                                                                                                                            <p class="fs-13 lh-2 mb-0 py-0 px-2">Tài liệu Word về Villa Called Archangel
                                                                                                                                                                                                                                                                                                                                                                                                            </p>
                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="btn btn-block bg-gray-01 border-0 fs-14 text-heading">Tải
                                                                                                                                                                                                                                                                                                                                                                                                                về<i class="far fa-arrow-alt-circle-down ml-1 text-primary"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="w-sm-170 mb-sm-0 mb-6 mr-sm-6">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="card text-center pt-4">
                                                                                                                                                                                                                                                                                                                                                                                                        <img src="{{ asset('assets/images/single-detail-property-06.png') }}"
                                                                                                                                                                                                                                                                                                                                                                                                            class="card-img card-img w-78px mx-auto"
                                                                                                                                                                                                                                                                                                                                                                                                            alt="Tài liệu PDF về Villa Called Archangel">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="card-body p-0 mt-4">
                                                                                                                                                                                                                                                                                                                                                                                                            <p class="fs-13 lh-2 mb-0 py-0 px-2">Tài liệu PDF về Villa Called Archangel</p>
                                                                                                                                                                                                                                                                                                                                                                                                            <a href="#" class="btn btn-block bg-gray-01 border-0 fs-14 text-heading">Tải
                                                                                                                                                                                                                                                                                                                                                                                                                về<i class="far fa-arrow-alt-circle-down ml-1 text-primary"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </section> -->
                        <!-- <section class="mt-2 pb-6 px-6 pt-6 bg-white rounded-lg">
                                                                                                                                                                                                                                                                                                                                                                                            <h4 class="fs-22 text-heading mb-6">Virtual Tour</h4>
                                                                                                                                                                                                                                                                                                                                                                                            <iframe height="430"
                                                                                                                                                                                                                                                                                                                                                                                                src="https://my.matterport.com/show/?m=wWcGxjuUuSb&amp;utm_source=hit-content-embed"
                                                                                                                                                                                                                                                                                                                                                                                                allowfullscreen="" class="w-100"></iframe>
                                                                                                                                                                                                                                                                                                                                                                                        </section> -->
                        <section class="mt-2 pb-6 px-6 pt-6 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-6">Vị trí</h4>
                            <p class="mb-0 p-3 bg-white shadow rounded-lg">
                                {{ $rooms->address }}</p>
                            <div class="position-relative">
                                <div class="position-relative">
                                    <div id="map" style="height: 296px"></div>
                                </div>
                        </section>
                        <!-- <section class="mt-2 pb-7 px-6 pt-6 bg-white rounded-lg">
                                                                                                                                                                                                                                                                                                                                                                                            <h4 class="fs-22 text-heading mb-5">Máy Tính Vay Mua Nhà</h4>
                                                                                                                                                                                                                                                                                                                                                                                            <form>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-md-6 mb-4">
                                                                                                                                                                                                                                                                                                                                                                                                        <label>Số Tiền Tổng</label>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="position-relative">
                                                                                                                                                                                                                                                                                                                                                                                                            <input type="number" class="form-control border-0 pr-3 h-52 pl-7" value="345"
                                                                                                                                                                                                                                                                                                                                                                                                                name="total-amount">
                                                                                                                                                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                                                                                                                                                class="position-absolute pl-3 pos-fixed-left-center fs-13 font-weight-600">$</span>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-md-6 mb-4">
                                                                                                                                                                                                                                                                                                                                                                                                        <label>Tiền Đặt Cọc</label>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="position-relative">
                                                                                                                                                                                                                                                                                                                                                                                                            <input type="number" class="form-control border-0 pr-3 h-52 pl-7" value="0"
                                                                                                                                                                                                                                                                                                                                                                                                                name="down-payment">
                                                                                                                                                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                                                                                                                                                class="position-absolute pl-3 pos-fixed-left-center fs-13 font-weight-600">$</span>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-md-6 mb-4">
                                                                                                                                                                                                                                                                                                                                                                                                        <label>Lãi Suất</label>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="position-relative">
                                                                                                                                                                                                                                                                                                                                                                                                            <input type="number" class="form-control border-0 pr-3 h-52 pl-7" value="2.500"
                                                                                                                                                                                                                                                                                                                                                                                                                step="0.25" name="interest-rate">
                                                                                                                                                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                                                                                                                                                class="position-absolute pl-3 pos-fixed-left-center fs-13 font-weight-600">%</span>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-md-6 mb-4">
                                                                                                                                                                                                                                                                                                                                                                                                        <label>Số Năm</label>
                                                                                                                                                                                                                                                                                                                                                                                                        <input type="number" class="form-control border-0 px-3 h-52" value="25"
                                                                                                                                                                                                                                                                                                                                                                                                            name="years">
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="form-group mb-6">
                                                                                                                                                                                                                                                                                                                                                                                                    <label>Thời Gian Thanh Toán</label>
                                                                                                                                                                                                                                                                                                                                                                                                    <select class="form-control selectpicker" data-style="btn-lg h-52 px-3"
                                                                                                                                                                                                                                                                                                                                                                                                        name="payment-period">
                                                                                                                                                                                                                                                                                                                                                                                                        <option selected>Hàng Tháng</option>
                                                                                                                                                                                                                                                                                                                                                                                                        <option>Hàng Năm</option>
                                                                                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-lg-6">
                                                                                                                                                                                                                                                                                                                                                                                                        <button class="btn btn-primary fs-14 h-52 px-8" type="submit">Tính Toán</button>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-lg-6">
                                                                                                                                                                                                                                                                                                                                                                                                        <div
                                                                                                                                                                                                                                                                                                                                                                                                            class="shadow-xxs-2 pt-1 pb-2 px-6 border-bottom border-primary border-5x rounded-lg">
                                                                                                                                                                                                                                                                                                                                                                                                            <dl class="d-flex mb-0 justify-content-between py-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <dt class="font-weight-normal">Thanh Toán Hàng Tháng</dt>
                                                                                                                                                                                                                                                                                                                                                                                                                <dd class="font-weight-500 text-heading mb-0">$33</dd>
                                                                                                                                                                                                                                                                                                                                                                                                            </dl>
                                                                                                                                                                                                                                                                                                                                                                                                            <dl class="d-flex mb-0 justify-content-between border-top py-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <dt class="font-weight-normal">Tổng Chi Phí Vay</dt>
                                                                                                                                                                                                                                                                                                                                                                                                                <dd class="font-weight-500 text-heading mb-0">$464</dd>
                                                                                                                                                                                                                                                                                                                                                                                                            </dl>
                                                                                                                                                                                                                                                                                                                                                                                                            <dl class="d-flex mb-0 justify-content-between border-top py-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <dt class="font-weight-normal">Tổng Lãi Suất Đã Thanh Toán</dt>
                                                                                                                                                                                                                                                                                                                                                                                                                <dd class="font-weight-500 text-heading mb-0">$119</dd>
                                                                                                                                                                                                                                                                                                                                                                                                            </dl>
                                                                                                                                                                                                                                                                                                                                                                                                            <dl class="d-flex mb-0 justify-content-between border-top py-2">
                                                                                                                                                                                                                                                                                                                                                                                                                <dt class="font-weight-normal">Thanh Toán Vay Mua Nhà</dt>
                                                                                                                                                                                                                                                                                                                                                                                                                <dd class="font-weight-500 text-heading mb-0">$1.55</dd>
                                                                                                                                                                                                                                                                                                                                                                                                            </dl>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </form>
                                                                                                                                                                                                                                                                                                                                                                                        </section> -->
                        <!-- <section class="mt-2 pb-4 px-6 pt-6 bg-white rounded-lg chart">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="card border-0">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="card-body p-0 collapse-tabs">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="d-flex align-items-center mb-5">
                                                                                                                                                                                                                                                                                                                                                                                                        <h2 class="mb-0 text-heading fs-22 lh-15 mr-auto">Thống kê trang</h2>
                                                                                                                                                                                                                                                                                                                                                                                                        <ul class="nav nav-pills nav-pills-01 justify-content-end d-none d-sm-flex"
                                                                                                                                                                                                                                                                                                                                                                                                            role="tablist">
                                                                                                                                                                                                                                                                                                                                                                                                            <li class="nav-item px-5 py-1">
                                                                                                                                                                                                                                                                                                                                                                                                                <a class="nav-link active bg-transparent shadow-none p-0 letter-spacing-1"
                                                                                                                                                                                                                                                                                                                                                                                                                    id="hours-tab" data-toggle="tab" href="#hours" role="tab"
                                                                                                                                                                                                                                                                                                                                                                                                                    aria-controls="hours" aria-selected="true">Giời</a>
                                                                                                                                                                                                                                                                                                                                                                                                            </li>
                                                                                                                                                                                                                                                                                                                                                                                                            <li class="nav-item px-5 py-1">
                                                                                                                                                                                                                                                                                                                                                                                                                <a class="nav-link bg-transparent shadow-none p-0 letter-spacing-1"
                                                                                                                                                                                                                                                                                                                                                                                                                    id="weekly-tab" data-toggle="tab" href="#weekly" role="tab"
                                                                                                                                                                                                                                                                                                                                                                                                                    aria-controls="weekly" aria-selected="false">Hàng tuần</a>
                                                                                                                                                                                                                                                                                                                                                                                                            </li>
                                                                                                                                                                                                                                                                                                                                                                                                            <li class="nav-item px-5 py-1">
                                                                                                                                                                                                                                                                                                                                                                                                                <a class="nav-link bg-transparent shadow-none p-0 letter-spacing-1"
                                                                                                                                                                                                                                                                                                                                                                                                                    id="monthly-tab" data-toggle="tab" href="#monthly" role="tab"
                                                                                                                                                                                                                                                                                                                                                                                                                    aria-controls="monthly" aria-selected="false">Hàng
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
                                                                                                                                                                                                                                                                                                                                                                                                                                Giời
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
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="tab-pane tab-pane-parent fade px-0" id="weekly" role="tabpanel"
                                                                                                                                                                                                                                                                                                                                                                                                                aria-labelledby="weekly-tab">
                                                                                                                                                                                                                                                                                                                                                                                                                <div class="card bg-transparent mb-sm-0 border-0">
                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0"
                                                                                                                                                                                                                                                                                                                                                                                                                        id="headingWeekly">
                                                                                                                                                                                                                                                                                                                                                                                                                        <h5 class="mb-0">
                                                                                                                                                                                                                                                                                                                                                                                                                            <button
                                                                                                                                                                                                                                                                                                                                                                                                                                class="btn collapse-parent font-size-h5 btn-block collapsed border shadow-none"
                                                                                                                                                                                                                                                                                                                                                                                                                                data-toggle="collapse" data-target="#weekly-collapse"
                                                                                                                                                                                                                                                                                                                                                                                                                                aria-expanded="true" aria-controls="weekly-collapse">
                                                                                                                                                                                                                                                                                                                                                                                                                                Hàng tuần
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
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="tab-pane tab-pane-parent fade px-0" id="monthly" role="tabpanel"
                                                                                                                                                                                                                                                                                                                                                                                                                aria-labelledby="monthly-tab">
                                                                                                                                                                                                                                                                                                                                                                                                                <div class="card bg-transparent mb-sm-0 border-0">
                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0"
                                                                                                                                                                                                                                                                                                                                                                                                                        id="headingMonthly">
                                                                                                                                                                                                                                                                                                                                                                                                                        <h5 class="mb-0">
                                                                                                                                                                                                                                                                                                                                                                                                                            <button
                                                                                                                                                                                                                                                                                                                                                                                                                                class="btn btn-block collapse-parent collapsed border shadow-none"
                                                                                                                                                                                                                                                                                                                                                                                                                                data-toggle="collapse" data-target="#monthly-collapse"
                                                                                                                                                                                                                                                                                                                                                                                                                                aria-expanded="true" aria-controls="monthly-collapse">
                                                                                                                                                                                                                                                                                                                                                                                                                                Hàng tháng
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
                                                                                                                                                                                                                                                                                                                                                                                        </section> -->
                        @if ($similarRooms->isNotEmpty())
                            <section class="mt-2 pb-7 px-6 pt-6 bg-white rounded-lg">
                                <h4 class="fs-22 text-heading mb-6">Có thể bạn sẽ quan tâm </h4>
                                <div class="slick-slider"
                                    data-slick-options='{"slidesToShow": 2, "dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":2}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
                                    @foreach ($similarRooms as $similarRoom)
                                        <div class="box">
                                            <div class="card shadow-hover-2 =">
                                                <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                    <div class="image-wrapper"
                                                        style="padding-top: 66.67%; position: relative; overflow: hidden;">
                                                        @if ($similarRoom->images->isNotEmpty())
                                                            <img src="{{ asset('assets/images/' . $similarRoom->images->first()->filename) }}"
                                                                alt="{{ $similarRoom->title }}"
                                                                class="img-fluid rounded position-absolute"
                                                                style="top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                                        @else
                                                            <img src="{{ asset('assets/images/properties-grid-01.jpg') }}"
                                                                alt="{{ $similarRoom->title }}"
                                                                class="img-fluid rounded position-absolute"
                                                                style="top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                                        @endif
                                                    </div>
                                                    <div class="card-img-overlay p-2 d-flex flex-column">

                                                        @if ($similarRoom->expiration_date > now())
                                                            <div>
                                                                <span class="badge mr-2 badge-danger">VIP</span>
                                                            </div>
                                                        @endif
                                                        <ul class="list-inline mb-0 mt-auto hover-image">
                                                            {{-- <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                                title="9 Images">
                                                                <a href="#" class="text-white hover-primary">
                                                                    <i class="far fa-images"></i><span
                                                                        class="pl-1">9</span>
                                                                </a>
                                                            </li> --}}

                                                            <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                                title="{{ $similarRoom->images_count }} ảnh">
                                                                <a href="#" class="text-white hover-primary">
                                                                    <i class="far fa-images"></i><span
                                                                        class="pl-1">{{ $similarRoom->images_count }}</span>
                                                                </a>
                                                            </li>
                                                            {{-- <li class="list-inline-item" data-toggle="tooltip"
                                                                title="2 Video">
                                                                <a href="#" class="text-white hover-primary">
                                                                    <i class="far fa-play-circle"></i><span
                                                                        class="pl-1">2</span>
                                                                </a>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-3">
                                                    <h2 class="card-title fs-16 lh-2 mb-0"><a
                                                            href="{{ route('client.detail-room', ['slug' => $similarRoom->slug]) }}"
                                                            class="text-dark hover-primary">{{ $similarRoom->title }}</a>
                                                    </h2>
                                                    <p class="card-text font-weight-500 text-gray-light mb-2">
                                                        {{ $similarRoom->address }}</p>
                                                    <ul class="list-inline d-flex mb-0 flex-wrap mr-n4">
                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                            data-toggle="tooltip" title="Diện tích">
                                                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                                                <use xlink:href="#icon-square"></use>
                                                            </svg>
                                                            @if ($similarRoom->acreage)
                                                                {{ $similarRoom->acreage }}m²
                                                            @else
                                                                Chưa có thông tin
                                                            @endif
                                                        </li>
                                                        @if ($similarRoom->utility && $similarRoom->utility->bathrooms == 1)
                                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                                data-toggle="tooltip" title="Phòng tắm">
                                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                                    <use xlink:href="#icon-shower"></use>
                                                                </svg>
                                                                Phòng tắm
                                                            </li>
                                                        @endif
                                                        @if ($similarRoom->utility && $similarRoom->utility->garage == 1)
                                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                                data-toggle="tooltip" title="Garage">
                                                                <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                                    <use xlink:href="#icon-Garage"></use>
                                                                </svg>
                                                                Ga-ra
                                                            </li>
                                                        @endif
                                                        @if ($similarRoom->utility && $similarRoom->utility->wifi == 1)
                                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                                data-toggle="tooltip" title="WiFi">
                                                                <svg class="icon fs-18 text-primary mr-1"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 640 512">
                                                                    <path fill="currentColor"
                                                                        d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z" />
                                                                </svg>
                                                                WiFi
                                                            </li>
                                                        @endif
                                                        {{-- @if ($rooms->utility && $rooms->utility->bathrooms == 1)
                                                            <div class="col-6 mb-3">
                                                                <div class="media align-items-center">
                                                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2 lh-1">
                                                                        <svg class="icon icon-shower fs-18 text-primary">
                                                                            <use xlink:href="#icon-shower"></use>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h5 class="fs-13 font-weight-normal mb-0">Phòng tắm
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="col-6 mb-3">
                                                            <div class="media">
                                                                <div class="p-2 shadow-xxs-1 rounded-lg mr-2 lh-1">
                                                                    <svg class="icon icon-square fs-18 text-primary">
                                                                        <use xlink:href="#icon-square"></use>
                                                                    </svg>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h5 class="fs-13 font-weight-normal mb-0">Diện tích
                                                                    </h5>
                                                                    <p class="mb-0 fs-13 font-weight-bold text-dark">
                                                                        @if ($rooms->acreage)
                                                                            {{ $rooms->acreage }}m²
                                                                        @else
                                                                            Chưa có thông tin
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($rooms->utility && $rooms->utility->garage == 1)
                                                            <div class="col-6 mb-3">
                                                                <div class="media align-items-center">
                                                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2 lh-1">
                                                                        <svg class="icon icon-Garage fs-18 text-primary">
                                                                            <use xlink:href="#icon-Garage"></use>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h5 class="fs-13 font-weight-normal mb-0">Garage
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($rooms->utility && $rooms->utility->wifi == 1)
                                                            <div class="col-lg-3 col-sm-4 mb-6">
                                                                <div class="media align-items-center">
                                                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                                        <svg class="icon fs-18 text-primary"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 640 512">
                                                                            <path fill="currentColor"
                                                                                d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h5
                                                                            class="my-0 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                                            Wifi
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif --}}
                                                    </ul>
                                                </div>
                                                <div
                                                    class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                                    <p class="fs-17 font-weight-bold text-heading mb-0">
                                                        {{ number_format($similarRoom->price, 0, ',', '.') }} VND</p>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item mr-2">
                                                            <a href="#"
                                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center favorite-btn {{ $rooms->isFavoritedByUser(auth()->id()) ? 'favorited' : '' }}"
                                                                data-room-slug="{{ $rooms->slug }}" title="Yêu thích">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </li>

                                                        {{-- <li class="list-inline-item">
                                                            <a href="#"
                                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                                                data-toggle="tooltip" title="Compare"><i
                                                                    class="fas fa-exchange-alt"></i></a>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        @endif
                    </article>
                    <aside class="col-lg-4 pl-xl-4 primary-sidebar sidebar-sticky" id="sidebar">
                        <div class="primary-sidebar-inner">
                            <div class="bg-white rounded-lg py-lg-6 pl-lg-6 pr-lg-3 p-4">
                                @if ($rooms->expiration_date > now())
                                    <ul class="list-inline d-sm-flex align-items-sm-center mb-2">
                                        {{-- <li class="list-inline-item badge badge-orange mr-2">Đặc sắc</li> --}}
                                        <li class="list-inline-item badge badge-danger mr-3">VIP</li>
                                    </ul>
                                @endif
                                <h2 class="fs-22 text-heading pt-2">{{ $rooms->title }}</h2>
                                <p class="mb-2"><i class="fal fa-map-marker-alt mr-1"></i>{{ $rooms->address }}</p>
                                <div class="d-flex align-items-center">
                                    <p class="fs-22 text-heading font-weight-bold mb-0 mr-6">
                                        {{ number_format($rooms->price, 0, ',', '.') }} VND</p>
                                </div>
                                <div class="row mt-5">
                                    <!-- <div class="col-6 mb-3">
                                                                                                                                                                                                                            <div class="media">
                                                                                                                                                                                                                                <div class="p-2 shadow-xxs-1 rounded-lg mr-2 lh-1">
                                                                                                                                                                                                                                    <svg class="icon icon-bedroom fs-18 text-primary">
                                                                                                                                                                                                                                        <use xlink:href="#icon-bedroom"></use>
                                                                                                                                                                                                                                    </svg>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                <div class="media-body">
                                                                                                                                                                                                                                    <h5 class="fs-13 font-weight-normal mb-0">Phòng ngủ</h5>
                                                                                                                                                                                                                                    <p class="mb-0 fs-13 font-weight-bold text-dark">3</p>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                        </div> -->
                                    <div class="col-6 mb-3">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2 lh-1">
                                                <svg class="icon icon-shower fs-18 text-primary">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="fs-13 font-weight-normal mb-0">Phòng tắm</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-dark">
                                                    {{ $utilities->bathroom ?? '2' }}</p>
                                            </div>
                                        </div>
                                    
                                    <div class="col-6 mb-3">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2 lh-1">
                                                <svg class="icon icon-square fs-18 text-primary">
                                                    <use xlink:href="#icon-square"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="fs-13 font-weight-normal mb-0">Diện tích</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-dark">
                                                    @if ($rooms->acreage)
                                                        {{ $rooms->acreage }}m²
                                                    @else
                                                        Chưa có thông tin
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($rooms->utility && $rooms->utility->garage == 1)
                                        <div class="col-6 mb-3">
                                            <div class="media align-items-center">
                                                <div class="p-2 shadow-xxs-1 rounded-lg mr-2 lh-1">
                                                    <svg class="icon icon-Garage fs-18 text-primary">
                                                        <use xlink:href="#icon-Garage"></use>
                                                    </svg>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="fs-13 font-weight-normal mb-0">Garage</h5>
                                                    {{-- <p class="mb-0 fs-13 font-weight-bold text-dark">
                                                    {{ $utilities->garage ?? '1' }}</p> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($rooms->utility && $rooms->utility->wifi == 1)
                                        <div class="col-lg-3 col-sm-4 mb-6">
                                            <div class="media align-items-center">
                                                <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                                    <svg class="icon fs-18 text-primary"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                        <path fill="currentColor"
                                                            d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z" />
                                                    </svg>
                                                </div>
                                                <div class="media-body">
                                                    <h5
                                                        class="my-0 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                        Wifi
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                {{-- <p class="mb-6 mt-1">{{ $rooms->description }}</p> --}}
                                <div class="mr-xl-2">
                                    <a href="{{ route('client.client-agent-detail', ['slug' => $user->slug]) }}"
                                        class="btn btn-outline-primary btn-lg btn-block rounded border text-body border-hover-primary hover-white">Người
                                        đăng: {{ $user->name }}</a>
                                    @auth
                                        <a data-toggle="modal" href="#report-modal"
                                            class="btn btn-outline-primary btn-lg btn-block rounded border text-body border-hover-primary hover-white mt-4">Gửi
                                            báo cáo</a>
                                    @else
                                        <a data-toggle="modal" href="#login-register-modal"
                                            class="btn btn-outline-primary btn-lg btn-block rounded border text-body border-hover-primary hover-white mt-4">Đăng
                                            nhập để gửi báo cáo</a>
                                    @endauth
                                    <a href="#"
                                        class="btn btn-outline-primary btn-lg btn-block rounded border text-body border-hover-primary hover-white mt-4">Yêu
                                        cầu thông tin</a>

                                    @if ($zone)
                                        <!-- Nút để mở modal -->
                                        <button type="button"
                                            class="btn btn-outline-primary btn-lg btn-block rounded border text-body border-hover-primary hover-white mt-4"
                                            data-bs-toggle="modal" data-bs-target="#accountInfoModal">
                                            Tham gia khu trọ
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="accountInfoModal" tabindex="-1"
                                            aria-labelledby="accountInfoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="accountInfoModalLabel">Xác nhận thông
                                                            tin</h5>
                                                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button> --}}
                                                        <button type="button" class="close fs-23"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($identity)
                                                            <!-- Nếu người dùng đã có thông tin identity -->
                                                            <form id="account-info-form" method="POST"
                                                                action="{{ route('client.dang-ky-zone') }}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label class="info-label">Tên khu trọ:
                                                                        <span
                                                                            class="info-text">{{ $zone->name ?? 'Không có khu trọ' }}</span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="info-label">Tên trọ:
                                                                        <span
                                                                            class="info-text">{{ $rooms->title ?? 'Chưa có tên trọ' }}</span>
                                                                    </label>
                                                                </div>
                                                                <!-- Thêm các input ẩn để gửi dữ liệu -->
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ $user->id ?? '' }}">
                                                                <input type="hidden" name="room_id"
                                                                    value="{{ $rooms->id ?? '' }}">
                                                                <input type="hidden" name="zone_id"
                                                                    value="{{ $zone->id ?? '' }}">
                                                                <!-- Nút gửi form -->
                                                                <div class="text-right">
                                                                    <button type="submit" class="btn btn-primary">Xác
                                                                        nhận</button>
                                                                </div>
                                                            </form>
                                                        @else
                                                            <div class="d-flex justify-content-center mt-3">
                                                                <p class="text">Bạn cần cập nhật thông tin cá nhân để
                                                                    tham gia khu trọ.</p>
                                                            </div>
                                                            <div class="d-flex justify-content-center mt-3">
                                                                <a href="{{ route('client.dang-kyekyc') }}"
                                                                    class="btn btn-primary">Đăng ký ngay</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        {{-- <section>
            <div
                class="d-flex bottom-bar-action bottom-bar-action-01 py-2 px-4 bg-gray-01 align-items-center position-fixed fixed-bottom d-sm-none">
                <div class="media align-items-center">
                    <img src="images/irene-wallace.png" alt="Irene Wallace" class="mr-4 rounded-circle">
                    <div class="media-body">
                        <a href="#" class="d-block text-dark fs-15 font-weight-500 lh-15">Irene Wallace</a>
                        <span class="fs-13 lh-2">Sales Excutive</span>
                    </div>
                </div>
                <div class="ml-auto">
                    <button type="button" class="btn btn-primary fs-18 p-2 lh-1 mr-1 mb-1 shadow-none"
                        data-toggle="modal" data-target="#modal-messenger"><i class="fal fa-comment"></i></button>
                    <a href="tel:(+84)2388-969-888" class="btn btn-primary fs-18 p-2 lh-1 mb-1 shadow-none"
                        target="_blank"><i class="fal fa-phone"></i></a>
                </div>
            </div>




        </section> --}}
    </main>
    <div class="modal fade report-modal" id="report-modal" tabindex="-1" role="dialog" aria-labelledby="report-modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 p-4">
                    <h5 class="modal-title">Gửi Báo Cáo</h5>
                    <button type="button" class="close fs-23" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4 py-sm-7 px-sm-8 text-center">
                    <h2 class="text-heading mb-3 fs-22 fs-md-32 lh-1-5">
                        Gặp Vấn Đề Với Phòng Trọ? Báo Cáo Ngay!
                    </h2>
                    <p class="text-muted mb-4 mx-auto" style="max-width: 600px;">
                        Trọ Nhanh luôn lắng nghe ý kiến của bạn. Nếu bạn gặp phải bất kỳ vấn đề nào với phòng trọ hoặc khu
                        trọ
                        của mình, hãy cho chúng tôi biết. Chúng tôi sẽ nhanh chóng xử lý để đảm bảo trải nghiệm sống tốt
                        nhất
                        cho bạn.
                    </p>
                    <form id="reportForm" method="POST" action="{{ route('client.report-store-room') }}">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $rooms->id }}">
                        <input type="hidden" name="reported_person" value="{{ $rooms->user_id }}">
                        <input type="hidden" name="status" value="1">

                        <div class="form-group mb-4">
                            <textarea class="form-control border-0 " placeholder="Nội dung báo cáo..." name="description" id="description"
                                rows="5">{{ old('description') }}</textarea>
                            <span id="description-error" class="text-danger"></span>
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary px-5">Gửi Báo Cáo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('styleUs')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Chi Tiết Phòng Trọ | TRỌ NHANH</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/mh.css') }}">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Single Property 6">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="images/tro-moi.png">
    <!-- Facebook -->
    <meta property="og:url" content="single-property-6.html">
    <meta property="og:title" content="Single Property 6">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/tro-moi.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Chi tiết về các phòng trọ cho thuê tại TRỌ NHANH - thông tin chính xác, đầy đủ và hữu ích cho người thuê nhà.">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">
    {{-- <title>Chi Tiết Phòng Trọ | TRỌ NHANH</title> --}}

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mh.css') }}">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TroNanh">
    <meta name="twitter:creator" content="@TroNanh">
    <meta name="twitter:title" content="{{ $rooms->title }}">
    <meta name="twitter:description" content="{{ $rooms->description ?? 'Thông tin chi tiết về phòng trọ.' }}">
    <meta name="twitter:image"
        content="{{ asset('assets/images/' . ($rooms->images->isNotEmpty() ? $rooms->images->first()->filename : 'properties-grid-04.jpg')) }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $rooms->title }}">
    <meta property="og:description" content="{{ $rooms->description ?? 'Thông tin chi tiết về phòng trọ.' }}">
    <meta property="og:type" content="website">
    <meta property="og:image"
        content="{{ asset('assets/images/' . ($rooms->images->isNotEmpty() ? $rooms->images->first()->filename : 'properties-grid-04.jpg')) }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        .leaflet-control-directions {
            background-color: #fff;
            border-radius: 40px;
            padding: 10px 20px;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 14px;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .leaflet-control-directions:hover {
            background-color: #f8f8f8;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .leaflet-control-directions i {
            margin-right: 8px;
            font-size: 16px;
        }

        .leaflet-control-directions span {
            white-space: nowrap;
        }
    </style>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/comment.js') }}"></script>
    <script src="{{ asset('assets/js/register-zone.js') }}"></script>
    <script src="{{ asset('assets/js/yeuthich.js') }}"></script>
    <script>
        var userIsLoggedIn = @json(auth()->check());
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>

    <script src="{{ asset('assets/js/alert-update-user.js') }}"></script>
    <script src="{{ asset('assets/js/alert-report.js') }}"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var latitude = {{ $rooms->latitude }};
            var longitude = {{ $rooms->longitude }};
            var roomName = "{{ $rooms->title }}";

            var map = L.map('map').setView([latitude, longitude], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var customIcon = L.icon({
                iconUrl: '{{ asset('assets/images/341144.png') }}',
                iconSize: [30, 30],
                iconAnchor: [22, 38],
                popupAnchor: [-3, -38]
            });

            L.marker([latitude, longitude], {
                    icon: customIcon
                }).addTo(map)
                .bindPopup(roomName)
                .openPopup();

            var directionsButton = L.control({
                position: 'topright'
            });

            directionsButton.onAdd = function(map) {
                var div = L.DomUtil.create('div', 'leaflet-bar leaflet-control');
                div.innerHTML =
                    '<a href="#" title="Chỉ đường" aria-label="Chỉ đường" role="button"><i class="fas fa-directions "></i></a>';
                div.onclick = function() {
                    var url = 'https://www.google.com/maps/dir/?api=1&destination=' + latitude + ',' +
                        longitude;
                    window.open(url, '_blank');
                };
                return div;
            };

            directionsButton.addTo(map);
        });
    </script>
    <script>
        // const shareBtn = document.getElementById('share-btn');
        // shareBtn.addEventListener('click', async () => {
        //     try {
        //         await navigator.share({
        //             title: '{{ $rooms->title }}',
        //             text: '{{ $rooms->description ?? 'Thông tin chi tiết về phòng trọ.' }}',
        //             url: '{{ url()->current() }}' // Sử dụng URL hiện tại
        //         });
        //     } catch (error) {
        //         console.log('Lỗi!');
        //     }
        // });
        const shareBtn = document.getElementById('share-btn');
        shareBtn.addEventListener('click', async () => {
            const shareData = {
                title: '{{ $rooms->title }}',
                text: "{{ $rooms->description ?? 'Thông tin chi tiết về phòng trọ.' }}", // Sử dụng dấu nháy kép
                url: '{{ url()->current() }}'
            };

            if (navigator.share) {
                try {
                    await navigator.share(shareData);
                    // Không hiển thị thông báo
                } catch (error) {
                    console.log('Lỗi chia sẻ:', error);
                    // Không hiển thị thông báo
                }
            } else {
                // Nếu không hỗ trợ navigator.share, hiển thị liên kết chia sẻ
                const fallbackUrl =
                    `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareData.url)}`;
                window.open(fallbackUrl, '_blank');
                // Không hiển thị thông báo
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.delete-comment').on('click', function(e) {
                e.preventDefault();
                var commentId = $(this).data('comment-id');
                
                Swal.fire({
                    title: 'Bạn có chắc chắn?',
                    text: "Bạn sẽ không thể hoàn tác hành động này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý, xóa nó!',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route("client.danh-gia") }}',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                action: 'delete',
                                comment_id: commentId
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Đã xóa!',
                                        'Bình luận của bạn đã được xóa.',
                                        'success'
                                    );
                                    $('#comment-' + commentId).remove();
                                } else {
                                    Swal.fire(
                                        'Lỗi!',
                                        'Không thể xóa bình luận.',
                                        'error'
                                    );
                                }
                            },
                            error: function() {
                                Swal.fire(
                                    'Lỗi!',
                                    'Đã xảy ra lỗi khi xóa bình luận.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
