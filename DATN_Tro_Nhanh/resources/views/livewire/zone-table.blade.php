<div>
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <div class="mr-0 mr-md-auto">
                <h2 class="mb-0 text-heading fs-22 lh-15 mb-6">Thùng rác khu trọ
                </h2>
            </div>
            <div class="mb-6">
                <div class="row">
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center" wire:ignore>
                            <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                            <select class="form-control selectpicker form-control-lg mr-2" wire:model.lazy="timeFilter"
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
                            <input type="text" class="form-control bg-transparent border-1x"
                                placeholder="Tìm kiếm..." aria-label="" aria-describedby="basic-addon1"
                                wire:model.lazy="search" wire:keydown.debounce.100ms="$refresh">
                            <div class="input-group-append position-absolute pos-fixed-right-center">
                                <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                        class="fal fa-search"></i></button>
                            </div>
                        </div>
                        {{-- <div class="align-self-center">
                            <button id="zoneActionDropdown" class="btn btn-danger btn-lg text-nowrap" tabindex="0"
                                wire:click="deleteSelected" @if (!$this->hasSelectedZones) disabled @endif>
                                <span>Xóa</span>
                            </button>

                            @if ($selectedZones)
                                <button wire:click="restoreSelected" class="btn btn-success btn-lg text-nowrap">
                                    <i class="fas fa-undo mr-1"></i> Khôi phục
                                </button>
                            @endif
                        </div> --}}
                        <div class="align-self-center">
                            <div class="dropdown">
                                {{-- <button class="btn btn-secondary btn-lg dropdown-toggle" type="button"
                                    id="zoneActionDropdown" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" @if (!$this->hasSelectedZones) disabled @endif>
                                    Hành động
                                </button> --}}
                                <button class="btn btn-secondary btn-lg dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    @if (!$this->hasSelectedZones) disabled @endif>
                                    Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="zoneActionDropdown">
                                    <a class="dropdown-item text-danger" href="#"
                                        wire:click.prevent="deleteSelected">
                                        <i class="fas fa-trash mr-2"></i> Xóa vĩnh viễn
                                    </a>
                                    @if ($selectedZones)
                                        <a class="dropdown-item text-success" href="#"
                                            wire:click.prevent="restoreSelected">
                                            <i class="fas fa-undo mr-2"></i> Khôi phục
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="table-responsive">
                <table id="myTable" class="table table-hover bg-white border rounded-lg">
                    <thead class="thead-sm thead-black">
                        <tr role="row">
                            <th scope="col" class="border-top-0 px-6 pt-5 pb-4">
                                <div class="control custom-checkbox">
                                    <input type="checkbox" class="control-input" id="checkAll"
                                        wire:model.lazy="selectAll">
                                    <label class="control-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th class="py-3 text-nowrap text-center col-2">Hình ảnh</th>
                            <th class="py-3 text-nowrap text-center col-2">Tiêu đề</th>
                            <th class="py-3 text-nowrap text-center col-2">Mô tả</th>
                            <th class="py-3 text-nowrap text-center col-2">Địa chỉ</th>
                            <th class="py-3 text-nowrap text-center col-2">Ngày</th>
                            <th class="py-3 text-nowrap text-center col-2">Lượng phòng</th>
                            <th class="py-3 text-nowrap text-center col-2">Trạng thái</th>
                            <th class=" py-3 text-nowrap text-center col-2">Thao tác</th>
                        </tr>
                    </thead>


                    <tbody>
                        {{-- Nội dung table --}}
                        @if ($trashedZones->isNotEmpty())
                            @foreach ($trashedZones as $zone)
                                <tr role="row" class="shadow-hover-xs-2 bg-hover-white">
                                    <td class="align-middle pt-6 pb-4 px-6">
                                        <div class="control custom-checkbox">
                                            <input type="checkbox" class="control-input zone-checkbox" id="zone-{{ $zone->id }}"
                                            wire:model="selectedZones" wire:key="zone-{{ $zone->id }}"
                                            value="{{ $zone->id }}" {{ $zone->rooms->count() > 0 ? 'disabled' : '' }}>
                                            <label class="control-label" for="zone-{{ $zone->id }}"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap p-4">
                                        <div class="mr-2 position-relative zone-image-container">
                                            <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                                <img src="{{ $this->getZoneImageUrl($zone) ?: asset('assets/images/default-image.jpg') }}"
                                                    alt="{{ $zone->name }}" class="img-fluid zone-image">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap ">
                                        <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                            <small class="inv-number">{{ $zone->name }}</small>
                                        </a>
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap ">
                                        <div class="d-flex align-items-center">
                                            <small
                                                class="align-self-center mb-0 user-name">{{ $zone->description }}</small>
                                        </div>
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap ">
                                        <small>{{ $zone->address }}</small>
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap ">
                                        <small>
                                            <span class="text-success pr-1"><i class="fal fa-calendar"></i></span>
                                            {{ $zone->updated_at }}
                                        </small>
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap ">
                                        <small>{{ $zone->total_rooms }}</small>
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap ">
                                        <small>
                                            @if ($zone->status == 1)
                                                <span class="badge badge-green text-capitalize">Đang hoạt động</span>
                                            @else
                                                <span class="badge badge-yellow text-capitalize">Chưa hoạt động</span>
                                            @endif
                                        </small>
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap ">
                                        <div class="d-flex align-items-center">
                                            <!-- Nút Khôi Phục -->
                                            <form action="{{ route('owners.restore-zone', $zone->id) }}"
                                                method="POST" class="mx-2">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="btn btn-sm d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-undo mr-1"></i>
                                                </button>
                                            </form>
                                            <!-- Nút Xóa sử dụng Livewire -->
                                            <button wire:click="deleteZone({{ $zone->id }})"
                                                class="btn btn-sm d-flex align-items-center justify-content-center">
                                                <i class="fal fa-trash-alt mr-1"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <!-- Hiển thị khi không có dữ liệu -->
                            <tr>
                                <td colspan="9" class="text-center">Không có dữ liệu.</td>
                            </tr>
                        @endif
                    </tbody>



                </table>
                @if ($trashedZones->hasPages())
                    <div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm rounded-active justify-content-center">
                                {{-- Liên kết Trang Đầu --}}
                                <li class="page-item {{ $trashedZones->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage(1)"
                                        wire:loading.attr="disabled" rel="first" aria-label="@lang('pagination.first')">
                                        <i class="far fa-angle-double-left"></i>
                                    </a>
                                </li>

                                {{-- Liên kết Trang Trước --}}
                                <li class="page-item {{ $trashedZones->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="previousPage"
                                        wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">
                                        <i class="far fa-angle-left"></i>
                                    </a>
                                </li>

                                @php
                                    $totalPages = $trashedZones->lastPage();
                                    $currentPage = $trashedZones->currentPage();
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
                                <li class="page-item {{ !$trashedZones->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="nextPage"
                                        wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">
                                        <i class="far fa-angle-right"></i>
                                    </a>
                                </li>

                                {{-- Liên kết Trang Cuối --}}
                                <li class="page-item {{ !$trashedZones->hasMorePages() ? 'disabled' : '' }}">
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
            const zoneActionDropdown = document.querySelector('.dropdown-toggle[data-toggle="dropdown"]');

            function updateSelectAllState() {
                if (checkboxes.length === 0) {
                    // Nếu không có checkbox nào, vô hiệu hóa nút "Chọn tất cả" và dropdown
                    if (selectAllCheckbox) selectAllCheckbox.disabled = true;
                    if (zoneActionDropdown) zoneActionDropdown.disabled = true;
                    return;
                }

                const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
                if (selectAllCheckbox) {
                    selectAllCheckbox.checked = allChecked;
                    selectAllCheckbox.disabled = false;
                }
                updateZoneActionDropdownState();
            }

            function updateZoneActionDropdownState() {
                if (!zoneActionDropdown) return;

                const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
                zoneActionDropdown.disabled = checkedCount === 0;
                zoneActionDropdown.textContent = `Hành động ${checkedCount > 0 ? `(${checkedCount})` : ''}`;
            }

            if (checkboxes.length > 0) {
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', () => {
                        updateSelectAllState();
                        @this.set('selectedZones', Array.from(checkboxes)
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
                    updateZoneActionDropdownState();
                    @this.set('selectedZones', isChecked ? Array.from(checkboxes).map(cb => cb.value) : []);
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
                    text: "Bạn sẽ không thể khôi phục lại khu trọ này!",
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
