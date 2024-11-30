<div>
    <div class="p-3">
        <div class="mb-6">
            <div class="row" wire:ignore>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                    <div class="d-flex form-group mb-0 align-items-center">
                        <label for="invoice-list_length" class="d-block mr-2 mb-0">Lọc:</label>
                        <select wire:model.lazy="timeFilter" name="invoice-list_length" id="invoice-list_length"
                            aria-controls="invoice-list" class="form-control form-control-lg mr-2 selectpicker"
                            data-style="bg-white btn-lg h-52 py-2 border">
                            <option value="">Mặc định</option>

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
                    <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                        <input wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh" type="text"
                            class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..." aria-label=""
                            aria-describedby="basic-addon1">
                        <div class="input-group-append position-absolute pos-fixed-right-center">
                            <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                    class="fal fa-search"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
                <thead>
                    <tr role="row">


                        {{-- @if ($currentUserRole != 1)  
                                <th class="py-6">Người Nhận</th>
                            @else --}}
                        <th class="py-6" style="white-space: nowrap;">Tên phòng </th>
                        <th class="py-6" style="white-space: nowrap;">Tên khu trọ </th>
                        <th class="py-6" style="white-space: nowrap;">Tên chủ trọ </th>

                        {{-- @endif --}}
                        <th class="py-6" style="white-space: nowrap;"q>Giá</th>
                        <th class="py-6" style="white-space: nowrap;">Ngày tham gia</th>

                        <th class="py-6" style="white-space: nowrap;">Bảo trì</th>
                        <th class="py-6" style="white-space: nowrap;">Rời khỏi</th>

                    </tr>
                </thead>

                <tbody>
                    @if ($rooms->isEmpty())
                        <tr class="text-center mt-2">
                            <td colspan="7">Không có dữ liệu</td> <!-- Thêm colspan để căn giữa -->
                        </tr>
                    @else
                        @foreach ($rooms as $item)
                        <tr role="row">
                            <td class="align-middle p-4" style="white-space: normal; word-wrap: break-word;">
                                <small>{{ $item->room->title }}</small>
                            </td>
                            <td class="align-middle p-4" style="white-space: normal; word-wrap: break-word;">
                                <small>{{ $item->room->zone->name }}</small>
                            </td>
                            <td class="align-middle p-4" style="white-space: normal; word-wrap: break-word;">
                                <small>{{ $item->room->zone->user->name }}</small>
                            </td>
                            <td class="align-middle p-4" style="white-space: normal; word-wrap: break-word;">
                                <small>{{ number_format($item->room->price, 0, ',', '.') }}</small>
                            </td>
                            <td class="align-middle p-4" style="white-space: normal; word-wrap: break-word;">
                                {{ $item->updated_at }}
                            </td>
                            <td class="align-middle p-4" style="white-space: nowrap;">
                                <button 
                                    class="badge badge-warning border-0 open-maintenance-modal" 
                                    data-toggle="modal" 
                                    data-target="#maintenance" 
                                    data-landlord="{{ $item->room->zone->user->name }}" 
                                    data-room-id="{{ $item->room->id }}">
                                    <i class="fal fa-pencil-alt"></i>
                                </button>
                            </td>
                            <td class="align-middle p-4" style="white-space: nowrap;">
                                <form action="{{ route('owners.leave-the-room', $item->id) }}" method="POST" class="d-inline-block mb-0 delete-form" id="leave-room-form-{{ $item->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="badge badge-primary border-0 leave-room-btn delete-button" data-id="{{ $item->id }}">
                                        <i class="fal fa-sign-out-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>

            </table>
        </div>
        <div class="row justify-content-center p-5">
            @if ($rooms->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination rounded-active justify-content-center">
                        {{-- Nút về đầu --}}

                        <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                                rel="prev" aria-label="@lang('pagination.previous')"><i
                                    class="far fa-angle-double-left"></i></a>
                        </li>

                        @php
                            $totalPages = $rooms->lastPage();
                            $currentPage = $rooms->currentPage();
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

                        <li class="page-item {{ !$rooms->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link hover-white" wire:click="gotoPage({{ $rooms->lastPage() }})"
                                wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')"><i
                                    class="far fa-angle-double-right"></i></a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </div>
    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('.delete-form');
                Swal.fire({
                    title: 'Xác nhận rời khỏi phòng',
                    text: "Bạn có chắc chắn muốn rời khỏi phòng này không?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Có, rời khỏi!',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Gửi yêu cầu AJAX đến route owners.leave-the-room
                        fetch(form.action, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    _method: 'DELETE'
                                })
                            })
                            .then(response => {
                                return response.json(); // Chuyển đổi phản hồi thành JSON
                            })
                            .then(data => {
                                if (data.message) {
                                    // Xử lý thành công
                                    form.closest('tr').remove(); // Xóa dòng tương ứng
                                    Swal.fire('Đã rời khỏi!', data.message, 'success');
                                } else if (data.error) {
                                    // Hiển thị thông báo lỗi
                                    Swal.fire('Có lỗi xảy ra!', data.error, 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Lỗi:', error);
                                Swal.fire('Có lỗi xảy ra!', 'Vui lòng thử lại sau.', 'error');
                            });
                    }
                });
            });
        });
    </script>
    {{-- yêu cầu bảo trì  --}}
    <div class="modal fade maintenance" id="maintenance" tabindex="-1" role="dialog" aria-labelledby="maintenance" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 p-4">
                    <h5 class="modal-title">Gửi yêu cầu</h5>
                    <button type="button" class="close fs-23" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4 py-sm-7 px-sm-8 text-center">
                    <h2 class="text-heading mb-3 fs-22 fs-md-32 lh-1-5">Nội dung yêu cầu!</h2>
                    <form id="maintenance-request-form" method="POST" action="{{ route('owners.sent-for-maintenance') }}">
                        @csrf
                        <input type="text" id="landlordName" class="form-control mb-3 border-0" readonly>
                        <input type="hidden" name="room_id" id="roomId">
                        <input type="text" class="form-control mb-3 border-0" name="title" id="title" placeholder="Nhập tiêu đề" value="{{ old('title') }}">
                        @error('title')
                            <span id="title-error" class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group mb-4">
                            <textarea class="form-control border-0" placeholder="Nội dung yêu cầu..." name="description" id="description" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <span id="description-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="button" class="btn btn-lg btn-primary px-5" id="submit-maintenance-request">Gửi yêu cầu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalButtons = document.querySelectorAll('.open-maintenance-modal');
    
            openModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const landlordName = this.getAttribute('data-landlord');
                    const roomId = this.getAttribute('data-room-id');
    
                    // Cập nhật thông tin trong modal
                    document.getElementById('landlordName').value =`Gửi ${landlordName}`;
                    document.getElementById('roomId').value = roomId;
                });
            });
        });
    </script>
    {{-- gui ajax --}}
    <script>
        document.getElementById('submit-maintenance-request').addEventListener('click', function() {
            const form = document.getElementById('maintenance-request-form');
            const formData = new FormData(form);
    
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Lấy nội dung phản hồi dưới dạng JSON
            })
            .then(jsonData => {
                if (jsonData.success) {
                    Swal.fire('Thành công!', jsonData.message, 'success');
                    form.reset(); // Đặt lại form
                    $('#maintenance').modal('hide'); // Đóng modal
                } else {
                    Swal.fire('Có lỗi xảy ra!', jsonData.error, 'error');
                }
            })
            .catch(error => {
                console.error('Lỗi:', error.message);
                Swal.fire('Có lỗi xảy ra!', 'Vui lòng thử lại sau.', 'error');
            });
        });
    </script>
</div>
