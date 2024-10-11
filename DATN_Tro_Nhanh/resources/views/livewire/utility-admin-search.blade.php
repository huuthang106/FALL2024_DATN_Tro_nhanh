<div>
    {{-- Do your work, then step back. --}}
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
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search user" /> --}}
                                <input type="text" wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh"
                                    name="search" placeholder="Tìm kiếm tiện ích"
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
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bolder">Tùy chỉnh bộ lọc</div>
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
                                        {{-- <!--begin::Input group-->
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
                                        <!--end::Actions--> --}}
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Filter-->
                                <!--begin::Export-->

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
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                    data-kt-check-target="#kt_table_utilities .form-check-input" value="1" />
                                            </div>
                                        </th>
                                        <th class="min-w-100px small text-nowrap">Phòng</th>
                                        <th class="min-w-100px small text-nowrap">Wi-Fi</th>
                                        <th class="min-w-100px small text-nowrap">Phòng tắm</th>
                                        <th class="min-w-100px small text-nowrap">Máy điều hòa</th>
                                        <th class="min-w-100px small text-nowrap">Ga-ra</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    @if ($utilities->isEmpty())
                                        <!-- Hiển thị khi không có dữ liệu -->
                                        <tr>
                                            <td colspan="6" class="text-center">Không có dữ liệu.</td>
                                        </tr>
                                    @else
                                        @foreach ($utilities as $utility)
                                        <tr>
                                            <!--begin::Checkbox-->
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="{{ $utility->id }}" />
                                                </div>
                                            </td>
                                        
                                            <td class="small text-nowrap">
                                                @if ($utility->room && $utility->room->title)
                                                    {{ $utility->room->title }}
                                                @else
                                                    Chưa có phòng
                                                @endif
                                            </td>
                                        
                                            <td class="small text-nowrap">{{ $utility->wifi == 1 ? 'Có' : ($utility->wifi == 2 ? 'Không' : 'Chưa xác định') }}</td>
                                            <td class="small text-nowrap">{{ $utility->bathrooms == 1 ? 'Có' : ($utility->bathrooms == 2 ? 'Không' : 'Chưa xác định') }}</td>
                                            <td class="small text-nowrap">{{ $utility->air_conditioning == 1 ? 'Có' : ($utility->air_conditioning == 2 ? 'Không' : 'Chưa xác định') }}</td>
                                            <td class="small text-nowrap">{{ $utility->garage == 1 ? 'Có' : ($utility->garage == 2 ? 'Không' : 'Chưa xác định') }}</td>
                                        </tr>
                                        
                                        @endforeach
                                    @endif
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        
                        
                        {{-- Phân trang --}}
                        @if ($utilities->hasPages())
                        <nav aria-label="Page navigation">
                            <ul class="pagination rounded-active justify-content-center">
                                {{-- Nút về đầu --}}
                                <li class="page-item {{ $utilities->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage(1)"
                                        wire:loading.attr="disabled" aria-label="First Page">
                                        << </a>
                                </li>
                    
                                {{-- Liên kết Trang Trước --}}
                                
                    
                                @php
                                    $totalPages = $utilities->lastPage();
                                    $currentPage = $utilities->currentPage();
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
                    
                                {{-- Liên kết Trang Tiếp --}}
                              
                    
                                {{-- Nút về cuối --}}
                                <li class="page-item {{ !$utilities->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage({{ $utilities->lastPage() }})"
                                        wire:loading.attr="disabled" aria-label="Last Page"> >>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                    
                        {{-- <div class="text-center mt-2">{{ $utilities->firstItem() }}-{{ $utilities->lastItem() }}
                         của
                         {{ $utilities->total() }} kết quả
                     </div> --}}
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
