<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
        <div class="mb-6">
            <div class="row" wire:ignore>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                    <div class="d-flex form-group mb-0 align-items-center">
                        <label for="invoice-list_length" class="d-block mr-2 mb-0">Lọc:</label>
                        <select wire:model.lazy="timeFilter" name="invoice-list_length" id="invoice-list_length"
                            aria-controls="invoice-list" class="form-control form-control-lg mr-2 selectpicker"
                            data-style="bg-white btn-lg h-52 py-2 border">
                            <option value="">Mặc định</option>

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
                            <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                    class="fal fa-search"></i></button>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <button class="btn btn-danger btn-lg" tabindex="0" id='deleteSelected'
                            aria-controls="invoice-list"><span>Xóa</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="myTable" class="table table-hover bg-white border rounded-lg">
                        <thead>
                            <tr role="row">
                                <th class="no-sort py-6 pl-6" style="white-space: nowrap;">
                                    <label class="new-control new-checkbox checkbox-primary m-auto">
                                        <input type="checkbox" id = 'checkAll'
                                            class="new-control-input chk-parent select-customers-info">
                                    </label>
                                </th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Tên phòng</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Tên người ở</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Số điện thoại</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Khu trọ</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($residents->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center" style="white-space: nowrap;">Không có đơn
                                    </td>
                                </tr>
                            @else
                                @foreach ($residents as $resident)
                                    <tr>
                                        <td class="py-6 pl-6 align-middle " style="white-space: nowrap;">
                                            <label class="new-control new-checkbox checkbox-primary m-auto">


                                                <input type="checkbox" class="join-room-checkbox"
                                                    wire:model="selectedNotifications" value="{{ $resident->id }}">
                                            </label>
                                        </td>
                                        <td class="align-middle" style="white-space: nowrap;">
                                            <small class="text">{{ $resident->room->title }}</small>
                                        </td>
                                        <td class="align-middle" style="white-space: nowrap;">
                                            <small>
                                                <a href="{{ route('client.client-agent-detail', $resident->tenant->slug) }}"
                                                    class="text-primary">
                                                    {{ $resident->tenant->name }}
                                                </a>
                                            </small>
                                        </td>
                                        <td class="align-middle" style="white-space: nowrap;">
                                            <small class="text">{{ $resident->tenant->phone }}</small>
                                        </td>
                                        <!-- <td class="align-middle description-column {{ empty($resident->description) ? 'd-none' : '' }}"
                                            style="white-space: nowrap;">
                                            <small class="text">{{ $resident->description }}</small>
                                        </td> -->


                                        <td class="align-middle" style="white-space: nowrap;">
                                            <small class="text">{{ $resident->zone->name }}</small>
                                        </td>
                                        <td class="align-middle text-center" style="white-space: nowrap;">
                                            <form action="{{ route('owners.cancel-order', $resident->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fal fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>

                <div id="pagination-section" class="mt-6">
        <ul class="pagination pagination-sm rounded-active justify-content-center">
            {{-- Nút quay về trang đầu tiên (<<) --}}
            <li class="page-item {{ $residents->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                    href="#pagination-section">
                    <i class="far fa-angle-double-left"></i>
                </a>
            </li>

            {{-- Nút quay lại trang trước (<) --}}
            <li class="page-item {{ $residents->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled"
                    href="#pagination-section">
                    <i class="fas fa-angle-left"></i>
                </a>
            </li>

            {{-- Hiển thị các trang chỉ trên kích thước md trở lên --}}
            @if ($residents->currentPage() > 2)
                <li class="page-item d-none d-md-inline">
                    <a class="page-link" wire:click="gotoPage(1)" href="#pagination-section">1</a>
                </li>
            @endif

            @if ($residents->currentPage() > 3)
                <li class="page-item disabled d-none d-md-inline">
                    <span class="page-link">...</span>
                </li>
            @endif

            {{-- Hiển thị các trang xung quanh trang hiện tại --}}
            @for ($i = max(1, $residents->currentPage() - 1); $i <= min($residents->currentPage() + 1, $residents->lastPage()); $i++)
                <li class="page-item {{ $residents->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" wire:click="gotoPage({{ $i }})"
                        href="#pagination-section">{{ $i }}</a>
                </li>
            @endfor

            @if ($residents->currentPage() < $residents->lastPage() - 2)
                <li class="page-item disabled d-none d-md-inline">
                    <span class="page-link">...</span>
                </li>
            @endif

            @if ($residents->currentPage() < $residents->lastPage() - 1)
                <li class="page-item d-none d-md-inline">
                    <a class="page-link" wire:click="gotoPage({{ $residents->lastPage() }})" href="#pagination-section">
                        {{ $residents->lastPage() }}
                    </a>
                </li>
            @endif

            {{-- Nút tới trang kế tiếp (>) --}}
            <li class="page-item {{ $residents->currentPage() == $residents->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled" href="#pagination-section">
                    <i class="fas fa-angle-right"></i>
                </a>
            </li>

            {{-- Nút tới trang cuối cùng (>>) --}}
            <li class="page-item {{ $residents->currentPage() == $residents->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="gotoPage({{ $residents->lastPage() }})" wire:loading.attr="disabled"
                    href="#pagination-section">
                    <i class="far fa-angle-double-right"></i>
                </a>
            </li>
        </ul>
    </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkAll = document.getElementById('checkAll');
            const deleteSelectedBtn = document.getElementById('deleteSelected');

            checkAll.addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.join-room-checkbox');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                    checkbox.dispatchEvent(new Event('change', {
                        'bubbles': true
                    }));
                });
            });

            deleteSelectedBtn.addEventListener('click', function() {
                if (@this.selectedNotifications.length === 0) {
                    Swal.fire({
                        title: 'Lỗi!',
                        text: 'Vui lòng chọn một nội dung để xóa',
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
                        @this.call('deleteSelectedJoinRoom');
                    }
                });
            });

            function updateDeleteButtonVisibility() {
                deleteSelectedBtn.style.display = @this.selectedNotifications.length > 0 ? 'block' : 'none';
                checkAll.checked = @this.selectedNotifications.length === document.querySelectorAll(
                    '.notification-checkbox').length;
            }

            // Gọi hàm updateDeleteButtonVisibility mỗi khi có sự thay đổi trong selectedNotifications
            @this.$watch('selectedNotifications', () => {
                updateDeleteButtonVisibility();
            });

            // Khởi tạo trạng thái ban đầu
            updateDeleteButtonVisibility();
        });

        // Xử lý thông báo sau khi xóa thành công
        document.addEventListener('livewire:initialized', () => {
        Livewire.on('joinRoom-deleted', (event) => {
            Swal.fire({
                title: 'Thành công!',
                text: 'Xóa thông báo thành công',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        });
    });
    </script>
</main>
