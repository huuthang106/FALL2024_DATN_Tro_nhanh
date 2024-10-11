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
                                    name="search" placeholder="Tìm kiếm người dùng"
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

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    {{-- Load --}}

                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        {{-- <th class="w-10px pe-2">
                                            <div
                                                class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                    data-kt-check-target="#kt_table_users .form-check-input"
                                                    value="1" />
                                            </div>
                                        </th> --}}
                                        <th class="w-50px">Ảnh</th>
                                        <th class="min-w-125px">Tên</th>
                                        <th class="min-w-125px">Email</th>
                                        <th class="min-w-125px">Số Điện Thoại</th>
                                        <th class="min-w-100px">Địa Chỉ</th>
                                        <th class="min-w-100px">Trạng thái</th>
                                        <th class="text-center min-w-30px">Tác vụ</th>
                                    </tr>
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
                                                {{-- <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="1" />
                                                    </div>
                                                </td> --}}
                                                <!--end::Checkbox-->
                                                <!--begin::User=-->
                                                <td class="d-flex align-items-center min-w-125px">
                                                    <!--begin:: Avatar -->
                                                    <small>
                                                        <div
                                                            class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                            <a
                                                                href="{{ route('admin.show-blog', ['slug' => $user->slug]) }}">
                                                                <div class="symbol-label">
                                                                    @if ($user->image)
                                                                        <img src="{{ asset('assets/images/' . $user->image) }}"
                                                                            alt="User Image" class="img-fluid">
                                                                    @else
                                                                        <p><img src="{{ asset('assets/images/agent-25.jpg') }}"
                                                                                alt="User Image" class="img-fluid">
                                                                        </p>
                                                                    @endif
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </small>
                                                    <!--end::Avatar-->
                                                </td>
                                                <!--end::User=-->
                                                <!--begin::User Details-->
                                                <td><small>{{ $user->name }}</small></td>
                                                <td><small>{{ $user->email }}</small></td>
                                                {{-- <td>{{ $user->password }}</td> --}}
                                                <td><small>{{ $user->phone ?: 'Trống' }}</small></td>
                                                <td><small>{{ $user->address ?: 'Trống' }}</small></td>
                                                <td>
                                                    <small>
                                                        @if ($user->status == 3)
                                                            <span class="badge badge-warning">Tài khoản hạn chế</span>
                                                        @else
                                                            <span class="badge badge-primary">Hoạt động</span>
                                                        @endif
                                                    </small>
                                                </td>
                                                <!--end::User Details-->
                                                <!--begin::Joined-->
                                                {{-- <td>{{ $user->created_at->format('d/m/Y') }}</td> --}}
                                                <!--end::Joined-->
                                                <!--begin::Action=-->
                                                {{-- <td class="text-center">
                                                    <a href="#"
                                                        class="btn btn-light btn-active-light-primary btn-sm"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end"><small>Cấp role</small>
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
                                                            <form
                                                                action="{{ route('admin.update-role-admin', $user->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="menu-link px-3"
                                                                    style="border:none; background:none; cursor:pointer;">Admin</button>
                                                            </form>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <form
                                                                action="{{ route('admin.update-role-user', $user->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="menu-link px-3"
                                                                    style="border:none; background:none; cursor:pointer;">Chủ
                                                                    trọ</button>
                                                            </form>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <button type="button" class="menu-link px-3"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#blockAccountModal"
                                                                data-user-id="{{ $user->id }}"
                                                                style="border:none; background:none; cursor:pointer;">
                                                                Khóa
                                                            </button>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->
                                                </td> --}}
                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-light btn-active-light-primary btn-sm dropdown-toggle"
                                                            type="button" id="dropdownMenuButton-"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Tác vụ
                                                            {{-- <span class="svg-icon svg-icon-5 m-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="26"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span> --}}
                                                        </button>
                                                        <ul class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                            aria-labelledby="dropdownMenuButton-">
                                                            <li class="menu-item px-3">
                                                                <form
                                                                    action="{{ route('admin.update-role-admin', $user->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="menu-link px-3"
                                                                        style="border:none; background:none; cursor:pointer;">Admin</button>
                                                                </form>
                                                            </li>
                                                            <li class="menu-item px-3">
                                                                <form
                                                                    action="{{ route('admin.update-role-user', $user->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="menu-link px-3"
                                                                        style="border:none; background:none; cursor:pointer;">Chủ
                                                                        trọ</button>
                                                                </form>
                                                            </li>
                                                            <li class="menu-item px-3">
                                                                <button type="button" class="menu-link px-3"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#blockAccountModal"
                                                                    data-user-id="{{ $user->id }}"
                                                                    style="border:none; background:none; cursor:pointer;">
                                                                    Khóa
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                        @endforeach
                                        <!-- Modal -->
                                        <div class="modal fade" id="blockAccountModal" tabindex="-1"
                                            aria-labelledby="blockAccountModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="blockAccountModalLabel">Khóa tài
                                                            khoản</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form để gửi dữ liệu -->
                                                        <form id="blockAccountForm" method="POST"
                                                            action="{{ route('admin.lock-account', $user->id) }}">
                                                            @csrf <!-- Thêm token bảo mật -->
                                                            <div class="mb-3">
                                                                <label for="blockDays"
                                                                    class="form-label text-start d-block">Số
                                                                    ngày khóa tài khoản</label>
                                                                <input type="number" class="form-control"
                                                                    id="blockDays" name="blockDays" required>
                                                                @error('blockDays')
                                                                    <div class="text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="blockReason"
                                                                    class="form-label text-start d-block">Lý
                                                                    do khóa tài khoản</label>
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
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Hủy</button>
                                                        <!-- Nút submit form -->
                                                        <button type="submit" form="blockAccountForm"
                                                            class="btn btn-danger">Xác
                                                            nhận khóa</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Table row-->
                                    @endif
                                </tbody>
                                <!--end::Table body-->

                            </table>
                        </div>


                        <!--end::Table-->
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
