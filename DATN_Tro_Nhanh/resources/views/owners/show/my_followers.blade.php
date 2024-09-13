@extends('layouts.owner')
@section('titleOwner', 'Lượt Theo Dõi Của Tôi | TRỌ NHANH')
@section('contentOwners')
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
                        <th class="py-6">Hình ảnh</th>

                        <th class="py-6">Tên</th>
                        <th class="py-6">Chức năng</th>
                        <th class="py-6">Thao tác</th>


                    </tr>
                </thead>
                <tbody>
                    @if ($myFollowings->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">Danh sách trống</td>
                        </tr>
                    @else
                        @foreach ($myFollowings as $item)
                            <tr role="row">
                                <td class="checkbox-column py-6 pl-6">
                                    <label class="new-control new-checkbox checkbox-primary m-auto">
                                        <input type="checkbox" class="new-control-input child-chk select-customers-info">
                                    </label>
                                </td>
                                <td class="align-middle pt-6 pb-4 px-6">
                                    <div class="media d-flex align-items-center">
                                        <div class="w-120px mr-4 position-relative">
                                            <a href="{{ route('owners.show-blog', $item->followers->slug) }}">
                                                @if ($item->followers->image)
                                                    <img src="{{ asset('assets/images/' . $item->followers->image) }}"
                                                        alt="{{ $item->followers->image }}" class="img-fluid rounded-image">
                                                @else
                                                    <p>No images available</p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    {{ $item->followers->name }}
                                </td>
                                <td class="align-middle">
                                    @if ($item->followers->role == '2')
                                        <span>Người đưa tin</span>
                                    @elseif ($item->followers->role == '0')
                                        <span>Người quản trị</span>
                                    @else
                                        <span>Người dùng</span>
                                    @endif

                                </td>

                                <td class="align-middle">
                                    <a href="#" data-toggle="tooltip" title="Xóa"
                                        class="d-inline-block fs-18 text-muted hover-primary">
                                        <i class="fal fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            {{-- 1 --}}
                        @endforeach
                    @endif
                </tbody>
            </table>
            <!-- Phân trang 1-->
            @if ($myFollowings->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    @if ($myFollowings->hasPages())
                        @php
                            $queryParams = [
                                'query' => request()->query('query', ''),
                                'notification-list_length' => request()->query('notification-list_length', 10),
                            ];
                        @endphp
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                @if ($myFollowings->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $myFollowings->appends($queryParams)->previousPageUrl() }}"
                                            rel="prev">&laquo;</a>
                                    </li>
                                @endif
                                @for ($i = max(1, $myFollowings->currentPage() - 2); $i <= min($myFollowings->lastPage(), $myFollowings->currentPage() + 2); $i++)
                                    <li class="page-item {{ $myFollowings->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ $myFollowings->appends($queryParams)->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($myFollowings->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $myFollowings->appends($queryParams)->nextPageUrl() }}"
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
                    @if ($myFollowings->total() > 0)
                        {{ $myFollowings->firstItem() }}-{{ $myFollowings->lastItem() }} trong
                        {{ $myFollowings->total() }} Kết quả
                    @else
                        Không có kết quả nào
                    @endif
                </div>
            @endif
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
    {{-- <title>Thông Báo | TRỌ NHANH</title> --}}
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
    {{-- <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}"> --}}
    <link rel="icon" href="{{ asset('assets/images/tro-moi.png') }}" />
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
    <link rel="stylesheet" href="{{ asset('assets/css/owners/style-owner-nht.css') }}">
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
