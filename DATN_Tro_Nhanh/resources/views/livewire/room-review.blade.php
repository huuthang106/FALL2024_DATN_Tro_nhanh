<div class="card border-0">
    <div class="card-body p-0">
        <h3 class="fs-16 lh-2 text-heading mb-0 d-inline-block pr-4 border-bottom border-primary">
            {{ $comments->count() }} Đánh giá
        </h3>

        @foreach ($comments as $comment)
            <div id="comment-{{ $comment->id }}"
                class="media border-top pt-7 pb-6 d-sm-flex d-block text-sm-left text-center">
                <img src="{{ $comment->user->image ? asset('assets/images/' . $comment->user->image) : asset('assets/images/review-07.jpg') }}"
                    alt="{{ $comment->user->name }}" class="mr-sm-8 mb-4 mb-sm-0 custom-avatar">

                <div class="media-body">
                    <div class="row mb-1 align-items-center">
                        <div class="col-sm-6 mb-2 mb-sm-0">
                            <h4 class="mb-0 text-heading fs-14">{{ $comment->user->name }}
                            </h4>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-inline d-flex justify-content-sm-end justify-content-center mb-0">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li class="list-inline-item mr-1">
                                        <span class="text-warning fs-12 lh-2">
                                            <i class="fas fa-star{{ $i <= $comment->rating ? '' : '-o' }}"></i>
                                        </span>
                                    </li>
                                @endfor

                            </ul>


                            {{-- <ul class="list-inline d-flex justify-content-sm-end justify-content-center mb-0">
                                @if (Auth::id() == $comment->user_id)
                                    <button wire:click="confirmDelete({{ $comment->id }})" class="btn btn-sm btn-white">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                  
                                @endif

                            </ul> --}}

                        </div>

                    </div>
                    <p class="mb-3 pr-xl-17">{{ $comment->content }}</p>
                    <div class="d-flex justify-content-sm-start justify-content-center">
                        <p class="mb-0 text-muted fs-13 lh-1">
                            {{ $comment->created_at->format('d/m/Y h:i A') }}
                            @if (Auth::check() && Auth::id() === $comment->user_id)
                                <a href="#"
                                   class="mb-0 text-danger border-left border-dark hover-primary lh-1 ml-2 pl-2"
                                   wire:click="confirmDelete({{ $comment->id }})">
                                    Xóa
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        @if ($comments->hasPages())
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm rounded-active justify-content-center">
                    {{-- Liên kết Trang Đầu --}}
                    <li class="page-item {{ $comments->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                            rel="first" aria-label="@lang('pagination.first')"><i class="far fa-angle-double-left"></i></a>
                    </li>

                    {{-- Liên kết Trang Trước --}}
                    {{-- <li class="page-item {{ $comments->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled"
                        rel="prev" aria-label="@lang('pagination.previous')"><i class="far fa-angle-left"></i></a>
                </li> --}}

                    @php
                        $totalPages = $comments->lastPage();
                        $currentPage = $comments->currentPage();
                        $visiblePages = 2; // Số trang hiển thị ở giữa
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
                    {{-- <li class="page-item {{ !$comments->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link hover-white" wire:click="nextPage" wire:loading.attr="disabled"
                        rel="next" aria-label="@lang('pagination.next')"><i class="far fa-angle-right"></i></a>
                </li> --}}

                    {{-- Liên kết Trang Cuối --}}
                    <li class="page-item {{ !$comments->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                            wire:loading.attr="disabled" rel="last" aria-label="@lang('pagination.last')"><i
                                class="far fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </nav>
        @endif
    </div>

    <script>
        
        function confirmDelete(commentId) {
            console.log(Livewire.components);
            console.log(commentId);
            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn sẽ không thể hoàn tác hành động này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gọi phương thức confirmDelete trực tiếp từ Livewire
                    Livewire.find('room-review').confirmDelete(commentId); // Gọi phương thức confirmDelete với commentId
                }
            });
        }

        window.addEventListener('commentDeleted', event => {
            Swal.fire({
                title: 'Thông báo',
                text: 'Xóa thành công',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload(); // Tải lại trang để cập nhật danh sách bình luận
            });
        });
    </script>
</div>
