<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
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

                                <input type="text" wire:model.lazy="search" wire:keydown.debounce.500ms="$refresh"
                                    name="search" placeholder="Tìm kiếm loại phòng"
                                    class="form-control form-control-solid w-250px ps-14" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
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
                                        <th class="min-w-100px">Trạng thái</th>
                                        <th class="text-end min-w-10px" style="padding-right: 15px;">Tác vụ</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    @foreach ($trashedCategories as $category)
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
                                                <div class="dropdown">
                                                        <button
                                                            class="btn btn-light btn-active-light-primary btn-sm dropdown-toggle"
                                                            type="button" id="dropdownMenuButton-{{ $category->id }}"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Tác vụ
                                                        </button>
                                                        <ul class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                            aria-labelledby="dropdownMenuButton-{{ $category->id }}">
                                                            <li class="menu-item px-3">
                                                                <form action="{{ route('admin.restore-category', $category->id) }}"
                                                                method="POST" class="me-2">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="menu-link px-3 border-0 bg-transparent text-start">Khôi phục</button>
                                                                </form>
                                                            </li> 
                                                            <li class="menu-item px-3">
                                                                <form action="{{ route('admin.forceDelete-category', $category->id) }}"
                                                                method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="menu-link px-3 border-0 bg-transparent text-start">Xóa vĩnh viễn</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                </div>
                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                        <!--end::Card body-->
                        <!-- Hiển thị các liên kết phân trang -->
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
</div>
