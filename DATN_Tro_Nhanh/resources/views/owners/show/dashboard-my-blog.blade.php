@extends('layouts.owner')
@section('titleOwners', 'Trang chủ trọ nhanh')
@section('contentOwners')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
            <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                <div class="mr-0 mr-md-auto">
                    <h2 class="mb-0 text-heading fs-22 lh-15">
                        Blog sản của tôi
                        <span class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">
                            {{ $blogs->total() }}
                        </span>
                    </h2>
                    
                    <p>Xem thêm</p>
                </div>
                <div class="form-inline justify-content-md-end mx-n2">
                    <div class="p-2">
                        <div class="input-group input-group-lg bg-white border">
                            <div class="input-group-prepend">
                                <button class="btn pr-0 shadow-none" type="button"><i class="far fa-search"></i></button>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0 shadow-none text-body"
                                placeholder="Tìm kiếm danh sách" name="search">
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="input-group input-group-lg bg-white border">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent letter-spacing-093 border-0 pr-0"><i
                                        class="far fa-align-left mr-2"></i>Sắp xếp theo:</span>
                            </div>
                            <select class="form-control bg-transparent pl-0 selectpicker d-flex align-items-center sortby"
                                name="sort-by" data-style="bg-transparent px-1 py-0 lh-1 font-weight-600 text-body"
                                id="status">
                                <option>Chữ cái</option>
                                <option>Giá - Thấp đến Cao</option>
                                <option>Giá - Cao đến Thấp</option>
                                <option>Ngày - Cũ đến Mới</option>
                                <option>Ngày - Mới đến Cũ</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover bg-white border rounded-lg">
                    <thead class="thead-sm thead-black">
                        <tr>
                            <th scope="col" class="border-top-0 px-6 pt-5 pb-4">Ảnh</th>
                            <th scope="col" class="border-top-0 pt-5 pb-4">Tiêu Đề</th>
                            <th scope="col" class="border-top-0 pt-5 pb-4">Mô Tả</th>
                            <th scope="col" class="border-top-0 pt-5 pb-4">Trạng thái</th>
                            <th scope="col" class="border-top-0 pt-5 pb-4">Ngày xuất bản</th>
                            <th scope="col" class="border-top-0 pt-5 pb-4">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr class="shadow-hover-xs-2 bg-hover-white">
                                <td class="align-middle pt-6 pb-4 px-6">
                                    <div class="media d-flex align-items-center">
                                        <div class="w-120px mr-4 position-relative">
                                            <a href="{{ route('owners.show-blog', $blog->slug) }}">
                                                @if ($blog->image)
                                                    @foreach ($blog->image as $item)
                                                        <img src="{{ asset('assets/images/' . $item->filename) }}"
                                                            alt="{{ $item->filename }}" class="img-fluid">
                                                    @endforeach
                                                @else
                                                    <p>No images available</p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">{{ $blog->title }}</td>
                                <td class="align-middle">{{ $blog->description }}</td>
                                <td class="align-middle">
                                    <span
                                        class="badge text-capitalize font-weight-normal fs-12 badge-yellow">{{ $blog->status }}</span>
                                </td>
                                <td class="align-middle">{{ $blog->created_at->format('d-m-Y') }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('owners.sua-blog', ['slug' => $blog->slug]) }}" data-toggle="tooltip"
                                        title="Chỉnh sửa" class="d-inline-block fs-18 text-muted hover-primary mr-5">
                                        <i class="fal fa-pencil-alt"></i>
                                    </a>




                                    <a href="" data-toggle="tooltip" title="Xóa"
                                        class="d-inline-block fs-18 text-muted hover-primary">
                                        <i class="fal fa-trash-alt"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <nav class="mt-4">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($blogs->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link"><i class="far fa-angle-double-left"></i></span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $blogs->previousPageUrl() }}"><i class="far fa-angle-double-left"></i></a>
                        </li>
                    @endif
            
                    {{-- Pagination Elements --}}
                    @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                        @if ($page == $blogs->currentPage())
                            <li class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
            
                    {{-- Next Page Link --}}
                    @if ($blogs->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $blogs->nextPageUrl() }}"><i class="far fa-angle-double-right"></i></a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link"><i class="far fa-angle-double-right"></i></span>
                        </li>
                    @endif
                </ul>
            </nav>
            <div class="text-center mt-2">{{ $blogs->firstItem() }}-{{ $blogs->lastItem() }} của {{ $blogs->total() }} kết quả</div>
            
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
    <title>My Properties - HomeID</title>
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
