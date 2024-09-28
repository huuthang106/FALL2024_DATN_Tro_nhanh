    @extends('layouts.main')
    @section('titleUs', 'Blog | TRỌ NHANH')
    @section('contentUs')


        @livewire('blog-list')

        {{-- Modal Login - Register --}}
        
    
        {{-- Nút quay lại đầu trang --}}
      
    @endsection
    @push('styleUs')
        {{-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Real Estate Html Template">
        <meta name="author" content="">
        <meta name="generator" content="Jekyll">
        <title>Blog | TRỌ NHANH</title>
        <!-- Google fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet">
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
        <meta name="twitter:title" content="Home 01">
        <meta name="twitter:description" content="Real Estate Html Template">
        <meta name="twitter:image" content="images/homeid-social-logo.png">
        <!-- Facebook -->
        <meta property="og:url" content="home-01.html">
        <meta property="og:title" content="Home 01">
        <meta property="og:description" content="Real Estate Html Template">
        <meta property="og:type" content="website">
        <meta property="og:image" content="images/homeid-social.png">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630"> --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description"
            content="Khám phá các bài viết mới nhất và thông tin hữu ích về thị trường bất động sản trên blog của TRỌ NHANH. Cập nhật tin tức, mẹo và hướng dẫn từ các chuyên gia trong ngành.">
        <meta name="author" content="TRỌ NHANH">
        <meta name="generator" content="TRỌ NHANH">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet">

        <!-- CSS của nhà cung cấp -->
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
        <meta name="twitter:site" content="@TronNhanh">
        <meta name="twitter:creator" content="@TronNhanh">
        <meta name="twitter:title" content="Blog | TRỌ NHANH">
        <meta name="twitter:description"
            content="Khám phá blog của TRỌ NHANH để cập nhật tin tức mới nhất, mẹo và hướng dẫn về bất động sản. Đọc các bài viết từ các chuyên gia trong ngành và tận dụng thông tin hữu ích để hỗ trợ quyết định của bạn.">
        <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

        <!-- Facebook -->
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="Blog | TRỌ NHANH">
        <meta property="og:description"
            content="Khám phá các bài viết mới nhất về thị trường bất động sản trên blog của TRỌ NHANH. Cập nhật tin tức, mẹo và hướng dẫn từ các chuyên gia trong ngành. Đọc ngay để không bỏ lỡ thông tin hữu ích.">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
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
    @endpush
