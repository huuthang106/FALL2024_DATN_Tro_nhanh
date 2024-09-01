@extends('layouts.main')
@section('titleUs', 'Bản Đồ | TRỌ NHANH')
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
        <section class="pt-6 pb-5 shadow-xs-1 bg-white position-relative z-index-2">
            <div class="container-fluid px-xxl-6">
                <form class="form-inline mx-n1" id="accordion-5">
                    <div class="form-group p-1">
                        <label for="location-2" class="sr-only">Vị trí</label>
                        <select class="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker"
                            title="Vị trí" data-style="bg-white" id="location-2" name="location">
                            <option>Hà Nội</option>
                            <option>Hồ Chí Minh</option>
                            <option>Đà Nẵng</option>
                            <option>Hải Phòng</option>
                            <option>Cần Thơ</option>
                            <option>Đà Lạt</option>
                            <option>Nha Trang</option>
                        </select>
                    </div>
                    <div class="form-group p-1">
                        <label for="any-price" class="sr-only">Giá</label>
                        <select class="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker"
                            title="Giá" data-style="bg-white" id="any-price" name="any-price">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                    <div class="form-group p-1">
                        <label for="type" class="sr-only">Loại</label>
                        <select class="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker"
                            title="Loại" data-style="bg-white" id="type" name="type">
                            <option selected>Nhà ở</option>
                            <option>Khách sạn</option>
                            <option>Phòng trọ</option>
                        </select>
                    </div>
                    <div class="form-group p-1">
                        <label for="status" class="sr-only">Trạng thái</label>
                        <select class="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker"
                            title="Trạng thái" data-style="bg-white" id="status" name="status">
                            <option>Trạng thái</option>
                            <option>Cho thuê</option>
                            <option>Cần bán</option>
                        </select>
                    </div>
                    <div class="form-group p-1">
                        <label for="area" class="sr-only">Khu vực</label>
                        <select class="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker"
                            title="Khu vực" data-style="bg-white" id="area" name="areas">
                            <option>Khách sạn</option>
                            <option>Phòng trọ</option>
                        </select>
                    </div>
                    <div class="form-group p-1">
                        <label for="room" class="sr-only">Phòng</label>
                        <select class="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker"
                            title="Phòng" data-style="bg-white" id="room" name="room">
                            <option selected>2+ Giường</option>
                            <option>3+ Giường</option>
                        </select>
                    </div>
                    <div class="form-group p-1">
                        <a href="#advanced-search-filters-5"
                            class="btn bg-transparent border-0 shadow-xxs-1 text-gray-light" data-toggle="collapse"
                            data-target="#advanced-search-filters-5" aria-expanded="true"
                            aria-controls="advanced-search-filters-5">
                            <span>Khác</span>
                            <span class="ml-auto">...</span>
                        </a>
                    </div>
                    <div class="form-group p-1 custom-control custom-switch custom-switch-right ml-lg-auto">
                        <label class="fs-13 text-heading font-weight-500 custom-switch-right mr-7">Bản đồ</label>
                        <input type="checkbox" class="custom-control-input" name="features" id="customSwitch1" checked>
                        <label class="custom-control-label h-24" for="customSwitch1"></label>
                    </div>
                    <div id="advanced-search-filters-5" class="row pb-6 pt-2 collapse p-1 w-100"
                        data-parent="#accordion-5">
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check1-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check1-2">Điều hòa</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check2-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check2-2">Giặt là</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check4-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check4-2">Máy giặt</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check5-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check5-2">Nướng BBQ</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check6-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check6-2">Sân cỏ</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check7-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check7-2">Phòng xông hơi</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check8-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check8-2">WiFi</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check9-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check9-2">Máy sấy</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check10-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check10-2">Lò vi sóng</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check11-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check11-2">Hồ bơi</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check12-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check12-2">Rèm cửa</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check13-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check13-2">Phòng gym</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check14-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check14-2">Vòi sen ngoài trời</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check15-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check15-2">Truyền hình cáp</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check16-2" name="feature[]">
                                <label class="custom-control-label text-white" for="check16-2">Tủ lạnh</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="position-relative">
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
                                        <div class="card mb-8 mb-lg-6 border-0" data-animate="fadeInUp">
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
                                    {{-- <ul class="pagination rounded-active justify-content-center mb-0">
                                        <li class="page-item"><a class="page-link" href="#"><i
                                                    class="far fa-angle-double-left"></i></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">...</li>
                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i
                                                    class="far fa-angle-double-right"></i></a>
                                        </li>
                                    </ul> --}}
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
                            <div class="mapbox-gl map-grid-property-01 xl-vh-100" id="map"
                                data-marker-target="#template-properties"
                                data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ">
                            </div>
                            {{-- <div id="map">
                            </div> --}}
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
    </main>

@endsection
@push('styleUs')
    <meta charset="utf-8">
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
    <meta name="twitter:image" content="images/homeid-social-logo.png">
    <!-- Facebook -->
    <meta property="og:url" content="listing-half-map-grid-layout-1.html">
    <meta property="og:title" content="Listing Half Map Grid Layout 1">
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC67NQzqFC2WplLzC_3PsL5gejG1_PZLDk&libraries=places">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-ggmap-nht.js') }}"></script>
    <script src="{{ asset('assets/js/api-update-zone-nht.js') }}"></script>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>
    <script src="{{ asset('assets/js/alert-update-user.js') }}"></script>
@endpush
