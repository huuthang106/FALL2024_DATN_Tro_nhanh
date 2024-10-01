@extends('layouts.owner')
@section('titleOwners', 'Đơn rút tiền | TRỌ NHANH')
@section('contentOwners')
    <main id="content" class="bg-gray-01">
            <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
                <div class="p-3">
                    <form action="#" method="GET">
                        <h2 class="mb-0 text-heading fs-22 lh-15 p-3">
                            Đơn rút tiền của tôi
                            <span class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">
                               12
                            </span>
                        </h2>
                        <div class="mb-6">
                            <div class="row" wire:ignore>
                                <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                                    <div class="d-flex form-group mb-0 align-items-center ml-3">
                                        <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                                        <select wire:model.lazy="timeFilter" class="form-control form-control-lg selectpicker"
                                            data-style="bg-white btn-lg h-52 py-2 border">
                                            <option value="" selected>Thời Gian:</option>
                                            <option value="1_day">1 ngày</option>
                                            <option value="7_day">7 ngày</option>
                                            <option value="1_month">1 tháng</option>
                                            <option value="3_month">3 tháng</option>
                                            <option value="6_month">6 tháng</option>
                                            <option value="1_year">1 năm</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                                    <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                                        <input wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh" type="text"
                                            class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..." aria-label=""
                                            aria-describedby="basic-addon1">
                                        <div class="input-group-append position-absolute pos-fixed-right-center">
                                            <button class="btn bg-transparent border-0 text-gray lh-1" type="button">
                                                <i class="fal fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive p-3">
                        <table class="table table-hover bg-white border rounded-lg">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-nowrap">Tên dịch vụ</th>
                                    <th scope="col" class="text-nowrap">Mô tả</th>
                                    <th scope="col" class="text-nowrap">Ngày thanh toán</th>
                                    <th scope="col" class="text-nowrap">Số tiền</th>
                                    <th scope="col" class="text-nowrap">Số dư</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr class="shadow-hover-xs-2 bg-hover-white">
                                            <td class="align-middle" style="white-space: nowrap;">
                                                <small>Thanh toán dịch vụ</small>
                                            </td>

                                            <td class="align-middle text-truncate"
                                                style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <small></small>
                                            </td>
                                            <td class="align-middle">
                                                <small></small>
                                            </td>
                                            <td class="align-middle">
                                                <small class=""
                                                    style="white-space: nowrap;">
                                                    VND
                                                </small>
                                            </td>
                                            <td class="align-middle">
                                                <small style="white-space: nowrap;">
                                                    VND
                                                </small>
                                            </td>

                                        </tr>
                                  
                                <tr>
                                    <td colspan="5" class="text-center align-middle"><small>Không có giao dịch nào.</small>
                                    </td>
                                </tr>
                               
                            </tbody>
                    </table>
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
    {{-- <title>Danh Sách Hóa Đơn | TRỌ NHANH</title> --}}
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
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/qrcode.css') }}">
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
    <!-- jQuery (Bootstrap 4 yêu cầu) -->
    <!-- <script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Đã sao chép: ' + text);
    }).catch(err => {
        console.error('Lỗi sao chép: ', err);
    });
}
</script> -->

@endpush
