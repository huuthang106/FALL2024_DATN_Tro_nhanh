@extends('layouts.owner')
@section('titleOwners', 'Trang chủ trọ nhanh')
@section('contentOwners')

                <main id="content" class="bg-gray-01">
                    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
                        <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                            <div class="mr-0 mr-md-auto">
                                <h2 class="mb-0 text-heading fs-22 lh-15">Những mục yêu thích của tôi<span
                                        class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">5</span>
                                </h2>
                                <p>Xem Thêm</p>
                            </div>
                            <div class="form-inline justify-content-md-end mx-n2">
                                <div class="p-2">
                                    <div class="input-group input-group-lg bg-white border">
                                        <div class="input-group-prepend">
                                            <button class="btn pr-0 shadow-none" type="button"><i
                                                    class="far fa-search"></i></button>
                                        </div>
                                        <input type="text"
                                            class="form-control bg-transparent border-0 shadow-none text-body"
                                            placeholder="Tìm kiem" name="search">
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="input-group input-group-lg bg-white border">
                                        <div class="input-group-prepend">
                                            <span
                                                class="input-group-text bg-transparent letter-spacing-093 border-0 pr-0"><i
                                                    class="far fa-align-left mr-2"></i>Sắp xếp theo:</span>
                                        </div>
                                        <select
                                            class="form-control bg-transparent pl-0 selectpicker d-flex align-items-center sortby"
                                            name="sort-by"
                                            data-style="bg-transparent px-1 py-0 lh-1 font-weight-600 text-body"
                                            id="status">
                                            <option>Theo chữ cái</option> <!-- Alphabet -->
                                            <option>Giá - Từ thấp đến cao</option>
                                            <option>Giá - Từ cao đến thấp</option> <!-- Price - High to Low -->
                                            <option>Ngày - Từ cũ đến mới</option> <!-- Date - Old to New -->
                                            <option>Ngày - Từ mới đến cũ</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xxl-3 mb-6">
                                <div class="card shadow-hover-1">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                        <img src="{{ asset('assets/images/properties-grid-38.jpg') }}"
                                            alt="Nhà tại Metric Way">

                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                            <div>
                                                <span class="badge badge-primary">để bán</span>
                                            </div>
                                            <div class="mt-auto hover-image">
                                                <ul class="list-inline mb-0 d-flex align-items-end">
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
                                    </div>
                                    <div class="card-body pt-3">
                                        <h2 class="card-title fs-16 lh-2 mb-0">
                                            <a href="single-property-1.html" class="text-dark hover-primary">Nhà tại
                                                Metric Way</a>
                                        </h2>
                                        <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los
                                            Angeles</p>
                                        <ul class="list-inline d-flex mb-0 flex-wrap">
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng ngủ">
                                                <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-bedroom"></use>
                                                </svg>
                                                3 Phòng ngủ
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng tắm">
                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                                3 Phòng tắm
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center px-1 mr-2"
                                                data-toggle="tooltip" title="2300 Sq.Ft">
                                                <svg class="icon icon-square fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-square"></use>
                                                </svg>
                                                2300 Sq.Ft
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="1 Garage">
                                                <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-Garage"></use>
                                                </svg>
                                                1 Garage
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                        <div class="mr-auto">
                                            <span class="text-heading lh-15 font-weight-bold fs-17">$.1250.000</span>
                                        </div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="Wish list"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent"><i
                                                        class="fas fa-heart"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="Compare"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"><i
                                                        class="fas fa-exchange-alt"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xxl-3 mb-6">
                                <div class="card shadow-hover-1">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                        <img src="{{ asset('assets/images/properties-grid-38.jpg') }}"
                                            alt="Nhà tại Metric Way">

                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                            <div>
                                                <span class="badge badge-indigo">cho thuê</span>
                                            </div>
                                            <div class="mt-auto hover-image">
                                                <ul class="list-inline mb-0 d-flex align-items-end">
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                        title="9 Hình ảnh">
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
                                    </div>
                                    <div class="card-body pt-3">
                                        <h2 class="card-title fs-16 lh-2 mb-0">
                                            <a href="single-property-1.html" class="text-dark hover-primary">Nhà tại
                                                Metric Way</a>
                                        </h2>
                                        <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los
                                            Angeles</p>
                                        <ul class="list-inline d-flex mb-0 flex-wrap">
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng ngủ">
                                                <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-bedroom"></use>
                                                </svg>
                                                3 Phòng ngủ
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng tắm">
                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                                3 Phòng tắm
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center px-1 mr-2"
                                                data-toggle="tooltip" title="2300 Sq.Ft">
                                                <svg class="icon icon-square fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-square"></use>
                                                </svg>
                                                2300 Sq.Ft
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="1 Garage">
                                                <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-Garage"></use>
                                                </svg>
                                                1 Garage
                                            </li>
                                        </ul>
                                    </div>
                                    <div
                                        class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                        <div class="mr-auto">
                                            <span class="text-heading lh-15 font-weight-bold fs-17">$550</span>
                                            <span class="text-gray-light">/tháng</span>
                                        </div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="Danh sách yêu thích"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="So sánh"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xxl-3 mb-6">
                                <div class="card shadow-hover-1">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                        <img src="{{ asset('assets/images/properties-grid-38.jpg') }}"
                                            alt="Nhà tại Metric Way">
                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                            <div>
                                                <span class="badge badge-indigo">cho thuê</span>
                                            </div>
                                            <div class="mt-auto hover-image">
                                                <ul class="list-inline mb-0 d-flex align-items-end">
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                        title="9 Hình ảnh">
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
                                    </div>
                                    <div class="card-body pt-3">
                                        <h2 class="card-title fs-16 lh-2 mb-0">
                                            <a href="single-property-1.html" class="text-dark hover-primary">Nhà tại
                                                Metric Way</a>
                                        </h2>
                                        <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los
                                            Angeles</p>
                                        <ul class="list-inline d-flex mb-0 flex-wrap">
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng ngủ">
                                                <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-bedroom"></use>
                                                </svg>
                                                3 Phòng ngủ
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng tắm">
                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                                3 Phòng tắm
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center px-1 mr-2"
                                                data-toggle="tooltip" title="2300 Sq.Ft">
                                                <svg class="icon icon-square fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-square"></use>
                                                </svg>
                                                2300 Sq.Ft
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="1 Garage">
                                                <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-Garage"></use>
                                                </svg>
                                                1 Garage
                                            </li>
                                        </ul>
                                    </div>
                                    <div
                                        class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                        <div class="mr-auto">
                                            <span class="text-heading lh-15 font-weight-bold fs-17">$550</span>
                                            <span class="text-gray-light">/tháng</span>
                                        </div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="Danh sách yêu thích"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="So sánh"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-xxl-3 mb-6">
                                <div class="card shadow-hover-1">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                        <img src="{{ asset('assets/images/properties-grid-38.jpg') }}"
                                            alt="Nhà tại Metric Way">
                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                            <div>
                                                <span class="badge badge-indigo">cho thuê</span>
                                            </div>
                                            <div class="mt-auto hover-image">
                                                <ul class="list-inline mb-0 d-flex align-items-end">
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                        title="9 Hình ảnh">
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
                                    </div>
                                    <div class="card-body pt-3">
                                        <h2 class="card-title fs-16 lh-2 mb-0">
                                            <a href="single-property-1.html" class="text-dark hover-primary">Nhà tại
                                                Metric Way</a>
                                        </h2>
                                        <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los
                                            Angeles</p>
                                        <ul class="list-inline d-flex mb-0 flex-wrap">
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng ngủ">
                                                <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-bedroom"></use>
                                                </svg>
                                                3 Phòng ngủ
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng tắm">
                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                                3 Phòng tắm
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center px-1 mr-2"
                                                data-toggle="tooltip" title="2300 Sq.Ft">
                                                <svg class="icon icon-square fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-square"></use>
                                                </svg>
                                                2300 Sq.Ft
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="1 Garage">
                                                <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-Garage"></use>
                                                </svg>
                                                1 Garage
                                            </li>
                                        </ul>
                                    </div>
                                    <div
                                        class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                        <div class="mr-auto">
                                            <span class="text-heading lh-15 font-weight-bold fs-17">$550</span>
                                            <span class="text-gray-light">/tháng</span>
                                        </div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="Danh sách yêu thích"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="So sánh"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-xxl-3 mb-6">
                                <div class="card shadow-hover-1">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                        <img src="{{ asset('assets/images/properties-grid-38.jpg') }}"
                                            alt="Nhà tại Metric Way">
                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                            <div>
                                                <span class="badge badge-indigo">cho thuê</span>
                                            </div>
                                            <div class="mt-auto hover-image">
                                                <ul class="list-inline mb-0 d-flex align-items-end">
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                        title="9 Hình ảnh">
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
                                    </div>
                                    <div class="card-body pt-3">
                                        <h2 class="card-title fs-16 lh-2 mb-0">
                                            <a href="single-property-1.html" class="text-dark hover-primary">Nhà tại
                                                Metric Way</a>
                                        </h2>
                                        <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los
                                            Angeles</p>
                                        <ul class="list-inline d-flex mb-0 flex-wrap">
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng ngủ">
                                                <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-bedroom"></use>
                                                </svg>
                                                3 Phòng ngủ
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng tắm">
                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                                3 Phòng tắm
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center px-1 mr-2"
                                                data-toggle="tooltip" title="2300 Sq.Ft">
                                                <svg class="icon icon-square fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-square"></use>
                                                </svg>
                                                2300 Sq.Ft
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="1 Garage">
                                                <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-Garage"></use>
                                                </svg>
                                                1 Garage
                                            </li>
                                        </ul>
                                    </div>
                                    <div
                                        class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                        <div class="mr-auto">
                                            <span class="text-heading lh-15 font-weight-bold fs-17">$550</span>
                                            <span class="text-gray-light">/tháng</span>
                                        </div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="Danh sách yêu thích"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="So sánh"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-xxl-3 mb-6">
                                <div class="card shadow-hover-1">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                        <img src="{{ asset('assets/images/properties-grid-38.jpg') }}"
                                            alt="Nhà tại Metric Way">
                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                            <div>
                                                <span class="badge badge-indigo">cho thuê</span>
                                            </div>
                                            <div class="mt-auto hover-image">
                                                <ul class="list-inline mb-0 d-flex align-items-end">
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                        title="9 Hình ảnh">
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
                                    </div>
                                    <div class="card-body pt-3">
                                        <h2 class="card-title fs-16 lh-2 mb-0">
                                            <a href="single-property-1.html" class="text-dark hover-primary">Nhà tại
                                                Metric Way</a>
                                        </h2>
                                        <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los
                                            Angeles</p>
                                        <ul class="list-inline d-flex mb-0 flex-wrap">
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng ngủ">
                                                <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-bedroom"></use>
                                                </svg>
                                                3 Phòng ngủ
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng tắm">
                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                                3 Phòng tắm
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center px-1 mr-2"
                                                data-toggle="tooltip" title="2300 Sq.Ft">
                                                <svg class="icon icon-square fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-square"></use>
                                                </svg>
                                                2300 Sq.Ft
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="1 Garage">
                                                <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-Garage"></use>
                                                </svg>
                                                1 Garage
                                            </li>
                                        </ul>
                                    </div>
                                    <div
                                        class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                        <div class="mr-auto">
                                            <span class="text-heading lh-15 font-weight-bold fs-17">$550</span>
                                            <span class="text-gray-light">/tháng</span>
                                        </div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="Danh sách yêu thích"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="So sánh"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-xxl-3 mb-6">
                                <div class="card shadow-hover-1">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                        <img src="{{ asset('assets/images/properties-grid-38.jpg') }}"
                                            alt="Nhà tại Metric Way">
                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                            <div>
                                                <span class="badge badge-indigo">cho thuê</span>
                                            </div>
                                            <div class="mt-auto hover-image">
                                                <ul class="list-inline mb-0 d-flex align-items-end">
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                        title="9 Hình ảnh">
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
                                    </div>
                                    <div class="card-body pt-3">
                                        <h2 class="card-title fs-16 lh-2 mb-0">
                                            <a href="single-property-1.html" class="text-dark hover-primary">Nhà tại
                                                Metric Way</a>
                                        </h2>
                                        <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los
                                            Angeles</p>
                                        <ul class="list-inline d-flex mb-0 flex-wrap">
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng ngủ">
                                                <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-bedroom"></use>
                                                </svg>
                                                3 Phòng ngủ
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="3 Phòng tắm">
                                                <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-shower"></use>
                                                </svg>
                                                3 Phòng tắm
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center px-1 mr-2"
                                                data-toggle="tooltip" title="2300 Sq.Ft">
                                                <svg class="icon icon-square fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-square"></use>
                                                </svg>
                                                2300 Sq.Ft
                                            </li>
                                            <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                                data-toggle="tooltip" title="1 Garage">
                                                <svg class="icon icon-Garage fs-18 text-primary mr-1">
                                                    <use xlink:href="#icon-Garage"></use>
                                                </svg>
                                                1 Garage
                                            </li>
                                        </ul>
                                    </div>
                                    <div
                                        class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                        <div class="mr-auto">
                                            <span class="text-heading lh-15 font-weight-bold fs-17">$550</span>
                                            <span class="text-gray-light">/tháng</span>
                                        </div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="Danh sách yêu thích"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" data-toggle="tooltip" title="So sánh"
                                                    class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>







                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <!-- Vendors scripts -->

    
@endsection
@push('styleOwners')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Home 01 - HomeID</title>
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
@push('scriptOwners')
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
