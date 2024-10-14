<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside Toolbarl-->
    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
        <!--begin::User-->
        <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
            <!--begin::Symbol-->
            <!-- resources/views/components/navbar-admin.blade.php -->
            <div class="symbol symbol-50px">
                <img src="{{ $user['image'] ? asset('assets/images/' . $user['image']) : asset('assets/images/agent-43.jpg') }}"
                    alt="{{ $user['name'] }}" class="hehe rounded-circle">
            </div>

            <!--end::Symbol-->
            <!--begin::Wrapper-->
            <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                <!--begin::Section-->
                <div class="d-flex">
                    <!--begin::Info-->
                    <div class="flex-grow-1 me-2">
                        <!--begin::Username-->
                        {{-- <a href="#" class="text-white text-hover-primary fs-6 fw-bold">{{ $user->name }}</a> --}}
                        <!--end::Username-->
                        <!--begin::Description-->
                        <a href="#" class="text-white text-hover-primary fs-6 fw-bold">{{ $user->name }}</a>
                        <span class="text-gray-600 fw-bold d-block fs-8 mb-1">
                            {{ $user->role == 0 ? 'Người quản trị' : 'User' }}
                            <!-- Bạn có thể thay thế 'User' bằng vai trò khác nếu cần -->
                        </span>
                        <!--end::Description-->
                        <!--begin::Label-->
                        <div class="d-flex align-items-center text-success fs-9">
                            <span class="bullet bullet-dot bg-success me-1"></span>Đang hoạt động
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Info-->
                    <!--begin::User menu-->
                    <div class="me-n2">
                        <!--begin::Action-->
                        <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            data-kt-menu-overflow="true">
                            <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                        fill="black" />
                                    <path
                                        d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img src="{{ $user['image'] ? asset('assets/images/' . $user['image']) : asset('assets/images/agent-43.jpg') }}"
                                            alt="{{ $user['name'] }}" class="hehe rounded-circle">
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{ $user->name }}
                                            <span
                                                class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                                        </div>
                                        <a href="#"
                                            class="fw-bold text-muted text-hover-primary fs-7">{{ $user->email }}</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{ route('admin.admin.profile-admin') }}" class="menu-link px-5">Thông tin của
                                    tôi</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item px-5">

                                <a href="{{ route('admin.admin.private-chat') }}" class="menu-link px-5"> Trò chuyện
                                    riêng
                                    <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">
                                        <livewire:unread-message-count /></span>
                                </a>



                            </div>
                            <!--begin::Menu item-->

                            <!--end::Menu item-->
                            <!--begin::Menu item-->

                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="../../demo8/dist/authentication/flows/basic/sign-in.html"
                                    class="menu-link px-5">Đăng Xuất</a>
                            </div>


                        </div>
                        <!--end::Menu-->
                        <!--end::Action-->
                    </div>
                    <!--end::User menu-->
                </div>
                <!--end::Section-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::User-->
        <!--begin::Aside search-->
        <div class="aside-search py-5">
    <!--begin::Search-->
                <div id="kt_header_search" class="d-flex align-items-center position-relative">
                    <!--begin::Icon-->
                    <form id="navSearchForm" onsubmit="event.preventDefault(); searchNav();">
                    <div class="search-container">
                        <button class="search-button" type="submit">             
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="white" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="white" />
                            </svg>
                        </button>
                    <!--end::Icon-->
                    <!--begin::Input-->
                    
                        <input type="text" id="navSearchInput" class="form-control ps-13 fs-7 h-40px" name="search"
                            placeholder="Tìm kiếm chức năng" />
                            </div>
                    <!--end::Input-->
                    </form>
                </div>
                <!--end::Search-->
            </div>
        <!--end::Aside search-->
        <!--end::Aside user-->
    </div>
    <!--end::Aside Toolbarl-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
            data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-light text-uppercase fs-8 ls-1">Quản lý dữ liệu</span>
                    </div>
                </div>
                <div class="menu-item" data-nav-item="Thống kê">
                    <a class="menu-link text-decoration-none {{ request()->routeIs('admin.admin') ? 'selected' : '' }}"
                        href="{{ route('admin.admin') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                        fill="black" />
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                        fill="black" />
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Thống kê</span>
                    </a>
                </div>
                <div class="menu-item" date-nav-item="Duyệt bài">
                    <a class="menu-link text-decoration-none {{ request()->routeIs('admin.accept-room') ? 'selected' : '' }}"
                        href="{{ route('admin.accept-room') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="black" d="M6 2h12c1.1 0 2 .9 2 2v16c0 1.1-.9 2-2 2H6c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2zm0 2v16h12V4H6zm2 2h8v2H8V6zm0 3h8v2H8V9zm0 3h8v2H8v-2z"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Duyệt bài</span>
                    </a>
                </div>
                <div class="menu-item" data-nav-item="Danh sách chủ trọ">
                    <a class="menu-link text-decoration-none {{ request()->routeIs('admin.listOwner') ? 'selected' : '' }}"
                        href="{{ route('admin.listOwner') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="black" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.31 0-10 1.67-10 5v2h20v-2c0-3.33-6.69-5-10-5z"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Danh Sách Chủ Trọ</span>
                    </a>
                </div>
                <div class="menu-item" data-nav-item="Danh sách rút tiền">
                    <a class="menu-link text-decoration-none {{ request()->routeIs('admin.list-payout') ? 'selected' : '' }}"
                        href="{{ route('admin.list-payout') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path class="fa-secondary" opacity=".4" fill="#b1b8c4" d="M32 64l0 291 51.3-43.4 8.9-7.6 11.7 0 24 0 32 0 0 32 0 24 96 0 64 0 0 88 288 0 0-291-51.3 43.4-8.9 7.6L536 208l-24 0-32 0 0-32 0-24-96 0-64 0 0-88L32 64zm64 64l64 0c0 35.3-28.7 64-64 64l0-64zM384 256a64 64 0 1 1 -128 0 64 64 0 1 1 128 0zm96 128c0-35.3 28.7-64 64-64l0 64-64 0z"/>
                                    <path class="fa-primary" fill="#b1b8c4" d="M512 176l0-64-128 0-24 0 0-48 24 0 128 0 0-64 24 0L640 88 536 176l-24 0zM128 400l128 0 24 0 0 48-24 0-128 0 0 64-24 0L0 424l104-88 24 0 0 64z"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Danh Sách Nạp Tiền</span>
                    </a>
                </div>
                <div class="menu-item" data-nav-item="Danh sách rút tiền">
                    <a class="menu-link text-decoration-none {{ request()->routeIs('admin.list-payout') ? 'selected' : '' }}"
                        href="{{ route('admin.list-payout') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Danh Sách Rút Tiền</span>
                    </a>
                </div>
                <div class="menu-item" data-nav-item="Danh sách người dùng">
                    <a class="menu-link text-decoration-none {{ request()->routeIs('admin.list-user') ? 'selected' : '' }}"
                        href="{{ route('admin.list-user') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="black" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.31 0-10 1.67-10 5v2h20v-2c0-3.33-6.69-5-10-5z"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Danh Sách Người Dùng</span>
                    </a>
                </div>
                <div class="menu-item" data-nav-item="Danh sách blog">
                    <a class="menu-link text-decoration-none {{ request()->routeIs('admin.show-blog-admin') ? 'selected' : '' }}"
                        href="{{ route('admin.show-blog-admin') }}">
                        {{-- <a class="menu-link text-decoration-none" href="{{ route('admin.admin.profile-user') }}"> --}}
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="black" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v2H7V7zm0 3h10v2H7v-2zm0 3h10v2H7v-2z"/>
                                    <path fill="black" d="M21 6h-2v2h2V6zM21 11h-2v2h2v-2zM21 16h-2v2h2v-2z"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Danh Sách Blog</span>
                    </a>
                </div>
                <div class="menu-item" data-nav-item="Danh sách khu trọ">
                    <a class="menu-link text-decoration-none {{ request()->routeIs('admin.danh-sach-khutro') ? 'selected' : '' }}"
                        href="{{ route('admin.danh-sach-khutro') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="black" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v2H7V7zm0 3h10v2H7v-2zm0 3h10v2H7v-2z"/>
                                    <path fill="black" d="M21 6h-2v2h2V6zM21 11h-2v2h2v-2zM21 16h-2v2h2v-2z"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Danh Sách Khu Trọ</span>
                    </a>
                </div>
                <div class="menu-item" data-nav-item="Danh sách phòng trọ">
                    <a class="menu-link text-decoration-none {{ request()->routeIs('admin.room-available-all') ? 'selected' : '' }}"
                        href="{{ route('admin.room-available-all') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="black" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v2H7V7zm0 3h10v2H7v-2zm0 3h10v2H7v-2z"/>
                                    <path fill="black" d="M21 6h-2v2h2V6zM21 11h-2v2h2v-2zM21 16h-2v2h2v-2z"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Danh Sách Phòng Trọ</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-light text-uppercase fs-8 ls-1">Quản lý dữ liệu</span>
                    </div>
                </div>

                <div id="tong-hop" data-kt-menu-trigger="click"
                    class="menu-item menu-accordion menu-item-persistent">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <!-- Biểu tượng Quản lý -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="black" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v2H7V7zm0 3h10v2H7v-2zm0 3h10v2H7v-2z"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Quản lý tổng hợp</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item" data-nav-item="Đơn đăng ký">
                            <a class="menu-link text-decoration-none {{ request()->routeIs('admin.list-registers') ? 'selected' : '' }}"
                                href="{{ route('admin.list-registers') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Đơn đăng ký</span>
                            </a>
                        </div>
                        <div class="menu-item" data-nav-item="Đơn tố cáo">
                            <a class="menu-link text-decoration-none {{ request()->routeIs('admin.show-report') ? 'selected' : '' }}"
                                href="{{ route('admin.show-report') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Đơn tố cáo</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.show-location') ? 'selected' : '' }}"
                                href="{{ route('admin.show-location') }}" style="text-decoration: none;">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Danh sách gói tin</span>
                            </a>
                        </div>
                        {{-- <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.show-acreage') ? 'selected' : '' }}"
                                href="{{ route('admin.show-acreage') }}" style="text-decoration: none;">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Danh sách tiện ích</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.danh-sach-tien-ich') ? 'selected' : '' }}"
                                href="{{ route('admin.danh-sach-tien-ich') }}" style="text-decoration: none;">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Danh sách diện tích</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="gia-menu" data-kt-menu-trigger="click"
                    class="menu-item menu-accordion menu-item-persistent">
                    <span class="menu-link" data-nav-item="Vị trí gói">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <!-- Biểu tượng Gia hạn -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="black" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM8 10h8v2H8zm0 4h8v2H8z"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Vị trí gói</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.danh-sach-bang-gia') ? 'selected' : '' }}"
                                href="{{ route('admin.danh-sach-bang-gia') }}" style="text-decoration: none;">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Danh sách vị trí gói</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.trang-them-bang-gia') ? 'selected' : '' }}"
                                href="{{ route('admin.trang-them-bang-gia') }}" style="text-decoration: none;">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Thêm vị trí gói</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.trash-price-list') ? 'selected' : '' }}"
                                href="{{ route('admin.trash-price-list') }}" style="text-decoration: none;">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Thùng rác vị</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="loai-phong-menu" data-kt-menu-trigger="click"
                    class="menu-item menu-accordion menu-item-persistent" data-nav-item="Loại">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="black" d="M12 2L2 7v11l10 5 10-5V7l-10-5zm0 15.5l-6-3v-8l6 3 6-3v8l-6 3z"/>
                                </svg>
                            </span> 
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Loại</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.list-category') ? 'selected' : '' }}"
                                href="{{ route('admin.list-category') }}" style="text-decoration: none;">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Danh sách loại</span>
                            </a>
                        </div>
                        {{-- <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.add-category') ? 'selected' : '' }}" href="{{ route('admin.add-category') }}" style="text-decoration: none;">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Thêm loại</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.update-category', ['id' => $category->id])) ? 'selected' : '' }}" href="{{ route('admin.update-category', ['id' => $category->id]) }}" style="text-decoration: none;">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Chỉnh sửa loại</span>
                            </a>
                        </div> --}}
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.trash-category') ? 'selected' : '' }}"
                                href="{{ route('admin.trash-category') }}" style="text-decoration: none;">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Thùng rác loại</span>
                            </a>
                        </div>
                    </div>
                </div>




            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->

