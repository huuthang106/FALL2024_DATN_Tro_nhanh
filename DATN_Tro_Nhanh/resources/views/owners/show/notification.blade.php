@extends('layouts.owner')
@section('titleOwner', 'Trang chủ trọ nhanh')
@section('contentOwners')
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
                        <form method="GET" action="{{ route('owners.notification-owners') }}" id="search-form"
                            class="w-100 h-100" style="height: 1000px">
                            <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                                <input type="text" name="query" value="{{ $query }}" id="search-input"
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
                        <div class="align-self-center ml-2">
                            <button class="btn btn-danger btn-lg" id="clear-button" tabindex="0"
                                aria-controls="invoice-list">
                                <span>Xóa</span>
                            </button>
                        </div>
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
                            <th class="py-6">Loại</th>
                            <th class="py-6">Dữ liệu</th>
                            <th class="py-6">Trạng thái</th>
                            <th class="py-6">Ngày tạo</th>
                            <th class="no-sort py-6">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($notifications->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">Chưa có thông báo</td>
                            </tr>
                        @else
                            @foreach ($notifications as $notification)
                                <tr role="row">
                                    <td class="checkbox-column py-6 pl-6">
                                        <label class="new-control new-checkbox checkbox-primary m-auto">
                                            <input type="checkbox"
                                                class="new-control-input child-chk select-customers-info">
                                        </label>
                                    </td>
                                    <td class="align-middle">{{ $notification->type }}</td>
                                    <td class="align-middle">
                                        @if ($notification->blog)
                                            <a
                                                href="{{ route('owners.notification-update', ['slug' => $notification->blog->slug]) }}">
                                                {{ $notification->data }}
                                            </a>
                                        @elseif ($notification->room)
                                            <a
                                                href="{{ route('owners.notification-update', ['slug' => $notification->room->slug]) }}">
                                                {{ $notification->data }}
                                            </a>
                                        @else
                                            <span class="text-muted">Không thể truy cập</span>
                                        @endif
                                    </td>
                                    {{-- 5 trường khóa ngoại --}}
                                    {{-- <td class="align-middle">
                                        @if ($notification->blog)
                                            <a
                                                href="{{ route('owners.notification-update', ['slug' => $notification->blog->slug]) }}">
                                                {{ $notification->data }}
                                            </a>
                                        @elseif ($notification->zone)
                                            <a
                                                href="{{ route('owners.notification-update', ['slug' => $notification->zone->slug]) }}">
                                                {{ $notification->data }}
                                            </a>
                                        @elseif ($notification->room)
                                            <a
                                                href="{{ route('owners.notification-update', ['slug' => $notification->room->slug]) }}">
                                                {{ $notification->data }}
                                            </a>
                                        @elseif ($notification->comment)
                                            <a
                                                href="{{ route('owners.notification-update', ['slug' => $notification->comment->slug]) }}">
                                                {{ $notification->data }}
                                            </a>
                                        @elseif ($notification->watchlist)
                                            <a
                                                href="{{ route('owners.notification-update', ['slug' => $notification->watchlist->slug]) }}">
                                                {{ $notification->data }}
                                            </a>
                                        @else
                                            <span class="text-muted">Không thể truy cập</span>
                                        @endif
                                    </td> --}}

                                    <td class="align-middle">
                                        <span
                                            class="badge badge-{{ $notification->status === 2 ? 'green' : 'red' }} text-capitalize">
                                            {{ $notification->status === 2 ? 'Đã xem' : 'Chưa xem' }}
                                        </span>
                                    </td>
                                    <td class="align-middle">{{ $notification->created_at->format('d-m-Y') }}</td>
                                    <td class="align-middle">
                                        <a href="#" data-toggle="tooltip" title="Xóa"
                                            class="d-inline-block fs-18 text-muted hover-primary">
                                            <i class="fal fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <!-- Phân trang 1-->
                <div class="d-flex justify-content-center mt-4">
                    @if ($notifications->hasPages())
                        @php
                            $queryParams = [
                                'query' => request()->query('query', ''),
                                'notification-list_length' => request()->query('notification-list_length', 10),
                            ];
                        @endphp
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                @if ($notifications->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $notifications->appends($queryParams)->previousPageUrl() }}"
                                            rel="prev">&laquo;</a>
                                    </li>
                                @endif
                                @for ($i = max(1, $notifications->currentPage() - 2); $i <= min($notifications->lastPage(), $notifications->currentPage() + 2); $i++)
                                    <li class="page-item {{ $notifications->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ $notifications->appends($queryParams)->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($notifications->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $notifications->appends($queryParams)->nextPageUrl() }}"
                                            rel="next">&raquo;</a>
                                    </li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                @endif
                            </ul>
                        </nav>
                    @endif
                </div>
                {{-- Kết quả --}}
                <div class="text-center mt-2">
                    @if ($notifications->total() > 0)
                        {{ $notifications->firstItem() }}-{{ $notifications->lastItem() }} trong
                        {{ $notifications->total() }} Kết quả
                    @else
                        Không có kết quả nào
                    @endif
                </div>
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
    {{-- Notification - Pagination --}}
    <script src="{{ asset('assets/js/notification-list/notification-pagination.js') }}"></script>
@endpush
