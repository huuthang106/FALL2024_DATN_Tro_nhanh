@extends('layouts.owner')
@section('titleOwners', 'Chỉnh Sửa Khu Vực | TRỌ NHANH')
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
                    <form action="{{ route('owners.zone-start-update', $zone->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('Put')
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
                                                                    value="{{ old('name', isset($zone) ? $zone->name : '') }}">
                                                                @error('name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <!-- Mô tả -->
                                                            <div class="form-group mb-0">
                                                                <label for="description-01" class="text-heading">Mô
                                                                    tả</label>
                                                                <textarea class="form-control border-0" rows="5" name="description" id="description-01">{{ old('description', isset($zone) ? $zone->description : '') }}</textarea>
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
                                                                    value="{{ old('total_rooms', isset($zone) ? $zone->total_rooms : '') }}">
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
                                                                    <option value='1'
                                                                        {{ $zone->status == '1' ? 'selected' : '' }}>
                                                                        &nbsp;Hoạt động
                                                                    </option>
                                                                    <option
                                                                        value='2'{{ $zone->status == '2' ? 'selected' : '' }}>
                                                                        &nbsp;Chưa hoạt động
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
                                                            <div class="form-group">
                                                                <label for="address" class="text-heading">Địa chỉ</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="address" name="address"
                                                                    value="{{ old('address', isset($zone) ? $zone->address : '') }}">
                                                                @error('address')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <!-- Tỉnh -->
                                                            <div class="form-group">
                                                                <label for="city-province"
                                                                    class="text-heading">Tỉnh</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="city-province" name="province">
                                                                    <option value='0'>&nbsp;Chọn Tỉnh/Thành Phố...
                                                                    </option>
                                                                    <option value='01'
                                                                        {{ $zone->province == '01' ? 'selected' : '' }}>
                                                                        &nbspThành phố Hà Nội</option>
                                                                    <option value='79'
                                                                        {{ $zone->province == '79' ? 'selected' : '' }}>
                                                                        &nbspThành phố Hồ Chí Minh</option>
                                                                    <option value='31'
                                                                        {{ $zone->province == '31' ? 'selected' : '' }}>
                                                                        &nbspThành phố Hải Phòng</option>
                                                                    <option value='48'
                                                                        {{ $zone->province == '48' ? 'selected' : '' }}>
                                                                        &nbspThành phố Đà Nẵng</option>
                                                                    <option value='92'
                                                                        {{ $zone->province == '92' ? 'selected' : '' }}>
                                                                        &nbspThành phố Cần Thơ</option>
                                                                    <option value='02'
                                                                        {{ $zone->province == '02' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Hà Giang</option>
                                                                    <option value='04'
                                                                        {{ $zone->province == '04' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Cao Bằng</option>
                                                                    <option value='06'
                                                                        {{ $zone->province == '06' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Bắc Kạn</option>
                                                                    <option value='08'
                                                                        {{ $zone->province == '08' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Tuyên Quang</option>
                                                                    <option value='10'
                                                                        {{ $zone->province == '10' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Lào Cai</option>
                                                                    <option value='11'
                                                                        {{ $zone->province == '11' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Điện Biên</option>
                                                                    <option value='12'
                                                                        {{ $zone->province == '12' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Lai Châu</option>
                                                                    <option value='14'
                                                                        {{ $zone->province == '14' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Sơn La</option>
                                                                    <option value='15'
                                                                        {{ $zone->province == '15' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Yên Bái</option>
                                                                    <option value='17'
                                                                        {{ $zone->province == '17' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Hoà Bình</option>
                                                                    <option value='19'
                                                                        {{ $zone->province == '19' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Thái Nguyên</option>
                                                                    <option value='20'
                                                                        {{ $zone->province == '20' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Lạng Sơn</option>
                                                                    <option value='22'
                                                                        {{ $zone->province == '22' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Quảng Ninh</option>
                                                                    <option value='24'
                                                                        {{ $zone->province == '24' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Bắc Giang</option>
                                                                    <option value='25'
                                                                        {{ $zone->province == '25' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Phú Thọ</option>
                                                                    <option value='26'
                                                                        {{ $zone->province == '26' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Vĩnh Phúc</option>
                                                                    <option value='27'
                                                                        {{ $zone->province == '27' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Bắc Ninh</option>
                                                                    <option value='30'
                                                                        {{ $zone->province == '30' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Hải Dương</option>
                                                                    <option value='33'
                                                                        {{ $zone->province == '33' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Hưng Yên</option>
                                                                    <option value='34'
                                                                        {{ $zone->province == '34' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Thái Bình</option>
                                                                    <option value='35'
                                                                        {{ $zone->province == '35' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Hà Nam</option>
                                                                    <option value='36'
                                                                        {{ $zone->province == '36' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Nam Định</option>
                                                                    <option value='37'
                                                                        {{ $zone->province == '37' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Ninh Bình</option>
                                                                    <option value='38'
                                                                        {{ $zone->province == '38' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Thanh Hóa</option>
                                                                    <option value='40'
                                                                        {{ $zone->province == '40' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Nghệ An</option>
                                                                    <option value='42'
                                                                        {{ $zone->province == '42' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Hà Tĩnh</option>
                                                                    <option value='44'
                                                                        {{ $zone->province == '44' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Quảng Bình</option>
                                                                    <option value='45'
                                                                        {{ $zone->province == '45' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Quảng Trị</option>
                                                                    <option value='46'
                                                                        {{ $zone->province == '46' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Thừa Thiên Huế</option>
                                                                    <option value='49'
                                                                        {{ $zone->province == '49' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Quảng Nam</option>
                                                                    <option value='51'
                                                                        {{ $zone->province == '51' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Quảng Ngãi</option>
                                                                    <option value='52'
                                                                        {{ $zone->province == '52' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Bình Định</option>
                                                                    <option value='54'
                                                                        {{ $zone->province == '54' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Phú Yên</option>
                                                                    <option value='56'
                                                                        {{ $zone->province == '56' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Khánh Hòa</option>
                                                                    <option value='58'
                                                                        {{ $zone->province == '58' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Ninh Thuận</option>
                                                                    <option value='60'
                                                                        {{ $zone->province == '60' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Bình Thuận</option>
                                                                    <option value='62'
                                                                        {{ $zone->province == '62' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Kon Tum</option>
                                                                    <option value='64'
                                                                        {{ $zone->province == '64' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Gia Lai</option>
                                                                    <option value='66'
                                                                        {{ $zone->province == '66' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Đắk Lắk</option>
                                                                    <option value='67'
                                                                        {{ $zone->province == '67' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Đắk Nông</option>
                                                                    <option value='68'
                                                                        {{ $zone->province == '68' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Lâm Đồng</option>
                                                                    <option value='70'
                                                                        {{ $zone->province == '70' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Bình Phước</option>
                                                                    <option value='72'
                                                                        {{ $zone->province == '72' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Tây Ninh</option>
                                                                    <option value='74'
                                                                        {{ $zone->province == '74' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Bình Dương</option>
                                                                    <option value='75'
                                                                        {{ $zone->province == '75' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Đồng Nai</option>
                                                                    <option value='77'
                                                                        {{ $zone->province == '77' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Bà Rịa - Vũng Tàu</option>
                                                                    <option value='80'
                                                                        {{ $zone->province == '80' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Long An</option>
                                                                    <option value='82'
                                                                        {{ $zone->province == '82' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Tiền Giang</option>
                                                                    <option value='83'
                                                                        {{ $zone->province == '83' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Bến Tre</option>
                                                                    <option value='84'
                                                                        {{ $zone->province == '84' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Trà Vinh</option>
                                                                    <option value='86'
                                                                        {{ $zone->province == '86' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Vĩnh Long</option>
                                                                    <option value='87'
                                                                        {{ $zone->province == '87' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Đồng Tháp</option>
                                                                    <option value='89'
                                                                        {{ $zone->province == '89' ? 'selected' : '' }}>
                                                                        &nbspTỉnh An Giang</option>
                                                                    <option value='91'
                                                                        {{ $zone->province == '91' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Kiên Giang</option>
                                                                    <option value='93'
                                                                        {{ $zone->province == '93' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Hậu Giang</option>
                                                                    <option value='94'
                                                                        {{ $zone->province == '94' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Sóc Trăng</option>
                                                                    <option value='95'
                                                                        {{ $zone->province == '95' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Bạc Liêu</option>
                                                                    <option value='96'
                                                                        {{ $zone->province == '96' ? 'selected' : '' }}>
                                                                        &nbspTỉnh Cà Mau</option>
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

                                                                    <!-- Các tùy chọn khác sẽ được thêm vào qua JavaScript -->
                                                                </select>
                                                                @error('village')
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    {{-- <title>Chỉnh sửa Khu Vực | TRỌ NHANH</title> --}}
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
    {{-- <link rel="icon" href="images/favicon.ico"> --}}
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

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
    <script>
        window.zoneData = {
            provinceId: '{{ $zone->province }}',
            districtId: '{{ $zone->district }}',
            communeId: '{{ $zone->village }}'
        };
    </script>
    {{-- <script>
    const apiUrl = "https://vietnam-administrative-division-json-server-swart.vercel.app";
    const apiEndpointDistrict = apiUrl + '/district/?idProvince=';
    const apiEndpointCommune = apiUrl + '/commune/?idDistrict=';

    async function getDistrict(idProvince) {
        const { data: districtList } = await axios.get(apiEndpointDistrict + idProvince);
        return districtList;
    }

    async function getCommune(idDistrict) {
        const { data: communeList } = await axios.get(apiEndpointCommune + idDistrict);
        return communeList;
    }

    async function loadZoneData(provinceId, districtId, communeId) {
        try {
            // Get districts based on the selected province
            const { data: districts } = await axios.get(apiEndpointDistrict + provinceId);
            let districtOptions = "<option value='0'>&nbsp;Chọn Quận/Huyện...</option>";

            districts.forEach(district => {
                districtOptions += `<option value='${district.idDistrict}' ${district.idDistrict == districtId ? 'selected' : ''}>${district.name}</option>`;
            });
            document.querySelector('#district-town').innerHTML = districtOptions;
            $('#district-town').selectpicker('refresh'); // Đảm bảo dropdown được làm mới
            $('#district-town').selectpicker('val', districtId); // Chọn giá trị nếu có

            // Get communes based on the selected district
            if (districtId) {
                const { data: communes } = await axios.get(apiEndpointCommune + districtId);
                let communeOptions = "<option value='0'>&nbsp;Chọn Phường/Xã...</option>";

                communes.forEach(commune => {
                    communeOptions += `<option value='${commune.idCommune}' ${commune.idCommune == communeId ? 'selected' : ''}>${commune.name}</option>`;
                });
                document.querySelector('#ward-commune').innerHTML = communeOptions;
                $('#ward-commune').selectpicker('refresh'); // Đảm bảo dropdown được làm mới
                $('#ward-commune').selectpicker('val', communeId); // Chọn giá trị nếu có
            } else {
                // Reset commune dropdown if no district is selected
                document.querySelector('#ward-commune').innerHTML = "<option value='0'>&nbsp;Chọn Phường/Xã...</option>";
                $('#ward-commune').selectpicker('refresh'); // Đảm bảo dropdown được làm mới
            }
        } catch (error) {
            console.error('Error loading zone data:', error);
        }
    }

    document.addEventListener('DOMContentLoaded', async () => {
        // Replace with your actual values from server-side rendering
        const provinceId = '{{ $zone->province }}';
        const districtId = '{{ $zone->district }}';
        const communeId = '{{ $zone->village }}';

        // Load initial data for province, district, and commune
        if (provinceId) {
            await loadZoneData(provinceId, districtId, communeId);
        }
    });

    document.querySelector('#city-province').addEventListener('change', async () => {
        // Get the selected province ID
        const idProvince = document.querySelector('#city-province').value;

        // Clear commune options
        let outputCommune = "<option value='0'>&nbsp;Chọn Phường/Xã...</option>";
        document.querySelector('#ward-commune').innerHTML = outputCommune;
        $('#ward-commune').selectpicker('refresh');

        // Get districts based on the selected province
        const districtList = await getDistrict(idProvince) || [];
        let outputDistrict = "<option value='0'>&nbsp;Chọn Quận/Huyện...</option>";
        districtList.forEach(district => {
            outputDistrict += `<option value='${district.idDistrict}'>${district.name}</option>`;
        });
        document.querySelector('#district-town').innerHTML = outputDistrict;
        $('#district-town').selectpicker('refresh');

        // Reset commune selection
        $('#ward-commune').selectpicker('val', '0');
    });

    document.querySelector('#district-town').addEventListener('change', async () => {
        // Get the selected district ID
        const idDistrict = document.querySelector('#district-town').value;

        // Get communes based on the selected district
        const communeList = await getCommune(idDistrict) || [];
        let outputCommune = "<option value='0'>&nbsp;Chọn Phường/Xã...</option>";
        communeList.forEach(commune => {
            outputCommune += `<option value='${commune.idCommune}'>${commune.name}</option>`;
        });
        document.querySelector('#ward-commune').innerHTML = outputCommune;
        $('#ward-commune').selectpicker('refresh');
    });
</script> --}}


    <script src="{{ asset('assets/js/theme.js') }}"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-ggmap-nht.js') }}"></script>
    <script src="{{ asset('assets/js/api-update-zone-nht.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        var roomData = @json($zone);
    </script>
    <script src="{{ asset('assets/js/openstreet-map-edit-form.js') }}"></script>

@endpush
