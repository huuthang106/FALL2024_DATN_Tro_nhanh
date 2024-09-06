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
            <form action="{{ route('owners.properties') }}" method="GET">
               
                <div class="mb-6">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                            <div class="d-flex form-group mb-0 align-items-center">
                                <label for="invoice-list_length" class="d-block mr-2 mb-0">Kết quả:</label>
                                <select name="invoice-list_length" id="invoice-list_length" aria-controls="invoice-list"
                                    class="form-control form-control-lg mr-2 selectpicker"
                                    data-style="bg-white btn-lg h-52 py-2 border">
                                    <option value="7">7</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="align-self-center">
                                <a href="{{ route('owners.blog') }}" class="btn btn-primary btn-lg" tabindex="0" aria-controls="invoice-list">
                                    <span>Thêm mới</span>
                                </a>
                            </div>
                            
                        </div>
                        <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                            <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                                <input type="text" class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..."
                                    aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-append position-absolute pos-fixed-right-center">
                                    <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                            class="fal fa-search"></i></button>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <button class="btn btn-danger btn-lg" tabindex="0"
                                    aria-controls="invoice-list"><span>Xóa</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                            <tr class="shadow-hover-xs-2 ">
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
                                    @if ($blog->status == 1)
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-yellow">Chờ xác nhận</span>
                                    @elseif ($blog->status == 2)
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-green">Đã xác nhận</span>
                                    @else
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-gray">Chưa xác định</span>
                                    @endif
                                </td>
                                
                                <td class="align-middle">{{ $blog->created_at->format('d-m-Y') }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('owners.sua-blog', ['slug' => $blog->slug]) }}" data-toggle="tooltip"
                                        title="Chỉnh sửa" class="d-inline-block fs-18 text-muted hover-primary mr-5">
                                        <i class="fal fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('owners.destroy-blog', $blog->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="fs-18 text-muted hover-primary border-0 bg-transparent"><i
                                                class="fal fa-trash-alt"></i></button>
                                    </form>
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
                    @php
                        $totalPages = $blogs->lastPage();
                        $currentPage = $blogs->currentPage();
                        $startPage = 1;
                        $endPage = $totalPages;
                        $pageRange = 2; // Number of pages to display before and after the current page
                    @endphp
            
                    {{-- Display the first page --}}
                    @if ($currentPage > $pageRange + 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $blogs->url($startPage) }}">{{ $startPage }}</a>
                        </li>
                        @if ($currentPage > $pageRange + 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif
            
                    {{-- Display pages around the current page --}}
                    @for ($i = max($startPage, $currentPage - $pageRange); $i <= min($endPage, $currentPage + $pageRange); $i++)
                        @if ($i == $currentPage)
                            <li class="page-item active">
                                <span class="page-link">{{ $i }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
            
                    {{-- Display the last page --}}
                    @if ($currentPage < $endPage - $pageRange)
                        @if ($currentPage < $endPage - $pageRange - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $blogs->url($endPage) }}">{{ $endPage }}</a>
                        </li>
                    @endif
            
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
            
            <div class="text-center mt-2">{{ $blogs->firstItem() }}-{{ $blogs->lastItem() }} của {{ $blogs->total() }}
                kết quả</div>
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
