<div>
    {{-- Success is as dangerous as failure. --}}
    <main id="content">
        <section class="pt-2 pb-13 page-title bg-img-cover-center bg-white-overlay"
            style="background-image: url('{{ asset('assets/images/bg-title.jpg') }}');">
            <div class="container"wire:ignore>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
                <h1 class="fs-30 lh-15 mb-0 text-heading font-weight-500 text-center pt-10" data-animate="fadeInDown">
                    Bài Viết Thú Vị Được Cập Nhật Hàng Ngày</h1>
            </div>
        </section>
        <section class="pt-11 pb-13">
            <div class="container">
                <div class="row ml-xl-0 mr-xl-n6">
                    <div class="col-lg-8 mb-8 mb-lg-0 pr-xl-6 pl-xl-0">
                        @if ($blogs->isEmpty())
                            <div class="text-center">
                                Không có kết quả tìm kiếm.
                            </div>
                        @else
                            @foreach ($blogs as $blog)
                                <div class="card border-0 pb-6 mb-6 border-bottom">

                                    <div class="position-relative d-flex align-items-end card-img-top">
                                        <a href="{{ route('client.client-blog-detail', $blog->slug) }}" class="hover-shine d-block">
                                            <img src="{{ asset('assets/images/' . ($blog->image ? $blog->image : 'default.jpg')) }}"
                                                 alt="{{ $blog->title }}" class="img-fluid">
                                        </a>
                                        <a href="#"
                                           class="badge text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute top-0 end-0 m-2">
                                            Bài viết nổi bật
                                        </a>
                                    </div>

                                    <div class="card-body p-0">
                                        <ul class="list-inline mt-4">
                                            <li class="list-inline-item mr-4"><img class="mr-1"
                                                    src="{{ asset('assets/images/author-01.jpg') }}" alt="D. Warren">
                                                {{ $blog->user->name }}
                                            </li>
                                            <li class="list-inline-item mr-4">
                                                <i class="far fa-calendar mr-1"></i>
                                                {{ $blog->created_at->format('d-m-Y') }}
                                            </li>
                                            <li class="list-inline-item mr-4"><i class="far fa-eye mr-1"></i>
                                                {{ $blog->view }} Lượt
                                                xem
                                            </li>
                                        </ul>
                                        <h3 class="fs-md-32 text-heading lh-141 mb-3">
                                            <a href="{{ route('client.client-blog-detail', $blog->slug) }}"
                                                class="text-heading hover-primary">{{ $blog->title }}</a>
                                        </h3>
                                        <p class="mb-4 lh-214">
                                            {{ Str::limit($blog->description, 150, '...') }}
                                        </p>
                                    </div>
                                    <div class="card-footer bg-transparent p-0 border-0">
                                        <a href="{{ route('client.client-blog-detail', $blog->slug) }}"
                                            class="btn text-heading border btn-lg shadow-none btn-outline-light border-hover-light">Xem
                                            thêm <i class="far fa-long-arrow-right text-primary ml-1"></i></a>
                                        {{-- <button id="share-btn"
                                            class="btn text-heading btn-lg w-52px px-2 border shadow-none btn-outline-light border-hover-light rounded-circle ml-auto float-right"><i
                                                class="fad fa-share-alt text-primary"></i></button> --}}
                                    </div>
                                </div>
                            @endforeach

                            @if ($blogs->hasPages())
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm rounded-active justify-content-center">
                                        {{-- Liên kết Trang Đầu --}}
                                        <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link hover-white" wire:click="gotoPage(1)"
                                                wire:loading.attr="disabled" rel="first"
                                                aria-label="@lang('pagination.first')">
                                                <i class="far fa-angle-double-left"></i>
                                            </a>
                                        </li>

                                        {{-- Liên kết Trang Trước --}}
                                        <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link hover-white" wire:click="previousPage"
                                                wire:loading.attr="disabled" rel="prev"
                                                aria-label="@lang('pagination.previous')">
                                                <i class="far fa-angle-left"></i>
                                            </a>
                                        </li>

                                        @php
                                            $totalPages = $blogs->lastPage();
                                            $currentPage = $blogs->currentPage();
                                        @endphp

                                        @if ($totalPages <= 3)
                                            @for ($i = 1; $i <= $totalPages; $i++)
                                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                                    <a class="page-link hover-white"
                                                        wire:click="gotoPage({{ $i }})"
                                                        wire:loading.attr="disabled">{{ $i }}</a>
                                                </li>
                                            @endfor
                                        @else
                                            @if ($currentPage <= 2)
                                                @for ($i = 1; $i <= 3; $i++)
                                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                                        <a class="page-link hover-white"
                                                            wire:click="gotoPage({{ $i }})"
                                                            wire:loading.attr="disabled">{{ $i }}</a>
                                                    </li>
                                                @endfor
                                            @elseif ($currentPage >= $totalPages - 1)
                                                <li class="page-item">
                                                    <a class="page-link hover-white"
                                                        wire:click="gotoPage({{ $totalPages - 2 }})"
                                                        wire:loading.attr="disabled">{{ $totalPages - 2 }}</a>
                                                </li>
                                                <li
                                                    class="page-item {{ $currentPage == $totalPages - 1 ? 'active' : '' }}">
                                                    <a class="page-link hover-white"
                                                        wire:click="gotoPage({{ $totalPages - 1 }})"
                                                        wire:loading.attr="disabled">{{ $totalPages - 1 }}</a>
                                                </li>
                                                <li
                                                    class="page-item {{ $currentPage == $totalPages ? 'active' : '' }}">
                                                    <a class="page-link hover-white"
                                                        wire:click="gotoPage({{ $totalPages }})"
                                                        wire:loading.attr="disabled">{{ $totalPages }}</a>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link hover-white"
                                                        wire:click="gotoPage({{ $currentPage - 1 }})"
                                                        wire:loading.attr="disabled">{{ $currentPage - 1 }}</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link hover-white"
                                                        wire:click="gotoPage({{ $currentPage }})"
                                                        wire:loading.attr="disabled">{{ $currentPage }}</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link hover-white"
                                                        wire:click="gotoPage({{ $currentPage + 1 }})"
                                                        wire:loading.attr="disabled">{{ $currentPage + 1 }}</a>
                                                </li>
                                            @endif
                                        @endif

                                        {{-- Liên kết Trang Tiếp --}}
                                        <li class="page-item {{ !$blogs->hasMorePages() ? 'disabled' : '' }}">
                                            <a class="page-link hover-white" wire:click="nextPage"
                                                wire:loading.attr="disabled" rel="next"
                                                aria-label="@lang('pagination.next')">
                                                <i class="far fa-angle-right"></i>
                                            </a>
                                        </li>

                                        {{-- Liên kết Trang Cuối --}}
                                        <li class="page-item {{ !$blogs->hasMorePages() ? 'disabled' : '' }}">
                                            <a class="page-link hover-white"
                                                wire:click="gotoPage({{ $totalPages }})"
                                                wire:loading.attr="disabled" rel="last"
                                                aria-label="@lang('pagination.last')">
                                                <i class="far fa-angle-double-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            @endif
                        @endif
                        {{-- <nav class="pt-4">
                            <ul class="pagination rounded-active justify-content-center">
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="far fa-angle-double-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">...</li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="far fa-angle-double-right"></i></a></li>
                            </ul>
                        </nav> --}}
                    </div>
                    <div class="col-lg-4 pl-xl-6 pr-xl-0 primary-sidebar sidebar-sticky" id="sidebar" wire:ignore>
                        <div class="primary-sidebar-inner">
                            <div class="card mb-4">
                                <div class="card-body px-6 pt-5 pb-6">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Tìm kiếm</h4>
                                    <form action="{{ route('client.client-blog') }}" method="GET">
                                        <div class="position-relative">
                                            <input type="text" id="search02"
                                                class="form-control form-control-lg border-0 shadow-none pr-5"
                                                placeholder="Tìm kiếm" name="search" wire:model.lazy="search"
                                                wire:keydown.debounce.300ms="$refresh"
                                                style="padding-right: 40px; text-overflow: ellipsis;">
                                            <div class="position-absolute"
                                                style="top: 50%; right: 10px; transform: translateY(-50%);">
                                                <button type="submit" class="btn fs-15 text-dark shadow-none p-0">
                                                    <i class="fal fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="card mb-4">
                                <div class="card-body px-6 pt-5 pb-6">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Loại</h4>
                                    <ul class="list-group list-group-no-border">
                                        <li class="list-group-item p-0">
                                            <a href="listing-with-left-sidebar.html" class="d-flex text-body hover-primary">
                                                <span class="lh-29">Sáng tạo</span>
                                                <span class="d-block ml-auto">13</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item p-0">
                                            <a href="listing-with-left-sidebar.html"
                                                class="d-flex text-body hover-primary">
                                                <span class="lh-29">Cho thuê</span>
                                                <span class="d-block ml-auto">21</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item p-0">
                                            <a href="listing-with-left-sidebar.html"
                                                class="d-flex text-body hover-primary">
                                                <span class="lh-29">Hình ảnh</span>
                                                <span class="d-block ml-auto">17</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item p-0">
                                            <a href="listing-with-left-sidebar.html"
                                                class="d-flex text-body hover-primary">
                                                <span class="lh-29">Tin mới</span>
                                                <span class="d-block ml-auto">4</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item p-0">
                                            <a href="listing-with-left-sidebar.html"
                                                class="d-flex text-body hover-primary">
                                                <span class="lh-29">Phòng trọ</span>
                                                <span class="d-block ml-auto">27</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                            <div class="card mb-4">
                                <div class="card-body px-6 pt-5 pb-6">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Bài viết nổi bật</h4>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($topViewedBlogs as $blog)
                                            <li class="list-group-item px-0 pt-0 pb-3">
                                                <div class="media">
                                                    <div class="position-relative mr-3">
                                                        <a href="{{ route('client.client-blog-detail', $blog->slug) }}"
                                                            class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                                            style="background-image: url('{{ asset('assets/images/' . ($blog->image ?? 'default.jpg')) }}')">
                                                         </a>
                                                        <a href="blog-grid-with-sidebar.html"
                                                            class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                                                            Nổi Bật
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="fs-14 lh-186 mb-1">
                                                            <a href="{{ route('client.client-blog-detail', $blog->slug) }}"
                                                                class="text-dark hover-primary">
                                                                {{ $blog->title }}
                                                            </a>
                                                        </h4>
                                                        <div class="text-gray-light">
                                                            {{ $blog->created_at->locale('vi')->isoFormat('D MMMM, YYYY') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="card mb-4">
                                <div class="card-body px-6 pt-5 pb-6">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Tải xuống tài liệu</h4>
                                    <img src="{{ asset('assets/images/download-brochure.png') }}"
                                        alt="Tải xuống tài liệu">
                                    <div class="text-center mt-10 mb-2">
                                        <a href="#"
                                            class="btn btn-lg bg-gray-01 bg-hover-accent btn-block text-heading">Tải
                                            ngay<span class="text-primary d-inline-block ml-2"><i
                                                    class="far fa-arrow-circle-down"></i></span></a>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="card mb-4">
                                <div class="card-body px-6 py-5">
                                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Tags phổ biến</h4>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">nhà
                                                thiết kế</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">mô
                                                hình mẫu</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">mẫu
                                                giao diện</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">Bảo
                                                mật CNTT</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">Dịch
                                                vụ CNTT</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">kinh
                                                doanh</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">video</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">giao
                                                diện wordpress</a>
                                        </li>
                                        <li class="list-inline-item mb-2">
                                            <a href="#"
                                                class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">bản
                                                phác thảo</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
