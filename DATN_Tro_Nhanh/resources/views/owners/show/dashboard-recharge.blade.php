@extends('layouts.owner')
@section('titleOwners', 'Nạp tiền | TRỌ NHANH')
@section('contentOwners')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
                <div class="mb-6">
                    <h5 class="ms-4">Số dư tài khoản: <span class="text-primary"> {{$user->balance ?? 0}} đ</span></h5>
                    <div class="important-note">
                    <h6>Lưu ý quan trọng:</h6>
                    <h6 class=""> - Nội dung chuyển tiền bạn vui lòng ghi đúng thông tin sau:"TN GD{{$user->id}}"</h6><br>
                    <h6 class=""> Trong đó {{$user->id}} là mã thành viên của bạn đăng ký trên website tronhanh.com.</h6><br>
                    <h6>Xin cảm ơn!</h6>
                        </div>
                            <div class="row mt-3 justify-content-center">
                                <!-- Chọn phương thức nạp tiền -->
                                <div class="col-12">
                                    <div class="row justify-content-center mt-3 align-items-stretch">
                                        <!-- Khung chuyển khoản -->
                                        <div class="col-12 col-md-6 mb-4 d-flex">
                                            <div class="p-3 border rounded bg-light shadow-sm w-100 h-100">
                                            <h5 class="text-center mb-3">Thông tin thanh toán</h5>
                                            <div class="text-center payment-info">
                                                <div class="row">
                                                    <div class="col-6 text-right"><strong>Số tài khoản:</strong></div>
                                                    <div class="col-6 text-left">109882767243</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-right"><strong>Chủ tài khoản:</strong></div>
                                                    <div class="col-6 text-left">NGUYEN THAI TOAN</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-right"><strong>Ngân hàng:</strong></div>
                                                    <div class="col-6 text-left">VIETINBANK - NH TMCP CÔNG THƯƠNG VIỆT NAM</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-right"><strong>Nội dung chuyển khoản:</strong></div>
                                                    <div class="col-6 text-left">TN GD{{ $user->id }}</div>
                                                </div>
                                            </div>

                                            </div>
                                        </div>
                                        <!-- QR Code -->
                                        <div class="col-12 col-md-6 text-center d-flex">
                                            <div class="p-3 border rounded bg-light shadow-sm w-100 h-100">
                                                <h5 class="text-center mb-3">Quét mã QR tại đây</h5>
                                                <img src="{{ $qrCodeUrl }}" alt="QR Code" class="img-fluid" style="max-width: 300px; height: auto;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js (Bootstrap 4 yêu cầu) -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
