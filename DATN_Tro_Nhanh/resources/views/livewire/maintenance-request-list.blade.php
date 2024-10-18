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
                                <option value="1_day">Hôm qua</option>
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
                            <button class="btn btn-danger btn-lg" tabindex="0" aria-controls="invoice-list"
                                id="deleteSelected">
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
                                <input type="checkbox" id="selectAll"
                                    class="new-control-input chk-parent select-customers-info">
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
                    <tr class="shadow-hover-xs-2" data-id="{{ $item->id }}">
                        <td class="checkbox-column align-middle py-4 pl-6" style="white-space: nowrap;">
                            <label class="new-control new-checkbox checkbox-primary m-auto">
                                <input data-id="{{ $item->id }}" type="checkbox"
                                    class="new-control-input child-chk select-customers-info">
                            </label>
                        </td>
                        <td class="align-middle p-4 text-primary" style="white-space: nowrap;">
                            {{ $item->user->name ?? 'N/A' }}
                            <br><small>Phòng: {{ $item->room->title }}</small>
                        </td>
                        <td class="align-middle p-4" style="white-space: nowrap;">{{ $item->title }}</td>

                        <td class="align-middle p-4" style="white-space: nowrap;">
                            {{ $item->created_at->format('d-m-Y') }}</td>
                        <td class="align-middle p-4" style="white-space: nowrap;">
                            @if ($item->status == 1)
                                <span class="badge badge-yellow text-capitalize font-weight-normal fs-12">Đang xử
                                    lý</span>
                            @elseif ($item->status == 2)
                                <span class="badge badge-green text-capitalize font-weight-normal fs-12">Đã hoàn</span>
                            @else
                                <span class="badge badge-light text-capitalize font-weight-normal fs-12">Không xác
                                    định</span>
                            @endif
                        </td>
                        <td class="align-middle p-4" style="white-space: nowrap;">
                            <button type="button" class="badge badge-danger border-0"
                                wire:click="deleteMaintenanceRequest({{ $item->id }})" onclick="">
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
                        <td colspan="6" class="text-center py-4" style="white-space: nowrap;">Không có yêu cầu bảo
                            trì nào!</td>
                    </tr>
                @endforelse
            </table>
        </div>

        <div class="row justify-content-center p-5">
            @if ($maintenanceRequests->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination rounded-active justify-content-center">
                        {{-- Nút về đầu --}}

                        <li class="page-item {{ $maintenanceRequests->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                                rel="prev" aria-label="@lang('pagination.previous')"><i
                                    class="far fa-angle-double-left"></i></a>
                        </li>

                        @php
                            $totalPages = $maintenanceRequests->lastPage();
                            $currentPage = $maintenanceRequests->currentPage();
                            $visiblePages = 3; // Số trang hiển thị ở giữa
                        @endphp

                        {{-- Trang đầu --}}
                        <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled">1</a>
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

                        <li class="page-item {{ !$maintenanceRequests->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link hover-white"
                                wire:click="gotoPage({{ $maintenanceRequests->lastPage() }})"
                                wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')"><i
                                    class="far fa-angle-double-right"></i></a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:initialized', function() {
            const checkAll = document.getElementById('selectAll'); // Checkbox "Chọn tất cả"
            const deleteSelectedBtn = document.getElementById('deleteSelected');
            const childCheckboxes = document.querySelectorAll('.child-chk'); // Tất cả checkbox con

            // Sự kiện cho checkbox "Chọn tất cả"
            checkAll.addEventListener('change', function() {
                childCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                    checkbox.dispatchEvent(new Event('change', {
                        'bubbles': true
                    }));
                });
                updateDeleteButtonState();
            });

            // Sự kiện cho từng checkbox con
            childCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Nếu một checkbox con không được chọn, bỏ chọn checkbox "Chọn tất cả"
                    if (!this.checked) {
                        checkAll.checked = false;
                    } else if (Array.from(childCheckboxes).every(chk => chk.checked)) {
                        // Nếu tất cả checkbox con được chọn, đánh dấu checkbox "Chọn tất cả"
                        checkAll.checked = true;
                    }
                    updateDeleteButtonState();
                });
            });

            // Sự kiện cho nút xóa
            deleteSelectedBtn.addEventListener('click', function(event) {
                event.preventDefault();
                const selectedCheckboxes = document.querySelectorAll('.child-chk:checked');
                if (selectedCheckboxes.length === 0) {
                    Swal.fire({
                        title: 'Lỗi!',
                        text: 'Vui lòng chọn ít nhất một yêu cầu bảo trì để xóa',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                Swal.fire({
                    title: 'Bạn có chắc chắn?',
                    text: "Bạn sẽ không thể hoàn tác hành động này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, xóa!',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const selectedIds = Array.from(selectedCheckboxes).map(checkbox => {
                            return checkbox.closest('tr').getAttribute('data-id');
                        });
                        @this.call('deleteSelectedMaintenances', {
                            ids: selectedIds
                        });
                    }
                });
            });

            // Cập nhật trạng thái nút xóa
            function updateDeleteButtonState() {
                const selectedCount = document.querySelectorAll('.child-chk:checked').length;
                deleteSelectedBtn.disabled = selectedCount === 0;
            }

            // Gán sự kiện cho các checkbox con
            document.querySelectorAll('.child-chk').forEach(checkbox => {
                checkbox.addEventListener('change', updateDeleteButtonState);
            });

            updateDeleteButtonState(); // Cập nhật trạng thái nút xóa ban đầu

            // Sự kiện khi xóa thành công
            Livewire.on('maintenances-deleted', (data) => {
                console.log('Maintenances deleted event received:', data);
                Swal.fire({
                    title: 'Xóa Thành công!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            });

            // Sự kiện khi có lỗi
            Livewire.on('error', (data) => {
                Swal.fire({
                    title: 'Lỗi!',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });
    </script>
</div>
