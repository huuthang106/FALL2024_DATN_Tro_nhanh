<div>
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
            
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
                            <button class="btn btn-primary btn-lg" tabindex="0"
                                aria-controls="invoice-list"><span>Thêm
                                    mới</span></button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                        <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                            <input type="text" id="search02"
                                class="form-control form-control-lg border-0 shadow-none" placeholder="Tìm kiếm"
                                name="search" wire:model.lazy="search" wire:keydown.debounce.200ms="$refresh">
                            <div class="input-group-append position-absolute pos-fixed-right-center">
                                <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                                        class="fal fa-search"></i></button>
                            </div>
                        </div>
                        <div class="align-self-center">
                            <button class="btn btn-danger btn-lg" tabindex="0"
                                aria-controls="invoice-list"><span>Xóa</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="myTable" class="table table-hover bg-white border rounded-lg">
                    <thead class="thead-sm thead-black">
                        <tr role="row">
                            <th class="no-sort py-6 pl-6">
                                <label class="new-control new-checkbox checkbox-primary m-auto">
                                    <input type="checkbox" class="new-control-input chk-parent select-customers-info">
                                </label>
                            </th>
                            <th class="py-6 text-nowrap"><small>Tiêu đề</small></th>
                            <th class="py-6 text-nowrap"><small>Mô tả</small></th>
                            <th class="py-6 text-nowrap"><small>Địa chỉ</small></th>
                            <th class="py-6 text-nowrap"><small>Ngày</small></th>
                            <th class="py-6 text-nowrap"><small>Lượng phòng</small></th>
                            <th class="py-6 text-nowrap"><small>Trạng thái</small></th>
                            <th class="no-sort py-6 text-nowrap"><small>Thao tác</small></th>
                        </tr>
                    </thead>
                    
                    
                    <tbody>
                        {{-- Nội dung table --}}
                        @if ($trashedZones->isNotEmpty())
                            @foreach ($trashedZones as $zone)
                                <tr role="row">
                                    <td class="checkbox-column py-6 pl-6 text-center align-middle">
                                        <label class="new-control new-checkbox checkbox-primary m-auto">
                                            <input type="checkbox" class="new-control-input child-chk select-customers-info">
                                        </label>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('owners.detail-zone', ['slug' => $zone->slug]) }}">
                                            <small class="inv-number">{{ $zone->name }}</small>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <small class="align-self-center mb-0 user-name">{{ $zone->description }}</small>
                                        </div>
                                    </td>
                                    <td class="align-middle"><small>{{ $zone->address }}</small></td>
                                    <td class="align-middle">
                                        <small>
                                            <span class="text-success pr-1"><i class="fal fa-calendar"></i></span>
                                            {{ $zone->updated_at }}
                                        </small>
                                    </td>
                                    <td class="align-middle"><small>{{ $zone->total_rooms }}</small></td>
                                    <td class="align-middle">
                                        <small>
                                            @if ($zone->status == 1)
                                                <span class="badge badge-green text-capitalize">Đang hoạt động</span>
                                            @else
                                                <span class="badge badge-yellow text-capitalize">Chưa hoạt động</span>
                                            @endif
                                        </small>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <!-- Nút Khôi Phục -->
                                            <form action="{{ route('owners.restore-zone', $zone->id) }}" method="POST" class="mx-2">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-undo mr-1"></i>
                                                </button>
                                            </form>
                    
                                            <!-- Nút Xóa sử dụng Livewire -->
                                            <button wire:click="deleteZone({{ $zone->id }})"
                                                    class="btn btn-sm d-flex align-items-center justify-content-center">
                                                <i class="fal fa-trash-alt mr-1"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    
                    

                </table>
                @if ($trashedZones->hasPages())
                    <div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm rounded-active justify-content-center">
                                {{-- Liên kết Trang Đầu --}}
                                <li class="page-item {{ $trashedZones->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage(1)"
                                        wire:loading.attr="disabled" rel="first" aria-label="@lang('pagination.first')">
                                        <i class="far fa-angle-double-left"></i>
                                    </a>
                                </li>

                                {{-- Liên kết Trang Trước --}}
                                <li class="page-item {{ $trashedZones->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="previousPage"
                                        wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">
                                        <i class="far fa-angle-left"></i>
                                    </a>
                                </li>

                                @php
                                    $totalPages = $trashedZones->lastPage();
                                    $currentPage = $trashedZones->currentPage();
                                @endphp

                                {{-- Nếu số trang nhỏ hơn hoặc bằng 3, hiển thị tất cả trang --}}
                                @if ($totalPages <= 3)
                                    @foreach (range(1, $totalPages) as $i)
                                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                            <a class="page-link hover-white"
                                                wire:click="gotoPage({{ $i }})"
                                                wire:loading.attr="disabled">{{ $i }}</a>
                                        </li>
                                    @endforeach
                                @else
                                    {{-- Trang đầu --}}
                                    <li class="page-item {{ $currentPage == 1 ? 'active' : '' }}">
                                        <a class="page-link hover-white" wire:click="gotoPage(1)"
                                            wire:loading.attr="disabled">1</a>
                                    </li>

                                    {{-- Dấu ba chấm đầu --}}
                                    @if ($currentPage > 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif

                                    {{-- Trang giữa --}}
                                    @if ($currentPage > 2 && $currentPage < $totalPages - 1)
                                        <li class="page-item {{ $currentPage - 1 == $currentPage ? 'active' : '' }}">
                                            <a class="page-link hover-white"
                                                wire:click="gotoPage({{ $currentPage - 1 }})"
                                                wire:loading.attr="disabled">{{ $currentPage - 1 }}</a>
                                        </li>
                                    @endif

                                    {{-- Trang cuối --}}
                                    <li class="page-item {{ $currentPage == $totalPages ? 'active' : '' }}">
                                        <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                                            wire:loading.attr="disabled">{{ $totalPages }}</a>
                                    </li>

                                    {{-- Dấu ba chấm cuối --}}
                                    @if ($currentPage < $totalPages - 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                {{-- Liên kết Trang Tiếp --}}
                                <li class="page-item {{ !$trashedZones->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="nextPage"
                                        wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">
                                        <i class="far fa-angle-right"></i>
                                    </a>
                                </li>

                                {{-- Liên kết Trang Cuối --}}
                                <li class="page-item {{ !$trashedZones->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link hover-white" wire:click="gotoPage({{ $totalPages }})"
                                        wire:loading.attr="disabled" rel="last" aria-label="@lang('pagination.last')">
                                        <i class="far fa-angle-double-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                @endif


            </div>
        </div>
    </main>

</div>
