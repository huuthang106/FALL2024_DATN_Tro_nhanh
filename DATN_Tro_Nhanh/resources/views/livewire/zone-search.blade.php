<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
        <form action="#" method="GET">
            <div class="mb-6">
                <div class="row" wire:ignore>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                        <div class="d-flex form-group mb-0 align-items-center ml-3">
                            <label class="form-label fs-6 fw-bold mr-2 mb-0">Lọc:</label>
                            <select wire:model.lazy="timeFilter" class="form-control form-control-lg selectpicker"
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
                        <div class="ml-2 align-self-center">
                            <a href="{{ route('owners.zone-post') }}" class="btn btn-primary btn-lg"
                                tabindex="0"><span>Thêm
                                    mới</span></a>
                        </div>
                    </div>
                    <div
                        class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                        <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                            <input wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh" type="text"
                                class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..."
                                aria-label="" aria-describedby="basic-addon1">
                            <div class="input-group-append position-absolute pos-fixed-right-center">
                                <button class="btn bg-transparent border-0 text-gray lh-1" type="button">
                                    <i class="fal fa-search"></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>

        <!-- Hiển thị danh sách phòng mà người dùng đang ở -->
        

                <div class="table-responsive">
                    <table id="myTable" class="table table-hover table-sm bg-white border rounded-lg">
                        <thead>
                            <tr role="row">
                                
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
                                       
                                        <td class="align-middle pt-3 pb-2 px-3 text-nowrap">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-2 position-relative zone-image-container">
                                                    <a
                                                        href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                                        <img src="{{ $this->getZoneImageUrl($zone) }}"
                                                            alt="{{ $zone->name }}" class="img-fluid zone-image"
                                                            >
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <a
                                                        href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                                        <span
                                                            class="text-dark hover-primary mb-1 font-size-md">{{ $zone->name }}</span>
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
                                                    <span class="badge badge-yellow text-capitalize">Chưa hoạt
                                                        động</span>
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


        </div>


        <!-- Phân trang -->
        @if ($zones->hasPages())
            <nav aria-label="Page navigation">
                <ul class="pagination rounded-active justify-content-center">
                    {{-- Nút về đầu --}}
                    {{-- <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link hover-white" wire:click="gotoPage(1)"
                wire:loading.attr="disabled" aria-label="First Page">
                << </a>
        </li> --}}

                    {{-- Liên kết Trang Trước --}}
                    <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled"
                            rel="prev" aria-label="@lang('pagination.previous')">
                            <i class="far fa-angle-double-left"></i> </a>
                    </li>

                    @php
                        $totalPages = $zones->lastPage();
                        $currentPage = $zones->currentPage();
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
                    <li class="page-item {{ !$zones->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link hover-white" wire:click="nextPage" wire:loading.attr="disabled"
                            rel="next" aria-label="@lang('pagination.next')"> <i class="far fa-angle-double-right"></i>
                        </a>
                    </li>

                    {{-- Nút về cuối --}}
                    {{-- <li class="page-item {{ !$zones->hasMorePages() ? 'disabled' : '' }}">
            <a class="page-link hover-white"
                wire:click="gotoPage({{ $zones->lastPage() }})"
                wire:loading.attr="disabled" aria-label="Last Page"> >>
            </a>
        </li> --}}
                </ul>
            </nav>
        @endif
    </div>
</main>
