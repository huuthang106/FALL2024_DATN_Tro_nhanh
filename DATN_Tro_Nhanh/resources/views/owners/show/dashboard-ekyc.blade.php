@extends('layouts.owner')
@section('titleOwners', 'Thông tin đăng ký | TRỌ NHANH')
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
                <div class="col-lg-12">
                        <div class="card">
                        @if($information)
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
                    <input type="text" class="form-control" id="cmnd_number" name="cmnd_number"
                        value="{{ $information->identification_number }}" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label for="gender">Giới tính</label>
                    <input type="text" class="form-control" id="gender" name="gender" 
                    value="{{ $information->gender == 1 ? 'Nam' : ($information->gender == 2 ? 'Nữ' : '') }}" readonly>
                </div>
            </div>
        </div>
        <form action="{{ route('owners.profile.clear-information') }}" method="POST" >
    @csrf
    @method('DELETE') <!-- Sử dụng phương thức DELETE -->
    
    <div class="form-group d-flex justify-content-end">
        <button type="submit" class="btn btn-danger">Xóa thông tin</button>
    </div>
</form>

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
    <link rel="icon" href="{{ asset('assets/images/tro-moi.png') }}" />
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