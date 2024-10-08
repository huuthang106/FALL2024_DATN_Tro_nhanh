<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <!-- resources/views/livewire/maintenance-request-list.blade.php -->
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
        <form action="#" method="GET">
            <div class="mb-6">
                <div class="row" wire:ignore>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center ml-3">
                            <label for="invoice-list_length" class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                            <select wire:model.lazy="timeFilter" class="form-control form-control-lg selectpicker"
                                data-style="bg-white btn-lg h-52 py-2 border">
                                <option value="" selected>Thời Gian:</option>
                                <option value="1_day">1 ngày</option>
                                <option value="7_day">7 ngày</option>
                                <option value="1_month">1 tháng</option>
                                <option value="3_month">3 tháng</option>
                                <option value="6_month">6 tháng</option>
                                <option value="1_year">1 năm</option>
                            </select>
                        </div>
                     
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                        <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                            <input wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh" type="text"
                                class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..." aria-label=""
                                aria-describedby="basic-addon1">
                            <div class="input-group-append position-absolute pos-fixed-right-center">
                                <button class="btn bg-transparent border-0 text-gray lh-1" type="button">
                                    <i class="fal fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="align-self-center">
                            <button class="btn btn-danger btn-lg" tabindex="0" aria-controls="invoice-list">
                                <span>Xóa</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover bg-white border rounded-lg">
                <thead>
                    <tr role="row">
                        <th class="no-sort py-6 pl-6" style="white-space: nowrap;">
                            <label class="new-control new-checkbox checkbox-primary m-auto">
                                <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                            </label>
                        </th>
                        <th class="py-6" style="white-space: nowrap;">Người gửi</th>
                        <th class="py-6" style="white-space: nowrap;">Tiêu đề</th>
                        
                        <th class="py-6" style="white-space: nowrap;">Ngày gửi</th>
                        <th class="py-6" style="white-space: nowrap;">Trạng thái</th>
                        <th class="no-sort py-6" style="white-space: nowrap;">Rời Khỏi</th>
                    </tr>
                </thead>

                @forelse ($maintenanceRequests as $item)
                <tr class="shadow-hover-xs-2">
                    <td class="checkbox-column align-middle py-4 pl-6" style="white-space: nowrap;">
                        <label class="new-control new-checkbox checkbox-primary m-auto">
                            <input type="checkbox" class="new-control-input child-chk select-customers-info">
                        </label>
                    </td>
                    <td class="align-middle p-4 text-primary" style="white-space: nowrap;">{{ $item->user->name ?? 'N/A' }}
                        <br><small>Phòng: {{ $item->room->title }}</small>
                    </td>
                    <td class="align-middle p-4" style="white-space: nowrap;">{{ $item->title }}</td>
                 
                    <td class="align-middle p-4" style="white-space: nowrap;">{{ $item->created_at->format('d-m-Y') }}</td>
                    <td class="align-middle p-4" style="white-space: nowrap;">
                        @if ($item->status == 1)
                            <span class="badge badge-yellow text-capitalize font-weight-normal fs-12">Đang xử lý</span>
                        @elseif ($item->status == 2)
                            <span class="badge badge-green text-capitalize font-weight-normal fs-12">Đã duyệt</span>
                        @elseif ($item->status == 3)
                            <span class="badge badge-blue text-capitalize font-weight-normal fs-12">Đã hoàn thành</span>
                        @else
                            <span class="badge badge-light text-capitalize font-weight-normal fs-12">Không xác định</span>
                        @endif
                    </td>
                    <td class="align-middle p-4" style="white-space: nowrap;">
                        <button type="button" class="fs-18 text-muted hover-primary border-0 bg-transparent" 
                                wire:click="deleteMaintenanceRequest({{ $item->id }})"
                                onclick="">
                            <i class="fal fa-trash-alt"></i>
                        </button>
                        {{-- <button type="button" class="fs-18 text-muted hover-primary border-0 bg-transparent" 
                        wire:click="deleteMaintenanceRequest({{ $item->id }})"
                        onclick="v">
                        <i class="fa-solid fa-wrench"></i>
                </button> --}}
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4" style="white-space: nowrap;">Không có yêu cầu bảo trì nào!</td>
                </tr>
            @endforelse
            </table>
        </div>

        @if ($maintenanceRequests->hasPages())
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm rounded-active justify-content-center">
                {{-- Liên kết Trang Đầu --}}
                <li class="page-item {{ $maintenanceRequests->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled">
                        &lt;&lt;
                    </a>
                </li>
    
                {{-- Liên kết Trang Trước --}}
                <li class="page-item {{ $maintenanceRequests->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled">
                        &lt;
                    </a>
                </li>
    
                @php
                    $window = 2; // Số trang hiển thị ở mỗi bên của trang hiện tại
                    $totalPages = $maintenanceRequests->lastPage();
                    $currentPage = $maintenanceRequests->currentPage();
                    $startPage = max($currentPage - $window, 1);
                    $endPage = min($currentPage + $window, $totalPages);
                @endphp
    
                @if ($startPage > 1)
                    <li class="page-item">
                        <a class="page-link hover-white" wire:click="gotoPage(1)"
                            wire:loading.attr="disabled">1</a>
                    </li>
                    @if ($startPage > 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                @endif
    
                @for ($i = $startPage; $i <= $endPage; $i++)
                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                        <a class="page-link hover-white" wire:click="gotoPage({{ $i }})"
                            wire:loading.attr="disabled">{{ $i }}</a>
                    </li>
                @endfor
    
                @if ($endPage < $totalPages)
                    @if ($endPage < $totalPages - 1)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                    <li class="page-item">
                        <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                            wire:loading.attr="disabled">{{ $totalPages }}</a>
                    </li>
                @endif
    
                {{-- Liên kết Trang Tiếp --}}
                <li class="page-item {{ !$maintenanceRequests->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link hover-white" wire:click="nextPage" wire:loading.attr="disabled">
                        &gt;
                    </a>
                </li>
    
                {{-- Liên kết Trang Cuối --}}
                <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                    <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                        wire:loading.attr="disabled">
                        &gt;&gt;
                    </a>
                </li>
            </ul>
        </nav>
    @endif



    </div>


</div>
