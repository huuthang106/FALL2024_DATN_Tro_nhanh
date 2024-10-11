    @extends('layouts.admin')
    @section('titleAdmin', 'Danh Sách Báo Cáo | TRỌ NHANH')
    @section('linkAdmin', 'Danh sách báo cáo')
    @section('contentAdmin')
        <!--begin::Content-->
        @livewire('show-report')
            <!--end::Content-->
        @endsection
        @push('styleAdmin')
            {{-- <base href="">
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
            <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />
            <meta name="success" content="{{ session('success') }}">
            <meta name="error" content="{{ session('error') }}">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script src="{{ asset('assets/js/toastr-notification.js') }}"></script>
            <!--begin::Fonts-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
            <!--end::Fonts-->
            <!--begin::Page Vendor Stylesheets(used by this page)-->
            <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
                type="text/css" />
            <!--end::Page Vendor Stylesheets-->
            <!--begin::Global Stylesheets Bundle(used by all pages)-->
            <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
            <base href="">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description"
                content="Trang danh sách báo cáo trên Trọ Nhanh cho phép người dùng xem và quản lý các báo cáo liên quan đến các khu vực và phòng trọ. Dễ dàng theo dõi và xử lý các vấn đề từ bảng điều khiển quản trị.">
            <meta name="keywords"
                content="danh sách báo cáo, quản lý báo cáo, báo cáo khu vực, báo cáo phòng trọ, Trọ Nhanh, quản trị">
            <meta property="og:title" content="Danh Sách Báo Cáo - Trọ Nhanh">
            <meta property="og:description"
                content="Xem và quản lý các báo cáo liên quan đến khu vực và phòng trọ trên Trọ Nhanh. Theo dõi và xử lý các vấn đề báo cáo một cách hiệu quả từ bảng điều khiển quản trị.">
            <meta property="og:image" content="{{ asset('assets/images/logo-nav.png') }}">
            <meta property="og:url" content="{{ url()->current() }}">
            <meta property="og:site_name" content="Trọ Nhanh">
            <meta property="og:type" content="website">
            <link rel="canonical" href="{{ url()->current() }}">
            <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}">
            <meta name="success" content="{{ session('success') }}">
            <meta name="error" content="{{ session('error') }}">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script src="{{ asset('assets/js/toastr-notification.js') }}"></script>
            <!--begin::Fonts-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
            <!--end::Fonts-->
            <!--begin::Page Vendor Stylesheets(used by this page)-->
            <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
                type="text/css">
            <!--end::Page Vendor Stylesheets-->
            <!--begin::Global Stylesheets Bundle(used by all pages)-->
            <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css">
            <!--end::Global Stylesheets Bundle-->
        @endpush
        @push('scriptsAdmin')
            <script>
                var hostUrl = "assets/";
            </script>
            <!--begin::Javascript-->
            <!--begin::Global Javascript Bundle(used by all pages)-->
            <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
            <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
            <!--end::Global Javascript Bundle-->
            <!--begin::Page Vendors Javascript(used by this page)-->
            <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
            <!--end::Page Vendors Javascript-->
            <!--begin::Page Custom Javascript(used by this page)-->
            <script src="{{ asset('assets/js/custom/apps/subscriptions/list/export.js') }}"></script>
            <script src="{{ asset('assets/js/custom/apps/subscriptions/list/list.js') }}"></script>
            <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
            <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
            <script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
            <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
            <!--end::Page Custom Javascript-->
            <!--end::Javascript-->
            {{-- Show - Alert --}}
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="{{ asset('assets/js/alert/category-admin-alert.js') }}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const viewDetailButtons = document.querySelectorAll('.view-report-detail');
                    const modal = new bootstrap.Modal(document.getElementById('reportDetailModal'));
                    const modalContent = document.getElementById('reportDetailContent');
                    const approveButton = document.getElementById('approveReportBtn');

                    viewDetailButtons.forEach(button => {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();
                            const reportId = this.getAttribute('data-report-id');

                            // Hiển thị loading spinner
                            modalContent.innerHTML =
                                '<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Đang tải...</span></div></div>';

                            // Hiển thị modal
                            modal.show();

                            // Gửi request AJAX để lấy dữ liệu
                            fetch(`/admin/chi-tiet-bao-cao/${reportId}`)
                                .then(response => response.json())
                                .then(data => {
                                    // Cập nhật nội dung modal
                                    modalContent.innerHTML = `
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Tiêu đề:</label>
                                                <textarea class="form-control" rows="3" readonly>${data.description}</textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Người báo cáo:</label>
                                                <input type="text" class="form-control" value="${data.user.name}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Tên phòng:</label>
                                                <input type="text" class="form-control" value="${data.room ? data.room.title : 'Không có tiêu đề'}" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Ngày báo cáo:</label>
                                                <input type="text" class="form-control" value="${new Date(data.created_at).toLocaleString('vi-VN')}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Trạng thái:</label>
                                                <input type="text" class="form-control ${data.status == 1 ? 'bg-warning text-dark' : 'bg-success text-white'}" value="${data.status == 1 ? 'Chưa duyệt' : 'Đã duyệt'}" readonly>
                                            </div>
                                        </div>
                                    `;

                                    // Hiển thị hoặc ẩn nút duyệt
                                    if (data.status == 1) {
                                        approveButton.style.display = 'block';
                                        approveButton.onclick = function() {
                                            approveReport(reportId);
                                        };
                                    } else {
                                        approveButton.style.display = 'none';
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    modalContent.innerHTML =
                                        '<div class="alert alert-danger">Có lỗi xảy ra khi tải dữ liệu. Vui lòng thử lại sau.</div>';
                                });
                        });
                    });

                    function approveReport(reportId) {
                        fetch(`/admin/duyet-bao-cao/${reportId}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content'),
                                    'X-Requested-With': 'XMLHttpRequest'
                                },
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Thay vì hiển thị alert, chúng ta sẽ chuyển hướng
                                    window.location.href = data.redirect;
                                } else {
                                    alert('Có lỗi xảy ra khi duyệt báo cáo.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Có lỗi xảy ra khi duyệt báo cáo.');
                            });
                    }
                });
            </script>
        @endpush
