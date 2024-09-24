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
                            id="description-tab" data-toggle="pill" data-number="1. " href="#description" role="tab"
                            aria-controls="description" aria-selected="true"><span class="number">1. </span>Mô tả</a>
                    </li>

                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="media-tab" data-toggle="pill" data-number="2. " href="#media" role="tab"
                            aria-controls="media" aria-selected="false"><span class="number">2.</span> Hình ảnh</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="location-tab" data-toggle="pill" data-number="3. " href="#location" role="tab"
                            aria-controls="location" aria-selected="false"><span class="number">3. </span>Vị trí</a>
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

                            <!-- Tab 2: Hình ảnh -->
                            <div class="tab-pane tab-pane-parent fade px-0" id="media" role="tabpanel"
                                aria-labelledby="media-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                        id="heading-media">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                data-toggle="collapse" data-number="2." data-target="#media-collapse"
                                                aria-expanded="true" aria-controls="media-collapse">
                                                <span class="number">2.</span> Truyền thông
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="media-collapse" class="collapse collapsible" aria-labelledby="heading-media"
                                        data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                                Tải lên hình ảnh bất động sản của bạn
                                                            </h3>
                                                            <hr>
                                                            <div class="dropzone upload-file text-center py-5"
                                                                id="myDropzone">
                                                                <div class="dz-default dz-message">
                                                                    <span class="upload-icon lh-1 d-inline-block mb-4">
                                                                        <i class="fal fa-cloud-upload-alt"></i>
                                                                    </span>
                                                                    <p class="text-heading fs-22 lh-15 mb-4">
                                                                        Kéo và thả hình ảnh hoặc
                                                                    </p>
                                                                    <button class="btn btn-indigo px-7 mb-2"
                                                                        type="button"
                                                                        onclick="document.getElementById('fileInput').click();">
                                                                        Chọn thư mục
                                                                    </button>
                                                                    <input type="file" hidden id="fileInput" multiple
                                                                        accept="image/jpeg, image/png" name="images[]"
                                                                        onchange="previewImages();">
                                                                </div>
                                                                <!-- Phần tử để hiển thị ảnh đã chọn trong form -->
                                                                <div id="imagePreview" class="text-center mt-4"></div>
                                                                @error('images')
                                                                    <span class="error-message text-danger"
                                                                        id="images-error">{{ $message }}</span>
                                                                @enderror
                                                                @foreach ($errors->get('images.*') as $key => $messages)
                                                                    @foreach ($messages as $message)
                                                                        <span
                                                                            class="error-message text-danger">{{ $message }}</span>
                                                                    @endforeach
                                                                @endforeach
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
                                                <button class="btn btn-lg btn-primary next-button mb-3">Tiếp theo
                                                    <span class="d-inline-block ml-2 fs-16"><i
                                                            class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Tab 3: Vị trí -->
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
    <script src="{{ asset('assets/js/owners/form-map.js') }}"></script>
@endpush
