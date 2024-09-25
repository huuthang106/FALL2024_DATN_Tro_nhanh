<div>
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            <div class="mb-6">
                <div class="row">
                    <!-- Cột trái -->
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center mb-3 mb-md-0">
                        <div class="d-flex align-items-center">
                            <label for="perPage" class="mr-2 mb-0">Kết quả:</label>
                            <select wire:model.lazy="timeFilter" id="timeFilter" class="form-control form-control-lg">
                                <option value="" selected>Thời Gian:</option>
                                <option value="1_day">1 ngày</option>
                                <option value="7_day">7 ngày</option>
                                <option value="1_month">1 tháng</option>
                                <option value="3_month">3 tháng</option>
                                <option value="6_month">6 tháng</option>
                                <option value="1_year">1 năm</option>
                            </select>
                        </div>
                        <div class="ml-3">
                            <a href="{{ route('owners.zone-post') }}" class="btn btn-primary btn-lg">Thêm mới</a>
                        </div>
                    </div>

                    <!-- Cột phải -->
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center">
                        <div class="input-group input-group-lg mb-0">
                            <input wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh" type="text"
                                class="form-control" placeholder="Tìm kiếm...">

                        </div>

                        <div class="ml-3">

                        </div>

                        <div class="ml-3">
                            <button class="btn btn-danger btn-lg">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="table-responsive">
                <table id="myTable" class="table table-hover table-sm bg-white border rounded-lg">
                    <thead>
                        <tr role="row">
                            <th class="no-sort py-3 pl-3 text-nowrap" scope="col">
                                <label class="new-control new-checkbox checkbox-primary m-auto">
                                    <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                                </label>
                            </th>
                            <th class="py-3 text-nowrap text-center col-2">Tiêu đề</th>
                            <th class="py-3 text-nowrap d-none d-md-table-cell col-3">Mô tả</th>
                            <th class="py-3 text-nowrap d-none d-lg-table-cell col-3">Địa chỉ</th>
                            <th class="py-3 text-nowrap col-2">Ngày</th>
                            <th class="py-3 text-nowrap col-2">Lượng phòng</th>
                            <th class="py-3 text-nowrap col-2">Trạng thái</th>
                            <th class="no-sort py-3 text-nowrap col-2">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($zones->isNotEmpty())
                            @foreach ($zones as $zone)
                                <tr role="row" wire:key="zone-{{ $zone->id }}">
                                    <td class="checkbox-column py-3 pl-3 text-nowrap">
                                        <label class="new-control new-checkbox checkbox-primary m-auto">
                                            <input type="checkbox"
                                                class="new-control-input child-chk select-customers-info">
                                        </label>
                                    </td>
                                    <td class="align-middle pt-3 pb-2 px-3 text-nowrap">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2 position-relative zone-image-container">
                                                <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                                    <img src="{{ $this->getZoneImageUrl($zone) }}"
                                                         alt="{{ $zone->name }}" class="img-fluid zone-image"
                                                         style="width: 40px; height: auto;">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                                    <span class="text-dark hover-primary mb-1 font-size-md">{{ $zone->name }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="align-middle d-none d-md-table-cell text-nowrap">
                                        <small class="user-name">{{ $zone->description }}</small>
                                    </td>
                                    <td class="align-middle d-none d-lg-table-cell text-nowrap">
                                        <small>{{ Str::limit($zone->address, 15) }}</small>
                                    </td>
                                    
                                    <td class="align-middle text-nowrap">
                                        <span class="text-success pr-1"><i
                                                class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($zone->updated_at)->format('d-m-Y') }}
                                    </td>

                                    <td class="align-middle text-nowrap">
                                        <span class="inv-amount">
                                            @if ($zone->room_count < 0)
                                                {{ -$zone->room_count }}
                                            @else
                                                <span class="badge badge-yellow text-capitalize">Chưa hoạt động</span>
                                            @endif
                                        </span>
                                    </td>
                                    <td class="align-middle text-nowrap">
                                        @if ($zone->status == 1)
                                            <span class="badge badge-green text-capitalize">Đang hoạt động</span>
                                        @else
                                            <span class="badge badge-yellow text-capitalize">Chưa hoạt động</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-nowrap">
                                        <a href="{{ route('owners.zone-view-update', $zone->slug) }}"
                                            data-toggle="tooltip" title="Chỉnh sửa"
                                            class="d-inline-block fs-18 text-muted hover-primary mr-3">
                                            <i class="fal fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('owners.destroy-zone', $zone->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="fs-18 text-muted hover-primary border-0 bg-transparent">
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


        </div>

        </tbody>
        </table>

        @if ($zones->count() > 0)
            <div id="pagination-section" class="mt-6">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Nút quay về trang đầu tiên (<<) --}}
                    <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled"
                            href="#pagination-section">
                            <i class="far fa-angle-double-left"></i> {{-- Icon cho trang đầu tiên --}}
                        </a>
                    </li>

                    {{-- Nút quay lại trang trước (<) --}}
                    <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled"
                            href="#pagination-section">
                            <i class="fas fa-angle-left"></i> {{-- Icon cho trang trước --}}
                        </a>
                    </li>

                    {{-- Trang đầu tiên --}}
                    @if ($zones->currentPage() > 2)
                        <li class="page-item">
                            <a class="page-link" wire:click="gotoPage(1)" href="#pagination-section">1</a>
                        </li>
                    @endif

                    {{-- Dấu ba chấm ở đầu nếu cần --}}
                    @if ($zones->currentPage() > 3)
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif

                    {{-- Hiển thị các trang xung quanh trang hiện tại --}}
                    @for ($i = max(1, $zones->currentPage() - 1); $i <= min($zones->currentPage() + 1, $zones->lastPage()); $i++)
                        <li class="page-item {{ $zones->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" wire:click="gotoPage({{ $i }})"
                                href="#pagination-section">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Dấu ba chấm ở cuối nếu cần --}}
                    @if ($zones->currentPage() < $zones->lastPage() - 2)
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif

                    {{-- Trang cuối cùng --}}
                    @if ($zones->currentPage() < $zones->lastPage() - 1)
                        <li class="page-item">
                            <a class="page-link" wire:click="gotoPage({{ $zones->lastPage() }})"
                                href="#pagination-section">
                                {{ $zones->lastPage() }}
                            </a>
                        </li>
                    @endif

                    {{-- Nút tới trang kế tiếp (>) --}}
                    <li class="page-item {{ $zones->currentPage() == $zones->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled"
                            href="#pagination-section">
                            <i class="fas fa-angle-right"></i> {{-- Icon cho trang kế tiếp --}}
                        </a>
                    </li>

                    {{-- Nút tới trang cuối cùng (>>) --}}
                    <li class="page-item {{ $zones->currentPage() == $zones->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" wire:click="gotoPage({{ $zones->lastPage() }})"
                            wire:loading.attr="disabled" href="#pagination-section">
                            <i class="far fa-angle-double-right"></i> {{-- Icon cho trang cuối cùng --}}
                        </a>
                    </li>
                </ul>
            </div>
        @endif

</div>
</main>

</div>
