@extends('layouts.owner')
@section('titleOwners', 'Thêm Phòng Trọ | TRỌ NHANH')
@section('contentOwners')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15">Thêm phòng trọ
                </h2>
            </div>
            @if ($userStatus == 3)
                <!-- Nếu trạng thái của người dùng là 3 (tài khoản bị khóa) -->
                <div class="text-center" role="alert">
                    <h4 class="text-danger">Tài khoản của bạn đang bị khóa. Vui lòng quay lại sau.</h4>
                </div>
            @else
                <div class="collapse-tabs new-property-step">
                    <ul class="nav nav-pills border py-2 px-3 mb-6 d-none d-md-flex mb-6" role="tablist">
                        <li class="nav-item col">
                            <a class="nav-link active bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                                id="description-tab" data-toggle="pill" data-number="1." href="#description" role="tab"
                                aria-controls="description" aria-selected="true"><span class="number">1.</span> Mô tả</a>
                        </li>
                        <li class="nav-item col">
                            <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                                id="media-tab" data-toggle="pill" data-number="2." href="#media" role="tab"
                                aria-controls="media" aria-selected="false"><span class="number">2.</span> Truyền thông</a>
                        </li>

                        {{-- <li class="nav-item col">
                            <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                                id="amenities-tab" data-toggle="pill" data-number="4." href="#amenities" role="tab"
                                aria-controls="amenities" aria-selected="false"><span class="number">4.</span> Tiện ích</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content shadow-none p-0">
                        <form enctype="multipart/form-data" action="{{route('owners.add-room-for-zone', $zone->id)}}" method="POST">
                            @csrf
                            <div id="collapse-tabs-accordion">
                                <div class="tab-pane tab-pane-parent fade show active px-0" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <div class="card bg-transparent border-0">
                                        <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                            id="heading-description">
                                            <h5 class="mb-0">
                                                <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                    data-toggle="collapse" data-number="1."
                                                    data-target="#description-collapse" aria-expanded="true"
                                                    aria-controls="description-collapse">
                                                    <span class="number">1.</span> Mô tả
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="description-collapse" class="collapse show collapsible"
                                            aria-labelledby="heading-description" data-parent="#collapse-tabs-accordion">
                                            <div class="card-body py-4 py-md-0 px-0">
                                                <div class="row">
                                                    <!-- Cột bên trái -->
                                                    <div class="col-lg-6">
                                                        <div class="card mb-6">
                                                            <div class="card-body p-6">
                                                                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Thông
                                                                    tin
                                                                    trọ</h3>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="title" class="text-heading">Tiêu đề <span
                                                                            class="text-muted">(Bắt buộc)</span></label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg border-0"
                                                                        id="title" name="title"
                                                                        value="{{ old('title') }}">
                                                                    @error('title')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group mb-0">
                                                                    <label for="description" class="text-heading">Mô
                                                                        tả <span class="text-muted">(Bắt
                                                                            buộc)</span></label>
                                                                    <textarea class="form-control border-0" rows="5" name="description" id="description"> {{ old('description') }}</textarea>
                                                                    @error('description')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                {{-- <div class="form-group mt-1">
                                                                    <label for="acreages" class="text-heading">Diện tích
                                                                        m² <span class="text-muted">(Bắt
                                                                            buộc)</span></label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg border-0"
                                                                        id="acreage" name="acreage"
                                                                        value="{{ old('acreage') }}">
                                                                    @error('acreage')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div> --}}
                                                                <div class="form-group mt-1">
                                                                    <label for="quantity" class="text-heading">Số lượng
                                                                        phòng <span class="text-muted">(Bắt
                                                                            buộc)</span><span class="text-muted">(Ví dụ: 1,
                                                                            2,...)</span></label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg border-0"
                                                                        id="quantity" name="quantity"
                                                                        value="{{ old('quantity') }}">
                                                                    @error('quantity')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Cột bên phải -->
                                                    <div class="col-lg-6">
                                                        <div class="card mb-6">
                                                            <div class="card-body p-6">
                                                                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Giá và
                                                                    Thông tin liên hệ</h3>
                                                                <hr>
                                                                <div class="form-row mx-n2">
                                                                    <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                        <div class="form-group">
                                                                            <label for="price" class="text-heading">Giá
                                                                                bằng VND <span class="text-muted">(Bắt
                                                                                    buộc)</span></label>
                                                                            <input type="number"
                                                                                class="form-control form-control-lg border-0"
                                                                                id="price" name="price"
                                                                                value="{{ old('price') }}">
                                                                            @error('price')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                        <div class="form-group">
                                                                            <label for="phone" class="text-heading">Số
                                                                                điện
                                                                                thoại <span class="text-muted">(Bắt
                                                                                    buộc)</span></label>
                                                                            <input type="text" name="phone"
                                                                                class="form-control form-control-lg border-0"
                                                                                id="phone"
                                                                                value="{{ old('phone') }}">
                                                                            @error('phone')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <!-- Trường ẩn để lưu ID người dùng -->
                                                                <input type="hidden" id="user_id" name="user_id"
                                                                    value="{{ Auth::check() ? Auth::user()->id : '' }}">
                                                                <input type="hidden"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="name" name="name"
                                                                    value="{{ Auth::check() ? Auth::user()->name : 'Chưa có' }}"
                                                                    readonly>
                                                                @error('name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="hidden"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="email" name="email"
                                                                    value="{{ Auth::check() ? Auth::user()->email : 'Chưa có' }}">
                                                                @error('email')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button class="btn btn-lg btn-primary next-button">Tiếp theo <span
                                                            class="d-inline-block ml-2 fs-16">
                                                            <i class="fal fa-long-arrow-right"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <div id="media-collapse" class="collapse collapsible"
                                            aria-labelledby="heading-media" data-parent="#collapse-tabs-accordion">
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
                                                                        <input type="file" hidden id="fileInput"
                                                                             accept="image/jpeg, image/png"
                                                                            name="image" onchange="previewImages();">
                                                                        <p>Chọn 1  ảnh</p>
                                                                    </div>
                                                                    @if ($errors->has('image'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('image') }}
                                                                        </div>
                                                                    @endif
                                                                    {{-- @foreach ($errors->get('images.*') as $messages)
                                                                        @foreach ($messages as $message)
                                                                            <div class="text-danger">{{ $message }}
                                                                            </div>
                                                                        @endforeach
                                                                    @endforeach --}}
                                                                </div>
                                                                <!-- Phần tử để hiển thị ảnh đã chọn trong form -->
                                                                <div id="imagePreview" class="text-center mt-4"></div>
                                                                <!-- Ẩn View -->
                                                                <input type="hidden" class="form-control" id="view"
                                                                    name="view" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-6">
                                                            <div class="card mb-6">
                                                                <div class="card-body p-6">
                                                                    <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                                        Trạng thái phòng
                                                                    </h3>
                                                                    <hr>
                                                                    <div class="form-row mx-n2">
                                                                        <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                            <div class="form-group mb-md-0">
                                                                                <label for="status"
                                                                                    class="text-heading">Trạng
                                                                                    thái</label>
                                                                                <select
                                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                                    data-style="btn-lg py-2 h-52"
                                                                                    id="status" name="status">
                                                                                    <option value="1">Đang duyệt
                                                                                    </option>
                                                                                    <option value="2">Đang hoạt động
                                                                                    </option>
                                                                                </select>
                                                                                @error('status')
                                                                                <div class="text-danger">{{ $message }}
                                                                                                                                                                </div>
                                                                            @enderror
                                                                                                                                                    </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <a href="#"
                                                        class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                        <span class="d-inline-block text-primary mr-2 fs-16"><i
                                                                class="fal fa-long-arrow-left"></i></span>Phía trước
                                                    </a>
                                                    <button type="submit" class="btn btn-lg btn-primary  mb-3">Gửi
                                                        <span class="d-inline-block ml-2 fs-16"><i
                                                                class="fal fa-long-arrow-right"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            @endif
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
        content="Thêm và quản lý các phòng trọ trên hệ thống của bạn. Trang 'Thêm Phòng Trọ' cho phép bạn nhập thông tin chi tiết về phòng, bao gồm hình ảnh, giá thuê và các tiện ích.">
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
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TroNhanh">
    <meta name="twitter:creator" content="@TroNhanh">
    <meta name="twitter:title" content="Thêm Phòng Trọ - TRỌ NHANH">
    <meta name="twitter:description"
        content="Thêm và quản lý các phòng trọ trên hệ thống của bạn. Trang 'Thêm Phòng Trọ' cho phép bạn nhập thông tin chi tiết về phòng, bao gồm hình ảnh, giá thuê và các tiện ích.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Thêm Phòng Trọ - TRỌ NHANH">
    <meta property="og:description"
        content="Thêm và quản lý các phòng trọ trên hệ thống của bạn. Trang 'Thêm Phòng Trọ' giúp bạn dễ dàng nhập thông tin phòng, hình ảnh, giá thuê và các tiện ích.">
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
    {{-- <script src="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.js') }}"></script> --}}
    <script src="{{ asset('assets/vendors/dataTables/jquery.dataTables.min.js') }}"></script>
    <!-- Theme scripts -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    {{-- Show - Alert --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    {{-- Link Axios  --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/province/api-province.js') }}"></script> --}}
    {{-- Map OpenStreetMap + Laft --}}
    {{-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="{{ asset('assets/js/map/map.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- <script src="{{ asset('assets/js/api-ggmap-nht.js') }}"></script> --}}
    <script src="{{ asset('assets/js/api-country-vn-nht.js') }}"></script>
    <script src="{{ asset('assets/js/alert/room-owners-alert.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="{{ asset('assets/js/owners/form-map.js') }}"></script>


   
@endpush
