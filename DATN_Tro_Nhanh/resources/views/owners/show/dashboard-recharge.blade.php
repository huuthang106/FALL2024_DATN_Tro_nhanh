@extends('layouts.owner')
@section('titleOwners', 'Nạp tiền | TRỌ NHANH')
@section('contentOwners')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
        <div class="mb-6">
    <h3 class="ms-4">Số dư tài khoản: <span class="text-primary">100.000 đ</span></h4>
    <div class="important-note">
    <h6>Lưu ý quan trọng:</h6>
    <h6 class=""> - Nội dung chuyển tiền bạn vui lòng ghi đúng thông tin sau:"GD123 - 0395950134"</h6><br>
    <h6 class=""> Trong đó 144834 là mã thành viên, 0395950134 là số điện thoại của bạn đăng ký trên website tronhanh.com.</h6><br>
    <h6>Xin cảm ơn!</h6>
</div>
    <div class="row mt-3 justify-content-center">
        <!-- Chọn phương thức nạp tiền -->
        <div class="col-12 col-md-12">
            <h5 class="text-center">Mời bạn chọn phương thức nạp</h5>
            <div class="row justify-content-center mt-3">
               <!-- Khung chuyển khoản -->
<div class="col-12 col-md-3 mb-4">
    <div class="card border-primary">
        <div class="card-body text-center">
            <h6 class="card-title">Chuyển khoản</h6>
            <img src="{{ asset('assets/images/bank-transfer.png') }}" alt="" class="img-fluid w-50">
            <p class="card-text mt-2">Nạp tiền bằng cách chuyển khoản ngân hàng trực tiếp vào tài khoản của chúng tôi.</p>
           <!-- Nút mở modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#transferModal">Xem thông tin</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="transferModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transferModalLabel">Thông tin chuyển khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p><strong>Số tài khoản:</strong>7020326951</p>
                    <button class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('0395950134')">Sao chép số tài khoản</button>
                </div>
                <div class="mb-3">
                    <p><strong>Tên ngân hàng:</strong>Ngân hàng BIDV</p>
                    <button class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('Ngân hàng ABC')">Sao chép tên ngân hàng</button>
                </div>
                <div class="mb-3">
                    <p><strong>Chủ tài khoản:</strong>NGUYEN THAI TOAN</p>
                    <button class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('Công ty XYZ')">Sao chép chủ tài khoản</button>
                </div>
                <div>
                    <p><strong>Nội dung chuyển khoản:</strong>PT123 - 144834 - 0395950134</p>
                    <button class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('PT123 - 144834 - 0395950134')">Sao chép nội dung chuyển khoản</button>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- Khung VietQR -->
<div class="col-12 col-md-3 mb-4">
    <div class="card border-success">
        <div class="card-body text-center" style="max-height: 300px; overflow: hidden;">
            <h6 class="card-title">VietQR</h6>
            <img src="{{ asset('assets/images/vietqr.png') }}" alt="" class="img-fluid mb-5">
            <p class="card-text mt-2">Sử dụng mã QR để nạp tiền nhanh chóng qua VietQR.</p>
            <button class="btn btn-success mt-2" data-toggle="modal" data-target="#qrModal">Xem mã QR</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrModalLabel">Vui lòng quét mã</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('assets/images/macodeqr.png') }}" alt="Mã QR VietQR" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>
               <!-- Khung MoMo -->
<div class="col-12 col-md-3 mb-4">
    <div class="card border-primary">
        <div class="card-body text-center">
            <h6 class="card-title">MoMo</h6>
            <img src="{{ asset('assets/images/momo.png') }}" alt="" class="img-fluid w-50">
            <p class="card-text mt-2">Sử dụng mã QR để nạp tiền nhanh chóng qua MoMo.</p>
            <button class="btn btn-primary" data-toggle="modal" data-target="#momoModal">Xem mã QR</button>
        </div>
    </div>
</div>

<!-- Modal MoMo -->
<div class="modal fade" id="momoModal" tabindex="-1" role="dialog" aria-labelledby="momoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="momoModalLabel">Mã QR MoMo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('assets/images/macodemom.jpg') }}" alt="Mã QR MoMo" class="img-fluid" style="max-width: 100%; height: auto;">
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
