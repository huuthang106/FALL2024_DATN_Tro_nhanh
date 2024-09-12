<div>
    <div>
        <div class="row">
            @if ($rooms->isEmpty())
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle fs-24"></i>
                        <p class="mb-0">Người dùng này chưa có phòng trọ nào.</p>
                    </div>
                </div>
            @else
                @foreach ($rooms as $room)
                    <div class="col-md-6 mb-7">
                        <div class="card border-0">
                            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                @if ($room->images->isNotEmpty())
                                    @php
                                        $image = $room->images->first();
                                    @endphp
                                    <img src="{{ asset('assets/images/' . $image->filename) }}" alt="{{ $room->title }}">
                                @else
                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}" alt="{{ $room->title }}">
                                @endif
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="mb-auto">
                                        <span class="badge badge-primary">Phòng</span>
                                    </div>
                                    <div class="d-flex hover-image">
                                        <ul class="list-inline mb-0 d-flex align-items-end mr-auto">
                                            <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Ảnh">
                                                <a href="#" class="text-white hover-primary">
                                                    <i class="far fa-images"></i><span class="pl-1">9</span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                                                <a href="#" class="text-white hover-primary">
                                                    <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                                            <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Yêu thích">
                                                <a href="{{ route('client.add.favourite', ['slug' => $room->slug]) }}" class="text-white fs-20 hover-primary">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="So sánh">
                                                <a href="#" class="text-white fs-20 hover-primary">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-3 px-0 pb-1">
                                <h2 class="fs-16 mb-1"><a href="{{ route('client.detail-room', ['slug' => $room->slug]) }}" class="text-dark hover-primary">{{ $room->title }}</a></h2>
                                <p class="font-weight-500 text-gray-light mb-0">{{ $room->address }}</p>
                                <p class="fs-17 font-weight-bold text-heading mb-0 lh-16">{{ number_format($room->price, 0, ',', '.') }} VND</p>
                            </div>
                            <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7" data-toggle="tooltip" title="3 Phòng">
                                        <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                                            <use xlink:href="#icon-bedroom"></use>
                                        </svg>
                                        3 Phòng
                                    </li>
                                    <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7" data-toggle="tooltip" title="{{ $room->utility ? $room->utility->bathrooms . ' Phòng tắm' : 'Không có thông tin' }}">
                                        <svg class="icon icon-shower fs-18 text-primary mr-1">
                                            <use xlink:href="#icon-shower"></use>
                                        </svg>
                                        {{ $room->utility ? $room->utility->bathrooms : 'Không có thông tin' }}
                                    </li>
                                    <li class="list-inline-item text-gray font-weight-500 fs-13" data-toggle="tooltip" title="{{ $room->acreage }}m²">
                                        <svg class="icon icon-square fs-18 text-primary mr-1">
                                            <use xlink:href="#icon-square"></use>
                                        </svg>
                                        {{ $room->acreage }}m²
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if (!$rooms->isEmpty())
        <div class="mt-4">
            <ul class="pagination rounded-active justify-content-center">
                {{-- Previous Page Link --}}
                @if ($rooms->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link"><i class="far fa-angle-double-left"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" wire:click="gotoPage(1, 'phong')" wire:loading.attr="disabled"><i class="far fa-angle-double-left"></i></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" wire:click="previousPage('phong')" wire:loading.attr="disabled"><i class="far fa-angle-left"></i></a>
                    </li>
                @endif
            
                {{-- Pagination Elements --}}
                @foreach (range(1, $rooms->lastPage()) as $page)
                    @if ($page == $rooms->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @elseif ($page == 1 || $page == $rooms->lastPage() || ($page >= $rooms->currentPage() - 1 && $page <= $rooms->currentPage() + 1))
                        <li class="page-item"><a class="page-link" wire:click="gotoPage({{ $page }}, 'phong')" wire:loading.attr="disabled">{{ $page }}</a></li>
                    @elseif ($page == $rooms->currentPage() - 2 || $page == $rooms->currentPage() + 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                @endforeach
            
                {{-- Next Page Link --}}
                @if ($rooms->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" wire:click="nextPage('phong')" wire:loading.attr="disabled"><i class="far fa-angle-right"></i></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" wire:click="gotoPage({{ $rooms->lastPage() }}, 'phong')" wire:loading.attr="disabled"><i class="far fa-angle-double-right"></i></a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="far fa-angle-double-right"></i></span>
                    </li>
                @endif
            </ul>
        </div>
    @endif
    </div>
</div>