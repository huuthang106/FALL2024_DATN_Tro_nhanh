@extends('layouts.main')
@section('titleUs', 'Chi Tiết Blog | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="pt-2 pb-13 page-title bg-img-cover-center bg-white-overlay"
            style="background-image: url('{{ asset('assets/images/bg-title.jpg') }}');">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('client.client-blog-detail', $blog->slug) }}">Blog</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết Blog</li>
                    </ol>
                </nav>
                <h1 class="fs-30 lh-15 mb-0 text-heading font-weight-500 text-center pt-10" data-animate="fadeInDown">
                    Bài Viết Thứ Vị Được Cập Nhật Hàng Ngày</h1>
            </div>
        </section>
        <section class="pt-13 pb-12">
            <div class="container">
                <div class="row ml-xl-0 mr-xl-n6">
                    <div class="col-lg-8 mb-6 mb-lg-0 pr-xl-6 pl-xl-0">
                        <div class="position-relative">
                            @php
                                $image = $blog->image->first();
                            @endphp

                            @if ($image)
                                <img class="rounded-lg d-block" src="{{ asset('assets/images/' . $image->filename) }}"
                                    alt="Retail banks wake up to digital lending this year">
                            @else
                                <!-- Có thể hiển thị một ảnh mặc định nếu không có ảnh nào được liên kết -->
                                <img class="rounded-lg d-block" src="{{ asset('assets/images/default.jpg') }}"
                                    alt="Default Image">
                            @endif


                            <a href="#"
                                class="badge text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white m-2 position-absolute letter-spacing-1 pos-fixed-bottom">
                                Cho Thuê
                            </a>
                        </div>
                        <ul class="list-inline mt-4">
                            <li class="list-inline-item mr-4">
                                @if ($blog->user->image)
                                    <img class="mr-1" src="{{ asset('assets/images/', $blog->user->image) }}"
                                        alt="  {{ $blog->user->name }}">
                                    {{ $blog->user->name }}
                                @else
                                    <img class="mr-1" src="{{ asset('assets/images/author-01.jpg') }}"
                                        alt="  {{ $blog->user->name }}">
                                    {{ $blog->user->name }}
                                @endif
                            </li>
                            <li class="list-inline-item mr-4"><i class="far fa-calendar mr-1"></i>30, Tháng 12, 2024</li>
                            <li class="list-inline-item mr-4"><i class="far fa-eye mr-1"></i> 149 Lượt xem</li>
                        </ul>
                        <h3 class="fs-md-32 text-heading lh-141 mb-2">
                            {{ $blog->title }}
                        </h3>
                        <div class="lh-214 mb-9">
                            <p>{{ $blog->description }}</p>
                            {{-- <p
                                class="ml-8 pl-4 fs-16 text-heading font-weight-500 lh-2 border-left border-4x border-primary mxw-521 my-6">
                                GrandHome là công ty bất động sản giúp mọi người sống một cách chu đáo và đẹp đẽ hơn. Chúng
                                tôi tin vào thiết kế như một động lực mạnh mẽ cho những điều tốt đẹp.</p>
                            <p>
                                Nhà rộng rãi, thoáng mát, thiết kế hiện đại. Gần trường học, chợ, và
                                các tiện ích công cộng. Khu dân cư yên tĩnh, an ninh tốt, phù hợp cho gia đình sinh
                                sống...
                            </p>
                            <p>
                                Nhà rộng rãi, thoáng mát, thiết kế hiện đại. Gần trường học, chợ, và
                                các tiện ích công cộng. Khu dân cư yên tĩnh, an ninh tốt, phù hợp cho gia đình sinh
                                sống...
                            </p>
                            <p>
                                Nhà rộng rãi, thoáng mát, thiết kế hiện đại. Gần trường học, chợ, và
                                các tiện ích công cộng. Khu dân cư yên tĩnh, an ninh tốt, phù hợp cho gia đình sinh
                                sống...
                            </p> --}}
                        </div>
                        <div class="row pb-7 mb-6 border-bottom">
                            <div class="col-sm-6 d-flex">
                                <span class="d-inline-block mr-2"><i class="fal fa-tags"></i></span>
                                <ul class="list-inline">
                                    <li class="list-inline-item mr-0"><a href="#" class="text-muted hover-dark">cho
                                            thuê,</a>
                                    </li>
                                    <li class="list-inline-item mr-0"><a href="#"
                                            class="text-muted hover-dark">trọ,</a>
                                    </li>
                                    <li class="list-inline-item mr-0"><a href="#" class="text-muted hover-dark">phòng
                                            trọ</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 text-left text-sm-right">
                                <span class="d-inline-block text-heading font-weight-500 lh-17 mr-1">Chia sẻ bài viết</span>
                                <button type="button"
                                    class="btn btn-primary rounded-circle w-52px h-52 fs-20 d-inline-flex align-items-center justify-content-center"
                                    data-container="body" data-toggle="popover" data-placement="top" data-html="true"
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
                                    <i class="fad fa-share-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="media flex-wrap flex-sm-nowrap mb-8">
                            <div class="mb-3 mb-sm-0 mr-sm-2 text-center w-100 w-sm-auto">
                                <img src="{{ asset('assets/images/author-2.jpg') }}" alt="Mao Trạch Đông">
                                <ul class="list-inline mb-0 mt-3">
                                    <li class="list-inline-item mr-0">
                                        <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0">
                                        <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0">
                                        <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-0">
                                        <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
                                                class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="media-body text-center text-sm-left">
                                <h5 class="text-dark fs-16 mb-2">Mao Trạch Đông</h5>
                                <p class="mb-0">Tuyệt vời</p>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col-sm-6 mb-6">
                                <div class="card">
                                    <img src="{{ asset('assets/images/blog-nav-01.jpg') }}"
                                        alt="Cách tạo một quảng cáo chiêu hàng thang máy hiệu quả" class="card-img">
                                    <a href="#"
                                        class="card-img-overlay d-flex align-items-center justify-content-center text-white fs-16 font-weight-500 px-4 pl-sm-5 pr-sm-8 py-6">
                                        <span class="d-inline-block mr-4 fs-24"><i class="fal fa-angle-left"></i></span>
                                        Cách tạo một quảng cáo chiêu hàng thang máy hiệu quả
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-6">
                                <div class="card">
                                    <img src="{{ asset('assets/images/blog-nav-02.jpg') }}"
                                        alt="Cách tạo một quảng cáo chiêu hàng thang máy hiệu quả" class="card-img">
                                    <a href="#"
                                        class="card-img-overlay d-flex align-items-center justify-content-center text-white fs-16 font-weight-500 px-4 pr-sm-5 pl-sm-10 py-6 text-right">
                                        Xu hướng công nghệ chiến lược hàng đầu năm 2024
                                        <span class="d-inline-block ml-4 fs-24"><i class="fal fa-angle-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h3 class="fs-22 text-heading lh-15 mb-6">Bình luận ({{ $blog->comments->count() }})</h3>

                        @if ($blog->comments->count() > 0)
                            @foreach ($blog->comments as $item)
                                <div class="media mb-6 pb-5 border-bottom">
                                    <div class="w-70px mr-2">
                                        @php
                                            $userImage = $item->user->image ?? 'default-avatar.jpg'; // Sử dụng hình ảnh người dùng nếu có, hoặc hình ảnh mặc định
                                        @endphp
                                        <img src="{{ asset('assets/images/' . $userImage) }}"
                                            alt="{{ $item->user->name ?? 'Người dùng' }}"
                                            class="mr-sm-8 mb-4 mb-sm-0 custom-avatar">
                                    </div>
                                    <div class="media-body">
                                        <p class="text-heading fs-16 font-weight-500 mb-0">
                                            {{ $item->user->name ?? 'Người dùng' }}
                                        </p>
                                        <p class="mb-4">{{ $item->content }}</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item text-muted">
                                                {{ $item->created_at->format('d M Y \ lúc H:i') }}<span
                                                    class="d-inline-block ml-2">|</span></li>
                                            <li class="list-inline-item"><a href="#"
                                                    class="text-heading hover-primary">Trả lời</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Chưa có bình luận nào.</p>
                        @endif



                        <h3 class="fs-22 text-heading lh-15 mb-6">Để lại bình luận của bạn ở đây</h3>
                        <form id="commentForm" action="{{ route('client.binh-luan-blog') }}" method="POST">
                            @csrf

                            <div class="form-group mb-6">
                                <textarea class="form-control border-0" placeholder="Nội dung..." name="content" rows="5"></textarea>
                            </div>
                            <input type="hidden" name="blog_slug" value="{{ $blog->slug }}">

                            <button type="submit" class="btn btn-lg btn-primary px-9">Bình luận</button>
                        </form>
                    </div>
                    <div class="col-lg-4 pl-xl-6 pr-xl-0 primary-sidebar sidebar-sticky" id="sidebar">
                        <div class="primary-sidebar-inner">
                            <div class="card mb-4">
                                <div class="card-body px-6 pt-5 pb-6">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Loại</h4>
                                    <form>
                                        <div class="position-relative">
                                            <input type="text" id="search02"
                                                class="form-control form-control-lg border-0 shadow-none"
                                                placeholder="Tìm kiếm" name="search">
                                            <div class="position-absolute pos-fixed-center-right">
                                                <button type="submit" class="btn fs-15 text-dark shadow-none"><i
                                                        class="fal fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body px-6 pt-5 pb-6">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Loại</h4>
                                    <ul class="list-group list-group-no-border">
                                        <li class="list-group-item p-0">
                                            <a href="listing-with-left-sidebar.html"
                                                class="d-flex text-body hover-primary">
                                                <span class="lh-29">Sáng tạo</span>
                                                <span class="d-block ml-auto">13</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item p-0">
                                            <a href="listing-with-left-sidebar.html"
                                                class="d-flex text-body hover-primary">
                                                <span class="lh-29">Cho thuê</span>
                                                <span class="d-block ml-auto">21</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item p-0">
                                            <a href="listing-with-left-sidebar.html"
                                                class="d-flex text-body hover-primary">
                                                <span class="lh-29">Hình ảnh</span>
                                                <span class="d-block ml-auto">17</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item p-0">
                                            <a href="listing-with-left-sidebar.html"
                                                class="d-flex text-body hover-primary">
                                                <span class="lh-29">Tin mới</span>
                                                <span class="d-block ml-auto">4</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item p-0">
                                            <a href="listing-with-left-sidebar.html"
                                                class="d-flex text-body hover-primary">
                                                <span class="lh-29">Phòng trọ</span>
                                                <span class="d-block ml-auto">27</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body px-6 pt-5 pb-6">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Bài viết mới nhất</h4>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0 pt-0 pb-3">
                                            <div class="media">
                                                <div class="position-relative mr-3">
                                                    <a href="blog-details-1.html"
                                                        class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                                        style="background-image: url('{{ asset('assets/images/post-02.jpg') }}')">
                                                    </a>
                                                    <a href="blog-grid-with-sidebar.html"
                                                        class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                                                        Sáng tạo
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="fs-14 lh-186 mb-1">
                                                        <a href="blog-details-1.html" class="text-dark hover-primary">
                                                            Nhà Siêu Cấp Vip
                                                            Pro
                                                        </a>
                                                    </h4>
                                                    <div class="text-gray-light">
                                                        16, Tháng 12,
                                                        2024
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item px-0 pt-2 pb-3">
                                            <div class="media">
                                                <div class="position-relative mr-3">
                                                    <a href="blog-details-1.html"
                                                        class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                                        style="background-image: url('{{ asset('assets/images/post-04.jpg') }}')">
                                                    </a>
                                                    <a href="blog-grid-with-sidebar.html"
                                                        class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                                                        Cho Thuê
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="fs-14 lh-186 mb-1">
                                                        <a href="blog-details-1.html" class="text-dark hover-primary">
                                                            Nhà Siêu Cấp Vip
                                                            Pro
                                                        </a>
                                                    </h4>
                                                    <div class="text-gray-light">
                                                        16, Tháng 12,
                                                        2024
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item px-0 pt-2 pb-0">
                                            <div class="media">
                                                <div class="position-relative mr-3">
                                                    <a href="blog-details-1.html"
                                                        class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                                        style="background-image: url('{{ asset('assets/images/post-07.jpg') }}')">
                                                    </a>
                                                    <a href="blog-grid-with-sidebar.html"
                                                        class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                                                        Cho Thuê
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="fs-14 lh-186 mb-1">
                                                        <a href="blog-details-1.html" class="text-dark hover-primary">
                                                            Nhà Siêu Cấp Vip
                                                            Pro
                                                        </a>
                                                    </h4>
                                                    <div class="text-gray-light">
                                                        16, Tháng 12,
                                                        2024
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body px-6 pt-5 pb-6">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Tải xuống tài liệu</h4>
                                    <img src="{{ asset('assets/images/download-brochure.png') }}"
                                        alt="Tải xuống tài liệu">
                                    <div class="text-center mt-10 mb-2">
                                        <a href="#"
                                            class="btn btn-lg bg-gray-01 bg-hover-accent btn-block text-heading">Tải
                                            ngay<span class="text-primary d-inline-block ml-2"><i
                                                    class="far fa-arrow-circle-down"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body px-6 py-5">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Tags phổ biến</h4>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">nhà
                                                thiết kế</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">mô
                                                hình mẫu</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">mẫu
                                                giao diện</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">Bảo
                                                mật CNTT</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">Dịch
                                                vụ CNTT</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">kinh
                                                doanh</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">video</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">giao
                                                diện wordpress</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">bản
                                                phác thảo</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- Modal Login - Register --}}

    {{-- SVG của template --}}

@endsection
@push('styleUs')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Chi Tiết Blog | TRỌ NHANH</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/mh.css') }}">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/comment-blog.js') }}"></script>
    <script>
        var userIsLoggedIn = @json(auth()->check());
    </script>
@endpush
