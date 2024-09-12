<div>
    <!-- Lọc và phân trang -->
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
        <div class="mb-6">
            <div class="row" wire:ignore>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                    <div class="d-flex form-group mb-0 align-items-center ml-3">
                        <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                        <select wire:model.lazy="timeFilter" class="form-control form-control-lg selectpicker" data-style="bg-white btn-lg h-52 py-2 border">
                            <option value="" selected>Thời Gian:</option>
                            <option value="1_day">1 ngày</option>
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
                        <button class="btn btn-danger btn-lg" tabindex="0" aria-controls="invoice-list">
                            <span>Xóa</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
                <thead>
                    <tr role="row">
                        <th class="no-sort py-6 pl-6">
                            <label class="new-control new-checkbox checkbox-primary m-auto">
                                <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                            </label>
                        </th>
                        <th class="py-6">Tiêu đề</th>
                        <th class="py-6">Giá</th>
                        <th class="py-6">Ngày tạo đơn</th>
                        <th class="py-6">Hạn thanh toán</th>
                        <th class="py-6">Ngày thanh toán</th>
                        <th class="py-6">Trạng thái</th>
                        <th class="no-sort py-6">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($bills as $bill)
                        <tr role="row">
                            <td class="checkbox-column py-6 pl-6">
                                <label class="new-control new-checkbox checkbox-primary m-auto">
                                    <input type="checkbox" class="new-control-input child-chk select-customers-info" value="{{ $bill->id }}">
                                </label>
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
                                <a href="#" data-toggle="tooltip" title="Chỉnh sửa" class="d-inline-block fs-18 text-muted hover-primary mr-5">
                                    <i class="fal fa-pencil-alt"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="Xóa" class="d-inline-block fs-18 text-muted hover-primary">
                                    <i class="fal fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Phân trang -->
            <div class="d-flex justify-content-center">
                {{ $bills->links() }}
            </div>
        </div>
    </div>
</div>
