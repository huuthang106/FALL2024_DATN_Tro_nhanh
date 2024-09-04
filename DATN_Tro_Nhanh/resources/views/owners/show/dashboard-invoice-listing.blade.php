@extends('layouts.owner')
@section('titleOwners', 'Hóa đơn | TRỌ NHANH')
@section('contentOwners')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <div class="mb-6">
                <div class="row">
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center">
                            <label for="invoice-list_length" class="d-block mr-2 mb-0">Kết quả:</label>
                            <select name="invoice-list_length" id="invoice-list_length" aria-controls="invoice-list"
                                class="form-control form-control-lg mr-2 selectpicker"
                                data-style="bg-white btn-lg h-52 py-2 border">
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="align-self-center">
                            <button class="btn btn-primary btn-lg" tabindex="0" aria-controls="invoice-list"><span>Thêm
                                    mới</span></button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                        <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                            <input type="text" class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..."
                                aria-label="" aria-describedby="basic-addon1">
                            <div class="input-group-append position-absolute pos-fixed-right-center">
                                <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                        class="fal fa-search"></i></button>
                            </div>
                        </div>
                        <div class="align-self-center">
                            <button class="btn btn-danger btn-lg" tabindex="0"
                                aria-controls="invoice-list"><span>Xóa</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
                    <thead>
                        <tr role="row">
                            <th class="no-sort py-6 pl-6"><label class="new-control new-checkbox checkbox-primary m-auto">
                                    <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                                </label></th>
                            <th class="py-6">Tiêu đề</th>
                            <th class="py-6">Giá</th>
                            <th class="py-6">Ngày tạo đơn</th>
                            <th class="py-6">Ngày thanh toán</th>
                            <th class="py-6">Trạng thái</th>
                            <th class="no-sort py-6">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $bill)
                            <tr role="row">
                                <td class="checkbox-column py-6 pl-6"><label
                                        class="new-control new-checkbox checkbox-primary m-auto">
                                        <input type="checkbox" class="new-control-input child-chk select-customers-info"
                                            value="{{ $bill->id }}">
                                    </label></td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('owners.invoice-preview', $bill->id) }}">
                                            <p class="align-self-center mb-0 user-name">{{ $bill->description }}</p>
                                        </a>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="inv-amount">{{ $bill->amount }} VNĐ</span></td>
                                <td class="align-middle"><span class="text-success pr-1"><i
                                            class="fal fa-calendar"></i></span>{{ $bill->created_at->format('d/m/Y') }}</td>
                                <td class="align-middle">
                                    @if ($bill->status == 1)
                                        <span class="text-primary pr-1"><i class="fal fa-calendar"></i></span>Chưa có dữ
                                        liệu
                                    @elseif($bill->status == 2)
                                        <span class="text-primary pr-1"><i
                                                class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($bill->payment_date)->format('d/m/Y') }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($bill->status == 1)
                                        <span class="badge badge-warning text-capitalize">Chưa thanh toán</span>
                                    @elseif($bill->status == 2)
                                        <span class="badge badge-green text-capitalize">Đã thanh toán</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="#" data-toggle="tooltip" title="Chỉnh sửa"
                                        class="d-inline-block fs-18 text-muted hover-primary mr-5"><i
                                            class="fal fa-pencil-alt"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Xóa"
                                        class="d-inline-block fs-18 text-muted hover-primary"><i
                                            class="fal fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                <nav class="mt-4">
                    <ul class="pagination rounded-active justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($bills->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link"><i class="far fa-angle-double-left"></i></span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $bills->previousPageUrl() }}"><i
                                        class="far fa-angle-double-left"></i></a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($bills->getUrlRange(1, $bills->lastPage()) as $page => $url)
                            @if ($page == $bills->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($bills->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $bills->nextPageUrl() }}"><i
                                        class="far fa-angle-double-right"></i></a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link"><i class="far fa-angle-double-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </nav>
                <div class="text-center mt-2">{{ $bills->firstItem() }}-{{ $bills->lastItem() }} của
                    {{ $bills->total() }} kết quả</div>
            </div>
        </div>
    </main>
@endsection

@push('styleOwners')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    {{-- <title>Invoice Listing - HomeID</title> --}}
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
    <meta name="twitter:image" content="images/homeid-social-logo.png">
    <!-- Facebook -->
    <meta property="og:url" content="dashboard-invoice-listing.html">
    <meta property="og:title" content="Invoice Listing">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/homeid-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endpush
@push('scriptOwners')
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

@endpush
