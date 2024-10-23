{{-- Success is as dangerous as failure. --}}
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

                            <form method="GET" action="" class="w-100">
                                <div class="input-group">
                                    <input type="text" wire:model.lazy="search"
                                        wire:keydown.debounce.300ms="$refresh" name="search"
                                        placeholder="Tìm kiếm đơn đăng kí"
                                        class="form-control form-control-solid w-250px ps-14" />
                                </div>
                            </form>
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
                                    <th class="min-w-125px">Tên Người gửi</th>
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

                                @if ($list->isEmpty())
                                    <!-- Hiển thị khi không có dữ liệu -->
                                    <tr>
                                        <td colspan="7" class="text-center">Không có dữ liệu.</td>
                                    </tr>
                                @else
                                    @foreach ($list as $register)
                                        <tr>
                                            <!--begin::Checkbox-->
                                            <td>
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="1" />
                                                </div>
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.detail-registers', $register->id) }}"
                                                    class="text-gray-800 text-hover-primary mb-1">
                                                    {{ $register->identity && $register->identity->user ? $register->identity->user->name : 'Tên không tồn tại' }}
                                                </a>
                                                <br><small>{{ $register->description }}</small>
                                            </td>


                                            <td>
                                                <div
                                                    class="badge {{ $register->status ? 'badge-light-warning ' : 'badge-light-success' }}">
                                                    {{ $register->status == 1 ? 'Chưa duyêt' : ' Đã duyệt' }}
                                                </div>
                                            </td>


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
                                                        {{-- <li class="menu-item px-3">
                                                                <a href="{{ route('admin.update-room-show', ['slug' => $room->slug]) }}"
                                                                    class="dropdown-item menu-link px-3">Chỉnh sửa</a>
                                                            </li> --}}
                                                        <li class="menu-item px-3">

                                                            <a href="{{ route('admin.detail-registers', $register->id) }}"
                                                                class="menu-link px-3">Xem chi tiết</a>
                                                        </li>
                                                        <li class="menu-item px-3">
                                                            <form
                                                                action="{{ route('admin.refuse-registration', $register->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="menu-link px-3 border-0 bg-transparent fw-normal">Từ
                                                                    chối</button>
                                                            </form>
                                                        </li>
                                                        <li class="menu-item px-3">
                                                            <button wire:click="approve({{ $register->id }})"
                                                                class="menu-link px-3 border-0 bg-transparent fw-normal">Duyệt</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <!--end::Menu-->
                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end::Table-->
                    <!--end::Card body-->
                    <!-- Hiển thị các liên kết phân trang -->
                    {{-- <div class="pagination-container">
                            {{ $list->links('pagination::bootstrap-4') }}
                        </div> --}}
                    @if ($list->hasPages())
                        <nav aria-label="Page navigation">
                            <ul class="pagination rounded-active justify-content-center">
                                {{-- Nút về đầu --}}
                                <li class="page-item {{ $list->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage(1)"
                                        wire:loading.attr="disabled" aria-label="@lang('pagination.first')">
                                        <i class="fas fa-angle-double-left"></i>
                                    </a>
                                </li>

                                {{-- Nút về trước --}}


                                @php
                                    $totalPages = $list->lastPage();
                                    $currentPage = $list->currentPage();
                                    $visiblePages = 3;
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
                                            <a class="page-link hover-white" wire:click="gotoPage({{ $i }})"
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
                                        <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                                            wire:loading.attr="disabled">{{ $totalPages }}</a>
                                    </li>
                                @endif

                                {{-- Nút trang tiếp --}}


                                {{-- Nút về cuối --}}
                                <li class="page-item {{ !$list->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                                        wire:loading.attr="disabled" aria-label="@lang('pagination.last')">
                                        <i class="fas fa-angle-double-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endif


                </div>
                <!--end::Card-->
                <!--begin::Modals-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>


</div>
