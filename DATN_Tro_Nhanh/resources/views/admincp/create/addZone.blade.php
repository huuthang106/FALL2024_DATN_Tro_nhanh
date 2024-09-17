@extends('layouts.admin')
@section('titleAdmin', 'Thêm Khu Trọ | TRỌ NHANH')
@section('linkAdmin', 'Thêm khu trọ')

@section('contentAdmin')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Thêm khu trọ</h3>
                        </div>
                    </div>
                    <div id="kt_account_profile_details" class="collapse show">
                        <form id="zoneForm" class="form" method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.them-khutro') }}">
                            @csrf
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <!-- Tên khu trọ -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Tên khu trọ</label>
                                        <input type="text" name="name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Tên khu trọ" value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Mô tả -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Mô tả</label>
                                        <textarea name="description" class="form-control form-control-lg form-control-solid" placeholder="Mô tả">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <!-- Địa chỉ -->

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Tình trạng</label>
                                        <select name="status" class="form-select form-select-solid form-select-lg">
                                            <option value="1">Kích hoạt</option>
                                            <option value="0">Vô hiệu hóa</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Khu vực -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Tỉnh/Thành phố</label>
                                        <select class="form-select form-select-solid form-select-lg" id="city-province"
                                            name="province">
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
                                            <!-- Các tỉnh thành khác... -->
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
                                            value="{{ old('longitude') }}" readonly />
                                        @error('longitude')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Xã/Phường -->

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6">Quận/Huyện</label>
                                        <select id="district-town" name="district"
                                            class="form-select form-select-solid form-select-lg">
                                            <option value="0">Chọn Quận/Huyện...</option>
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
                                            value="{{ old('latitude') }}" readonly />
                                        @error('latitude')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Vĩ độ -->

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6">Xã/Phường</label>
                                        <select id="ward-commune" name="village"
                                            class="form-select form-select-solid form-select-lg">
                                            <option value="0">Chọn Xã/Phường...</option>
                                        </select>
                                        @error('village')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <!-- Số phòng -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Tổng số phòng</label>
                                        <input type="number" name="total_rooms"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Tổng số phòng" value="{{ old('total_rooms') }}" />
                                        @error('total_rooms')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tình trạng -->
                                    <!-- <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold fs-6 required">Tình trạng</label>
                                                <select name="status" class="form-select form-select-solid form-select-lg">
                                                    <option value="1">Kích hoạt</option>
                                                    <option value="0">Vô hiệu hóa</option>
                                                </select>
                                                @error('status')
        <div class="text-danger">{{ $message }}</div>
    @enderror
                                            </div> -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold fs-6 required">Địa chỉ</label>
                                        <input type="text" name="address" id="address"
                                            class="form-control form-control-lg form-control-solid" placeholder="Địa chỉ"
                                            value="{{ old('address') }}" />
                                        @error('address')
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
                                    <button type="submit" class="btn btn-primary">Lưu</button>
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
    {{-- <title>Thêm Khu Trọ | TRỌ NHANH</title> --}}
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
    <link href="{{ asset('assets/css/style-ntt.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
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
