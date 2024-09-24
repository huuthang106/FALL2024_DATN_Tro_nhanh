@extends('layouts.main')
@section('titleUs', $user->name . ' | TRỌ NHANH')
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
                            class="card-img" alt="{{ $user->name }}">
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
                                <div class="col-sm-6 mb-4">
                                    @if ($isFollowing)
                                        <form action="{{ route('client.follow', $user->id) }}" method="POST"
                                            id="unfollowForm">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-primary me-2" id="unfollowButton">
                                                <span class="indicator-label">Đã theo dõi</span>
                                                <span class="indicator-progress d-none">Vui lòng chờ...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('client.follow', $user->id) }}" method="POST"
                                            id="followForm">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-light me-2" id="followButton">
                                                <span class="indicator-label">Theo dõi</span>
                                                <span class="indicator-progress d-none">Vui lòng chờ...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </form>
                                    @endif
                                </div>


                            </div>
                            <hr class="mb-4">
                            <div class="row align-items-center">
                                <div class="col-sm-6 mb-6 mb-sm-0">
                                    @php
                                    $averageRating = $user->receivedComments()->avg('rating') ?? 0;
                                    $reviewsCount = $user->receivedComments()->count();
                                @endphp
                                
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item fs-13 text-heading font-weight-500">
                                        {{ $averageRating > 0 ? number_format($averageRating, 1) : 'Chưa có đánh giá' }}
                                    </li>
                                    <li class="list-inline-item fs-13 text-heading font-weight-500 mr-1">
                                        <ul class="list-inline mb-0">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <li class="list-inline-item mr-0">
                                                    <span class="fs-12 lh-2">
                                                        @if ($i <= floor($averageRating))
                                                            <i class="fas fa-star text-warning"></i>
                                                        @elseif ($i - 0.5 <= $averageRating)
                                                            <i class="fas fa-star-half-alt text-warning"></i>
                                                        @else
                                                            <i class="far fa-star text-warning"></i>
                                                        @endif
                                                    </span>
                                                </li>
                                            @endfor
                                        </ul>
                                    </li>
                                    <li class="list-inline-item fs-13 text-gray-light">({{ $reviewsCount }} đánh giá)</li>
                                </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-inline text-gray-lighter m-0 p-0">
                                        <li class="list-inline-item mx-0 my-1">
                                            <a href="#"
                                                class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-0 ml-2 my-1">
                                            <a href="#"
                                                class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-0 ml-2 my-1">
                                            <a href="#"
                                                class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-0 ml-2 my-1">
                                            <a href="#"
                                                class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
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
                                    <a href="#sale" class="nav-link active shadow-none fs-13 " data-toggle="tab"
                                        role="tab">
                                        Phòng ({{ $totalRooms }})
                                    </a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a href="#rent" class="nav-link shadow-none fs-13" data-toggle="tab" role="tab">
                                        Khu trọ ({{ $totalZones }})
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content shadow-none pt-7 pb-0 px-6 bg-white">
                                <div id="collapse-tabs-accordion-01">
                                    <div class="tab-pane tab-pane-parent fade show active" id="sale"
                                        role="tabpanel">
                                        <div class="card border-0 bg-transparent">
                                            <div class="card-header border-0 d-block d-md-none bg-transparent p-0"
                                                id="headingSale-01">
                                                <h5 class="mb-0">
                                                    <button
                                                        class="btn lh-2 fs-18 bg-white py-1 px-6 shadow-none w-100 collapse-parent border collapsed mb-4"
                                                        data-toggle="collapse" data-target="#sale-collapse-01"
                                                        aria-expanded="true" aria-controls="sale-collapse-01">
                                                        Phòng ({{ $totalRooms }})
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="sale-collapse-01" class="collapse show collapsible"
                                                aria-labelledby="headingSale-01"
                                                data-parent="#collapse-tabs-accordion-01">
                                                <div class="card-body p-0">
                                                    @livewire('rooms-tab', ['userId' => $user->id])
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
                                                        Khu trọ ({{ $totalZones }})
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="rent-collapse-01" class="collapse collapsible"
                                                aria-labelledby="headingRent-01"
                                                data-parent="#collapse-tabs-accordion-01">
                                                <div class="card-body p-0">
                                                    @livewire('zones-tab', ['userId' => $user->id])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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
                                                <ul class="list-inline d-flex flex-wrap justify-content-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li class="list-inline-item star-item">
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

                                    @livewire('comments', ['commentedUserId' => $user->id])
                                </div>
                        </section>


                        <section class="mt-2 pb-7 px-6 pt-6 bg-white rounded-lg">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <h3 class="fs-16 lh-2 text-heading mb-4">Viết Đánh Giá</h3>
                                    @if (Auth::check() && Auth::id() != $user->id)
                                        <form id="commentForm" action="{{ route('client.danh-gia-nguoi-dung') }}"
                                            method="POST">
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
                                            <input type="hidden" name="user_slug" value="{{ $user->slug }}">

                                            <button type="submit" class="btn btn-lg btn-primary px-10">Gửi</button>
                                        </form>
                                    @elseif(!Auth::check())
                                        <p>Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để viết đánh giá.</p>
                                    @else
                                        <p>Bạn không thể đánh giá chính mình.</p>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>


                    <div class="col-lg-4 primary-sidebar sidebar-sticky" id="sidebar">
                        <div class="primary-sidebar-inner">
                            <div class="card mb-4">
                                <div class="card-body px-6 py-6">
                                    <div class="media mb-4">
                                        <div class="mr-4 ntt w-60px">
                                            <img src="{{ $user->image ? asset('assets/images/' . $user->image) : asset('assets/images/agent-25.jpg') }}"
                                                class="rounded-circle w-60px h-60" alt="Blanche Gordon">
                                        </div>

                                        <div class="media-body">
                                            <p class="fs-16 lh-1 text-dark mb-0 font-weight-500">
                                                <small> {{ $user->name }}</small>
                                            </p>
                                            <p class="mb-0">
                                                @if ($user->roll == 0)
                                                    Người quản lý
                                                @elseif($user->roll == 2)
                                                    Người đưa Tin
                                                @else
                                                    Người dùng
                                                @endif
                                            </p>
                                            <p class="text-heading font-weight-500 mb-0">
                                                <span class="text-primary d-inline-block mr-1"><i
                                                        class="fal fa-phone"></i></span>
                                                {{ $user->phone }}
                                            </p>
                                        </div>
                                    </div>
                                    <form action="{{ route('owners.add-chat', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-lg btn-block shadow-none">Gửi
                                            tin nhắn
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

