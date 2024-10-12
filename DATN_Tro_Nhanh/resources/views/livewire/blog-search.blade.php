<div>
    {{-- Stop trying to control. --}}
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <div class="mb-6">
                <div class="row" wire:ignore>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center">
                            <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                            <select class="form-control selectpicker form-control-lg mr-2" wire:model.lazy="timeFilter"
                                data-style="bg-white btn-lg h-52 py-2 border">
                                <option value="" selected>Mặc định:</option>
                                <option value="1_day">Hôm qua</option>
                                <option value="7_day">7 ngày</option>
                                <option value="1_month">1 tháng</option>
                                <option value="3_month">3 tháng</option>
                                <option value="6_month">6 tháng</option>
                                <option value="1_year">1 năm</option>
                            </select>
                        </div>
                        <div class="align-self-center">
                            <a href="{{ route('owners.blog') }}" class="btn btn-primary btn-lg"
                                tabindex="0"><span>Thêm
                                    mới</span></a>
                        </div>
                    </div>
                    {{-- <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                <div class="input-group input-group-lg bg-white mb-0 position-relative flex-grow-1 mr-2"
                    style="width: 60%">
                    <input wire:model.lazy="search" wire:keydown.debounce.100ms="$refresh" type="text"
                        class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..." aria-label=""
                        aria-describedby="basic-addon1">
                    <div class="input-group-append position-absolute pos-fixed-right-center">
                        <button class="btn bg-transparent border-0 text-gray lh-1" type="button">
                            <i class="fal fa-search"></i>
                        </button>
                    </div>
                </div>
                
                    <div class="align-self-center">
                        <button id="deleteSelected" class="btn btn-danger btn-lg ml-2">Xóa</button>
                    </div>
                </div>
            </div> --}}
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                        <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                            <input wire:model.lazy="search" wire:keydown.debounce.500ms="$refresh" type="text"
                                class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..." aria-label=""
                                aria-describedby="basic-addon1">
                            <div class="input-group-append position-absolute pos-fixed-right-center">
                                <button class="btn bg-transparent border-0 text-gray lh-1" type="button">
                                    <i class="fal fa-search"></i>
                                </button>
                            </div>
                        </div>
                        {{-- <div class="ml-2">
                    <button id="deleteSelected" class="btn btn-danger btn-lg ml-2">Xóa</button>
                </div> --}}
                        <div class="align-self-center">
                            <button id="deleteSelected" class="btn btn-danger btn-lg" tabindex="0"
                                aria-controls="invoice-list" disabled><span>Xóa</span></button>
                        </div>
                    </div>
                    {{-- <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
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
                <div class="align-self-center">
                    <button id="deleteSelected" class="btn btn-danger btn-lg" tabindex="0"
                        aria-controls="invoice-list"><span>Xóa</span></button>
                </div>
            </div> --}}
                </div>
            </div>
            <div class="table-responsive custom-table-responsive">
                <table id="myTable" class="table table-hover table-sm bg-white border rounded-lg">
                    <thead>
                        <tr role="row">
                            <th scope="col" class="px-6 py-3">
                                <input type="checkbox" id="checkAll" wire:model="selectAll">
                            </th>
                            <th class="py-3 text-nowrap text-center col-2">Ảnh</th>
                            <th class="py-3 text-nowrap text-center col-2">Tiêu đề</th>
                            <th class="py-3 text-nowrap text-center col-1">Lượt xem</th>
                            <th class="py-3 text-nowrap text-center col-2">Trạng thái</th>
                            <th class="py-3 text-nowrap text-center col-2">Ngày xuất bản</th>
                            <th class="no-sort py-3 text-nowrap text-center col-2">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($blogs->isEmpty())
                            <tr>
                                <td colspan="7">
                                    <p class="text-center">Không có blog nào.</p>
                                </td>
                            </tr>
                        @else
                            @foreach ($blogs as $blog)
                                <tr role="row" wire:key="blog-{{ $blog->id }}">
                                    <td class="align-middle px-6">
                                        <input type="checkbox" class="control-input blog-checkbox"
                                            id="blog-{{ $blog->id }}" wire:model="selectedBlogs"
                                            wire:key="blog-{{ $blog->id }}" value="{{ $blog->id }}"
                                            wire:change="toggleBlog({{ $blog->id }})">
                                    </td>
                                    <td class="align-middle d-md-table-cell text-nowrap p-4">
                                        <div class="mr-2 position-relative blog-image-container">
                                            <a href="{{ route('owners.show-blog', $blog->slug) }}">
                                                @if ($blog->image && $blog->image->isNotEmpty())
                                                    <img src="{{ asset('assets/images/' . $blog->image->first()->filename) }}"
                                                        alt="{{ $blog->image->first()->filename }}"
                                                        class="img-fluid blog-image">
                                                @else
                                                    <img src="{{ asset('assets/images/properties-grid-08.jpg') }}"
                                                        alt="Default Image" class="img-fluid blog-image">
                                                @endif
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle pt-3 pb-2 px-3 text-nowrap">
                                        <div class="d-flex align-items-center">
                                            <div class="media-body">
                                                <a href="{{ route('owners.show-blog', $blog->slug) }}">
                                                    <span
                                                        class="text-dark hover-primary mb-1 font-size-md">{{ $blog->title }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-nowrap text-center">
                                        {{ $blog->view }}
                                    </td>
                                    <td class="align-middle text-nowrap text-center">
                                        @if ($blog->status == 1)
                                            <span class="badge badge-yellow text-capitalize">Chờ xác nhận</span>
                                        @elseif ($blog->status == 2)
                                            <span class="badge badge-green text-capitalize">Đã xác nhận</span>
                                        @else
                                            <span class="badge badge-gray text-capitalize">Chưa xác định</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-nowrap text-center">
                                        <span class="text-success pr-1"><i class="fal fa-calendar"></i></span>
                                        {{ $blog->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="align-middle text-nowrap text-center">
                                        <a href="{{ route('owners.sua-blog', ['slug' => $blog->slug]) }}"
                                            data-toggle="tooltip" title="Chỉnh sửa" class="btn btn-primary btn-sm mr-2">
                                            <i class="fal fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('owners.destroy-blog', $blog->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
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
            @if ($blogs->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination rounded-active justify-content-center">
                        {{-- Nút về đầu --}}

                        <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                                rel="prev" aria-label="@lang('pagination.previous')"><i
                                    class="far fa-angle-double-left"></i></a>
                        </li>
                        @php
                            $totalPages = $blogs->lastPage();
                            $currentPage = $blogs->currentPage();
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


                        <li class="page-item {{ !$blogs->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage({{ $blogs->lastPage() }})"
                                wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')"><i
                                    class="far fa-angle-double-right"></i></a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </main>
</div>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkAll = document.getElementById('checkAll');
        const deleteSelectedBtn = document.getElementById('deleteSelected');
        const checkboxes = document.querySelectorAll('.blog-checkbox');

        // Hàm cập nhật trạng thái của checkbox tổng
        function capNhatTrangThaiCheckAll() {
            checkAll.checked = checkboxes.length > 0 && Array.from(checkboxes).every(checkbox => checkbox
                .checked);
        }

        // Bắt sự kiện thay đổi cho checkbox tổng
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

        // Cập nhật hiển thị nút xóa dựa vào số lượng blog đã chọn
        function updateDeleteButtonVisibility() {
            deleteSelectedBtn.style.display = @this.selectedBlogs.length > 0 ? 'block' : 'none';
            capNhatTrangThaiCheckAll();
        }

        // Gọi hàm updateDeleteButtonVisibility mỗi khi có sự thay đổi trong selectedBlogs
        @this.$watch('selectedBlogs', () => {
            updateDeleteButtonVisibility();
        });

        // Khởi tạo trạng thái ban đầu
        updateDeleteButtonVisibility();

        // Bắt sự kiện nhấn nút "Xóa đã chọn"
        deleteSelectedBtn.addEventListener('click', function() {
            const selectedBlogs = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            if (selectedBlogs.length === 0) {
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Vui lòng chọn ít nhất một bài blog để xóa',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

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
                    @this.call('deleteSelectedBlogs', selectedBlogs);
                }
            });
        });
    });

    // Xử lý thông báo sau khi xóa thành công
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('blog-deleted', (event) => {
            Swal.fire({
                title: 'Thành công!',
                text: 'Xóa blog thành công',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkAll = document.getElementById('checkAll');
        const deleteSelectedBtn = document.getElementById('deleteSelected');
        const checkboxes = document.querySelectorAll('.blog-checkbox');

        // Hàm cập nhật trạng thái của checkbox tổng
        function capNhatTrangThaiCheckAll() {
            checkAll.checked = checkboxes.length > 0 && Array.from(checkboxes).every(checkbox => checkbox
                .checked);
        }

        // Bắt sự kiện thay đổi cho checkbox tổng
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

        // Cập nhật hiển thị nút xóa dựa vào số lượng blog đã chọn
        function updateDeleteButtonVisibility() {
            deleteSelectedBtn.style.display = @this.selectedBlogs.length > 0 ? 'block' : 'none';
            capNhatTrangThaiCheckAll();
        }

        // Gọi hàm updateDeleteButtonVisibility mỗi khi có sự thay đổi trong selectedBlogs
        @this.$watch('selectedBlogs', () => {
            updateDeleteButtonVisibility();
        });

        // Khởi tạo trạng thái ban đầu
        updateDeleteButtonVisibility();

        // Bắt sự kiện nhấn nút "Xóa đã chọn"
        deleteSelectedBtn.addEventListener('click', function() {
            const selectedBlogs = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            if (selectedBlogs.length === 0) {
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Vui lòng chọn ít nhất một bài blog để xóa',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

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
                    @this.call('deleteSelectedBlogs', selectedBlogs);
                }
            });
        });
    });

    // Xử lý thông báo sau khi xóa thành công
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('blog-deleted', (event) => {
            Swal.fire({
                title: 'Thành công!',
                text: 'Xóa blog thành công',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        });
    });
