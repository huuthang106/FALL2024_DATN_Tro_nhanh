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
                                @if ($zone->image)
                                    <img src="{{ asset('assets/images/' . $zone->image) }}" alt="{{ $zone->title }}">
                                @else
                                    <img src="{{ asset('assets/images/properties-grid-35.jpg') }}"
                                        alt="{{ $zone->title }}">
                                @endif
                                {{-- <img src="{{ asset('assets/images/properties-grid-35.jpg') }}" alt="{{ $zone->name }}"> --}}
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="mb-auto">
                                        <span class="badge badge-indigo">Phòng trọ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-3 px-0 pb-1">
                                <h2 class="fs-16 mb-1"><a
                                        href="{{ route('client.client-details-zone', ['slug' => $zone->slug]) }}"
                                        class="text-dark hover-primary">{{ $zone->name }}</a></h2>
                                <p class="font-weight-500 text-gray-light mb-0">{{ $zone->address }}</p>
                                <p class="fs-17 font-weight-bold text-heading mb-0 lh-16">{{ $zone->total_zones }} Phòng
                                </p>
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
