<div>
    {{-- Be like water. --}}
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
                                {{-- <input type="text" data-kt-user-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search owner" /> --}}
                                <input type="text" wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh"
                                    name="search" placeholder="Tìm kiếm chủ trọ"
                                    class="form-control form-control-solid w-250px ps-14" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            {{-- <div class="p-2" wire:ignore>
                                <div class="input-group input-group-lg bg-white border rounded">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent letter-spacing-093 border-0 pr-0">
                                            <i class="far fa-align-left mr-2"></i>Lọc khoảng thời gian:
                                        </span>
                                    </div>
                                    <select
                                        class="form-control btn btn-light-primary me-3 pl-0  d-flex align-items-center"
                                        wire:model.lazy="timeFilter" wire:key="time-select"
                                        data-style="bg-transparent px-1 py-0 lh-1 font-weight-600 text-body">
                                        <option value="" selected>Chọn khoảng thời gian</option>
                                        <option value="1_day">1 ngày</option>
                                        <option value="7_day">7 ngày</option>
                                        <option value="3_month">3 tháng</option>
                                        <option value="6_month">6 tháng</option>
                                        <option value="1_year">1 năm</option>
                                    </select>
                                </div>
                            </div> --}}

                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
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
                                    <!--end::Svg Icon-->Filter</button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->
                                    <!--begin::Content-->
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                        <!--begin::Input group-->
                                        <div class="mb-10" wire:ignore>
                                            <label class="form-label fs-6 fw-bold">Lọc theo khoảng thời gian:</label>
                                            <select class="form-select form-select-solid fw-bolder"
                                                wire:model.lazy="timeFilter" wire:key="time-select"
                                                data-style="bg-transparent px-1 py-0 lh-1 font-weight-600 text-body">
                                                <option value="" selected>Chọn khoảng thời gian</option>
                                                <option value="1_day">1 ngày</option>
                                                <option value="7_day">7 ngày</option>
                                                <option value="3_month">3 tháng</option>
                                                <option value="6_month">6 tháng</option>
                                                <option value="1_year">1 năm</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-bold">Two Step Verification:</label>
                                            <select class="form-select form-select-solid fw-bolder"
                                                data-kt-select2="true" data-placeholder="Select option"
                                                data-allow-clear="true" data-kt-user-table-filter="two-step"
                                                data-hide-search="true">
                                                <option></option>
                                                <option value="Enabled">Enabled</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset"
                                                class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-user-table-filter="reset">Reset</button>
                                            <button type="submit" class="btn btn-primary fw-bold px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-user-table-filter="filter">Apply</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Filter-->
                                <!--begin::Export-->
                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_export_users">
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
                                    <!--end::Svg Icon-->Export</button>
                                <!--end::Export-->
                                <!--begin::Add user-->
                                <a href="{{ route('admin.create-blog') }}">
                                    <button type="button" class="btn btn-primary" data-bs-toggle=""
                                        data-bs-target="#kt_modal_add_user">
                                        {{-- type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user" --}}
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                    height="2" rx="1"
                                                    transform="rotate(-90 11.364 20.364)" fill="black" />
                                                <rect x="4.36396" y="11.364" width="16" height="2"
                                                    rx="1" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        Add Blogs</button>
                                </a>
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-user-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                            <!--begin::Modal - Adjust Balance-->
                            <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">Export Users</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="black" />
                                                        <rect x="7.41422" y="6" width="16" height="2"
                                                            rx="1" transform="rotate(45 7.41422 6)"
                                                            fill="black" />
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
                                            <form id="kt_modal_export_users_form" class="form" action="#">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold form-label mb-2">Select
                                                        Roles:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="role" data-control="select2"
                                                        data-placeholder="Select a role" data-hide-search="true"
                                                        class="form-select form-select-solid fw-bolder">
                                                        <option></option>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Analyst">Analyst</option>
                                                        <option value="Developer">Developer</option>
                                                        <option value="Support">Support</option>
                                                        <option value="Trial">Trial</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-bold form-label mb-2">Select
                                                        Export
                                                        Format:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="format" data-control="select2"
                                                        data-placeholder="Select a format" data-hide-search="true"
                                                        class="form-select form-select-solid fw-bolder">
                                                        <option></option>
                                                        <option value="excel">Excel</option>
                                                        <option value="pdf">PDF</option>
                                                        <option value="cvs">CVS</option>
                                                        <option value="zip">ZIP</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="text-center">
                                                    <button type="reset" class="btn btn-light me-3"
                                                        data-kt-users-modal-action="cancel">Discard</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
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
                            <!--begin::Modal - Add task-->
                            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_add_user_header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">Add User</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="black" />
                                                        <rect x="7.41422" y="6" width="16" height="2"
                                                            rx="1" transform="rotate(45 7.41422 6)"
                                                            fill="black" />
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
                                            <form id="kt_modal_add_user_form" class="form" action="#">
                                                <!--begin::Scroll-->
                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                    id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                    data-kt-scroll-activate="{default: false, lg: true}"
                                                    data-kt-scroll-max-height="auto"
                                                    data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                    data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                    data-kt-scroll-offset="300px">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                                                        <!--end::Label-->
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline"
                                                            data-kt-image-input="true"
                                                            style="background-image: url(assets/media/avatars/blank.png)">
                                                            <!--begin::Preview existing avatar-->
                                                            <div class="image-input-wrapper w-125px h-125px"
                                                                style="background-image: url(assets/media/avatars/150-1.jpg);">
                                                            </div>
                                                            <!--end::Preview existing avatar-->
                                                            <!--begin::Label-->
                                                            <label
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="change"
                                                                data-bs-toggle="tooltip" title="Change avatar">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="avatar"
                                                                    accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="avatar_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Cancel-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="cancel"
                                                                data-bs-toggle="tooltip" title="Cancel avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Cancel-->
                                                            <!--begin::Remove-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="remove"
                                                                data-bs-toggle="tooltip" title="Remove avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Remove-->
                                                        </div>
                                                        <!--end::Image input-->
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Allowed file types: png, jpg, jpeg.
                                                        </div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-2">Full Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="user_name"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Full name" value="Emma Smith" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-2">Email</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="email" name="user_email"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="example@domain.com"
                                                            value="e.smith@kpmg.com.au" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-5">Role</label>
                                                        <!--end::Label-->
                                                        <!--begin::Roles-->
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="user_role"
                                                                    type="radio" value="0"
                                                                    id="kt_modal_update_role_option_0"
                                                                    checked='checked' />
                                                                <!--end::Input-->
                                                                <!--begin::Label-->
                                                                <label class="form-check-label"
                                                                    for="kt_modal_update_role_option_0">
                                                                    <div class="fw-bolder text-gray-800">
                                                                        Administrator
                                                                    </div>
                                                                    <div class="text-gray-600">Best for business
                                                                        owners
                                                                        and
                                                                        company administrators</div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->
                                                        <div class='separator separator-dashed my-5'></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="user_role"
                                                                    type="radio" value="1"
                                                                    id="kt_modal_update_role_option_1" />
                                                                <!--end::Input-->
                                                                <!--begin::Label-->
                                                                <label class="form-check-label"
                                                                    for="kt_modal_update_role_option_1">
                                                                    <div class="fw-bolder text-gray-800">Developer
                                                                    </div>
                                                                    <div class="text-gray-600">Best for developers
                                                                        or
                                                                        people primarily using the API</div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->
                                                        <div class='separator separator-dashed my-5'></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="user_role"
                                                                    type="radio" value="2"
                                                                    id="kt_modal_update_role_option_2" />
                                                                <!--end::Input-->
                                                                <!--begin::Label-->
                                                                <label class="form-check-label"
                                                                    for="kt_modal_update_role_option_2">
                                                                    <div class="fw-bolder text-gray-800">Analyst
                                                                    </div>
                                                                    <div class="text-gray-600">Best for people who
                                                                        need
                                                                        full access to analytics data, but don't
                                                                        need to
                                                                        update business settings</div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->
                                                        <div class='separator separator-dashed my-5'></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="user_role"
                                                                    type="radio" value="3"
                                                                    id="kt_modal_update_role_option_3" />
                                                                <!--end::Input-->
                                                                <!--begin::Label-->
                                                                <label class="form-check-label"
                                                                    for="kt_modal_update_role_option_3">
                                                                    <div class="fw-bolder text-gray-800">Support
                                                                    </div>
                                                                    <div class="text-gray-600">Best for employees
                                                                        who
                                                                        regularly refund payments and respond to
                                                                        disputes
                                                                    </div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->
                                                        <div class='separator separator-dashed my-5'></div>
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                            <!--begin::Radio-->
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input me-3" name="user_role"
                                                                    type="radio" value="4"
                                                                    id="kt_modal_update_role_option_4" />
                                                                <!--end::Input-->
                                                                <!--begin::Label-->
                                                                <label class="form-check-label"
                                                                    for="kt_modal_update_role_option_4">
                                                                    <div class="fw-bolder text-gray-800">Trial
                                                                    </div>
                                                                    <div class="text-gray-600">Best for people who
                                                                        need
                                                                        to
                                                                        preview content data, but don't need to make
                                                                        any
                                                                        updates</div>
                                                                </label>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Radio-->
                                                        </div>
                                                        <!--end::Input row-->
                                                        <!--end::Roles-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Scroll-->
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-light me-3"
                                                        data-kt-users-modal-action="cancel">Discard</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
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
                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    {{-- Load --}}
                    <div wire:loading class="text-center my-2">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Đang tải...</span>
                        </div>
                    </div>
                    @if ($users->count() > 0)
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            <div
                                                class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                    data-kt-check-target="#kt_table_users .form-check-input"
                                                    value="1" />
                                            </div>
                                        </th>
                                        <th class="min-w-125px">Ảnh</th>
                                        <th class="min-w-125px">Tên</th>
                                        <th class="min-w-125px">Email</th>
                                        {{-- <th class="min-w-125px">Mật Khẩu</th>s --}}
                                        <th class="min-w-125px">Số Điện Thoại</th>
                                        <th class="min-w-125px">Địa Chỉ</th>

                                        <th class="text-end min-w-110px">Tác vụ</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    <!--begin::Table row-->
                                    @foreach ($users as $user)
                                        <tr>
                                            <!--begin::Checkbox-->
                                            <td>
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="1" />
                                                </div>
                                            </td>
                                            <!--end::Checkbox-->
                                            <!--begin::User=-->
                                            <td class="d-flex align-items-center min-w-125px">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                    <a href="{{ route('admin.show-blog', ['slug' => $user->slug]) }}">
                                                        <div class="symbol-label">
                                                            @if ($user->image)
                                                                <img src="{{ asset('assets/images/' . $user->image) }}"
                                                                    alt="User Image" class="img-fluid">
                                                            @else
                                                                <p>No image available</p>
                                                            @endif
                                                        </div>
                                                    </a>
                                                </div>
                                                <!--end::Avatar-->
                                            </td>
                                            <!--end::User=-->
                                            <!--begin::User Details-->
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            {{-- <td>{{ $user->password }}</td> --}}
                                            <td>{{ $user->phone ?: 'Trống' }}</td>
                                            <td>{{ $user->address ?: 'Trống' }}</td>

                                            <!--end::User Details-->
                                            <!--begin::Joined-->
                                            {{-- <td>{{ $user->created_at->format('d/m/Y') }}</td> --}}
                                            <!--end::Joined-->
                                            <!--begin::Action=-->
                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary btn-sm"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">Tác
                                                    vụ
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="26"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('admin.sua-blog', ['slug' => $user->slug]) }}"
                                                            class="menu-link px-3">Chỉnh sửa</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-users-table-filter="delete_row">Xóa</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                    @endforeach
                                    <!--end::Table row-->
                                </tbody>
                                <!--end::Table body-->

                            </table>
                            <!--end::Table-->
                            <!-- Phân trang -->
                            <nav class="mt-4">
                                <ul class="pagination rounded-active justify-content-center">
                                    {{-- Previous Page Link --}}
                                    @if ($users->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="far fa-angle-double-left"></i></span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" wire:click="previousPage"
                                                wire:loading.attr="disabled"><i
                                                    class="far fa-angle-double-left"></i></a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @php
                                        $maxPages = 5; // Số lượng trang hiển thị tối đa
                                        $startPage = max(1, $users->currentPage() - floor($maxPages / 2));
                                        $endPage = min($users->lastPage(), $startPage + $maxPages - 1);

                                        if ($endPage - $startPage < $maxPages - 1) {
                                            $startPage = max(1, $endPage - $maxPages + 1);
                                        }
                                    @endphp

                                    @if ($startPage > 1)
                                        <li class="page-item">
                                            <a class="page-link" wire:click="gotoPage(1)"
                                                wire:loading.attr="disabled">1</a>
                                        </li>
                                        @if ($startPage > 2)
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                        @endif
                                    @endif

                                    @for ($page = $startPage; $page <= $endPage; $page++)
                                        @if ($page == $users->currentPage())
                                            <li class="page-item active">
                                                <span class="page-link">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" wire:click="gotoPage({{ $page }})"
                                                    wire:loading.attr="disabled">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endfor

                                    @if ($endPage < $users->lastPage())
                                        @if ($endPage < $users->lastPage() - 1)
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                        @endif
                                        <li class="page-item">
                                            <a class="page-link" wire:click="gotoPage({{ $users->lastPage() }})"
                                                wire:loading.attr="disabled">{{ $users->lastPage() }}</a>
                                        </li>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($users->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" wire:click="nextPage"
                                                wire:loading.attr="disabled"><i
                                                    class="far fa-angle-double-right"></i></a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="far fa-angle-double-right"></i></span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                            <div class="text-center mt-2">{{ $users->firstItem() }}-{{ $users->lastItem() }} của
                                {{ $users->total() }} kết quả</div>
                        </div>
                    @else
                        <div class="text-center mt-4">Không có dữ liệu.</div>
                    @endif

                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
</div>
