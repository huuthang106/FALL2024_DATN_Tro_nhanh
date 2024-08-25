@extends('layouts.owner')
@section('titleOwners', 'Thông Tin Tài Khoản | TRỌ NHANH')
@section('contentOwners')

<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
        <div class="mb-6">
            <h2 class="mb-0 text-heading fs-22 lh-15">THÔNG TIN TÀI KHOẢN</h2>
            <p class="mb-1">Dịch vụ khách hàng rất quan trọng, do đó, khách hàng phải chịu trách nhiệm. Cần có hy vọng.</p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form id="upload-form" method="POST" action="{{ route('owners.dang-ky-thanh-vien') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Ảnh CMT/CCCD mặt trước -->
                                        <div class="col-12 mb-3">
                                            <h5 class="card-title">1. Ảnh CMT/CCCD mặt trước</h5>
                                            <div class="text-center mb-2">
                                                <img id="cccd-mt" src="" alt="Căn cước công dân mặt trước" class="img-large">
                                            </div>
                                            <div class="btn-wrapper">
                                                <input type="file" class="custom-file-input" id="CCCDMT" name="CCCDMT" required>
                                                <label class="btn btn-danger btn-custom" for="CCCDMT">
                                                    <span class="d-inline-block mr-1"><i class="fal fa-cloud-upload"></i></span>
                                                    Chọn Ảnh
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Ảnh CMT/CCCD mặt sau -->
                                        <div class="col-12 mb-3">
                                            <h5 class="card-title">2. Ảnh CMT/CCCD mặt sau</h5>
                                            <div class="text-center mb-2">
                                                <img id="cccd-ms" src="" alt="Căn cước công dân mặt sau" class="img-large">
                                            </div>
                                            <div class="btn-wrapper">
                                                <input type="file" class="custom-file-input" id="CCCDMS" name="CCCDMS" required>
                                                <label class="btn btn-danger btn-custom" for="CCCDMS">
                                                    <span class="d-inline-block mr-1"><i class="fal fa-cloud-upload"></i></span>
                                                    Chọn Ảnh
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Ảnh khuôn mặt -->
                                        <div class="col-12 mb-3">
                                            <h5 class="card-title">3. Ảnh khuôn mặt</h5>
                                            <div class="text-center mb-2">
                                                <img id="face" src="" alt="Khuôn mặt" class="img-large">
                                            </div>
                                            <div class="btn-wrapper">
                                                <input type="file" class="custom-file-input" id="FileFace" name="FileFace" required>
                                                <label class="btn btn-danger btn-custom" for="FileFace">
                                                    <span class="d-inline-block mr-1"><i class="fal fa-cloud-upload"></i></span>
                                                    Chọn Ảnh
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Lớp phủ tải -->
            <div id="loading-overlay" class="loading-overlay d-none">
                <div class="loading-spinner">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p>Đang xử lý...</p>
                </div>
            </div>

            <!-- Phần hiển thị kết quả bên phải -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body px-6 pt-6 pb-5">
                        <h3 class="card-title text-heading fs-18 lh-15 mb-4">Kết quả</h3>
            
                        <!-- Form chỉnh sửa kết quả OCR mặt trước -->
                        <form id="result-form" method="POST" action="{{ route('owners.store-data') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="ocr-results mb-4">
                                <h6 class="fs-16 fw-bold">Kết quả OCR mặt trước</h6>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="cmnd_number">Số CMND</label>
                                        <input type="text" class="form-control" id="cmnd_number" name="cmnd_number" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="full_name">Họ và tên</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="gender">Giới tính</label>
                                        <input type="text" class="form-control" id="gender" name="gender" required>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Form chỉnh sửa kết quả OCR mặt sau -->
                            <div class="ocr-results mb-4">
                                <h6 class="fs-16 fw-bold">Mô tả</h6>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="issued_by">Mô tả</label>
                                        <textarea class="form-control" id="issued_by" name="issued_by" rows="4" required></textarea>
                                    </div>
                                </div>
                            </div>
                        
                         
                            <!-- Hiển thị hình ảnh -->
                            <div id="images-container">
                                <img id="cccdmt-image" name="cccdmt-image" src="" alt="CCCDMT" />
                                <img id="cccdms-image" name="cccdmt-image" src="" alt="CCCDMS" />
                                <img id="fileface-image" name="fileface-image" src="" alt="FileFace" />
                            </div>
                        
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Lưu Kết Quả</button>
                            </div>
                        </form>
                        
                        
                        
                    </div>
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
    <link rel="stylesheet" href="{{ asset('assets/css/cccd.css') }}">
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
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script src="{{ asset('assets/js/load-file.js') }}"></script>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>
    <script src="{{ asset('assets/js/alert-update-user.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-update-zone-nht.js') }}"></script>
    <script src="{{ asset('assets/js/callApi.js') }}">
    </script>
    
@endpush
