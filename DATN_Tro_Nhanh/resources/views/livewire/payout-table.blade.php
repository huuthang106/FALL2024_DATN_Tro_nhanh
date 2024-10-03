<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <div class="p-3">
                <form action="#" method="GET">
                    <h2 class="mb-0 text-heading fs-22 lh-15 p-3">
                        Đơn rút tiền của tôi
                        <span class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">
                            {{ $payouts->total() }}
                        </span>
                    </h2>
                    <div class="mb-6">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                                <div class="d-flex form-group mb-0 align-items-center ml-3"  wire:ignore>
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
                            <div
                                class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                                <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                                    <input wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh"
                                        type="text" class="form-control bg-transparent border-1x"
                                        placeholder="Tìm kiếm..." aria-label="" aria-describedby="basic-addon1">
                                    <div class="input-group-append position-absolute pos-fixed-right-center">
                                        <button class="btn bg-transparent border-0 text-gray lh-1" type="button">
                                            <i class="fal fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table id="invoice-list" class="table table-hover table-sm border rounded-lg">
                        <thead>
                            <tr>
                                <th class="no-sort py-6 pl-6 align-middle checkbox-column">
                                    <div class="d-flex align-items-center">
                                        <label class="new-control new-checkbox checkbox-primary mb-0">
                                            <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                                            <span class="new-control-indicator"></span>
                                        </label>
                                    </div>
                                </th>
                                <th scope="col" class="text-nowrap align-middle">Nội Dung Rút Tiền</th>
                                <th scope="col" class="text-nowrap align-middle">Ngân Hàng</th>
                                <th scope="col" class="text-nowrap align-middle">Ngày rút</th>
                                <th scope="col" class="text-nowrap align-middle">Ngày hủy</th>
                                <th scope="col" class="text-nowrap align-middle">Số tiền rút</th>
                                <th scope="col" class="text-nowrap align-middle">Trạng thái</th>
                                <th scope="col" class="text-nowrap align-middle actions">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payouts as $payout)
                                <tr role="row">
                                    <td class="checkbox-column py-6 pl-6">
                                        <label class="new-control new-checkbox checkbox-primary m-auto">
                                            <input type="checkbox" class="new-control-input child-chk select-customers-info" value="{{ $payout->id }}">
                                        </label>
                                    </td>
                                    <td class="align-middle text-nowrap">
                                        <div class="d-flex align-items-center">
                                            <a href="#">
                                                <p class="align-self-center mb-0 user-name">{{ $payout->description }}
                                                </p>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-wrap">{{ $payout->bank_name }}</td>
                                    <td class="align-middle text-nowrap">{{ $payout->requested_at->format('d/m/Y') }}</td>
                                    <td class="align-middle text-nowrap">
                                        @if ($payout->canceled_at)
                                            {{ $payout->canceled_at->format('d/m/Y') }}
                                        @else
                                            Chưa có dữ liệu
                                        @endif
                                    </td>
                                    <td class="align-middle text-nowrap">{{ number_format($payout->amount, 0, ',', '.') }} VNĐ</td>
                                    <td class="align-middle p-4">
                                        @if ($payout->status == '1')
                                            <span class="badge badge-yellow text-capitalize font-weight-normal fs-12">Đang xử lý</span>
                                        @elseif ($payout->status == '2')
                                            <span class="badge badge-green text-capitalize font-weight-normal fs-12">Đã hoàn thành</span>
                                        @elseif ($payout->status == '3')
                                            <span class="badge badge-blue text-capitalize font-weight-normal fs-12">Đã hủy</span>
                                        @else
                                            <span class="badge badge-light text-capitalize font-weight-normal fs-12">Không xác định</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-nowrap">
                                        <button wire:click="deletePayout({{ $payout->id }})" data-toggle="tooltip" title="Xóa" class="btn btn-link p-0 d-inline-block fs-18 text-muted hover-primary">
                                            <i class="fal fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @if ($payouts->count() > 0)
                    <div class="mt-6">
                        <ul class="pagination pagination-sm rounded-active justify-content-center flex-wrap">
                            {{-- Nút tới trang đầu tiên --}}
                            <li class="page-item {{ $payouts->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" wire:click.prevent="gotoPage(1)">
                                    <i class="far fa-angle-double-left"></i>
                                </a>
                            </li>
                
                            {{-- Nút tới trang trước --}}
                            <li class="page-item {{ $payouts->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" wire:click.prevent="previousPage">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </li>
                
                            {{-- Hiển thị các trang --}}
                            @php
                                $currentPage = $payouts->currentPage();
                                $lastPage = $payouts->lastPage();
                            @endphp
                
                            {{-- Luôn hiển thị trang đầu tiên --}}
                            <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                                <a class="page-link" wire:click.prevent="gotoPage(1)">1</a>
                            </li>
                
                            @if($currentPage > 3)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                
                            {{-- Hiển thị trang hiện tại và các trang xung quanh --}}
                            @foreach (range(max(2, $currentPage - 1), min($lastPage - 1, $currentPage + 1)) as $i)
                                @if ($i > 1 && $i < $lastPage)
                                    <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                        <a class="page-link" wire:click.prevent="gotoPage({{ $i }})">{{ $i }}</a>
                                    </li>
                                @endif
                            @endforeach
                
                            @if($currentPage < $lastPage - 2)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                
                            {{-- Luôn hiển thị trang cuối cùng --}}
                            @if($lastPage > 1)
                                <li class="page-item {{ $currentPage == $lastPage ? 'active' : '' }}">
                                    <a class="page-link" wire:click.prevent="gotoPage({{ $lastPage }})">{{ $lastPage }}</a>
                                </li>
                            @endif
                
                            {{-- Nút tới trang kế tiếp --}}
                            <li class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                                <a class="page-link" wire:click.prevent="nextPage">
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </li>
                
                            {{-- Nút tới trang cuối cùng --}}
                            <li class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                                <a class="page-link" wire:click.prevent="gotoPage({{ $lastPage }})">
                                    <i class="far fa-angle-double-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif

                </div>
            </div>
        </div>
    </main>
</div>
