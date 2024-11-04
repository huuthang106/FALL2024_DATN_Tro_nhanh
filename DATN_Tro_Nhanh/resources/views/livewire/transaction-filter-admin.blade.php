<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="card card-xl-stretch mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title fw-bolder text-dark">Thống kê giao dịch</h3>
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
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <div class="table-responsive pe-2" style="max-height: 300px; overflow-y: auto;">
                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                    <thead class="sticky-header">
                        <tr class="border-0 text-center"
                            style="position: sticky; top: 0; background-color: #FFFFFF; z-index: 1;">
                            <th class="p-0 ">Tên dịch vụ</th>
                            <th class="p-0 min-w-100px text-nowrap">Số tiền</th>

                            <th class="p-0 min-w-150px">Tên</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                        <tr class="">
                            <td style="max-width: 150px; word-wrap: break-word; white-space: normal; text-align: left;">
                                {{ $transaction->type }}
                            </td>
                            <td class="align-middle @if ($transaction->status == 1) text-success @elseif($transaction->status == 2) text-danger @endif" style="word-wrap: break-word; white-space: normal; text-align: left;">
                                @if ($transaction->status == 1)
                                    +
                                @else
                                    -
                                @endif
                                {{ number_format($transaction->added_funds, 0, ',', '.') }} VND
                            </td>
                            <td class="">{{ $transaction->user->name }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <span class="text-muted">Chưa có dữ liệu.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!--end::Body-->
    </div>
</div>