@endsection
@push('styleUs')
    {{-- <meta charset="utf-8">
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
    <link rel="stylesheet" href="{{ asset('assets/css/mh.css') }}">
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
    <link rel="stylesheet" href="{{ asset('assets/css/css-nht.css') }}"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Tìm hiểu chi tiết về người đăng tin trên TRỌ NHANH. Khám phá thông tin và các tin tức mới nhất từ các người đăng tin uy tín. Xem ngay để kết nối với người đăng tin và tìm kiếm cơ hội tốt nhất.">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- CSS của người cung cấp -->
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
    <meta name="twitter:site" content="@TronNhanh">
    <meta name="twitter:creator" content="@TronNhanh">
    <meta name="twitter:title" content="Chi Tiết Người Đăng Tin | TRỌ NHANH">
    <meta name="twitter:description"
        content="Khám phá thông tin chi tiết về người đăng tin trên TRỌ NHANH. Tìm hiểu về các người đăng tin uy tín và các tin tức mới nhất. Kết nối với người đăng tin để không bỏ lỡ cơ hội tốt nhất.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Chi Tiết Người Đăng Tin | TRỌ NHANH">
    <meta property="og:description"
        content="Tìm hiểu chi tiết về người đăng tin trên TRỌ NHANH. Xem thông tin và các tin tức mới nhất từ các người đăng tin uy tín. Kết nối với người đăng tin và tìm kiếm cơ hội tốt nhất.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <link rel="stylesheet" href="{{ asset('assets/css/css-nht.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-ntt.css') }}">
    <style></style>
@endpush
@push('scriptUs')
    {{-- <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('scrollToTop', () => {
                // Xử lý cuộn đến vị trí mong muốn hoặc giữ nguyên vị trí hiện tại
                // window.scrollTo({ top: 0, behavior: 'smooth' }); // Cuộn lên đầu
            });
        });
    </script> --}}

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
    <script src="{{ asset('assets/js/client/ajax-follow.js') }}"></script>
    <script src="{{ asset('assets/js/yeuthich.js') }}"></script>
    <script src="{{ asset('assets/css/css-nht.css') }}"></script>
    @livewireScripts
@endpush
