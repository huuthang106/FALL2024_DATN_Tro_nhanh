<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 add-new-invoice">
            <form action="{{ route('owners.payment-bill', $bill->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-9 mb-6 mb-xl-0">
                        <div class="card card-body main-invoice-info p-6">
                            <div class="row mb-7">
                                <div class="col-sm-6 col-12 mr-auto mb-6">
                                    <div class="d-flex align-items-center">
                                        <img class="company-logo" src="{{ asset('assets/images/tro-moi.png') }}"
                                            alt="company">
                                        <h3 class="mb-0 ml-2 fs-18">Tìm trọ nhanh</h3>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-sm-right mb-6">
                                    <p class="fs-18 mb-0"><span class="inv-title">Hóa đơn : </span> <span
                                            class="text-primary">#000{{ $bill->id }}</span></p>
                                </div>
                                <div class="col-sm-6 align-self-center mt-3">
                                    {{-- <p class="mb-0">Quận Cái Răng, TP.Cần Thơ</p> --}}
                                    @if ($bill && $bill->payer) <!-- Kiểm tra xem hóa đơn và người dùng có tồn tại không -->
                                        <p class="mb-0 text-truncate" style="max-width: 100%;">Địa chỉ: {{ $bill->payer->address }}</p> <!-- Hiển thị địa chỉ của người dùng -->
                                        <p class="mb-0">{{ $bill->payer->email }}</p> <!-- Hiển thị email của người dùng -->
                                        <p class="mb-0">{{ $bill->payer->phone }}</p> <!-- Hiển thị số điện thoại của người dùng -->
                                    @else
                                        <p class="mb-0">Không có thông tin người dùng.</p>
                                    @endif
                                </div>
                                <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                                    <p class="mb-0"><span class="text-heading font-weight-500">Ngày lập hóa đơn :
                                        </span>
                                        <span class="inv-date">{{ $bill->created_at->format('d/m/Y') }}</span>
                                    </p>
                                    <p class="mb-0">
                                        <span class="text-heading font-weight-500">Hạn Thanh Toán : </span>
                                        <span
                                            class="inv-date">{{ \Carbon\Carbon::parse($bill->payment_due_date)->format('d/m/Y') }}</span>
                                    </p>
                                </div>
                            </div>
                            @if ($status != 1)
                                <div class="border-top pt-7 mb-7">
                                    <div class="row">
                                        <div class="col-xl-8 col-md-6 col-sm-4 align-self-center">
                                            <h6 class="card-title mb-5 text-heading fs-22 lh-15">Hóa đơn gửi đến</h6>
                                        </div>
                                        <div
                                            class="col-xl-4 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-right">
                                            <h6 class="card-title mb-5 text-heading fs-22 lh-15">Thông tin thanh toán:
                                            </h6>
                                        </div>
                                        <div class="col-xl-8 col-md-6 col-sm-4 align-self-center mb-6 mb-md-0">
                                            <p class="mb-0">{{ $name }}</p>
                                            <p class="mb-0">{{ $address }}</p>
                                            <p class="mb-0">{{ $email }}</p>
                                            <p class="mb-0">{{ $phone }}</p>
                                        </div>
                                        <div
                                            class="col-xl-4 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-right">
                                            <p class="mb-0"><span class="text-heading font-weight-500">Ngân
                                                    Hàng:</span>
                                                <span>Vietcombank</span>
                                            </p>
                                            <p class="mb-0"><span class="text-heading font-weight-500">Tên tài khoản:
                                                </span>
                                                <span>1234567890</span>
                                            </p>
                                            <p class="mb-0"><span class="text-heading font-weight-500">Mã bưu
                                                    chính:</span>
                                                <span>VS70134</span>
                                            </p>
                                            <p class="mb-0"><span class="text-heading font-weight-500">Quốc gia:
                                                </span>
                                                <span>Việt Nam</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">Tên mặt hàng</th>
                                            <th class="text-right" scope="col">Mô tả</th>
                                            <th class="text-right" scope="col">Giá</th>
                                            <th class="text-right" scope="col">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $bill->title }}</td>
                                            <td class="text-right">{{ $bill->description }}</td>
                                            <td class="text-right">{{ number_format($bill->amount, 0, ',', '.') }}</td>
                                            <td class="text-right">{{ number_format($bill->amount, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                </div>
                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                    <div class="text-sm-right">
                                        <div class="row">
                                            <div class="col-sm-8 col-7">
                                                <p class="mb-1">Tổng Phụ Thu: </p>
                                            </div>
                                            <div class="col-sm-4 col-5">
                                                <p class="mb-1">{{ number_format($bill->amount, 0, ',', '.') }}</p>
                                            </div>
                                            <div class="col-sm-8 col-7">
                                                <p class="mb-1">Số Tiền Thuế: </p>
                                            </div>
                                            <div class="col-sm-4 col-5">
                                                <p class="mb-1">Không có</p>
                                            </div>
                                            <div class="col-sm-8 col-7 grand-total-title mt-4">
                                                <h4 class="text-heading fs-22 lh-15">Tổng Cộng : </h4>
                                            </div>
                                            <div class="col-sm-4 col-5 grand-total-amount mt-4">
                                                <h4 class="text-heading fs-22 lh-15">
                                                    {{ number_format($bill->amount, 0, ',', '.') }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top pt-6 mt-7">
                                <div class="row">
                                    <div class="col-sm-12 col-12 order-sm-0 order-1">
                                        <p class="mb-0">Ghi chú: Cảm ơn bạn đã hợp tác Kinh doanh với chúng tôi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 invoice-preview-button">
                        <div class="card card-body p-6">
                            <div class="row">
                                @if (Auth::user()->role == 1)
                                    <div class="col-12 mb-3">
                                        <a href="javascript:void(0);" class="btn btn-success btn-download btn-block">Tải
                                            xuống</a>
                                    </div>
                                @else
                                    <div class="col-12 mb-3">
                                        <a href="javascript:void(0);" class="btn btn-success btn-download btn-block">Tải
                                            xuống</a>
                                    </div>
                                    @if ($status == 1 && $bill->creator_id == Auth::id())
                                    <div class="col-12 mb-3">
                                        <a href="javascript:void(0);" class="btn btn-dark btn-edit btn-block"
                                            wire:click="editBill({{ $bill->id }})" data-toggle="modal"
                                            data-target="#maintenance">
                                            Chỉnh sửa hóa đơn
                                        </a>
                                    </div>
                                @endif
                                @endif
                            </div>

                            @if (Auth::id() != $bill->creator_id && $bill->status != 2)
                                <div class="row mt-3">
                                    <div class="col-12 d-flex flex-column justify-content-end">
                                        <button type="submit" class="btn btn-danger btn-print btn-block">Thanh
                                            Toán</button>
                                        @if (session('error'))
                                            <p class="text-danger mt-2 text-center">{{ session('error') }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    @if ($showModal)
        <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog"
            aria-labelledby="maintenance" aria-hidden="false">
            <div class="modal-dialog modal-lg modal-dialog-centered mxw-571" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0 p-4">
                        <h5 class="modal-title">Chỉnh sửa hóa đơn</h5>
                        <button type="button" class="close fs-23" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-4 py-sm-7 px-sm-8">
                        <form wire:submit.prevent="updateBill">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="payment_due_date">Hạn thanh toán:</label>
                                        <input type="date" class="form-control" id="payment_due_date" wire:model="payment_due_date" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Tiêu đề:</label>
                                        <input type="text" class="form-control" id="title" wire:model="title" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="amount">Số tiền:</label>
                                        <input type="number" class="form-control" id="amount" wire:model="amount" required min="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="description">Nội dung:</label>
                                        <textarea class="form-control" id="description" wire:model="description" rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer text-right">
                                <button type="button" class="btn btn-danger btn" wire:click="closeModal">Đóng</button>
                                <button type="submit" class="btn btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
