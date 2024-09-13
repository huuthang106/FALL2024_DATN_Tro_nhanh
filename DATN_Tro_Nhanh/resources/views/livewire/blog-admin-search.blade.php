<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_table_users .form-check-input"
                                                value="1" />
                                        </div>
                                    </th>
                                    <th style="width: 10%;">Ảnh</th>
                                    <th style="width: 15%;">Tiêu Đề</th>
                                    <th style="width: 40%;">Mô Tả</th>
                                    <th style="width: 10%;">Trạng Thái</th>
                                    <th style="width: 15%;">Ngày xuất bản</th>
                                    <th style="width: 10%;" class="text-end">Tác vụ</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                <!--begin::Table row-->
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::User=-->
                                        <td class="d-flex align-items-center min-w-125px">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="{{ route('admin.show-blog', ['slug' => $blog->slug]) }}">
                                                    <div class="symbol-label">
                                                        @if ($blog->image)
                                                            @foreach ($blog->image as $item)
                                                                <img src="{{ asset('assets/images/' . $item->filename) }}"
                                                                    alt="{{ $item->filename }}" class="img-fluid">
                                                            @endforeach
                                                        @else
                                                            <p>No images available</p>
                                                        @endif
                                                    </div>
                                                </a>

                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('client.detail-room', ['slug' => $blog->slug]) }}"
                                                    class="text-gray-800 text-hover-primary mb-1"></a>
                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <!--end::User=-->
                                        <!--begin::Role=-->

                                        <!--end::Role=-->
                                        <!--begin::Last login=-->
                                        <td>
                                            {{ $blog->title }}
                                        </td>
                                        <!--end::Last login=-->
                                        <!--begin::Two step=-->
                                        <td>{{ $blog->description }}</td>
                                        <!--end::Two step=-->
                                        <!--begin::Joined-->
                                        {{-- <td>{{ $blog->status }}</td> --}}
                                        <td>
                                            @if ($blog->status == 1)
                                                Đã xác nhận
                                            @elseif($blog->status == 2)
                                                Chờ duyệt
                                            @else
                                                Không xác định
                                            @endif
                                        </td>
                                        <!--begin::Joined-->
                                        <td>{{ $blog->created_at->format('d/m/Y') }}</td>
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Tác vụ
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('admin.sua-blog', ['slug' => $blog->slug]) }}"
                                                        class="menu-link px-3">Chỉnh sửa</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <form action="{{ route('admin.destroy-blog', $blog->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="menu-link px-3 border-0 bg-transparent text-start">Xóa</button>
                                                    </form>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                @endforeach
                                <!--end::Table row-->
                                <!--begin::Table row-->
                            </tbody>

                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                @if ($blogs->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination rounded-active justify-content-center">
                            {{-- Liên kết Trang Trước --}}
                            <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link hover-white" wire:click="previousPage" wire:loading.attr="disabled"
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

                            {{-- Liên kết Trang Tiếp --}}
                            <li class="page-item {{ !$blogs->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link hover-white" wire:click="nextPage" wire:loading.attr="disabled"
                                    rel="next" aria-label="@lang('pagination.next')"><i
                                        class="far fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
                <div class="text-center mt-2">{{ $blogs->firstItem() }}-{{ $blogs->lastItem() }} của
                    {{ $blogs->total() }} kết quả</div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
</div>
