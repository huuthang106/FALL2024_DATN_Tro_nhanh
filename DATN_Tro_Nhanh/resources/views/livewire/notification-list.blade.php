<div>
    <div class="mb-6">
        <div class="row">
            <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                <div class="d-flex form-group mb-0 align-items-center">
                    
                </div>
            </div>

            <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                    <input type="text" wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh"
                        class="form-control bg-transparent border-1x" placeholder="Tìm..." aria-label=""
                        aria-describedby="basic-addon1">
                    <div class="input-group-append position-absolute pos-fixed-right-center">
                        <button class="btn bg-transparent border-0 text-gray lh-1" type="button">
                            <i class="fal fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="notification-list" class="table table-hover bg-white border rounded-lg">
            <thead>
                <tr role="row">
                    <th class="py-6" style="white-space:nowrap">Loại</th>
                    <th class="py-6" style="white-space:nowrap">Dữ liệu</th>
                    <!-- <th class="py-6">Trạng thái</th> -->
                    <th class="py-6" style="white-space:nowrap">Ngày tạo</th>
                    <th class=" py-6 " style="white-space:nowrap">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if ($notifications->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center">Chưa có thông báo</td>
                    </tr>
                @else
                    @foreach ($notifications as $notification)
                        <tr role="row">
                            <td class="align-middle" style="white-space:nowrap">{{ $notification->type }}</td>
                            <td class="align-middle" style="white-space:nowrap">
                                @if ($notification->blog)
                                    <a href="{{ route('owners.notification-update', ['slug' => $notification->blog->slug]) }}">
                                        {{ $notification->data }}
                                    </a>
                                @elseif ($notification->room)
                                    <a href="{{ route('owners.notification-update', ['slug' => $notification->room->slug]) }}">
                                        {{ $notification->data }}
                                    </a>
                                @else
                                    <span class="text-dark">{{ $notification->data }}</span>
                                @endif
                            </td>
                            <!-- <td class="align-middle">
                                <span class="badge badge-{{ $notification->status === 2 ? 'green' : 'red' }} text-capitalize">
                                    {{ $notification->status === 2 ? 'Đã xem' : 'Chưa xem' }}
                                </span>
                            </td> -->
                            <td class="align-middle" style="white-space:nowrap">{{ $notification->created_at->format('d-m-Y') }}</td>
                            <td class="align-middle">
                                <a href="#" wire:click.prevent="deleteNotification({{ $notification->id }})" data-toggle="tooltip" title="Xóa"
                                    class="d-inline-block fs-18 text-muted hover-primary">
                                    <i class="fal fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <!-- Phân trang -->
        @if ($notifications->count() > 0)
        <div id="pagination-section" class="mt-6">
            <ul class="pagination rounded-active justify-content-center">
                {{-- Nút quay về trang đầu tiên (<<) --}}
                <li class="page-item {{ $notifications->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                        href="#pagination-section">
                        <i class="far fa-angle-double-left"></i>
                    </a>
                </li>
    
                {{-- Nút quay lại trang trước (<) --}}
                <li class="page-item {{ $notifications->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled"
                        href="#pagination-section">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
    
                {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                @for ($i = 1; $i <= $notifications->lastPage(); $i++)
                    <li class="page-item {{ $notifications->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" wire:click="gotoPage({{ $i }})"
                            href="#pagination-section">{{ $i }}</a>
                    </li>
                @endfor
    
                {{-- Nút tới trang kế tiếp (>) --}}
                <li
                    class="page-item {{ $notifications->currentPage() == $notifications->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled" href="#pagination-section">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
    
                {{-- Nút tới trang cuối cùng (>>) --}}
                <li
                    class="page-item {{ $notifications->currentPage() == $notifications->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="gotoPage({{ $notifications->lastPage() }})"
                        wire:loading.attr="disabled" href="#pagination-section">
                        <i class="far fa-angle-double-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    @endif
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    window.addEventListener('notification-deleted', event => {
        Swal.fire({
            title: 'Thành công!',
            text: 'Thông báo đã xóa thành công',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    });
</script>