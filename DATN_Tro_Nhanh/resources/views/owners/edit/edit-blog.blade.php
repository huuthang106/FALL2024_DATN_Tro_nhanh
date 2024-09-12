@extends('layouts.owner')
@section('titleOwners', 'Chỉnh Sửa Blog | TRỌ NHANH')
@section('contentOwners')

    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15">Sửa Blog
                </h2>
                {{-- <p class="mb-1">Chia sẽ những kinh nghiệm thú vị của bạn ở đây</p> --}}
            </div>
            <div class="collapse-tabs new-property-step">
                <ul class="nav nav-pills border py-2 px-3 mb-6 d-none d-md-flex mb-6" role="tablist">
                    <li class="nav-item col">
                        <a class="nav-link active bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="description-tab" data-toggle="pill" data-number="1." href="#description" role="tab"
                            aria-controls="description" aria-selected="true"><span class="number">1.</span>Mô tả</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="media-tab" data-toggle="pill" data-number="2." href="#media" role="tab"
                            aria-controls="media" aria-selected="false"><span class="number">2.</span>Hình ảnh</a>
                    </li>

                </ul>
                <div class="tab-content shadow-none p-0">
                    <form id="blogForm" action="{{ route('owners.update-blog', ['id' => $blog->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div id="collapse-tabs-accordion">
                            <!-- Phần mô tả -->
                            <div class="tab-pane tab-pane-parent fade show active px-0" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                        id="heading-description">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                data-toggle="collapse" data-number="1." data-target="#description-collapse"
                                                aria-expanded="true" aria-controls="description-collapse">
                                                <span class="number">1.</span>Mô tả
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="description-collapse" class="collapse show collapsible"
                                        aria-labelledby="heading-description" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Thông tin
                                                                bài viết của bạn</h3>
                                                            <div class="form-group">
                                                                <label for="title" class="text-heading"
                                                                    id="title-label">Tiêu đề<span class="text-muted">(bắt
                                                                        buộc)</span></label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0 @error('title') is-invalid @enderror"
                                                                    id="title" name="title"
                                                                    value="{{ old('title', $blog->title) }}">
                                                                @error('title')
                                                                    <span class="error-message text-danger"
                                                                        id="title-error">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group mb-0">
                                                                <label for="description" class="text-heading">Nội
                                                                    dung</label>
                                                                <textarea class="form-control border-0 @error('description') is-invalid @enderror" rows="5" name="description"
                                                                    id="description-field">{{ old('description', $blog->description) }}</textarea>
                                                                @error('description')
                                                                    <span class="error-message text-danger"
                                                                        id="description-error">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button class="btn btn-lg btn-primary next-button" type="button"
                                                    id="nextButton">Tiếp theo
                                                    <span class="d-inline-block ml-2 fs-16"><i
                                                            class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Phần hình ảnh -->
                            <div class="tab-pane tab-pane-parent fade px-0" id="media" role="tabpanel"
                                aria-labelledby="media-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                        id="heading-media">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                data-toggle="collapse" data-number="2." data-target="#media-collapse"
                                                aria-expanded="true" aria-controls="media-collapse">
                                                <span class="number">2.</span>Hình ảnh blog
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="media-collapse" class="collapse collapsible" aria-labelledby="heading-media"
                                        data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-lg-10">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Tải lên
                                                                hình bạn muốn truyền tải cho khách hàng</h3>
                                                            <div class="dropzone upload-file text-center py-5"
                                                                id="myDropzone">
                                                                <div class="dz-default dz-message mb-0">
                                                                    <span class="upload-icon lh-1 d-inline-block mb-4">
                                                                        <i class="fal fa-cloud-upload-alt"></i>
                                                                    </span>
                                                                    <p class="text-heading fs-22 lh-15 mb-4">Kéo và thả
                                                                        hình ảnh hoặc</p>
                                                                    <button class="btn btn-indigo px-7 mb-2"
                                                                        type="button"
                                                                        onclick="document.getElementById('fileInput').click();">Tải
                                                                        lên</button>
                                                                    <input id="fileInput" name="images[]" type="file"
                                                                        hidden >
                                                                </div>
                                                                <div id="imagePreview" class="text-center mt-4">
                                                                    @if(is_array($images) || is_object($images))
                                                                        @foreach ($images as $image)
                                                                            <div class="image-preview mx-auto" data-id="{{ $image->id }}">
                                                                                <img src="{{ asset('assets/images/' . $image->filename) }}" alt="Image" class="img-fluid" style="max-width: 100%; height: auto;">
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        <p>Không có hình ảnh nào.</p>
                                                                    @endif
                                                                </div>
                                                                @error('images')
                                                                    <span class="error-message text-danger"
                                                                        id="images-error">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="#"
                                                    class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i
                                                            class="fal fa-long-arrow-left"></i></span>Phía trước
                                                </a>
                                                <button class="btn btn-lg btn-primary mb-3" type="submit">Gửi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                </div>
                </form>
            </div>



        </div>
        </div>
    </main>
    </div>
    </div>
    </div>


@endsection
@push('styleOwners')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>Chỉnh Sửa Blog | TRỌ NHANH</title> --}}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"> --}}

    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Favicons -->
    {{-- <link rel="icon" href="images/favicon.ico"> --}}
    <link rel="icon" href="{{ asset('assets/images/tro-moi.png') }}" />
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
    <meta property="og:image:height" content="630">
@endpush
@push('scriptOwners')
    {{-- <script src="{{ asset('assets/js/batloi.js') }}"></script> --}}
    <script src="{{ asset('assets/js/tcn.js') }}"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    <!-- Theme scripts -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    {{-- <script src="{{ asset('assets/js/thongbao.js') }}"></script> --}}
@endpush
