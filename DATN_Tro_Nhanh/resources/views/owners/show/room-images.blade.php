@extends('layouts.owner')
@section('titleOwners', 'Ảnh Của Phòng Trọ | TRỌ NHANH')
@section('contentOwners')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15">Ảnh của phòng trọ: {{ $room->title }}</h2>
            </div>
            <table class="table table-hover bg-white border rounded-lg">
                <thead class="thead-sm thead-black">
                    <tr >
                        <th scope="col" class="border-top-0 px-6 pt-5 pb-4" style="white-space: nowrap;">Tiêu đề ảnh</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4" style="white-space: nowrap;">Ngày tải lên</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4" style="white-space: nowrap;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($images->isEmpty())
                        <tr>
                            <td colspan="3">
                                <p class="text-center">Không có ảnh nào.</p>
                            </td>
                        </tr>
                    @else
                        @foreach ($images as $image)
                            <tr class="shadow-hover-xs-2 bg-hover-white">
                                <td class="align-middle pt-6 pb-4 px-6">
                                    <div class="media">
                                        <div class="w-120px mr-4 position-relative">
                                            <img src="{{ asset('assets/images/' . $image->filename) }}" alt="Image"
                                                class="img-fluid">
                                        </div>
                                       
                                    </div>
                                </td>
                                <td class="align-middle">{{ $image->created_at->format('d/m/Y') }}</td>
                                <td class="align-middle" style="white-space: nowrap;">
                                    
                                    <form action="{{ route('owners.delete-room-image', ['id' => $image->id]) }}"
                                        method="POST" class="d-inline-block delete-image-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fal fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <!-- Phân trang -->
            @if ($images->lastPage() > 1)
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Trang trước --}}
                    <li class="page-item {{ $images->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $images->previousPageUrl() }}" aria-label="Previous">
                            <i class="far fa-angle-double-left"></i>
                        </a>
                    </li>

                    {{-- Trang đầu tiên --}}
                    @if ($images->currentPage() > 2)
                        <li class="page-item">
                            <a class="page-link" href="{{ $images->url(1) }}">1</a>
                        </li>
                    @endif

                    {{-- Dấu ba chấm ở đầu nếu cần --}}
                    @if ($images->currentPage() > 3)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif

                    {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                    @for ($i = max(1, $images->currentPage() - 1); $i <= min($images->currentPage() + 1, $images->lastPage()); $i++)
                        <li class="page-item {{ $images->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $images->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Dấu ba chấm ở cuối nếu cần --}}
                    @if ($images->currentPage() < $images->lastPage() - 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif

                    {{-- Trang cuối cùng --}}
                    @if ($images->currentPage() < $images->lastPage() - 1)
                        <li class="page-item">
                            <a class="page-link"
                                href="{{ $images->url($images->lastPage()) }}">{{ $images->lastPage() }}</a>
                        </li>
                    @endif

                    {{-- Trang tiếp theo --}}
                    <li class="page-item {{ $images->currentPage() == $images->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $images->nextPageUrl() }}" aria-label="Next">
                            <i class="far fa-angle-double-right"></i>
                        </a>
                    </li>
                </ul>
            @endif

            <div class="text-right">
                <a href="{{ route('owners.room-view-update', $room->slug) }}" class="btn btn-primary">Quay lại</a>
            </div>
        </div>
    </main>
@endsection
@push('styleOwners')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="TRỌ NHANH">
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
    <link rel="stylesheet" href="{{ asset('assets/css/toan.css') }}">
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
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
        content="Khám phá bộ sưu tập ảnh chi tiết về phòng trọ trên TRỌ NHANH. Xem các hình ảnh chất lượng cao và thông tin chi tiết về các phòng trọ.">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">

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

    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/toan.css') }}">

    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Link Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TroNanh">
    <meta name="twitter:creator" content="@TroNanh">
    <meta name="twitter:title" content="Ảnh Của Phòng Trọ | TRỌ NHANH">
    <meta name="twitter:description"
        content="Khám phá bộ sưu tập ảnh chi tiết về phòng trọ trên TRỌ NHANH. Xem các hình ảnh chất lượng cao và thông tin chi tiết về các phòng trọ.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Ảnh Của Phòng Trọ | TRỌ NHANH">
    <meta property="og:description"
        content="Khám phá bộ sưu tập ảnh chi tiết về phòng trọ trên TRỌ NHANH. Xem các hình ảnh chất lượng cao và thông tin chi tiết về các phòng trọ.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
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
    <script>
        window.zoneData = {
            provinceId: '{{ $room->province }}',
            districtId: '{{ $room->district }}',
            communeId: '{{ $room->village }}'
        };
    </script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    {{-- Show - Alert --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/alert/room-owners-alert.js') }}"></script> --}}
    {{-- Link Axios  --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/province/api-province.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/province/api-province-update.js') }}"></script> --}}
    {{-- Map OpenStreetMap + Laft --}}
    {{-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="{{ asset('assets/js/map/map.js') }}"></script> --}}

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC67NQzqFC2WplLzC_3PsL5gejG1_PZLDk&libraries=places">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-update-zone-nht.js') }}"></script>
    <script src="{{ asset('assets/js/api-ggmap-nht.js') }}"></script>
    <script src="{{ asset('assets/js/alert/room-owners-alert.js') }}"></script>
    <!-- Bao gồm SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/7cho.js') }}"></script>
@endpush
