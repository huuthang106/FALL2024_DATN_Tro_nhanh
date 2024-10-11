<div>
    <!-- Lọc và phân trang -->
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
        <div class="mb-6">
            <div class="row" wire:ignore>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                    <div class="d-flex form-group mb-0 align-items-center ml-3">
                        <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                        <select class="form-control selectpicker form-control-lg mr-2" wire:model.lazy="timeFilter"
                        data-style="bg-white btn-lg h-52 py-2 border">
                        <option value="" selected>Mặc định:</option>
                        <option value="1_day">Hôm qua</option>
                        <option value="7_day">7 ngày</option>
                        <option value="1_month">1 tháng</option>
                        <option value="3_month">3 tháng</option>
                        <option value="6_month">6 tháng</option>
                        <option value="1_year">1 năm</option>
                    </select>
                    </div>
                    <div class="align-self-center">
                        <button class="btn btn-primary btn-lg" tabindex="0" aria-controls="invoice-list">
                            <span>Thêm mới</span>
                        </button>
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
                        <button class="btn btn-danger btn-lg" id="deleteSelected">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
                <thead>
                    <tr role="row">
                        <th>
                            <input type="checkbox" id="checkAll"> <!-- Checkbox tổng -->
                        </th>
                        <th class="py-6" style="white-space: nowrap;">Tiêu đề</th>
                        <th class="py-6" style="white-space: nowrap;">Giá</th>
                        <th class="py-6" style="white-space: nowrap;">Ngày tạo đơn</th>
                        <th class="py-6" style="white-space: nowrap;">Hạn thanh toán</th>
                        <th class="py-6" style="white-space: nowrap;">Ngày thanh toán</th>
                        <th class="py-6" style="white-space: nowrap;">Trạng thái</th>
                        <th class="no-sort py-6" style="white-space: nowrap;">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($bills as $bill)
                        <tr role="row">
                            <td>
                                <input type="checkbox" class="bill-checkbox" value="{{ $bill->id }}" 
                                    wire:model="selectedBills"> <!-- Checkbox cho mỗi hóa đơn -->
                            </td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('owners.invoice-preview', $bill->id) }}">
                                        <p class="align-self-center mb-0 user-name">{{ $bill->description }}</p>
                                    </a>
                                </div>
                            </td>
                            <td class="align-middle"><span class="inv-amount">{{ $bill->amount }} VNĐ</span></td>
                            <td class="align-middle">
                                <span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ $bill->created_at->format('d/m/Y') }}
                            </td>
                            <td class="align-middle">
                                <span class="text-primary pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($bill->payment_due_date)->format('d/m/Y') }}
                            </td>
                            <td class="align-middle">
                                @if ($bill->status == 1)
                                    <span class="text-primary pr-1"><i class="fal fa-calendar"></i></span>Chưa có dữ liệu
                                @elseif($bill->status == 2)
                                    <span class="text-primary pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($bill->payment_date)->format('d/m/Y') }}
                                @endif
                            </td>
                            <td class="align-middle">
                                @if ($bill->status == 1)
                                    <span class="badge badge-warning text-capitalize">Chưa thanh toán</span>
                                @elseif($bill->status == 2)
                                    <span class="badge badge-green text-capitalize">Đã thanh toán</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('owners.invoice-preview', $bill->id) }}" data-toggle="tooltip" title="Thanh Toán" class="btn btn-primary btn-sm mr-5">
                                    <i class="fas fa-credit-card"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="Xóa" class="btn btn-danger btn-sm d-inline-block"
                                    onclick="confirmDelete({{ $bill->id }})">
                                    <i class="fal fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($bills->count() > 0)
            <div class="mt-6">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Nút tới trang đầu tiên --}}
                    <li class="page-item {{ $bills->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click.prevent="gotoPage(1)">
                            <i class="far fa-angle-double-left"></i>
                        </a>
                    </li>
        
                    {{-- Nút tới trang trước (<) --}}
                    <li class="page-item {{ $bills->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click.prevent="previousPage">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </li>
        
                    {{-- Trang đầu tiên --}}
                    @if ($bills->currentPage() > 2)
                        <li class="page-item"><a class="page-link" wire:click.prevent="gotoPage(1)">1</a></li>
                    @endif
        
                    {{-- Dấu ba chấm ở đầu nếu cần --}}
                    @if ($bills->currentPage() > 3)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
        
                    {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                    @for ($i = max(1, $bills->currentPage() - 1); $i <= min($bills->currentPage() + 1, $bills->lastPage()); $i++)
                        <li class="page-item {{ $bills->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" wire:click.prevent="gotoPage({{ $i }})">{{ $i }}</a>
                        </li>
                    @endfor
        
                    {{-- Dấu ba chấm ở cuối nếu cần --}}
                    @if ($bills->currentPage() < $bills->lastPage() - 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
        
                    {{-- Trang cuối cùng --}}
                    @if ($bills->currentPage() < $bills->lastPage() - 1)
                        <li class="page-item"><a class="page-link" wire:click.prevent="gotoPage({{ $bills->lastPage() }})">{{ $bills->lastPage() }}</a></li>
                    @endif
        
                    {{-- Nút tới trang kế tiếp (>) --}}
                    <li class="page-item {{ $bills->currentPage() == $bills->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click.prevent="nextPage">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
        
                    {{-- Nút tới trang cuối cùng (>>) --}}
                    <li class="page-item {{ $bills->currentPage() == $bills->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click.prevent="gotoPage({{ $bills->lastPage() }})">
                            <i class="far fa-angle-double-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        @endif
        

        
        
        </div>
    </div>
</div>
<script>
    function confirmDelete(billId) {
        Swal.fire({
            title: 'Bạn có chắc chắn?',
            text: "Bạn có muốn xóa hóa đơn này!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có, xóa!',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call('deleteBill', billId); // Call Livewire method to delete the bill
            }
        });
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkAll = document.getElementById('checkAll');
        const deleteSelectedBtn = document.getElementById('deleteSelected');
        const checkboxes = document.querySelectorAll('.bill-checkbox');

        // Hàm cập nhật trạng thái của checkbox tổng
        function capNhatTrangThaiCheckAll() {
            checkAll.checked = checkboxes.length > 0 && Array.from(checkboxes).every(checkbox => checkbox.checked);
        }

        // Bắt sự kiện thay đổi cho checkbox tổng
        checkAll.addEventListener('change', function() {
            const isChecked = this.checked;
            checkboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
                checkbox.dispatchEvent(new Event('change', { 'bubbles': true }));
            });
            @this.set('selectedBills', isChecked ? Array.from(checkboxes).map(cb => cb.value) : []);
        });

        // Bắt sự kiện thay đổi cho các checkbox con
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                capNhatTrangThaiCheckAll();
                let selectedBills = @this.get('selectedBills');
                if (this.checked) {
                    if (!selectedBills.includes(this.value)) {
                        selectedBills.push(this.value);
                    }
                } else {
                    selectedBills = selectedBills.filter(id => id !== this.value);
                }
                @this.set('selectedBills', selectedBills);
            });
        });

        // Bắt sự kiện nhấn nút "Xóa đã chọn"
        deleteSelectedBtn.addEventListener('click', function() {
            const selectedBills = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            if (selectedBills.length === 0) {
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Vui lòng chọn ít nhất một hóa đơn để xóa',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn xóa các hóa đơn đã chọn?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('deleteSelectedBills', selectedBills);
                }
            });
        });

        // Cập nhật hiển thị nút xóa dựa vào số lượng blog đã chọn
        function updateDeleteButtonVisibility() {
            const selectedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
            deleteSelectedBtn.style.display = selectedCount > 0 ? 'block' : 'none';
            checkAll.checked = selectedCount === checkboxes.length;
        }

        // Gọi hàm updateDeleteButtonVisibility mỗi khi có sự thay đổi trong checkbox
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateDeleteButtonVisibility);
        });

        // Khởi tạo trạng thái ban đầu
        updateDeleteButtonVisibility();
    });

    // Xử lý thông báo sau khi xóa thành công
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('bill-deleted', (event) => {
            Swal.fire({
                title: 'Thành công!',
                text: 'Xóa hóa đơn thành công',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        });
    });
</script>