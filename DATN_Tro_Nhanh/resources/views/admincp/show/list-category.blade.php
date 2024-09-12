@extends('layouts.admin')
@section('titleAdmin', 'Danh Sách Loại Phòng | TRỌ NHANH')
@section('linkAdmin', 'Danh sách loại phòng')
@section('contentAdmin')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->

                                <form method="GET" action="{{ route('admin.list-category') }}" class="w-100">
                                    <div class="input-group">
                                        <input type="text" name="query" value="{{ $query }}"
                                            placeholder="Tìm kiếm theo tên..." class="form-control form-control-solid">
                                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </div>
                                </form>
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                                <!--begin::Filter-->
                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Lọc</button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bolder">Tùy chỉnh bộ lọc</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->
                                    <!--begin::Content-->
                                    <div class="px-7 py-5" data-kt-subscription-table-filter="form">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-bold">Tháng:</label>
                                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                                data-placeholder="Chọn tùy chọn" data-allow-clear="true"
                                                data-kt-subscription-table-filter="month" data-hide-search="true">
                                                <option></option>
                                                <option value="jan">Tháng 1</option>
                                                <option value="feb">Tháng 2</option>
                                                <option value="mar">Tháng 3</option>
                                                <option value="apr">Tháng 4</option>
                                                <option value="may">Tháng 5</option>
                                                <option value="jun">Tháng 6</option>
                                                <option value="jul">Tháng 7</option>
                                                <option value="aug">Tháng 8</option>
                                                <option value="sep">Tháng 9</option>
                                                <option value="oct">Tháng 10</option>
                                                <option value="nov">Tháng 11</option>
                                                <option value="dec">Tháng 12</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-bold">Trạng thái:</label>
                                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                                data-placeholder="Chọn tùy chọn" data-allow-clear="true"
                                                data-kt-subscription-table-filter="status" data-hide-search="true">
                                                <option></option>
                                                <option value="1">Kích hoạt</option>
                                                <option value="0">Chưa kích hoạt</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-bold">Phương thức thanh toán:</label>
                                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                                data-placeholder="Chọn tùy chọn" data-allow-clear="true"
                                                data-kt-subscription-table-filter="billing" data-hide-search="true">
                                                <option></option>
                                                <option value="Auto-debit">Tự động trừ</option>
                                                <option value="Manual - Credit Card">Thủ công - Thẻ tín dụng</option>
                                                <option value="Manual - Cash">Thủ công - Tiền mặt</option>
                                                <option value="Manual - Paypal">Thủ công - Paypal</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-bold">Sản phẩm:</label>
                                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                                data-placeholder="Chọn tùy chọn" data-allow-clear="true"
                                                data-kt-subscription-table-filter="product" data-hide-search="true">
                                                <option></option>
                                                <option value="Basic">Cơ bản</option>
                                                <option value="Basic Bundle">Gói Cơ bản</option>
                                                <option value="Teams">Nhóm</option>
                                                <option value="Teams Bundle">Gói Nhóm</option>
                                                <option value="Enterprise">Doanh nghiệp</option>
                                                <option value="Enterprise Bundle">Gói Doanh nghiệp</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset"
                                                class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-subscription-table-filter="reset">Hủy</button>
                                            <button type="submit" class="btn btn-primary fw-bold px-6"
                                                data-kt-menu-dismiss="true" data-kt-subscription-table-filter="filter">Áp
                                                dụng</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Filter-->
                                <!--begin::Export-->
                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_subscriptions_export_modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2"
                                                rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
                                            <path
                                                d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                                fill="black" />
                                            <path
                                                d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                                fill="#C4C4C4" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Xuất dữ liệu</button>
                                <!--end::Export-->
                                <!--begin::Add subscription-->
                                <a href="{{ route('admin.add-category') }}" class="btn btn-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Thêm loại</a>
                                <!--end::Add subscription-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-subscription-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-subscription-table-select="selected_count"></span>Chọn
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-subscription-table-select="delete_selected">Xóa đã chọn</button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_subscriptions_table .form-check-input"
                                                value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-125px">Tên loại</th>
                                    <th class="min-w-125px">Trạng thái</th>
                                    {{-- <th class="min-w-125px">Billing</th>
                                    <th class="min-w-125px">Product</th>
                                    <th class="min-w-125px">Created Date</th> --}}
                                    <th class="text-end min-w-70px">Thao tác</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @foreach ($categories as $category)
                                    <tr>
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::Customer=-->
                                        <td>
                                            <a href="{{ route('admin.edit-category', ['slug' => $category->slug]) }}"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $category->name }}</a>
                                        </td>
                                        <!--end::Customer=-->
                                        <!--begin::Status=-->
                                        <td>
                                            <div
                                                class="badge {{ $category->status ? 'badge-light-success' : 'badge-light-warning' }}">
                                                {{ $category->status ? 'Kích hoạt' : 'Chưa kích hoạt' }}
                                            </div>
                                        </td>
                                        <!--end::Status=-->
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Thao tác
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo8/dist/apps/subscriptions/add.html"
                                                        class="menu-link px-3">Xem chi tiết</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('admin.edit-category', ['slug' => $category->slug]) }}"
                                                        class="menu-link px-3">Chỉnh sửa</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <form action="{{ route('admin.destroy-category', $category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="menu-link px-3 border-0 bg-transparent text-start">Xóa</button>
                                                    </form>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                        <!--end::Card body-->
                        <!-- Hiển thị các liên kết phân trang -->
                        <nav class="mt-4">
                            <ul class="pagination rounded-active justify-content-center">
                                {{-- Previous Page Link --}}
                                @if ($categories->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link"><i class="far fa-angle-double-left"></i></span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $categories->previousPageUrl() }}"><i
                                                class="far fa-angle-double-left"></i></a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                                    @if ($page == $categories->currentPage())
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
                                @if ($categories->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $categories->nextPageUrl() }}"><i
                                                class="far fa-angle-double-right"></i></a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link"><i class="far fa-angle-double-right"></i></span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                        <div class="text-center mt-2">{{ $categories->firstItem() }}-{{ $categories->lastItem() }} của
                            {{ $categories->total() }} kết quả
                        </div>

                    </div>
                    <!--end::Card-->
                    <!--begin::Modals-->
                    <!--begin::Modal - Adjust Balance-->
                    <div class="modal fade" id="kt_subscriptions_export_modal" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bolder">Xuất dữ liệu đăng ký</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div id="kt_subscriptions_export_close"
                                        class="btn btn-icon btn-sm btn-active-icon-primary">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                    transform="rotate(45 7.41422 6)" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                    <!--begin::Form-->
                                    <form id="kt_subscriptions_export_form" class="form" action="#">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-5">Chọn khoảng thời gian:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="Chọn ngày"
                                                name="date" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-5">Chọn định dạng xuất dữ
                                                liệu:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select data-control="select2" data-placeholder="Chọn định dạng"
                                                data-hide-search="true" name="format"
                                                class="form-select form-select-solid">
                                                <option value="excell">Excel</option>
                                                <option value="pdf">PDF</option>
                                                <option value="cvs">CSV</option>
                                                <option value="zip">ZIP</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Row-->
                                        <div class="row fv-row mb-15">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-5">Loại thanh toán:</label>
                                            <!--end::Label-->
                                            <!--begin::Radio group-->
                                            <div class="d-flex flex-column">
                                                <!--begin::Radio button-->
                                                <label
                                                    class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        checked="checked" name="payment_type" />
                                                    <span class="form-check-label text-gray-600 fw-bold">Tất cả</span>
                                                </label>
                                                <!--end::Radio button-->
                                                <!--begin::Radio button-->
                                                <label
                                                    class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                    <input class="form-check-input" type="checkbox" value="2"
                                                        checked="checked" name="payment_type" />
                                                    <span class="form-check-label text-gray-600 fw-bold">Visa</span>
                                                </label>
                                                <!--end::Radio button-->
                                                <!--begin::Radio button-->
                                                <label
                                                    class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                    <input class="form-check-input" type="checkbox" value="3"
                                                        name="payment_type" />
                                                    <span class="form-check-label text-gray-600 fw-bold">Mastercard</span>
                                                </label>
                                                <!--end::Radio button-->
                                                <!--begin::Radio button-->
                                                <label class="form-check form-check-custom form-check-sm form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="4"
                                                        name="payment_type" />
                                                    <span class="form-check-label text-gray-600 fw-bold">American
                                                        Express</span>
                                                </label>
                                                <!--end::Radio button-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" id="kt_subscriptions_export_cancel"
                                                class="btn btn-light me-3">Hủy bỏ</button>
                                            <button type="submit" id="kt_subscriptions_export_submit"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Gửi</span>
                                                <span class="indicator-progress">Vui lòng đợi...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - New Card-->
                    <!--end::Modals-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
        <!--end::Content-->
    @endsection
    @push('styleAdmin')
        <base href="">
        {{-- <title>Danh Sách Loại Phòng | TRỌ NHANH</title> --}}
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
        {{-- <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" /> --}}
        <link rel="shortcut icon" href="{{ asset('assets/images/tro-moi.png') }}" />
        <meta name="success" content="{{ session('success') }}">
        <meta name="error" content="{{ session('error') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{ asset('assets/js/toastr-notification.js') }}"></script>
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
            type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('scriptsAdmin')
        <script>
            var hostUrl = "assets/";
        </script>
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Vendors Javascript(used by this page)-->
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <!--end::Page Vendors Javascript-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="{{ asset('assets/js/custom/apps/subscriptions/list/export.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/subscriptions/list/list.js') }}"></script>
        <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
        <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->
        {{-- Show - Alert --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/alert/category-admin-alert.js') }}"></script>
    @endpush
