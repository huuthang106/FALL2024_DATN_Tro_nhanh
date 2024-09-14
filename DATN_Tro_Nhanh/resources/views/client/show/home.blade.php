@extends('layouts.main')
@section('titleUs', 'Trang chủ trọ nhanh')
@section('contentUs')
    <main id="content">
        <section class="d-flex flex-column">
            <div style="background-image: url('{{ asset('assets/images/bg-home-01.jpg') }}')"
                class="bg-cover d-flex align-items-center custom-vh-100">
                <div class="container pt-lg-15 py-8" data-animate="zoomIn">
                    <p class="text-white fs-md-22 fs-18 font-weight-500 letter-spacing-367 mb-6 text-center text-uppercase">
                        Hãy để chúng tôi hướng dẫn ngôi nhà của bạn</p>
                    <h2 class="text-white display-2 text-center mb-sm-13 mb-8">Tìm Ngôi Nhà Mơ Ước của bạn</h2>
                    <form action="{{ route('client.room-listing') }}" method="GET"
    class="property-search py-lg-0 z-index-2 position-relative d-none d-lg-block">
    <div class="row no-gutters">
        <div class="col-md-5 col-lg-4 col-xl-3">
            <input class="search-field" type="hidden" name="status" value="for-sale" data-default-value="">
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
                    title="Chọn" data-style="p-0 h-24 lh-17 text-dark" name="type">
                    <option>Căn hộ</option>
                    <option>Nhà đơn lập</option>
                    <option>Nhà liên kế</option>
                    <option>Nhà nhiều tầng</option>
                </select>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-5 pt-6 pt-lg-0 order-2">
                <label class="text-uppercase font-weight-500 letter-spacing-093">Tìm kiếm</label>
                <div class="position-relative">
                    <input type="text" name="search"
                        class="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 pl-0 pr-4 font-weight-600 border-color-input placeholder-muted"
                        placeholder="Tìm kiếm...">
                    <i class="far fa-search position-absolute pos-fixed-right-center pr-0 fs-18 mt-n3"></i>
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
                            <!-- Các tỉnh thành khác... -->
                        </select>
                    </div>
                    <div class="col-sm-6 col-lg-3 pt-6">
                        <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Tất cả
                            quận/huyện</label>
                        <select
                            class="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input"
                            id="district-town" name="district" title="Tất cả khu vực"
                            data-style="p-0 h-24 lh-17 text-dark">
                            <option value="0">Chọn Quận/Huyện...</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-lg-3 pt-6">
                        <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Tất cả
                            xã/phường</label>
                        <select
                            class="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input"
                            id="ward-commune" name="village" title="Tất cả khu vực"
                            data-style="p-0 h-24 lh-17 text-dark">
                            <option value="0">Chọn Xã/Phường...</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

                    <form
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
                                        name="key-word" placeholder="Tìm kiếm...">
                                    <button type="submit"
                                        class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left">
                                        <i class="far fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="advanced-search-filters-4-mobile" class="col-12 pt-2 px-7 collapse"
                                data-parent="#accordion-4-mobile">
                                <div class="row mx-n2">
                                    <div class="col-sm-6 pt-4 px-2">
                                        <select
                                            class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            title="Chọn" data-style="btn-lg py-2 h-52 bg-transparent" name="type">
                                            <option>Tất cả trạng thái</option>
                                            <option>Cho thuê</option>
                                            <option>Bán</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
                                        <select
                                            class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            title="Tất cả loại" data-style="btn-lg py-2 h-52 bg-transparent"
                                            name="type">
                                            <option>Căn hộ</option>
                                            <option>Nhà đơn lập</option>
                                            <option>Nhà liên kế</option>
                                            <option>Nhà nhiều tầng</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
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
                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
                                        <select
                                            class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            name="bathrooms" title="Phòng tắm"
                                            data-style="btn-lg py-2 h-52 bg-transparent">
                                            <option>Tất cả phòng tắm</option>
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
                                    <div class="col-sm-6 pt-4 px-2">
                                        <select
                                            class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            title="Tất cả thành phố" data-style="btn-lg py-2 h-52 bg-transparent"
                                            name="city">
                                            <option>Tất cả thành phố</option>
                                            <option>New York</option>
                                            <option>Los Angeles</option>
                                            <option>Chicago</option>
                                            <option>Houston</option>
                                            <option>San Diego</option>
                                            <option>Las Vegas</option>
                                            <option>Atlanta</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 pt-4 px-2">
                                        <select
                                            class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                            name="areas" title="Tất cả khu vực"
                                            data-style="btn-lg py-2 h-52 bg-transparent">
                                            <option>Tất cả khu vực</option>
                                            <option>Albany Park</option>
                                            <option>Altgeld Gardens</option>
                                            <option>Andersonville</option>
                                            <option>Beverly</option>
                                            <option>Brickel</option>
                                            <option>Central City</option>
                                            <option>Coconut Grove</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pt-6 slider-range slider-range-secondary">
                                        <label for="price-4-mobile" class="mb-4 text-white">Khoảng giá</label>
                                        <div data-slider="true"
                                            data-slider-options='{"min":0,"max":1000000,"values":[100000,700000],"type":"currency"}'>
                                        </div>
                                        <div class="text-center mt-2">
                                            <input id="price-4-mobile" type="text" readonly
                                                class="border-0 amount text-center bg-transparent font-weight-500"
                                                name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-6 slider-range slider-range-secondary">
                                        <label for="area-size-4-mobile" class="mb-4">Diện tích</label>
                                        <div data-slider="true"
                                            data-slider-options='{"min":0,"max":15000,"values":[0,12000],"type":"sqrt"}'>
                                        </div>
                                        <div class="text-center mt-2">
                                            <input id="area-size-4-mobile" type="text" readonly
                                                class="border-0 amount text-center bg-transparent font-weight-500"
                                                name="area">
                                        </div>
                                    </div>
                                    <div class="col-12 pt-4 pb-2">
                                        <a class="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse"
                                            href="#other-feature-4-mobile" role="button" aria-expanded="false"
                                            aria-controls="other-feature-4-mobile">
                                            <span class="fs-15 font-weight-500 hover-primary">Các tính năng khác</span>
                                        </a>
                                    </div>
                                    <div class="collapse row mx-0 w-100" id="other-feature-4-mobile">
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check1-4-mobile">
                                                <label class="custom-control-label" for="check1-4-mobile">Điều hòa</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check2-4-mobile">
                                                <label class="custom-control-label" for="check2-4-mobile">Giặt ủi</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check4-4-mobile">
                                                <label class="custom-control-label" for="check4-4-mobile">Máy giặt</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check5-4-mobile">
                                                <label class="custom-control-label" for="check5-4-mobile">BBQ</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check6-4-mobile">
                                                <label class="custom-control-label" for="check6-4-mobile">Sân vườn</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check7-4-mobile">
                                                <label class="custom-control-label" for="check7-4-mobile">Xông hơi</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check8-4-mobile">
                                                <label class="custom-control-label" for="check8-4-mobile">WiFi</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check9-4-mobile">
                                                <label class="custom-control-label" for="check9-4-mobile">Sấy khô</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check10-4-mobile">
                                                <label class="custom-control-label" for="check10-4-mobile">Lò vi
                                                    sóng</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check11-4-mobile">
                                                <label class="custom-control-label" for="check11-4-mobile">Hồ bơi</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check12-4-mobile">
                                                <label class="custom-control-label" for="check12-4-mobile">Rèm cửa</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check13-4-mobile">
                                                <label class="custom-control-label" for="check13-4-mobile">Phòng
                                                    gym</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check14-4-mobile">
                                                <label class="custom-control-label" for="check14-4-mobile">Vòi sen ngoài
                                                    trời</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check15-4-mobile">
                                                <label class="custom-control-label" for="check15-4-mobile">Cáp TV</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 py-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="features[]"
                                                    id="check16-4-mobile">
                                                <label class="custom-control-label" for="check16-4-mobile">Tủ lạnh</label>
                                            </div>
                                        </div>
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
                        <h2 class="text-heading">Những Tài Sản Tốt Nhất Để Bán</h2>
                        <span class="heading-divider"></span>
                        <p class="mb-6">Xem Thêm
                        </p>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{route('client.room-listing')}}"
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
                                            <span class="badge mr-2 badge-orange">nổi bật</span>
                                            <span class="badge mr-2 badge-primary">để bán</span>
                                        </div>
                                        <ul class="list-inline mb-0 mt-auto hover-image">
                                            <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Hình ảnh">
                                                <a href="#" class="text-white hover-primary">
                                                    <i class="far fa-images"></i><span class="pl-1">9</span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                                                <a href="#" class="text-white hover-primary">
                                                    <i class="far fa-play-circle"></i><span class="pl-1">2</span>
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
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Phòng ngủ">
                                            <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-bedroom"></use>
                                            </svg>
                                            {{ $room->bedroom ?? '3' }} Phòng
                                        </li>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Phòng tắm">
                                            <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-shower"></use>
                                            </svg>
                                            {{ $room->bathroom ?? '3' }} Phòng
                                        </li>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Diện tích">
                                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-square"></use>
                                            </svg>
                                            {{ $room->acreage ?? '200' }}m²
                                        </li>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Gara">
                                            <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-Garage"></use>
                                            </svg>
                                            {{ $room->garage ?? '1' }} Gara
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                    <p class="fs-17 font-weight-bold text-heading mb-0">
                                        {{ number_format($room->price, 0, ',', '.') }} VND
                                    </p>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="{{ route('client.add.favourite', ['slug' => $room->slug]) }}"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                                data-toggle="tooltip" title="So sánh">
                                                <i class="fas fa-exchange-alt"></i>
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
                            <h2 class="text-heading lh-1625">Khám Phá <br> Theo Loại Tài Sản</h2>
                            <span class="heading-divider"></span>
                            <p class="mb-6">Xem Thêm
                            </p>
                            <a href="listing-grid-with-left-filter.html"
                                class="btn btn-lg text-secondary btn-accent">+2300 Tài Sản Có Sẵn
                                <i class="far fa-long-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="col-lg-8" data-animate="fadeInRight">
                            <div class="slick-slider arrow-haft-inner custom-arrow-xxl-hide mx-0"
                                data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 3,"arrows":false,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 2,"arrows":false,"autoplay":true}}]}'>
                                <div class="box px-0 py-6">
                                    <a href="listing-grid-with-left-filter.html"
                                        class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                                        <img src="{{ asset('assets/images/verified.png') }}" class="card-img-top"
                                            alt="Căn hộ">

                                        <div class="card-body px-0 pt-5 pb-0">
                                            <h4 class="card-title fs-16 lh-2 text-dark mb-0">Căn Hộ</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="box px-0 py-6">
                                    <a href="listing-grid-with-left-filter.html"
                                        class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                                        <img src="{{ asset('assets/images/sofa.png') }}" class="card-img-top"
                                            alt="Nhà">

                                        <div class="card-body px-0 pt-5 pb-0">
                                            <h4 class="card-title fs-16 lh-2 text-dark mb-0">Nhà</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="box px-0 py-6">
                                    <a href="listing-grid-with-left-filter.html"
                                        class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                                        <img src="{{ asset('assets/images/architecture-and-city.png') }}"
                                            class="card-img-top" alt="Văn phòng">

                                        <div class="card-body px-0 pt-5 pb-0">
                                            <h4 class="card-title fs-16 lh-2 text-dark mb-0">Văn Phòng</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="box px-0 py-6">
                                    <a href="listing-grid-with-left-filter.html"
                                        class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                                        <img src="{{ asset('assets/images/eco-house.png') }}" class="card-img-top"
                                            alt="Biệt thự">

                                        <div class="card-body px-0 pt-5 pb-0">
                                            <h4 class="card-title fs-16 lh-2 text-dark mb-0">Biệt Thự</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="box px-0 py-6">
                                    <a href="listing-grid-with-left-filter.html"
                                        class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                                        <img src="{{ asset('assets/images/verified.png') }}" class="card-img-top"
                                            alt="Căn hộ">

                                        <div class="card-body px-0 pt-5 pb-0">
                                            <h4 class="card-title fs-16 lh-2 text-dark mb-0">Căn Hộ</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-lg-12 pb-lg-11 py-11">
            <div class="container container-xxl">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-heading">Những Bất Động Sản Tốt Nhất Để Thuê</h2>
                        <span class="heading-divider"></span>
                        <p class="mb-6">Xem Thêm</p>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{route('client.room-listing')}}"
                            class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">Xem tất cả bất động
                            sản
                            <i class="far fa-long-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <div class="slick-slider slick-dots-mt-0 custom-arrow-spacing-30"
                    data-slick-options='{"slidesToShow": 4,"dots":true,"arrows":false,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
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
                                            <span class="badge mr-2 badge-orange">nổi bật</span>
                                            <span class="badge mr-2 badge-primary">để bán</span>
                                        </div>
                                        <ul class="list-inline mb-0 mt-auto hover-image">
                                            <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Hình ảnh">
                                                <a href="#" class="text-white hover-primary">
                                                    <i class="far fa-images"></i><span class="pl-1">9</span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                                                <a href="#" class="text-white hover-primary">
                                                    <i class="far fa-play-circle"></i><span class="pl-1">2</span>
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
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Phòng ngủ">
                                            <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-bedroom"></use>
                                            </svg>
                                            {{ $room->bedroom ?? '3' }} Phòng
                                        </li>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Phòng tắm">
                                            <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-shower"></use>
                                            </svg>
                                            {{ $room->bathroom ?? '3' }} Phòng
                                        </li>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Diện tích">
                                            <svg class="icon icon-square fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-square"></use>
                                            </svg>
                                            {{ $room->acreage ?? '200' }}m²
                                        </li>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                                            data-toggle="tooltip" title="Gara">
                                            <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-Garage"></use>
                                            </svg>
                                            {{ $room->garage ?? '1' }} Gara
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                    <p class="fs-17 font-weight-bold text-heading mb-0">
                                        {{ number_format($room->price, 0, ',', '.') }} VND</p>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="{{ route('client.add.favourite', ['slug' => $room->slug]) }}"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                                data-toggle="tooltip" title="So sánh">
                                                <i class="fas fa-exchange-alt"></i>
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
                            <h2 class="text-white lh-1625">Tìm khu phố của bạn<br />
                            </h2>
                            <span class="heading-divider"></span>
                            <p class="mb-6 text-white">Xem Thêm
                            </p>
                            <div class="input-group input-group-lg pr-sm-17">
                                <input type="text"
                                    class="form-control fs-13 font-weight-500 text-gray-light rounded-lg rounded-right-0 border-0 shadow-none h-52 bg-white"
                                    name="search" placeholder="Nhập địa chỉ, khu phố">
                                <button type="submit"
                                    class="btn btn-primary fs-18 rounded-left-0 rounded-lg px-6 border-0">
                                    <i class="far fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-lg-12 pb-lg-15 py-11">
            <div class="container container-xxl">
                <h2 class="text-heading">Các điểm đến mà chúng tôi yêu thích nhất</h2>
                <span class="heading-divider"></span>
                <p class="mb-7">Xem Thêm</p>
                <div class="slick-slider mx-n2"
                    data-slick-options='{"slidesToShow": 5,"arrows":false, "autoplay":false,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
                    <div class="box px-2" data-animate="fadeInUp">
                        <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
                            <img src="{{ asset('assets/images/properties-city-01.jpg') }}" class="card-img"
                                alt="New York">

                            <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                        class="text-white">New
                                        York</a></h2>
                                <p class="card-text fs-13 font-weight-500 letter-spacing-087">TỪ<span
                                        class="ml-2 fs-15 font-weight-bold">$540.000 - $900.000</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="box px-2" data-animate="fadeInUp">
                        <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
                            <img src="{{ asset('assets/images/properties-city-02.jpg') }}" class="card-img"
                                alt="Los Angeles">
                            <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                        class="text-white">Los
                                        Angeles</a></h2>
                                <p class="card-text fs-13 font-weight-500 letter-spacing-087">TỪ<span
                                        class="ml-2 fs-15 font-weight-bold">$520.000 - $700.000</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="box px-2" data-animate="fadeInUp">
                        <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
                            <img src="{{ asset('assets/images/properties-city-03.jpg') }}" class="card-img"
                                alt="San Jose">
                            <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                        class="text-white">San
                                        Jose</a></h2>
                                <p class="card-text fs-13 font-weight-500 letter-spacing-087">TỪ<span
                                        class="ml-2 fs-15 font-weight-bold">$340.000 - $600.000</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="box px-2" data-animate="fadeInUp">
                        <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
                            <img src="{{ asset('assets/images/properties-city-04.jpg') }}" class="card-img"
                                alt="Fort Worth">
                            <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                        class="text-white">Fort
                                        Worth</a></h2>
                                <p class="card-text fs-13 font-weight-500 letter-spacing-087">TỪ<span
                                        class="ml-2 fs-15 font-weight-bold">$240.000 - $660.000</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="box px-2" data-animate="fadeInUp">
                        <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
                            <img src="{{ asset('assets/images/properties-city-05.jpg') }}" class="card-img"
                                alt="Kansas City">
                            <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                        class="text-white">Kansas
                                        City</a></h2>
                                <p class="card-text fs-13 font-weight-500 letter-spacing-087">TỪ<span
                                        class="ml-2 fs-15 font-weight-bold">$380.000 - $680.000</span></p>
                            </div>
                        </div>
                    </div>
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
                                        <a href="single-property-1.html"
                                            class="d-flex align-items-center text-dark hover-secondary">
                                            <h4 class="fs-20 lh-1625 mb-1">Mua nhà mới </h4>
                                            <span
                                                class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                                                <svg class="icon icon-long-arrow">
                                                    <use xlink:href="#icon-long-arrow"></use>
                                                </svg>
                                            </span>
                                        </a>
                                        <p class="mb-0">Xem thêm</p>
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
                                        <a href="single-property-1.html"
                                            class="d-flex align-items-center text-dark hover-secondary">
                                            <h4 class="fs-20 lh-1625 mb-1">Bán nhà </h4>
                                            <span
                                                class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                                                <svg class="icon icon-long-arrow">
                                                    <use xlink:href="#icon-long-arrow"></use>
                                                </svg>
                                            </span>
                                        </a>
                                        <p class="mb-0">Xem Thêm</p>
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
                                        <a href="single-property-1.html"
                                            class="d-flex align-items-center text-dark hover-secondary">
                                            <h4 class="fs-20 lh-1625 mb-1">Thuê nhà </h4>
                                            <span
                                                class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                                                <svg class="icon icon-long-arrow">
                                                    <use xlink:href="#icon-long-arrow"></use>
                                                </svg>
                                            </span>
                                        </a>
                                        <p class="mb-0">Xem Thêm</p>
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
                        <img src="{{ asset('assets/images/compare-01.jpg') }}" class="card-img" alt="tài sản">

                        <div class="card-img-overlay">
                            <a href="#"
                                class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i
                                    class="fal fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item card bg-transparent">
                    <div class="position-relative hover-change-image bg-hover-overlay">
                        <img src="{{ asset('assets/images/compare-02.jpg') }}" class="card-img" alt="tài sản">

                        <div class="card-img-overlay">
                            <a href="#"
                                class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i
                                    class="fal fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item card card bg-transparent">
                    <div class="position-relative hover-change-image bg-hover-overlay ">
                        <img src="{{ asset('assets/images/compare-03.jpg') }}" class="card-img" alt="tài sản">

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
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Home 01">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="{{ asset('assets/images/homeid-social-logo.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url('home-01.html') }}">
    <meta property="og:title" content="Home 01">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/homeid-social.png') }}">
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

    <script src="{{ asset('assets/js/api-country-vn-nht.js') }}"></script>
@endpush