</script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('livewire:initialized', () => {
        const checkboxes = document.querySelectorAll('.blog-checkbox');
        const selectAllCheckbox = document.getElementById('checkAll');
        const deleteSelectedBtn = document.getElementById('deleteSelected');

        function updateSelectAllState() {
            if (checkboxes.length === 0) {
                if (selectAllCheckbox) selectAllCheckbox.disabled = true;
                return;
            }

            const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            if (selectAllCheckbox) {
                selectAllCheckbox.checked = allChecked;
                selectAllCheckbox.disabled = false;
            }
            updateDeleteButtonState();
        }

        function updateDeleteButtonState() {
            const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            deleteSelectedBtn.disabled = !anyChecked;
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                updateSelectAllState();
                updateDeleteButtonState(); // Thêm dòng này
                @this.set('selectedBlogs', Array.from(checkboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value)
                );
            });
        });

        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', () => {
                const isChecked = selectAllCheckbox.checked;
                checkboxes.forEach(checkbox => {
                    checkbox.checked = isChecked;
                });
                updateDeleteButtonState();
                @this.set('selectedBlogs', isChecked ? Array.from(checkboxes).map(cb => cb.value) : []);
            });
        }

        deleteSelectedBtn.addEventListener('click', () => {
            const selectedIds = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            if (selectedIds.length === 0) {
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Vui lòng chọn ít nhất một hóa đơn để xóa',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

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
                    @this.call('deleteSelectedBlogs', selectedIds);
                }
            });
        });

        // Khởi tạo trạng thái ban đầu
        updateSelectAllState();
    });


    // Xử lý thông báo sau khi xóa thành công
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('blogs-deleted', (event) => {
            Swal.fire({
                title: 'Thành công!',
                text: 'Xóa thông báo thành công',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        });
    });
</script>
