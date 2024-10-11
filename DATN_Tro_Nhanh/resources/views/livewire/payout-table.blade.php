{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
                
            <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                <div class="mr-0 mr-md-auto">
                    <h2 class="mb-0 text-heading fs-22 lh-15"> Đơn rút tiền của tôi <span class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">
                        {{ $payouts->total() }}
                        </span>
                    </h2>
                </div>
                <div class="p-2 d-flex align-items-center">
                    <div class="input-group input-group-lg bg-white border mr-2" style="width: 300px;">
                        <div class="input-group-prepend">
                            <button class="btn pr-0 shadow-none" type="button">
                                <i class="far fa-search"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0 shadow-none text-body"
                        placeholder="Nhập mã đơn" wire:keydown.debounce.300ms="$refresh"
                        wire:model.lazy="search">
                    </div>
                </div>

                <div class="p-2" wire:ignore>
                    <div class="input-group input-group-lg bg-white border">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent letter-spacing-093 border-0 pr-0">
                                <i class="far fa-align-left mr-2"></i>Lọc theo:
                            </span>
                        </div>
                        <select class="form-control bg-transparent pl-0 selectpicker d-flex align-items-center sortby"
                            wire:model.lazy="timeFilter" id="timeFilter"
                            data-style="bg-transparent px-1 py-0 lh-1 font-weight-600 text-body">
                            <option value="" selected>Mặc định</option>
                            <option value="1_day">Hôm qua</option>
                            <option value="7_day">7 ngày</option>
                            <option value="1_month">1 tháng</option>
                            <option value="3_month">3 tháng</option>
                            <option value="6_month">6 tháng</option>
                            <option value="1_year">1 năm</option>
                        </select>
                    </div>
                </div>
            </div>

  
            
            <div class="table-responsive">
                <table class="table table-hover bg-white border rounded-lg">
                    <thead>
                        <tr class="align-middle">
                           
                            <th scope="col" class="text-nowrap align-middle">Mã đơn</th>
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
                
                        @if ($payouts->isEmpty())
                            <tr>
                                <td colspan="8">
                                    <p class="text-center">Không có đơn rút tiền.</p>
                                </td>
                            </tr>
                        @else
                            @foreach ($payouts as $payout)
                                <tr role="shadow-hover-xs-2 bg-hover-white">
                                    
                                    <td class="align-middle text-nowrap">{{ $payout->single_code }}</td>
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
                                            {{ \Carbon\Carbon::parse($payout->canceled_at)->format('d/m/Y') }}
                                        @else
                                            Chưa có dữ liệu
                                        @endif
                                    </td>
                                    <td class="align-middle text-nowrap">{{ number_format($payout->amount, 0, ',', '.') }} VNĐ</td>
                                    <td class="align-middle p-4">
                                        @if ($payout->status == '1')
                                            <span class="badge badge-yellow text-capitalize font-weight-normal fs-12">Đang xử lý</span>
                                        @elseif ($payout->status == '2')
                                            <span class="badge badge-success text-capitalize font-weight-normal fs-12">Đã chuyển</span>
                                        @elseif ($payout->status == '3')
                                            <span class="badge badge-danger text-capitalize font-weight-normal fs-12">Đã hủy</span>
                                        @elseif ($payout->status == '4')
                                            <span class="badge badge-danger text-capitalize font-weight-normal fs-12">Bị từ chối</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-nowrap">
                                        @if($payout->status != '2' && $payout->status != '3')
                                            <button wire:click="deletePayout({{ $payout->id }})" data-toggle="tooltip" title="Hủy" class="btn badge-danger btn-sm">
                                                <i class="fal fa-trash-alt"></i>
                                                <div wire:loading>
                                                    <span>Đang xử lý...</span>
                                                </div>
                                            </button>
                                            
                                        @endif
                                   
                                    </td>
                                </tr>
                            @endforeach

                </table>
                @endif
                </tbody>

            </div>
            {{-- Phân trang --}}
            @if ($payouts->count() > 0)
                <div class="mt-6">
                    <ul class="pagination pagination-sm rounded-active justify-content-center flex-wrap">
                        {{-- Nút tới trang đầu tiên --}}
                        <li class="page-item {{ $payouts->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" wire:click.prevent="gotoPage(1)">
                                <i class="far fa-angle-double-left"></i>
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
</main>

