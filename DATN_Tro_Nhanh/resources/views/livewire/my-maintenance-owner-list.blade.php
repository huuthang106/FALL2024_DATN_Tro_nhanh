<div>
    <div class="p-3">
            <div class="mb-6">
                <div class="row" wire:ignore>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center">
                            <label for="invoice-list_length" class="d-block mr-2 mb-0">Lọc:</label>
                            <select wire:model.lazy="timeFilter" name="invoice-list_length" id="invoice-list_length"
                            aria-controls="invoice-list" class="form-control form-control-lg mr-2 selectpicker"
                            data-style="bg-white btn-lg h-52 py-2 border">
                                <option value="">Mặc định</option>

                                <option value="1_day">Hôm qua</option>
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
                            <th class="py-6" style="white-space: nowrap;">Tên phòng </th>
                            {{-- @endif --}}
                            <th class="py-6" style="white-space: nowrap;"q>Giá</th>
                            <th class="py-6" style="white-space: nowrap;">Ngày tham gia</th>

                            <th class="py-6" style="white-space: nowrap;">Bảo trì</th>
                            <th class="py-6" style="white-space: nowrap;">Rời khỏi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @if ($rooms->isEmpty())
                            <tr class="text-center mt-2">
                                <td colspan="7">Không có dữ liệu</td> <!-- Thêm colspan để căn giữa -->
                            </tr>
                        @else
                            @foreach ($rooms as $item)
                                <tr role="row">

                                    </td>
                                    <td class="align-middle p-4" style="white-space: nowrap;">
                                        <small>{{ $item->room->title }}</small>
                                    </td>
                                    <td class="align-middle p-4" style="white-space: nowrap;">
                                        <small>{{ number_format($item->room->price, 0, ',', '.') }}</small>
                                    </td>
                                    <td class="align-middle p-4" style="white-space: nowrap;">
                                        {{ $item->updated_at }}
                                    </td>
                                    <td class="align-middle p-4" style="white-space: nowrap;">
                                        <button data-toggle="modal" href="#maintenance"
                                            class="badge badge-warning border-0"> <i
                                                class="fal fa-pencil-alt"></i> </button>


                                    </td>
                                    <td class="align-middle p-4" style="white-space: nowrap;">
                                        <form action="{{ route('owners.leave-the-room', $item->id) }}" method="POST"
                                            class="d-inline-block mb-0" id="leave-room-form-{{ $item->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="badge badge-primary border-0"
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
                                                    <input type="text" class="form-control mb-3 border-0"
                                                        name="title" id="" placeholder="Nhập tiêu đề"
                                                        value="{{ old('title') }}">
                                                    @error('title')
                                                        <span id="title-error"
                                                            class="text-danger">{{ $message }}</span>
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
                            @endforeach
                        @endif
                    </tbody>

                </table>
            </div>
        <div class="row justify-content-center p-5">
            @if ($rooms->hasPages())
            <nav aria-label="Page navigation">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Nút về đầu --}}

                    <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                        rel="prev" aria-label="@lang('pagination.previous')"><i
                            class="far fa-angle-double-left"></i></a>
                    </li>
                    
                    @php
                        $totalPages = $rooms->lastPage();
                        $currentPage = $rooms->currentPage();
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

                    <li class="page-item {{ !$rooms->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link hover-white" wire:click="gotoPage({{ $rooms->lastPage() }})" wire:loading.attr="disabled"
                        rel="next" aria-label="@lang('pagination.next')"><i
                            class="far fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </nav>
            @endif
        </div>
    </div>
</div>
