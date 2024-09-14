<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <!-- resources/views/livewire/maintenance-request-list.blade.php -->
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
        <form action="#" method="GET">
            <div class="mb-6">
                <div class="row" wire:ignore>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center ml-3">
                            <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
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
                        <th class="no-sort py-6 pl-6">
                            <label class="new-control new-checkbox checkbox-primary m-auto">
                                <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                            </label>
                        </th>
                        <th class="py-6">Người Yêu Cầu</th>
                        <th class="py-6">Số Phòng</th>
                        <th class="py-6">Ngày</th>
                        <th class="py-6">Trạng thái</th>
                        <th class="no-sort py-6">Rời Khỏi</th>
                    </tr>
                </thead>

                @forelse ($maintenanceRequests as $item)
                <tr class="shadow-hover-xs-2">
                    <td class="checkbox-column align-middle py-4 pl-6">
                        <label class="new-control new-checkbox checkbox-primary m-auto">
                            <input type="checkbox" class="new-control-input child-chk select-customers-info">
                        </label>
                    </td>
                    <td class="align-middle p-4 text-primary">{{ $item->user->name ?? 'N/A' }}
                        <br><small>Yêu cầu: {{ $item->title }}</small>
                    </td>
                    <td class="align-middle p-4">{{ $item->room->title ?? 'N/A' }}</td>
                    <td class="align-middle p-4">{{ $item->created_at->format('d-m-Y') }}</td>
                    <td class="align-middle p-4">
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
                    <td class="align-middle p-4">
                        <form action="{{ route('owners.destroy-maintenances', $item->id) }}" method="POST" class="d-inline-block mb-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fs-18 text-muted hover-primary border-0 bg-transparent">
                                <i class="fal fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4">Không có yêu cầu bảo trì nào!</td>
                </tr>
            @endforelse
            </table>
        </div>

        @if ($maintenanceRequests->count() > 0)
        <div class="mt-6">
            <ul class="pagination rounded-active justify-content-center">
                {{-- Nút tới trang đầu tiên --}}
                <li class="page-item {{ $maintenanceRequests->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click.prevent="gotoPage(1)">
                        <i class="far fa-angle-double-left"></i>
                    </a>
                </li>

                {{-- Nút tới trang trước (<) --}}
                <li class="page-item {{ $maintenanceRequests->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click.prevent="previousPage">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>

                {{-- Trang đầu tiên --}}
                @if ($maintenanceRequests->currentPage() > 2)
                    <li class="page-item"><a class="page-link" wire:click.prevent="gotoPage(1)">1</a></li>
                @endif

                {{-- Dấu ba chấm ở đầu nếu cần --}}
                @if ($maintenanceRequests->currentPage() > 3)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif

                {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                @for ($i = max(1, $maintenanceRequests->currentPage() - 1); $i <= min($maintenanceRequests->currentPage() + 1, $maintenanceRequests->lastPage()); $i++)
                    <li class="page-item {{ $maintenanceRequests->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" wire:click.prevent="gotoPage({{ $i }})">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Dấu ba chấm ở cuối nếu cần --}}
                @if ($maintenanceRequests->currentPage() < $maintenanceRequests->lastPage() - 2)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif

                {{-- Trang cuối cùng --}}
                @if ($maintenanceRequests->currentPage() < $maintenanceRequests->lastPage() - 1)
                    <li class="page-item"><a class="page-link"
                            wire:click.prevent="gotoPage({{ $maintenanceRequests->lastPage() }})">{{ $maintenanceRequests->lastPage() }}</a>
                    </li>
                @endif

                {{-- Nút tới trang kế tiếp (>) --}}
                <li class="page-item {{ $maintenanceRequests->currentPage() == $maintenanceRequests->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click.prevent="nextPage">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>

                {{-- Nút tới trang cuối cùng (>>) --}}
                <li class="page-item {{ $maintenanceRequests->currentPage() == $maintenanceRequests->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click.prevent="gotoPage({{ $maintenanceRequests->lastPage() }})">
                        <i class="far fa-angle-double-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    @endif


        <div class="text-center mt-2">
            {{ $maintenanceRequests->firstItem() }}-{{ $maintenanceRequests->lastItem() }} của
            {{ $maintenanceRequests->total() }} kết quả
        </div>
    </div>


</div>