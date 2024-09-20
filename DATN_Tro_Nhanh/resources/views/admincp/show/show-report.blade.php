    @extends('layouts.admin')
    @section('titleAdmin', 'Danh Sách Báo Cáo | TRỌ NHANH')
    @section('linkAdmin', 'Danh sách Báo Cáo')
    @section('contentAdmin')
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->

                                    <form method="GET" action="" class="w-100">
                                        <div class="input-group">
                                            <input type="text" name="query" value="" placeholder="Tìm kiếm..."
                                                class="form-control form-control-solid">
                                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->

                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2">
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                        data-kt-check-target="#kt_subscriptions_table .form-check-input"
                                                        value="1" />
                                                </div>
                                            </th>
                                            <th class="min-w-125px">Tiêu đề</th>
                                            <th class="min-w-125px">Người báo cáo</th>
                                            <th class="min-w-125px">Tên phòng</th>
                                            <th class="min-w-125px">Ngày báo cáo</th>
                                            <th class="min-w-125px">Trạng thái</th>
                                            <th class="text-end min-w-70px">Thao tác</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">
                                        @if ($reports->isEmpty())
                                            <!-- Hiển thị khi không có dữ liệu -->
                                            <tr>
                                                <td colspan="7" class="text-center">Không có dữ liệu.</td>
                                            </tr>
                                        @else
                                        @foreach ($reports as $report)
                                            <tr>
                                                <!--begin::Checkbox-->
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>

                                                <td>
                                                    <small>{{ $report->description }}</small>
                                                </td>

                                                <td>
                                                    {{ $report->user->name }}
                                                </td>
                                                <td>
                                                    {{ $report->room->title }}
                                                </td>
                                                <td>
                                                    {{ $report->created_at->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    <div
                                                        class="badge {{ $report->status == 1 ? 'badge-light-warning' : ($report->status == 2 ? 'badge-light-success' : '') }}">
                                                        {{ $report->status == 1 ? 'Chưa duyệt' : ($report->status == 2 ? 'Đã duyệt' : '') }}
                                                    </div>

                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">Thao
                                                        tác
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon--></a>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="../../demo8/dist/apps/subscriptions/add.html"
                                                                class="menu-link px-3">Xem chi tiết</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        {{-- <div class="menu-item px-3">
                                                        <a href="{{ route('admin.edit-category', ['slug' => $register->slug]) }}"
                                                            class="menu-link px-3">Chỉnh sửa</a>
                                                    </div> --}}
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            @if ($report->status == 1)
                                                                <form
                                                                    action="{{ route('admin.approve-report', $report->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="menu-link px-3 border-0 bg-transparent">Duyệt</button>
                                                                </form>
                                                            @else
                                                            @endif
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="#"
                                                                data-kt-subscriptions-table-filter="delete_row"
                                                                class="menu-link px-3">Xóa</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                            <!--end::Card body-->
                            <!-- Hiển thị các liên kết phân trang -->
                            @if ($reports->hasPages())
                                <nav aria-label="Page navigation">
                                    <ul class="pagination rounded-active justify-content-center">
                                        {{-- Liên kết Trang Trước --}}
                                        <li class="page-item {{ $reports->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link hover-white" href="{{ $reports->previousPageUrl() }}"
                                                rel="prev" aria-label="@lang('pagination.previous')">
                                                {{-- <i class="far fa-angle-left"></i> --}}
                                                <{{-- Mũi tên trái --}} </a>
                                        </li>

                                        @php
                                            $totalPages = $reports->lastPage();
                                            $currentPage = $reports->currentPage();
                                            $visiblePages = 3; // Số trang hiển thị ở giữa
                                        @endphp

                                        {{-- Trang đầu --}}
                                        <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                                            <a class="page-link hover-white" href="{{ $reports->url(1) }}">1</a>
                                        </li>

                                        {{-- Dấu ba chấm đầu --}}
                                        @if ($currentPage > $visiblePages)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif

                                        {{-- Các trang giữa --}}
                                        @foreach (range(max(2, min($currentPage - 1, $totalPages - $visiblePages + 1)), min(max($currentPage + 1, $visiblePages), $totalPages - 1)) as $i)
                                            @if ($i > 1 && $i < $totalPages)
                                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                                    <a class="page-link hover-white"
                                                        href="{{ $reports->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        {{-- Dấu ba chấm cuối --}}
                                        @if ($currentPage < $totalPages - ($visiblePages - 1))
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif

                                        {{-- Trang cuối --}}
                                        @if ($totalPages > 1)
                                            <li class="page-item {{ $currentPage == $totalPages ? 'active' : '' }}">
                                                <a class="page-link hover-white"
                                                    href="{{ $reports->url($totalPages) }}">{{ $totalPages }}</a>
                                            </li>
                                        @endif

                                        {{-- Liên kết Trang Tiếp --}}
                                        <li class="page-item {{ !$reports->hasMorePages() ? 'disabled' : '' }}">
                                            <a class="page-link hover-white" href="{{ $reports->nextPageUrl() }}"
                                                rel="next" aria-label="@lang('pagination.next')">
                                                {{-- <i class="far fa-angle-right"></i> --}}
                                                > {{-- Mũi tên phải --}}
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            @endif
                        </div>
                        <!--end::Card-->
                        <!--begin::Modals-->

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
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
            <link rel="shortcut icon" href="{{ asset('assets/images/tro-moi.png') }}" />
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
            <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
            <meta property="og:url" content="{{ url()->current() }}">
            <meta property="og:site_name" content="Trọ Nhanh">
            <meta property="og:type" content="website">
            <link rel="canonical" href="{{ url()->current() }}">
            <link rel="shortcut icon" href="{{ asset('assets/images/tro-moi.png') }}">
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
        @endpush
