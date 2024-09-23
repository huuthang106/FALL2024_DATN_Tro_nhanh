<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row align-items-sm-center mb-6">
        <div class="col-md-6">
            <h2 class="fs-15 text-dark mb-0">Chúng tôi đã tìm thấy <span class="text-primary">{{ $rooms->total() }}</span>
                phòng trọ dành cho bạn
            </h2>
        </div>
        <div class="col-md-6 mt-6 mt-md-0" wire:ignore>
            <div class="d-flex justify-content-md-end align-items-center">
                <div class="input-group border rounded input-group-lg w-auto bg-white mr-3">
                    <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3"
                        for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>SẮP
                        XẾP:</label>
                    <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby"
                        data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01"
                        name="sortby" wire:model.lazy="sortBy">
                        <option value="default">Mặc định</option>
                        <option value="price_asc">Giá (thấp đến cao)</option>
                        <option value="price_desc">Giá (cao đến thấp)</option>
                    </select>
                </div>
                <div class="d-none d-md-block">
                    {{-- <a class="fs-sm-18 text-dark opacity-2" href="listing-with-left-filter.html">
                        <i class="fas fa-list"></i>
                    </a> --}}
                    <a class="fs-sm-18 text-dark ml-5" href="#">
                        <i class="fa fa-th-large"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($rooms->isNotEmpty())
            @foreach ($rooms as $room)
                <div class="col-md-6 mb-6">
                    {{-- data-animate="fadeInUp" --}}
                    <div class="card border-0">
                        <div class="position-relative bg-hover-overlay rounded-lg card-img" style="height: 200px;">
                            @if ($room->images->isNotEmpty())
                                @php
                                    // Lấy ảnh đầu tiên
                                    $image = $room->images->first();
                                @endphp
                                <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}">
                                    <img src="{{ asset('assets/images/' . $image->filename) }}"
                                        alt="{{ $room->title }}" class="img-fluid w-100 h-100 rounded"
                                        style="object-fit: cover;">
                                </a>
                            @else
                                <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}">
                                    <img src="{{ asset('assets/images/properties-grid-01.jpg') }}"
                                        alt="{{ $room->title }}" class="img-fluid w-100 h-100 rounded"
                                        style="object-fit: cover;">
                                </a>
                            @endif
                            <div class="card-img-overlay d-flex flex-column">
                                {{-- <div><span class="badge badge-primary">Cần Bán</span></div> --}}
                                <div>
                                    @if ($room->user->has_vip_badge)
                                        <span class="badge badge-primary">VIP</span>
                                    @endif
                                    {{-- <span class="badge badge-primary">Cần Bán</span> --}}
                                </div>
                                <div class="mt-auto d-flex hover-image">
                                    <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                                        {{-- <li class="list-inline-item mr-2" data-toggle="tooltip"
                                            title="9 Hình ảnh">
                                            <a href="#" class="text-white hover-primary">
                                                <i class="far fa-images"></i><span
                                                    class="pl-1">9</span>
                                            </a>
                                        </li> --}}
                                        <li class="list-inline-item mr-2" data-toggle="tooltip"
                                            title="{{ $room->images_count }} Hình ảnh">
                                            <a href="#" class="text-white hover-primary">
                                                <i class="far fa-images"></i><span
                                                    class="pl-1">{{ $room->images_count }}</span>
                                            </a>
                                        </li>

                                        {{-- <li class="list-inline-item" data-toggle="tooltip"
                                            title="2 Video">
                                            <a href="#" class="text-white hover-primary">
                                                <i class="far fa-play-circle"></i><span
                                                    class="pl-1">2</span>
                                            </a>
                                        </li> --}}
                                    </ul>
                                    <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                                        {{-- <li class="list-inline-item mr-3 h-32" data-toggle="tooltip"
                                            title="Yêu thích">
                                            <a href="{{ route('client.add.favourite', ['slug' => $room->slug]) }}"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </li> --}}
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="mr-3 w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center favorite-btn {{ $room->isFavoritedByUser(auth()->id()) ? 'favorited' : '' }}"
                                                data-room-slug="{{ $room->slug }}">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </li>
                                        {{-- <li class="list-inline-item mr-3 h-32" data-toggle="tooltip"
                                            title="Compare">
                                            <a href="#" class="text-white fs-20 hover-primary">
                                                <i class="fas fa-exchange-alt"></i>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-3 px-0 pb-1 d-flex flex-column" style="height: 150px;">
                            <h2 class="fs-16 mb-1">
                                <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}"
                                    class="text-dark hover-primary">
                                    <small>{{ Str::limit($room->title, 50) }}</small>
                                </a>
                            </h2>
                            <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}" class="flex-grow-1">
                                <p class="font-weight-500 text-gray-light mb-0">
                                    <small>{{ Str::limit($room->address, 70) }}</small>
                                </p>
                            </a>
                            <a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}" class="mt-auto">
                                <p class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                    {{ number_format($room->price, 0, ',', '.') }} VND
                                </p>
                            </a>
                        </div>
                        <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                            <ul class="list-inline mb-0">
                                {{-- @if ($room->utility && $room->utility->wifi)
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                        data-toggle="tooltip" title="Wifi">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon fs-18 text-primary mr-1" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 12c4.97-4.97 13.03-4.97 18 0"></path>
                                            <path d="M5 15c3.31-3.31 8.69-3.31 12 0"></path>
                                            <path d="M8 18c1.66-1.66 4.34-1.66 6 0"></path>
                                            <circle cx="12" cy="20" r="1"></circle>
                                        </svg>
                                        Wifi
                                    </li>
                                @endif

                                @if ($room->utility && $room->utility->air_conditioning)
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                        data-toggle="tooltip" title="Máy điều hòa">
                                        <svg class="icon icon-heating fs-32 text-primary">
                                            <use xlink:href="#icon-heating"></use>
                                        </svg>
                                        Máy điều hòa
                                    </li>
                                @endif

                                @if ($room->utility && $room->utility->bathrooms)
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                        data-toggle="tooltip" title="Phòng tắm">
                                        <svg class="icon icon-shower fs-18 text-primary mr-1">
                                            <use xlink:href="#icon-shower">
                                            </use>
                                        </svg>
                                        Phòng tắm
                                    </li>
                                @endif --}}
                                @if ($room->utility && $room->utility->wifi == 1)
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                        data-toggle="tooltip" title="Wifi">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon fs-18 text-primary mr-1"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 12c4.97-4.97 13.03-4.97 18 0"></path>
                                            <path d="M5 15c3.31-3.31 8.69-3.31 12 0"></path>
                                            <path d="M8 18c1.66-1.66 4.34-1.66 6 0"></path>
                                            <circle cx="12" cy="20" r="1"></circle>
                                        </svg>
                                        Wifi
                                    </li>
                                @endif

                                @if ($room->utility && $room->utility->air_conditioning == 1)
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                        data-toggle="tooltip" title="Máy điều hòa">
                                        <svg class="icon icon-heating fs-32 text-primary">
                                            <use xlink:href="#icon-heating"></use>
                                        </svg>
                                        Máy điều hòa
                                    </li>
                                @endif

                                @if ($room->utility && $room->utility->bathrooms == 1)
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                        data-toggle="tooltip" title="Phòng tắm">
                                        <svg class="icon icon-shower fs-18 text-primary mr-1">
                                            <use xlink:href="#icon-shower"></use>
                                        </svg>
                                        Phòng tắm
                                    </li>
                                @endif

                                <li class="list-inline-item text-gray font-weight-500 fs-13" data-toggle="tooltip"
                                    title="{{ $room->acreage }}m²">
                                    <svg class="icon icon-square fs-18 text-primary mr-1">
                                        <use xlink:href="#icon-square">
                                        </use>
                                    </svg>
                                    {{ $room->acreage }}m²
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="text-center">Không có dữ liệu.</p>
            </div>
        @endif
    </div>
    {{-- Phân trang --}}
    @if ($rooms->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm rounded-active justify-content-center">
            {{-- Liên kết Trang Đầu --}}
            <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                    rel="first" aria-label="@lang('pagination.first')"><i class="far fa-angle-double-left"></i></a>
            </li>

            {{-- Liên kết Trang Trước --}}
            <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled"
                    rel="prev" aria-label="@lang('pagination.previous')"><i class="far fa-angle-left"></i></a>
            </li>

            @php
                $totalPages = $rooms->lastPage();
                $currentPage = $rooms->currentPage();
                $visiblePages = 2; // Số trang hiển thị ở giữa
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
                    rel="next" aria-label="@lang('pagination.next')"><i class="far fa-angle-right"></i></a>
            </li>

            {{-- Liên kết Trang Cuối --}}
            <li class="page-item {{ !$rooms->hasMorePages() ? 'disabled' : '' }}">
                <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})" wire:loading.attr="disabled"
                    rel="last" aria-label="@lang('pagination.last')"><i class="far fa-angle-double-right"></i></a>
            </li>
        </ul>
    </nav>
@endif
</div>
