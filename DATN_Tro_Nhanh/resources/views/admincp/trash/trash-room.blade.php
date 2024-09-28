@extends('layouts.admin')
@section('titleAdmin', 'Thùng Rác Phòng Trọ | TRỌ NHANH')
@section('linkAdmin', 'Thùng rác phòng trọ')

@section('contentAdmin')
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
                                <input type="text" data-kt-user-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search room" />
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
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                    data-kt-check-target="#kt_table_users .form-check-input"
                                                    value="1" />
                                            </div>
                                        </th>
                                        <th class="min-w-125px">Ảnh</th>
                                        <th class="min-w-125px">Tiêu Đề</th>
                                        <th class="min-w-125px">Mô Tả</th>
                                        {{-- <th class="min-w-125px">Số lượng</th> --}}
                                        <th class="min-w-125px">Giá</th>
                                        <th class="min-w-125px">Địa chỉ</th>
                                        <th class="text-start" style="width: 270px;">Tác vụ</th>

                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    <!--begin::Table row-->
                                    @foreach ($trashedRooms as $room)
                                        <tr>
                                            <!--begin::Checkbox-->
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $room->id }}" />
                                                </div>
                                            </td>
                                            <!--end::Checkbox-->
                                            <!--begin::User=-->
                                            <td class="d-flex align-items-center min-w-125px">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-100px overflow-hidden me-3">
                                                    <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}">
                                                        <div class="symbol-label">
                                                            @if ($room->images->isNotEmpty())
                                                                @php
                                                                    // Get the first image
                                                                    $image = $room->images->first();
                                                                @endphp
                                                                <img src="{{ asset('assets/images/' . $image->filename) }}"
                                                                    alt="{{ $room->title }}">
                                                            @else
                                                                <img src="{{ asset('assets/images/blog-details.jpg') }}"
                                                                    alt="{{ $room->title }}">
                                                            @endif
                                                        </div>
                                                    </a>

                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::User details-->
                                                <div class="d-flex flex-column">
                                                    <a href="" class="text-gray-800 text-hover-primary mb-1"></a>
                                                </div>
                                                <!--begin::User details-->
                                            </td>
                                            <!--end::User=-->
                                            <!--begin::Role=-->

                                            <!--end::Role=-->
                                            <!--begin::Last login=-->
                                            <td>
                                                {{ $room->title }}
                                            </td>
                                            <!--end::Last login=-->
                                            <!--begin::Two step=-->
                                            <td>{{ $room->description }}</td>
                                            <!--end::Two step=-->
                                            <!--begin::Joined-->
                                            <td>{{ $room->price }} VND</td>
                                            <!--begin::Joined-->
                                            <td><small>{{ $room->address }}</small></td>
                                            <!--begin::Action=-->
                                            <td class="d-flex justify-content-between align-items-center">
                                                <form action="{{ route('admin.restore-room', $room->id) }}" method="POST"
                                                    class="me-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary">Khôi phục</button>
                                                </form>
                                                <form action="{{ route('admin.forceDelete-room', $room->id) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xóa vĩnh viễn</button>
                                                </form>
                                            </td>

                                            <!--end::Menu-->

                                            <!--end::Action=-->
                                        </tr>
                                    @endforeach
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                </tbody>

                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
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
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                    fill="black" />
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
    {{-- <base href="{{ asset('..') }}">
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
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle--> --}}
    <base href="{{ asset('') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Trang quản lý các phòng trọ đã xóa trên hệ thống TRỌ NHANH. Dễ dàng khôi phục phòng trọ và quản lý hiệu quả." />
    <meta name="keywords"
        content="thùng rác phòng trọ, quản lý phòng trọ, khôi phục phòng trọ, cho thuê phòng trọ, TRỌ NHANH, quảng cáo cho thuê phòng, phòng trọ đã xóa, khôi phục phòng trọ" />
    <meta name="author" content="TRỌ NHANH">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Thùng Rác Phòng Trọ - Quản Lý Phòng Trọ Đã Xóa - TRỌ NHANH">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="TRỌ NHANH">
    <meta property="og:description"
        content="Trang quản lý phòng trọ đã xóa, giúp bạn khôi phục và quản lý phòng trọ một cách nhanh chóng và tiện lợi." />
    <meta property="og:image" content="{{ asset('assets/images/logo-nav.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}">
    <meta name="success" content="{{ session('success') }}">
    <meta name="error" content="{{ session('error') }}">

    <!-- Toastr Notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/toastr-notification.js') }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <!-- Global Stylesheets Bundle -->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css">
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
    {{-- Show - Alert --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/alert/category-admin-alert.js') }}"></script>
@endpush
