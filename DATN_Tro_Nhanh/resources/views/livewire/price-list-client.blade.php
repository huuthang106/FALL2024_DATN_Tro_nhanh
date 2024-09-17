<div>
    {{-- Do your work, then step back. --}}
    <main id="content">
        <section class="pb-4 shadow-xs-5">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
                        <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gói</li>
                    </ol>
                </nav>
                <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600 mb-6">Gói</h1>
            </div>
        </section>
        <section class="py-8">
            <div class="container">
                <h4 class="mb-2 fs-22 lh-15 text-heading">Chọn gói phù hợp với doanh nghiệp của bạn</h4>
                <div class="row">
                    @foreach ($priceLists as $priceList)
                        <div class="col-xl-3 col-sm-6 mb-6">
                            <div class="card bg-gray-01 border-0 p-4 overflow-hidden d-flex flex-column">
                                <div class="card-header bg-transparent p-0">
                                    <p class="fs-15 font-weight-bold text-heading mb-0">Gói <span
                                            class="font-weight-500">{{ $priceList->name }}</span></p>
                                    <p class="fs-32 font-weight-bold text-heading lh-15 mb-1">
                                        {{ number_format($priceList->price, 0, ',', '.') }} VND</p>
                                    <span class="fs-13 font-weight-500 text-white text-uppercase custom-packages">
                                        {{ $priceList->location->name }}
                                    </span>
                                </div>
                                <div class="card-body p-0 flex-grow-1">
                                    <ul class="list-unstyled pt-2 mb-2">
                                        <li class="d-flex justify-content-between">
                                            <p class="text-gray-light mb-0">Hạn Sử Dụng</p>
                                            <p class="font-weight-500 text-heading mb-0">{{ $priceList->duration_day }}
                                                ngày</p>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <p class="text-gray-light mb-0">Loại</p>
                                            <p class="font-weight-500 text-heading mb-0">
                                                {{ $priceList->location->name }}</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer p-0 mt-auto d-flex justify-content-center">
                                    <button id="add-to-cart-button" data-product-id="{{ $priceList->id }}"
                                        class="btn btn-primary btn-block d-flex justify-content-between align-items-center add-to-cart-button">
                                        Thêm vào giỏ hàng
                                        <i class="far fa-shopping-cart ml-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Phân trang --}}
                @if ($priceLists->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination rounded-active justify-content-center">
                            {{-- Liên kết Trang Đầu --}}
                            <li class="page-item {{ $priceLists->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                                    rel="first" aria-label="@lang('pagination.first')">
                                    <i class="far fa-angle-double-left"></i>
                                </a>
                            </li>
                            {{-- Liên kết Trang Trước --}}
                            <li class="page-item {{ $priceLists->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled"
                                    rel="prev" aria-label="@lang('pagination.previous')"><i class="far fa-angle-left"></i></a>
                            </li>

                            @php
                                $totalPages = $priceLists->lastPage();
                                $currentPage = $priceLists->currentPage();
                                $visiblePages = 3; // Số trang hiển thị ở giữa
                            @endphp

                            {{-- Trang đầu --}}
                            <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                                <a class="page-link hover-white" wire:click="gotoPage(1)"
                                    wire:loading.attr="disabled">1</a>
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
                            <li class="page-item {{ !$priceLists->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link hover-white" wire:click="nextPage" wire:loading.attr="disabled"
                                    rel="next" aria-label="@lang('pagination.next')"><i class="far fa-angle-right"></i></a>
                            </li>
                            {{-- Liên kết Trang Cuối --}}
                            <li class="page-item {{ !$priceLists->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                                    wire:loading.attr="disabled" rel="last" aria-label="@lang('pagination.last')">
                                    <i class="far fa-angle-double-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </section>
    </main>
</div>
