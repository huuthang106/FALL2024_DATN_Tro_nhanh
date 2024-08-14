<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styleAdmin')
</head>

<body class="font-sans antialiased">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <x-navbar-admin />
            <!--end::Header-->
            @yield('contentAdmin')
            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-bold me-1">2024©</span>
                        <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Trọ Nhanh</a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                        <li class="menu-item">
                            <a href="#" target="_blank" class="menu-link px-2">Về chúng tôi</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" target="_blank" class="menu-link px-2">Hỗ trợ</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" target="_blank" class="menu-link px-2">Mua</a>
                        </li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Container-->
            </div>
</body>
@stack('scriptsAdmin')

</html>
