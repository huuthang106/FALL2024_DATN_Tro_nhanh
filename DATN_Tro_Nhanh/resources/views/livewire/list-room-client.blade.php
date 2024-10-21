{{-- resources/views/livewire/list-room-client.blade.php --}}
<div>
    <div class="row align-items-sm-center mb-6">
        <div class="col-md-6">
            <h2 class="fs-15 text-dark mb-0">Chúng tôi đã tìm thấy <span class="text-primary">{{ $zones->total() }}</span>
                khu vực dành cho bạn
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
            </div>
        </div>
    </div>
    <div class="row">
        @if ($zones->isNotEmpty())
            @foreach ($zones as $zone)
                <div class="col-md-6 mb-6">
                    <div class="card border-0">
                        <div class="position-relative bg-hover-overlay rounded-lg card-img" style="height: 200px;">
                            @php
                                $image = $zone->rooms->first()->image ?? null;
                            @endphp
                              @if ($image)
                              <a href="{{ route('client.detail-zone', ['slug' => $zone->slug]) }}">
                                 <img src="{{ asset('assets/images/' . $image) }}"
                                     alt="{{ $zone->title }}" class="img-fluid w-100 h-100 rounded"
                                     style="object-fit: cover;">
                              </a> 
                         @else
                         <a href="{{ route('client.detail-zone', ['slug' => $zone->slug]) }}">
                                 <img src="{{ asset('assets/images/properties-grid-01.jpg') }}"
                                     alt="{{ $zone->title }}" class="img-fluid w-100 h-100 rounded"
                                     style="object-fit: cover;">
                            </a> 
                         @endif
                            <div class="card-img-overlay d-flex flex-column">
                                <span class="badge {{ $zone->hasAvailableRooms() ? 'badge-indigo' : 'mr-2 badge-orange' }} position-absolute pos-fixed-top">
                                    {{ $zone->hasAvailableRooms() ? 'Còn phòng' : 'Hết phòng' }}
                                </span>
                                <div>
                                    @if ($zone->expiration_date > now())
                                        <span class="badge bg-danger text-white" style="bottom: 1px; right: 1px;">
                                            VIP
                                        </span>
                                    @endif
                                </div>
                                <div class="mt-auto d-flex hover-image">
                                    <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                                        <li class="list-inline-item mr-2" data-toggle="tooltip"
                                            title="{{ $zone->rooms->count() }} Hình ảnh">
                                            <a href="#" class="text-white hover-primary">
                                                <i class="far fa-images"></i><span
                                                    class="pl-1">{{ $zone->rooms->count() }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                                        <li class="list-inline-item" wire:key="favorite-{{ $zone->slug }}">
                                            <a href="#"
                                                class="mr-3 w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center favorite-btn {{ $zone->isFavoritedByUser(auth()->id()) ? 'favorited' : '' }}"
                                                data-zone-slug="{{ $zone->slug }}">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-3 px-0 pb-1">
                            <h2 class="fs-16 mb-1">
                                <a href="{{ route('client.detail-zone', ['slug' => $zone->slug]) }}" class="text-dark hover-primary">
                                    {{ Str::limit($zone->name, 50) }}
                                </a>
                                {{-- {{ route('client.detail-zone', ['slug' => $zone->slug]) }} --}}
                            </h2>
                            <p class="font-weight-500 text-gray-light mb-0 fs-13">{{ Str::limit($zone->address, 70) }}
                            </p>
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
                                @if ($zone->wifi > 0)
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                        data-toggle="tooltip" title="Wifi">
                                        <svg class="icon fs-18 text-primary mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 512">
                                            <path fill="currentColor"
                                                d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z" />
                                        </svg>
                                        Wifi
                                    </li>
                                @endif
                                @if ($zone->air_conditioning > 0)
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                        data-toggle="tooltip" title="Máy điều hòa">
                                        <svg class="icon icon-heating fs-18 text-primary mr-1">
                                            <use xlink:href="#icon-heating"></use>
                                        </svg>
                                        Máy điều hòa
                                    </li>
                                @endif
                                @if ($zone->bathrooms > 0)
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7"
                                        data-toggle="tooltip" title="Phòng tắm">
                                        <svg class="icon icon-shower fs-18 text-primary mr-1">
                                            <use xlink:href="#icon-shower"></use>
                                        </svg>
                                        Phòng tắm
                                    </li>
                                @endif
                                {{-- <li class="list-inline-item text-gray font-weight-500 fs-13" data-toggle="tooltip"
                                title="{{ $zone->acreage }}m²">
                                <svg class="icon icon-square fs-18 text-primary mr-1">
                                    <use xlink:href="#icon-square"></use>
                                </svg>
                                {{ $zone->acreage }}m²
                            </li> --}}
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
    <div class="row justify-content-center p-5">
        @if ($zones->hasPages())
            <nav aria-label="Page navigation">
                <ul class="pagination rounded-active justify-content-center">
                    <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                            rel="prev" aria-label="@lang('pagination.previous')"><i class="far fa-angle-double-left"></i></a>
                    </li>

                    @php
                        $totalPages = $zones->lastPage();
                        $currentPage = $zones->currentPage();
                        $visiblePages = 3;
                    @endphp

                    <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                        <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled">1</a>
                    </li>

                    @if ($currentPage > $visiblePages)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif

                    @foreach (range(max(2, min($currentPage - 1, $totalPages - $visiblePages + 1)), min(max($currentPage + 1, $visiblePages), $totalPages - 1)) as $i)
                        @if ($i > 1 && $i < $totalPages)
                            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                <a class="page-link hover-white" wire:click="gotoPage({{ $i }})"
                                    wire:loading.attr="disabled">{{ $i }}</a>
                            </li>
                        @endif
                    @endforeach

                    @if ($currentPage < $totalPages - ($visiblePages - 1))
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif

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
