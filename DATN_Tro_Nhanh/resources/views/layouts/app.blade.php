<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    {{-- CSS --}}
    @stack('styleOwner')
</head>

<body>
    <div class="wrapper dashboard-wrapper">
        <div class="d-flex flex-wrap flex-xl-nowrap">
            <x-navbar-owner />
            @yield('contentOwner')
        </div>
    </div>
</body>
{{-- Scription --}}
@stack('scriptOwner')

</html>