</div>
<!--end::Aside-->
<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <!--begin::Header-->
    <div id="kt_header" style="" class="header align-items-stretch">
        <!--begin::Brand-->
        <div class="header-brand">
            <!--begin::Logo-->
            <a href="../../demo8/dist/index.html">
                <img alt="Logo" src="{{ asset('assets/images/tro-moi.png') }}" />
                {{-- class="h-25px h-lg-25px" --}}
            </a>
            <!--end::Logo-->
            <!--begin::Aside minimize-->
            <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize"
                data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                data-kt-toggle-name="aside-minimize">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr092.svg-->
                <span class="svg-icon svg-icon-1 me-n1 minimize-default">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.3" x="8.5" y="11" width="12" height="2" rx="1"
                            fill="black" />
                        <path
                            d="M10.3687 11.6927L12.1244 10.2297C12.5946 9.83785 12.6268 9.12683 12.194 8.69401C11.8043 8.3043 11.1784 8.28591 10.7664 8.65206L7.84084 11.2526C7.39332 11.6504 7.39332 12.3496 7.84084 12.7474L10.7664 15.3479C11.1784 15.7141 11.8043 15.6957 12.194 15.306C12.6268 14.8732 12.5946 14.1621 12.1244 13.7703L10.3687 12.3073C10.1768 12.1474 10.1768 11.8526 10.3687 11.6927Z"
                            fill="black" />
                        <path opacity="0.5"
                            d="M16 5V6C16 6.55228 15.5523 7 15 7C14.4477 7 14 6.55228 14 6C14 5.44772 13.5523 5 13 5H6C5.44771 5 5 5.44772 5 6V18C5 18.5523 5.44771 19 6 19H13C13.5523 19 14 18.5523 14 18C14 17.4477 14.4477 17 15 17C15.5523 17 16 17.4477 16 18V19C16 20.1046 15.1046 21 14 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H14C15.1046 3 16 3.89543 16 5Z"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
                <span class="svg-icon svg-icon-1 minimize-active">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.3" width="12" height="2" rx="1"
                            transform="matrix(-1 0 0 1 15.5 11)" fill="black" />
                        <path
                            d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
                            fill="black" />
                        <path
                            d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                            fill="#C4C4C4" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Aside minimize-->
            <!--begin::Aside toggle-->
            <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                fill="black" />
                            <path opacity="0.3"
                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
            </div>
            <!--end::Aside toggle-->
        </div>
        <!--end::Brand-->
        <div class="toolbar">
            <!--begin::Toolbar-->
            <div
                class="container-fluid py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column me-5">
                    <!--begin::Title-->
                    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Bảng điều khiển</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.admin') }}" class="text-muted text-hover-primary">Quản trị</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">@yield('linkAdmin')</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Action group-->

                <!--end::Action group-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
