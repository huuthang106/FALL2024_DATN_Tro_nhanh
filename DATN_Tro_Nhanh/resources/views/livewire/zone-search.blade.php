<div>
    <div class="mb-6">
        <div class="row">
            <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
            <div class="align-self-center">
                    <a href="{{ route('owners.zone-post') }}" class="btn btn-primary btn-lg" tabindex="0"><span>Thêm
                            mới</span></a>
                </div>
                <div class="p-2" wire:ignore>
                        <div class="input-group input-group-lg bg-white border flex-grow-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent letter-spacing-093 border-0 pr-0">
                                    <i class="far fa-align-left mr-2"></i>Lọc theo:
                                </span>
                            </div>
                            <select class="form-control bg-transparent pl-0 selectpicker d-flex align-items-center sortby"
                                    wire:model.lazy="timeFilter" id="timeFilter" 
                                data-style="bg-transparent px-1 py-0 lh-1 font-weight-600 text-body">
                                <option value="" selected>Thời Gian:</option>
                                <option value="1_day">1 ngày</option>
                                <option value="7_day">7 ngày</option>
                                <option value="1_month">1 tháng</option>
                                <option value="3_month">3 tháng</option>
                                <option value="6_month">6 tháng</option>
                                <option value="1_year">1 năm</option>
                            </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2 flex-grow-1">
                    <input wire:model.lazy="search" wire:keydown.debounce.300ms="$refresh" type="text"
                        class="form-control bg-transparent border-1x" placeholder="Tìm kiếm..." aria-label=""
                        aria-describedby="basic-addon1">
                    <div class="input-group-append position-absolute pos-fixed-right-center">
                        <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                class="fal fa-search"></i></button>
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

    {{-- <div wire:loading class="spinner-border text-primary " role="status">
        <span class="sr-only">Đang tải...</span>
    </div> --}}

    <table id="myTable" class="table table-hover bg-white border rounded-lg">
        <thead>
            <tr role="row">
                <th class="no-sort py-6 pl-6"><label class="new-control new-checkbox checkbox-primary m-auto">
                        <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                    </label></th>
                <th class="py-6">Tiêu đề</th>
                <th class="py-6">Mô tả</th>
                <th class="py-6">Địa chỉ</th>
                <th class="py-6">Ngày</th>
                <th class="py-6">Lượng phòng</th>
                <th class="py-6">Trạng thái</th>
                <th class="no-sort py-6">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if ($zones->isNotEmpty())
                @foreach ($zones as $zone)
                    <tr role="row" wire:key="zone-{{ $zone->id }}">
                        <td class="checkbox-column py-6 pl-6"><label
                                class="new-control new-checkbox checkbox-primary m-auto">
                                <input type="checkbox" class="new-control-input child-chk select-customers-info">
                            </label></td>
                        {{-- <td class="align-middle"><a
                                href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}"><span
                                    class="inv-number">{{ $zone->name }}</span></a>
                        </td> --}}
                        {{-- <td class="align-middle pt-6 pb-4 px-6">
                            <div class="media">
                                <div class="w-120px mr-4 position-relative">
                                    <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                        <img src="{{ $this->getZoneImageUrl($zone) }}" alt="{{ $zone->name }}"
                                            class="img-fluid">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                        <span
                                            class="text-dark hover-primary mb-1 font-size-md">{{ $zone->name }}</span>
                                    </a>
                                </div>
                            </div>
                        </td> --}}
                        <td class="align-middle pt-6 pb-4 px-6">
                            <div class="media">
                                <div class="mr-4 position-relative zone-image-container">
                                    <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                        <img src="{{ $this->getZoneImageUrl($zone) }}" alt="{{ $zone->name }}"
                                            class="img-fluid zone-image">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                        <span
                                            class="text-dark hover-primary mb-1 font-size-md">{{ $zone->name }}</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">

                                <small class="align-self-center mb-0 user-name">{{ $zone->description }}</small>
                            </div>
                        </td>
                        <td class="align-middle"><span
                                class="text-primary pr-1"></span><small>{{ $zone->address }}</small>
                        </td>
                        <td class="align-middle"><span class="text-success pr-1"><i
                                    class="fal fa-calendar"></i></span>{{ $zone->updated_at }}</td>
                        <td class="align-middle">
                            <span class="inv-amount">
                                @if ($zone->room_count < 0)
                                    {{ -$zone->room_count }}
                                @else
                                    <span class="badge badge-yellow text-capitalize">Chưa hoạt động</span>
                                @endif
                            </span>
                        </td>

                        <td class="align-middle">
                            @if ($zone->status == 1)
                                <span class="badge badge-green text-capitalize">Đang hoạt dộng</span>
                            @else
                                <span class="badge badge-yellow text-capitalize">Chưa hoạt động</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('owners.zone-view-update', $zone->slug) }}" data-toggle="tooltip"
                                title="Chỉnh sửa" class="d-inline-block fs-18 text-muted hover-primary mr-5"><i
                                    class="fal fa-pencil-alt"></i> </a>
                            <form action="{{ route('owners.destroy-zone', $zone->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fs-18 text-muted hover-primary border-0 bg-transparent"><i
                                        class="fal fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
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
    {{-- <div class="mt-6">
        <ul class="pagination rounded-active justify-content-center">

            <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled" href="#"><i
                        class="far fa-angle-double-left"></i></a>
            </li>

                    {{-- Dấu ba chấm ở đầu nếu cần --}}
                    @if ($zones->currentPage() > 3)
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif

            @if ($zones->currentPage() > 2)
                <li class="page-item"><a class="page-link" wire:click="gotoPage(1)" href="#">1</a></li>
            @endif


            @if ($zones->currentPage() > 3)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif


            @for ($i = max(1, $zones->currentPage() - 1); $i <= min($zones->currentPage() + 1, $zones->lastPage()); $i++)
                <li class="page-item {{ $zones->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" wire:click="gotoPage({{ $i }})"
                        href="#">{{ $i }}</a>
                </li>


            @if ($zones->currentPage() < $zones->lastPage() - 2)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif


            @if ($zones->currentPage() < $zones->lastPage() - 1)
                <li class="page-item"><a class="page-link" wire:click="gotoPage({{ $zones->lastPage() }})"
                        href="#">{{ $zones->lastPage() }}</a></li>
            @endif


            <li class="page-item {{ $zones->currentPage() == $zones->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $zones->nextPageUrl() }}"><i
                        class="far fa-angle-double-right"></i></a>
            </li>
        </ul>
    </div> 
</div>
