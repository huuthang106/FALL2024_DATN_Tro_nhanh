<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="p-3">
        <form action="#" method="GET">
            <h2 class="mb-0 text-heading fs-22 lh-15 p-3">
                Lịch sử giao dịch của tôi
                <span class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">
                    {{ $transactions->total() }}
                </span>
            </h2>
            <div class="mb-6">
                <div class="row" wire:ignore>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center ml-3">
                            <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                            <select wire:model.lazy="timeFilter" class="form-control form-control-lg selectpicker"
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
                            <button class="btn btn-danger btn-lg" tabindex="0" aria-controls="invoice-list">
                                <span>Xóa</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-responsive p-3">
            <table class="table table-hover bg-white border rounded-lg">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-nowrap">Tên dịch vụ</th>
                        <th scope="col" class="text-nowrap">Mô tả</th>
                        <th scope="col" class="text-nowrap">Ngày thanh toán</th>
                        <th scope="col" class="text-nowrap">Số tiền</th>
                        <th scope="col" class="text-nowrap">Số dư</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($transactions->count() > 0)
                        @foreach ($transactions as $transaction)
                            <tr class="shadow-hover-xs-2 bg-hover-white">
                                <td class="align-middle" style="white-space: nowrap;">
                                    <small>Thanh toán dịch vụ</small>
                                </td>

                                <td class="align-middle text-truncate"
                                    style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <small>{{ $transaction->description ?? 'Chưa có dữ liệu' }}</small>
                                </td>
                                <td class="align-middle">
                                    <small>{{ $transaction->created_at->format('d/m/Y H:i') }}</small>
                                </td>
                                <td class="align-middle">
                                    <small class="{{ $transaction->added_funds >= 0 ? 'text-success' : 'text-danger' }}"
                                        style="white-space: nowrap;">
                                        {{ number_format($transaction->added_funds, 0, ',', '.') }} VND
                                    </small>
                                </td>
                                <td class="align-middle">
                                    <small style="white-space: nowrap;">
                                        {{ number_format($transaction->balance, 0, ',', '.') }} VND
                                    </small>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center align-middle"><small>Không có giao dịch nào.</small>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @if ($transactions->count() > 0)
        <div id="pagination-section" class="mt-6">
            <ul class="pagination pagination-sm rounded-active justify-content-center">
                {{-- Nút quay về trang đầu tiên (<<) --}}
                <li class="page-item {{ $transactions->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled" href="#pagination-section">
                        <i class="far fa-angle-double-left"></i>
                    </a>
                </li>
        
                {{-- Nút quay lại trang trước (<) --}}
                <li class="page-item {{ $transactions->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled" href="#pagination-section">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
        
                {{-- Trang đầu tiên --}}
                @if ($transactions->currentPage() > 2)
                    <li class="page-item">
                        <a class="page-link" wire:click="gotoPage(1)" href="#pagination-section">1</a>
                    </li>
                @endif
        
                {{-- Dấu ba chấm ở đầu nếu cần --}}
                @if ($transactions->currentPage() > 3)
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                @endif
        
                {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                @for ($i = max(1, $transactions->currentPage() - 1); $i <= min($transactions->currentPage() + 1, $transactions->lastPage()); $i++)
                    <li class="page-item {{ $transactions->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" wire:click="gotoPage({{ $i }})" href="#pagination-section">{{ $i }}</a>
                    </li>
                @endfor
        
                {{-- Dấu ba chấm ở cuối nếu cần --}}
                @if ($transactions->currentPage() < $transactions->lastPage() - 2)
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                @endif
        
                {{-- Trang cuối cùng --}}
                @if ($transactions->currentPage() < $transactions->lastPage() - 1)
                    <li class="page-item">
                        <a class="page-link" wire:click="gotoPage({{ $transactions->lastPage() }})" href="#pagination-section">
                            {{ $transactions->lastPage() }}
                        </a>
                    </li>
                @endif
        
                {{-- Nút tới trang kế tiếp (>) --}}
                <li class="page-item {{ $transactions->currentPage() == $transactions->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled" href="#pagination-section">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
        
                {{-- Nút tới trang cuối cùng (>>) --}}
                <li class="page-item {{ $transactions->currentPage() == $transactions->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="gotoPage({{ $transactions->lastPage() }})" wire:loading.attr="disabled" href="#pagination-section">
                        <i class="far fa-angle-double-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        
        @else
            <div class="text-center mt-4">Không có giao dịch nào.</div>
        @endif







    </div>

</div>
