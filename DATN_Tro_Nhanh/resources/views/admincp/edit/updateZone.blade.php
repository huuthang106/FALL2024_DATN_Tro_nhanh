@extends('layouts.admin')
@section('titleAdmin', 'Chỉnh Sửa Khu Trọ | TRỌ NHANH')
@section('linkAdmin', 'Chỉnh sửa khu trọ')

@section('contentAdmin')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Sửa phòng</h3>
                        </div>
                    </div>
                    <div id="kt_account_profile_details" class="collapse show">
                        <form id="zoneForm" class="form" method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.cap-nhat-khutro', ['id' => $zone->id]) }}">
                            @csrf
                            @method('PUT') <!-- Thêm phương thức PUT để thực hiện cập nhật -->
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <!-- Tên khu trọ -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Tên khu trọ</label>
                                        <input type="text" name="name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Tên khu trọ" value="{{ old('name', $zone->name) }}" />
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Mô tả -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Mô tả</label>
                                        <textarea name="description" class="form-control form-control-lg form-control-solid" placeholder="Mô tả">{{ old('description', $zone->description) }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <!-- Địa chỉ -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Địa chỉ</label>
                                        <input type="text" name="address"
                                            class="form-control form-control-lg form-control-solid" placeholder="Địa chỉ"
                                            value="{{ old('address', $zone->address) }}" />
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Khu vực -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Tỉnh/Thành phố</label>
                                        <select class="form-select form-select-solid form-select-lg" id="city-province"
                                            name="province">
                                            <option value=''>Chọn Tỉnh/Thành Phố...</option>
                                            <option value='01'
                                                {{ old('province', $zone->province) == '01' ? 'selected' : '' }}>Thành phố
                                                Hà Nội</option>
                                            <option value='79'
                                                {{ old('province', $zone->province) == '79' ? 'selected' : '' }}>Thành phố
                                                Hồ Chí Minh</option>
                                            <option value='31'
                                                {{ old('province', $zone->province) == '31' ? 'selected' : '' }}>Thành phố
                                                Hải Phòng</option>
                                            <option value='48'
                                                {{ old('province', $zone->province) == '48' ? 'selected' : '' }}>Thành phố
                                                Đà Nẵng</option>
                                            <option value='92'
                                                {{ old('province', $zone->province) == '92' ? 'selected' : '' }}>Thành phố
                                                Cần Thơ</option>
                                            <option value='02'
                                                {{ old('province', $zone->province) == '02' ? 'selected' : '' }}>Tỉnh Hà
                                                Giang</option>
                                            <option value='04'
                                                {{ old('province', $zone->province) == '04' ? 'selected' : '' }}>Tỉnh Cao
                                                Bằng</option>
                                            <option value='06'
                                                {{ old('province', $zone->province) == '06' ? 'selected' : '' }}>Tỉnh Bắc
                                                Kạn</option>
                                            <option value='08'
                                                {{ old('province', $zone->province) == '08' ? 'selected' : '' }}>Tỉnh Tuyên
                                                Quang</option>
                                            <option value='10'
                                                {{ old('province', $zone->province) == '10' ? 'selected' : '' }}>Tỉnh Lào
                                                Cai</option>
                                            <option value='11'
                                                {{ old('province', $zone->province) == '11' ? 'selected' : '' }}>Tỉnh Điện
                                                Biên</option>
                                            <option value='12'
                                                {{ old('province', $zone->province) == '12' ? 'selected' : '' }}>Tỉnh Lai
                                                Châu</option>
                                            <option value='14'
                                                {{ old('province', $zone->province) == '14' ? 'selected' : '' }}>Tỉnh Sơn
                                                La</option>
                                            <option value='15'
                                                {{ old('province', $zone->province) == '15' ? 'selected' : '' }}>Tỉnh Yên
                                                Bái</option>
                                            <option value='17'
                                                {{ old('province', $zone->province) == '17' ? 'selected' : '' }}>Tỉnh Hoà
                                                Bình</option>
                                            <option value='19'
                                                {{ old('province', $zone->province) == '19' ? 'selected' : '' }}>Tỉnh Thái
                                                Nguyên</option>
                                            <option value='20'
                                                {{ old('province', $zone->province) == '20' ? 'selected' : '' }}>Tỉnh Lạng
                                                Sơn</option>
                                            <option value='22'
                                                {{ old('province', $zone->province) == '22' ? 'selected' : '' }}>Tỉnh Quảng
                                                Ninh</option>
                                            <option value='24'
                                                {{ old('province', $zone->province) == '24' ? 'selected' : '' }}>Tỉnh Bắc
                                                Giang</option>
                                            <option value='25'
                                                {{ old('province', $zone->province) == '25' ? 'selected' : '' }}>Tỉnh Phú
                                                Thọ</option>
                                            <option value='26'
                                                {{ old('province', $zone->province) == '26' ? 'selected' : '' }}>Tỉnh Vĩnh
                                                Phúc</option>
                                            <option value='27'
                                                {{ old('province', $zone->province) == '27' ? 'selected' : '' }}>Tỉnh Bắc
                                                Ninh</option>
                                            <option value='30'
                                                {{ old('province', $zone->province) == '30' ? 'selected' : '' }}>Tỉnh Hải
                                                Dương</option>
                                            <option value='33'
                                                {{ old('province', $zone->province) == '33' ? 'selected' : '' }}>Tỉnh Hưng
                                                Yên</option>
                                            <option value='34'
                                                {{ old('province', $zone->province) == '34' ? 'selected' : '' }}>Tỉnh Thái
                                                Bình</option>
                                            <option value='35'
                                                {{ old('province', $zone->province) == '35' ? 'selected' : '' }}>Tỉnh Hà
                                                Nam</option>
                                            <option value='36'
                                                {{ old('province', $zone->province) == '36' ? 'selected' : '' }}>Tỉnh Nam
                                                Định</option>
                                            <option value='37'
                                                {{ old('province', $zone->province) == '37' ? 'selected' : '' }}>Tỉnh Ninh
                                                Bình</option>
                                            <option value='38'
                                                {{ old('province', $zone->province) == '38' ? 'selected' : '' }}>Tỉnh Thanh
                                                Hóa</option>
                                            <option value='40'
                                                {{ old('province', $zone->province) == '40' ? 'selected' : '' }}>Tỉnh Nghệ
                                                An</option>
                                            <option value='42'
                                                {{ old('province', $zone->province) == '42' ? 'selected' : '' }}>Tỉnh Hà
                                                Tĩnh</option>
                                            <option value='44'
                                                {{ old('province', $zone->province) == '44' ? 'selected' : '' }}>Tỉnh Quảng
                                                Bình</option>
                                            <option value='45'
                                                {{ old('province', $zone->province) == '45' ? 'selected' : '' }}>Tỉnh Quảng
                                                Trị</option>
                                            <option value='46'
                                                {{ old('province', $zone->province) == '46' ? 'selected' : '' }}>Tỉnh Thừa
                                                Thiên Huế</option>
                                            <option value='49'
                                                {{ old('province', $zone->province) == '49' ? 'selected' : '' }}>Tỉnh Quảng
                                                Nam</option>
                                            <option value='51'
                                                {{ old('province', $zone->province) == '51' ? 'selected' : '' }}>Tỉnh Quảng
                                                Ngãi</option>
                                            <option value='52'
                                                {{ old('province', $zone->province) == '52' ? 'selected' : '' }}>Tỉnh Bình
                                                Định</option>
                                            <option value='54'
                                                {{ old('province', $zone->province) == '54' ? 'selected' : '' }}>Tỉnh Phú
                                                Yên</option>
                                            <option value='56'
                                                {{ old('province', $zone->province) == '56' ? 'selected' : '' }}>Tỉnh Khánh
                                                Hòa</option>
                                            <option value='58'
                                                {{ old('province', $zone->province) == '58' ? 'selected' : '' }}>Tỉnh Ninh
                                                Thuận</option>
                                            <option value='60'
                                                {{ old('province', $zone->province) == '60' ? 'selected' : '' }}>Tỉnh Bình
                                                Thuận</option>
                                            <option value='62'
                                                {{ old('province', $zone->province) == '62' ? 'selected' : '' }}>Tỉnh Kon
                                                Tum</option>
                                            <option value='64'
                                                {{ old('province', $zone->province) == '64' ? 'selected' : '' }}>Tỉnh Gia
                                                Lai</option>
                                            <option value='66'
                                                {{ old('province', $zone->province) == '66' ? 'selected' : '' }}>Tỉnh Đắk
                                                Lắk</option>
                                            <option value='67'
                                                {{ old('province', $zone->province) == '67' ? 'selected' : '' }}>Tỉnh Đắk
                                                Nông</option>
                                            <option value='68'
                                                {{ old('province', $zone->province) == '68' ? 'selected' : '' }}>Tỉnh Lâm
                                                Đồng</option>
                                            <option value='70'
                                                {{ old('province', $zone->province) == '70' ? 'selected' : '' }}>Tỉnh Bình
                                                Phước</option>
                                            <option value='72'
                                                {{ old('province', $zone->province) == '72' ? 'selected' : '' }}>Tỉnh Tây
                                                Ninh</option>
                                            <option value='74'
                                                {{ old('province', $zone->province) == '74' ? 'selected' : '' }}>Tỉnh Bình
                                                Dương</option>
                                            <option value='75'
                                                {{ old('province', $zone->province) == '75' ? 'selected' : '' }}>Tỉnh Đồng
                                                Nai</option>
                                            <option value='77'
                                                {{ old('province', $zone->province) == '77' ? 'selected' : '' }}>Tỉnh Bà
                                                Rịa - Vũng Tàu</option>
                                            <option value='80'
                                                {{ old('province', $zone->province) == '80' ? 'selected' : '' }}>Tỉnh Long
                                                An</option>
                                            <option value='82'
                                                {{ old('province', $zone->province) == '82' ? 'selected' : '' }}>Tỉnh Tiền
                                                Giang</option>
                                            <option value='83'
                                                {{ old('province', $zone->province) == '83' ? 'selected' : '' }}>Tỉnh Bến
                                                Tre</option>
                                            <option value='84'
                                                {{ old('province', $zone->province) == '84' ? 'selected' : '' }}>Tỉnh Trà
                                                Vinh</option>
                                            <option value='86'
                                                {{ old('province', $zone->province) == '86' ? 'selected' : '' }}>Tỉnh Vĩnh
                                                Long</option>
                                            <option value='87'
                                                {{ old('province', $zone->province) == '87' ? 'selected' : '' }}>Tỉnh Đồng
                                                Tháp</option>
                                            <option value='89'
                                                {{ old('province', $zone->province) == '89' ? 'selected' : '' }}>Tỉnh An
                                                Giang</option>
                                            <option value='91'
                                                {{ old('province', $zone->province) == '91' ? 'selected' : '' }}>Tỉnh Kiên
                                                Giang</option>
                                            <option value='93'
                                                {{ old('province', $zone->province) == '93' ? 'selected' : '' }}>Tỉnh Hậu
                                                Giang</option>
                                            <option value='94'
                                                {{ old('province', $zone->province) == '94' ? 'selected' : '' }}>Tỉnh Sóc
                                                Trăng</option>
                                            <option value='95'
                                                {{ old('province', $zone->province) == '95' ? 'selected' : '' }}>Tỉnh Bạc
                                                Liêu</option>
                                            <option value='96'
                                                {{ old('province', $zone->province) == '96' ? 'selected' : '' }}>Tỉnh Cà
                                                Mau</option>
                                        </select>
                                        @error('province')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-6">
                                    <!-- Quận/Huyện -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6">Kinh độ</label>
                                        <input type="text" id="longitude" name="longitude"
                                            class="form-control form-control-lg form-control-solid" placeholder="Kinh độ"
                                            value="{{ old('longitude', $zone->longitude) }}" readonly />
                                        @error('longitude')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Xã/Phường -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6">Quận/Huyện</label>

                                        <select class="selectpicker form-select form-select-solid form-select-lg"
                                            id="district-town" name="district">

                                        </select>
                                        @error('district')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <!-- Kinh độ -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6">Vĩ độ</label>
                                        <input type="text" id="latitude" name="latitude"
                                            class="form-control form-control-lg form-control-solid" placeholder="Vĩ độ"
                                            value="{{ old('latitude', $zone->latitude) }}" readonly />
                                        @error('latitude')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Vĩ độ -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6">Xã/Phường</label>
                                        <select class="selectpicker form-select form-select-solid form-select-lg"
                                            id="ward-commune" name="village">

                                        </select>
                                        @error('village')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <!-- Số phòng -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Số phòng</label>
                                        <input type="number" name="total_rooms"
                                            class="form-control form-control-lg form-control-solid" placeholder="Số phòng"
                                            value="{{ old('total_rooms', $zone->total_rooms) }}" />
                                        @error('total_rooms')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tình trạng -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Tình trạng</label>
                                        <select name="status" class="form-select form-select-solid form-select-lg">
                                            <option value="1"
                                                {{ old('status', $zone->status) == 1 ? 'selected' : '' }}>Kích hoạt
                                            </option>
                                            <option value="0"
                                                {{ old('status', $zone->status) == 0 ? 'selected' : '' }}>Vô hiệu hóa
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <!-- Bản đồ -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold fs-6">Bản đồ</label>
                                        <div id="map" style="height: 400px;"></div>
                                        @error('map')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="reset"
                                        class="btn btn-light btn-active-light-primary me-2">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    <!--begin::Footer-->

    <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->

    <!--end::Activities drawer-->
    <!--begin::Chat drawer-->

    <!--end::Chat drawer-->
    <!--begin::Exolore drawer toggle-->

    <!--end::Exolore drawer toggle-->
    <!--begin::Exolore drawer-->

    <!--end::Exolore drawer-->
    <!--end::Drawers-->
    <!--begin::Modals-->
    <!--begin::Modal - Invite Friends-->

    <!--end::Modal - Invite Friend-->
    <!--begin::Modal - Create App-->

    <!--end::Modal - Create App-->
    <!--begin::Modal - Upgrade plan-->

    <!--end::Modal - Upgrade plan-->
    <!--end::Modals-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->



@endsection
@push('styleAdmin')
    <base href="{{ asset('..') }}">
    {{-- <title>Chỉnh Sửa Khu Trọ | TRỌ NHANH</title> --}}
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <meta name="success" content="{{ session('success') }}">
    <meta name="error" content="{{ session('error') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/toastr-notification.js') }}"></script>
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    {{-- <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" /> --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/tro-moi.png') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endpush

@push('scriptsAdmin')
    <script>
        var hostUrl = "{{ asset('assets/') }}";
    </script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/two-factor-authentication.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC67NQzqFC2WplLzC_3PsL5gejG1_PZLDk&libraries=places">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-ggmap-nht.js') }}"></script>

    <script src="{{ asset('assets/js/api-mh.js') }}"></script>

    <script>
        window.zoneData = {
            provinceId: '{{ $zone->province }}',
            districtId: '{{ $zone->district }}',
            communeId: '{{ $zone->village }}'
        };
    </script>
@endpush
