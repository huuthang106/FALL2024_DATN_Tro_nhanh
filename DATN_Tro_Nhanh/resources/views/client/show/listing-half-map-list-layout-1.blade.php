@extends('layouts.main')
@section('titleUs', 'Danh Sách Khu Trọ | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="bg-secondary">
            <div class="container">
                <form action="{{ route('client.room-listing') }}" class="property-search d-none d-lg-block">
                    <div class="row align-items-lg-center" id="accordion-2">
                        <div class="col-xl-2 col-lg-3 col-md-4">
                            <div class="property-search-status-tab d-flex flex-row">
                                <input class="search-field" type="hidden" name="status" value="for-rent"
                                    data-default-value="">
                                <button type="button" data-value="for-rent"
                                    class="btn shadow-none btn-active-primary text-white rounded-0 hover-white text-uppercase h-lg-80 border-right-0 border-top-0 border-bottom-0 border-left border-white-opacity-03 active flex-md-1">
                                    Thuê
                                </button>
                                <button type="button" data-value="for-sale"
                                    class="btn shadow-none btn-active-primary text-white rounded-0 hover-white text-uppercase h-lg-80 border-left-0 border-top-0 border-bottom-0 border-right border-white-opacity-03 flex-md-1">
                                    Bán
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 d-md-flex">
                            <select
                                class="form-control shadow-none form-control-lg selectpicker rounded-right-md-0 rounded-md-top-left-0 rounded-lg-top-left flex-md-1 mt-3 mt-md-0"
                                title="Chọn Thành Phố" data-style="btn-lg py-2 h-52 border-right bg-white" name="province"
                                id="city-province">
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
                            <div class="form-group mb-0 position-relative flex-md-3 mt-3 mt-md-0">
                                <input type="text"
                                    class="form-control form-control-lg border-0 shadow-none rounded-left-md-0 pr-8 bg-white placeholder-muted"
                                    id="key-word-1" name="key-word" placeholder="Nhập địa chỉ...">
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
                        <div id="advanced-search-filters-2" class="col-12 pb-6 pt-lg-2 collapse"
                            data-parent="#accordion-2">
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
                                    <input type="text"
                                        class="form-control form-control-lg border-0 shadow-none bg-white"
                                        placeholder="Mã phòng trọ" name="">
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6 col-lg-5 pt-6 slider-range slider-range-primary">
                                    <label for="price-2" class="mb-4 text-white">Khoảng Giá</label>
                                    <div data-slider="true"
                                        data-slider-options='{"min":0,"max":1000000,"values":[100000,700000],"type":"currency"}'>
                                    </div>
                                    <div class="text-center mt-2">
                                        <input id="price-2" type="text" readonly
                                            class="border-0 amount text-center text-white bg-transparent font-weight-500"
                                            name="price">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-5 pt-6 slider-range slider-range-primary offset-lg-1">
                                    <label for="area-size-2" class="mb-4 text-white">Diện Tích</label>
                                    <div data-slider="true"
                                        data-slider-options='{"min":0,"max":15000,"values":[0,12000],"type":"currency"}'>
                                    </div>
                                    <div class="text-center mt-2">
                                        <input id="area-size-2" type="text" readonly
                                            class="border-0 amount text-center text-white bg-transparent font-weight-500"
                                            name="area">
                                    </div>
                                </div>
                                <div class="col-12 pt-4 pb-2">
                                    <a class="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse"
                                        href="#other-feature-2" role="button" aria-expanded="false"
                                        aria-controls="other-feature-2">
                                        <span class="fs-15 text-white font-weight-500 hover-primary">Các tính năng
                                            khác</span>
                                    </a>
                                </div>
                                <div class="collapse row mx-0 w-100" id="other-feature-2">
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check1-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check1-2">Điều hòa</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check2-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check2-2">Giặt là</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check4-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check4-2">Máy giặt</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check5-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check5-2">Nướng
                                                BBQ</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check6-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check6-2">Sân cỏ</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check7-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check7-2">Phòng xông
                                                hơi</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check8-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check8-2">WiFi</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check9-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check9-2">Máy sấy</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check10-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check10-2">Lò vi
                                                sóng</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check11-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check11-2">Hồ bơi</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check12-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check12-2">Rèm cửa</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check13-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check13-2">Phòng
                                                gym</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check14-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check14-2">Vòi sen ngoài
                                                trời</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check15-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check15-2">Truyền hình
                                                cáp</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check16-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check16-2">Tủ lạnh</label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </form>
                {{-- <form class="property-search property-search-mobile d-lg-none py-6">
                    <div class="row align-items-lg-center" id="accordion-2-mobile">
                        <div class="col-12">
                            <div class="form-group mb-0 position-relative">
                                <a href="#advanced-search-filters-2-mobile"
                                    class="icon-primary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed"
                                    data-toggle="collapse" data-target="#advanced-search-filters-2-mobile"
                                    aria-expanded="true" aria-controls="advanced-search-filters-2-mobile">
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
                        <div id="advanced-search-filters-2-mobile" class="col-12 pt-2 collapse"
                            data-parent="#accordion-2-mobile">
                            <div class="row mx-n2">
                                <div class="col-sm-6 pt-4 px-2">
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        title="Trạng thái" data-style="btn-lg py-2 h-52 bg-white" name="type">
                                        <option>Trạng Thái</option>
                                        <option>Cho Thuê</option>
                                        <option>Cần Bán</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 pt-4 px-2">
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        title="Loại" data-style="btn-lg py-2 h-52 bg-white" name="type">
                                        <option>Chung cư</option>
                                        <option>Nhà cho 1 gia đình</option>
                                        <option>Nhà phố</option>
                                        <option>Nhà dành cho nhiều gia đình</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 pt-4 px-2">
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
                                <div class="col-sm-6 pt-4 px-2">
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
                                <div class="col-sm-6 pt-4 px-2">
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        title="TỈnh/Thành phố" data-style="btn-lg py-2 h-52 bg-white" name="city">
                                        <option>Tỉnh/Thành phố</option>
                                        <option>Hà Nội</option>
                                        <option>Hồ Chí Minh</option>
                                        <option>Đà Nẵng</option>
                                        <option>Hải Phòng</option>
                                        <option>Huế</option>
                                        <option>Cần Thơ</option>
                                        <option>Đà Lạt</option>
                                        <option>Nha Trang</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 pt-4 px-2">
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        name="areas" title="Khu vực" data-style="btn-lg py-2 h-52 bg-white">
                                        <option>Khu vực</option>
                                        <option>Quận Hoàn Kiếm</option>
                                        <option>Quận 1</option>
                                        <option>Quận 3</option>
                                        <option>Quận Tân Bình</option>
                                        <option>Quận Cầu Giấy</option>
                                        <option>Quận Bình Thạnh</option>
                                        <option>Quận Hải Châu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-6 slider-range slider-range-primary">
                                    <label for="price-2-mobile" class="mb-4 text-white">Khoảng Giá</label>
                                    <div data-slider="true"
                                        data-slider-options='{"min":0,"max":1000000,"values":[100000,700000],"type":"currency"}'>
                                    </div>
                                    <div class="text-center mt-2">
                                        <input id="price-2-mobile" type="text" readonly
                                            class="border-0 amount text-center text-white bg-transparent font-weight-500"
                                            name="price">
                                    </div>
                                </div>
                                <div class="col-md-6 pt-6 slider-range slider-range-primary">
                                    <label for="area-size-2-mobile" class="mb-4 text-white">Diện Tích</label>
                                    <div data-slider="true"
                                        data-slider-options='{"min":0,"max":15000,"values":[0,12000],"type":"sqrt"}'>
                                    </div>
                                    <div class="text-center mt-2">
                                        <input id="area-size-2-mobile" type="text" readonly
                                            class="border-0 amount text-center text-white bg-transparent font-weight-500"
                                            name="area">
                                    </div>
                                </div>
                                <div class="col-12 pt-4 pb-2">
                                    <a class="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse"
                                        href="#other-feature-2-mobile" role="button" aria-expanded="false"
                                        aria-controls="other-feature-2-mobile">
                                        <span class="fs-15 text-white font-weight-500 hover-primary">Các tính năng
                                            khác</span>
                                    </a>
                                </div>
                                <div class="collapse row mx-0 w-100" id="other-feature-2-mobile">
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check1-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check1-2">Điều hòa</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check2-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check2-2">Giặt là</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check4-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check4-2">Máy giặt</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check5-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check5-2">Nướng
                                                BBQ</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check6-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check6-2">Sân cỏ</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check7-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check7-2">Phòng xông
                                                hơi</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check8-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check8-2">WiFi</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check9-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check9-2">Máy sấy</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check10-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check10-2">Lò vi
                                                sóng</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check11-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check11-2">Hồ bơi</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check12-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check12-2">Rèm cửa</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check13-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check13-2">Phòng
                                                gym</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check14-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check14-2">Vòi sen ngoài
                                                trời</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check15-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check15-2">Truyền hình
                                                cáp</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check16-2"
                                                name="feature[]">
                                            <label class="custom-control-label text-white" for="check16-2">Tủ lạnh</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> --}}
            </div>
        </section>

        <section class="position-relative mt-1">
            <div class="container-fluid px-0">
                <div class="row no-gutters">
                    <div class="col-xl-6 col-xxl-5 px-3 px-xxl-6 pt-7 order-2 order-xl-1 pb-11">
                        <div class="row align-items-sm-center mb-6">
                            <div class="col-md-6 col-xl-5 col-xxl-6">
                                <h2 class="fs-15 text-dark mb-0">Chúng tôi đã tìm thấy <span
                                        class="text-primary">{{ $totalZones }}</span> khu vực trọ
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
                                    <div class="d-none d-md-block">
                                        <a class="fs-sm-18 text-dark" href="#">
                                            <i class="fas fa-list"></i>
                                        </a>
                                        <a class="fs-sm-18 text-dark opacity-2 ml-5"
                                            href="listing-half-map-grid-layout-1.html">
                                            <i class="fa fa-th-large"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if ($zones->isEmpty())
                                    <div class="alert alert-info">
                                        Chưa có khu trọ.
                                    </div>
                                @else
                                    @foreach ($zones as $zone)
                                        <div class="card mb-8 mb-lg-6 border-0 zone-card" data-animate="fadeInUp"
                                            data-latitude="{{ $zone->latitude }}" data-longitude="{{ $zone->longitude }}"
                                            data-address="{{ $zone->address }}" data-rooms='@json($zone->rooms)'>
                                            <div class="row no-gutters">
                                                <div class="col-md-6 mb-5 mb-md-0 pr-md-6">
                                                    <div class="position-relative hover-change-image bg-hover-overlay h-100 pt-75 bg-img-cover-center rounded-lg"
                                                        style="background-image: url('{{ asset('assets/images/properties-list-06.jpg') }}');">
                                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                                            <div>
                                                                @if ($zone->status == 1)
                                                                    <span class="badge badge-primary">Hoạt động</span>
                                                                @elseif($zone->status == 2)
                                                                    <span class="badge badge-secondary">Chưa hoạt
                                                                        động</span>
                                                                @endif
                                                            </div>
                                                            <div class="mt-auto d-flex hover-image">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body p-0">
                                                        <h2 class="card-title my-0">
                                                            <a href="{{ route('client.client-details-zone', ['slug' => $zone->slug]) }}"
                                                                class="fs-16 lh-2 text-dark hover-primary d-block">{{ $zone->name }}</a>
                                                        </h2>
                                                        <p class="card-text mb-1 font-weight-500 text-gray-light">
                                                            {{ $zone->address }}</p>
                                                        <p class="card-text mb-2 ml-0">{{ $zone->description }}</p>
                                                        <p class="card-text fs-17 font-weight-bold text-heading mb-3">
                                                            Tổng số phòng: {{ $zone->total_rooms }}
                                                        </p>
                                                    </div>
                                                    <div class="card-footer pt-3 bg-transparent px-0 pb-0">
                                                        <ul
                                                            class="list-inline d-flex mb-0 flex-wrap justify-content-between mr-n2">
                                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                                data-toggle="tooltip" title="3 Phòng">
                                                                <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                    <use xlink:href="#icon-bedroom"></use>
                                                                </svg>
                                                                3 Phòng
                                                            </li>
                                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                                data-toggle="tooltip" title="3 Phòng tắm">
                                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                                    <use xlink:href="#icon-shower"></use>
                                                                </svg>
                                                                3 Phòng tắm
                                                            </li>
                                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                                data-toggle="tooltip" title="Diện tích">
                                                                <svg class="icon icon-square fs-18 text-primary mr-1">
                                                                    <use xlink:href="#icon-square"></use>
                                                                </svg>
                                                                2300 m²
                                                            </li>
                                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                                data-toggle="tooltip" title="1 Ga-ra">
                                                                <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                                    <use xlink:href="#icon-Garage"></use>
                                                                </svg>
                                                                1 Ga-ra
                                                            </li>
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
                                        {{-- Trang trước --}}
                                        <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $zones->previousPageUrl() }}"><i
                                                    class="far fa-angle-double-left"></i></a>
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
                                        {{-- Trang tiếp theo --}}
                                        <li
                                            class="page-item {{ $zones->currentPage() == $zones->lastPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $zones->nextPageUrl() }}"><i
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
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
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
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">

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
    <style>
        #map {
            height: 600px;
            width: 100%;
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Màu nền mờ với độ mờ 50% */
            z-index: 999;
            /* Đảm bảo lớp phủ nằm trên bản đồ */
            display: none;
            /* Ẩn lớp phủ khi không cần thiết */
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


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-ggmap-nht.js') }}"></script>
    <script src="{{ asset('assets/js/api-update-zone-nht.js') }}"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script>
        var map = L.map('map').setView([10.0354, 105.7553], 13);
        var userMarker; // Khai báo biến cho marker của người dùng
        var routeControl;
        var selectedHostel = null; // Biến để lưu trọ được chọn
        var lastPosition = null; // Lưu vị trí cuối cùng của người dùng để so sánh

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var hostels = [{
                name: 'Trọ 1',
                lat: 10.0452,
                lng: 105.7469
            },
            {
                name: 'Trọ 2',
                lat: 10.0502,
                lng: 105.7580
            },
            {
                name: 'Trọ 3',
                lat: 10.0354,
                lng: 105.7553
            },
            {
                name: 'Trọ 4',
                lat: 10.0408,
                lng: 105.7670
            }
        ];

        function fetchRoute(startLat, startLng, endLat, endLng) {
            var apiKey = '5b3ce3597851110001cf6248e9bd77db287448f9b03de2374e2eca12';
            var url =
                `https://api.openrouteservice.org/v2/directions/driving-car?api_key=${apiKey}&start=${startLng},${startLat}&end=${endLng},${endLat}`;

            document.getElementById('overlay').style.display = 'block'; // Hiển thị lớp phủ

            return fetch(url, {
                    headers: {
                        'Accept': 'application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.features && data.features.length > 0) {
                        var steps = data.features[0].geometry.coordinates;
                        return steps.map(coord => L.latLng(coord[1], coord[0]));
                    } else {
                        throw new Error('No route found.');
                    }
                })
                .catch(error => {
                    console.error('Error fetching route:', error);
                    throw error;
                });
        }


        function drawRoute(route) {
            if (routeControl) {
                map.removeControl(routeControl);
            }

            routeControl = L.Routing.control({
                waypoints: route,
                routeWhileDragging: true,
                createMarker: function() {
                    return null;
                },
                lineOptions: {
                    styles: [{
                        color: 'blue',
                        opacity: 0.6,
                        weight: 5
                    }]
                }
            }).addTo(map);

            document.getElementById('overlay').style.display = 'none'; // Ẩn lớp phủ khi hoàn tất
        }

        function addHostelMarkers() {
            hostels.forEach(function(hostel) {
                var marker = L.marker([hostel.lat, hostel.lng]).addTo(map)
                    .bindPopup('<div class="popup-content"><h3>' + hostel.name +
                        '</h3><p class="address">Địa chỉ: Cần Thơ</p></div>')
                    .on('click', function() {
                        if (userMarker) {
                            var userLat = userMarker.getLatLng().lat;
                            var userLng = userMarker.getLatLng().lng;
                            selectedHostel = hostel; // Lưu lại trọ đã chọn

                            fetchRoute(userLat, userLng, hostel.lat, hostel.lng)
                                .then(route => {
                                    if (route && route.length > 0) {
                                        drawRoute(route);
                                        map.setView([userLat, userLng], 13);
                                    } else {
                                        alert('Không có tuyến đường khả dụng.');
                                    }
                                })
                                .catch(error => {
                                    alert('Không thể lấy dữ liệu định tuyến: ' + error.message);
                                });
                        }
                    });
            });
        }

        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                if (lastPosition) {
                    var distance = map.distance([lastPosition.lat, lastPosition.lng], [lat, lng]);
                    if (distance < 50) { // Chỉ cập nhật nếu di chuyển ít nhất 50m
                        return;
                    }
                }

                lastPosition = {
                    lat: lat,
                    lng: lng
                };

                if (userMarker) {
                    map.removeLayer(userMarker); // Xóa marker cũ
                }

                userMarker = L.marker([lat, lng]).addTo(map)
                    .bindPopup('<div class="popup-content"><h3>Vị trí hiện tại của bạn</h3></div>').openPopup();

                map.setView([lat, lng], 13);

                // Nếu đã chọn trọ, cập nhật lại tuyến đường
                if (selectedHostel) {
                    fetchRoute(lat, lng, selectedHostel.lat, selectedHostel.lng)
                        .then(route => {
                            if (route && route.length > 0) {
                                drawRoute(route);

                            } else {
                                alert('Không có tuyến đường khả dụng khi di chuyển.');
                            }
                        })
                        .catch(error => {
                            alert('Không thể lấy dữ liệu định tuyến khi di chuyển: ' + error.message);
                        });
                }

                addHostelMarkers(); // Thêm đánh dấu cho các khu trọ sau khi có vị trí hiện tại

            }, function() {
                alert('Không thể lấy vị trí hiện tại của bạn.');
            });
        } else {
            alert('Trình duyệt của bạn không hỗ trợ Geolocation API.');
        }
    </script>








    <style>
        #map {
            height: 600px;
            /* Tùy chỉnh chiều cao của bản đồ theo ý bạn */
        }

        /* Cải thiện giao diện của bảng chỉ đường */
        .leaflet-top,
        .leaflet-right {
            display: none;
        }
    </style>
@endpush
