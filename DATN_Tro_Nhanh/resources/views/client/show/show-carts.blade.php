@extends('layouts.main')
@section('titleUs', 'Trang chủ trọ nhanh')
@section('contentUs')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <div class="mb-6">
                <div class="row" style="height: 50px">
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center">
                            <label for="notification-list_length" class="d-block mr-2 mb-0">Kết quả:</label>
                            <select name="notification-list_length" id="notification-list_length"
                                aria-controls="invoice-list" class="form-control form-control-lg mr-2 selectpicker"
                                data-style="bg-white btn-lg h-52 py-2 border">
                                <option value="10" {{ request('notification-list_length') == '10' ? 'selected' : '' }}>
                                    10
                                </option>
                                <option value="20" {{ request('notification-list_length') == '20' ? 'selected' : '' }}>
                                    20
                                </option>
                                <option value="50" {{ request('notification-list_length') == '50' ? 'selected' : '' }}>
                                    50
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                        <form method="GET" action="" id="search-form" class="w-100 h-100" style="height: 1000px">
                            <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                                <input type="text" name="query" value="" id="search-input"
                                    class="form-control bg-transparent border-1x" placeholder="Tìm..." aria-label=""
                                    aria-describedby="basic-addon1">
                                <div class="input-group-append position-absolute pos-fixed-right-center">
                                    <button id="search-button" class="btn bg-transparent border-0 text-gray lh-1"
                                        type="submit">
                                        <i class="fal fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="notification-list" class="table table-hover bg-white border rounded-lg">
                    <thead>
                        <tr role="row">
                            <th class="no-sort py-6 pl-6">
                                <label class="new-control new-checkbox checkbox-primary m-auto">
                                    <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                                </label>
                            </th>
                            <th class="py-6">Tên gói</th>
                            <th class="py-6">Mô tả</th>
                            <th class="py-6">Vị trí</th>
                            <th class="py-6">Ngày hết hạn</th>
                            <th class="no-sort py-6">Giá</th>
                            <th class="no-sort py-6">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @auth
                            @forelse ($cartDetails as $detail)
                                <tr>
                                    <td class="checkbox-column py-6 pl-6">
                                        <label class="new-control new-checkbox checkbox-primary m-auto">
                                            <input type="checkbox" class="new-control-input child-chk select-customers-info">
                                        </label>
                                    </td>
                                    <td>{{ $detail->name_price_list }}</td>
                                    <td>{{ $detail->description }}</td>
                                    <td>{{ $detail->name_location }}</td>
                                    <td>
                                        @if ($detail->end_date)
                                            {{ \Carbon\Carbon::parse($detail->end_date)->format('d/m/Y') }}
                                        @else
                                            Không có ngày
                                        @endif
                                    </td>
                                    <td>{{ number_format($detail->price, 0, ',', '.') }} VND</td>
                                    <td>
                                        <form action="{{ route('client.carts-remove', $detail->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Giỏ hàng trống.</td>
                                </tr>
                            @endforelse
                        @else
                            <tr>
                                <td colspan="7" class="text-center">
                                    <a class="nav-link pl-3 pr-3" data-toggle="modal" href="#login-register-modal">
                                        <button class="btn btn-primary ">Đăng nhập để mua gói</button>
                                    </a>
                                </td>
                            </tr>
                        @endauth

                    </tbody>
                </table>
            </div>
            <!-- Thêm nút tiếp hành thanh toán -->
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('client.payment') }}" class="btn btn-primary btn-lg">
                    Tiếp hành thanh toán
                </a>
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
    <title>Thông Báo | TRỌ NHANH</title>
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
    <meta name="twitter:title" content="Invoice Listing">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="{{ asset('assets/images/homeid-social-logo.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="dashboard-invoice-listing.html">
    <meta property="og:title" content="Invoice Listing">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/homeid-social.png') }}">
    <meta property="og:image:type" content="{{ asset('assets/image/png') }}">
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
    {{-- Notification - Pagination --}}
    {{-- <script src="{{ asset('assets/js/notification-list/notification-pagination.js') }}"></script> --}}
@endpush
