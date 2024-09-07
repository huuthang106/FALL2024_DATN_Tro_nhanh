<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div>
        <div class="form-inline justify-content-md-end mx-n2">
            <div class="p-2">
                <div class="input-group input-group-lg bg-white border">
                    <div class="input-group-prepend">
                        <button class="btn pr-0 shadow-none" type="button">
                            <i class="far fa-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-transparent border-0 shadow-none text-body"
                        placeholder="Tìm kiếm phòng trọ" wire:keydown.debounce.300ms="$refresh" wire:model.lazy="search">
                </div>
            </div>

            <div class="p-2">
                <div class="input-group input-group-lg bg-white border">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent letter-spacing-093 border-0 pr-0">
                            <i class="far fa-align-left mr-2"></i>Sắp xếp theo:
                        </span>
                    </div>
                    {{-- selectpicker --}}
                    <select class="form-control bg-transparent pl-0 d-flex align-items-center sortby"
                        wire:model.lazy="sortBy" wire:key="sort-select">
                        <option value="name">Chữ cái</option>
                        <option value="price_low_to_high">Giá - Thấp đến Cao</option>
                        <option value="price_high_to_low">Giá - Cao đến Thấp</option>
                        <option value="date_old_to_new">Ngày - Cũ đến Mới</option>
                        <option value="date_new_to_old">Ngày - Mới đến Cũ</option>
                    </select>
                </div>
            </div>
        </div>
        {{-- Load --}}
        <div wire:loading wire:target="search, sortBy, perPage" class="text-center my-2">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Đang tải...</span>
            </div>
        </div>
        <div wire:loading.remove wire:target="search, sortBy, perPage" class="table-responsive">
            <table class="table table-hover bg-white border rounded-lg">
                <thead class="thead-sm thead-black">
                    <tr>
                        <th scope="col" class="border-top-0 px-6 pt-5 pb-4">Tiêu đề danh sách</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Ngày xuất bản</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Trạng thái</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Xem</th>
                        <th scope="col" class="border-top-0 pt-5 pb-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr wire:loading wire:target="search, sortBy, perPage">
                        <td colspan="5" class="text-center py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Đang tải...</span>
                            </div>
                        </td>
                    </tr>
                    @if ($rooms->isEmpty())
                        <tr>
                            <td colspan="5">
                                <p class="text-center">Không có phòng trọ.</p>
                            </td>
                        </tr>
                    @else
                        @foreach ($rooms as $room)
                            <tr class="shadow-hover-xs-2 bg-hover-white">
                                <td class="align-middle pt-6 pb-4 px-6">
                                    <div class="media">
                                        <div class="w-120px mr-4 position-relative">
                                            <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}">
                                                <img src="{{ $this->getRoomImageUrl($room) }}" alt="{{ $room->title }}"
                                                    class="img-fluid">
                                            </a>
                                            <span class="badge badge-indigo position-absolute pos-fixed-top">Cho
                                                thuê</span>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}"
                                                class="text-dark hover-primary">
                                                <h5 class="fs-16 mb-0 lh-18">{{ $room->title }}</h5>
                                            </a>
                                            <p class="mb-1 font-weight-500">{{ $room->address }}</p>
                                            <span
                                                class="text-heading lh-15 font-weight-bold fs-17">{{ number_format($room->price, 0, ',', '.') }}
                                                VND</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">{{ $room->created_at->format('d/m/Y') }}</td>
                                <td class="align-middle">
                                    @if ($room->status === 1)
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-yellow">Còn
                                            trống</span>
                                    @elseif ($room->status === 2)
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-pink">Đã
                                            thuê</span>
                                    @else
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-gray">Không
                                            xác định</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $room->view }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('owners.room-view-update', $room->slug) }}" data-toggle="tooltip"
                                        title="Chỉnh sửa" class="d-inline-block fs-18 text-muted hover-primary mr-5">
                                        <i class="fal fa-pencil-alt"></i>
                                    </a>
                                    <a href="#" data-toggle="tooltip" title="Xóa"
                                        class="d-inline-block fs-18 text-muted hover-primary">
                                        <i class="fal fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- Phân trang --}}
        @if ($rooms->hasPages())
            <nav aria-label="Page navigation">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Liên kết Trang Trước --}}
                    <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled"
                            rel="prev" aria-label="@lang('pagination.previous')"><i class="far fa-angle-double-left"></i></a>
                    </li>

                    @php
                        $totalPages = $rooms->lastPage();
                        $currentPage = $rooms->currentPage();
                        $visiblePages = 3; // Số trang hiển thị ở giữa
                    @endphp

                    {{-- Trang đầu --}}
                    <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                        <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled">1</a>
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

                    {{-- Liên kết Trang Tiếp --}}
                    <li class="page-item {{ !$rooms->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="nextPage" wire:loading.attr="disabled"
                            rel="next" aria-label="@lang('pagination.next')"><i
                                class="far fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </nav>
        @endif
    </div>
</div>
