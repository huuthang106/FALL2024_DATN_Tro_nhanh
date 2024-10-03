<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
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
                                <input type="text" wire:model.lazy="search" wire:keydown.debounce.50ms="$refresh"
                                    name="search" placeholder="Tìm kiếm vị trí gói"
                                    class="form-control form-control-solid w-250px ps-14" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
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
                                        {{-- <div class="d-flex justify-content-end">
                                            <button type="reset"
                                                class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-user-table-filter="reset">Reset</button>
                                            <button type="submit" class="btn btn-primary fw-bold px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-user-table-filter="filter">Tìm</button>
                                        </div> --}}
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->

                                <!--end::Export-->
                                <!--begin::Add user-->
                                <a type="button" href="{{ route('admin.trang-them-bang-gia') }}"
                                    class="btn btn-primary">
                                    Thêm bảng giá</a>

                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->

                            <!--end::Group actions-->
                            <!--begin::Modal - Adjust Balance-->

                            <!--end::Modal - New Card-->
                            <!--begin::Modal - Add task-->

                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <!--begin::Table head-->
                                <thead class="text-nowrap">
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-5 text-nowrap">
                                            <div
                                                class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                    data-kt-check-target="#kt_table_price_lists .form-check-input"
                                                    value="1" />
                                            </div>
                                        </th>
                                        <th class="w-20 text-nowrap">Vị trí</th>
                                        <th class="w-20 text-nowrap">Giá</th>
                                        <th class="w-15 text-nowrap">Số ngày</th>
                                        <th class="w-20 text-nowrap">Thể loại</th>
                                        <th class="w-20 text-end text-nowrap">Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">
                                    @if ($priceLists->isEmpty())
                                        <!-- Hiển thị khi không có dữ liệu -->
                                        <tr>
                                            <td colspan="7" class="text-center">Không có dữ liệu.</td>
                                        </tr>
                                    @else
                                        @foreach ($priceLists as $priceList)
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $priceList->id }}" />
                                                    </div>
                                                </td>
                                                <td>{{ $priceList->location->name ?? 'Location không còn tồn tại' }}
                                                </td>
                                                <!-- Use location name -->
                                                <td>{{ number_format($priceList->price, 0, ',', '.') }} VND</td>
                                                <td>{{ $priceList->duration_day }}</td>
                                                <td>{{ $priceList->status === 1 ? 'Gói nâng cấp tài khoản' : ($priceList->status === 2 ? 'Gói tin vip' : 'Không xác định') }}
                                                </td>
                                                <td class="text-end text-nowrap">
                                                    <a href="#"
                                                        class="btn btn-light btn-active-light-primary btn-sm"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">Tác vụ
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
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
                                                            <a href="{{ route('admin.chinh-sua-bang-gia', $priceList->id) }}"
                                                                class="menu-link px-3">Sửa</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <form
                                                                action="{{ route('admin.destroy-price-list', $priceList->id) }}"
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
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if ($priceLists->hasPages())
                            <nav class="mt-4">
                                <ul class="pagination rounded-active justify-content-center">
                                    {{-- First Page Link --}}
                                    @if ($priceLists->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="fas fa-angle-double-left"></i></span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" wire:click="gotoPage(1)"
                                                wire:loading.attr="disabled">
                                                <i class="fas fa-angle-double-left"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Previous Page Link --}}
                                    @if ($priceLists->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="fas fa-angle-left"></i></span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" wire:click="previousPage"
                                                wire:loading.attr="disabled">
                                                <i class="fas fa-angle-left"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @php
                                        $maxPages = 5; // Số lượng trang hiển thị tối đa
                                        $startPage = max(1, $priceLists->currentPage() - floor($maxPages / 2));
                                        $endPage = min($priceLists->lastPage(), $startPage + $maxPages - 1);

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
                                        @if ($page == $priceLists->currentPage())
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

                                    @if ($endPage < $priceLists->lastPage())
                                        @if ($endPage < $priceLists->lastPage() - 1)
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                        @endif
                                        <li class="page-item">
                                            <a class="page-link" wire:click="gotoPage({{ $priceLists->lastPage() }})"
                                                wire:loading.attr="disabled">{{ $priceLists->lastPage() }}</a>
                                        </li>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($priceLists->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled">
                                                <i class="fas fa-angle-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="fas fa-angle-right"></i></span>
                                        </li>
                                    @endif

                                    {{-- Last Page Link --}}
                                    @if ($priceLists->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" wire:click="gotoPage({{ $priceLists->lastPage() }})"
                                                wire:loading.attr="disabled">
                                                <i class="fas fa-angle-double-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="fas fa-angle-double-right"></i></span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        @endif



                        <!--end::Table-->
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
