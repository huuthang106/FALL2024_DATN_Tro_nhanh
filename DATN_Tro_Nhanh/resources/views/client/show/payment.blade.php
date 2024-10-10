@extends('layouts.main')
@section('titleUs', 'Thanh Toán | TRỌ NHANH')
@section('contentUs')
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
    <main id="content">
        <section class="pb-4 shadow-xs-5">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-6 pt-lg-0 mb-4">
                        <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hóa Đơn Thanh Toán</li>
                    </ol>
                </nav>
                <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600 mb-6">Hóa Đơn Thanh Toán</h1>
            </div>
        </section>
        <section class="pt-8 pb-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-8 mb-6 mb-md-0">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15">Gói Dịch Vụ Đã Chọn</h4>
                        <div class="card border-0">
                            @foreach ($cartItems as $item)
                                <div
                                    class="card-header bg-transparent d-flex justify-content-between align-items-center px-0 pb-3">
                                    <p class="fs-15 font-weight-bold text-heading mb-0 text-uppercase mr-2"> <span
                                            class="font-weight-500"></span>{{ $item->priceList->description }}</p>
                                    {{-- <a href="#" class="btn btn-outline-primary py-2 lh-238 px-4">Đổi Gói</a> --}}
                                </div>
                                <div class="card-body px-0 py-2">
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex justify-content-between lh-22">
                                            <p class="text-gray-light mb-0">Thời Gian Gói:</p>
                                            <p class="font-weight-500 text-heading mb-0">
                                                {{ $item->priceList->duration_day }} ngày</p>
                                        </li>
                                        <li class="d-flex justify-content-between lh-22">
                                            <p class="text-gray-light mb-0">Giá:</p>
                                            <p class="font-weight-500 text-heading mb-0">
                                                {{ number_format($item->priceList->price, 0, ',', '.') }} VND</p>
                                        </li>
                                        <li class="d-flex justify-content-between lh-22">
                                            <p class="text-gray-light mb-0">Số lượng:</p>
                                            <p class="font-weight-500 text-heading mb-0">{{ $item->quantity }}</p>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                            <div class="card-footer bg-transparent d-flex justify-content-between p-0 align-items-center">
                                <p class="text-heading mb-0">Tổng Giá:</p>
                                <span class="fs-32 font-weight-bold text-heading">
                                    {{ number_format($totalPrice, 0, ',', '.') }}
                                    VND
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-7 offset-lg-1">
                        <h4 class="text-heading fs-22 font-weight-500 lh-15 mb-3">Thông tin thanh toán</h4>
                        <p class="font-weight-500 text-heading h6 mb-4">Số dư tài khoản: <span class="font-weight-bold">{{ number_format($user->balance, 0, ',', '.') }} VND
                        </span></h6>
                        <p class="font-weight-500 text-heading h6 mb-4">Nội dung thanh toán: Thanh toán gói vip</h6>
                        <p class="mb-6">Vui lòng đọc <a href="#" class="text-heading font-weight-500 border-bottom hover-primary" data-toggle="modal" data-target="#termsModal">Điều Khoản & Điều Kiện</a> trước</p>
                        <!-- Terms and Conditions Modal -->
                        <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="termsModalLabel">Điều Khoản & Điều Kiện</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="max-height: 400px; overflow-y: auto;" id="termsContent">
                                    <!-- Add your terms and conditions content here -->
                                    <p>Khi mua gói VIP để đăng tin trọ trên hệ thống, người dùng cần tuân thủ các điều khoản và điều kiện sau: Gói VIP chỉ áp dụng cho người dùng đã đăng ký tài khoản và xác thực thông tin cá nhân. Người dùng cam kết tuân thủ đầy đủ các quy định và chính sách khi sử dụng hệ thống để đăng tin. Gói VIP sẽ giúp tin đăng của bạn được ưu tiên hiển thị ở vị trí nổi bật trên kết quả tìm kiếm và trang chủ, với thời gian hiệu lực là [Số ngày] kể từ thời điểm kích hoạt. Sau thời gian này, tin đăng sẽ trở về trạng thái bình thường.

                                        Thanh toán cho gói VIP được thực hiện qua các phương thức điện tử như thẻ tín dụng, ví điện tử hoặc chuyển khoản ngân hàng. Lưu ý rằng sau khi thanh toán thành công, gói VIP sẽ không được hoàn tiền trong bất kỳ trường hợp nào, trừ khi xảy ra lỗi kỹ thuật từ hệ thống. Người dùng phải chịu trách nhiệm hoàn toàn về tính chính xác và hợp pháp của nội dung tin đăng. Hệ thống không chịu trách nhiệm đối với các tranh chấp phát sinh từ nội dung do người dùng cung cấp. Trong trường hợp người dùng lạm dụng gói VIP để đăng tin sai sự thật, spam hoặc vi phạm quy định, tin đăng sẽ bị xóa và tài khoản có thể bị khóa vĩnh viễn mà không cần thông báo trước.

                                        Ngoài ra, hệ thống có quyền chỉnh sửa hoặc gỡ bỏ tin đăng nếu phát hiện nội dung không phù hợp. Trong trường hợp hệ thống bảo trì hoặc gặp sự cố kỹ thuật, thời gian hiển thị của gói VIP có thể được gia hạn tương ứng.</p>
                                    <!-- Add more paragraphs as needed -->
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="agreeTerms" disabled>
                                    <label class="form-check-label" for="agreeTerms">Tôi đồng ý</label>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                                </div>
                            </div>
                        </div>

                        <p class="text-heading font-weight-500">Lưu ý: <span class="text-danger">Khi thanh toán sẽ được trừ vào số tiền trong ví của quý khách nên hãy đảm bảo số dư ví đủ để thanh toán. Xin cảm ơn!</span></p>
                        <form action="{{ route('client.payment.process') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Thanh toán</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('styleUs')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Checkout - HomeID</title>
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
    <meta name="twitter:title" content="Checkout">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="{{ asset('assets/images/homeid-social-logo.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ asset('checkout-complete-1.html') }}">
    <meta property="og:title" content="Checkout">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/homeid-social.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Hoàn tất thanh toán nhanh chóng và an toàn với TRỌ NHANH - dịch vụ uy tín giúp bạn thanh toán mọi khoản phí thuê trọ dễ dàng.">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">

    <!-- Google Fonts -->
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
    <meta name="twitter:site" content="@TronNhanh">
    <meta name="twitter:creator" content="@TronNhanh">
    <meta name="twitter:title" content="Thanh Toán Dễ Dàng | TRỌ NHANH">
    <meta name="twitter:description"
        content="Thanh toán nhanh chóng và an toàn cho các khoản phí thuê trọ tại TRỌ NHANH. Đảm bảo bảo mật thông tin và giao dịch dễ dàng.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url('/thanh-toan') }}">
    <meta property="og:title" content="Thanh Toán | TRỌ NHANH">
    <meta property="og:description"
        content="Hoàn tất giao dịch thanh toán an toàn và nhanh chóng với TRỌ NHANH. Dễ dàng thanh toán mọi khoản phí thuê trọ với dịch vụ bảo mật cao.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endpush

@push('scriptUs')
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
    <script>
        $(document).ready(function() {
            var termsContent = document.getElementById('termsContent');
            var agreeCheckbox = document.getElementById('agreeTerms');
            var hasScrolledToBottom = false;

            termsContent.addEventListener('scroll', function() {
                if (termsContent.scrollHeight - termsContent.scrollTop <= termsContent.clientHeight + 1) {
                    agreeCheckbox.disabled = false;
                    agreeCheckbox.checked = true;
                    hasScrolledToBottom = true;
                }
            });

            termsContent.addEventListener('scroll', function() {
                if (hasScrolledToBottom && termsContent.scrollTop < termsContent.scrollHeight - termsContent.clientHeight) {
                    agreeCheckbox.checked = true;
                }
            });
        });
    </script>
@endpush
