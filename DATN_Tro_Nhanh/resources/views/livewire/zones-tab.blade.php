<div>
    <div>
        <div class="row">
            @if ($zones->isEmpty())
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle fs-24"></i>
                        <p class="mb-0">Người dùng này chưa có khu vực nào.</p>
                    </div>
                </div>
            @else
                @foreach ($zones as $zone)
                    <div class="col-md-6 mb-7">
                        <div class="card border-0">
                            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top"
                                style="height: 200px; overflow: hidden;">
                                @php
                                    $image = $zone->rooms->first()->image ?? null;
                                @endphp
                                @if ($image)
                                    <img src="{{ asset('assets/images/' . $image) }}" alt="{{ $zone->name }}">
                                @else
                                    <img src="{{ asset('assets/images/properties-grid-01.jpg') }}"
                                        alt="{{ $zone->name }}">
                                @endif
                                <div class="card-img-overlay p-2 d-flex flex-column">
                                    <div>
                                        @if ($zone->expiration_date > now())
                                            <span class="badge bg-danger text-white" style="top: 1px; right: 1px;">
                                                VIP
                                            </span>
                                        @endif
                                    </div>
                                    <ul class="list-inline mb-0 mt-auto hover-image">
                                        <li class="list-inline-item mr-2" data-toggle="tooltip" title="Ảnh">
                                            <a href="#" class="text-white hover-primary">
                                                <i class="far fa-images"></i><span
                                                    class="pl-1">{{ $zone->rooms->count() }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="mb-auto">
                                        {{-- <span class="badge badge-primary">Phòng</span> --}}
                                        @if ($zone->expiration_date > now())
                                            <span class="badge bg-danger text-white" style="top: 1px; right: 1px;">
                                                VIP
                                            </span>
                                        @endif
                                    </div>
                                    <div class="d-flex hover-image">
                                        <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                                            <li class="list-inline-item mr-2" data-toggle="tooltip" title="Ảnh">
                                                <a href="#" class="text-white hover-primary">
                                                    <i class="far fa-images"></i><span
                                                        class="pl-1">{{ $zone->rooms->count() }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                                            {{-- <li class="list-inline-item mr-3 h-32" data-toggle="tooltip">
                                                <a href="#"
                                                    class="text-white fs-20 hover-primary favorite-btn {{ $room->isFavoritedByUser(auth()->id()) ? 'favorited' : '' }}"
                                                    data-room-slug="{{ $room->slug }}">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li> --}}
                                            {{-- <li class="list-inline-item mr-3 h-32" data-toggle="tooltip">
                                                <a href="#"
                                                    class="text-white fs-20 hover-primary favorite-btn {{ $zone->isFavoritedByUser(auth()->id()) ? 'favorited' : '' }}"
                                                    data-zone-slug="{{ $zone->slug }}">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li> --}}
                                            <li class="list-inline-item mr-3 h-32" data-toggle="tooltip"
                                                wire:key="favorite-{{ $zone->slug }}">
                                                <a href="#"
                                                    class="text-white fs-20 hover-primary favorite-btn {{ $zone->isFavoritedByUser(auth()->id()) ? 'favorited' : '' }}"
                                                    data-zone-slug="{{ $zone->slug }}">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-3 px-0 pb-1">
                                <h2 class="fs-16 mb-1"><a
                                        href="{{ route('client.detail-room', ['slug' => $zone->slug]) }}"
                                        class="text-dark hover-primary">{{ $zone->name }}</a></h2>
                                <p class="font-weight-500 text-gray-light mb-0">{{ $zone->address }}</p>
                                <p class="fs-17 font-weight-bold text-heading mb-0 lh-16">
                                    @if ($zone->rooms->isNotEmpty())
                                        @php
                                            $prices = $zone->rooms->pluck('price');
                                            $minPrice = $prices->min();
                                            $maxPrice = $prices->max();
                                        @endphp
                                        {{ number_format($minPrice, 0, ',', '.') }} -
                                        {{ number_format($maxPrice, 0, ',', '.') }} VND
                                    @else
                                        Giá không có sẵn
                                    @endif
                                </p>
                            </div>
                            <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                <ul class="list-inline mb-0">
                                    @if ($zone->bathrooms == 1)
                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                            data-toggle="tooltip" title="Phòng tắm">
                                            <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-shower"></use>
                                            </svg>
                                            Phòng tắm
                                        </li>
                                    @endif
                                    {{-- @if ($zone->garage == 1)
                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                            data-toggle="tooltip" title="Ga-ra">
                                            <svg class="icon icon-Garage fs-18 text-primary">
                                                <use xlink:href="#icon-Garage"></use>
                                            </svg>
                                            &nbsp;Ga-ra
                                        </li>
                                    @endif --}}
                                    @if ($zone->wifi == 1)
                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                            data-toggle="tooltip" title="Wifi">
                                            <svg class="icon fs-18 text-primary mr-1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 512">
                                                <path fill="currentColor"
                                                    d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z" />
                                            </svg>
                                            Wifi
                                        </li>
                                    @endif
                                    @if ($zone->air_conditioning == 1)
                                        <li class="list-inline-item text-gray font-weight-500 fs-13"
                                            data-toggle="tooltip" title="Máy điều hòa">
                                            <svg class="icon icon-heating fs-18 text-primary">
                                                <use xlink:href="#icon-heating"></use>
                                            </svg>
                                            &nbsp;Máy điều hòa
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if ($zones->hasPages())
            <nav aria-label="Page navigation">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Nút về đầu --}}

                    <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                            rel="prev" aria-label="@lang('pagination.previous')"><i class="far fa-angle-double-left"></i></a>
                    </li>



                    @php
                        $totalPages = $zones->lastPage();
                        $currentPage = $zones->currentPage();
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


                    <li class="page-item {{ !$zones->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="gotoPage({{ $zones->lastPage() }})"
                            wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')"><i
                                class="far fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </nav>

        @endif
    </div>
</div>
