@extends('layouts.owner')
@section('titleOwners', 'Thêm Khu Trọ | TRỌ NHANH')
@section('contentOwners')

    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15">Thêm khu trọ của bạn
                </h2>

            </div>
            <div class="collapse-tabs new-property-step">
                <ul class="nav nav-pills border py-2 px-3 mb-6 d-none d-md-flex mb-6" role="tablist">
                    <li class="nav-item col">
                        <a class="nav-link active bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="description-tab" data-toggle="pill" data-number="1." href="#description" role="tab"
                            aria-controls="description" aria-selected="true"><span class="number">1.</span>Mô tả</a>
                    </li>

                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="location-tab" data-toggle="pill" data-number="2." href="#location" role="tab"
                            aria-controls="location" aria-selected="false"><span class="number">2.</span>Vị trí</a>
                    </li>

                </ul>
                <div class="tab-content shadow-none p-0">
                    <form action="{{ route('owners.zone-start-post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="collapse-tabs-accordion">
                            <!-- Tab 1: Mô tả -->
                            <div class="tab-pane tab-pane-parent fade show active px-0" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="card bg-transparent border-0">
                                    <div id="description-collapse" class="collapse show collapsible"
                                        aria-labelledby="heading-description" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-lg-10">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Mô tả tài
                                                                sản</h3>
                                                            <p class="card-text mb-5">Lorem ipsum dolor sit amet,
                                                                consectetur adipiscing elit</p>

                                                            <!-- Tiêu đề -->
                                                            <div class="form-group">
                                                                <label for="name" class="text-heading">Tiêu đề<span
                                                                        class="text-muted">(bắt buộc)</span></label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="name" name="name"
                                                                    value="{{ old('name') }}">
                                                                @error('name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <!-- Mô tả -->
                                                            <div class="form-group mb-0">
                                                                <label for="description-01" class="text-heading">Mô
                                                                    tả</label>
                                                                <textarea class="form-control border-0" rows="5" name="description" id="description-01">{{ old('description') }}</textarea>
                                                                @error('description')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>


                                                            <!-- Số phòng -->
                                                            <div class="form-group">
                                                                <label for="total_rooms" class="text-heading">Số phòng<span
                                                                        class="text-muted">(bắt buộc)</span></label>
                                                                <input type="number"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="total_rooms" name="total_rooms"
                                                                    value="{{ old('total_rooms') }}">
                                                                @error('total_rooms')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="status" class="text-heading">Trạng
                                                                    thái</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="status" name="status">
                                                                    <option value='1'>&nbsp;Hoạt động
                                                                    </option>
                                                                    <option value='2'>&nbsp;Chưa hoạt động
                                                                    </option>
                                                                </select>
                                                                @error('status')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button class="btn btn-lg btn-primary next-button">Tiếp theo
                                                    <span class="d-inline-block ml-2 fs-16"><i
                                                            class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 2: Vị trí -->
                            <div class="tab-pane tab-pane-parent fade px-0" id="location" role="tabpanel"
                                aria-labelledby="location-tab">
                                <div class="card bg-transparent border-0">
                                    <div id="location-collapse" class="collapse collapsible"
                                        aria-labelledby="heading-location" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Vị trí
                                                                niêm
                                                                yết</h3>
                                                            <p class="card-text mb-5">Lorem ipsum dolor sit amet,
                                                                consectetur adipiscing elit</p>

                                                            <!-- Địa chỉ -->


                                                            <!-- Tỉnh -->
                                                            <div class="form-group">
                                                                <label for="city-province"
                                                                    class="text-heading">Tỉnh</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="city-province" name="province">
                                                                    <option value='0'>Chọn Tỉnh/Thành Phố...</option>
                                                                    <option value='01'>Thành phố Hà Nội</option>
                                                                    <option value='79'>Thành phố Hồ Chí Minh</option>
                                                                    <option value='31'>Thành phố Hải Phòng</option>
                                                                    <option value='48'>Thành phố Đà Nẵng</option>
                                                                    <option value='92'>Thành phố Cần Thơ</option>
                                                                    <option value='02'>Tỉnh Hà Giang</option>
                                                                    <option value='04'>Tỉnh Cao Bằng</option>
                                                                    <option value='06'>Tỉnh Bắc Kạn</option>
                                                                    <option value='08'>Tỉnh Tuyên Quang</option>
                                                                    <option value='10'>Tỉnh Lào Cai</option>
                                                                    <option value='11'>Tỉnh Điện Biên</option>
                                                                    <option value='12'>Tỉnh Lai Châu</option>
                                                                    <option value='14'>Tỉnh Sơn La</option>
                                                                    <option value='15'>Tỉnh Yên Bái</option>
                                                                    <option value='17'>Tỉnh Hoà Bình</option>
                                                                    <option value='19'>Tỉnh Thái Nguyên</option>
                                                                    <option value='20'>Tỉnh Lạng Sơn</option>
                                                                    <option value='22'>Tỉnh Quảng Ninh</option>
                                                                    <option value='24'>Tỉnh Bắc Giang</option>
                                                                    <option value='25'>Tỉnh Phú Thọ</option>
                                                                    <option value='26'>Tỉnh Vĩnh Phúc</option>
                                                                    <option value='27'>Tỉnh Bắc Ninh</option>
                                                                    <option value='30'>Tỉnh Hải Dương</option>
                                                                    <option value='33'>Tỉnh Hưng Yên</option>
                                                                    <option value='34'>Tỉnh Thái Bình</option>
                                                                    <option value='35'>Tỉnh Hà Nam</option>
                                                                    <option value='36'>Tỉnh Nam Định</option>
                                                                    <option value='37'>Tỉnh Ninh Bình</option>
                                                                    <option value='38'>Tỉnh Thanh Hóa</option>
                                                                    <option value='40'>Tỉnh Nghệ An</option>
                                                                    <option value='42'>Tỉnh Hà Tĩnh</option>
                                                                    <option value='44'>Tỉnh Quảng Bình</option>
                                                                    <option value='45'>Tỉnh Quảng Trị</option>
                                                                    <option value='46'>Tỉnh Thừa Thiên Huế</option>
                                                                    <option value='49'>Tỉnh Quảng Nam</option>
                                                                    <option value='51'>Tỉnh Quảng Ngãi</option>
                                                                    <option value='52'>Tỉnh Bình Định</option>
                                                                    <option value='54'>Tỉnh Phú Yên</option>
                                                                    <option value='56'>Tỉnh Khánh Hòa</option>
                                                                    <option value='58'>Tỉnh Ninh Thuận</option>
                                                                    <option value='60'>Tỉnh Bình Thuận</option>
                                                                    <option value='62'>Tỉnh Kon Tum</option>
                                                                    <option value='64'>Tỉnh Gia Lai</option>
                                                                    <option value='66'>Tỉnh Đắk Lắk</option>
                                                                    <option value='67'>Tỉnh Đắk Nông</option>
                                                                    <option value='68'>Tỉnh Lâm Đồng</option>
                                                                    <option value='70'>Tỉnh Bình Phước</option>
                                                                    <option value='72'>Tỉnh Tây Ninh</option>
                                                                    <option value='74'>Tỉnh Bình Dương</option>
                                                                    <option value='75'>Tỉnh Đồng Nai</option>
                                                                    <option value='77'>Tỉnh Bà Rịa - Vũng Tàu</option>
                                                                    <option value='80'>Tỉnh Long An</option>
                                                                    <option value='82'>Tỉnh Tiền Giang</option>
                                                                    <option value='83'>Tỉnh Bến Tre</option>
                                                                    <option value='84'>Tỉnh Trà Vinh</option>
                                                                    <option value='86'>Tỉnh Vĩnh Long</option>
                                                                    <option value='87'>Tỉnh Đồng Tháp</option>
                                                                    <option value='89'>Tỉnh An Giang</option>
                                                                    <option value='91'>Tỉnh Kiên Giang</option>
                                                                    <option value='93'>Tỉnh Hậu Giang</option>
                                                                    <option value='94'>Tỉnh Sóc Trăng</option>
                                                                    <option value='95'>Tỉnh Bạc Liêu</option>
                                                                    <option value='96'>Tỉnh Cà Mau</option>
                                                                </select>
                                                                @error('province')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            {{-- huyen --}}
                                                            <div class="form-group district-town-select">
                                                                <label for="district-town"
                                                                    class="text-heading">Huyện</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="district-town" name="district">
                                                                    <option value='0'>&nbsp;Chọn Quận/Huyện...
                                                                    </option>
                                                                    <!-- Các tùy chọn khác sẽ được thêm vào qua JavaScript -->
                                                                </select>
                                                                @error('district')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <!-- Xã -->
                                                            <div class="form-group ward-commune-select">
                                                                <label for="ward-commune" class="text-heading">Xã</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="ward-commune" name="village">
                                                                    <option value='0'>&nbsp;Chọn Phường/Xã...</option>
                                                                    <!-- Các tùy chọn khác sẽ được thêm vào qua JavaScript -->
                                                                </select>
                                                                @error('village')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address" class="text-heading">Địa chỉ</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="address" name="address"
                                                                    value="{{ old('address') }}">
                                                                @error('address')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Đặt ghim
                                                                niêm yết trên bản đồ</h3>
                                                            <p class="card-text mb-5">Lorem ipsum dolor sit amet,
                                                                consectetur adipiscing elit</p>
                                                            <!-- Bản đồ -->
                                                            <div id="map" class="mb-6" style="height: 292px;">
                                                            </div>

                                                            <!-- Vĩ độ và Kinh độ -->
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="latitude" class="text-heading">Vĩ
                                                                            độ</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="latitude" name="latitude"
                                                                            value="{{ old('latitude') }}">
                                                                        @error('latitude')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="longitude" class="text-heading">Kinh
                                                                            độ</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="longitude" name="longitude"
                                                                            value="{{ old('longitude') }}">
                                                                        @error('longitude')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="#"
                                                    class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i
                                                            class="fal fa-long-arrow-left"></i></span>Phía trước
                                                </a>
                                                <button class="btn btn-lg btn-primary mb-3" type="submit">Gửi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
    </div>
    </div>
    </div>


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
    <meta name="twitter:title" content="Home 01">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="images/homeid-social-logo.png">
    <!-- Facebook -->
    <meta property="og:url" content="home-01.html">
    <meta property="og:title" content="Home 01">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/homeid-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" /> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Trang 'Thêm Khu Trọ' cho phép bạn dễ dàng thêm và quản lý các khu trọ trên hệ thống của bạn. Cung cấp thông tin chi tiết về khu trọ, bao gồm địa chỉ, hình ảnh và các tiện ích đi kèm.">
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/images/tro-moi.png') }}" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TroNhanh">
    <meta name="twitter:creator" content="@TroNhanh">
    <meta name="twitter:title" content="Thêm Khu Trọ - TRỌ NHANH">
    <meta name="twitter:description"
        content="Trang 'Thêm Khu Trọ' giúp bạn dễ dàng thêm và quản lý các khu trọ, cung cấp thông tin chi tiết về địa chỉ, hình ảnh và tiện ích.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Thêm Khu Trọ - TRỌ NHANH">
    <meta property="og:description"
        content="Trang 'Thêm Khu Trọ' giúp bạn dễ dàng thêm và quản lý các khu trọ, cung cấp thông tin chi tiết về địa chỉ, hình ảnh và tiện ích.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endpush
@push('scriptOwners')
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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-ggmap-nht.js') }}"></script>
    <script src="{{ asset('assets/js/api-country-vn-nht.js') }}"></script>
    <script src="{{ asset('assets/js/alert/room-owners-alert.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        var map;
        var currentPosition = [10.0354, 105.7553]; // Vị trí khởi tạo
        var marker; // Biến để lưu trữ marker

        function initMap() {
            // Khởi tạo bản đồ với vị trí mặc định
            map = L.map('map').setView(currentPosition, 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Tạo marker và cho phép kéo thả
            marker = L.marker(currentPosition, {
                draggable: true
            }).addTo(map);

            // Cập nhật giá trị vào các trường input ngay khi khởi tạo
            document.getElementById('latitude').value = currentPosition[0]; // Cập nhật vĩ độ
            document.getElementById('longitude').value = currentPosition[1]; // Cập nhật kinh độ

            // Lắng nghe sự kiện khi marker được kéo thả
            marker.on('dragend', function(event) {
                var position = marker.getLatLng(); // Lấy vị trí mới
                console.log("Kinh độ: " + position.lng + ", Vĩ độ: " + position.lat); // In ra kinh độ và vĩ độ

                // Cập nhật giá trị vào các trường input
                document.getElementById('latitude').value = position.lat; // Cập nhật vĩ độ
                document.getElementById('longitude').value = position.lng; // Cập nhật kinh độ
            });

            // Thêm nút quay lại vị trí hiện tại
            var returnButton = L.control({
                position: 'topright'
            });
            returnButton.onAdd = function() {
                var button = L.DomUtil.create('button', 'return-button');
                button.innerHTML = '<i class="fas fa-location-arrow"></i>'; // Sử dụng biểu tượng Font Awesome
                button.style.backgroundColor = 'white'; // Tùy chỉnh màu nền
                button.style.border = 'none'; // Bỏ viền
                button.style.borderRadius = '50%'; // Bo góc để tạo hình tròn
                button.style.width = '40px'; // Đặt chiều rộng
                button.style.height = '40px'; // Đặt chiều cao
                button.style.display = 'flex'; // Sử dụng flexbox để căn giữa
                button.style.alignItems = 'center'; // Căn giữa theo chiều dọc
                button.style.justifyContent = 'center'; // Căn giữa theo chiều ngang
                button.onclick = function(e) {
                    e.preventDefault(); // Ngăn chặn hành động mặc định
                    map.setView(currentPosition, 13); // Quay lại vị trí hiện tại
                    marker.setLatLng(currentPosition); // Đặt lại vị trí của marker
                };
                return button;
            };
            returnButton.addTo(map);

            // Cập nhật kích thước bản đồ ngay sau khi khởi tạo
            updateMapSize();

            // Kiểm tra xem trình duyệt có hỗ trợ Geolocation không
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Lấy vị trí hiện tại từ GPS
                    currentPosition = [position.coords.latitude, position.coords.longitude];
                    map.setView(currentPosition, 13); // Cập nhật vị trí bản đồ
                    marker.setLatLng(currentPosition); // Cập nhật vị trí của marker

                    // Cập nhật giá trị vào các trường input
                    document.getElementById('latitude').value = currentPosition[0]; // Cập nhật vĩ độ
                    document.getElementById('longitude').value = currentPosition[1]; // Cập nhật kinh độ
                }, function() {
                    // Xử lý lỗi nếu không thể lấy vị trí
                    showErrorMessage("Không thể lấy vị trí hiện tại. Vui lòng bật vị trí trên thiết bị của bạn.");
                });
            } else {
                // Trình duyệt không hỗ trợ Geolocation
                showErrorMessage(
                    "Trình duyệt của bạn không hỗ trợ Geolocation. Vui lòng bật vị trí trên thiết bị của bạn.");
            }
        }

        function updateMapSize() {
            if (map) {
                map.invalidateSize(); // Cập nhật kích thước của bản đồ
            }
        }

        // Hàm để tìm kiếm tọa độ từ tên tỉnh, huyện hoặc xã
        function geocodeLocation(location) {
            var apiUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(location)}`;

            return fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        return {
                            lat: data[0].lat,
                            lng: data[0].lon
                        };
                    } else {
                        throw new Error('Không tìm thấy vị trí.');
                    }
                });
        }

        // Lắng nghe sự kiện thay đổi cho dropdown tỉnh
        document.getElementById('city-province').addEventListener('change', function() {
            var selectedProvince = this.options[this.selectedIndex].text; // Lấy tên tỉnh
            geocodeLocation(selectedProvince)
                .then(coords => {
                    map.setView([coords.lat, coords.lng], 13); // Di chuyển bản đồ đến tỉnh đã chọn
                    marker.setLatLng([coords.lat, coords.lng]); // Đặt lại vị trí của marker
                    document.getElementById('latitude').value = coords.lat; // Cập nhật vĩ độ
                    document.getElementById('longitude').value = coords.lng; // Cập nhật kinh độ
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Không thể tìm thấy vị trí cho tỉnh đã chọn.');
                });
        });

        // Lắng nghe sự kiện thay đổi cho dropdown huyện
        document.getElementById('district-town').addEventListener('change', function() {
            var selectedDistrict = this.options[this.selectedIndex].text; // Lấy tên huyện
            geocodeLocation(selectedDistrict)
                .then(coords => {
                    map.setView([coords.lat, coords.lng], 13); // Di chuyển bản đồ đến huyện đã chọn
                    marker.setLatLng([coords.lat, coords.lng]); // Đặt lại vị trí của marker
                    document.getElementById('latitude').value = coords.lat; // Cập nhật vĩ độ
                    document.getElementById('longitude').value = coords.lng; // Cập nhật kinh độ
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Không thể tìm thấy vị trí cho huyện đã chọn.');
                });
        });

        // Lắng nghe sự kiện thay đổi cho dropdown xã
        document.getElementById('ward-commune').addEventListener('change', function() {
            var selectedWard = this.options[this.selectedIndex].text; // Lấy tên xã
            geocodeLocation(selectedWard)
                .then(coords => {
                    map.setView([coords.lat, coords.lng], 13); // Di chuyển bản đồ đến xã đã chọn
                    marker.setLatLng([coords.lat, coords.lng]); // Đặt lại vị trí của marker
                    document.getElementById('latitude').value = coords.lat; // Cập nhật vĩ độ
                    document.getElementById('longitude').value = coords.lng; // Cập nhật kinh độ
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Không thể tìm thấy vị trí cho xã đã chọn.');
                });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Khởi tạo bản đồ
            initMap();

            // Kiểm tra xem có thông báo thành công trong session không
            if (window.successMessage) {
                showSuccessMessage(window.successMessage); // Gọi hàm để hiển thị thông báo
            }
        });

        // Hàm hiển thị thông báo thành công
        function showSuccessMessage(message) {
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: message,
                showConfirmButton: true
            });
        }

        // Hàm hiển thị thông báo lỗi
        function showErrorMessage(message) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: message,
                showConfirmButton: true
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Khi tab location-tab được kích hoạt, cập nhật kích thước bản đồ
            var locationTab = document.querySelector('#location-tab');
            if (locationTab) {
                locationTab.addEventListener('click', function(e) {
                    setTimeout(updateMapSize, 100); // Cập nhật kích thước bản đồ khi tab được nhấn
                });
            }
            // Gọi updateMapSize() ngay sau khi khởi tạo bản đồ
            updateMapSize(); // Đảm bảo bản đồ hiển thị đúng ngay khi tải trang
        });
    </script>
@endpush
