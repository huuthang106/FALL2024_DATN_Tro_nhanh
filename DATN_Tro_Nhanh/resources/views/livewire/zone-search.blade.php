<div>
    <div class="mb-6">
        <div class="row">
            <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                <div class="d-flex form-group mb-0 align-items-center">
                    <label for="perPage" class="d-block mr-2 mb-0">Kết quả:</label>
                    <select wire:model="perPage" id="perPage" class="form-control form-control-lg mr-2 selectpicker" data-style="bg-white btn-lg h-52 py-2 border">
                        <option value="7">7</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </div>
                <div class="align-self-center">
                    <button class="btn btn-primary btn-lg" tabindex="0"><span>Thêm mới</span></button>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
                    <input 
                    wire:model.lazy="search" 
                    wire:keydown.debounce.300ms="$refresh"
                    type="text" 
                    class="form-control bg-transparent border-1x" 
                    placeholder="Tìm kiếm..." 
                    aria-label="" 
                    aria-describedby="basic-addon1"
                >
                    <div class="input-group-append position-absolute pos-fixed-right-center">
                        <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i class="fal fa-search"></i></button>
                    </div>
                </div>
                <div class="align-self-center">
                    <button class="btn btn-danger btn-lg" tabindex="0"><span>Xóa</span></button>
                </div>
            </div>
        </div>
    </div>
    
    <div wire:loading class="spinner-border text-primary " role="status">
        <span class="sr-only">Đang tải...</span>
    </div>
    
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
                            <input type="checkbox"
                                class="new-control-input child-chk select-customers-info">
                        </label></td>
                    <td class="align-middle"><a href="dashboard-preview-invoice.html"><span
                                class="inv-number">{{ $zone->name }}</span></a>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
            
                            <small class="align-self-center mb-0 user-name">{{ $zone->description }}</small>
                        </div>
                    </td>
                    <td class="align-middle"><span class="text-primary pr-1"></span>{{ $zone->address }}
                    </td>
                    <td class="align-middle"><span class="text-success pr-1"><i
                                class="fal fa-calendar"></i></span>{{ $zone->updated_at }}</td>
                                <td class="align-middle">
                                    <span class="inv-amount">
                                        @if ($zone->total_rooms < 0)
                                            {{ -$zone->total_rooms }}
                                        @else
                                            {{ $zone->total_rooms }}
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
                        <a href="{{route('owners.zone-view-update',$zone->slug)}}" data-toggle="tooltip" title="Chỉnh sửa"
                            class="d-inline-block fs-18 text-muted hover-primary mr-5"><i
                                class="fal fa-pencil-alt"></i></a>
                        <a href="#" data-toggle="tooltip" title="Xóa"
                            class="d-inline-block fs-18 text-muted hover-primary"><i
                                class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="8" class="text-center">Không tìm thấy kết quả nào.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="mt-6">
        <ul class="pagination rounded-active justify-content-center">
            {{-- Trang trước --}}
            <li class="page-item {{ $zones->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="previousPage" wire:loading.attr="disabled" href="#"><i class="far fa-angle-double-left"></i></a>
            </li>

            {{-- Trang đầu tiên --}}
            @if ($zones->currentPage() > 2)
                <li class="page-item"><a class="page-link" wire:click="gotoPage(1)" href="#">1</a></li>
            @endif

            {{-- Dấu ba chấm ở đầu nếu cần --}}
            @if ($zones->currentPage() > 3)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            {{-- Hiển thị các trang xung quanh trang hiện tại --}}
            @for ($i = max(1, $zones->currentPage() - 1); $i <= min($zones->currentPage() + 1, $zones->lastPage()); $i++)
                <li class="page-item {{ $zones->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" wire:click="gotoPage({{ $i }})" href="#">{{ $i }}</a>
                </li>
            @endfor

            {{-- Dấu ba chấm ở cuối nếu cần --}}
            @if ($zones->currentPage() < $zones->lastPage() - 2)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            {{-- Trang cuối cùng --}}
            @if ($zones->currentPage() < $zones->lastPage() - 1)
                <li class="page-item"><a class="page-link" wire:click="gotoPage({{ $zones->lastPage() }})" href="#">{{ $zones->lastPage() }}</a></li>
            @endif

            {{-- Trang tiếp theo --}}
            <li class="page-item {{ $zones->currentPage() == $zones->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $zones->nextPageUrl() }}"><i class="far fa-angle-double-right"></i></a>
            </li>
        </ul>
    </div>
</div>

