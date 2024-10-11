<div>
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
            <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                <div class="mr-0 mr-md-auto">
                    <h2 class="mb-0 text-heading fs-22 lh-15">Những mục yêu thích của tôi
                        <span class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">
                            {{ $favourites->total() }}
                        </span>
                    </h2>
                </div>
                <div class="form-inline justify-content-md-end mx-n2" wire:ignore>
                    <div class="p-2">
                        <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                            <input type="text" class="form-control bg-transparent border-1x"
                                   placeholder="Tìm kiếm..." wire:model.lazy="search"
                                   wire:keydown.debounce.500ms="$refresh" aria-label="Tìm kiếm">
                            <div class="input-group-append position-absolute pos-fixed-right-center">
                                <button class="btn bg-transparent border-0 text-gray lh-1" type="button">
                                    <i class="fal fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="d-flex form-group mb-0 align-items-center">
                            <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                            <select wire:model.lazy="timeFilter" class="form-control form-control-lg mr-2 selectpicker"
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
                </div>
            </div>

            <div class="row g-3">
                @if ($favourites->isEmpty())
                    <div class="col-12">
                        <p class="text-center">Không có dữ liệu</p>
                    </div>
                @else
                    @foreach ($favourites as $favourite)
                        <div class="col-md-4 col-lg-4 mb-3">
                            <div class="card shadow-hover-1">
                                <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                    <div class="image-container">
                                        <img src="{{ $favourite->room && $favourite->room->images->isNotEmpty() ? asset('assets/images/' . $favourite->room->images->first()->filename) : asset('assets/images/properties-grid-08.jpg') }}"
                                             alt="{{ $favourite->room->title }}" class="image-preview">
                                    </div>
                                    <div class="card-img-overlay p-2 d-flex flex-column">
                                        <div>
                                            <span class="badge badge-primary">Để bán</span>
                                        </div>
                                        <div class="mt-auto hover-image">
                                            <ul class="list-inline mb-0 d-flex align-items-end">
                                                <li class="list-inline-item mr-2" data-toggle="tooltip"
                                                    title="{{ $favourite->room->images->count() }} Images">
                                                    <a href="#" class="text-white hover-primary">
                                                        <i class="far fa-images"></i>
                                                        <span class="pl-1">{{ $favourite->room->images->count() }}</span>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-toggle="tooltip" title="0 Video">
                                                    <a href="#" class="text-white hover-primary">
                                                        <i class="far fa-play-circle"></i>
                                                        <span class="pl-1">0</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-3">
                                    <h2 class="card-title fs-16 lh-2 mb-0">
                                        <a href="{{ route('client.detail-room', $favourite->room->slug) }}"
                                           class="text-dark hover-primary">{{ $favourite->room->title }}</a>
                                    </h2>
                                    <p class="card-text font-weight-500 text-gray-light mb-2">
                                        {{ $favourite->room->address }}
                                    </p>
                                    <ul class="list-inline d-flex mb-0 flex-wrap">
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                            data-toggle="tooltip" title="{{ $favourite->room->bedrooms }} Phòng ngủ">
                                            <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-bedroom"></use>
                                            </svg>
                                            {{ $favourite->room->bedrooms }} Phòng ngủ
                                        </li>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2"
                                            data-toggle="tooltip" title="{{ $favourite->room->bathrooms }} Phòng tắm">
                                            <svg class="icon icon-shower fs-18 text-primary mr-1">
                                                <use xlink:href="#icon-shower"></use>
                                            </svg>
                                            {{ $favourite->room->bathrooms }} Phòng tắm
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                    <div class="mr-auto">
                                        <span class="text-heading lh-15 font-weight-bold fs-17">
                                            ${{ number_format($favourite->room->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <form action="{{ route('owners.favourites.remove', ['id' => $favourite->id]) }}"
                                                  method="GET" style="display:inline;">
                                                @csrf
                                                <button type="submit"
                                                        class="delete-btn w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent"
                                                        data-toggle="tooltip" title="Xóa">
                                                    <i class="fa-solid fa-delete-left"></i>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if ($favourites->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination rounded-active justify-content-center">
                        <li class="page-item {{ $favourites->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                               rel="prev" aria-label="@lang('pagination.previous')">
                                <i class="far fa-angle-double-left"></i>
                            </a>
                        </li>

                        @php
                            $totalPages = $favourites->lastPage();
                            $currentPage = $favourites->currentPage();
                            $visiblePages = 3; // Số trang hiển thị ở giữa
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

                        <li class="page-item {{ !$favourites->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage({{ $favourites->lastPage() }})"
                               wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">
                                <i class="far fa-angle-double-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </main>
</div>