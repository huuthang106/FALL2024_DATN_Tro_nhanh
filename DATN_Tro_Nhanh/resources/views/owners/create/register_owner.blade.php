@extends('layouts.owner')
@section('titleOwners', 'Thông Tin Tài Khoản | TRỌ NHANH')
@section('contentOwners')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15">THÔNG TIN TÀI KHOẢN
                </h2>
                <p class="mb-1">Dịch vụ khách hàng rất quan trọng, do đó, khách hàng phải chịu trách nhiệm. Cần có hy vọng
                </p>
            </div>
            <form method="POST" action=""
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-6">
                    <div class="col-lg-12">
                        <div class="card mb-6">
                            <div class="card-body px-6 pt-6 pb-5">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-sm-4 col-xl-12 col-xxl-7 mb-6">
                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Ảnh đại diện</h3>
                                        <p class="card-text">Tải lên ảnh hồ sơ của bạn.</p>
                                    </div>
                                    
                                    <div class="col-sm-8 col-xl-3  col-xxl-5">
                                        <!-- Hiển thị ảnh hiện tại hoặc ảnh mặc định nếu không có ảnh -->
                                        <div class="profile-image-container">
                                            <img id="cccd-mt" src=""
                                                alt="Căn cước công dân mặt trước" class="register_owners">
                                        </div>
                              
                                        <div class="custom-file mt-4 h-auto">
                                            <input type="file" class="custom-file-input" id="CCCDMT" name="CCCDMT">
                                            <label class="btn btn-secondary btn-lg btn-block" for="CCCDMT">
                                                <span class="d-inline-block mr-1"><i
                                                        class="fal fa-cloud-upload"></i></span>Tải lên hình ảnh hồ sơ
                                            </label>
                                        </div>
                                        
                                        <p class="mb-0 mt-2">*tối thiểu 500px x 500px</p>
                                    </div>
                                    <div class="col-sm-8 col-xl-3 col-xxl-5">
                                        <!-- Hiển thị ảnh hiện tại hoặc ảnh mặc định nếu không có ảnh -->
                                        <div class="profile-image-container">
                                            <img id="cccd-ms" src=""
                                                alt="Căn cước công dân mặt sau" class="register_owners">
                                        </div>
                              
                                        <div class="custom-file mt-4 h-auto">
                                            <input type="file" class="custom-file-input" id="CCCDMS" name="CCCDMS">
                                            <label class="btn btn-secondary btn-lg btn-block" for="CCCDMS">
                                                <span class="d-inline-block mr-1"><i
                                                        class="fal fa-cloud-upload"></i></span>Tải lên hình ảnh hồ sơ
                                            </label>
                                        </div>
                                        
                                        <p class="mb-0 mt-2">*tối thiểu 500px x 500px</p>
                                    </div>
                                    <div class="col-sm-8 col-xl-3 col-xxl-5">
                                        <!-- Hiển thị ảnh hiện tại hoặc ảnh mặc định nếu không có ảnh -->
                                        <div class="profile-image-container">
                                            <img id="face" src=""
                                                alt="Khuôn mặt" class="register_owners">
                                        </div>
                              
                                        <div class="custom-file mt-4 h-auto">
                                            <input type="file" class="custom-file-input" id="FileFace" name="FileFace">
                                            <label class="btn btn-secondary btn-lg btn-block" for="FileFace">
                                                <span class="d-inline-block mr-1"><i
                                                        class="fal fa-cloud-upload"></i></span>Tải lên hình ảnh hồ sơ
                                            </label>
                                        </div>
                                        
                                        <p class="mb-0 mt-2">*tối thiểu 500px x 500px</p>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

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
    <link rel="stylesheet" href="{{ asset('assets/css/mh.css') }}">
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
    <!-- Theme scripts -->
    {{-- <script>
        window.zoneData = {
            provinceId: '{{ $user->province }}',
            districtId: '{{ $user->district }}',
            communeId: '{{ $user->village }}'
        };
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script src="{{ asset('assets/js/load-file.js') }}"></script>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>
    <script src="{{ asset('assets/js/alert-update-user.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-update-zone-nht.js') }}"></script>
  
@endpush
