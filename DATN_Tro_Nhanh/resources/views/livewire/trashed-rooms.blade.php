<div>
    {{-- Stop trying to control. --}}
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
            <div class="mb-6">
                <div class="mr-0 mr-md-auto">
                    <h2 class="mb-0 text-heading fs-22 lh-15 mb-6">Thùng rác phòng trọ
                    </h2>
                </div>
                <div class="mb-6">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                            <div class="d-flex form-group mb-0 align-items-center ml-3" wire:ignore>
                                <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                                <select wire:model.lazy="timeFilter"
                                    class="form-control form-control-lg selectpicker mr-2"
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
                        <div
                            class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                            <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                                <input wire:model.lazy="search" wire:keydown.debounce.100ms="$refresh" type="text"
                                    class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..."
                                    aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-append position-absolute pos-fixed-right-center">
                                    <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                            class="fal fa-search"></i></button>
                                </div>
                            </div>
                            {{-- <div class="align-self-center">
                                <button id="deleteButton" class="btn btn-danger btn-lg" tabindex="0"
                                    wire:click="deleteSelected" @if (!$this->hasSelectedRooms) disabled @endif>
                                    <span>Xóa</span>
                                </button>
                                @if ($selectedRooms)
                                    <button wire:click="restoreSelected" class="btn btn-success btn-lg text-nowrap">
                                        <i class="fas fa-undo mr-1"></i> Khôi phục
                                    </button>
                                @endif
                            </div> --}}
                            <div class="align-self-center">
                                <div class="dropdown">
                                    {{-- <button class="btn btn-secondary btn-lg dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" @if (!$this->hasSelectedRooms) disabled @endif>
                                        Hành động
                                    </button> --}}
                                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        @if (!$this->hasSelectedRooms) disabled @endif>
                                        Hành động
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-danger" href="#"
                                            wire:click.prevent="deleteSelected">
                                            <i class="fas fa-trash mr-2"></i> Xóa vĩnh viễn
                                        </a>
                                        <a class="dropdown-item text-success" href="#"
                                            wire:click.prevent="restoreSelected">
                                            <i class="fas fa-undo mr-2"></i> Khôi phục
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover bg-white border rounded-lg">
                    <thead class="thead-sm thead-black">
                        <tr>
                            <th scope="col" class="border-top-0 px-6 pt-5 pb-4">
                                <div class="control custom-checkbox">
                                    <input type="checkbox" class="control-input" id="checkAll"
                                        wire:model.lazy="selectAll">
                                    <label class="control-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th scope="col" class="border-top-0 px-6 pt-5 pb-4 text-nowrap">
                                <small>Tiêu đề danh sách</small>
                            </th>
                            <th scope="col" class="border-top-0 pt-5 pb-4 text-nowrap">
                                <small>Ngày xuất bản</small>
                            </th>
                            <th scope="col" class="border-top-0 pt-5 pb-4 text-nowrap">
                                <small>Trạng thái</small>
                            </th>
                            <th scope="col" class="border-top-0 pt-5 pb-4 text-nowrap">
                                <small>Xem</small>
                            </th>
                            <th scope="col" class="border-top-0 pt-5 pb-4 text-nowrap">
                                <small>Hành động</small>
                            </th>
                        </tr>
                    </thead>


                    <tbody>
                        @if ($trashedRooms->isEmpty())
                            <tr>
                                <td colspan="6">
                                    <p class="text-center"><small>Không có phòng phù hợp!</small></p>
                                </td>
                            </tr>
                        @else
                            @foreach ($trashedRooms as $room)
                                <tr class="shadow-hover-xs-2 bg-hover-white">
                                    <td class="align-middle pt-6 pb-4 px-6">
                                        <div class="control custom-checkbox">
                                            <input type="checkbox" class="control-input" id="room-{{ $room->id }}"
                                                wire:model.lazy="selectedRooms" wire:key="room-{{ $room->id }}"
                                                value="{{ $room->id }}">
                                            <label class="control-label" for="room-{{ $room->id }}"></label>
                                        </div>
                                    </td>
                                    <!-- Cột Tiêu đề và Hình ảnh -->
                                    <td class="align-middle pt-6 pb-4 px-6">
                                        <div class="media">
                                            <div class="w-120px mr-4 position-relative">
                                                <a href="{{ route('client.detail-zone', ['slug' => $room->slug]) }}">
                                                    <img src="{{ $this->getRoomImageUrl($room) }}"
                                                        alt="{{ $room->title }}" class="img-fluid">
                                                </a>
                                                <span class="badge badge-indigo position-absolute pos-fixed-top"><small>Cho
                                                        thuê</small></span>
                                            </div>

                                            <div class="media-body">
                                                <a href="{{ route('client.detail-zone', ['slug' => $room->slug]) }}"
                                                    class="text-dark hover-primary">
                                                    <h5 class="fs-16 mb-0 lh-18"><small>{{ $room->title }}</small>
                                                    </h5>
                                                </a>
                                                <p class="mb-1 font-weight-500">
                                                    <small>{{ Str::limit($room->address, 30) }}</small>
                                                </p>

                                                <span class="text-heading lh-15 font-weight-bold fs-17 text-nowrap">
                                                    <small>{{ number_format($room->price, 0, ',', '.') }} VND</small>
                                                </span>

                                            </div>
                                        </div>
                                    </td>

                                    <!-- Cột Ngày Xuất Bản -->
                                    <td class="align-middle"><small>{{ $room->created_at->format('d/m/Y') }}</small>
                                    </td>

                                    <!-- Cột Trạng thái -->
                                    <td class="align-middle">
                                        @if ($room->status === 1)
                                            <span
                                                class="badge text-capitalize font-weight-normal fs-12 badge-yellow">Chờ
                                                duyệt</span>
                                        @elseif ($room->status === 2)
                                            <span class="badge text-capitalize font-weight-normal fs-12 badge-pink">Đã
                                                duyệt</span>
                                        @else
                                            <span
                                                class="badge text-capitalize font-weight-normal fs-12 badge-gray">Không
                                                xác định</span>
                                        @endif
                                    </td>

                                    <!-- Cột Lượt Xem -->
                                    <td class="align-middle"><small>{{ $room->view }}</small></td>

                                    <!-- Cột Hành Động -->
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <!-- Nút Khôi phục -->
                                            <form action="{{ route('owners.restore', $room->id) }}" method="POST"
                                                class="flex-fill">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </form>

                                            <!-- Nút Xóa -->
                                            <form action="{{ route('owners.forceDelete-room', $room->id) }}"
                                                method="POST" class="flex-fill mb-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm">
                                                    <i class="fal fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if ($trashedRooms->hasPages())
                    <div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm rounded-active justify-content-center">
                                {{-- Liên kết Trang Đầu --}}
                                <li class="page-item {{ $trashedRooms->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage(1)"
                                        wire:loading.attr="disabled" rel="first" aria-label="@lang('pagination.first')">
                                        <i class="far fa-angle-double-left"></i>
                                    </a>
                                </li>

                                {{-- Liên kết Trang Trước --}}
                                <li class="page-item {{ $trashedRooms->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="previousPage"
                                        wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">
                                        <i class="far fa-angle-left"></i>
                                    </a>
                                </li>

                                @php
                                    $totalPages = $trashedRooms->lastPage();
                                    $currentPage = $trashedRooms->currentPage();
                                @endphp

                                {{-- Hiển thị trang đầu tiên --}}
                                <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage(1)"
                                        wire:loading.attr="disabled">1</a>
                                </li>

                                {{-- Dấu ba chấm nếu cần --}}
                                @if ($currentPage > 3)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                {{-- Hiển thị trang thứ hai và ba nếu có --}}
                                @for ($i = max(2, $currentPage - 1); $i <= min($totalPages - 1, $currentPage + 1); $i++)
                                    @if ($i != 1 && $i != $totalPages)
                                        {{-- Bỏ qua trang đầu và trang cuối --}}
                                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                            <a class="page-link hover-white"
                                                wire:click="gotoPage({{ $i }})"
                                                wire:loading.attr="disabled">{{ $i }}</a>
                                        </li>
                                    @endif
                                @endfor

                                {{-- Dấu ba chấm nếu cần --}}
                                @if ($currentPage < $totalPages - 2)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                {{-- Hiển thị trang cuối cùng --}}
                                @if ($totalPages > 1)
                                    <li class="page-item {{ $currentPage == $totalPages ? 'active' : '' }}">
                                        <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                                            wire:loading.attr="disabled">{{ $totalPages }}</a>
                                    </li>
                                @endif

                                {{-- Liên kết Trang Tiếp --}}
                                <li class="page-item {{ !$trashedRooms->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="nextPage"
                                        wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">
                                        <i class="far fa-angle-right"></i>
                                    </a>
                                </li>

                                {{-- Liên kết Trang Cuối --}}
                                <li class="page-item {{ !$trashedRooms->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                                        wire:loading.attr="disabled" rel="last" aria-label="@lang('pagination.last')">
                                        <i class="far fa-angle-double-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                @endif
            </div>
        </div>
    </main>
    <script>
        document.addEventListener('livewire:initialized', () => {
            const checkboxes = document.querySelectorAll('.control-input:not(#checkAll)');
            const selectAllCheckbox = document.getElementById('checkAll');
            const roomActionDropdown = document.getElementById('dropdownMenuButton');

            function updateSelectAllState() {
                if (checkboxes.length === 0) {
                    // Nếu không có checkbox nào, vô hiệu hóa nút "Chọn tất cả" và dropdown
                    if (selectAllCheckbox) selectAllCheckbox.disabled = true;
                    if (roomActionDropdown) roomActionDropdown.disabled = true;
                    return;
                }

                const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
                if (selectAllCheckbox) {
                    selectAllCheckbox.checked = allChecked;
                    selectAllCheckbox.disabled = false;
                }
                updateRoomActionDropdownState();
            }

            function updateRoomActionDropdownState() {
                if (!roomActionDropdown) return;

                const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
                roomActionDropdown.disabled = checkedCount === 0;
                roomActionDropdown.textContent = `Hành động ${checkedCount > 0 ? `(${checkedCount})` : ''}`;
            }

            if (checkboxes.length > 0) {
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', () => {
                        updateSelectAllState();
                        @this.set('selectedRooms', Array.from(checkboxes)
                            .filter(cb => cb.checked)
                            .map(cb => cb.value)
                        );
                    });
                });
            }

            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', () => {
                    const isChecked = selectAllCheckbox.checked;
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = isChecked;
                    });
                    updateRoomActionDropdownState();
                    @this.set('selectedRooms', isChecked ? Array.from(checkboxes).map(cb => cb.value) : []);
                });
            }

            // Khởi tạo trạng thái ban đầu
            updateSelectAllState();
        });
    </script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('confirmDelete', () => {
                Swal.fire({
                    title: 'Bạn có chắc chắn?',
                    text: "Bạn sẽ không thể khôi phục lại phòng này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('confirmDelete');
                    }
                });
            });
        });
    </script>
</div>
