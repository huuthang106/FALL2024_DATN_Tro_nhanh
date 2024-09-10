<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="col-lg-8 mb-8 mb-lg-0 pr-xl-6 pl-xl-0">
        @foreach ($blogs as $blog)
            <div class="card border-0 pb-6 mb-6 border-bottom">
                <div class="position-relative d-flex align-items-end card-img-top">
                    @php
                        $image = $blog->image->first(); // Get the first image for the blog
                    @endphp
                    <a href="{{ route('client.client-blog-detail', $blog->slug) }}" class="hover-shine d-block">
                        <img src="{{ asset('assets/images/' . ($image ? $image->filename : 'default.jpg')) }}"
                            alt="{{ $blog->title }}">
                    </a>
                    <a href="#"
                        class="badge text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white m-2 position-absolute letter-spacing-1 pos-fixed-bottom">
                        Cho Thuê
                    </a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-inline mt-4">
                        <li class="list-inline-item mr-4">
                            <img class="mr-1" src="{{ asset('assets/images/author-01.jpg') }}"
                                alt="{{ $blog->user->name }}">
                            {{ $blog->user->name }}
                        </li>
                        <li class="list-inline-item mr-4">
                            <i class="far fa-calendar mr-1"></i> {{ $blog->created_at->format('d, F Y') }}
                        </li>
                        <li class="list-inline-item mr-4">
                            <i class="far fa-eye mr-1"></i> 149 Lượt xem
                        </li>
                    </ul>
                    <h3 class="fs-md-32 text-heading lh-141 mb-3">
                        <a href="{{ route('client.client-blog-detail', $blog->slug) }}"
                            class="text-heading hover-primary">{{ $blog->title }}</a>
                    </h3>
                    <p class="mb-4 lh-214">{{ $blog->description }}</p>
                </div>
                <div class="card-footer bg-transparent p-0 border-0">
                    <a href="{{ route('client.client-blog-detail', $blog->slug) }}"
                        class="btn text-heading border btn-lg shadow-none btn-outline-light border-hover-light">
                        Xem thêm <i class="far fa-long-arrow-right text-primary ml-1"></i>
                    </a>
                    <a href="{{ route('client.client-blog-detail', $blog->slug) }}"
                        class="btn text-heading btn-lg w-52px px-2 border shadow-none btn-outline-light border-hover-light rounded-circle ml-auto float-right">
                        <i class="fad fa-share-alt text-primary"></i>
                    </a>
                </div>
            </div>
        @endforeach

        <!-- Pagination Controls -->
        @if ($blogs->hasPages())
            <div>
                <nav aria-label="Page navigation">
                    <ul class="pagination rounded-active justify-content-center">
                        {{-- Liên kết Trang Trước --}}
                        <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled"
                                rel="prev" aria-label="@lang('pagination.previous')">
                                <i class="far fa-angle-double-left"></i>
                            </a>
                        </li>

                        @php
                            $totalPages = $blogs->lastPage();
                            $currentPage = $blogs->currentPage();
                            $visiblePages = 3; // Số trang hiển thị ở giữa
                            $startPage = max(2, min($currentPage - 1, $totalPages - $visiblePages + 1));
                            $endPage = min(max($currentPage + 1, $visiblePages), $totalPages - 1);
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
                        @foreach (range($startPage, $endPage) as $i)
                            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                <a class="page-link hover-white" wire:click="gotoPage({{ $i }})"
                                    wire:loading.attr="disabled">{{ $i }}</a>
                            </li>
                        @endforeach

                        {{-- Dấu ba chấm cuối --}}
                        @if ($currentPage < $totalPages - $visiblePages)
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
                        <li class="page-item {{ !$blogs->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="nextPage" wire:loading.attr="disabled"
                                rel="next" aria-label="@lang('pagination.next')">
                                <i class="far fa-angle-double-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif

    </div>


</div>
