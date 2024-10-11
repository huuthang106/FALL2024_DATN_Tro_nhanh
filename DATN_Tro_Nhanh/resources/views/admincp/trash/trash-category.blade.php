@extends('layouts.admin')
@section('titleAdmin', 'Thùng Rác Loại Phòng | TRỌ NHANH')
@section('linkAdmin', 'Thùng rác loại phòng')
@section('contentAdmin')
    <!--begin::Content-->
    @livewire('transh-category-admin')
    <!--end::Content-->
    <!--begin::Footer-->

    <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description"
            content="Trang quản lý các loại phòng đã xóa trên hệ thống TRỌ NHANH. Xem và khôi phục các loại phòng đã bị xóa, quản lý nội dung một cách hiệu quả.">
        <meta name="keywords"
            content="thùng rác loại phòng, quản lý loại phòng, khôi phục loại phòng, TRỌ NHANH, quản lý phòng trọ, khôi phục dữ liệu, xóa phòng">
        <meta name="author" content="TRỌ NHANH">
        <meta property="og:locale" content="vi_VN">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Thùng Rác Loại Phòng - TRỌ NHANH">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:site_name" content="TRỌ NHANH">
        <meta property="og:description"
            content="Xem và khôi phục các loại phòng đã bị xóa trên hệ thống TRỌ NHANH. Quản lý nội dung dễ dàng và hiệu quả.">
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
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <!-- Page Vendor Stylesheets -->
        <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
            type="text/css">
        <!-- Global Stylesheets Bundle -->
        <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css">
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
