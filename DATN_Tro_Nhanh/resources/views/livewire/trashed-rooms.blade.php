<div>
    {{-- Stop trying to control. --}} <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
            <form action="{{ route('owners.properties') }}" method="GET">
                <div class="mr-0 mr-md-auto">
                    <h2 class="mb-0 text-heading fs-22 lh-15">Thùng rác
                    </h2>
                </div>
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
                                <input wire:model.lazy="search" wire:keydown.debounce.100ms="$refresh" type="text"
                                    class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..."
                                    aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-append position-absolute pos-fixed-right-center">
                                    <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                            class="fal fa-search"></i></button>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <button class="btn btn-danger btn-lg" tabindex="0"><span>Xóa</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-hover bg-white border rounded-lg">
                    <thead class="thead-sm thead-black">
                        <tr>
                            <th scope="col" class="border-top-0 px-6 pt-5 pb-4 text-nowrap">
                                <small>Tiêu đề danh sách</small>
                            </th>
                            <th scope="col" class="border-top-0 pt-5 pb-4 text-nowrap">
                                <small>Ngày xuất bản</small>
                            </th>
                            <th scope="col" class="border-top-0 pt-5 pb-4 text-nowrap">
                                <small>Trạng thái</small>
                            </th>
                            <th scope="col" class="border-top-0 pt-5 pb-4 text-nowrap">
                                <small>Xem</small>
                            </th>
                            <th scope="col" class="border-top-0 pt-5 pb-4 text-nowrap">
                                <small>Hành động</small>
                            </th>
                        </tr>
                    </thead>


                    <tbody>
                        @if ($trashedRooms->isEmpty())
                            <tr>
                                <td colspan="5">
                                    <p class="text-center"><small>Không có phòng phù hợp!</small></p>
                                </td>
                            </tr>
                        @else
                            @foreach ($trashedRooms as $room)
                                <tr class="shadow-hover-xs-2 bg-hover-white">
                                    <!-- Cột Tiêu đề và Hình ảnh -->
                                    <td class="align-middle pt-6 pb-4 px-6">
                                        <div class="media">
                                            <div class="w-120px mr-4 position-relative">
                                                <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}">
                                                    <img src="{{ $this->getRoomImageUrl($room) }}"
                                                        alt="{{ $room->title }}" class="img-fluid">
                                                </a>
                                                <span class="badge badge-indigo position-absolute pos-fixed-top"><small>Cho
                                                        thuê</small></span>
                                            </div>
                    
                                            <div class="media-body">
                                                <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}"
                                                    class="text-dark hover-primary">
                                                    <h5 class="fs-16 mb-0 lh-18"><small>{{ $room->title }}</small></h5>
                                                </a>
                                                <p class="mb-1 font-weight-500">
                                                    <small>{{ Str::limit($room->address, 30) }}</small>
                                                </p>
                    
                                                <span class="text-heading lh-15 font-weight-bold fs-17 text-nowrap">
                                                    <small>{{ number_format($room->price, 0, ',', '.') }} VND</small>
                                                </span>
                    
                                            </div>
                                        </div>
                                    </td>
                    
                                    <!-- Cột Ngày Xuất Bản -->
                                    <td class="align-middle"><small>{{ $room->created_at->format('d/m/Y') }}</small>
                                    </td>
                    
                                    <!-- Cột Trạng thái -->
                                    <td class="align-middle">
                                    @if ($room->status === 1)
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-yellow">Chờ
                                            duyệt</span>
                                    @elseif ($room->status === 2)
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-pink">Đã
                                            duyệt</span>
                                    @else
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-gray">Không
                                            xác định</span>
                                    @endif
                                    </td>
                    
                                    <!-- Cột Lượt Xem -->
                                    <td class="align-middle"><small>{{ $room->view }}</small></td>
                    
                                    <!-- Cột Hành Động -->
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <!-- Nút Khôi phục -->
                                            <form action="{{ route('owners.restore', $room->id) }}" method="POST"
                                                class="flex-fill">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </form>
                    
                                            <!-- Nút Xóa -->
                                            <form action="{{ route('owners.forceDelete-room', $room->id) }}"
                                                method="POST" class="flex-fill mb-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm">
                                                    <i class="fal fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    


                </table>
                @if ($trashedRooms->hasPages())
                    <div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm rounded-active justify-content-center">
                                {{-- Liên kết Trang Đầu --}}
                                <li class="page-item {{ $trashedRooms->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage(1)"
                                        wire:loading.attr="disabled" rel="first" aria-label="@lang('pagination.first')">
                                        <i class="far fa-angle-double-left"></i>
                                    </a>
                                </li>

                                {{-- Liên kết Trang Trước --}}
                                <li class="page-item {{ $trashedRooms->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="previousPage"
                                        wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">
                                        <i class="far fa-angle-left"></i>
                                    </a>
                                </li>

                                @php
                                    $totalPages = $trashedRooms->lastPage();
                                    $currentPage = $trashedRooms->currentPage();
                                @endphp

                                {{-- Hiển thị trang đầu tiên --}}
                                <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage(1)"
                                        wire:loading.attr="disabled">1</a>
                                </li>

                                {{-- Dấu ba chấm nếu cần --}}
                                @if ($currentPage > 3)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                {{-- Hiển thị trang thứ hai và ba nếu có --}}
                                @for ($i = max(2, $currentPage - 1); $i <= min($totalPages - 1, $currentPage + 1); $i++)
                                    @if ($i != 1 && $i != $totalPages)
                                        {{-- Bỏ qua trang đầu và trang cuối --}}
                                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                            <a class="page-link hover-white"
                                                wire:click="gotoPage({{ $i }})"
                                                wire:loading.attr="disabled">{{ $i }}</a>
                                        </li>
                                    @endif
                                @endfor

                                {{-- Dấu ba chấm nếu cần --}}
                                @if ($currentPage < $totalPages - 2)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                {{-- Hiển thị trang cuối cùng --}}
                                @if ($totalPages > 1)
                                    <li class="page-item {{ $currentPage == $totalPages ? 'active' : '' }}">
                                        <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                                            wire:loading.attr="disabled">{{ $totalPages }}</a>
                                    </li>
                                @endif

                                {{-- Liên kết Trang Tiếp --}}
                                <li class="page-item {{ !$trashedRooms->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="nextPage"
                                        wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">
                                        <i class="far fa-angle-right"></i>
                                    </a>
                                </li>

                                {{-- Liên kết Trang Cuối --}}
                                <li class="page-item {{ !$trashedRooms->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                                        wire:loading.attr="disabled" rel="last" aria-label="@lang('pagination.last')">
                                        <i class="far fa-angle-double-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                @endif
            </div>
        </div>
    </main>
</div>
