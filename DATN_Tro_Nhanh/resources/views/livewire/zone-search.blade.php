<div>
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
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
                            <button id="deleteSelected" wire:click="deleteSelectedZones" class="btn btn-danger btn-lg"
                                tabindex="0">
                                <span>Xóa</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

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
                            <th class="py-3 text-nowrap text-center col-2">Dịch vụ</th>
                            <th class="no-sort py-3 text-nowrap text-center col-2">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($zones->isEmpty())
                            <tr>
                                <td colspan="9">
                                    <p class="text-center">Không có khu trọ.</p>
                                </td>
                            </tr>
                        @else
                            @foreach ($zones as $zone)
                                <tr role="row" wire:key="zone-{{ $zone->id }}"
                                    data-room-count="{{ $zone->room_count }}">
                                    <td class="align-middle px-6">
                                        <input type="checkbox" class="control-input zone-checkbox"
                                            id="zone-{{ $zone->id }}" wire:model="selectedZones"
                                            wire:key="zone-{{ $zone->id }}" value="{{ $zone->id }}"
                                            {{ $zone->rooms->count() > 0 ? 'disabled' : '' }}
                                            wire:change="toggleZone({{ $zone->id }})">
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap p-4">
                                        <div class="mr-2 position-relative zone-image-container">
                                            <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                                <img src="{{ $this->getZoneImageUrl($zone) ?: asset('assets/images/default-image.jpg') }}"
                                                    alt="{{ $zone->name }}" class="img-fluid zone-image">
                                                    @if($zone->vipZonePosition && $zone->vipZonePosition->status == 1)
                                                        <span class="position-absolute bottom-0 start-0 bg-danger text-white p-1 rounded">VIP</span>
                                                    @endif
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
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#vipModal-{{ $zone->id }}">
                                            Mua Vip
                                        </button>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="vipModal-{{ $zone->id }}" tabindex="-1" role="dialog" aria-labelledby="vipModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="vipModalLabel">Chọn Gói VIP</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('owners.zone-vip') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="zone_id" value="{{ $zone->id }}">
                                                        <p>Số dư tài khoản: {{ number_format(auth()->user()->balance, 0, ',', '.') }} VND</p>
                                                        <div class="form-group">
                                                            <label for="vipPackageSelect">Chọn gói VIP:</label>
                                                            <select id="vipPackageSelect" name="vipPackage" class="form-control">
                                                                @foreach($priceLists as $priceList)
                                                                    <option value="{{ $priceList->id }}">
                                                                        {{ $priceList->location->name }} - {{ number_format($priceList->price, 0, ',', '.') }} - {{$priceList->duration_day}} ngày
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <p class="text-danger">Lưu ý: Khi mua gói vip tiền sẽ được trừ vào số dư tài khoản nên đảm bảo tài khoản của quý khách đủ để thanh toán.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <td class="align-middle text-nowrap">
                                        {{-- <a href="{{ route('owners.zone-view-update', $zone->slug) }}"
                                            data-toggle="tooltip" title="Chỉnh sửa"
                                            class="d-inline-block fs-18 text-muted hover-primary mr-3">
                                            <i class="fal fa-pencil-alt"></i>
                                        </a> --}}
                                        <a href="{{ route('owners.zone-view-update', $zone->slug) }}"
                                            data-toggle="tooltip" title="Chỉnh sửa" class="btn btn-primary btn-sm mr-2">
                                            <i class="fal fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('owners.destroy-zone', $zone->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button type="submit"
                                                class="fs-18 text-muted hover-primary border-0 bg-transparent">
                                                <i class="fal fa-trash-alt"></i>
                                            </button> --}}
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fal fa-trash-alt"></i></button>
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
                    <ul class="pagination rounded-active justify-content-center">
                        {{-- Nút về đầu --}}

                        <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                                rel="prev" aria-label="@lang('pagination.previous')"><i
                                    class="far fa-angle-double-left"></i></a>
                        </li>
                        @php
                            $totalPages = $zones->lastPage();
                            $currentPage = $zones->currentPage();
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


                        <li class="page-item {{ !$zones->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage({{ $zones->lastPage() }})"
                                wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')"><i
                                    class="far fa-angle-double-right"></i></a>
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
            const checkableCheckboxes = document.querySelectorAll('.zone-checkbox:not(:disabled)');
            const checkedCheckboxes = document.querySelectorAll('.zone-checkbox:checked:not(:disabled)');

            if (checkedCheckboxes.length === checkableCheckboxes.length && checkableCheckboxes.length > 0) {
                checkAll.checked = true;
            } else {
                checkAll.checked = false;
            }
            checkAll.indeterminate = false; // Luôn đặt indeterminate thành false
        }

        function initializeCheckboxes() {
            document.querySelectorAll('.zone-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    @this.toggleZone(this.value);
                    updateCheckAllState();
                });
            });
            updateCheckAllState();
        }

        checkAll.addEventListener('change', function() {
            const isChecked = this.checked;
            @this.toggleAllZones(isChecked);
            document.querySelectorAll('.zone-checkbox:not(:disabled)').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            updateCheckAllState();
        });

        deleteSelectedBtn.addEventListener('click', function(event) {
            event.preventDefault();
            @this.deleteSelectedZones();
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
                checkAll.checked = false;
                checkAll.indeterminate = false;
                initializeCheckboxes();
            });
        });

        Livewire.on('zones-with-rooms', (zonesWithRooms) => {
            Swal.fire({
                title: 'Không thể xóa',
                text: `Các khu vực sau không thể xóa vì có phòng: ${zonesWithRooms}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    });
</script>

</div>
