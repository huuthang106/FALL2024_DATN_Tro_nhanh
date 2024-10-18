<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
        <div class="mb-6">
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                    {{-- <div class="d-flex form-group mb-0 align-items-center">
                        <h5 for="invoice-list_length" class="d-block mr-2 mb-0">Tên khu:</h5>
                    </div> --}}
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                    <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                        <input type="text" class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..."
                            aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append position-absolute pos-fixed-right-center">
                            <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                    class="fal fa-search"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="myTable" class="table table-hover bg-white border rounded-lg">
                        <thead>
                            <tr role="row">

                                <th class="py-6 text-start" style="white-space: nowrap;">Tên phòng</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Tên người ở</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Số điện thoại</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Khu trọ</th>
                                <th class="py-6 text-start" style="white-space: nowrap;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($residents->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Không có đơn</td>
                                </tr>
                            @else
                                @foreach ($residents as $resident)
                                    <tr>

                                        <td class="align-middle"><small>{{ $resident->room->title }}</small></td>
                                        <td class="align-middle">
                                            <small>
                                                <a
                                                    href="{{ route('client.client-agent-detail', $resident->tenant->slug) }}">{{ $resident->tenant->name }}</a>

                                            </small>

                                        </td>
                                        <td class="align-middle"> <small>
                                                <small>
                                                    {{ $resident->tenant->phone }}

                                                </small>
                                            </small></td>
                                        <td class="align-middle">
                                            <small>
                                                {{ $resident->zone_name }}

                                            </small>
                                        </td>
                                        <td class="align-middle" style="white-space: nowrap;">
                                            <small>
                                                <form action="{{ route('owners.approve-application', $resident->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm text-light">Duyệt</button>
                                                </form>
                                                {{-- <form action="{{ route('owners.refuse', $resident->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                </form> --}}
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#confirmDeleteModal{{ $resident->id }}">
                                                    Từ chối
                                                </button>

                                            </small>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @if ($residents->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination rounded-active justify-content-center">
                            {{-- Nút về đầu --}}
                            <li class="page-item {{ $residents->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link hover-white" href="{{ $residents->url(1) }}" rel="prev"
                                    aria-label="@lang('pagination.previous')">
                                    <i class="far fa-angle-double-left"></i>
                                </a>
                            </li>

                            @php
                                $totalPages = $residents->lastPage();
                                $currentPage = $residents->currentPage();
                                $visiblePages = 3; // Số trang hiển thị ở giữa
                            @endphp

                            {{-- Trang đầu --}}
                            <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                                <a class="page-link hover-white" href="{{ $residents->url(1) }}">1</a>
                            </li>

                            {{-- Dấu ba chấm đầu --}}
                            @if ($currentPage > $visiblePages)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif

                            {{-- Các trang giữa --}}
                            @foreach (range(max(2, min($currentPage - 1, $totalPages - $visiblePages + 1)), min(max($currentPage + 1, $visiblePages), $totalPages - 1)) as $i)
                                @if ($i > 1 && $i < $totalPages)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link hover-white"
                                            href="{{ $residents->url($i) }}">{{ $i }}</a>
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
                                    <a class="page-link hover-white"
                                        href="{{ $residents->url($totalPages) }}">{{ $totalPages }}</a>
                                </li>
                            @endif

                            {{-- Nút đến trang cuối --}}
                            <li class="page-item {{ !$residents->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link hover-white" href="{{ $residents->url($residents->lastPage()) }}"
                                    rel="next" aria-label="@lang('pagination.next')">
                                    <i class="far fa-angle-double-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
        <!-- Modal tạo hóa đơn -->
        @foreach ($residents as $resident)
            <div class="modal fade" id="confirmDeleteModal{{ $resident->id }}" tabindex="-1" role="dialog"
                aria-labelledby="invoiceModalLabel{{ $resident->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="invoiceModalLabel{{ $resident->id }}">Lý do từ chối đơn này</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formBills{{ $resident->id }}"
                                action="{{ route('owners.refuses', $resident->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <!-- Cột trái -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Tên người ở:</label>
                                            <input type="text" class="form-control" id="name"
                                                value="{{ $resident->tenant->name }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="room">Tên khu trọ:</label>
                                            <input type="text" class="form-control" id="room"
                                                value="{{ $resident->zone_name }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Cột phải -->
                                    <div class="col-md-8">
                                        <div class="row">
                                            <!-- Cột lý do -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="reasons{{ $resident->id }}">Lý Do:</label>
                                                    <select class="form-select selectpicker"
                                                        id="reasons{{ $resident->id }}" name="title[]"
                                                        title="">
                                                        <option value="Không phù hợp với đối tượng thuê">Không phù hợp
                                                            với đối tượng thuê</option>
                                                        <option value="Lịch sử thuê nhà không tốt">Lịch sử thuê nhà
                                                            không tốt</option>
                                                        <option value="Số lượng người thuê vượt quá quy định">Số lượng
                                                            người thuê vượt quá quy định</option>
                                                        <option value="Tiền án tiền sự">Tiền án tiền sự</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Phần ghi chú nằm dưới lý do -->
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="note">Ghi chú:</label>
                                                    <textarea class="form-control" id="note" name="note" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer text-right">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Từ Chối Đơn</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</main>
