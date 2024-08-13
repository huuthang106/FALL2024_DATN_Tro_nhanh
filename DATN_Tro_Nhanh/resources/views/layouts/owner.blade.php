<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styleOwners')
</head>

<body class="font-sans antialiased">
    <div class="wrapper dashboard-wrapper">
        <div class="d-flex flex-wrap flex-xl-nowrap">
            <!--begin::Aside-->
            <x-navbar-Owner />
            <!--end::Header-->
            @yield('contentOwners')
</body>
@stack('scriptOwners')

</html>
