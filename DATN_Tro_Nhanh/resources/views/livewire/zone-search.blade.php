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
                            <button id="deleteSelected"  class="btn btn-danger btn-lg"
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

                            <th class="py-3 text-nowrap text-center col-2">Tên Phòng</th>
                         
                            <th class="py-3 text-nowrap text-center d-none d-lg-table-cell col-3">Địa chỉ</th>
                            <th class="py-3 text-nowrap text-center col-2">Ngày</th>
                            <th class="py-3 text-nowrap text-center col-2">Lượng phòng</th>
                            <th class="py-3 text-nowrap text-center col-2">Trạng thái</th>
                            <th class="py-3 text-nowrap text-center col-2">Dịch vụ</th>
                            <th class="no-sort py-3 text-nowrap text-center col-2">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody >
                        @if ($zones->isEmpty())
                            <tr>
                                <td colspan="9">
                                    <p class="text-center">Không có khu trọ.</p>
                                </td>
                            </tr>
                        @else
                            @foreach ($zones as $zone)
                                <tr role="row" wire:key="zone-{{ $zone->id }}" data-room-count="{{ $zone->room_count }}">
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
                                                @php
                                                    $image = $zone->rooms->first()->image ?? null;
                                                @endphp
                                                <img src="{{ $image ? 'https://drive.google.com/thumbnail?id=' . $image : asset('assets/images/default-image.jpg') }}"
                                                     alt="{{ $zone->name }}" class="img-fluid zone-image">
                                                @if ($zone->vipZonePosition && $zone->vipZonePosition->status == 1)
                                                    <span class="badge bg-danger text-white vip-badge ">VIP</span>
                                                    
                                                @endif
                                                <span class="badge {{ $zone->hasAvailableRooms() ? 'badge-indigo' : 'mr-2 badge-orange' }} position-absolute pos-fixed-top">
                                                    {{ $zone->hasAvailableRooms() ? 'Còn phòng' : 'Hết phòng' }}
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                    
                                    <td class="align-middle pt-3 pb-2 px-3 text-wrap"> <!-- Sử dụng text-wrap -->
                                        <div class="d-flex align-items-center">
                                            <div class="media-body">
                                                <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                                    <span class="text-dark hover-primary mb-1 font-size-md">{{ $zone->name }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                    
                                   
                                    <td class="align-middle d-none d-lg-table-cell text-wrap">
                                        <small>{{$zone->address }}</small>
                                    </td>
                    
                                    <td class="align-middle text-nowrap">
                                        <span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($zone->updated_at)->format('d-m-Y') }}
                                    </td>
                    
                                    <td class="align-middle text-wrap">
                                        <span class="inv-amount">{{ $zone->room_count }}</span>
                                    </td>
                                    <td class="align-middle text-nowrap">
                                        @if ($zone->status == 1)
                                            <span class="badge badge-yellow text-capitalize">Chưa được duyệt</span>
                                        @else
                                            <span class="badge badge-green text-capitalize">Đang hoạt động</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-nowrap">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#vipModal-{{ $zone->id }}">
                                            Mua Vip
                                        </button>
                                    </td>
                                    <!-- Modal -->
                                    <div  class="modal fade" id="vipModal-{{ $zone->id }}" tabindex="-1" role="dialog" aria-labelledby="vipModalLabel" aria-hidden="true" >
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="vipModalLabel">Chọn Gói VIP</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($zone->status == 1)
                                                        <p class="text-danger">Khu trọ chưa được duyệt, không thể mua VIP.</p>
                                                    @else
                                                        <form  action="{{ route('owners.zone-vip') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="zone_id" value="{{ $zone->id }}">
                                                            <p>Số dư tài khoản: {{ number_format(auth()->user()->balance, 0, ',', '.') }} VND</p>
                                                            <div class="form-group ">
                                                                <label for="vipPackageSelect">Chọn gói VIP:</label>
                                                                <select id="vipPackageSelect" name="vipPackage" class="form-control border-0 shadow-none form-control-lg ">
                                                                    @foreach ($priceLists as $priceList)
                                                                        @php
                                                                            $isLimitReached = !$this->canPurchaseVipPackage($priceList->location->id);
                                                                        @endphp
                                                                        @if (!$isLimitReached)
                                                                            <option value="{{ $priceList->id }}">
                                                                                <span class="text-wrap ">{{ $priceList->location->name }} ({{ number_format($priceList->price, 0, ',', '.') }} VNĐ - {{ $priceList->duration_day }} ngày)</span>
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <p class="text-danger">Lưu ý: Khi mua gói vip tiền sẽ được trừ vào số dư tài khoản nên đảm bảo tài khoản của quý khách đủ để thanh toán.</p>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td class="align-middle text-nowrap">
                                        <a href="{{ route('owners.zone-view-update', $zone->slug) }}" data-toggle="tooltip" title="Chỉnh sửa" class="btn btn-primary btn-sm mr-2">
                                            <i class="fal fa-pencil-alt"></i>
                                        </a>
                                        <form id="deleteZoneForm{{ $zone->id }}" action="{{ route('owners.destroy-zone', $zone->id) }}" method="POST" class="d-inline-block" onsubmit="return false;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteZone({{ $zone->id }})">
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
            event.preventDefault(); // Ngăn chặn hành động mặc định của nút

            // Kiểm tra xem có checkbox nào được chọn không
            const checkedCheckboxes = document.querySelectorAll('.zone-checkbox:checked');
            if (checkedCheckboxes.length === 0) {
                Swal.fire({
                    title: 'Không có khu vực nào được chọn',
                    text: 'Vui lòng chọn ít nhất một khu vực để xóa.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return; // Ngăn không cho gọi hàm xóa
            }

            // Xác nhận xóa
            Swal.fire({
                title: 'Xác nhận xóa',
                text: 'Bạn có chắc chắn muốn xóa các khu vực đã chọn?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa!',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleteSelectedZones(); // Gọi hàm xóa nếu người dùng xác nhận
                }
            });
        });

        initializeCheckboxes();

        Livewire.on('zonesUpdated', initializeCheckboxes);

        Livewire.on('zones-deleted', (data) => {
            console.log('Zones deleted event received:', data);
            Swal.fire({
                title: 'Thành công!',
                text: 'Đã xóa thành công',
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

{{-- form xoa khu tro  --}}
<script>
    function deleteZone(zoneId) {
        // Sử dụng SweetAlert2 để xác nhận
        Swal.fire({
            title: 'Xác nhận',
            text: 'Bạn có chắc chắn muốn xóa khu vực này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có, xóa!',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                // Nếu người dùng xác nhận, gửi yêu cầu AJAX
                $.ajax({
                    url: '{{ route('owners.destroy-zone', '') }}/' + zoneId, // Sử dụng route name
                    type: 'POST',
                    data: {
                        _method: 'DELETE', // Thêm phương thức DELETE
                        _token: '{{ csrf_token() }}' // Thêm token CSRF
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: response.message,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload(); // Tải lại trang sau khi xóa
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi!',
                            text: xhr.responseJSON.message,
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    }
</script>
</div>

