@extends('layouts.admin')
@section('titleAdmin', 'Trang chủ trọ nhanh')
@section('linkAdmin', 'Thêm diện tích')

@section('contentAdmin')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Thêm diện tích</h3>
                        </div>
                    </div>
                    <div id="kt_account_profile_details" class="collapse show">
                        <form id="acreageForm" class="form" action="{{ route('admin.add-acreage') }}" method="POST">
                            @csrf
                            <div class="card-body border-top p-9">
                                <div class="row">
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6 required">Tiêu diện tích</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" id="name" name="name"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Nhập tên kích thước" />
                                            @error('name')
                                                <div class="text-danger mt-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6 required">Kích thước tối
                                            thiểu</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" id="min_size" name="min_size"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Nhập kích thước tối thiểu" />
                                            @error('min_size')
                                                <div class="text-danger mt-3">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6 required">Kích thước tối
                                            đa</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="max_size" id="max_size"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Nhập kích thước tối đa" />
                                            @error('max_size')
                                                <div class="text-danger mt-3">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6 required">Trạng thái</label>
                                        <div class="col-lg-8 fv-row">
                                            <select name="status" class="form-select form-select-solid form-select-lg">
                                                <option value="1">Kích hoạt</option>
                                                <option value="2">Không kích hoạt</option>
                                            </select>
                                            @error('status')
                                                <div class="text-danger mt-3">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Hủy</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    <!--begin::Footer-->

    <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->

    <!--end::Activities drawer-->
    <!--begin::Chat drawer-->

    <!--end::Chat drawer-->
    <!--begin::Exolore drawer toggle-->

    <!--end::Exolore drawer toggle-->
    <!--begin::Exolore drawer-->

    <!--end::Exolore drawer-->
    <!--end::Drawers-->
    <!--begin::Modals-->
    <!--begin::Modal - Invite Friends-->

    <!--end::Modal - Invite Friend-->
    <!--begin::Modal - Create App-->

    <!--end::Modal - Create App-->
    <!--begin::Modal - Upgrade plan-->

    <!--end::Modal - Upgrade plan-->
    <!--end::Modals-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                    fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->



@endsection
@push('styleAdmin')
    <base href="{{ asset('..') }}">
    <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by
        Keenthemes</title>
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
@endpush

@push('scriptsAdmin')
    <script>
        var hostUrl = "{{ asset('assets/') }}";
    </script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/two-factor-authentication.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/seclectmap.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC67NQzqFC2WplLzC_3PsL5gejG1_PZLDk"></script>
    <script src="{{ asset('assets/js/mapapi-ntt.js') }}"></script>
    <script src="{{ asset('assets/js/image-ntt.js') }}"></script>
@endpush