<div>
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <div class="mb-6">
                <div class="row" wire:ignore>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center">
                            <label for="invoice-list_length" class="d-block mr-2 mb-0">Lọc:</label>
                            <select wire:model.lazy="status" name="invoice-list_length" id="invoice-list_length"
                                aria-controls="invoice-list" class="form-control form-control-lg mr-2 selectpicker"
                                data-style="bg-white btn-lg h-52 py-2 border">
                                <option value="">Tất cả</option>
                                <option value="1">Chưa thanh toán</option>
                                <option value="2">Đã thanh toán</option>

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

                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
                    <thead>
                        <tr role="row">


                            {{-- @if ($currentUserRole != 1)  
                                <th class="py-6">Người Nhận</th>
                            @else --}}
                            <th class="py-6 p-3" style="white-space: nowrap;">Tên Người Nhận</th>
                            {{-- @endif --}}
                            <th class="py-6" style="white-space: nowrap;"q>Nội Dung</th>
                            <th class="py-6" style="white-space: nowrap;">Giá</th>

                            <th class="py-6" style="white-space: nowrap;">Ngày tạo đơn</th>
                            <th class="py-6" style="white-space: nowrap;">Ngày thanh toán</th>
                            <th class="py-6" style="white-space: nowrap;">Trạng thái</th>
                            <th class="no-sort py-6" style="white-space: nowrap;">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($bills->isEmpty())
                            <tr class="text-center mt-2">
                                <td colspan="7">Không có dữ liệu</td> <!-- Thêm colspan để căn giữa -->
                            </tr>
                        @else
                            @foreach ($bills as $bill)
                                <tr role="row">

                                    <td class="align-middle">
                                        <div class="d-flex align-items-center p-3">
                                            <a href="{{ route('owners.invoice-preview', $bill->id) }}">

                                                <p class="align-self-center mb-0 user-name">{{ $bill->payer->name }}</p>

                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle" style="white-space: nowrap;"><span
                                            class="inv-amount">{{ $bill->description }}</span></td>
                                    <td class="align-middle"><span class="inv-amount">{{ $bill->amount }} VNĐ</span>
                                    </td>

                                    <td class="align-middle" style="white-space: nowrap;">
                                        <span class="text-success pr-1"><i
                                                class="fal fa-calendar"></i></span>{{ $bill->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="align-middle">
                                        @if ($bill->status == 1)
                                            <span class="text-primary pr-1"><i class="fal fa-calendar"></i></span>Chưa
                                            có dữ
                                            liệu
                                        @elseif($bill->status == 2)
                                            <span class="text-primary pr-1"><i
                                                    class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($bill->payment_date)->format('d/m/Y') }}
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if ($bill->status == 1)
                                            <span class="badge badge-warning text-capitalize">Chưa thanh toán</span>
                                        @elseif($bill->status == 2)
                                            <span class="badge badge-green text-capitalize">Đã thanh toán</span>
                                        @endif
                                    </td>
                                    <td class="pt-5">
                                        <div class="d-flex flex-row justify-content-start align-items-center">
                                            <a href="{{ route('owners.invoice-preview', $bill->id) }}" data-toggle="tooltip" title="Chỉnh sửa"
                                                class="d-inline-block fs-18 text-muted hover-primary mr-2">
                                                <i class="fal fa-pencil-alt btn btn-primary btn-sm"></i>
                                            </a>
                                            @if ($bill->status == 1)
                                            <a href="#" data-toggle="tooltip" title="Xóa"
                                                class="d-inline-block fs-4 text-muted hover-primary"
                                                onclick="confirmDelete({{ $bill->id }})">
                                                <i class="fal fa-trash-alt btn btn-danger btn-sm"></i>
                                            </a>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
            </div>
           
            @if ($bills->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm rounded-active justify-content-center">
                        {{-- Liên kết Trang Đầu --}}
                        <li class="page-item {{ $bills->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled">
                                &lt;&lt;
                            </a>
                        </li>

                        {{-- Liên kết Trang Trước --}}
                        <li class="page-item {{ $bills->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled">
                                &lt;
                            </a>
                        </li>

                        @php
                            $window = 2; // Số trang hiển thị ở mỗi bên của trang hiện tại
                            $totalPages = $bills->lastPage();
                            $currentPage = $bills->currentPage();
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
                        <li class="page-item {{ !$bills->hasMorePages() ? 'disabled' : '' }}">
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
    </main>
    <script>
        window.addEventListener('show-edit-modal', event => {
            $('#maintenance').modal('show');
        });
    
        window.addEventListener('hide-edit-modal', event => {
            $('#maintenance').modal('hide');
        });
    </script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
     function confirmDelete(billId) {
         Swal.fire({
             title: 'Bạn có chắc chắn muốn xóa?',
             text: "Hành động này không thể hoàn tác!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Đồng ý, xóa!',
             cancelButtonText: 'Hủy'
         }).then((result) => {
             if (result.isConfirmed) {
                 // This will call the Livewire deleteBill function
                 @this.deleteBill(billId);
                 
                 Swal.fire(
                     'Đã xóa!',
                     'Hóa đơn đã được xóa thành công.',
                     'success'
                 );
             }
         });
     }
 </script>
 
</div>
    
</div>
