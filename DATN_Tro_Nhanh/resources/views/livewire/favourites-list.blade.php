<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
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
                        <p>Xem Thêm</p>
                    </div>
                    <div class="form-inline justify-content-md-end mx-n2">
                        <div class="p-2">
                            <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                                <input type="text" class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..." 
                                wire:model.lazy="search" 
                                wire:keydown.debounce.300ms="$refresh" aria-label="Tìm kiếm">
                                <div class="input-group-append position-absolute pos-fixed-right-center">
                                    <button class="btn bg-transparent border-0 text-gray lh-1" type="button">
                                        <i class="fal fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="input-group input-group-lg bg-white border">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent letter-spacing-093 border-0 pr-0">
                                        <i class="far fa-align-left mr-2"></i>Sắp xếp theo:
                                    </span>
                                </div>
                                <select class="form-control bg-transparent pl-0 selectpicker d-flex align-items-center sortby"
                                        wire:model="sortBy" name="sort-by" data-style="bg-transparent px-1 py-0 lh-1 font-weight-600 text-body">
                                    <option value="name">Chữ cái</option>
                                    <option value="price_low_to_high">1 Ngày</option>
                                    <option value="price_high_to_low">7 Ngày</option>
                                    <option value="date_old_to_new">1 Tháng</option>
                                    <option value="date_new_to_old">3 Tháng</option>
                                    <option value="date_new_to_old">6 Tháng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    @foreach ($favourites as $favourite)
                        <div class="col-md-4 col-lg-4 mb-3">
                            <div class="card shadow-hover-1">
                                <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                    <div class="image-container">
                                        @if ($favourite->room && $favourite->room->images->isNotEmpty())
                                            <img src="{{ asset('assets/images/' . $favourite->room->images->first()->filename) }}"
                                                alt="{{ $favourite->room->title }}" class="image-preview">
                                        @else
                                            <img src="{{ asset('assets/images/default.jpg') }}" alt="Default Image"
                                                class="image-preview">
                                        @endif
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
                                                        <i class="far fa-images"></i><span class="pl-1">{{ $favourite->room->images->count() }}</span>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-toggle="tooltip" title="0 Video">
                                                    <a href="#" class="text-white hover-primary">
                                                        <i class="far fa-play-circle"></i><span class="pl-1">0</span>
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
                                    <p class="card-text font-weight-500 text-gray-light mb-2">{{ $favourite->room->address }}</p>
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
                                        <span class="text-heading lh-15 font-weight-bold fs-17">${{ number_format($favourite->room->price, 0, ',', '.') }}</span>
                                    </div>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <form action="{{ route('owners.favourites.remove', ['id' => $favourite->id]) }}" method="GET" style="display:inline;">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="delete-btn w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent"
                                                    data-toggle="tooltip" title="Xóa">
                                                    <i class="fa-solid fa-delete-left"></i>
                                                </button>
                                            </form>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" data-toggle="tooltip" title="Compare"
                                                class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent">
                                                <i class="fas fa-exchange-alt"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
        
                    <!-- Pagination -->
                   
                </div>
                @if ($favourites->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination rounded-active justify-content-center">
                        @php
                            $totalPages = $favourites->lastPage();
                            $currentPage = $favourites->currentPage();
                        @endphp
                        <!-- Previous Button -->
                        <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click.prevent="gotoPage({{ $currentPage - 1 }})" wire:loading.attr="disabled" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <!-- First Page -->
                        @if ($totalPages > 1)
                            <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                                <a class="page-link hover-white" wire:click.prevent="gotoPage(1)" wire:loading.attr="disabled">1</a>
                            </li>
                        @endif

                        <!-- Dots if needed -->
                        @if ($totalPages > 3 && $currentPage > 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif

                        <!-- Middle Pages -->
                        @if ($totalPages > 2)
                            @foreach (range(max(2, min($totalPages - 1, $currentPage)), min($currentPage + 1, $totalPages - 1)) as $i)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link hover-white" wire:click.prevent="gotoPage({{ $i }})" wire:loading.attr="disabled">{{ $i }}</a>
                                </li>
                            @endforeach
                        @endif

                        <!-- Dots if needed -->
                        @if ($totalPages > 3 && $currentPage < $totalPages - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif

                        <!-- Last Page -->
                        @if ($totalPages > 1)
                            <li class="page-item {{ $currentPage == $totalPages ? 'active' : '' }}">
                                <a class="page-link hover-white" wire:click.prevent="gotoPage({{ $totalPages }})" wire:loading.attr="disabled">{{ $totalPages }}</a>
                            </li>
                        @endif

                        <!-- Next Button -->
                        <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click.prevent="gotoPage({{ $currentPage + 1 }})" wire:loading.attr="disabled" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
            </div>
        </main>
        


    </div>


</div>
