<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <h3 class="fs-22 text-heading lh-15 mb-6">Bình luận ({{ $comments->total() }})</h3>

    @if ($comments->count() > 0)
        @foreach ($comments as $item)
            <div class="media mb-6 pb-5 border-bottom">
                <div class="w-70px mr-2">
                    @php
                        $userImage = $item->user->image ?? 'default-avatar.jpg'; // Sử dụng hình ảnh người dùng nếu có, hoặc hình ảnh mặc định
                    @endphp
                    <img src="{{ asset('assets/images/' . $userImage) }}" alt="{{ $item->user->name ?? 'Người dùng' }}"
                        class="mr-sm-8 mb-4 mb-sm-0 custom-avatar">
                </div>
                {{-- <div class="media-body">
                    <p class="text-heading fs-16 font-weight-500 mb-0">
                        {{ $item->user->name ?? 'Người dùng' }}
                    </p>
                    <p class="mb-4">{{ $item->content }}</p>
                    <ul class="list-inline">
                        <li class="list-inline-item text-muted">
                            {{ $item->created_at->format('d/m/Y h:i A') }}
                        </li>
                        <li class="list-inline-item"><a href="#"
                                    class="text-heading hover-primary">Trả lời</a></li>
                    </ul>
                </div> --}}
                <div class="media-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-heading fs-16 font-weight-500 mb-0">
                            {{ $item->user->name ?? 'Người dùng' }}
                        </p>
                        @if (Auth::id() == $item->user_id)
                            <button wire:click="deleteComment({{ $item->id }})" class="btn btn-sm btn-white">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        @endif
                    </div>
                    <p class="mb-4">{{ $item->content }}</p>
                    <ul class="list-inline">
                        <li class="list-inline-item text-muted">
                            {{ $item->created_at->format('d/m/Y h:i A') }}
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach

        <!-- Phân trang -->
        @if ($comments->hasPages())
            <nav aria-label="Page navigation">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Liên kết Trang Trước --}}
                    <li class="page-item {{ $comments->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled"
                            rel="prev" aria-label="@lang('pagination.previous')"><i class="far fa-angle-double-left"></i></a>
                    </li>

                    @php
                        $totalPages = $comments->lastPage();
                        $currentPage = $comments->currentPage();
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

                    {{-- Liên kết Trang Tiếp --}}
                    <li class="page-item {{ !$comments->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="nextPage" wire:loading.attr="disabled"
                            rel="next" aria-label="@lang('pagination.next')"><i class="far fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </nav>
        @endif
    @else
        <p>Chưa có bình luận nào.</p>
    @endif


</div>
