@extends('layouts.owner')
@section('titleOwners', 'Thông Tin Tài Khoản | TRỌ NHANH')
@section('contentOwners')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
            <div class="mb-6 d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 text-heading fs-22 lh-15">THÔNG TIN TÀI KHOẢN
                    </h2>
                    <p class="mb-1">Dịch vụ khách hàng rất quan trọng, do đó, khách hàng phải chịu trách nhiệm. Cần có hy
                        vọng
                    </p>
                </div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#withdrawModal">Rút tiền</button>



                <!-- Modal -->
                <div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title font-weight-bold fs-2" id="withdrawModalLabel">Thông Tin Rút Tiền</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="withdrawForm" action="#" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <p class="fs-7 mb-4">Số dư hiện tại:
                                        <strong>{{ number_format($user->balance, 0, ',', '.') }} VNĐ</strong>
                                    </p>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="bank-name" class="fs-10">Tên Ngân Hàng</label>
                                                <select class="form-control" id="bank-name" name="bank_name" required>
                                                    <!-- Các ngân hàng sẽ được lấy từ API -->
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="account-number" class="fs-10">Số Tài Khoản</label>
                                                <input type="text" class="form-control" id="account-number"
                                                    name="account_number" placeholder="Nhập số tài khoản" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="withdraw-amount" class="fs-10">Số Tiền Cần Rút</label>
                                                <input type="number" class="form-control" id="withdraw-amount"
                                                    name="amount" placeholder="Nhập số tiền"
                                                    value="{{ Auth::user()->balance }}" max="{{ Auth::user()->balance }}"
                                                    required>
                                                <small class="form-text text-muted">Số dư hiện tại:
                                                    {{ number_format(Auth::user()->balance, 0, ',', '.') }} VNĐ</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="withdraw-amount" class="fs-10">Tên Chủ Tài Khoản</label>
                                                <input type="text" class="form-control" id="card_holder_name"
                                                    name="card_holder_name" placeholder="Nhập tên chủ tài khoản" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="withdraw-description" class="fs-10">Nội Dung</label>
                                                <input type="text" class="form-control" id="withdraw-description"
                                                    name="description" value="Rút tiền về tài khoản">
                                                <div class="mt-2" id="custom-description-container"
                                                    style="display: none;">
                                                    <input type="text" class="form-control" id="custom-description"
                                                        name="custom_description" placeholder="Nhập nội dung khác">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-dark mt-3"><strong class="text-danger">Lưu ý:</strong> Ngày hệ thống
                                        chuyển sẽ là cuối
                                        tháng vào ngày 07
                                        tiền sẽ được trừ vào số dư của quý khách.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Xác Nhận Rút Tiền</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('owners.profile.update-profile', $user->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-6">
                    <div class="col-lg-6">
                        <div class="card mb-6">
                            <div class="card-body px-6 pt-6 pb-5">
                                <div class="row">
                                    <div>
                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Ảnh đại diện</h3>
                                        <p>Ảnh đại diện sẽ được sử dụng để xác thực tài khoản của bạn.</p>
                                    </div>
                                    <div class="custom-css col-lg-12">
                                        <!-- Hiển thị ảnh hiện tại hoặc ảnh mặc định nếu không có ảnh -->
                                        <div class="profile-image-container">
                                            <img id="profileImagePreview"
                                                src="{{ $user->image ? asset('assets/images/' . $user->image) : asset('assets/images/agent-25.jpg') }}"
                                                alt="{{ $user->name }}">
                                        </div>
                                        <div class="custom-file  h-auto">
                                            <input type="file" class="custom-file-input" id="customFile"
                                                name="image">
                                            <label class="btn btn-secondary btn-lg btn-block" for="customFile">
                                                <span class="d-inline-block mr-1"><i
                                                        class="fal fa-cloud-upload flex-center"></i></span>Tải lên hình ảnh
                                                hồ
                                                sơ
                                            </label>
                                        </div>
                                        {{-- <p class="mb-0 mt-2">*tối thiểu 500px x 500px</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card mb-6">
                            <div class="card-body px-6 pt-6 pb-5">
                                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Chi tiết người dùng</h3>
                                <p class="card-text">Thông tin cá nhân của bạn.</p>

                                <div class="form-group">
                                    <label for="name" class="text-heading">Tên</label>
                                    <input type="text" class="form-control form-control-lg border-0" id="name"
                                        name="name" title="Tên" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label for="email" class="text-heading">Email</label>
                                    <input type="email" class="form-control form-control-lg border-0" id="email"
                                        name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                <div class="form-group">
                                    <label for="phone" class="text-heading">Số điện thoại</label>
                                    <input type="text" class="form-control form-control-lg border-0" id="phone"
                                        name="phone" title="Số điện thoại" value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address" class="text-heading">Địa chỉ</label>
                                    <input type="text" class="form-control form-control-lg border-0" id="address"
                                        name="address" title="Địa chỉ" value="{{ old('address', $user->address) }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tỉnh -->
                                <div class="form-group">
                                    <label for="city-province" class="text-heading">Tỉnh</label>
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker"
                                        title="Lựa chọn" data-style="btn-lg py-2 h-52" id="city-province"
                                        name="province">
                                        <option value='0'>&nbsp;Chọn Tỉnh/Thành Phố...
                                        </option>
                                        <option value='01' {{ $user->province == '01' ? 'selected' : '' }}>
                                            &nbspThành phố Hà Nội</option>
                                        <option value='79' {{ $user->province == '79' ? 'selected' : '' }}>
                                            &nbspThành phố Hồ Chí Minh</option>
                                        <option value='31' {{ $user->province == '31' ? 'selected' : '' }}>
                                            &nbspThành phố Hải Phòng</option>
                                        <option value='48' {{ $user->province == '48' ? 'selected' : '' }}>
                                            &nbspThành phố Đà Nẵng</option>
                                        <option value='92' {{ $user->province == '92' ? 'selected' : '' }}>
                                            &nbspThành phố Cần Thơ</option>
                                        <option value='02' {{ $user->province == '02' ? 'selected' : '' }}>
                                            &nbspTỉnh Hà Giang</option>
                                        <option value='04' {{ $user->province == '04' ? 'selected' : '' }}>
                                            &nbspTỉnh Cao Bằng</option>
                                        <option value='06' {{ $user->province == '06' ? 'selected' : '' }}>
                                            &nbspTỉnh Bắc Kạn</option>
                                        <option value='08' {{ $user->province == '08' ? 'selected' : '' }}>
                                            &nbspTỉnh Tuyên Quang</option>
                                        <option value='10' {{ $user->province == '10' ? 'selected' : '' }}>
                                            &nbspTỉnh Lào Cai</option>
                                        <option value='11' {{ $user->province == '11' ? 'selected' : '' }}>
                                            &nbspTỉnh Điện Biên</option>
                                        <option value='12' {{ $user->province == '12' ? 'selected' : '' }}>
                                            &nbspTỉnh Lai Châu</option>
                                        <option value='14' {{ $user->province == '14' ? 'selected' : '' }}>
                                            &nbspTỉnh Sơn La</option>
                                        <option value='15' {{ $user->province == '15' ? 'selected' : '' }}>
                                            &nbspTỉnh Yên Bái</option>
                                        <option value='17' {{ $user->province == '17' ? 'selected' : '' }}>
                                            &nbspTỉnh Hoà Bình</option>
                                        <option value='19' {{ $user->province == '19' ? 'selected' : '' }}>
                                            &nbspTỉnh Thái Nguyên</option>
                                        <option value='20' {{ $user->province == '20' ? 'selected' : '' }}>
                                            &nbspTỉnh Lạng Sơn</option>
                                        <option value='22' {{ $user->province == '22' ? 'selected' : '' }}>
                                            &nbspTỉnh Quảng Ninh</option>
                                        <option value='24' {{ $user->province == '24' ? 'selected' : '' }}>
                                            &nbspTỉnh Bắc Giang</option>
                                        <option value='25' {{ $user->province == '25' ? 'selected' : '' }}>
                                            &nbspTỉnh Phú Thọ</option>
                                        <option value='26' {{ $user->province == '26' ? 'selected' : '' }}>
                                            &nbspTỉnh Vĩnh Phúc</option>
                                        <option value='27' {{ $user->province == '27' ? 'selected' : '' }}>
                                            &nbspTỉnh Bắc Ninh</option>
                                        <option value='30' {{ $user->province == '30' ? 'selected' : '' }}>
                                            &nbspTỉnh Hải Dương</option>
                                        <option value='33' {{ $user->province == '33' ? 'selected' : '' }}>
                                            &nbspTỉnh Hưng Yên</option>
                                        <option value='34' {{ $user->province == '34' ? 'selected' : '' }}>
                                            &nbspTỉnh Thái Bình</option>
                                        <option value='35' {{ $user->province == '35' ? 'selected' : '' }}>
                                            &nbspTỉnh Hà Nam</option>
                                        <option value='36' {{ $user->province == '36' ? 'selected' : '' }}>
                                            &nbspTỉnh Nam Định</option>
                                        <option value='37' {{ $user->province == '37' ? 'selected' : '' }}>
                                            &nbspTỉnh Ninh Bình</option>
                                        <option value='38' {{ $user->province == '38' ? 'selected' : '' }}>
                                            &nbspTỉnh Thanh Hóa</option>
                                        <option value='40' {{ $user->province == '40' ? 'selected' : '' }}>
                                            &nbspTỉnh Nghệ An</option>
                                        <option value='42' {{ $user->province == '42' ? 'selected' : '' }}>
                                            &nbspTỉnh Hà Tĩnh</option>
                                        <option value='44' {{ $user->province == '44' ? 'selected' : '' }}>
                                            &nbspTỉnh Quảng Bình</option>
                                        <option value='45' {{ $user->province == '45' ? 'selected' : '' }}>
                                            &nbspTỉnh Quảng Trị</option>
                                        <option value='46' {{ $user->province == '46' ? 'selected' : '' }}>
                                            &nbspTỉnh Thừa Thiên Huế</option>
                                        <option value='49' {{ $user->province == '49' ? 'selected' : '' }}>
                                            &nbspTỉnh Quảng Nam</option>
                                        <option value='51' {{ $user->province == '51' ? 'selected' : '' }}>
                                            &nbspTỉnh Quảng Ngãi</option>
                                        <option value='52' {{ $user->province == '52' ? 'selected' : '' }}>
                                            &nbspTỉnh Bình Định</option>
                                        <option value='54' {{ $user->province == '54' ? 'selected' : '' }}>
                                            &nbspTỉnh Phú Yên</option>
                                        <option value='56' {{ $user->province == '56' ? 'selected' : '' }}>
                                            &nbspTỉnh Khánh Hòa</option>
                                        <option value='58' {{ $user->province == '58' ? 'selected' : '' }}>
                                            &nbspTỉnh Ninh Thuận</option>
                                        <option value='60' {{ $user->province == '60' ? 'selected' : '' }}>
                                            &nbspTỉnh Bình Thuận</option>
                                        <option value='62' {{ $user->province == '62' ? 'selected' : '' }}>
                                            &nbspTỉnh Kon Tum</option>
                                        <option value='64' {{ $user->province == '64' ? 'selected' : '' }}>
                                            &nbspTỉnh Gia Lai</option>
                                        <option value='66' {{ $user->province == '66' ? 'selected' : '' }}>
                                            &nbspTỉnh Đắk Lắk</option>
                                        <option value='67' {{ $user->province == '67' ? 'selected' : '' }}>
                                            &nbspTỉnh Đắk Nông</option>
                                        <option value='68' {{ $user->province == '68' ? 'selected' : '' }}>
                                            &nbspTỉnh Lâm Đồng</option>
                                        <option value='70' {{ $user->province == '70' ? 'selected' : '' }}>
                                            &nbspTỉnh Bình Phước</option>
                                        <option value='72' {{ $user->province == '72' ? 'selected' : '' }}>
                                            &nbspTỉnh Tây Ninh</option>
                                        <option value='74' {{ $user->province == '74' ? 'selected' : '' }}>
                                            &nbspTỉnh Bình Dương</option>
                                        <option value='75' {{ $user->province == '75' ? 'selected' : '' }}>
                                            &nbspTỉnh Đồng Nai</option>
                                        <option value='77' {{ $user->province == '77' ? 'selected' : '' }}>
                                            &nbspTỉnh Bà Rịa - Vũng Tàu</option>
                                        <option value='80' {{ $user->province == '80' ? 'selected' : '' }}>
                                            &nbspTỉnh Long An</option>
                                        <option value='82' {{ $user->province == '82' ? 'selected' : '' }}>
                                            &nbspTỉnh Tiền Giang</option>
                                        <option value='83' {{ $user->province == '83' ? 'selected' : '' }}>
                                            &nbspTỉnh Bến Tre</option>
                                        <option value='84' {{ $user->province == '84' ? 'selected' : '' }}>
                                            &nbspTỉnh Trà Vinh</option>
                                        <option value='86' {{ $user->province == '86' ? 'selected' : '' }}>
                                            &nbspTỉnh Vĩnh Long</option>
                                        <option value='87' {{ $user->province == '87' ? 'selected' : '' }}>
                                            &nbspTỉnh Đồng Tháp</option>
                                        <option value='89' {{ $user->province == '89' ? 'selected' : '' }}>
                                            &nbspTỉnh An Giang</option>
                                        <option value='91' {{ $user->province == '91' ? 'selected' : '' }}>
                                            &nbspTỉnh Kiên Giang</option>
                                        <option value='93' {{ $user->province == '93' ? 'selected' : '' }}>
                                            &nbspTỉnh Hậu Giang</option>
                                        <option value='94' {{ $user->province == '94' ? 'selected' : '' }}>
                                            &nbspTỉnh Sóc Trăng</option>
                                        <option value='95' {{ $user->province == '95' ? 'selected' : '' }}>
                                            &nbspTỉnh Bạc Liêu</option>
                                        <option value='96' {{ $user->province == '96' ? 'selected' : '' }}>
                                            &nbspTỉnh Cà Mau</option>
                                    </select>
                                </div>
                                {{-- huyen --}}
                                <div class="form-group district-town-select">
                                    <label for="district-town" class="text-heading">Huyện</label>
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker"
                                        title="Lựa chọn" data-style="btn-lg py-2 h-52" id="district-town"
                                        name="district">
                                    </select>
                                </div>

                                <!-- Xã -->
                                <div class="form-group ward-commune-select">
                                    <label for="ward-commune" class="text-heading">Xã</label>
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker"
                                        title="Lựa chọn" data-style="btn-lg py-2 h-52" id="ward-commune" name="village">
                                    </select>
                                </div>

                                <div class="d-flex justify-content-end flex-wrap">
                                    {{-- <button class="btn btn-lg btn-danger mb-3" type="button">Xóa tài khoản</button> --}}
                                    <button class="btn btn-lg btn-primary ml-4 mb-3" type="submit">Cập nhật tài
                                        khoản</button>
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
    <link rel="stylesheet" href="{{ asset('assets/css/mh.css') }}"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Quản lý thông tin tài khoản của bạn trên TRỌ NHANH. Cập nhật thông tin cá nhân, xem lịch sử giao dịch và quản lý tài khoản một cách dễ dàng.">
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
    <meta name="twitter:title" content="Thông Tin Tài Khoản - TRỌ NHANH">
    <meta name="twitter:description"
        content="Xem và quản lý thông tin tài khoản của bạn trên TRỌ NHANH. Cập nhật chi tiết cá nhân, theo dõi giao dịch và quản lý tài khoản một cách dễ dàng.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Thông Tin Tài Khoản - TRỌ NHANH">
    <meta property="og:description"
        content="Quản lý thông tin tài khoản cá nhân và lịch sử giao dịch của bạn trên TRỌ NHANH. Đảm bảo tài khoản của bạn luôn được cập nhật mới nhất.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="stylesheet" href="{{ asset('assets/css/mh.css') }}">
    <!-- CSS của Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/payout-api.css') }}">
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
    <script>
        window.zoneData = {
            provinceId: '{{ $user->province }}',
            districtId: '{{ $user->district }}',
            communeId: '{{ $user->village }}'
        };
    </script>
    <script>
        // Lấy danh sách ngân hàng từ API
        async function fetchBanks() {
            try {
                const response = await axios.get('https://api.vietqr.io/v2/banks');
                const banks = response.data.data;

                // Cập nhật danh sách ngân hàng vào select
                const bankSelect = document.getElementById('bank-name');
                banks.forEach(bank => {
                    const option = document.createElement('option');
                    option.value = bank.code; // Hoặc bank.id tùy theo yêu cầu
                    option.textContent = bank.name;
                    bankSelect.appendChild(option);
                });
            } catch (error) {
                console.error('Error fetching banks:', error);
            }
        }

        // Gọi hàm khi modal mở
        $('#withdrawModal').on('show.bs.modal', function() {
            fetchBanks();
        });
    </script>
    <script src="{{ asset('assets/js/payout-api.js') }}"></script>
    <script>
        document.getElementById('withdrawForm').addEventListener('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    // Thêm option mặc định
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = 'Chọn ngân hàng';
                    bankSelect.appendChild(defaultOption);

                    // Thêm các ngân hàng
                    banks.forEach(bank => {
                        const option = document.createElement('option');
                        option.value = bank.name; // Sử dụng tên đầy đủ làm giá trị
                        option.textContent = bank.name;
                        option.dataset.code = bank.code; // Lưu mã ngân hàng vào data attribute
                        bankSelect.appendChild(option);
                    });

                    // Đặt size cho select
                    bankSelect.size = Math.min(5, banks.length + 1);

                    // Thêm sự kiện để đóng select khi chọn
                    bankSelect.addEventListener('change', function() {
                        this.size = 1;
                        this.blur();
                    });

                    // Thêm sự kiện để mở rộng select khi focus
                    bankSelect.addEventListener('focus', function() {
                        this.size = Math.min(5, banks.length + 1);
                    });

                } catch (error) {
                    console.error('Error fetching banks:', error);
                }

                // Gọi hàm khi modal mở
                $('#withdrawModal').on('show.bs.modal', function() {
                    fetchBanks();
                });

                // Xử lý submit form
                document.getElementById('withdrawForm').addEventListener('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    if (formData.get('description') === 'Rút tiền khác') {
                        formData.set('description', formData.get('custom_description'));
                    }

                    // Lấy mã ngân hàng từ data attribute
                    const bankSelect = document.getElementById('bank-name');
                    const selectedOption = bankSelect.options[bankSelect.selectedIndex];
                    formData.set('bank_code', selectedOption.dataset.code);

                    // ... phần còn lại của code xử lý submit ...
                });
            );
    </script>
    
    {{-- <script>
        document.getElementById('withdrawForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            if (formData.get('description') === 'Rút tiền khác') {
                formData.set('description', formData.get('custom_description'));
            }

            fetch('{{ route('owners.request-payout') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: data.message,
                            confirmButtonText: 'Đóng'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Đóng modal hoặc làm mới trang nếu cần
                                $('#withdrawModal').modal('hide');
                                // Có thể thêm code để cập nhật UI ở đây
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi!',
                            text: data.message,
                            confirmButtonText: 'Đóng'
                        });
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!',
                        text: 'Có lỗi xảy ra khi xử lý yêu cầu.',
                        confirmButtonText: 'Đóng'
                    });
                });
        });
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
    <script>
        $('#updateProfileForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    Swal.fire({
                        title: 'Đang xử lý...',
                        text: 'Vui lòng đợi trong giây lát!',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    Swal.close();
                    if (response.success) {
                        Swal.fire({
                            title: 'Thành công!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Lỗi!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.close();
                    let errorMessage = 'Đã xảy ra lỗi khi xử lý yêu cầu.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        title: 'Lỗi!',
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    </script>
   
@endpush
