<div>
    {{-- In work, do what you enjoy. --}}
    <div class="card card-xl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Thống kê bài đăng tin</span>
                @if (isset($allZones) && $allZones->count() > 0)
                    <span class="text-muted mt-1 fw-bold fs-7">Có tất cả
                        {{ $allZones->count() }} bài đăng
                    </span>
                @else
                    <span class="text-muted mt-1 fw-bold fs-7">Chưa có dữ liệu</span>
                @endif
            </h3>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <!--begin::Menu-->
                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                    opacity="0.3" />
                                <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                    opacity="0.3" />
                                <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                    opacity="0.3" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                    id="kt_menu_6148588700a53">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">Lọc</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Ngày/Tháng/Năm:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            {{-- <div>
                                <select class="form-select form-select-solid" data-kt-select2="true"
                                    data-placeholder="Select option" data-dropdown-parent="#kt_menu_6148588700a53"
                                    data-allow-clear="true">
                                    <option></option>
                                    <option value="1">Approved</option>
                                    <option value="2">Pending</option>
                                    <option value="2">In Process</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div> --}}
                            <div class="input-group input-group-sm">
                                <input type="date" class="form-control form-control-solid" wire:model="filterDate" />
                                <button type="button" class="btn btn-sm btn-primary ms-2"
                                    wire:click="applyFilter">Lọc</button>
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        {{-- <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Member Type:</label>
                            <!--end::Label-->
                            <!--begin::Options-->
                            <div class="d-flex">
                                <!--begin::Options-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                    <span class="form-check-label">Author</span>
                                </label>
                                <!--end::Options-->
                                <!--begin::Options-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                    <span class="form-check-label">Customer</span>
                                </label>
                                <!--end::Options-->
                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Thông báo:</label>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="" name="notifications"
                                    checked="checked" />
                                <label class="form-check-label">Đã bật</label>
                            </div>
                            <!--end::Switch-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                data-kt-menu-dismiss="true">Cài lại</button>
                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Áp
                                dụng</button>
                        </div> --}}
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
                <!--end::Menu-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        {{-- <div class="card-body">
            <!--begin::Chart-->
            <div id="kt_charts_widget_1_chart_1" style="height: 350px"></div>
            <!--end::Chart-->
        </div> --}}
        <div class="card-body py-3">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                    <div class="table-responsive pe-2" style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                            <thead>
                                <tr class="border-0 "
                                    style="position: sticky; top: 0; background-color: #FFFFFF; z-index: 1;">
                                    <th class="p-0 w-50px"></th>
                                    <th class="p-0 me-4 min-w-150px">Tiêu đề</th>
                                    <th class="p-0 min-w-100px">Người đăng</th>
                                    <th class="p-0 min-w-100px">Địa chỉ</th>
                                    <th class="p-0 min-w-50px">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($allZones) && $allZones->count() > 0)
                                    @foreach ($allZones as $zone)
                                    @php
                                        $image = $zone->rooms->first()->image ?? null;
                                    @endphp
                                        <tr>
                                            <td>
                                                <div class="symbol symbol-45px me-2"
                                                    style="background: none; border: none;">
                                                    <span class="symbol-label" style="padding: 0;">
                                                        <img src="{{ $image ? 'https://drive.google.com/thumbnail?id=' . $image : asset('assets/images/properties-grid-13.jpg') }}"
                                                            class="h-100 w-100 object-fit-cover"
                                                            style="border-radius: 0; display: block;" alt=""
                                                            loading="lazy" />
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('client.detail-zone', ['slug' => $zone->slug]) }}"
                                                    class="text-dark fw-bolder text-hover-primary mb-1 fs-6"
                                                    target="_blank">
                                                    {{ Str::limit($zone->name, 30) }}
                                                </a>
                                            </td>
                                            <td class="text-start text-muted fw-bold">
                                                {{ $zone->user->name }}
                                            </td>
                                            <td class="text-start text-muted fw-bold"
                                                style="max-width: 150px; word-wrap: break-word;">
                                                {{ Str::limit($zone->address, 20) }}
                                            </td>
                                            <td class="text-end">
                                                <span class="badge badge-light-success">Hoạt
                                                    động</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <span class="text-muted">Chưa có dữ liệu.</span>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Body-->
    </div>
</div>
