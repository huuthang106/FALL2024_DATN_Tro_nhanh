<div>
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
        <div class="mb-6">
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                    <div class="d-flex form-group mb-0 align-items-center">
                        {{-- <h5 for="invoice-list_length" class="d-block mr-2 mb-0">Tên khu: {{ $zone->name }}</h5> --}}
                    </div>
                    <div class="ml-2 align-self-center">
                        <a href="{{ route('owners.add-room', $zone->slug) }}" class="btn btn-primary btn-lg"
                            tabindex="0"><span>Thêm
                                mới</span></a>
                    </div>

                </div>

                <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">

                    <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                        <input wire:model.lazy="searchResident" wire:keydown.debounce.300ms="$refresh" type="text"
                            class="form-control bg-transparent border-0 shadow-none text-body"
                            placeholder="Tìm kiếm tên người ở..." aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append position-absolute pos-fixed-right-center">
                            <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                    class="fal fa-search"></i></button>
                        </div>
                    </div>
                    <div class="align-self-center">
                        {{-- <div class="dropdown"> --}}
                            {{-- <button class="btn btn-secondary btn-lg dropdown-toggle" type="button"
                                id="zoneActionDropdown" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" @if (!$this->hasSelectedZones) disabled @endif>
                                Hành động
                            </button> --}}
                            {{-- <button class="btn btn-primary btn-lg dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                >
                                Hành động
                            </button>
                            <div class="dropdown-menu" aria-labelledby="zoneActionDropdown"> --}}
                                {{-- <button wire:click="deleteSelectedRooms" class="btn btn-danger btn-lg text-nowrap" @if (!$this->selectedRooms) disabled @endif>
                                    <span>Xóa</span>
                                </button> --}}
                          
                            {{-- </div>
                        </div> --}}
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
                                <th class="no-sort py-6 pl-6">
                                    {{-- <label class="new-control new-checkbox checkbox-primary m-auto">
                                        <input type="checkbox" class="new-control-input chk-parent select-customers-info" id="checkAll" wire:model.lazy="selectAll">
                                    </label> --}}
                                </th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Ảnh</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Tên phòng</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Số lượng</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Số điện thoại</th>
                                {{-- <th class="py-6 text-start">Lý do từ chối</th> --}}
                                <th class="py-6 text-start" style="white-space: nowrap;">Trạng thái</th>
                                {{-- <th class="py-6 text-start" style="white-space: nowrap;">Xem hồ sơ</th> --}}
                                <th class="py-6 text-start ">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($rooms->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center" style="white-space: nowrap;">Khu vực chưa có
                                        phòng trọ nào.</td>
                                </tr>
                            @else
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td class="py-6 pl-6" style="white-space: nowrap;">
                                            {{-- <label class="new-control new-checkbox checkbox-primary m-auto">
                                                <input type="checkbox" class="new-control-input chk-parent select-customers-info" wire:model="selectedRooms" value="{{ $room->id }}">
                                            </label> --}}
                                        </td>
                                        <td class="align-middle" style="white-space: nowrap;">
                                            <img src="{{ asset('assets/images/' . $room->image) }}" alt="Room Image" style="max-width: 100%; height: auto; width: 150px;">
                                        </td>
                                        <td class="align-middle" style="white-space: nowrap;">
                                            <small>{{ $room->title }}</small>
                                        </td>
                                        <td class="align-middle" style="white-space: nowrap;">
                                            <small>
                                                {{-- @if ($room->residents->where('status', $user_is_in)->isNotEmpty())
                                                    @php
                                                        $resident = $room->residents
                                                            ->where('status', $user_is_in)
                                                            ->first();
                                                        $tenant = $resident->tenant;
                                                    @endphp
                                                    {{ $tenant->name ?? 'Không có tên' }}
                                                @else
                                                    Không có người ở
                                                @endif --}}
                                                {{ $room->quantity }}
                                            </small>
                                        </td>
                                        <td class="align-middle" style="white-space: nowrap;"> <small>
                                                {{-- @if ($room->residents && $room->residents->isNotEmpty())
                                                    {{ $room->residents->first()->tenant->phone ?? 'Không có' }}
                                                @else
                                                    Phòng trống
                                                @endif --}}

                                                {{ $zone->phone }}

                                            </small></td>


                                        <td class="align-middle" style="white-space: nowrap;">
                                            <small>
                                                @if ($room->residents->where('status', $user_is_in)->isNotEmpty())
                                                    <span class="badge badge-green text-capitalize">Đang tạm trú</span>
                                                @else
                                                    <span class="badge badge-yellow text-capitalize">Trống</span>
                                                @endif
                                            </small>
                                        </td>
                                        {{-- <td class="align-middle" style="white-space: nowrap;">
                                            @if ($room->residents->where('status', $user_is_in)->isNotEmpty())
                                                
                                                @if ($resident->status == $user_is_in)
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#identityModal{{ $resident->tenant->id }}">
                                                        Xem hồ sơ
                                                    </button>
                                                @endif
                                            @endif
                                        </td> --}}
                                        <td class="align-middle" style="white-space: nowrap;">
                                            @if ($room->residents->where('status', $user_is_in)->isNotEmpty())
                                                @php
                                                    $resident = $room->residents->where('status', $user_is_in)->first();
                                                    $tenant = $resident->tenant;
                                                @endphp
                                                @if ($resident->status == $user_is_in)
                                                    <a href="{{ route('owners.detail-room', $room->slug) }}"
                                                        type="button" class="btn btn-primary btn-sm">
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#invoiceModal{{ $resident->id }}">
                                                        <i class="fal fa-pencil-alt"></i>
                                                    </button>
                                                    <form action="{{ route('owners.erase-tenant', $resident->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fal fa-trash-alt"></i></button>
                                                    </form>
                                                @endif
                                            @else
                                                <form action="{{ route('owners.delete-room-in-zone', $room->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fal fa-trash-alt"></i></button>
                                                </form>
                                                <form action="{{ route('owners.edit-room', $room->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                                            class="fal fa-pen-alt"></i></button>
                                                </form>
                                                
                                                
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">
                    @if ($rooms->hasPages())
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm rounded-active justify-content-center">
                                {{-- Liên kết Trang Đầu --}}
                                <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage(1)"
                                        wire:loading.attr="disabled">
                                        &lt;&lt;
                                    </a>
                                </li>

                                {{-- Liên kết Trang Trước --}}
                                <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="previousPage"
                                        wire:loading.attr="disabled">
                                        &lt;
                                    </a>
                                </li>

                                @php
                                    $window = 2; // Số trang hiển thị ở mỗi bên của trang hiện tại
                                    $totalPages = $rooms->lastPage();
                                    $currentPage = $rooms->currentPage();
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
                                <li class="page-item {{ !$rooms->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="nextPage"
                                        wire:loading.attr="disabled">
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
        </div>
    </div>
    {{-- @foreach ($zone->residents as $resident)
        <div class="modal fade" id="invoiceModal{{ $resident->id }}" tabindex="-1" role="dialog"
            aria-labelledby="invoiceModalLabel{{ $resident->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="invoiceModalLabel{{ $resident->tenant->id }}">Tạo hóa đơn cho

                            {{ $resident->tenant->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formBills" action="{{ route('owners.bills-store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="payer_id" value="{{ $resident->tenant_id }}">
                            <input type="hidden" name="creator_id" value="{{ auth()->user()->id }}">
                            <div class="row">
                                <!-- Cột trái -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Tên người ở:</label>
                                        <input type="text" class="form-control" id="name"
                                            value="{{ $resident->tenant->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="room">Tên phòng:</label>
                                        <input type="text" class="form-control" id="room"
                                            value="{{ $resident->room->title }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_due_date">Hạn thanh toán:</label>
                                        <input type="date" class="form-control" id="payment_due_date"
                                            name="payment_due_date" min="{{ date('Y-m-d') }}">
                                        <span class="text-danger" id="payment_due_date-error"></span>
                                    </div>



                                </div>

                                <!-- Cột phải -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Tiêu đề:</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            required autocomplete="off" placeholder="Nhập tiêu đề hóa đơn">
                                        <span class="text-danger" id="title-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Số tiền:</label>
                                        <input type="number" class="form-control" id="amount" name="amount"
                                            required min="0" step="0.01" placeholder="Nhập số tiền">
                                        <span class="text-danger" id="amount-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Mô tả:</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"
                                            placeholder="Nhập mô tả chi tiết về hóa đơn" required></textarea>
                                        <span class="text-danger" id="description-error"></span>
                                    </div>
                                  


                                </div>
                            </div>
                            <div class="modal-footer text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Tạo hóa đơn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
    {{-- @if ($rooms->isNotEmpty()) <!-- Kiểm tra xem có phòng không -->
        @foreach ($rooms as $room)
            <!-- Lặp qua từng phòng -->
            @php
                // Lấy cư dân trong phòng hiện tại
                $roomResidents = $residents->where('room_id', $room->id);
            @endphp

            @if ($roomResidents->isNotEmpty())
                <!-- Kiểm tra xem có cư dân không -->
                @foreach ($roomResidents as $resident)
                    <div class="modal fade" id="invoiceModal{{ $resident->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="invoiceModalLabel{{ $resident->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="invoiceModalLabel{{ $resident->tenant->id }}">Tạo hóa
                                        đơn cho
                                        {{ $resident->tenant->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formBills" action="{{ route('owners.bills-store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="payer_id" value="{{ $resident->tenant_id }}">
                                        <input type="hidden" name="creator_id" value="{{ auth()->user()->id }}">
                                        <div class="row">
                                            <!-- Cột trái -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Tên người ở:</label>
                                                    <input type="text" class="form-control" id="name"
                                                        value="{{ $resident->tenant->name }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="room">Tên phòng:</label>
                                                    <input type="text" class="form-control" id="room"
                                                        value="{{ $room->title }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="payment_due_date">Hạn thanh toán:</label>
                                                    <input type="date" class="form-control" id="payment_due_date"
                                                        name="payment_due_date" min="{{ date('Y-m-d') }}">
                                                    <span class="text-danger" id="payment_due_date-error"></span>
                                                </div>
                                            </div>

                                            <!-- Cột phải -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Tiêu đề:</label>
                                                    <input type="text" class="form-control" id="title"
                                                        name="title" required autocomplete="off"
                                                        placeholder="Nhập tiêu đề hóa đơn">
                                                    <span class="text-danger" id="title-error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="amount">Số tiền:</label>
                                                    <input type="number" class="form-control" id="amount"
                                                        name="amount" required min="0" step="0.01"
                                                        placeholder="Nhập số tiền">
                                                    <span class="text-danger" id="amount-error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Mô tả:</label>
                                                    <textarea class="form-control" id="description" name="description" rows="3"
                                                        placeholder="Nhập mô tả chi tiết về hóa đơn" required></textarea>
                                                    <span class="text-danger" id="description-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-right">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Tạo hóa đơn</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @endforeach
        <!-- Thông báo nếu không có phòng -->
    @endif
    @foreach ($rooms as $room)
        @if ($room->residents->where('status', $user_is_in)->isNotEmpty())
            @php
                $resident = $room->residents->where('status', $user_is_in)->first();
                $tenant = $resident->tenant;
            @endphp
            <div class="modal fade" id="identityModal{{ $tenant->id }}" tabindex="-1" role="dialog"
                aria-labelledby="identityModalLabel{{ $tenant->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="identityModalLabel{{ $tenant->id }}">Ảnh định danh của
                                {{ $tenant->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @php
                                $images = $tenant->identity ? $tenant->identity->imgmember : collect();
                            @endphp
                            @if ($tenant->identity && $tenant->identity->status == 2 && $images->isNotEmpty())
                                <div class="row">
                                    @foreach ($images as $image)
                                        <div class="col-md-6 mb-3">
                                            <a href="{{ asset('assets/images/register_owner/' . $image->filename) }}"
                                                data-fancybox="gallery">
                                                <img src="{{ asset('assets/images/register_owner/' . $image->filename) }}"
                                                    alt="Identity Image" class="img-fluid">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center mt-3">
                                    <button class="btn btn-primary download-all-images"
                                        data-tenant-id="{{ $tenant->id }}">Tải tất cả ảnh</button>
                                </div>
                            @else
                                <p>Không có ảnh định danh hoặc thông tin chưa được công khai.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach --}}
</main>
<!-- Modal -->
</div>
<script>
    document.addEventListener('livewire:initialized', () => {
        const checkboxes = document.querySelectorAll('.new-control-input:not(#checkAll)');
        const selectAllCheckbox = document.getElementById('checkAll');
        const deleteButton = document.querySelector('button[wire\\:click="deleteSelectedRooms"]');

        function updateSelectAllState() {
            const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            if (selectAllCheckbox) {
                selectAllCheckbox.checked = allChecked;
            }
            updateDeleteButtonState();
        }

        function updateDeleteButtonState() {
            const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
            if (deleteButton) {
                deleteButton.disabled = checkedCount === 0;
            }
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
                updateDeleteButtonState();
                @this.set('selectedRooms', isChecked ? Array.from(checkboxes).map(cb => cb.value) : []);
            });
        }

        updateSelectAllState();
    });
</script>

