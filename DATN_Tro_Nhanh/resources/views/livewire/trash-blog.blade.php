<div>
    <div class="mb-6" wire:ignore>
        <div class="row">
            <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                <div class="d-flex form-group mb-0 align-items-center">
                    <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                    <select class="form-control selectpicker form-control-lg mr-2" wire:model.lazy="timeFilter"
                        data-style="bg-white btn-lg h-52 py-2 border">
                        <option value="" selected>Mặc định:</option> <!-- Tùy chọn mặc định -->
                        <option value="1_day">Hôm qua</option>
                        <option value="7_day">7 ngày</option>
                        <option value="1_month">1 tháng</option>
                        <option value="3_month">3 tháng</option>
                        <option value="6_month">6 tháng</option>
                        <option value="1_year">1 năm</option>
                    </select>
                </div>

            </div>
            <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2" style="width: 60%">
                    <input wire:model.lazy="search" wire:keydown.debounce.100ms="$refresh" type="text"
                        class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..." aria-label=""
                        aria-describedby="basic-addon1">
                    <div class="input-group-append position-absolute pos-fixed-right-center">
                        <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                class="fal fa-search"></i></button>
                    </div>
                </div>
                <div class="align-self-center">
                    <div class="dropdown">
                        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tác vụ
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item text-success" type="button" id="restoreSelected">
                                <i class="fas fa-undo"></i> Khôi phục
                            </button>
                            <button class="dropdown-item text-danger" type="button" id="deleteSelected">
                                <i class="fas fa-trash-alt"></i> Xóa vĩnh viễn
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive custom-table-responsive">
        <table class="table table-hover bg-white border rounded-lg">
            <thead class="thead-sm thead-black">
                <tr>
                    <th class="px-3 py-3">
                        <input type="checkbox" id="checkAll"> <!-- Checkbox tổng -->
                    </th>
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
                            <td class="align-middle pt-3 pb-3 px-3">
                                <input type="checkbox" class="blog-checkbox " value="{{ $blog->id }}"
                                    wire:model="selectedBlogs">
                            </td>
                            <td class="align-middle pt-3 pb-3 px-3" style="width: 15%">
                                <div class="media d-flex align-items-center">
                                    <div class="w-100 w-md-150 mr-3 position-relative">
                                        <a href="{{ route('owners.show-blog', $blog->slug) }}">
                                            @if ($blog->image && $blog->image->isNotEmpty())
                                                <img src="{{ asset('assets/images/' . $blog->image->first()->filename) }}"
                                                    alt="{{ $blog->image->first()->filename }}" class="img-fluid">
                                            @else
                                                <img src="{{ asset('assets/images/properties-grid-08.jpg') }}"
                                                    alt="Default Image" class="img-fluid">
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
                            <td class="align-middle text-nowrap">
                                <form action="{{ route('owners.restore-blog', $blog->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    {{-- <button type="submit"
                                        class="fs-18 text-muted hover-primary border-0 bg-transparent"
                                        title="Khôi phục"> <!-- Thêm class text-dark -->
                                        <i class="fas fa-undo"></i> <!-- Biểu tượng khôi phục -->
                                    </button> --}}
                                    <button type="submit" class="btn btn-warning btn-sm text-white"><i
                                            class="fal fa-undo"></i></button>
                                </form>
                                <form action="#" method="POST" style="display:inline;"
                                    wire:submit.prevent="forceDeleteBlog({{ $blog->id }})">
                                    @csrf
                                    {{-- <button type="submit"
                                        class="fs-18 text-muted hover-primary border-0 bg-transparent"
                                        title="Xóa vĩnh viễn"> <!-- Thêm class text-dark -->
                                        <i class="fal fa-trash-alt"></i>
                                    </button> --}}
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fal fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @if (!$trashedBlogs->isEmpty())

        @if ($trashedBlogs->hasPages())
            <nav aria-label="Page navigation">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Nút về đầu --}}

                    <li class="page-item {{ $trashedBlogs->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                            rel="prev" aria-label="@lang('pagination.previous')"><i
                                class="far fa-angle-double-left"></i></a>
                    </li>
                    @php
                        $totalPages = $trashedBlogs->lastPage();
                        $currentPage = $trashedBlogs->currentPage();
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


                    <li class="page-item {{ !$trashedBlogs->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="gotoPage({{ $trashedBlogs->lastPage() }})"
                            wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')"><i
                                class="far fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </nav>
        @endif
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkAll = document.getElementById('checkAll');
        const restoreSelectedBtn = document.getElementById('restoreSelected');
        const deleteSelectedBtn = document.getElementById('deleteSelected');
        const checkboxes = document.querySelectorAll('.blog-checkbox');

        function capNhatTrangThaiCheckAll() {
            checkAll.checked = checkboxes.length > 0 && Array.from(checkboxes).every(checkbox => checkbox
                .checked);
        }


        if (typeof Livewire === 'undefined') {
            console.log('Livewire chưa được khởi tạo');
            return;
        }

        checkAll.addEventListener('change', function() {
            const isChecked = this.checked;
            checkboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
                checkbox.dispatchEvent(new Event('change', {
                    'bubbles': true
                }));
            });
            @this.set('selectedBlogs', isChecked ? Array.from(checkboxes).map(cb => cb.value) : []);
        });

        // Bắt sự kiện thay đổi cho các checkbox con
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                capNhatTrangThaiCheckAll();
                let selectedBlogs = @this.get('selectedBlogs');
                if (this.checked) {
                    if (!selectedBlogs.includes(this.value)) {
                        selectedBlogs.push(this.value);
                    }
                } else {
                    selectedBlogs = selectedBlogs.filter(id => id !== this.value);
                }
                @this.set('selectedBlogs', selectedBlogs);
            });
        });


        restoreSelectedBtn.addEventListener('click', function() {
            if (@this.selectedBlogs.length === 0) {
                console.log('Selected Blogs:', @this.selectedBlogs);
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Vui lòng chọn ít nhất một blog để khôi phục',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn khôi phục các blog đã chọn?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, khôi phục!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('restoreSelectedBlogs');
                }
            });
        });

        deleteSelectedBtn.addEventListener('click', function() {
            if (@this.selectedBlogs.length === 0) {
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Vui lòng chọn ít nhất một blog để xóa vĩnh viễn',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn xóa vĩnh viễn các blog đã chọn?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Có, xóa vĩnh viễn!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('forceDeleteSelectedBlogs');
                }
            });
        });


        function updateRestoreButtonVisibility() {
            restoreSelectedBtn.style.display = @this.selectedBlogs.length > 0 ? 'block' : 'none';
            capNhatTrangThaiCheckAll();
        }

        @this.$watch('selectedBlogs', () => {
            updateRestoreButtonVisibility();
        });

        updateRestoreButtonVisibility();
    });

    document.addEventListener('livewire:initialized', () => {
        Livewire.on('blog-restored', (event) => {
            Swal.fire({
                title: 'Thành công!',
                text: 'Các blog đã chọn đã được khôi phục thành công',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        });
        Livewire.on('blogs-force-deleted', (event) => {
            Swal.fire({
                title: 'Thành công!',
                text: 'Các blog đã chọn đã được xóa vĩnh viễn',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        });
    });
</script>
