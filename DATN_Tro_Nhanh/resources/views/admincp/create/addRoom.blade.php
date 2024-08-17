@extends('layouts.admin')
@section('titleAdmin', 'Trang chủ trọ nhanh')
@section('linkAdmin', 'Thêm bài viết')

@section('contentAdmin')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Thêm phòng</h3>
                        </div>
                    </div>
                    <div id="kt_account_profile_details" class="collapse show">
                        <form class="form" action="{{ route('admin.add-room') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body border-top p-9">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Tiêu đề</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" id="title" name="title"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('title')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Mô tả</label>
                                            <div class="col-lg-8 fv-row">
                                                <textarea name="description" class="form-control form-control-lg form-control-solid" placeholder=""></textarea>
                                                @error('description')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Giá</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="number" name="price"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('price')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">Số điện
                                                thoại</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="tel" name="phone"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    maxlength="13" />
                                                @error('phone')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Địa chỉ</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="address"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('address')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Số lượng</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="number" name="quantity"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('quantity')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">View</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="number" name="view" value="1"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('view')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Trạng thái</label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="status" class="form-select form-select-solid form-select-lg">
                                                    <option value="1">Kích hoạt</option>
                                                    <option value="0">Không kích hoạt</option>
                                                </select>
                                                @error('status')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Loại phòng</label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="category_id"
                                                    class="form-select form-select-solid form-select-lg">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Diện tích</label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="acreages_id"
                                                    class="form-select form-select-solid form-select-lg">
                                                    @foreach ($acreages as $acreage)
                                                        <option value="{{ $acreage->id }}">
                                                            {{ $acreage->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Khu vực</label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="location_id"
                                                    class="form-select form-select-solid form-select-lg">
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}">
                                                            {{ $location->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Vị trí</label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="zone_id"
                                                    class="form-select form-select-solid form-select-lg">
                                                    @foreach ($zones as $zone)
                                                        <option value="{{ $zone->id }}">
                                                            {{ $zone->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">Loại dịch vụ phòng</label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="room_type_id"
                                                    class="form-select form-select-solid form-select-lg">
                                                    @foreach ($roomTypes as $roomType)
                                                        <option value="{{ $roomType->id }}">
                                                            {{ $roomType->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Tỉnh</label>
                                            <div class="col-lg-8 fv-row">
                                                <select
                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52" id="city-province"
                                                    name="province">
                                                    <option value='0'>&nbsp;Chọn Tỉnh/Thành Phố...</option>
                                                    <option value='01'>&nbspThành phố Hà Nội</option>
                                                    <option value='79'>&nbspThành phố Hồ Chí Minh</option>
                                                    <option value='31'>&nbspThành phố Hải Phòng</option>
                                                    <option value='48'>&nbspThành phố Đà Nẵng</option>
                                                    <option value='92'>&nbspThành phố Cần Thơ</option>
                                                    <option value='02'>&nbspTỉnh Hà Giang</option>
                                                    <option value='04'>&nbspTỉnh Cao Bằng</option>
                                                    <option value='06'>&nbspTỉnh Bắc Kạn</option>
                                                    <option value='08'>&nbspTỉnh Tuyên Quang</option>
                                                    <option value='10'>&nbspTỉnh Lào Cai</option>
                                                    <option value='11'>&nbspTỉnh Điện Biên</option>
                                                    <option value='12'>&nbspTỉnh Lai Châu</option>
                                                    <option value='14'>&nbspTỉnh Sơn La</option>
                                                    <option value='15'>&nbspTỉnh Yên Bái</option>
                                                    <option value='17'>&nbspTỉnh Hoà Bình</option>
                                                    <option value='19'>&nbspTỉnh Thái Nguyên</option>
                                                    <option value='20'>&nbspTỉnh Lạng Sơn</option>
                                                    <option value='22'>&nbspTỉnh Quảng Ninh</option>
                                                    <option value='24'>&nbspTỉnh Bắc Giang</option>
                                                    <option value='25'>&nbspTỉnh Phú Thọ</option>
                                                    <option value='26'>&nbspTỉnh Vĩnh Phúc</option>
                                                    <option value='27'>&nbspTỉnh Bắc Ninh</option>
                                                    <option value='30'>&nbspTỉnh Hải Dương</option>
                                                    <option value='33'>&nbspTỉnh Hưng Yên</option>
                                                    <option value='34'>&nbspTỉnh Thái Bình</option>
                                                    <option value='35'>&nbspTỉnh Hà Nam</option>
                                                    <option value='36'>&nbspTỉnh Nam Định</option>
                                                    <option value='37'>&nbspTỉnh Ninh Bình</option>
                                                    <option value='38'>&nbspTỉnh Thanh Hóa</option>
                                                    <option value='40'>&nbspTỉnh Nghệ An</option>
                                                    <option value='42'>&nbspTỉnh Hà Tĩnh</option>
                                                    <option value='44'>&nbspTỉnh Quảng Bình</option>
                                                    <option value='45'>&nbspTỉnh Quảng Trị</option>
                                                    <option value='46'>&nbspTỉnh Thừa Thiên Huế</option>
                                                    <option value='49'>&nbspTỉnh Quảng Nam</option>
                                                    <option value='51'>&nbspTỉnh Quảng Ngãi</option>
                                                    <option value='52'>&nbspTỉnh Bình Định</option>
                                                    <option value='54'>&nbspTỉnh Phú Yên</option>
                                                    <option value='56'>&nbspTỉnh Khánh Hòa</option>
                                                    <option value='58'>&nbspTỉnh Ninh Thuận</option>
                                                    <option value='60'>&nbspTỉnh Bình Thuận</option>
                                                    <option value='62'>&nbspTỉnh Kon Tum</option>
                                                    <option value='64'>&nbspTỉnh Gia Lai</option>
                                                    <option value='66'>&nbspTỉnh Đắk Lắk</option>
                                                    <option value='67'>&nbspTỉnh Đắk Nông</option>
                                                    <option value='68'>&nbspTỉnh Lâm Đồng</option>
                                                    <option value='70'>&nbspTỉnh Bình Phước</option>
                                                    <option value='72'>&nbspTỉnh Tây Ninh</option>
                                                    <option value='74'>&nbspTỉnh Bình Dương</option>
                                                    <option value='75'>&nbspTỉnh Đồng Nai</option>
                                                    <option value='77'>&nbspTỉnh Bà Rịa - Vũng Tàu</option>
                                                    <option value='80'>&nbspTỉnh Long An</option>
                                                    <option value='82'>&nbspTỉnh Tiền Giang</option>
                                                    <option value='83'>&nbspTỉnh Bến Tre</option>
                                                    <option value='84'>&nbspTỉnh Trà Vinh</option>
                                                    <option value='86'>&nbspTỉnh Vĩnh Long</option>
                                                    <option value='87'>&nbspTỉnh Đồng Tháp</option>
                                                    <option value='89'>&nbspTỉnh An Giang</option>
                                                    <option value='91'>&nbspTỉnh Kiên Giang</option>
                                                    <option value='93'>&nbspTỉnh Hậu Giang</option>
                                                    <option value='94'>&nbspTỉnh Sóc Trăng</option>
                                                    <option value='95'>&nbspTỉnh Bạc Liêu</option>
                                                    <option value='96'>&nbspTỉnh Cà Mau</option>
                                                    <!-- Thêm các tùy chọn khác ở đây -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Huyện</label>
                                            <div class="col-lg-8 fv-row">
                                                <select
                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52" id="district-town"
                                                    name="district">
                                                    <option value='0'>&nbsp;Chọn Quận/Huyện...</option>
                                                    <!-- Các tùy chọn khác sẽ được thêm vào qua JavaScript -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Xã</label>
                                            <div class="col-lg-8 fv-row">
                                                <select
                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52" id="ward-commune"
                                                    name="village">
                                                    <option value='0'>&nbsp;Chọn Phường/Xã...</option>
                                                    <!-- Các tùy chọn khác sẽ được thêm vào qua JavaScript -->
                                                </select>
                                            </div>
                                        </div>
                                        <div onload="initMap()">
                                            <div class="row mb-6">
                                                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Đặt ghim
                                                    niêm yết trên bản đồ</h3>
                                                <p class="card-text mb-5">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit</p>
                                                <!-- Bản đồ -->
                                                <div id="map" class="mb-6" style="height: 292px;">
                                                </div>
                                            </div>
                                            <div class="row mb-6">
                                                <label class="col-lg-4 col-form-label fw-bold fs-6 required">Kinh
                                                    độ</label>
                                                <div class="col-lg-8 fv-row">
                                                    <input type="text" id="longitude" name="longitude"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="" />
                                                    @error('logitude')
                                                        <div class="text-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="row mb-6">
                                                <label class="col-lg-4 col-form-label fw-bold fs-6 required">Vĩ độ</label>
                                                <div class="col-lg-8 fv-row">
                                                    <input type="text" id="latitude" name="latitude"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="" />
                                                    @error('latitude')
                                                        <div class="text-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Hình ảnh</label>
                                            <div class="col-lg-8 fv-row">
                                                <div id="image-input-container">
                                                    <input type="file" name="images[]"
                                                        class="form-control form-control-lg form-control-solid mb-3"
                                                        placeholder="" />
                                                </div>
                                                <button type="button" id="add-image-input"
                                                    class="btn btn-primary float-end">
                                                    Thêm ảnh
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Hủy</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
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
    <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by
        Keenthemes</title>
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
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/seclectmap.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC67NQzqFC2WplLzC_3PsL5gejG1_PZLDk"></script>
    <script src="{{ asset('assets/js/mapapi-ntt.js') }}"></script>
    <script src="{{ asset('assets/js/image-ntt.js') }}"></script>
    <script>
        document.getElementById('title').addEventListener('input', function() {
            var title = this.value;
            var id = 123; // Giả sử đây là id hiện tại. Bạn có thể thay thế bằng id thực tế của bạn.
            var slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '') + '-' + id;
            document.getElementById('slug').value = slug;
        });
    </script>
@endpush
