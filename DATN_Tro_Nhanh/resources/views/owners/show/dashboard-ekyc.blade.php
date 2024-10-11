@extends('layouts.owner')
@section('titleOwners', 'Thông Tin Đăng Ký | TRỌ NHANH')
@section('contentOwners')
    
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <div class="mb-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            @if ($information)
                                <div class="card-body px-6 pt-6 pb-5">
                                    <h3 class="card-title text-heading fs-18 lh-15 mb-4">Thông tin đã bổ sung</h3>

                                    <!-- Form chỉnh sửa kết quả OCR mặt trước -->
                                    <div class="ocr-results mb-4">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="full_name">Họ và tên</label>
                                                <input type="text" class="form-control" id="full_name" name="full_name"
                                                    value="{{ $information->name }}" readonly>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="cmnd_number">Số CMND</label>
                                                <input type="text" class="form-control" id="cmnd_number"
                                                    name="cmnd_number" value="{{ $information->identification_number }}"
                                                    readonly>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="gender">Giới tính</label>
                                                <input type="text" class="form-control" id="gender" name="gender"
                                                    value="{{ $information->gender == 1 ? 'Nam' : ($information->gender == 2 ? 'Nữ' : '') }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                            data-target="#imageModal">
                                            Xem ảnh định danh
                                        </button>
                                        <form id="toggleVisibilityForm" action="{{ route('owners.profile.toggle-visibility') }}" method="POST" class="mr-2">
                                            @csrf
                                            @method('POST')
                                            <button type="button" onclick="confirmToggleVisibility({{ $information->status }})" class="btn {{ $information->status == 1 ? 'btn-primary' : 'btn-primary' }}">
                                                {{ $information->status == 1 ? 'Công khai thông tin' : 'Ẩn thông tin' }}
                                            </button>
                                        </form>
                                        @if(session('success'))
                                        <div id="successMessage" data-message="{{ session('success') }}" style="display: none;"></div>
                                    @endif
                                
                                    @if(session('error'))
                                        <div id="errorMessage" data-message="{{ session('error') }}" style="display: none;"></div>
                                    @endif
                                        <form action="{{ route('owners.profile.clear-information') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa thông tin</button>
                                        </form>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog"
                                        aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Ảnh định danh</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if (!empty($images))
                                                        <div class="row">
                                                            @foreach ($images as $image)
                                                                <div class="col-12 col-md-6 mb-4">
                                                                    <div class="image-wrapper">
                                                                        <a href="{{ asset('assets/images/register_owner/' . $image) }}" data-fancybox="gallery">
                                                                            <img src="{{ asset('assets/images/register_owner/' . $image) }}"
                                                                                 alt="Identity Image"
                                                                                 class="img-fluid rounded shadow-sm w-100">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <p class="text-muted">Không có ảnh định danh.</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-center d-flex justify-content-center">
                                    <p class="text-danger">Bạn chưa có thông tin. Vui lòng bổ sung thông tin.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('styleOwners')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">
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
    <meta property="og:image:height" content="630"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="TRỌ NHANH - Nền tảng đăng ký và tìm kiếm trọ nhanh chóng và tiện lợi. Đăng ký và quản lý thông tin trọ với đầy đủ các tiện ích.">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">

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
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TroNhanh">
    <meta name="twitter:creator" content="@TroNhanh">
    <meta name="twitter:title" content="Thông Tin Đăng Ký tại TRỌ NHANH">
    <meta name="twitter:description"
        content="Đăng ký tham gia và quản lý thông tin trọ nhanh chóng với nền tảng TRỌ NHANH.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Thông Tin Đăng Ký tại TRỌ NHANH">
    <meta property="og:description"
        content="Nền tảng đăng ký thông tin trọ nhanh chóng và dễ dàng tại TRỌ NHANH, cung cấp thông tin chi tiết và các tiện ích liên quan.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <style>
        .image-wrapper {
            height: 300px; /* Hoặc bất kỳ chiều cao cố định nào bạn muốn */
            overflow: hidden;
            background-color: #f8f9fa; /* Màu nền cho khoảng trống */
        }
        .image-wrapper img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('assets/js/public-information.js') }}"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Tùy chọn của Fancybox
        });
    </script>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>
    <script src="{{ asset('assets/js/alert-update-user.js') }}"></script>
    <script src="{{ asset('assets/js/alert-report.js') }}"></script>
@endpush
