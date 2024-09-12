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
                            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                <img src="{{ asset('assets/images/properties-grid-35.jpg') }}" alt="{{ $zone->name }}">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="mb-auto">
                                        <span class="badge badge-indigo">Khu trọ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-3 px-0 pb-1">
                                <h2 class="fs-16 mb-1"><a href="{{ route('client.client-details-zone', ['slug' => $zone->slug]) }}" class="text-dark hover-primary">{{ $zone->name }}</a></h2>
                                <p class="font-weight-500 text-gray-light mb-0">{{ $zone->address }}</p>
                                <p class="fs-17 font-weight-bold text-heading mb-0 lh-16">{{ $zone->total_rooms }} Phòng</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if (!$zones->isEmpty())
            <div class="mt-4">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($zones->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link"><i class="far fa-angle-double-left"></i></span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled"><i class="far fa-angle-double-left"></i></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled"><i class="far fa-angle-left"></i></a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach (range(1, $zones->lastPage()) as $page)
                        @if ($page == $zones->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @elseif ($page == 1 || $page == $zones->lastPage() || ($page >= $zones->currentPage() - 1 && $page <= $zones->currentPage() + 1))
                            <li class="page-item"><a class="page-link" wire:click="gotoPage({{ $page }})" wire:loading.attr="disabled">{{ $page }}</a></li>
                        @elseif ($page == $zones->currentPage() - 2 || $page == $zones->currentPage() + 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($zones->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled"><i class="far fa-angle-right"></i></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" wire:click="gotoPage({{ $zones->lastPage() }})" wire:loading.attr="disabled"><i class="far fa-angle-double-right"></i></a>
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