{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">

        <div class="d-flex flex-wrap flex-md-nowrap mb-6">
            <div class="mr-0 mr-md-auto">
                <h2 class="mb-0 text-heading fs-22 lh-15">Danh sách trọ<span
                        class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">{{ $roomCount }}</span>
                </h2>
                <p>Danh sách phòng trọ của bạn ở đây</p>
            </div>
            <div class="p-2">

                <div class="input-group input-group-lg bg-white border">
                    <div class="input-group-prepend">
                        <button class="btn pr-0 shadow-none" type="button">
                            <i class="far fa-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-transparent border-0 shadow-none text-body"
                        placeholder="Tìm kiếm phòng trọ" wire:keydown.debounce.300ms="$refresh"
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
        </div>

        {{-- Load --}}
        <div wire:loading wire:target="search, timeFilter, sortBy, perPage" class="text-center my-2">
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
                        <th scope="col" class="border-top-0 pt-5 pb-4 text-center" style="width: 300px;">Hành động</th>
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
                                            <div class="position-relative">
                                                <img src="{{ $this->getRoomImageUrl($room) }}" alt="{{ $room->title }}" class="img-fluid">
                                                
                                                @if ($room->expiration_date > now())
                                                    <span class="badge bg-danger text-white position-absolute" style="bottom: 1px; right: 1px;">
                                                        VIP
                                                    </span>
                                                @endif
                                            </div>

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
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-yellow">Chờ duyệt</span>
                                    @elseif ($room->status === 2)
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-pink">Đã duyệt</span>
                                    @else
                                        <span class="badge text-capitalize font-weight-normal fs-12 badge-gray">Không
                                            xác định</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $room->view }}</td>
                                <td class="align-middle">
                                    <!-- Nút Mua Vip -->
                                    <button type="button" class="btn btn-primary" data-id="{{ $room->id }}" data-toggle="modal" data-target="#vipModal" style="margin-right: 15px;">
                                        Mua Vip
                                    </button>
                                    <!-- Icon Chỉnh sửa -->
                                    <a href="{{ route('owners.room-view-update', $room->slug) }}" data-toggle="tooltip" title="Chỉnh sửa"
                                        class="d-inline-block fs-18 text-muted hover-primary" style="margin-right: 15px;">
                                        <i class="fal fa-pencil-alt"></i>
                                    </a>
                                    
                                    <!-- Form Xóa -->
                                    <form action="{{ route('owners.destroy', $room->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="fs-18 text-muted hover-primary border-0 bg-transparent">
                                            <i class="fal fa-trash-alt"></i>
                                        </button>
                                    </form>
                               
                                    <!-- Modal Popup -->
                                    <div class="modal fade" id="vipModal" tabindex="-1" aria-labelledby="vipModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Header của modal -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="vipModalLabel">Vui lòng chọn gói</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <!-- Nội dung của modal -->
                                                <form id="vipForm" action="{{ route('owners.thanh-toan-vip') }}" method="POST">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <!-- Trường ẩn để lưu room_id -->
                                                        <input type="hidden" id="roomId" name="room_id" value="{{$room->id}}">
                                                        <!-- Dropdown chọn gói VIP -->
                                                         <p>Mua gói vip cho phòng số: {{$room->id}}</p>
                                                        <div class="form-group">
                                                            <label for="vipPackage">Chọn gói:</label>
                                                            <select class="form-control" id="vipPackage" name="vipPackage">
                                                                @foreach($priceList as $price)
                                                                    <option value="{{ $price->id }}">
                                                                        {{ $price->location->name }} ({{ $price->duration_day }} ngày) - {{ number_format($price->price, 0, ',', '.') }} VND
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Thông tin về tài khoản và phương thức thanh toán -->
                                                        <div class="form-group mt-4">
                                                            <label>Số dư tài khoản của bạn:</label>
                                                            <p><strong>{{ number_format($user->balance, 0, ',', '.') }} VND</strong></p>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Phương thức thanh toán:</label>
                                                            <p><strong>Trừ trực tiếp vào số dư tài khoản</strong></p>
                                                        </div>

                                                        <!-- Dòng lưu ý -->
                                                        <div class="alert alert-danger mt-4" role="alert">
                                                            Tiền sẽ được trừ vào số dư tài khoản nên quý khách cần đảm bảo số dư đủ để thực hiện giao dịch. Xin cảm ơn!
                                                        </div>
                                                    </div>

                                                    <!-- Footer của modal với nút mua -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn btn-primary">Mua</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
</main>
{{-- 
</div>
</div>
</div> --}}
