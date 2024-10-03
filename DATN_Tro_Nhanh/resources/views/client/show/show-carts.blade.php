@extends('layouts.main')
@section('titleUs', 'Giỏ Hàng | TRỌ NHANH')
@section('contentUs')
<!-- @if (session('error'))
         <div class="alert alert-danger">
             {{ session('error') }}
         </div>
     @endif

     @if (session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
     @endif  -->
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <div class="mb-6">
                <div class="row">
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center">
                            <label for="notification-list_length" class="d-block mr-2 mb-0">Kết quả:</label>
                            <select name="notification-list_length" id="notification-list_length"
                                aria-controls="invoice-list" class="form-control form-control-lg mr-2 selectpicker"
                                data-style="bg-white btn-lg h-52 py-2 border">
                                <option value="10" {{ request('notification-list_length') == '10' ? 'selected' : '' }}>
                                    10
                                </option>
                                <option value="20" {{ request('notification-list_length') == '20' ? 'selected' : '' }}>
                                    20
                                </option>
                                <option value="50" {{ request('notification-list_length') == '50' ? 'selected' : '' }}>
                                    50
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                        <!-- <form method="GET" action="" id="search-form" class="w-100 h-100" style="height: 1000px">
                                <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                                    <input type="text" name="query" value="" id="search-input"
                                        class="form-control bg-transparent border-1x" placeholder="Tìm..." aria-label=""
                                        aria-describedby="basic-addon1">
                                    <div class="input-group-append position-absolute pos-fixed-right-center">
                                        <button id="search-button" class="btn bg-transparent border-0 text-gray lh-1"
                                            type="submit">
                                            <i class="fal fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form> -->
                    </div>
                </div>
            </div>
            <form action="{{ route('client.payment') }}" id="form" method="POST">
                @csrf
                <input type="hidden" id="selected-items" name="selected_items" value="" />
                <div class="table-responsive">
                    <table id="notification-list" class="table table-hover bg-white border rounded-lg table-header-nowrap">
                        <thead>
                            <tr role="row">
                                <th class="no-sort py-6 pl-6">
                                    <label class="new-control new-checkbox checkbox-primary m-auto">
                                        <input type="checkbox"
                                            class="new-control-input chk-parent select-customers-info price-list-checkbox"
                                            id="select-all">
                                    </label>
                                </th>
                                <th class="py-6">Tên gói</th>
                                <th class="py-6">Mô tả</th>
                                <th class="no-sort py-6">Giá</th>
                                <th class="no-sort py-6">Số lượng</th>
                                <th class="no-sort py-6">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @auth
                                @forelse ($carts as $detail)
                                    <tr>
                                        <td class="checkbox-column py-6 pl-6">
                                            <label class="new-control new-checkbox checkbox-primary m-auto">
                                                <input type="checkbox"
                                                    class="new-control-input child-chk select-customers-info price-list-checkbox"
                                                    name="cart_ids[]" value="{{ $detail->id }}"
                                                    data-price="{{ $detail->priceList->price }}"
                                                    data-quantity="{{ $detail->quantity }}">
                                            </label>
                                        </td>
                                        <td name="name_price_list" class="align-middle">{{ $detail->priceList->description }}
                                        </td>
                                        <td name="description" class="align-middle">{{ $detail->priceList->description }}</td>
                                        <td name="price" class="align-middle">
                                            {{ number_format($detail->priceList->price, 0, ',', '.') }} VND</td>
                                        <td class="align-middle">
                                            {{ $detail->quantity }}
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-danger btn-sm delete-item"
                                                data-id="{{ $detail->id }}">Xóa</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Giỏ hàng trống.</td>
                                    </tr>
                                @endforelse
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <a class="nav-link pl-3 pr-3" data-toggle="modal" href="#login-register-modal">
                                            <button class="btn btn-primary ">Đăng nhập để mua gói</button>
                                        </a>
                                    </td>
                                </tr>
                            @endauth
                        </tbody>
                    </table>
                </div>
                <div id="no-checkbox-selected" class="alert alert-danger mt-4" style="display: none;">
                    Vui lòng chọn ít nhất một gói để thanh toán.
                </div>
                {{-- <div class="row">
                    <div class="col-7 d-flex justify-content-start mt-4">
                        <input type="hidden" name="total_price" id="total-price-input" value="">
                        <h5 class="text-info">Tổng tiền: <span id="total-price" name="total-price" class="text-dark">0
                                VND</span></h5>
                    </div>
                    <div class="col-5 d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary btn-lg" id="checkout-button">
                            Thanh toán
                        </button>
                    </div>
                </div> --}}
                <div class="row mt-4">
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <input type="hidden" name="total_price" id="total-price-input" value="">
                        <h5 class="text-info">Tổng tiền: <span id="total-price" name="total-price" class="text-dark">0
                                VND</span></h5>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                        <button type="submit" class="btn btn-primary btn-lg" id="checkout-button">
                            Thanh toán
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
@push('styleUs')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Giỏ Hàng | TRỌ NHANH</title>
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
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="dashboard-invoice-listing.html">
    <meta property="og:title" content="Invoice Listing">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="{{ asset('assets/image/png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Trang giỏ hàng của TRỌ NHANH giúp bạn quản lý và theo dõi các dịch vụ và sản phẩm đã chọn.">
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
    <meta name="twitter:title" content="Giỏ Hàng | TRỌ NHANH">
    <meta name="twitter:description"
        content="Quản lý các dịch vụ và sản phẩm đã chọn một cách dễ dàng với trang giỏ hàng của TRỌ NHANH.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url('/gio-hang') }}">
    <meta property="og:title" content="Giỏ Hàng | TRỌ NHANH">
    <meta property="og:description"
        content="Trang giỏ hàng của TRỌ NHANH giúp bạn quản lý và theo dõi các dịch vụ và sản phẩm đã chọn, đảm bảo trải nghiệm thuê phòng thuận tiện nhất.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <style>
        .table-header-nowrap th {
            white-space: nowrap;
        }
    </style>
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
    {{-- Notification - Pagination --}}
    {{-- <script src="{{ asset('assets/js/notification-list/notification-pagination.js') }}"></script> --}}
    <script>
        // document.addEventListener('DOMContentLoaded', function () {
        //     const checkboxes = document.querySelectorAll('.price-list-checkbox');  // Tất cả checkbox cho từng price list
        //     const selectAllCheckbox = document.getElementById('select-all');  // Checkbox tổng
        //     const totalPriceElement = document.getElementById('total-price');  // Phần tử hiển thị tổng tiền
        //     const totalPriceInput = document.getElementById('total-price-input'); // Input ẩn để lưu tổng tiền

        //     // Hàm tính tổng tiền
        //     function calculateTotalPrice() {
        //         let totalPrice = 0;

        //         // Lặp qua tất cả các checkbox
        //         checkboxes.forEach(function (checkbox) {
        //             if (checkbox.checked) {
        //                 // Lấy giá và số lượng từ thuộc tính data của checkbox
        //                 const price = parseFloat(checkbox.getAttribute('data-price')) || 0;
        //                 const quantity = parseInt(checkbox.getAttribute('data-quantity')) || 1;

        //                 // Tính tổng cho sản phẩm này và cộng vào tổng toàn bộ
        //                 totalPrice += price * quantity;
        //             }
        //         });

        //         // Làm tròn tổng tiền xuống số nguyên
        //         totalPrice = Math.round(totalPrice);

        //         // Cập nhật tổng tiền trên giao diện và thêm đơn vị "VND"
        //         totalPriceElement.textContent = new Intl.NumberFormat('vi-VN', {
        //             style: 'decimal',
        //             minimumFractionDigits: 0,
        //             maximumFractionDigits: 0
        //         }).format(totalPrice) + ' VND';

        //         // Cập nhật tổng tiền vào input ẩn để gửi qua form
        //         totalPriceInput.value = totalPrice;
        //     }

        //     // Hàm kiểm tra trạng thái của tất cả checkbox và cập nhật trạng thái của checkbox tổng
        //     function updateSelectAllCheckbox() {
        //         const allChecked = Array.from(checkboxes).every(function (checkbox) {
        //             return checkbox.checked;
        //         });
        //         selectAllCheckbox.checked = allChecked;
        //     }

        //     // Gán sự kiện 'change' cho mỗi checkbox
        //     checkboxes.forEach(function (checkbox) {
        //         checkbox.addEventListener('change', function () {
        //             // Cập nhật tổng tiền khi chọn hoặc bỏ chọn checkbox
        //             calculateTotalPrice();

        //             // Cập nhật trạng thái của checkbox tổng
        //             updateSelectAllCheckbox();
        //         });
        //     });

        //     // Gán sự kiện 'change' cho checkbox tổng
        //     selectAllCheckbox.addEventListener('change', function () {
        //         const isChecked = selectAllCheckbox.checked;

        //         // Chọn hoặc bỏ chọn tất cả các checkbox khác khi checkbox tổng được thay đổi
        //         checkboxes.forEach(function (checkbox) {
        //             checkbox.checked = isChecked;
        //         });

        //         // Tính toán lại tổng tiền
        //         calculateTotalPrice();
        //     });

        //     // Tính tổng tiền ngay khi trang được tải
        //     calculateTotalPrice();

        //     // Kiểm tra trạng thái của các checkbox khi bấm nút thanh toán
        //     checkoutButton.addEventListener('click', function (event) {
        //         const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

        //         if (!anyChecked) {
        //             event.preventDefault(); // Ngăn chặn form submit
        //             noCheckboxSelected.style.display = 'block'; // Hiển thị thông báo
        //         } else {
        //             noCheckboxSelected.style.display = 'none'; // Ẩn thông báo nếu có checkbox được chọn
        //         }
        //     });
        // });
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll(
                '.price-list-checkbox'); // Tất cả checkbox cho từng price list
            const selectAllCheckbox = document.getElementById('select-all'); // Checkbox tổng
            const totalPriceElement = document.getElementById('total-price'); // Phần tử hiển thị tổng tiền
            const totalPriceInput = document.getElementById('total-price-input'); // Input ẩn để lưu tổng tiền
            const checkoutButton = document.getElementById('checkout-button'); // Nút thanh toán
            const noCheckboxSelected = document.getElementById(
                'no-checkbox-selected'); // Thông báo nếu không có checkbox nào được chọn

            // Hàm tính tổng tiền
            function calculateTotalPrice() {
                let totalPrice = 0;

                // Lặp qua tất cả các checkbox
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        // Lấy giá và số lượng từ thuộc tính data của checkbox
                        const price = parseFloat(checkbox.getAttribute('data-price')) || 0;
                        const quantity = parseInt(checkbox.getAttribute('data-quantity')) || 1;

                        // Tính tổng cho sản phẩm này và cộng vào tổng toàn bộ
                        totalPrice += price * quantity;
                    }
                });

                // Làm tròn tổng tiền xuống số nguyên
                totalPrice = Math.round(totalPrice);

                // Cập nhật tổng tiền trên giao diện và thêm đơn vị "VND"
                totalPriceElement.textContent = new Intl.NumberFormat('vi-VN', {
                    style: 'decimal',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(totalPrice) + ' VND';

                // Cập nhật tổng tiền vào input ẩn để gửi qua form
                totalPriceInput.value = totalPrice;
            }

            // Hàm kiểm tra trạng thái của tất cả checkbox và cập nhật trạng thái của checkbox tổng
            // Hàm kiểm tra trạng thái của tất cả checkbox và cập nhật trạng thái của checkbox tổng
            function updateSelectAllCheckbox() {
                // Lọc các checkbox con, không bao gồm checkbox tổng
                const childCheckboxes = Array.from(checkboxes).filter(function(checkbox) {
                    return checkbox !== selectAllCheckbox;
                });

                // Kiểm tra xem tất cả checkbox con có được chọn hay không
                const allChecked = childCheckboxes.every(function(checkbox) {
                    return checkbox.checked;
                });

                // Log ra giá trị từng checkbox con để kiểm tra trạng thái của nó
                childCheckboxes.forEach(function(checkbox, index) {
                    console.log(`Checkbox con ${index + 1}: `, checkbox.checked);
                });

                // Log ra giá trị của allChecked để kiểm tra
                console.log("Tất cả checkbox con được chọn: ", allChecked);

                // Cập nhật trạng thái của checkbox tổng: chỉ chọn nếu tất cả checkbox con được chọn
                selectAllCheckbox.checked = allChecked;
            }

            // Gán sự kiện 'change' cho mỗi checkbox
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Cập nhật tổng tiền khi chọn hoặc bỏ chọn checkbox
                    calculateTotalPrice();

                    // Cập nhật trạng thái của checkbox tổng
                    updateSelectAllCheckbox();
                });
            });

            // Gán sự kiện 'change' cho checkbox tổng
            selectAllCheckbox.addEventListener('change', function() {
                const isChecked = selectAllCheckbox.checked;

                // Chọn hoặc bỏ chọn tất cả các checkbox khác khi checkbox tổng được thay đổi
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = isChecked;
                });

                // Tính toán lại tổng tiền
                calculateTotalPrice();
            });

            // Tính tổng tiền ngay khi trang được tải
            calculateTotalPrice();

            // Kiểm tra trạng thái của các checkbox khi bấm nút thanh toán
            checkoutButton.addEventListener('click', function(event) {
                const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

                if (!anyChecked) {
                    event.preventDefault(); // Ngăn chặn form submit
                    noCheckboxSelected.style.display = 'block'; // Hiển thị thông báo
                } else {
                    noCheckboxSelected.style.display = 'none'; // Ẩn thông báo nếu có checkbox được chọn
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-item').forEach(function(button) {
                button.addEventListener('click', function() {
                    const cartDetailId = this.getAttribute('data-id');

                    // Hiển thị thông báo đang xóa để người dùng biết rằng hành động đang được thực hiện
                    this.disabled = true; // Vô hiệu hóa nút xóa để tránh nhấn nhiều lần
                    this.innerText = 'Đang xóa...';

                    // Gửi yêu cầu xóa tới server
                    axios.delete(`{{ url('/gio-hang') }}/${cartDetailId}`, {
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token để bảo mật
                            }
                        })
                        .then(response => {
                            if (response.data.success) {
                                // Chờ một thời gian ngắn để người dùng thấy phản hồi
                                setTimeout(() => {
                                    // Tải lại trang để hiển thị kết quả mới
                                    window.location.reload();
                                }, 300); // Thay đổi thời gian nếu cần
                            } else {
                                alert('Có lỗi xảy ra khi xóa: ' + (response.data.message ||
                                    ''));
                                // Kích hoạt lại nút xóa
                                this.disabled = false;
                                this.innerText = 'Xóa';
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi:', error);
                            alert('Có lỗi xảy ra khi xóa.');
                            // Kích hoạt lại nút xóa
                            this.disabled = false;
                            this.innerText = 'Xóa';
                        });
                });
            });
        });
    </script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.successMessage = "{{ session('success') }}";
        window.errorMessage = "{{ session('error') }}";
        console.log('Error message:', window.errorMessage); // Add this line
    </script>
    <script src="{{ asset('assets/js/alert-update-user.js') }}"></script>
@endpush
