@extends('layouts.main')
@section('titleUs', 'Trang chủ trọ nhanh')
@section('contentUs')
    <main id="content">
        <section class="bg-secondary py-6 py-lg-0">
            <div class="container">
                <form class="search-form d-none d-lg-block">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <label
                                        class="text-uppercase font-weight-500 opacity-7 text-white letter-spacing-093 mb-1">Loại
                                        Nhà</label>
                                    <select
                                        class="form-control selectpicker bg-transparent border-bottom rounded-0 border-input-opacity-02"
                                        name="type" title="Lựa chọn" data-style="p-0 h-24 lh-17 text-white">
                                        <option>Chung cư</option>
                                        <option>Nhà Dành Cho Một Gia Đình</option>
                                        <option>Nhà Phố</option>
                                        <option>Nhà Dành Cho Nhiều Gia Đình</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pl-md-3 pt-md-0 pt-6">
                                    <label
                                        class="text-uppercase font-weight-500 opacity-7 text-white letter-spacing-093 mb-1">Vị
                                        Trí</label>
                                    <select
                                        class="form-control selectpicker bg-transparent border-bottom rounded-0 border-input-opacity-02"
                                        name="location" title="Lựa chọn" data-style="p-0 h-24 lh-17 text-white">
                                        <option>An Giang</option>
                                        <option>Hà Nội</option>
                                        <option>Cần Thơ</option>
                                        <option>Tp.Hồ Chí Minh</option>
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
                            <a href="listing-grid-with-left-filter.html">Danh sách</a>
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
                                        <li class="list-inline-item mr-2">
                                            <a href="{{ route('client.add.favourite', ['slug' => $rooms->slug]) }}" 
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center">
                                                 <i class="fas fa-heart"></i>
                                             </a>
                                        </li>
                                        <li class="list-inline-item mr-2">
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
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" data-toggle="tooltip" title="In"
                                                class="d-flex align-items-center justify-content-center w-40px h-40 bg-white text-heading bg-hover-primary hover-white rounded-circle">
                                                <i class="far fa-print"></i>
                                            </a>
                                        </li>
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
                            <h4 class="fs-22 text-heading mb-6">Sự kiện và tính năng</h4>
                            <div class="row">
                                <div class="col-lg-3 col-sm-4 mb-6">
                                    <div class="media">
                                        <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                            <svg class="icon icon-family fs-32 text-primary">
                                                <use xlink:href="#icon-family"></use>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                Loại</h5>
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">Gia Đình Độc Thân</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 mb-6">
                                    <div class="media">
                                        <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                            <svg class="icon icon-year fs-32 text-primary">
                                                <use xlink:href="#icon-year"></use>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                năm xây dựng</h5>
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">2020</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 mb-6">
                                    <div class="media">
                                        <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                            <svg class="icon icon-heating fs-32 text-primary">
                                                <use xlink:href="#icon-heating"></use>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                sưởi ấm</h5>
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">Rạng rỡ</p>
                                        </div>
                                    </div>
                                </div>
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
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">200m</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 mb-6">
                                    <div class="media">
                                        <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                            <svg class="icon icon-bedroom fs-32 text-primary">
                                                <use xlink:href="#icon-bedroom"></use>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                Phòng ngủ</h5>
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">3</p>
                                        </div>
                                    </div>
                                </div>
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
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">2</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 mb-6">
                                    <div class="media">
                                        <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                            <svg class="icon icon-Garage fs-32 text-primary">
                                                <use xlink:href="#icon-Garage"></use>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                GARAGE</h5>
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 mb-6">
                                    <div class="media">
                                        <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                            <svg class="icon icon-status fs-32 text-primary">
                                                <use xlink:href="#icon-status"></use>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">
                                                Trạng thái</h5>
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">Tích cực</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="mt-2 pb-6 px-6 pt-5 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-4">Chi tiết bổ sung</h4>
                            <div class="row">
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">ID thuộc tính</dt>
                                    <dd>{{ $rooms->slug }}</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Giá</dt>
                                    <dd>{{ $rooms->price }}VND</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Loại thuộc tính</dt>
                                    <dd>{{ $rooms->category->name }}</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Trạng thái thuộc tính</dt>
                                    <dd>Cần bán</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Phòng</dt>
                                    <dd>4</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Phòng ngủ</dt>
                                    <dd>3</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Kích cỡ</dt>
                                    <dd>200</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Phòng tắm</dt>
                                    <dd>2</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Garage</dt>
                                    <dd>1</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Phòng tắm</dt>
                                    <dd>2000 SqFt</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Kích cỡ Garage</dt>
                                    <dd>50 SqFt</dd>
                                </dl>
                                <dl class="col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Năm xây dựng</dt>
                                    <dd>2020</dd>
                                </dl>
                                <dl class="offset-sm-6 col-sm-6 mb-0 d-flex">
                                    <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Nhãn</dt>
                                    <dd>Bán chạy nhất</dd>
                                </dl>
                            </div>
                        </section>
                        <section class="mt-2 pb-7 px-6 pt-5 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-4">Tiện ích văn phòng</h4>
                            <ul class="list-unstyled mb-0 row no-gutters">
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Ban công
                                </li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Lò sưởi
                                </li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Ban công
                                </li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Lò sưởi</li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Tầng hầm
                                </li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Hệ thống làm
                                    mát</li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Tầng hầm
                                </li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Hệ thống làm
                                    mát</li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Phòng ăn
                                </li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Máy rửa chén
                                </li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Phòng ăn
                                </li>
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>Máy rửa chén
                                </li>
                            </ul>
                        </section>
                        <section class="mt-2 pb-7 px-6 pt-6 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-6">Sơ đồ mặt bằng</h4>
                            <div class="accordion accordion-03 mb-3" id="accordion-01">
                                <div class="card border-0 shadow-xxs-5 bg-gray-01">
                                    <div class="card-header bg-gray-01 border-gray border-0 p-0" id="floor-plans-01">
                                        <div class="heading bg-gray-01 d-flex justify-content-between align-items-center px-6"
                                            data-toggle="collapse" data-target="#collapse-01" aria-expanded="true"
                                            aria-controls="collapse-01" role="button">
                                            <h2 class="mb-0 fs-16 text-heading font-weight-500 py-4 lh-13">Tầng một</h2>
                                            <ul class="list-inline mb-0 d-none d-sm-block pr-2">
                                                <li class="list-inline-item text-muted mr-4">Phòng ngủ: <span
                                                        class="font-weight-500 text-heading">2</span></li>
                                                <li class="list-inline-item text-muted mr-4">Phòng tắm: <span
                                                        class="font-weight-500 text-heading">2</span></li>
                                                <li class="list-inline-item text-muted mr-4">Diện tích: <span
                                                        class="font-weight-500 text-heading">900</span> sqft</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="collapse-01" class="collapse show mx-6 mb-6 bg-white"
                                        aria-labelledby="floor-plans-01" data-parent="#accordion-01">
                                        <div class="card-body card-body col-sm-6 offset-sm-3 mb-3">
                                            <img src="{{ asset('assets/images/single-detail-property-01.jpg') }}"
                                                class="card-img" alt="Sơ đồ mặt bằng">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion accordion-03 mb-3" id="accordion-02">
                                <div class="card border-0 shadow-xxs-5 bg-gray-01">
                                    <div class="card-header bg-gray-01 border-gray border-0 p-0" id="floor-plans-02">
                                        <div class="heading bg-gray-01 d-flex justify-content-between align-items-center px-6"
                                            data-toggle="collapse" data-target="#collapse-02" aria-expanded="true"
                                            aria-controls="collapse-02" role="button">
                                            <h2 class="mb-0 fs-16 text-heading font-weight-500 py-4 lh-13">Tầng hai</h2>
                                            <ul class="list-inline mb-0 d-none d-sm-block pr-2">
                                                <li class="list-inline-item text-muted mr-4">Phòng ngủ: <span
                                                        class="font-weight-500 text-heading">2</span></li>
                                                <li class="list-inline-item text-muted mr-4">Phòng tắm: <span
                                                        class="font-weight-500 text-heading">2</span></li>
                                                <li class="list-inline-item text-muted mr-4">Diện tích: <span
                                                        class="font-weight-500 text-heading">900</span> sqft</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="collapse-02" class="collapse mx-6 mb-6 bg-white"
                                        aria-labelledby="floor-plans-02" data-parent="#accordion-02">
                                        <div class="card-body card-body col-sm-6 offset-sm-3 mb-3">
                                            <img src="{{ asset('assets/images/single-detail-property-01.jpg') }}"
                                                class="card-img" alt="Sơ đồ mặt bằng">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion accordion-03 mb-3" id="accordion-03">
                                <div class="card border-0 shadow-xxs-5 bg-gray-01">
                                    <div class="card-header bg-gray-01 border-gray border-0 p-0" id="floor-plans-03">
                                        <div class="heading bg-gray-01 d-flex justify-content-between align-items-center px-6"
                                            data-toggle="collapse" data-target="#collapse-03" aria-expanded="true"
                                            aria-controls="collapse-03" role="button">
                                            <h2 class="mb-0 fs-16 text-heading font-weight-500 py-4 lh-13">Tầng ba</h2>
                                            <ul class="list-inline mb-0 d-none d-sm-block pr-2">
                                                <li class="list-inline-item text-muted mr-4">Phòng ngủ: <span
                                                        class="font-weight-500 text-heading">2</span></li>
                                                <li class="list-inline-item text-muted mr-4">Phòng tắm: <span
                                                        class="font-weight-500 text-heading">2</span></li>
                                                <li class="list-inline-item text-muted mr-4">Diện tích: <span
                                                        class="font-weight-500 text-heading">900</span> sqft</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="collapse-03" class="collapse mx-6 mb-6 bg-white"
                                        aria-labelledby="floor-plans-03" data-parent="#accordion-03">
                                        <div class="card-body card-body col-sm-6 offset-sm-3 mb-3">
                                            <img src="{{ asset('assets/images/single-detail-property-01.jpg') }}"
                                                class="card-img" alt="Sơ đồ mặt bằng">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
                                    <h3
                                        class="fs-16 lh-2 text-heading mb-0 d-inline-block pr-4 border-bottom border-primary">
                                        {{ $comments->count() }} Đánh giá
                                    </h3>

                                    @foreach ($comments as $comment)
                                        <div class="media border-top pt-7 pb-6 d-sm-flex d-block text-sm-left text-center">
                                            <img src="{{ $comment->user->image ? asset('assets/images/' . $comment->user->image) : asset('assets/images/review-07.jpg') }}"
                                                alt="{{ $comment->user->name }}"
                                                class="mr-sm-8 mb-4 mb-sm-0 custom-avatar">


                                            <div class="media-body">
                                                <div class="row mb-1 align-items-center">
                                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                                        <h4 class="mb-0 text-heading fs-14">{{ $comment->user->name }}
                                                        </h4>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <ul
                                                            class="list-inline d-flex justify-content-sm-end justify-content-center mb-0">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <li class="list-inline-item mr-1">
                                                                    <span class="text-warning fs-12 lh-2">
                                                                        <i
                                                                            class="fas fa-star{{ $i <= $comment->rating ? '' : '-o' }}"></i>
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
                                                        <a href="#"
                                                            class="mb-0 text-heading border-left border-dark hover-primary lh-1 ml-2 pl-2">Trả
                                                            lời</a>
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
                        <section class="mt-2 pb-5 px-6 pt-6 bg-white rounded-lg">
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
                        </section>
                        <section class="mt-2 pb-7 px-6 pt-6 bg-white rounded-lg">
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
                                            <a href="#"
                                                class="btn btn-block bg-gray-01 border-0 fs-14 text-heading">Tải về<i
                                                    class="far fa-arrow-alt-circle-down ml-1 text-primary"></i></a>
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
                                            <a href="#"
                                                class="btn btn-block bg-gray-01 border-0 fs-14 text-heading">Tải về<i
                                                    class="far fa-arrow-alt-circle-down ml-1 text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="mt-2 pb-6 px-6 pt-6 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-6">Virtual Tour</h4>
                            <iframe height="430"
                                src="https://my.matterport.com/show/?m=wWcGxjuUuSb&amp;utm_source=hit-content-embed"
                                allowfullscreen="" class="w-100"></iframe>
                        </section>
                        <section class="mt-2 pb-6 px-6 pt-6 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-6">Vị trí</h4>
                            <div class="position-relative">
                                <div class="position-relative">
                                    <div id="map" class="mapbox-gl map-point-animate"
                                        data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ"
                                        data-mapbox-options='{"center":[-73.9927227, 40.6741035],"setLngLat":[-73.9927227, 40.6741035]}'
                                        data-mapbox-marker='[{"position":[-73.9927227, 40.6741035],"className":"marker","backgroundImage":"images/googlle-market-01.png","backgroundRepeat":"no-repeat","width":"30px","height":"40px"}]'>
                                    </div>
                                    <p
                                        class="mb-0 p-3 bg-white shadow rounded-lg position-absolute pos-fixed-bottom mb-4 ml-4 lh-17 z-index-2">
                                        62 Gresham St, Victoria Park <br />
                                        WA 6100, Australia</p>
                                </div>
                            </div>
                        </section>
                        <section class="mt-2 pb-7 px-6 pt-6 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-5">Máy Tính Vay Mua Nhà</h4>
                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label>Số Tiền Tổng</label>
                                        <div class="position-relative">
                                            <input type="number" class="form-control border-0 pr-3 h-52 pl-7"
                                                value="345" name="total-amount">
                                            <span
                                                class="position-absolute pl-3 pos-fixed-left-center fs-13 font-weight-600">$</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label>Tiền Đặt Cọc</label>
                                        <div class="position-relative">
                                            <input type="number" class="form-control border-0 pr-3 h-52 pl-7"
                                                value="0" name="down-payment">
                                            <span
                                                class="position-absolute pl-3 pos-fixed-left-center fs-13 font-weight-600">$</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label>Lãi Suất</label>
                                        <div class="position-relative">
                                            <input type="number" class="form-control border-0 pr-3 h-52 pl-7"
                                                value="2.500" step="0.25" name="interest-rate">
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
                        </section>
                        <section class="mt-2 pb-4 px-6 pt-6 bg-white rounded-lg chart">
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
                        </section>
                        <section class="mt-2 pb-7 px-6 pt-6 bg-white rounded-lg">
                            <h4 class="fs-22 text-heading mb-6">Những ngôi nhà tương tự bạn có thể thích</h4>
                            <div class="slick-slider"
                                data-slick-options='{"slidesToShow": 2, "dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":2}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
                                <div class="box">
                                    <div class="card shadow-hover-2 =">
                                        <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                            <img src="{{ asset('assets/images/properties-grid-38.jpg') }}"
                                                alt="Home in Metric Way">
                                            <div class="card-img-overlay p-2 d-flex flex-column">
                                                <div>
                                                    <span class="badge mr-2 badge-primary">Để bán</span>
                                                </div>
                                                <ul class="list-inline mb-0 mt-auto hover-image">
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                        title="9 Images">
                                                        <a href="#" class="text-white hover-primary">
                                                            <i class="far fa-images"></i><span class="pl-1">9</span>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                                                        <a href="#" class="text-white hover-primary">
                                                            <i class="far fa-play-circle"></i><span
                                                                class="pl-1">2</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body pt-3">
                                            <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                    class="text-dark hover-primary">Trang chủ</a></h2>
                                            <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St,
                                                Los Angeles</p>
                                            <ul class="list-inline d-flex mb-0 flex-wrap mr-n4">
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="3 Bedroom">
                                                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-bedroom"></use>
                                                    </svg>3 Br
                                                </li>
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="3 Bathrooms">
                                                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-shower"></use>
                                                    </svg>3 Ba
                                                </li>
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="Size">
                                                    <svg class="icon icon-square fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-square"></use>
                                                    </svg>2300 Sq.Ft
                                                </li>
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="1 Garage">
                                                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-Garage"></use>
                                                    </svg>1 Gr
                                                </li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                            <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item mr-2">
                                                    <a href="{{ route('client.add.favourite', ['slug' => $rooms->slug]) }}" 
                                                        class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center">
                                                         <i class="fas fa-heart"></i>
                                                     </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#"
                                                        class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                                        data-toggle="tooltip" title="Compare"><i
                                                            class="fas fa-exchange-alt"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="card shadow-hover-2 =">
                                        <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                            <img src="{{ asset('assets/images/properties-grid-01.jpg') }}"
                                                alt="Garden Gingerbread House">
                                            <div class="card-img-overlay p-2 d-flex flex-column">
                                                <div>
                                                    <span class="badge mr-2 badge-orange">Đặc sắc</span>
                                                    <span class="badge mr-2 badge-indigo">Để bán</span>
                                                </div>
                                                <ul class="list-inline mb-0 mt-auto hover-image">
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                        title="9 Images">
                                                        <a href="#" class="text-white hover-primary">
                                                            <i class="far fa-images"></i><span class="pl-1">9</span>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                                                        <a href="#" class="text-white hover-primary">
                                                            <i class="far fa-play-circle"></i><span
                                                                class="pl-1">2</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body pt-3">
                                            <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                    class="text-dark hover-primary">Ngôi nhà bánh rừng trong rừng</a></h2>
                                            <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St,
                                                Los Angeles</p>
                                            <ul class="list-inline d-flex mb-0 flex-wrap mr-n4">
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="3 Bedroom">
                                                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-bedroom"></use>
                                                    </svg>3 Br
                                                </li>
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="3 Bathrooms">
                                                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-shower"></use>
                                                    </svg>3 Ba
                                                </li>
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="Size">
                                                    <svg class="icon icon-square fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-square"></use>
                                                    </svg>2300 Sq.Ft
                                                </li>
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="1 Garage">
                                                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-Garage"></use>
                                                    </svg>1 Gr
                                                </li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                            <p class="fs-17 font-weight-bold text-heading mb-0">$550<span
                                                    class="text-gray-light font-weight-500 fs-14"> / tháng</span></p>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#"
                                                        class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                                        data-toggle="tooltip" title="Wishlist"><i
                                                            class="far fa-heart"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#"
                                                        class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                                        data-toggle="tooltip" title="Compare"><i
                                                            class="fas fa-exchange-alt"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="card shadow-hover-2 =">
                                        <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                            <img src="{{ asset('assets/images/properties-grid-02.jpg') }}"
                                                alt="Affordable Urban House">
                                            <div class="card-img-overlay p-2 d-flex flex-column">
                                                <div>
                                                    <span class="badge mr-2 badge-primary">Để bán</span>
                                                </div>
                                                <ul class="list-inline mb-0 mt-auto hover-image">
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                        title="9 Images">
                                                        <a href="#" class="text-white hover-primary">
                                                            <i class="far fa-images"></i><span class="pl-1">9</span>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                                                        <a href="#" class="text-white hover-primary">
                                                            <i class="far fa-play-circle"></i><span
                                                                class="pl-1">2</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body pt-3">
                                            <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                    class="text-dark hover-primary">Nhà ở đô thị giá rẻ</a></h2>
                                            <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St,
                                                Los Angeles</p>
                                            <ul class="list-inline d-flex mb-0 flex-wrap mr-n4">
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="3 Bedroom">
                                                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-bedroom"></use>
                                                    </svg>3 Br
                                                </li>
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="3 Bathrooms">
                                                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-shower"></use>
                                                    </svg>3 Ba
                                                </li>
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="Size">
                                                    <svg class="icon icon-square fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-square"></use>
                                                    </svg>2300 Sq.Ft
                                                </li>
                                                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-4"
                                                    data-toggle="tooltip" title="1 Garage">
                                                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                        <use xlink:href="#icon-Garage"></use>
                                                    </svg>1 Gr
                                                </li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                            <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#"
                                                        class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                                        data-toggle="tooltip" title="Wishlist"><i
                                                            class="far fa-heart"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#"
                                                        class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                                        data-toggle="tooltip" title="Compare"><i
                                                            class="fas fa-exchange-alt"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </article>
                    <aside class="col-lg-4 pl-xl-4 primary-sidebar sidebar-sticky" id="sidebar">
                        <div class="primary-sidebar-inner">
                            <div class="bg-white rounded-lg py-lg-6 pl-lg-6 pr-lg-3 p-4">
                                <ul class="list-inline d-sm-flex align-items-sm-center mb-2">
                                    <li class="list-inline-item badge badge-orange mr-2">Đặc sắc</li>
                                    <li class="list-inline-item badge badge-primary mr-3">Để bán</li>
                                </ul>
                                <h2 class="fs-22 text-heading pt-2">{{ $rooms->title }}</h2>
                                <p class="mb-2"><i class="fal fa-map-marker-alt mr-1"></i>{{ $rooms->address }}</p>
                                <div class="d-flex align-items-center">
                                    <p class="fs-22 text-heading font-weight-bold mb-0 mr-6">{{ $rooms->price }}VND</p>
                                    <p class="mb-0">200m</p>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6 mb-3">
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
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2 lh-1">
                                                <svg class="icon icon-shower fs-18 text-primary">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="fs-13 font-weight-normal mb-0">Phòng tắm</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-dark">2</p>
                                            </div>
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
                                                <p class="mb-0 fs-13 font-weight-bold text-dark">200m</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="media">
                                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2 lh-1">
                                                <svg class="icon icon-Garage fs-18 text-primary">
                                                    <use xlink:href="#icon-Garage"></use>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="fs-13 font-weight-normal mb-0">Garage</h5>
                                                <p class="mb-0 fs-13 font-weight-bold text-dark">1</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-6 mt-1">{{ $rooms->description }}</p>
                                <div class="mr-xl-2">
                                    <a href="#"
                                        class="btn btn-outline-primary btn-lg btn-block rounded border text-body border-hover-primary hover-white">Lên
                                        lịch một chuyến tham quan</a>
                                    <a href="#"
                                        class="btn btn-outline-primary btn-lg btn-block rounded border text-body border-hover-primary hover-white mt-4">Yêu
                                        cầu thông tin</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <section>
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
            <div class="modal fade" id="modal-messenger" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0">
                            <h4 class="modal-title text-heading" id="exampleModalLabel">Contact Form</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pb-6">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control form-control-lg border-0"
                                    placeholder="First Name, Last Name">
                            </div>
                            <div class="form-group mb-2">
                                <input type="email" class="form-control form-control-lg border-0"
                                    placeholder="Your Email">
                            </div>
                            <div class="form-group mb-2">
                                <input type="tel" class="form-control form-control-lg border-0"
                                    placeholder="Your phone">
                            </div>
                            <div class="form-group mb-2">
                                <textarea class="form-control border-0" rows="4">Hello, I'm interested in Villa Called Archangel</textarea>
                            </div>
                            <div class="form-group form-check mb-4">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                <label class="form-check-label fs-13" for="exampleCheck3">Egestas fringilla phasellus
                                    faucibus
                                    scelerisque eleifend donec.</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Request
                                Info</button>
                        </div>
                    </div>
                </div>
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
    <title>Chi tiết</title>
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
    <link rel="icon" href="images/favicon.ico">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Single Property 6">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="images/homeid-social-logo.png">
    <!-- Facebook -->
    <meta property="og:url" content="single-property-6.html">
    <meta property="og:title" content="Single Property 6">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/homeid-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
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
    <script>
        var userIsLoggedIn = @json(auth()->check());
    </script>
@endpush
