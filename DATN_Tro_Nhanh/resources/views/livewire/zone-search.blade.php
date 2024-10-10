<div>
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <form action="#" method="GET">
                <div class="mb-6">
                    <div class="row" wire:ignore>
                        <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                            <div class="d-flex form-group mb-0 align-items-center ml-3">
                                <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                                <select wire:model.lazy="timeFilter" class="form-control form-control-lg selectpicker"
                                    data-style="bg-white btn-lg h-52 py-2 border">
                                    <option value="" selected>Mặc định</option>
                                    <option value="1_day">Hôm qua</option>
                                    <option value="7_day">7 ngày</option>
                                    <option value="1_month">1 tháng</option>
                                    <option value="3_month">3 tháng</option>
                                    <option value="6_month">6 tháng</option>
                                    <option value="1_year">1 năm</option>
                                </select>
                            </div>
                            <div class="ml-2 align-self-center">
                                <a href="{{ route('owners.zone-post') }}" class="btn btn-primary btn-lg"
                                    tabindex="0"><span>Thêm
                                        mới</span></a>
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
                            <div class="ml-2">
                                <button id="deleteSelected" wire:click="deleteSelectedZones"
                                    class="btn btn-danger btn-lg" tabindex="0">
                                    <span>Xóa</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Hiển thị danh sách phòng mà người dùng đang ở -->


            <div class="table-responsive">
                <table id="myTable" class="table table-hover table-sm bg-white border rounded-lg">
                    <thead>
                        <tr role="row">
                            <th class="py-3 text-nowrap text-center px-6">
                                <input type="checkbox" id="checkAll" wire:model="selectAll">
                            </th>
                            <th class="py-3 text-nowrap text-center col-2">Ảnh</th>

                            <th class="py-3 text-nowrap text-center col-2">Tiêu đề</th>
                            <th class="py-3 text-nowrap text-center d-none d-md-table-cell col-3">Mô tả</th>
                            <th class="py-3 text-nowrap text-center d-none d-lg-table-cell col-3">Địa chỉ</th>
                            <th class="py-3 text-nowrap text-center col-2">Ngày</th>
                            <th class="py-3 text-nowrap text-center col-2">Lượng phòng</th>
                            <th class="py-3 text-nowrap text-center col-2">Trạng thái</th>
                            <th class="no-sort py-3 text-nowrap text-center col-2">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($zones->isNotEmpty())
                            @foreach ($zones as $zone)
                                <tr role="row" wire:key="zone-{{ $zone->id }}"
                                    data-room-count="{{ $zone->room_count }}">
                                    <td class="align-middle px-6">
                                        <input type="checkbox" class="zone-checkbox" 
                                               wire:model="selectedZones" 
                                               value="{{ $zone->id }}" 
                                               {{ $zone->room_count > 0 ? 'disabled' : '' }}
                                               wire:key="zone-checkbox-{{ $zone->id }}">
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap p-4">
                                        <div class="mr-2 position-relative zone-image-container">
                                            <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                                <img src="{{ $this->getZoneImageUrl($zone) ?: asset('assets/images/default-image.jpg') }}"
                                                    alt="{{ $zone->name }}" class="img-fluid zone-image">
                                            </a>
                                        </div>
                                    </td>

                                    <td class="align-middle pt-3 pb-2 px-3 text-nowrap">
                                        <div class="d-flex align-items-center">

                                            <div class="media-body">
                                                <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                                    <span
                                                        class="text-dark hover-primary mb-1 font-size-md">{{ $zone->name }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="align-middle d-none d-md-table-cell text-nowrap">
                                        <small class="user-name">{{ $zone->description }}</small>
                                    </td>
                                    <td class="align-middle d-none d-lg-table-cell text-nowrap">
                                        <small>{{ Str::limit($zone->address, 15) }}</small>
                                    </td>

                                    <td class="align-middle text-nowrap">
                                        <span class="text-success pr-1"><i
                                                class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($zone->updated_at)->format('d-m-Y') }}
                                    </td>

                                    <td class="align-middle text-nowrap">
                                        <span class="inv-amount">
                                            {{-- @if ($zone->room_count < 0) --}}
                                            {{ $zone->room_count }}
                                            {{-- @else
                                                <span class="badge badge-yellow text-capitalize">Chưa hoạt
                                                    động</span>
                                            @endif --}}
                                        </span>
                                    </td>
                                    <td class="align-middle text-nowrap">
                                        @if ($zone->status == 1)
                                            <span class="badge badge-green text-capitalize">Đang hoạt động</span>
                                        @else
                                            <span class="badge badge-yellow text-capitalize">Chưa hoạt động</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-nowrap">
                                        <a href="{{ route('owners.zone-view-update', $zone->slug) }}"
                                            data-toggle="tooltip" title="Chỉnh sửa"
                                            class="d-inline-block fs-18 text-muted hover-primary mr-3">
                                            <i class="fal fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('owners.destroy-zone', $zone->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="fs-18 text-muted hover-primary border-0 bg-transparent">
                                                <i class="fal fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div wire:ignore>
                    <span id="emptyZonesCount" data-count="{{ $emptyZonesCount }}"></span>
                </div>
            </div>
            @if ($zones->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm rounded-active justify-content-center">
                        {{-- Liên kết Trang Đầu --}}
                        <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled">
                                &lt;&lt;
                            </a>
                        </li>

                        {{-- Liên kết Trang Trước --}}
                        <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled">
                                &lt;
                            </a>
                        </li>

                        @php
                            $window = 2; // Số trang hiển thị ở mỗi bên của trang hiện tại
                            $totalPages = $zones->lastPage();
                            $currentPage = $zones->currentPage();
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
                        <li class="page-item {{ !$zones->hasMorePages() ? 'disabled' : '' }}">
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





<!-- Phân trang -->


</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('livewire:initialized', function() {
        const checkAll = document.getElementById('checkAll');
        const deleteSelectedBtn = document.getElementById('deleteSelected');
        const emptyZonesCountElement = document.getElementById('emptyZonesCount');
        const emptyZonesCount = parseInt(emptyZonesCountElement.dataset.count);
    
        function updateCheckAllState() {
            const checkedCheckboxes = document.querySelectorAll('.zone-checkbox:checked:not(:disabled)').length;
            checkAll.checked = checkedCheckboxes === emptyZonesCount && emptyZonesCount > 0;
            checkAll.indeterminate = checkedCheckboxes > 0 && checkedCheckboxes < emptyZonesCount;
        }
    
        function initializeCheckboxes() {
            document.querySelectorAll('.zone-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', updateCheckAllState);
            });
            updateCheckAllState();
        }
    
        checkAll.addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.zone-checkbox:not(:disabled)').forEach(checkbox => {
                checkbox.checked = isChecked;
                checkbox.dispatchEvent(new Event('change', { bubbles: true }));
            });
        });
    
        deleteSelectedBtn.addEventListener('click', function(event) {
            event.preventDefault();
            Livewire.find('zone-search').deleteSelectedZones();
        });
    
        initializeCheckboxes();
    
        Livewire.on('zonesUpdated', initializeCheckboxes);
    
        Livewire.on('zones-deleted', (data) => {
            console.log('Zones deleted event received:', data);
            Swal.fire({
                title: 'Thành công!',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        });
    });
    </script>
</div>
