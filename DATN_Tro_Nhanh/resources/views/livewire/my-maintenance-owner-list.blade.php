<div>
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <form action="#" method="GET">
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
                        <div
                            class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                            <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                                <input wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh" type="text"
                                    class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..."
                                    aria-label="" aria-describedby="basic-addon1">
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

            <!-- Hiển thị danh sách phòng mà người dùng đang ở -->
            <div class="mt-4">
                <h5>Danh sách phòng đang ở:</h5>

            </div>

            <div class="table-responsive">
                <table class="table table-hover bg-white border rounded-lg">
                    <thead>
                        <tr role="row">
                            <th class="no-sort py-6 pl-6">
                                <label class="new-control new-checkbox checkbox-primary m-auto">
                                    <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                                </label>
                            </th>
                            <th class="py-6">Tên phòng</th>
                            <th class="py-6">Giá</th>
                            <th class="py-6">Ngày tham gia</th>
                            <th class="no-sort py-6">Bảo trì</th>

                            <th class="no-sort py-6">Rời Khỏi</th>
                        </tr>
                    </thead>

                    @forelse ($rooms as $item)
                        <tr class="shadow-hover-xs-2">
                            <td class="checkbox-column align-middle py-4 pl-6">
                                <label class="new-control new-checkbox checkbox-primary m-auto">
                                    <input type="checkbox" class="new-control-input child-chk select-customers-info">
                                </label>
                            </td>
                            {{-- <td class="align-middle p-4 text-primary">{{ $item->tenant->name ?? 'N/A' }} --}}
                            <br>
                            </td>
                            <td class="align-middle p-4"><small>{{ $item->room->title }}</small></td>
                            <td class="align-middle p-4">
                                <small>{{ number_format($item->room->price, 0, ',', '.') }}</small>
                            </td>
                            <td class="align-middle p-4">
                                {{ $item->updated_at }}
                            </td>
                            <td class="align-middle p-4">
                                <button data-toggle="modal" href="#maintenance"
                                    class="fs-18 text-muted hover-primary border-0 bg-transparent"> <i
                                    class="fal fa-pencil-alt"></i> </button>


                            </td>
                            <td class="align-middle p-4">
                                <form action="{{ route('owners.leave-the-room', $item->id) }}" method="POST"
                                    class="d-inline-block mb-0" id="leave-room-form-{{ $item->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="fs-18 text-muted hover-primary border-0 bg-transparent"
                                        onclick="confirmLeave({{ $item->id }});">
                                        <i class="fal fa-sign-out-alt"></i>
                                    </button>
                                </form>


                            </td>

                        </tr>
                        <div class="modal fade maintenance" id="maintenance" tabindex="-1" role="dialog"
                            aria-labelledby="maintenance" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0 p-4">
                                        <h5 class="modal-title">Gửi yêu cầu </h5>
                                        <button type="button" class="close fs-23" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-4 py-sm-7 px-sm-8 text-center">
                                        <h2 class="text-heading mb-3 fs-22 fs-md-32 lh-1-5">
                                            Nội dung yêu cầu!
                                        </h2>

                                        <form id="" method="POST"
                                            action="{{ route('owners.sent-for-maintenance') }}">
                                            @csrf

                                            <input type="hidden" name="room_id" id=""
                                                value="{{ $item->room->id }}">
                                            <input type="text" class="form-control mb-3 border-0" name="title"
                                                id="" placeholder="Nhập tiêu đề"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <span id="title-error" class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="form-group mb-4">
                                                <textarea class="form-control border-0 " placeholder="Nội dung yêu cầu..." name="description" id="description"
                                                    rows="5">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span id="description-error"
                                                        class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-lg btn-primary px-5">Gửi yêu
                                                cầu</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Danh sách trống!</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            @if ($rooms->count() > 0)
                <div class="mt-6">
                    <ul class="pagination rounded-active justify-content-center">
                        {{-- Nút tới trang đầu tiên --}}
                        <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" wire:click.prevent="gotoPage(1)">
                                <i class="far fa-angle-double-left"></i>
                            </a>
                        </li>

                        {{-- Nút tới trang trước (<) --}}
                        <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" wire:click.prevent="previousPage">
                                <i class="fas fa-angle-left"></i>
                            </a>
                        </li>

                        {{-- Trang đầu tiên --}}
                        @if ($rooms->currentPage() > 2)
                            <li class="page-item"><a class="page-link" wire:click.prevent="gotoPage(1)">1</a></li>
                        @endif

                        {{-- Dấu ba chấm ở đầu nếu cần --}}
                        @if ($rooms->currentPage() > 3)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif

                        {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                        @for ($i = max(1, $rooms->currentPage() - 1); $i <= min($rooms->currentPage() + 1, $rooms->lastPage()); $i++)
                            <li class="page-item {{ $rooms->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link"
                                    wire:click.prevent="gotoPage({{ $i }})">{{ $i }}</a>
                            </li>
                        @endfor

                        {{-- Dấu ba chấm ở cuối nếu cần --}}
                        @if ($rooms->currentPage() < $rooms->lastPage() - 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif

                        {{-- Trang cuối cùng --}}
                        @if ($rooms->currentPage() < $rooms->lastPage() - 1)
                            <li class="page-item"><a class="page-link"
                                    wire:click.prevent="gotoPage({{ $rooms->lastPage() }})">{{ $rooms->lastPage() }}</a>
                            </li>
                        @endif

                        {{-- Nút tới trang kế tiếp (>) --}}
                        <li class="page-item {{ $rooms->currentPage() == $rooms->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" wire:click.prevent="nextPage">
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </li>

                        {{-- Nút tới trang cuối cùng (>>) --}}
                        <li class="page-item {{ $rooms->currentPage() == $rooms->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" wire:click.prevent="gotoPage({{ $rooms->lastPage() }})">
                                <i class="far fa-angle-double-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-center mt-2">
                    {{ $rooms->firstItem() }}-{{ $rooms->lastItem() }} của
                    {{ $rooms->total() }} kết quả
                </div>

                {{-- popup gửi đơn --}}

            @endif


        </div>
    </main>
</div>
