@extends('layouts.owner')
@section('titleOwner', 'Trang chủ trọ nhanh')
@section('contentOwner')
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
      <div class="mb-6">
        <div class="row">
          <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
            <div class="d-flex form-group mb-0 align-items-center">
              <label for="invoice-list_length" class="d-block mr-2 mb-0">Kết quả:</label>
              <select
                    name="invoice-list_length" id="invoice-list_length"
                    aria-controls="invoice-list" class="form-control form-control-lg mr-2 selectpicker"
                    data-style="bg-white btn-lg h-52 py-2 border">
                <option value="7">7</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
              </select>
            </div>
          
          </div>
          <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
            <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
              <input type="text" class="form-control bg-transparent border-1x" placeholder="Tìm..."
                   aria-label=""
                   aria-describedby="basic-addon1">
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
      <div class="table-responsive">
        <table id="notification-list" class="table table-hover bg-white border rounded-lg">
          <thead>
              <tr role="row">
                  <th class="no-sort py-6 pl-6">
                      <label class="new-control new-checkbox checkbox-primary m-auto">
                          <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                      </label>
                  </th>
                  <th class="py-6">Loại</th>
                  <th class="py-6">Dữ liệu</th>
                  <th class="py-6">Trạng thái</th>
                  <th class="py-6">Ngày xóa</th>
                  <th class="py-6">Ngày tạo</th>
                  <th class="py-6">Ngày cập nhật</th>
                  <th class="no-sort py-6">Hành động</th>
              </tr>
          </thead>
          <tbody>
              <tr role="row">
                  <td class="checkbox-column py-6 pl-6">
                      <label class="new-control new-checkbox checkbox-primary m-auto">
                          <input type="checkbox" class="new-control-input child-chk select-customers-info">
                      </label>
                  </td>
                  <td class="align-middle">Loại thông báo</td>
                  <td class="align-middle">Dữ liệu mẫu</td>
                  <td class="align-middle"><span class="badge badge-green text-capitalize">Đã xem</span></td>
                  <td class="align-middle">15-08-2024</td>
                  <td class="align-middle">10-08-2024</td>
                  <td class="align-middle">12-08-2024</td>
                  <td class="align-middle">
                      <a href="#" data-toggle="tooltip" title="Chỉnh sửa" class="d-inline-block fs-18 text-muted hover-primary mr-5">
                          <i class="fal fa-pencil-alt"></i>
                      </a>
                      <a href="#" data-toggle="tooltip" title="Xóa" class="d-inline-block fs-18 text-muted hover-primary">
                          <i class="fal fa-trash-alt"></i>
                      </a>
                  </td>
              </tr>
              <!-- Thêm các dòng dữ liệu mẫu khác tại đây -->
          </tbody>
      </table>
      
      </div>
      <div class="mt-6">
        <nav>
          <ul class="pagination rounded-active justify-content-center">
            <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-left"></i></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
            <li class="page-item">...</li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#"><i
                class="far fa-angle-double-right"></i></a></li>
          </ul>
        </nav>
        <div class="text-center mt-2">6-10 trong 29 Kết quả</div>
      </div>
    </div>
  </main>
  @endsection
  @push('styleOwners')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Real Estate Html Template">
  <meta name="author" content="">
  <meta name="generator" content="Jekyll">
  <title>Invoice Listing - HomeID</title>
  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
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
  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
  <!-- Twitter -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@">
  <meta name="twitter:creator" content="@">
  <meta name="twitter:title" content="Invoice Listing">
  <meta name="twitter:description" content="Real Estate Html Template">
  <meta name="twitter:image" content="{{ asset('assets/images/homeid-social-logo.png') }}">
  <!-- Facebook -->
  <meta property="og:url" content="dashboard-invoice-listing.html">
  <meta property="og:title" content="Invoice Listing">
  <meta property="og:description" content="Real Estate Html Template">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('assets/images/homeid-social.png') }}">
  <meta property="og:image:type" content="{{asset('assets/image/png')}}">
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
