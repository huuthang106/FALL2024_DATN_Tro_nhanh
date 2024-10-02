<div>
    <div class="mb-6" wire:ignore>
        <div class="row">
            <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                <div class="d-flex form-group mb-0 align-items-center">
                    <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                    <select class="form-control selectpicker form-control-lg mr-2" wire:model.lazy="timeFilter"
                        data-style="bg-white btn-lg h-52 py-2 border">
                        <option value="" selected>Thời Gian:</option> <!-- Tùy chọn mặc định -->
                        <option value="1_day">1 ngày</option>
                        <option value="7_day">7 ngày</option>
                        <option value="1_month">1 tháng</option>
                        <option value="3_month">3 tháng</option>
                        <option value="6_month">6 tháng</option>
                        <option value="1_year">1 năm</option>
                    </select>
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

            </div>
        </div>
        {{-- <div class="row">
            <div class="mr-0 mr-md-auto">
                <h2 class="mb-0 text-heading fs-22 lh-15">
                    Thùng rác
                </h2>
            </div>
            <div class="form-inline justify-content-md-end mx-n2">
                <div class="p-2">
                    <div class="input-group input-group-lg bg-white border">
                        <div class="input-group-prepend">
                            <button class="btn pr-0 shadow-none" type="button"><i class="far fa-search"></i></button>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0 shadow-none text-body"
                            placeholder="Tìm kiếm danh sách" wire:model.lazy="search"
                            wire:keydown.debounce.300ms="$refresh">
                    </div>
                </div>
                <div class="p-2 ml-2" wire:ignore>
                    <select class="form-control selectpicker form-control-lg mr-2" wire:model.lazy="timeFilter"
                        data-style="bg-white btn-lg h-52 py-2 border">
                        <option value="" selected>Thời Gian:</option> <!-- Tùy chọn mặc định -->
                        <option value="1_day">1 ngày</option>
                        <option value="7_day">7 ngày</option>
                        <option value="1_month">1 tháng</option>
                        <option value="3_month">3 tháng</option>
                        <option value="6_month">6 tháng</option>
                        <option value="1_year">1 năm</option>
                    </select>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="table-responsive">
        <table class="table table-hover bg-white border rounded-lg">
            <thead class="thead-sm thead-black">
                <tr>
                    <th scope="col" class="border-top-0 px-6 pt-5 pb-4" style="white-space: nowrap;">Ảnh</th>
                    <th scope="col" class="border-top-0 pt-5 pb-4" style="white-space: nowrap;">Tiêu Đề</th>

                    <th scope="col" class="border-top-0 pt-5 pb-4" style="white-space: nowrap;">Trạng thái</th>
                    <th scope="col" class="border-top-0 pt-5 pb-4" style="white-space: nowrap;">Ngày xuất bản</th>
                    <th scope="col" class="border-top-0 pt-5 pb-4" style="white-space: nowrap;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if ($trashedBlogs->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-4">Không có dữ liệu!</td>
                    </tr>
                @else
                    @foreach ($trashedBlogs as $blog)
                        <tr class="shadow-hover-xs-2 bg-hover-white">
                            <td class="align-middle pt-6 pb-4 px-6">
                                <div class="media d-flex align-items-center">
                                    <div class="w-120px mr-4 position-relative">
                                        <a href="{{ route('owners.show-blog', $blog->slug) }}">
                                            @if ($blog->image)
                                                @foreach ($blog->image as $item)
                                                    <img src="{{ asset('assets/images/' . $item->filename) }}"
                                                        alt="{{ $item->filename }}" class="img-fluid"
                                                        style="max-height: 100px; object-fit: cover;">
                                                @endforeach
                                            @else
                                                <p>No images available</p>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle" style="white-space: nowrap;">
                                {{ $blog->title }}
                                <small class="d-block text-muted">
                                    {{ Str::limit($blog->description, 60) }}
                                </small>
                            </td>
                            <td class="align-middle">
                                {{-- @if ($blog->status == 1)
                                    <span class="badge text-capitalize font-weight-normal fs-12 badge-yellow">Chờ xác
                                        nhận</span>
                                @elseif ($blog->status == 2) --}}
                                    <span class="badge text-capitalize font-weight-normal fs-12 badge-green">Đã xác
                                        nhận</span>
                                {{-- @else
                                    <span class="badge text-capitalize font-weight-normal fs-12 badge-gray">Chưa xác
                                        định</span>
                                @endif --}}
                            </td>
                            <td class="align-middle">{{ $blog->created_at->format('d-m-Y') }}</td>
                            <td class="align-middle">
                                <form action="{{ route('owners.restore-blog', $blog->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="fs-18 text-muted hover-primary border-0 bg-transparent"
                                        title="Khôi phục"> <!-- Thêm class text-dark -->
                                        <i class="fas fa-undo"></i> <!-- Biểu tượng khôi phục -->
                                    </button>
                                </form>
                                <form action="#" method="POST" style="display:inline;"
                                    wire:submit.prevent="forceDeleteBlog({{ $blog->id }})">
                                    @csrf
                                    <button type="submit"
                                        class="fs-18 text-muted hover-primary border-0 bg-transparent"
                                        title="Xóa vĩnh viễn"> <!-- Thêm class text-dark -->
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
    @if (!$trashedBlogs->isEmpty())

        @if ($trashedBlogs->count() > 0)
            <div id="pagination-section" class="mt-6">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Nút quay về trang đầu tiên (<<) --}}
                    <li class="page-item {{ $trashedBlogs->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                            href="#pagination-section">
                            <i class="far fa-angle-double-left"></i>
                        </a>
                    </li>

                    {{-- Nút quay lại trang trước (<) --}}
                    <li class="page-item {{ $trashedBlogs->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled"
                            href="#pagination-section">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </li>

                    {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                    @for ($i = 1; $i <= $trashedBlogs->lastPage(); $i++)
                        <li class="page-item {{ $trashedBlogs->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" wire:click="gotoPage({{ $i }})"
                                href="#pagination-section">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Nút tới trang kế tiếp (>) --}}
                    <li
                        class="page-item {{ $trashedBlogs->currentPage() == $trashedBlogs->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled"
                            href="#pagination-section">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>

                    {{-- Nút tới trang cuối cùng (>>) --}}
                    <li
                        class="page-item {{ $trashedBlogs->currentPage() == $trashedBlogs->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click="gotoPage({{ $trashedBlogs->lastPage() }})"
                            wire:loading.attr="disabled" href="#pagination-section">
                            <i class="far fa-angle-double-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('showAlert', (data) => {
            Swal.fire({
                icon: data[0].type,
                title: data[0].title,
                text: data[0].message,
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('$refresh');
                }
            });
        });
    });
</script>
