<div>
    {{-- Stop trying to control. --}}
    <form action="{{ route('owners.properties') }}" method="GET">

        <div class="mb-6" wire:ignore>
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                    <div class="d-flex form-group mb-0 align-items-center">
                        <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                        <select class="form-control selectpicker form-control-lg mr-2" wire:model.lazy="timeFilter"
                            data-style="bg-white btn-lg h-52 py-2 border">
                            <option value="" selected>Thời Gian:</option>
                            <option value="1_day">1 ngày</option>
                            <option value="7_day">7 ngày</option>
                            <option value="1_month">1 tháng</option>
                            <option value="3_month">3 tháng</option>
                            <option value="6_month">6 tháng</option>
                            <option value="1_year">1 năm</option>
                        </select>
                    </div>
                    <div class="align-self-center">
                        <a href="{{ route('owners.blog') }}" class="btn btn-primary btn-lg" tabindex="0"><span>Thêm
                                mới</span></a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                    <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                        <input wire:model.lazy="search" wire:keydown.debounce.100ms="$refresh" type="text"
                            class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..." aria-label=""
                            aria-describedby="basic-addon1">
                        <div class="input-group-append position-absolute pos-fixed-right-center">
                            <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                    class="fal fa-search"></i></button>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <button class="btn btn-danger btn-lg" tabindex="0"><span>Xóa</span></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-hover bg-white border rounded-lg">
            <thead class="thead-sm thead-black">
                <tr>
                    <th scope="col" class="border-top-0 px-3 pt-4 pb-3" style="white-space: nowrap;">Ảnh</th>
                    <th scope="col" class="border-top-0 pt-4 pb-3" style="white-space: nowrap;">Tiêu Đề</th>
                    <th scope="col" class="border-top-0 pt-4 pb-3" style="white-space: nowrap;">Mô Tả</th>
                    <th scope="col" class="border-top-0 pt-4 pb-3" style="white-space: nowrap;">Lượt Xem</th>
                    <th scope="col" class="border-top-0 pt-4 pb-3" style="white-space: nowrap;">Trạng thái</th>
                    <th scope="col" class="border-top-0 pt-4 pb-3" style="white-space: nowrap;">Ngày xuất bản</th>
                    <th scope="col" class="border-top-0 pt-4 pb-3" style="white-space: nowrap;">Hành động</th>
                </tr>
            </thead>
    
            <tbody>
                @if ($blogs->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-4">Không có blog nào!</td>
                    </tr>
                @else
                    @foreach ($blogs as $blog)
                        <tr class="shadow-hover-xs-2">
                            <td class="align-middle pt-3 pb-3 px-3">
                                <div class="media d-flex align-items-center">
                                    <div class="w-100 w-md-150 mr-3 position-relative">
                                        <a href="{{ route('owners.show-blog', $blog->slug) }}">
                                            @if ($blog->image)
                                                @foreach ($blog->image as $item)
                                                    <img src="{{ asset('assets/images/' . $item->filename) }}" 
                                                         alt="{{ $item->filename }}" 
                                                         class="img-fluid" 
                                                         style="max-width: 100px; object-fit: cover;">
                                                @endforeach
                                            @else
                                                <p>Không có ảnh</p>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle" style="white-space: nowrap;">{{ $blog->title }}</td>
                            <td class="align-middle" style="white-space: nowrap;">
                                {{ \Illuminate\Support\Str::limit($blog->description, 20) }}
                            </td>
                            <td class="align-middle" style="white-space: nowrap;">{{ $blog->view }}</td>
                            <td class="align-middle">
                                @if ($blog->status == 1)
                                    <span class="badge text-capitalize font-weight-normal fs-12 badge-yellow">Chờ xác nhận</span>
                                @elseif ($blog->status == 2)
                                    <span class="badge text-capitalize font-weight-normal fs-12 badge-green">Đã xác nhận</span>
                                @else
                                    <span class="badge text-capitalize font-weight-normal fs-12 badge-gray">Chưa xác định</span>
                                @endif
                            </td>
                            <td class="align-middle">{{ $blog->created_at->format('d-m-Y') }}</td>
                            <td class="align-middle text" style="white-space: nowrap;">
                                <a href="{{ route('owners.sua-blog', ['slug' => $blog->slug]) }}" data-toggle="tooltip"
                                   title="Chỉnh sửa" class="d-inline-block fs-16 text-muted hover-primary ml-1 mr-3">
                                    <i class="fal fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('owners.destroy-blog', $blog->id) }}" method="POST"
                                      class="d-inline-block" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fs-16 text-muted hover-primary border-0 bg-transparent">
                                        <i class="fal fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    
    
    <div id="pagination-section" class="mt-6">
        <ul class="pagination pagination-sm rounded-active justify-content-center">
            {{-- Nút quay về trang đầu tiên (<<) --}}
            <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled" href="#pagination-section">
                    <i class="far fa-angle-double-left"></i>
                </a>
            </li>
    
            {{-- Nút quay lại trang trước (<) --}}
            <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled" href="#pagination-section">
                    <i class="fas fa-angle-left"></i>
                </a>
            </li>
    
            {{-- Hiển thị các trang chỉ trên kích thước md trở lên --}}
            @if ($blogs->currentPage() > 2)
                <li class="page-item d-none d-md-inline">
                    <a class="page-link" wire:click="gotoPage(1)" href="#pagination-section">1</a>
                </li>
            @endif
    
            @if ($blogs->currentPage() > 3)
                <li class="page-item disabled d-none d-md-inline">
                    <span class="page-link">...</span>
                </li>
            @endif
    
            {{-- Hiển thị các trang xung quanh trang hiện tại --}}
            @for ($i = max(1, $blogs->currentPage() - 1); $i <= min($blogs->currentPage() + 1, $blogs->lastPage()); $i++)
                <li class="page-item {{ $blogs->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" wire:click="gotoPage({{ $i }})" href="#pagination-section">{{ $i }}</a>
                </li>
            @endfor
    
            @if ($blogs->currentPage() < $blogs->lastPage() - 2)
                <li class="page-item disabled d-none d-md-inline">
                    <span class="page-link">...</span>
                </li>
            @endif
    
            @if ($blogs->currentPage() < $blogs->lastPage() - 1)
                <li class="page-item d-none d-md-inline">
                    <a class="page-link" wire:click="gotoPage({{ $blogs->lastPage() }})" href="#pagination-section">
                        {{ $blogs->lastPage() }}
                    </a>
                </li>
            @endif
    
            {{-- Nút tới trang kế tiếp (>) --}}
            <li class="page-item {{ $blogs->currentPage() == $blogs->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled" href="#pagination-section">
                    <i class="fas fa-angle-right"></i>
                </a>
            </li>
    
            {{-- Nút tới trang cuối cùng (>>) --}}
            <li class="page-item {{ $blogs->currentPage() == $blogs->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="gotoPage({{ $blogs->lastPage() }})" wire:loading.attr="disabled" href="#pagination-section">
                    <i class="far fa-angle-double-right"></i>
                </a>
            </li>
        </ul>
    </div>
    





    {{-- <div class="text-center mt-2">{{ $blogs->firstItem() }}-{{ $blogs->lastItem() }} của {{ $blogs->total() }}
        kết quả</div> --}}
</div>
