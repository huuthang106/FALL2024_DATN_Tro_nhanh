@extends('layouts.owner')
@section('titleOwners', 'Người Đưa Tin | TRỌ NHANH')
@section('contentOwners')
    @if ($isInRegistrationList)
        <!-- Nếu người dùng đã tồn tại trong danh sách đăng ký -->
        <div class="text-center my-5">
            <h2 class="text-heading fs-22 lh-15 mb-3">Cảm ơn bạn!</h2>
            <p class="mb-4 text-muted">Yêu cầu xác nhận của bạn đã được gửi đi. Chúng tôi sẽ xem xét và liên hệ với bạn sớm
                nhất có thể.</p>
        </div>
    @elseif($isRegistered)
        <!-- Nếu người dùng đã đăng ký -->
        <div class="text-center my-5">
            <h2 class="text-heading fs-22 lh-15 mb-3">Đăng ký chủ trọ</h2>
            <p class="mb-4 text-muted">Để trở thành chủ trọ chính thức, vui lòng gửi yêu cầu xác nhận dưới đây. Chúng tôi sẽ
                xem xét và liên hệ với bạn sớm nhất.</p>

            <!-- Form gửi yêu cầu xác nhận thành viên -->
            <form action="{{ route('owners.gui-yeu-cau') }}" method="POST" class="mx-auto" style="max-width: 600px;">
                @csrf

                <!-- Hiển thị thông tin từ bảng identity -->
                <div class="form-group mb-4">
                    <label for="name" class="text-left w-100 font-weight-bold">Tên</label>
                    <input type="text" id="name" name="name"
                        class="form-control rounded-lg border-gray-300 shadow-sm" value="{{ $identity->name }}" readonly>
                </div>

                <div class="form-group mb-4">
                    <label for="identification_number" class="text-left w-100 font-weight-bold">Số CMND/CCCD</label>
                    <input type="text" id="identification_number" name="identification_number"
                        class="form-control rounded-lg border-gray-300 shadow-sm"
                        value="{{ $identity->identification_number }}" readonly>
                </div>

                <div class="form-group mb-4">
                    <label for="gender" class="text-left w-100 font-weight-bold">Giới tính</label>
                    <input type="text" id="gender" name="gender"
                        class="form-control rounded-lg border-gray-300 shadow-sm" value="{{ $identity->gender }}" readonly>
                </div>

                <input type="hidden" name="user_id" value="{{ $identity->user_id }}">

                <!-- Lý do yêu cầu -->
                <div class="form-group mb-4">
                    <label for="reason" class="text-left w-100 font-weight-bold">Lý do yêu cầu trở thành chủ trọ</label>
                    <textarea id="reason" name="reason" class="form-control rounded-lg border-gray-300 shadow-sm" rows="5"
                        placeholder="Vui lòng nhập lý do bạn muốn trở thành chủ trọ..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-lg px-4 py-2">Gửi Yêu Cầu</button>
            </form>
        </div>
    @else
        <div class="text-center my-5">
            <h2 class="text-heading fs-22 lh-15 mb-3">Đăng ký chủ trọ</h2>
            <p class="mb-4 text-muted">Bạn cần phải cập nhật thông tin cá nhân của mình trước khi đăng ký.</p>

            <a href="{{ route('owners.profile.resigter-ekyc') }}" type="submit"
                class="btn btn-primary btn-lg px-4 py-2">Đến trang đăng ký eKYC</a>
        </div>
    @endif



@endsection
@push('styleOwners')
    {{-- <meta charset="utf-8">
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
    <link rel="stylesheet" href="{{ asset('assets/vendors/dataTables/jquery.dataTables.min.css') }}">

    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Favicons -->
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
    <link rel="stylesheet" href="{{ asset('assets/css/cccd.css') }}"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Trang Người Đưa Tin trên TRỌ NHANH cung cấp thông tin và danh sách các người đưa tin. Khám phá các bài viết, thông tin cập nhật và liên hệ với các người đưa tin.">
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
    <link rel="stylesheet" href="{{ asset('assets/css/cccd.css') }}">
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/images/tro-moi.png') }}" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TroNhanh">
    <meta name="twitter:creator" content="@TroNhanh">
    <meta name="twitter:title" content="Người Đưa Tin - TRỌ NHANH">
    <meta name="twitter:description"
        content="Khám phá các bài viết, thông tin cập nhật và liên hệ với các người đưa tin trên trang Người Đưa Tin của TRỌ NHANH.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Người Đưa Tin - TRỌ NHANH">
    <meta property="og:description"
        content="Khám phá các bài viết, thông tin cập nhật và liên hệ với các người đưa tin trên trang Người Đưa Tin của TRỌ NHANH.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script src="{{ asset('assets/js/load-file.js') }}"></script>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>
    <script src="{{ asset('assets/js/alert-update-user.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-update-zone-nht.js') }}"></script>
    <script src="{{ asset('assets/js/callApi.js') }}"></script>
@endpush
