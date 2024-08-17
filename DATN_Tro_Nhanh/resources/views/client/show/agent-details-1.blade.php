@extends('layouts.main')
@section('titleUs', 'Chi Tiết Người Đăng Tin | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="pb-7 page-title position-relative z-index-2">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-6 pt-lg-0 pb-0">
                        <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('client.client-agent') }}">Người đăng tin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                    </ol>
                </nav>
            </div>
        </section>
        <section class="pb-7 shadow-xs-1 position-relative z-index-1 mt-n17">
            <div class="container pt-17">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ $user->image ? asset('assets/images/' . $user->image) : asset('assets/images/agent-25.jpg') }}" 
                             class="card-img" 
                             alt="{{ $user->name }}">
                    </div>
                    <div class="col-md-7">
                        <div class="pl-md-10 pr-md-8 py-7">
                            <h2 class="fs-30 text-dark font-weight-600 lh-16 mb-0">{{ $user->name }}</h2>
                            <p class="fs-16 font-weight-500 lh-213 mb-4">Chủ trọ, người đăng tin cho thuê</p>
                            <p class="mb-1">Người đăng tin tại <a href="#" class="text-heading">Trọ Nhanh</a></p>
                            <p class="mb-6">{{ $user->address ?? 'Mô tả không có sẵn.' }}</p>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <p class="mb-0">Số điện thoại</p>
                                    <p class="text-heading font-weight-500 mb-0 lh-13">{{ $user->phone }}</p>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <p class="mb-0">Email</p>
                                    <p class="text-heading font-weight-500 mb-0 lh-13">{{ $user->email }}</p>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row align-items-center">
                                <div class="col-sm-6 mb-6 mb-sm-0">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item fs-13 text-heading font-weight-500">{{ $user->rating ?? 'Chưa có đánh giá' }}</li>
                                        <li class="list-inline-item fs-13 text-heading font-weight-500 mr-1">
                                            <ul class="list-inline mb-0">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <li class="list-inline-item mr-0">
                                                        <span class="text-warning fs-12 lh-2">
                                                            <i class="fas fa-star"></i>
                                                        </span>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </li>
                                        <li class="list-inline-item fs-13 text-gray-light">({{ $user->reviews_count ?? 0 }} đánh giá)</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-inline text-gray-lighter m-0 p-0">
                                        <li class="list-inline-item mx-0 my-1">
                                            <a href="#" class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-0 ml-2 my-1">
                                            <a href="#" class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-0 ml-2 my-1">
                                            <a href="#" class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-0 ml-2 my-1">
                                            <a href="#" class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        
        
   
        <section class="bg-gray-01 pt-9 pb-13">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-6 mb-lg-0">
                        <div class="collapse-tabs mb-10">
                            <ul class="nav nav-tabs text-uppercase d-none d-md-inline-flex agent-details-tabs"
                                role="tablist">
                                <li class="nav-item">
                                    <a href="#all" class="nav-link active shadow-none fs-13" data-toggle="tab"
                                        role="tab">
                                        Tất cả (8)
                                    </a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a href="#sale" class="nav-link shadow-none fs-13" data-toggle="tab" role="tab">
                                        Bán (5)
                                    </a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a href="#rent" class="nav-link shadow-none fs-13" data-toggle="tab"
                                        role="tab">
                                        Cho Thuê (3)
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content shadow-none pt-7 pb-0 px-6 bg-white">
                                <div id="collapse-tabs-accordion-01">
                                    <div class="tab-pane tab-pane-parent fade show active" id="all"
                                        role="tabpanel">
                                        <div class="card border-0 bg-transparent">
                                            <div class="card-header border-0 d-block d-md-none bg-transparent px-0 py-1"
                                                id="headingAll-01">
                                                <h5 class="mb-0">
                                                    <button
                                                        class="btn lh-2 fs-18 bg-white py-1 px-6 mb-4 shadow-none w-100 collapse-parent border"
                                                        data-toggle="collapse" data-target="#all-collapse-01"
                                                        aria-expanded="true" aria-controls="all-collapse-01">
                                                        Tất cả (8)
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="all-collapse-01" class="collapse show collapsible"
                                                aria-labelledby="headingAll-01" data-parent="#collapse-tabs-accordion-01">
                                                <div class="card-body p-0">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                                                        alt="Nhà Siêu Cấp">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-primary">Bán</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Nhà Siêu
                                                                            Cấp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Ninh Kiều, TP.Cần Thơ</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        $1.250.000
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-36.jpg') }}"
                                                                        alt="Trọ Đẹp">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-indigo">Cho
                                                                                Thuê</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Trọ Đẹp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Cao Lãnh, Đồng Tháp</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        $550
                                                                        <span
                                                                            class="fs-14 font-weight-500 text-gray-light">
                                                                            /tháng</span>
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                                                        alt="Nhà Siêu Cấp">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-primary">Bán</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Nhà Siêu
                                                                            Cấp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Ninh Kiều, TP.Cần Thơ</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        $1.250.000
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-36.jpg') }}"
                                                                        alt="Trọ Đẹp">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-indigo">Cho
                                                                                Thuê</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Trọ Đẹp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Cao Lãnh, Đồng Tháp</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        $550
                                                                        <span
                                                                            class="fs-14 font-weight-500 text-gray-light">
                                                                            /tháng</span>
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                                                        alt="Nhà Siêu Cấp">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-primary">Bán</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Nhà Siêu
                                                                            Cấp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Ninh Kiều, TP.Cần Thơ</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        $1.250.000
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-36.jpg') }}"
                                                                        alt="Trọ Đẹp">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-indigo">Cho
                                                                                Thuê</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Trọ Đẹp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Cao Lãnh, Đồng Tháp</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        $550
                                                                        <span
                                                                            class="fs-14 font-weight-500 text-gray-light">
                                                                            /tháng</span>
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                                                        alt="Nhà Siêu Cấp">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-primary">Bán</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Nhà Siêu
                                                                            Cấp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Ninh Kiều, TP.Cần Thơ</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        $1.250.000
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-36.jpg') }}"
                                                                        alt="Trọ Đẹp">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-indigo">Cho
                                                                                Thuê</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Trọ Đẹp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Cao Lãnh, Đồng Tháp</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        $550
                                                                        <span
                                                                            class="fs-14 font-weight-500 text-gray-light">
                                                                            /tháng</span>
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane tab-pane-parent fade" id="sale" role="tabpanel">
                                        <div class="card border-0 bg-transparent">
                                            <div class="card-header border-0 d-block d-md-none bg-transparent p-0"
                                                id="headingSale-01">
                                                <h5 class="mb-0">
                                                    <button
                                                        class="btn lh-2 fs-18 bg-white py-1 px-6 shadow-none w-100 collapse-parent border collapsed mb-4"
                                                        data-toggle="collapse" data-target="#sale-collapse-01"
                                                        aria-expanded="true" aria-controls="sale-collapse-01">
                                                        Bán (5)
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="sale-collapse-01" class="collapse collapsible"
                                                aria-labelledby="headingSale-01"
                                                data-parent="#collapse-tabs-accordion-01">
                                                <div class="card-body p-0">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                                                        alt="Home in Metric Way">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-primary">Bán</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Nhà Siêu
                                                                            Cấp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Ninh Kiều, TP.Cần Thơ</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        1.250.000đ
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                                                        alt="Home in Metric Way">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-primary">Bán</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Nhà Siêu
                                                                            Cấp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Ninh Kiều, TP.Cần Thơ</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        1.250.000đ
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                                                        alt="Home in Metric Way">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-primary">Bán</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Nhà Siêu
                                                                            Cấp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Ninh Kiều, TP.Cần Thơ</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        1.250.000đ
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                                                        alt="Home in Metric Way">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-primary">Bán</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Nhà Siêu
                                                                            Cấp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Ninh Kiều, TP.Cần Thơ</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        1.250.000đ
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                                                        alt="Home in Metric Way">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-primary">Bán</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Nhà Siêu
                                                                            Cấp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Ninh Kiều, TP.Cần Thơ</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        1.250.000đ
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                                                        alt="Home in Metric Way">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-primary">Bán</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip" title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip" title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
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
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Nhà Siêu
                                                                            Cấp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Ninh Kiều, TP.Cần Thơ</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        1.250.000đ
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane tab-pane-parent fade" id="rent" role="tabpanel">
                                        <div class="card border-0 bg-transparent">
                                            <div class="card-header border-0 d-block d-md-none bg-transparent p-0"
                                                id="headingRent-01">
                                                <h5 class="mb-0">
                                                    <button
                                                        class="btn lh-2 fs-18 bg-white py-1 px-6 shadow-none w-100 collapse-parent border collapsed mb-4"
                                                        data-toggle="collapse" data-target="#rent-collapse-01"
                                                        aria-expanded="true" aria-controls="rent-collapse-01">
                                                        Cho Thuê (3)
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="rent-collapse-01" class="collapse collapsible"
                                                aria-labelledby="headingRent-01"
                                                data-parent="#collapse-tabs-accordion-01">
                                                <div class="card-body p-0">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-36.jpg') }}"
                                                                        alt="Trọ Đẹp">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-indigo">Cho
                                                                                Thuê</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip"
                                                                                    title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip"
                                                                                    title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="So sánh">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i
                                                                                            class="fas fa-exchange-alt"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Trọ Đẹp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Cao Lãnh, Đồng Tháp</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        550đ
                                                                        <span
                                                                            class="fs-14 font-weight-500 text-gray-light">
                                                                            /tháng</span>
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-7">
                                                            <div class="card border-0">
                                                                <div
                                                                    class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                                                    <img src="{{ asset('assets/images/properties-grid-68.jpg') }}"
                                                                        alt="Trọ Đẹp">
                                                                    <div class="card-img-overlay d-flex flex-column">
                                                                        <div class="mb-auto">
                                                                            <span class="badge badge-indigo">Cho
                                                                                Thuê</span>
                                                                        </div>
                                                                        <div class="d-flex hover-image">
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-auto">
                                                                                <li class="list-inline-item mr-2"
                                                                                    data-toggle="tooltip"
                                                                                    title="9 Ảnh">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i class="far fa-images"></i><span
                                                                                            class="pl-1">9</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item"
                                                                                    data-toggle="tooltip"
                                                                                    title="2 Video">
                                                                                    <a href="#"
                                                                                        class="text-white hover-primary">
                                                                                        <i
                                                                                            class="far fa-play-circle"></i><span
                                                                                            class="pl-1">2</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul
                                                                                class="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="Yêu thích">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i class="far fa-heart"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item mr-3 h-32"
                                                                                    data-toggle="tooltip"
                                                                                    title="So sánh">
                                                                                    <a href="#"
                                                                                        class="text-white fs-20 hover-primary">
                                                                                        <i
                                                                                            class="fas fa-exchange-alt"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body pt-3 px-0 pb-1">
                                                                    <h2 class="fs-16 mb-1"><a
                                                                            href="single-property-1.html"
                                                                            class="text-dark hover-primary">Trọ Đẹp</a>
                                                                    </h2>
                                                                    <p class="font-weight-500 text-gray-light mb-0">
                                                                        Cao Lãnh, Đồng Tháp</p>
                                                                    <p
                                                                        class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                                                        550đ
                                                                        <span
                                                                            class="fs-14 font-weight-500 text-gray-light">
                                                                            /tháng</span>
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng">
                                                                            <svg
                                                                                class="icon icon-bedroom fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-bedroom"></use>
                                                                            </svg>
                                                                            3 Phòng
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                                                            data-toggle="tooltip" title="3 Phòng tắm">
                                                                            <svg
                                                                                class="icon icon-shower fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-shower"></use>
                                                                            </svg>
                                                                            3 Phòng tắm
                                                                        </li>
                                                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                                                            data-toggle="tooltip" title="2300m²">
                                                                            <svg
                                                                                class="icon icon-square fs-18 text-primary mr-1">
                                                                                <use xlink:href="#icon-square"></use>
                                                                            </svg>
                                                                            2300m²
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="fs-22 text-heading lh-15 mb-6">Xếp Hạng & Đánh Giá </h2>
                        <div class="card border-0 mb-4">
                            <div class="card-body p-6">
                                <div class="row">
                                    <div class="col-sm-6 mb-6 mb-sm-0">
                                        <h5 class="fs-16 lh-2 text-heading mb-6">
                                            Đánh Giá Trung Bình
                                        </h5>
                                        <p class="fs-40 text-heading font-weight-bold mb-6 lh-1">4.6 <span
                                                class="fs-18 text-gray-light font-weight-normal">/5</span></p>
                                        <ul class="list-inline">
                                            <li
                                                class="list-inline-item bg-warning text-white w-46px h-46 rounded-lg d-inline-flex align-items-center justify-content-center fs-18 mb-1">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li
                                                class="list-inline-item bg-warning text-white w-46px h-46 rounded-lg d-inline-flex align-items-center justify-content-center fs-18 mb-1">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li
                                                class="list-inline-item bg-warning text-white w-46px h-46 rounded-lg d-inline-flex align-items-center justify-content-center fs-18 mb-1">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li
                                                class="list-inline-item bg-warning text-white w-46px h-46 rounded-lg d-inline-flex align-items-center justify-content-center fs-18 mb-1">
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li
                                                class="list-inline-item bg-gray-04 text-white w-46px h-46 rounded-lg d-inline-flex align-items-center justify-content-center fs-18 mb-1">
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="fs-16 lh-2 text-heading mb-5">
                                            Xếp Hạng
                                        </h5>
                                        <div class="d-flex align-items-center mx-n1">
                                            <ul class="list-inline d-flex px-1 mb-0">
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                            </ul>
                                            <div class="d-block w-100 px-1">
                                                <div class="progress rating-progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="text-muted px-1">60%</div>
                                        </div>
                                        <div class="d-flex align-items-center mx-n1">
                                            <ul class="list-inline d-flex px-1 mb-0">
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-border mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                            </ul>
                                            <div class="d-block w-100 px-1">
                                                <div class="progress rating-progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="text-muted px-1">40%</div>
                                        </div>
                                        <div class="d-flex align-items-center mx-n1">
                                            <ul class="list-inline d-flex px-1 mb-0">
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-border mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-border mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                            </ul>
                                            <div class="d-block w-100 px-1">
                                                <div class="progress rating-progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-muted px-1">0%</div>
                                        </div>
                                        <div class="d-flex align-items-center mx-n1">
                                            <ul class="list-inline d-flex px-1 mb-0">
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-border mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-border mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-border mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                            </ul>
                                            <div class="d-block w-100 px-1">
                                                <div class="progress rating-progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-muted px-1">0%</div>
                                        </div>
                                        <div class="d-flex align-items-center mx-n1">
                                            <ul class="list-inline d-flex px-1 mb-0">
                                                <li class="list-inline-item text-warning mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-border mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-border mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-border mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li class="list-inline-item text-border mr-1">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                            </ul>
                                            <div class="d-block w-100 px-1">
                                                <div class="progress rating-progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-muted px-1">0%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 mb-4">
                            <div class="card-body p-6">
                                <h3 class="fs-16 lh-2 text-heading mb-6">67 Reviews</h3>
                                <div class="media border-bottom mb-6 pb-6">
                                    <img src="{{ asset('assets/images/review-06.jpg') }}" alt="Nguyễn Văn A"
                                        class="mr-2">
                                    <div class="media-body">
                                        <div class="row mb-1 align-items-center">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <p class="mb-0 text-heading fs-16 font-weight-500">Nguyễn Văn A</p>
                                                <p class="mb-0 lh-1">Hà Nội</p>
                                            </div>
                                            <div class="col-sm-6 text-sm-right">
                                                <ul class="list-inline d-flex justify-content-sm-end mb-0">
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                </ul>
                                                <p class="mb-0 text-muted">02 Tháng 12, 2016 lúc 2:40 chiều</p>
                                            </div>
                                        </div>
                                        <p class="mb-0">Dịch vụ hỗ trợ rất tốt và nhanh chóng trong suốt tuần qua. Cảm
                                            ơn vì luôn cập nhật thông tin và quản lý nhà trọ của bạn. Mức độ hỗ trợ và sự
                                            tận tâm của bạn là không có đối thủ. Đã giải quyết tất cả các vấn đề của tôi
                                            trong thời gian gấp! Rất hào hứng chờ xem các lựa chọn thuê trọ khác mà bạn cung
                                            cấp!</p>
                                    </div>
                                </div>
                                <div class="media border-bottom mb-6 pb-6">
                                    <img src="{{ asset('assets/images/review-01.jpg') }}" alt="Nguyễn Văn A"
                                        class="mr-2">
                                    <div class="media-body">
                                        <div class="row mb-1 align-items-center">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <p class="mb-0 text-heading fs-16 font-weight-500">Nguyễn Văn A</p>
                                                <p class="mb-0 lh-1">Hà Nội</p>
                                            </div>
                                            <div class="col-sm-6 text-sm-right">
                                                <ul class="list-inline d-flex justify-content-sm-end mb-0">
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                </ul>
                                                <p class="mb-0 text-muted">02 Tháng 12, 2016 lúc 2:40 chiều</p>
                                            </div>
                                        </div>
                                        <p class="mb-0">Dịch vụ hỗ trợ rất tốt và nhanh chóng trong suốt tuần qua. Cảm
                                            ơn vì luôn cập nhật thông tin và quản lý nhà trọ của bạn. Mức độ hỗ trợ và sự
                                            tận tâm của bạn là không có đối thủ. Đã giải quyết tất cả các vấn đề của tôi
                                            trong thời gian gấp! Rất hào hứng chờ xem các lựa chọn thuê trọ khác mà bạn cung
                                            cấp!</p>
                                    </div>
                                </div>
                                <div class="media border-bottom mb-6 pb-6">
                                    <div
                                        class="w-70px h-70 mr-2 bg-gray-01 rounded-circle fs-18 text-muted d-flex align-items-center justify-content-center">
                                        NN
                                    </div>
                                    <div class="media-body">
                                        <div class="row mb-1 align-items-center">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <p class="mb-0 text-heading fs-16 font-weight-500">Napoléon Nguyễn</p>
                                                <p class="mb-0 lh-1">TP.Cần Thơ</p>
                                            </div>
                                            <div class="col-sm-6 text-sm-right">
                                                <ul class="list-inline d-flex justify-content-sm-end mb-0">
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                </ul>
                                                <p class="mb-0 text-muted">02 Tháng 12, 2016 lúc 2:40 chiều</p>
                                            </div>
                                        </div>
                                        <p class="mb-0">Dịch vụ hỗ trợ rất tốt và nhanh chóng trong suốt tuần qua. Cảm
                                            ơn vì luôn cập nhật thông tin và quản lý nhà trọ của bạn. Mức độ hỗ trợ và sự
                                            tận tâm của bạn là không có đối thủ. Đã giải quyết tất cả các vấn đề của tôi
                                            trong thời gian gấp! Rất hào hứng chờ xem các lựa chọn thuê trọ khác mà bạn cung
                                            cấp!</p>
                                    </div>
                                </div>
                                <div class="media border-bottom mb-6 pb-6">
                                    <img src="{{ asset('assets/images/review-02.jpg') }}" alt="Nguyễn Văn A"
                                        class="mr-2">
                                    <div class="media-body">
                                        <div class="row mb-1 align-items-center">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <p class="mb-0 text-heading fs-16 font-weight-500">Nguyễn Văn A</p>
                                                <p class="mb-0 lh-1">Hà Nội</p>
                                            </div>
                                            <div class="col-sm-6 text-sm-right">
                                                <ul class="list-inline d-flex justify-content-sm-end mb-0">
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                    <li class="list-inline-item mr-1">
                                                        <span class="text-warning fs-12 lh-2"><i
                                                                class="fas fa-star"></i></span>
                                                    </li>
                                                </ul>
                                                <p class="mb-0 text-muted">02 Tháng 12, 2016 lúc 2:40 chiều</p>
                                            </div>
                                        </div>
                                        <p class="mb-0">Dịch vụ hỗ trợ rất tốt và nhanh chóng trong suốt tuần qua. Cảm
                                            ơn vì luôn cập nhật thông tin và quản lý nhà trọ của bạn. Mức độ hỗ trợ và sự
                                            tận tâm của bạn là không có đối thủ. Đã giải quyết tất cả các vấn đề của tôi
                                            trong thời gian gấp! Rất hào hứng chờ xem các lựa chọn thuê trọ khác mà bạn cung
                                            cấp!</p>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-lg text-heading bg-hover-light border fs-14 px-5">Xem
                                    thêm <span class="text-primary fs-15 text-primary d-inline-block ml-2">
                                        <i class="fal fa-long-arrow-down"></i>
                                    </span> </a>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-6">
                                <h3 class="fs-16 lh-2 text-heading mb-4">Bình luận</h3>
                                <form>
                                    <div class="form-group mb-4 d-flex justify-content-start">
                                        <div class="rate-input">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text" class="mb-0 mr-1 lh-1">
                                                <i class="fas fa-star"></i>
                                            </label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text" class="mb-0 mr-1 lh-1">
                                                <i class="fas fa-star"></i>
                                            </label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text" class="mb-0 mr-1 lh-1">
                                                <i class="fas fa-star"></i>
                                            </label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text" class="mb-0 mr-1 lh-1">
                                                <i class="fas fa-star"></i>
                                            </label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text" class="mb-0 mr-1 lh-1">
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-4">
                                                <input placeholder="Nhập tên..."
                                                    class="form-control form-control-lg border-0" type="text"
                                                    name="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-4">
                                                <input type="email" placeholder="Địa chỉ mail..." name="email"
                                                    class="form-control form-control-lg border-0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-6">
                                        <textarea class="form-control border-0" placeholder="Your Review" name="message" rows="5"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-primary px-9">Bình luận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 primary-sidebar sidebar-sticky" id="sidebar">
                        <div class="primary-sidebar-inner">
                            <div class="card mb-4">
                                <div class="card-body px-6 py-6">
                                    <div class="media mb-4">
                                        <img src="{{ asset('assets/images/agent-42.jpg') }}"
                                            class="rounded-circle mr-2" alt="Blanche Gordon">
                                        <div class="media-body">
                                            <p class="fs-16 lh-1 text-dark mb-0 font-weight-500">
                                                Nguyễn Văn A
                                            </p>
                                            <p class="mb-0">Chủ nhà trọ, người quản lý</p>
                                            <p class="text-heading font-weight-500 mb-0">
                                                <span class="text-primary d-inline-block mr-1"><i
                                                        class="fal fa-phone"></i></span>
                                                123 900 68668
                                            </p>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group mb-2">
                                            <label for="name" class="sr-only">Họ và Tên</label>
                                            <input type="text"
                                                class="form-control form-control-lg border-0 shadow-none" id="name"
                                                placeholder="Nhập Họ và Tên...">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="text"
                                                class="form-control form-control-lg border-0 shadow-none" id="email"
                                                placeholder="Địa chỉ mail...">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="phone" class="sr-only">Số điện thoại</label>
                                            <input type="text"
                                                class="form-control form-control-lg border-0 shadow-none" id="phone"
                                                placeholder="Số điện thoại...">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="message" class="sr-only">Nội dung</label>
                                            <textarea class="form-control border-0 shadow-none" rows="5" id="message"
                                                placeholder="Nội dung tin nhắn..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block shadow-none">Gửi
                                            tin nhắn
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body px-6 pt-5 pb-6">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Tìm kiếm</h4>
                                    <form>
                                        <div class="form-group mb-2">
                                            <select class="form-control border-0 shadow-none selectpicker"
                                                name="property-type" title="Loại phòng" data-style="btn-lg px-3">
                                                <option>Phòng trọ</option>
                                                <option>Căn hộ</option>
                                                <option>Nhà nguyên căn</option>
                                            </select>
                                        </div>
                                        <div class="form-row mb-2">
                                            <div class="col-6 form-group">
                                                <select class="form-control selectpicker border-0" name="city"
                                                    title="Thành phố" data-style="btn-lg rounded-lg px-3">
                                                    <option>Hà Nội</option>
                                                    <option>Hồ Chí Minh</option>
                                                    <option>Đà Nẵng</option>
                                                    <option>Hải Phòng</option>
                                                    <option>Cần Thơ</option>
                                                </select>
                                            </div>
                                            <div class="col-6 form-group">
                                                <select class="form-control selectpicker border-0" name="district"
                                                    title="Quận/Huyện" data-style="btn-lg rounded-lg px-3">
                                                    <option>Hoàn Kiếm</option>
                                                    <option>Ba Đình</option>
                                                    <option>Đống Đa</option>
                                                    <option>Hà Đông</option>
                                                    <option>Tân Bình</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <input type="text" class="form-control form-control-lg border-0"
                                                name="search" placeholder="Tìm kiếm theo tên phòng trọ...">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Tìm kiếm
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center pt-7 pb-6 px-0">
                                    <img src="{{ asset('assets/images/contact-widget.jpg') }}"
                                        alt="Bạn muốn trở thành người đăng tin trọ?">
                                    <div class="text-dark mb-6 mt-n2 font-weight-500">Bạn muốn trở thành
                                        <p class="mb-0 fs-18">Người Đăng Tin Trọ?</p>
                                    </div>
                                    <a href="#" class="btn btn-primary">Đăng ký</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="bottom-bar-action py-2 px-4 bg-gray-01 position-fixed fixed-bottom d-block d-sm-none">
            <div class="container">
                <div class="row no-gutters mx-n2 mxw-571 mx-auto">
                    <div class="col-6 px-2">
                        <a href="#modal-messenger" data-toggle="modal"
                            class="btn btn-primary btn-lg btn-block fs-14 px-1 py-3 h-auto lh-13">Gửi tin nhắn</a>
                    </div>
                    <div class="col-6 px-2">
                        <a href="tel:(+84)2388-969-888"
                            class="btn btn-primary btn-lg btn-block fs-14 px-1 py-3 h-auto lh-13">Gọi điện</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-messenger" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h4 class="modal-title text-heading" id="exampleModalLabel">Mẫu Đơn Liên Hệ</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-6">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control form-control-lg border-0"
                                placeholder="Họ và Tên">
                        </div>
                        <div class="form-group mb-2">
                            <input type="email" class="form-control form-control-lg border-0"
                                placeholder="Email của bạn">
                        </div>
                        <div class="form-group mb-2">
                            <input type="tel" class="form-control form-control-lg border-0"
                                placeholder="Số điện thoại của bạn">
                        </div>
                        <div class="form-group mb-2">
                            <textarea class="form-control border-0" rows="4">Chào, tôi quan tâm đến căn hộ có tên Trọ Siêu Cấp</textarea>
                        </div>
                        <div class="form-group form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                            <label class="form-check-label fs-13" for="exampleCheck3">Tôi đồng ý với các điều khoản và
                                chính sách.</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Yêu Cầu Thông
                            Tin</button>
                    </div>
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
    <title>Chi Tiết Người Đăng Tin | TRỌ NHANH</title>
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
