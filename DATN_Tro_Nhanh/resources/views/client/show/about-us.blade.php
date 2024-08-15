@extends('layouts.main')
@section('titleUs', 'Về Chúng Tôi | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="bg-secondary">
            <div class="container">
                <form class="property-search d-none d-lg-block">
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
                                title="Loại" data-style="btn-lg py-2 h-52 border-right bg-white" id="type-1"
                                name="type">
                                <option>Chung cư</option>
                                <option>Nhà dành cho một gia đình</option>
                                <option>Nhà phố</option>
                                <option>Nhà dành cho nhiều gia đình</option>
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
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        title="Địa chỉ" data-style="btn-lg py-2 h-52 bg-white" name="city">
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
                                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                        name="areas" title="Khu vực" data-style="btn-lg py-2 h-52 bg-white">
                                        <option>Tất cả khu vực</option>
                                        <option>Quận Hoàn Kiếm</option>
                                        <option>Quận 1</option>
                                        <option>Quận 3</option>
                                        <option>Quận Tân Bình</option>
                                        <option>Quận Cầu Giấy</option>
                                        <option>Quận Bình Thạnh</option>
                                        <option>Quận Hải Châu</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                    <input type="text" class="form-control form-control-lg border-0 shadow-none bg-white"
                                        placeholder="Mã phòng trọ" name="property-id">
                                </div>
                            </div>
                            <div class="row">
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
                            </div>
                        </div>
                    </div>
                </form>
                <form class="property-search property-search-mobile d-lg-none py-6">
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
                </form>
            </div>
        </section>
        <section style="background-image: url('{{ asset('assets/images/bg-about-us.jpg') }}')"
            class="bg-img-cover-center py-10 pt-md-16 pb-md-17 bg-overlay">
            <div class="container position-relative z-index-2 text-center">
                <a href="https://www.youtube.com/watch?v=fV1nLo13RAE"
                    class="d-inline-block m-auto position-relative play-animation" data-gtf-mfp="true"
                    data-mfp-options='{"type":"iframe"}'>
                    <span
                        class="text-white bg-primary w-78px h-78 rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-play"></i>
                    </span>
                </a>
                <div class="mxw-751">
                    <h1 class="text-white fs-30 fs-md-42 lh-15 font-weight-normal mt-4 mb-10" data-animate="fadeInRight">
                        Chúng tôi tin vào thiết kế như một động lực mạnh mẽ cho những điều tốt đẹp.</h1>
                </div>
            </div>
        </section>
        <section class="bg-patten-03 bg-gray-01 pb-13">
            <div class="container">
                <div class="card border-0 mt-n13 z-index-3 mb-12">
                    <div class="card-body p-6 px-lg-14 py-lg-13">
                        <p class="letter-spacing-263 text-uppercase text-primary mb-6 font-weight-500 text-center">
                            welcome to
                            Trọ Nhanh</p>
                        <h2 class="text-heading mb-4 fs-22 fs-md-32 text-center lh-16 px-6">Chúng tôi coi sự thay đổi là cơ
                            hội chứ không phải mối đe dọa và bắt đầu với niềm tin rằng luôn có cách tốt hơn. </h2>
                        <p class="text-center px-lg-11 fs-15 lh-17 mb-11">
                            Trong 25 năm qua, chúng tôi đã tạo ra hơn 5.000 ngôi nhà mới và 1,5 triệu ft vuông không gian
                            làm việc trong hơn 60 dự án tái tạo. Hãy xem đoạn phim ngắn bên dưới để tìm hiểu thêm về cách
                            chúng tôi đạt được điều này và điều gì thúc đẩy chúng tôi.
                        </p>
                        <p class="letter-spacing-263 text-uppercase mb-4 font-weight-500 text-center">Đi Đến</p>
                        <div class="d-flex flex-wrap justify-content-center">
                            <a href="#" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Dịch Vụ</a>
                            <a href="#" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Nhóm
                                Trưởng</a>
                            <a href="#" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Vị Trí</a>
                            <a href="#" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Làm Việc
                                Với</a>
                        </div>
                    </div>
                </div>
                <h2 class="text-dark lh-1625 text-center mb-2 fs-22 fs-md-32">Dịch Vụ Của Chúng Tôi</h2>
                <p class="mxw-751 text-center mb-1 px-8">Chúng tôi mang đến cho bạn trải nghiệm tốt nhất về mọi mặt.</p>
                <div class="row mt-8">
                    <div class="col-md-4 mb-6 mb-lg-0">
                        <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1"><svg class="icon icon-e1">
                                        <use xlink:href="#icon-e1"></use>
                                    </svg></span>
                            </div>
                            <div class="card-body px-0 pt-6 pb-0 text-center">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Quản Lý Phòng Trọ</h4>
                                <p class="card-text px-2">
                                    Chúng tôi cam kết cung cấp dịch vụ quản lý phòng trọ chuyên nghiệp, đảm bảo sự hài lòng
                                    cho cả chủ trọ và người thuê. Với kinh nghiệm và chuyên môn trong ngành, chúng tôi giúp
                                    tối ưu hóa hoạt động và tối đa hóa lợi nhuận từ tài sản của bạn.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-6 mb-lg-0">
                        <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1">
                                    <svg class="icon icon-e2">
                                        <use xlink:href="#icon-e2"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="card-body px-0 pt-6 pb-0 text-center">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Dịch Vụ Phòng Trọ</h4>
                                <p class="card-text px-2">
                                    Chúng tôi cung cấp các giải pháp tài chính linh hoạt giúp bạn dễ dàng sở hữu hoặc đầu tư
                                    vào phòng trọ. Với các gói vay thế chấp lãi suất hấp dẫn và thủ tục nhanh chóng, chúng
                                    tôi đồng hành cùng bạn trong việc biến ước mơ sở hữu tài sản trở thành hiện thực.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-6 mb-lg-0">
                        <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <span class="text-primary fs-90 lh-1">
                                    <svg class="icon icon-e3">
                                        <use xlink:href="#icon-e3"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="card-body px-0 pt-6 text-center pb-0">
                                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Dịch Vụ Tư Vấn Phòng Trọ</h4>
                                <p class="card-text px-2">
                                    Chúng tôi cung cấp dịch vụ tư vấn chuyên nghiệp trong lĩnh vực phòng trọ, giúp bạn đưa
                                    ra các quyết định chính xác và hiệu quả. Từ việc chọn lựa vị trí phù hợp, tối ưu hóa chi
                                    phí cho đến quản lý tài sản, chúng tôi đồng hành cùng bạn ở mọi bước đường.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-12">
            <div class="container">
                <h2 class="text-dark lh-1625 text-center mb-2 fs-22 fs-md-32">Lãnh Đạo Quản lý Phòng Trọ</h2>
                <p class="mxw-751 text-center mb-1 px-8">Chúng tôi dẫn đầu trong lĩnh vực quản lý phòng trọ, cam kết mang
                    đến chất lượng dịch vụ tốt nhất. Với đội ngũ chuyên nghiệp và kinh nghiệm lâu năm, chúng tôi luôn nỗ lực
                    để đáp ứng mọi nhu cầu của khách hàng.</p>
                <div class="row mx-lg-n6 mt-8">
                    <div class="col-md-4 col-sm-12 mb-md-7 mb-4 px-lg-6">
                        <div class="card border-0 our-team text-center">
                            <div class="rounded overflow-hidden bg-hover-overlay d-inline-block">
                                <img class="card-img" src="{{ asset('assets/images/our-team-01.jpg') }}"
                                    alt="Dollie Horton">
                                <ul class="list-inline text-gray-lighter position-absolute w-100 m-0 p-0 z-index-2">
                                    <li class="list-inline-item m-0">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body pt-5">
                                <h3 class="fs-22 text-heading lh-164 mb-0">
                                    <a href="#" class="text-heading hover-primary">Nguyễn Hữu Thắng</a>
                                </h3>
                                <p class="m-0">Nhóm trưởng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-md-7 mb-4 px-lg-6">
                        <div class="card border-0 our-team text-center">
                            <div class="rounded overflow-hidden bg-hover-overlay d-inline-block">
                                <img class="card-img" src="{{ asset('assets/images/our-team-02.jpg') }}"
                                    alt="Dollie Horton">
                                <ul class="list-inline text-gray-lighter position-absolute w-100 m-0 p-0 z-index-2">
                                    <li class="list-inline-item m-0">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body pt-5">
                                <h3 class="fs-22 text-heading lh-164 mb-0">
                                    <a href="#" class="text-heading hover-primary">Lê Minh Huy</a>
                                </h3>
                                <p class="m-0">Thành viên</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-md-7 mb-4 px-lg-6">
                        <div class="card border-0 our-team text-center">
                            <div class="rounded overflow-hidden bg-hover-overlay d-inline-block">
                                <img class="card-img" src="{{ asset('assets/images/our-team-03.jpg') }}"
                                    alt="Dollie Horton">
                                <ul class="list-inline text-gray-lighter position-absolute w-100 m-0 p-0 z-index-2">
                                    <li class="list-inline-item m-0">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body pt-5">
                                <h3 class="fs-22 text-heading lh-164 mb-0">
                                    <a href="#" class="text-heading hover-primary">Nguyễn Thái Toàn</a>
                                </h3>
                                <p class="m-0">Thành viên</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-sm-0 mb-7">
                        <div class="card border-0 our-team text-center">
                            <div class="rounded overflow-hidden bg-hover-overlay d-inline-block">
                                <img class="card-img" src="{{ asset('assets/images/our-team-04.jpg') }}"
                                    alt="Dollie Horton">
                                <ul class="list-inline text-gray-lighter position-absolute w-100 m-0 p-0 z-index-2">
                                    <li class="list-inline-item m-0">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body pt-5">
                                <h3 class="fs-16 text-heading mb-1 lh-2">
                                    <a href="#" class="text-heading hover-primary">Tống Chí Nhân</a>
                                </h3>
                                <p>Thành viên</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-0 mb-7">
                        <div class="card border-0 our-team text-center">
                            <div class="rounded overflow-hidden bg-hover-overlay d-inline-block">
                                <img class="card-img" src="{{ asset('assets/images/our-team-06.jpg') }}"
                                    alt="Dollie Horton">
                                <ul class="list-inline text-gray-lighter position-absolute w-100 m-0 p-0 z-index-2">
                                    <li class="list-inline-item m-0">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body pt-5">
                                <h3 class="fs-16 text-heading mb-1 lh-2">
                                    <a href="#" class="text-heading hover-primary">Võ Tấn Luôn</a>
                                </h3>
                                <p>Thành viên</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-0 mb-7">
                        <div class="card border-0 our-team text-center">
                            <div class="rounded overflow-hidden bg-hover-overlay d-inline-block">
                                <img class="card-img" src="{{ asset('assets/images/our-team-05.jpg') }}"
                                    alt="Dollie Horton">
                                <ul class="list-inline text-gray-lighter position-absolute w-100 m-0 p-0 z-index-2">
                                    <li class="list-inline-item m-0">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body pt-5">
                                <h3 class="fs-16 text-heading mb-1 lh-2">
                                    <a href="#" class="text-heading hover-primary">Thành viên ảo 1</a>
                                </h3>
                                <p>Thành viên ảo 1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-0 mb-7">
                        <div class="card border-0 our-team text-center">
                            <div class="rounded overflow-hidden bg-hover-overlay d-inline-block">
                                <img class="card-img" src="{{ asset('assets/images/our-team-07.jpg') }}"
                                    alt="Dollie Horton">
                                <ul class="list-inline text-gray-lighter position-absolute w-100 m-0 p-0 z-index-2">
                                    <li class="list-inline-item m-0">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0 ml-2">
                                        <a href="#"
                                            class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body pt-5">
                                <h3 class="fs-16 text-heading mb-1 lh-2">
                                    <a href="#" class="text-heading hover-primary">Thành viên ảo 2</a>
                                </h3>
                                <p>Thành viên ảo 2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div>
                <div class="position-relative">
                    <div id="map" class="mapbox-gl map-point-animate" style="height: 550px"
                        data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ"
                        data-mapbox-options='{"center":[-73.981566, 40.739011],"setLngLat":[-73.981566, 40.739011]}'
                        data-mapbox-marker='[{"position":[-73.981566, 40.739011],"className":"marker","backgroundImage":"{{ asset('assets/images/googlle-market-01.png') }}","backgroundRepeat":"no-repeat","width":"32px","height":"40px"}]'>
                    </div>
                    <div class="container">
                        <div class="map-info position-absolute">
                            <div class="card border-0 shadow-xs-4">
                                <div class="card-body pl-7 pr-6 pt-7 pb-10">
                                    <h4 class="fs-22 lh-238 mb-0">Vị Trí Văn Phòng</h4>
                                    <p class="mb-8">Chúng tôi nằm ở vị trí thuận tiện, dễ dàng tiếp cận. Đội ngũ của
                                        chúng tôi luôn sẵn sàng phục vụ bạn với những dịch vụ tốt nhất.</p>
                                    <h5 class="fs-16 lh-2 mb-0">Ghé thăm văn phòng của chúng tôi tại</h5>
                                    <p class="mb-0">Quận Cái Răng, Thành phố Cần Thơ,
                                        Việt Nam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-12">
            <div class="container">
                <h2 class="text-heading mb-4 fs-22 fs-md-32 text-center lh-16 px-md-13">
                    GrandHome là một đơn vị môi giới giúp mọi người sống trong những không gian trọ tinh tế và đẹp mắt hơn.
                </h2>
                <p class="text-center px-md-17 fs-15 lh-17 mb-8">
                    Ngôi nhà trọ của chúng tôi là trung tâm của thiết kế, cho phép chúng tôi kết nối với cộng đồng qua các
                    buổi trò chuyện và sự kiện, đồng thời duy trì văn hóa công ty qua các buổi chiếu phim, lớp học yoga và
                    bữa trưa cùng đội ngũ.
                </p>
                <div class="text-center mb-11">
                    <a href="#" class="btn btn-lg btn-primary">Tham gia vào nhóm của chúng tôi</a>
                </div>
                <div class="row galleries mb-lg-n16">
                    <div class="col-sm-8 mb-6">
                        <div class="item item-size-2-1">
                            <a href="images/gallery-lg-08.jpg" class="card p-0 hover-zoom-in" data-gtf-mfp="true"
                                data-gallery-id="02">
                                <div class="card-img img"
                                    style="background-image:url('{{ asset('assets/images/gallery-08.jpg') }}')">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-6">
                        <div class="item item-size-2-1">
                            <a href="images/gallery-lg-09.jpg" class="card p-0 hover-zoom-in" data-gtf-mfp="true"
                                data-gallery-id="02">
                                <div class="card-img img"
                                    style="background-image:url('{{ asset('assets/images/gallery-09.jpg') }}')">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-6">
                        <div class="item item-size-2-1">
                            <a href="images/gallery-lg-10.jpg" class="card p-0 hover-zoom-in" data-gtf-mfp="true"
                                data-gallery-id="02">
                                <div class="card-img img"
                                    style="background-image:url('{{ asset('assets/images/gallery-10.jpg') }}')">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-6">
                        <div class="item item-size-2-1">
                            <a href="images/gallery-lg-11.jpg" class="card p-0 hover-zoom-in" data-gtf-mfp="true"
                                data-gallery-id="02">
                                <div class="card-img img"
                                    style="background-image:url('{{ asset('assets/images/gallery-11.jpg') }}')">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gray-01 pt-10 pt-lg-17 pb-10">
            <div class="container">
                <h2 class="text-dark lh-1625 text-center mb-8 fs-22 fs-md-32 pt-lg-10">Tiếp tục khám phá</h2>
                <div class="row">
                    <div class="col-sm-6 col-lg-3 mb-6 mb-lg-0">
                        <a href="agents-grid-with-sidebar.html"
                            class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <img src="{{ asset('assets/images/icon-box-4.png') }}"
                                    alt="Gặp gỡ các đại lý của chúng tôi">
                            </div>
                            <div class="card-body px-0 pt-2 pb-0 text-center">
                                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Gặp gỡ các đại lý của chúng tôi
                                </h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-6 mb-lg-0">
                        <a href="dashboard-add-new-property.html"
                            class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <img src="{{ asset('assets/images/icon-box-5.png') }}" alt="Bán căn nhà của bạn">
                            </div>
                            <div class="card-body px-0 pt-2 pb-0 text-center">
                                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Bán căn nhà của bạn</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-6 mb-lg-0">
                        <a href="blog-grid-with-sidebar.html"
                            class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <img src="{{ asset('assets/images/icon-box-6.png') }}" alt="Tin tức mới nhất">
                            </div>
                            <div class="card-body px-0 pt-2 text-center pb-0">
                                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Tin tức mới nhất</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-6 mb-lg-0">
                        <a href="contact-us-1.html" class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
                            <div class="card-img-top d-flex align-items-end justify-content-center">
                                <img src="{{ asset('assets/images/icon-box-7.png') }}" alt="Liên hệ với chúng tôi">
                            </div>
                            <div class="card-body px-0 pt-2 text-center pb-0">
                                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Liên hệ với chúng tôi</h4>
                            </div>
                        </a>
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
    <title>Về Chúng Tôi | TRỌ NHANH</title>
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