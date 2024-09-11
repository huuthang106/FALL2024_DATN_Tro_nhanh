@extends('layouts.owner')
@section('titleOwners', 'Đơn tham gia trọ | TRỌ NHANH')
@section('contentOwners')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <div class="mb-6">
                <div class="row">
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        {{-- <div class="d-flex form-group mb-0 align-items-center">
                            <h5 for="invoice-list_length" class="d-block mr-2 mb-0">Tên khu:</h5>
                        </div> --}}
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
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover bg-white border rounded-lg">
                            <thead>
                                <tr role="row">
                                    <th class="no-sort py-6 pl-6">
                                        <label class="new-control new-checkbox checkbox-primary m-auto">
                                            <input type="checkbox"
                                                class="new-control-input chk-parent select-customers-info">
                                        </label>
                                    </th>
                                    <th class="py-6 text-start">Tên phòng</th>
                                    <th class="py-6 text-start">Tên người ở</th>
                                    <th class="py-6 text-start">Số điện thoại</th>
                                    <th class="py-6 text-start">Khu trọ</th>
                                    <th class="py-6 text-start">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($residents->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">Không có đơn</td>
                                    </tr>
                                @else
                                    @foreach ($residents as $resident)
                                        <tr>
                                            <td class="py-6 pl-6">
                                                <label class="new-control new-checkbox checkbox-primary m-auto">
                                                    <input type="checkbox"
                                                        class="new-control-input chk-parent select-customers-info">
                                                </label>
                                            </td>
                                            <td class="align-middle"><small>{{ $resident->room->title }}</small></td>
                                            <td class="align-middle">
                                                <small>
                                                    <a href="{{route('client.client-agent-detail', $resident->tenant->slug)}}">{{ $resident->tenant->name }}</a>

                                                </small>

                                            </td>
                                            <td class="align-middle"> <small>
                                                    <small>
                                                        {{ $resident->tenant->phone }}

                                                    </small>
                                                </small></td>
                                            <td class="align-middle">
                                                <small>
                                                    {{ $resident->zone->name }}

                                                </small>
                                            </td>
                                            <td class="align-middle">
                                                <small>
                                                    
                                                    <form action="{{route('owners.cancel-order',$resident->id)}}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                    </form>
                                                </small>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        @if ($residents->lastPage() > 1)
                            <ul class="pagination rounded-active justify-content-center">
                                {{-- Trang trước --}}
                                <li class="page-item {{ $residents->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $residents->previousPageUrl() }}" aria-label="Previous">
                                        <i class="far fa-angle-double-left"></i>
                                    </a>
                                </li>

                                {{-- Trang đầu tiên --}}
                                @if ($residents->currentPage() > 2)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $residents->url(1) }}">1</a>
                                    </li>
                                @endif

                                {{-- Dấu ba chấm ở đầu nếu cần --}}
                                @if ($residents->currentPage() > 3)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                                @for ($i = max(1, $residents->currentPage() - 1); $i <= min($residents->currentPage() + 1, $residents->lastPage()); $i++)
                                    <li class="page-item {{ $residents->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $residents->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Dấu ba chấm ở cuối nếu cần --}}
                                @if ($residents->currentPage() < $residents->lastPage() - 2)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                {{-- Trang cuối cùng --}}
                                @if ($residents->currentPage() < $residents->lastPage() - 1)
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $residents->url($residents->lastPage()) }}">{{ $residents->lastPage() }}</a>
                                    </li>
                                @endif

                                {{-- Trang tiếp theo --}}
                                <li
                                    class="page-item {{ $residents->currentPage() == $residents->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $residents->nextPageUrl() }}" aria-label="Next">
                                        <i class="far fa-angle-double-right"></i>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
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
    {{-- <link rel="stylesheet" href="{{ asset('assets/js/jquery.dataTables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> --}}
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
    {{-- <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script> --}}
    <!-- Theme scripts -->

    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>
    <script src="{{ asset('assets/js/alert-update-user.js') }}"></script>
    <script src="{{ asset('assets/js/alert-report.js') }}"></script>
@endpush
