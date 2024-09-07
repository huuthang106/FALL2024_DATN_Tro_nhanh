 @extends('layouts.owner')
 @section('titleOwners', 'Trang chủ trọ nhanh')
 @section('contentOwners')

     @if (session('error'))
         <div class="alert alert-danger">
             {{ session('error') }}
         </div>
     @endif

     @if (session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
     @endif

     <main id="content" class="bg-gray-01">
         <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
             <div class="mr-0 mr-md-auto">
                 <h2 class="mb-0 text-heading fs-22 lh-15">Danh sách trọ<span
                         class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">{{ $roomCount }}</span>
                 </h2>
             </div>
             @livewire('room-owners-list')
         </div>
     </main>

     </div>
     </div>
     </div>

     <!-- Vendors scripts -->



 @endsection
 @push('styleOwners')
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="Real Estate Html Template">
     <meta name="author" content="">
     <meta name="generator" content="Jekyll">
     <title>Danh Sách Phòng Trọ | TRỌ NHANH</title>
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
     <link rel="icon" href="{{ asset('images/favicon.ico') }}">
     <!-- Twitter -->
     <meta name="twitter:card" content="summary">
     <meta name="twitter:site" content="@">
     <meta name="twitter:creator" content="@">
     <meta name="twitter:title" content="Home 01">
     <meta name="twitter:description" content="Real Estate Html Template">
     <meta name="twitter:image" content="{{ asset('images/homeid-social-logo.png') }}">

     <!-- Facebook -->
     <meta property="og:url" content="{{ url('/home-01.php') }}">
     <meta property="og:title" content="Home 01">
     <meta property="og:description" content="Real Estate Html Template">
     <meta property="og:type" content="website">
     <meta property="og:image" content="{{ asset('images/homeid-social.png') }}">
     <meta property="og:image:type" content="image/png">
     <meta property="og:image:width" content="1200">
     <meta property="og:image:height" content="630">
 @endpush
 @push('scriptOwners')
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
