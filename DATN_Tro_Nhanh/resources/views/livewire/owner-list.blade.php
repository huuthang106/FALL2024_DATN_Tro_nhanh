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
                                    <!--end::Svg Icon-->Lọc</button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bolder">Lựa chọn</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->
                                    <!--begin::Content-->
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-bold">Lọc theo:</label>
                                            <select class="form-select form-select-solid fw-bolder sortby"
                                                wire:model.lazy="timeFilter" id="timeFilter"
                                                data-style="bg-transparent px-1 py-0 lh-1 font-weight-600 text-body">
                                                <option value="" selected>Chọn khoảng thời gian:</option>
                                                <option value="1_day">1 ngày</option>
                                                <option value="7_day">7 ngày</option>
                                                <option value="1_month">1 tháng</option>
                                                <option value="3_month">3 tháng</option>
                                                <option value="6_month">6 tháng</option>
                                                <option value="1_year">1 năm</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <!-- <div class="mb-10">
                                            <label class="form-label fs-6 fw-bold">Two Step Verification:</label>
                                            <select class="form-select form-select-solid fw-bolder"
                                                data-kt-select2="true" data-placeholder="Select option"
                                                data-allow-clear="true" data-kt-user-table-filter="two-step"
                                                data-hide-search="true">
                                                <option></option>
                                                <option value="Enabled">Enabled</option>
                                            </select>
                                        </div> -->
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Filter-->
                                <!--begin::Export-->

                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->

                            <!--end::Group actions-->
                            <!--begin::Modal - Adjust Balance-->

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
                    {{-- <div wire:loading class="text-center my-2">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Đang tải...</span>
                        </div>
                    </div> --}}
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <!--begin::Table head-->
                                <thead class="table text-nowrap">
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
                                        <th class="w-10 text-nowrap">Ảnh</th>
                                        <th class="w-15 text-nowrap">Tên</th>
                                        <th class="w-20 text-nowrap">Email</th>
                                        <th class="w-15 text-nowrap">Số Điện Thoại</th>
                                        <th class="w-20 text-nowrap">Địa Chỉ</th>
                                        <th class="w-10 text-nowrap">Trạng thái</th>
                                        <th class="w-10 text-nowrap">Tác vụ</ </tr>
                                            <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    <!--begin::Table row-->
                                    @if ($users->isEmpty())
                                        <!-- Hiển thị khi không có dữ liệu -->
                                        <tr>
                                            <td colspan="7" class="text-center">Không có dữ liệu.</td>
                                        </tr>
                                    @else
                                        @foreach ($users as $user)
                                            <tr>
                                                <!--begin::Checkbox-->
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="1" />
                                                    </div>
                                                </td>
                                                <!--end::Checkbox-->
                                                <!--begin::User=-->
                                                <td class="d-flex align-items-center min-w-125px">
                                                    <!--begin:: Avatar -->
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <a
                                                            href="{{ route('admin.show-blog', ['slug' => $user->slug]) }}">
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
                                                <td>
                                                    @if ($user->status == 3)
                                                        <span class="badge badge-warning">Tài khoản hạn chế</span>
                                                    @else
                                                        <span class="badge badge-primary">Hoạt động</span>
                                                    @endif
                                                </td>
                                                <!--end::User Details-->
                                                <!--begin::Joined-->
                                                {{-- <td>{{ $user->created_at->format('d/m/Y') }}</td> --}}
                                                <!--end::Joined-->
                                                <!--begin::Action=-->
                                                <td class="">

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#blockAccountModal-{{ $user->id }}"
                                                    data-user-id="{{ $user->id }}">
                                                    Khóa
                                                </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="blockAccountModal-{{ $user->id }}" tabindex="-1"
                                                        aria-labelledby="blockAccountModalLabel-{{ $user->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="blockAccountModalLabel-{{ $user->id }}">Khóa tài khoản</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Form để gửi dữ liệu -->
                                                                    <form id="blockAccountForm-{{ $user->id }}" method="POST"
                                                                        action="{{ route('admin.owner-lock', $user->id) }}">
                                                                        @csrf <!-- Thêm token bảo mật -->
                                                                        <div class="mb-3">
                                                                            <label for="blockDays" class="form-label text-start d-block">Số ngày khóa tài khoản</label>
                                                                            <input type="number" class="form-control" id="blockDays" name="blockDays" required>
                                                                            @error('blockDays')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                
                                                                        <div class="mb-3">
                                                                            <label for="blockReason" class="form-label text-start d-block">Lý do khóa tài khoản</label>
                                                                            <textarea class="form-control" id="blockReason" name="blockReason" rows="3" required></textarea>
                                                                            @error('blockReason')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                                    <!-- Nút submit form -->
                                                                    <button type="submit" form="blockAccountForm-{{ $user->id }}" class="btn btn-danger">Xác nhận khóa</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                        @endforeach
                                        <!--end::Table row-->
                                    @endif
                                </tbody>
                                <!--end::Table body-->

                            </table>
                        </div>
                        <!--end::Table-->
                        <!-- Phân trang -->
                        @if ($users->hasPages())
                            <nav aria-label="Page navigation">
                                <ul class="pagination rounded-active justify-content-center">
                                    {{-- Nút về đầu --}}

                                    <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link hover-white" wire:click="gotoPage(1)"
                                            wire:loading.attr="disabled" rel="prev"
                                            aria-label="@lang('pagination.previous')"><i
                                                class="fas fa-angle-double-left"></i></a>
                                    </li>



                                    @php
                                        $totalPages = $users->lastPage();
                                        $currentPage = $users->currentPage();
                                        $visiblePages = 3; // Số trang hiển thị ở giữa
                                    @endphp

                                    {{-- Trang đầu --}}
                                    <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                                        <a class="page-link hover-white" wire:click="gotoPage(1)"
                                            wire:loading.attr="disabled">1</a>
                                    </li>

                                    {{-- Dấu ba chấm đầu --}}
                                    @if ($currentPage > $visiblePages)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif

                                    {{-- Các trang giữa --}}
                                    @foreach (range(max(2, min($currentPage - 1, $totalPages - $visiblePages + 1)), min(max($currentPage + 1, $visiblePages), $totalPages - 1)) as $i)
                                        @if ($i > 1 && $i < $totalPages)
                                            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                                <a class="page-link hover-white"
                                                    wire:click="gotoPage({{ $i }})"
                                                    wire:loading.attr="disabled">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    {{-- Dấu ba chấm cuối --}}
                                    @if ($currentPage < $totalPages - ($visiblePages - 1))
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif

                                    {{-- Trang cuối --}}
                                    @if ($totalPages > 1)
                                        <li class="page-item {{ $currentPage == $totalPages ? 'active' : '' }}">
                                            <a class="page-link hover-white"
                                                wire:click="gotoPage({{ $totalPages }})"
                                                wire:loading.attr="disabled">{{ $totalPages }}</a>
                                        </li>
                                    @endif


                                    <li class="page-item {{ !$users->hasMorePages() ? 'disabled' : '' }}">
                                        <a class="page-link hover-white"
                                            wire:click="gotoPage({{ $users->lastPage() }})"
                                            wire:loading.attr="disabled" rel="next"
                                            aria-label="@lang('pagination.next')"><i
                                                class="fas fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        @endif
                        {{-- <div class="text-center mt-2">{{ $users->firstItem() }}-{{ $users->lastItem() }} của
                                {{ $users->total() }} kết quả</div> --}}
                    </div>

                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
</div>
