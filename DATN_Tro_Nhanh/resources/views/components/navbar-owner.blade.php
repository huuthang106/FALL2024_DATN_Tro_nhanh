<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
<div class="db-sidebar bg-white">
    <nav class="navbar navbar-expand-xl navbar-light d-block px-0 header-sticky dashboard-nav py-0">
        <div class="sticky-area shadow-xs-1 py-3">
            <div class="d-flex px-3 px-xl-6 w-100">
                <a class="navbar-brand" href="">
                    <img src="{{  asset('assets/images/tro-moi.png') }}" alt="HomeID" class="normal-logo">

                            {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="HomeID" class="sticky-logo"> --}}
                </a>
                <div class="ml-auto d-flex align-items-center ">
                    <div class="d-flex align-items-center d-xl-none">
                        <div class="dropdown px-3">
                            <a href="#" class="dropdown-toggle d-flex align-items-center text-heading"
                                data-toggle="dropdown">
                                <div class="w-48px">
                                    @if ($user->image)
                                        <img src="{{ asset('assets/images/' . $user->image) }}" alt="Admin"
                                            class="hehe rounded-circle">
                                    @else
                                        <img src="{{ asset('assets/images/nhan.JPG') }}" alt="Admin"
                                            class="hehe rounded-circle">
                                    @endif
                                </div>

                                <span class="fs-13 font-weight-500 d-none d-sm-inline ml-2">
                                    Hồ sơ
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">My Profile</a>
                                <a class="dropdown-item" href="#">My Profile</a>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </div>
                        <div class="dropdown no-caret py-4 px-3 d-flex align-items-center notice mr-3">
                            <a href="#" class="dropdown-toggle text-heading fs-20 font-weight-500 lh-1"
                                data-toggle="dropdown">
                                <i class="far fa-bell"></i>
                                <span
                                    class="badge badge-primary badge-circle badge-absolute font-weight-bold fs-13">1</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse"
                        data-target="#primaryMenuSidebar" aria-controls="primaryMenuSidebar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
            <div class="collapse navbar-collapse bg-white" id="primaryMenuSidebar">
                <form class="d-block d-xl-none pt-5 px-3">
                    <div class="input-group">
                        <div class="input-group-prepend mr-0 bg-input">
                            <button class="btn border-0 shadow-none fs-20 text-muted pr-0" type="submit"><i
                                    class="far fa-search"></i></button>
                        </div>
                        <input type="text" class="form-control border-0 form-control-lg shadow-none"
                            placeholder="Search for..." name="search">
                    </div>
                </form>
                <ul class="list-group list-group-flush w-100">
                    <li class="list-group-item pt-6 pb-4">
                        <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Main</h5>
                        <ul class="list-group list-group-no-border rounded-lg">
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ route('owners.profile.dashboard') }}"
                                    class="text-heading lh-1 sidebar-link">
                                    <span class="sidebar-item-icon d-inline-block mr-3 fs-20"><i
                                            class="fal fa-cog"></i></span>
                                    <span class="sidebar-item-text">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if (Auth::user()->role != 1)
                        <li class="list-group-item pt-6 pb-4">
                            <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Manage Listings
                            </h5>
                            <ul class="list-group list-group-no-border rounded-lg">
                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="#collapseTrọ"
                                        class="text-heading lh-1 sidebar-link d-flex align-items-center"
                                        onclick="toggleDropdown('collapseTrọ'); return false;">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                            <svg class="icon icon-my-properties">
                                                <use xlink:href="#icon-my-properties"></use>
                                            </svg>
                                        </span>
                                        <span class="sidebar-item-text">Trọ</span>
                                        <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                                    </a>
                                </li>
                                <div class="collapse-content" id="collapseTrọ">
                                    <div class="card card-body border-0 bg-transparent py-0 pl-6">
                                        <ul class="list-group list-group-flush list-group-no-border">
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.properties') }}">Danh sách trọ</a>
                                            </li>
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.add-room') }}">Thêm mới trọ</a>
                                            </li>
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.trash') }}">Thùng rác</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="#collapseKhuTrọ"
                                        class="text-heading lh-1 sidebar-link d-flex align-items-center" d
                                        onclick="toggleDropdown('collapseKhuTrọ'); return false;">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                            <svg class="icon icon-my-properties">
                                                <use xlink:href="#icon-my-properties"></use>
                                            </svg>
                                        </span>
                                        <span class="sidebar-item-text">Khu Trọ</span>
                                        <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                                    </a>
                                </li>
                                <div class="collapse-content" id="collapseKhuTrọ">
                                    <div class="card card-body border-0 bg-transparent py-0 pl-6">
                                        <ul class="list-group list-group-flush list-group-no-border">
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.zone-list') }}">Danh sách khu trọ</a>
                                            </li>
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.zone-post') }}">Thêm mới
                                                    khu trọ</a>
                                            </li>
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.trash-zone') }}">Thùng rác</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <li class=" list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="#collapseBlog"
                                        class="text-heading lh-1 sidebar-link d-flex align-items-center"
                                        onclick="toggleDropdown('collapseBlog'); return false;">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                            <svg class="icon icon-my-properties">
                                                <use xlink:href="#icon-my-properties"></use>
                                            </svg>
                                        </span>
                                        <span class="sidebar-item-text">Blog</span>
                                        <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                                    </a>
                                </li>
                                <div class="collapse-content" id="collapseBlog">
                                    <div class="card card-body border-0 bg-transparent py-0 pl-6">
                                        <ul class="list-group list-group-flush list-group-no-border">
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.show-blog') }}">Danh sách blog</a>
                                            </li>
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.blog') }}">Thêm mới
                                                    blog</a>
                                            </li>
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.trash-blog') }}">Thùng rác</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="#collapseEdit"
                                        class="text-heading lh-1 sidebar-link d-flex align-items-center"
                                        onclick="toggleDropdown('collapseEdit'); return false;">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                            <svg class="icon icon-my-properties">
                                                <use xlink:href="#icon-my-properties"></use>
                                            </svg>
                                        </span>
                                        <span class="sidebar-item-text">Sửa Chữa</span>
                                        <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                                    </a>
                                </li>
                                <div class="collapse-content" id="collapseEdit">
                                    <div class="card card-body border-0 bg-transparent py-0 pl-6">
                                        <ul class="list-group list-group-flush list-group-no-border">
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.show-fix') }}">Danh sách sửa chữa</a>
                                            </li>
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.trash-maintenances') }}">Thùng</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="#collapseLike"
                                        class="text-heading lh-1 sidebar-link d-flex align-items-center"
                                        onclick="toggleDropdown('collapseLike'); return false;">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                            <svg class="icon icon-my-properties">
                                                <use xlink:href="#icon-my-properties"></use>
                                            </svg>
                                        </span>
                                        <span class="sidebar-item-text">Theo dõi</span>
                                        <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                                    </a>
                                </li>
                                <div class="collapse-content" id="collapseLike">
                                    <div class="card card-body border-0 bg-transparent py-0 pl-6">
                                        <ul class="list-group list-group-flush list-group-no-border">
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.watch-list') }}">Danh sách theo dõi</a>
                                            </li>
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link" href="#">Thùng rác</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="{{ Route('owners.favorites') }}"
                                        class="text-heading lh-1 sidebar-link d-flex align-items-center">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                            <svg class="icon icon-my-properties">
                                                <use xlink:href="#icon-my-properties"></use>
                                            </svg>
                                        </span>
                                        <span class="sidebar-item-text">Yêu thích</span>
                                        <span
                                            class="sidebar-item-number ml-auto text-primary fs-15 font-weight-bold">{{ $favouriteCount }}</span>
                                    </a>
                                </li>

                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="#"
                                        class="text-heading lh-1 sidebar-link d-flex align-items-center">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                            <svg class="icon icon-save-search">
                                                <use xlink:href="#icon-save-search"></use>
                                            </svg>
                                        </span>
                                        <span class="sidebar-item-text">Save Search</span>
                                        <span
                                            class="sidebar-item-number ml-auto text-primary fs-15 font-weight-bold">5</span>
                                    </a>
                                </li>
                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="#collapseCmt"
                                        class="text-heading lh-1 sidebar-link d-flex align-items-center"
                                        onclick="toggleDropdown('collapseCmt'); return false;">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                            <svg class="icon icon-my-properties">
                                                <use xlink:href="#icon-my-properties"></use>
                                            </svg>
                                        </span>
                                        <span class="sidebar-item-text">Đánh giá</span>
                                        <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                                    </a>
                                </li>
                                <div class="collapse-content" id="collapseCmt">
                                    <div class="card card-body border-0 bg-transparent py-0 pl-6">
                                        <ul class="list-group list-group-flush list-group-no-border">
                                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                                <a class="text-heading lh-1 sidebar-link"
                                                    href="{{ route('owners.danhgia') }}">Danh sách đánh giá</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                    <a href="#invoice_collapse"
                                        class="text-heading lh-1 sidebar-link d-flex align-items-center"
                                        onclick="toggleDropdown('invoiceBill'); return false;">
                                        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                            <i class="fal fa-file-invoice"></i>
                                        </span>
                                        <span class="sidebar-item-text">Hóa đơn</span>
                                        <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="collapse-content" id="invoiceBill">
                                <div class="card card-body border-0 bg-transparent py-0 pl-6">
                                    <ul class="list-group list-group-flush list-group-no-border">
                                        <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                            <a class="text-heading lh-1 sidebar-link"
                                                href="{{ route('owners.invoice-listing') }}">Danh sách hóa đơn</a>
                                        </li>
                                        <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                            <a class="text-heading lh-1 sidebar-link"
                                                href="{{ route('owners.invoice-create') }}">Thêm mới
                                                hóa đơn</a>
                                        </li>
                                        <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                            <a class="text-heading lh-1 sidebar-link"
                                                href="{{ route('owners.invoice-edit') }}">Chỉnh sửa hóa đơn</a>
                                        </li>
                                        {{-- <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                            <a class="text-heading lh-1 sidebar-link"
                                                href="{{ route('owners.invoice-preview') }}">Xem trước hóa đơn</a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endif

                    <li class="list-group-item pt-6 pb-4">
                        <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">QUẢN LÝ TÀI KHOẢN
                        </h5>
                        <ul class="list-group list-group-no-border rounded-lg">

                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ route('owners.profile.resigter-owner') }}"
                                    class="text-heading lh-1 sidebar-link d-flex align-items-center">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                        <svg class="icon icon-heart">
                                            <use xlink:href="#icon-heart"></use>
                                        </svg>
                                    </span>
                                    <span class="sidebar-item-text">Người đưa tin</span>
                                </a>
                            </li>
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ route('owners.profile.resigter-ekyc') }}"
                                    class="text-heading lh-1 sidebar-link d-flex align-items-center">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                        <svg class="icon icon-heart">
                                            <use xlink:href="#icon-heart"></use>
                                        </svg>
                                    </span>
                                    <span class="sidebar-item-text">Đăng ký eKYC</span>
                                </a>
                            </li>
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ Route('owners.favorites') }}"
                                    class="text-heading lh-1 sidebar-link d-flex align-items-center">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                        <svg class="icon icon-heart">
                                            <use xlink:href="#icon-heart"></use>
                                        </svg>
                                    </span>
                                    <span class="sidebar-item-text">Yêu thích</span>
                                    <!-- Số lượng yêu thích nằm sau chữ "Yêu thích" -->
                                    <span
                                        class="sidebar-item-number text-primary fs-15 font-weight-bold ml-2">{{ $favouriteCount }}</span>
                                </a>
                            </li>
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ Route('owners.chat-owners') }}"
                                    class="text-heading lh-1 sidebar-link d-flex align-items-center">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                        <svg class="icon icon-heart">
                                            <use xlink:href="#icon-heart"></use>
                                        </svg>
                                    </span>
                                    <span class="sidebar-item-text">Chat</span>
                                    <!-- Số lượng yêu thích nằm sau chữ "Yêu thích" -->
                                    <span class="sidebar-item-number text-primary fs-15 font-weight-bold ml-2">
                                        <livewire:unread-message-count /></span>
                                </a>
                            </li>
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ route('owners.lich-su-giao-dich') }}"
                                    class="text-heading lh-1 sidebar-link">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                        <svg class="icon icon-my-profile">
                                            <use xlink:href="#icon-my-profile"></use>
                                        </svg>
                                    </span>
                                    <span class="sidebar-item-text">Lịch sử giao dịch</span>
                                </a>
                            </li>
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ route('owners.profile.profile-admin-index') }}"
                                    class="text-heading lh-1 sidebar-link">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                        <svg class="icon icon-my-profile">
                                            <use xlink:href="#icon-my-profile"></use>
                                        </svg>
                                    </span>
                                    <span class="sidebar-item-text">Thông tin tài khoản</span>
                                </a>
                            </li>
                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ route('client.home') }}" class="text-heading lh-1 sidebar-link">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                        <svg class="icon icon-my-profile">
                                            <use xlink:href="#icon-my-profile"></use>
                                        </svg>
                                    </span>
                                    <span class="sidebar-item-text">Về trang chủ</span>
                                </a>
                            </li>

                            <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                                <a href="{{ route('client.logout') }}" class="text-heading lh-1 sidebar-link"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                                        <svg class="icon icon-log-out">
                                            <use xlink:href="#icon-log-out"></use>
                                        </svg>
                                    </span>
                                    <span class="sidebar-item-text">Đăng xuất</span>
                                </a>
                                <form id="logout-form" action="{{ route('client.logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
{{-- Đừng đóng thẻ Div lại đóng lại hình như nó sai --}}
<div class="page-content">
    <header class="main-header shadow-none shadow-lg-xs-1 bg-white position-relative d-none d-xl-block">
        <div class="container-fluid">
            <nav class="navbar navbar-light py-0 row no-gutters px-3 px-lg-0">
                <div class="col-md-4 px-0 px-md-6 order-1 order-md-0">
                    <form>
                        <div class="input-group">
                            <div class="input-group-prepend mr-0">
                                <button class="btn border-0 shadow-none fs-20 text-muted p-0" type="submit"><i
                                        class="far fa-search"></i></button>
                            </div>
                            <input type="text" class="form-control border-0 bg-transparent shadow-none"
                                placeholder="Tìm  kiếm..." name="search">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex flex-wrap justify-content-md-end order-0 order-md-1">
                    <div class="dropdown border-md-right border-0 py-3 text-right">
                        <a href="#"
                            class="dropdown-toggle text-heading pr-3 pr-sm-6 d-flex align-items-center justify-content-end"
                            data-toggle="dropdown">
                            <div class="mr-4 w-48px">
                                @if ($user->image)
                                    <img src="{{ asset('assets/images/' . $user->image) }}"
                                        alt="{{ $user->name }}" class="hehe rounded-circle">
                                @else
                                    <img src="{{ asset('assets/images/nhan.jpg') }}" alt="Default Image"
                                        class="hehe rounded-circle">
                                @endif
                            </div>


                            <div class="fs-13 font-weight-500 lh-1">
                                Hồ sơ
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right w-100">
                            <a class="dropdown-item" href="{{ route('owners.profile.profile-admin-index') }}">Thông
                                tin</a>
                            <a class="dropdown-item"
                                href="{{ route('owners.profile.reset-password-admin-index') }}">Đổi mật khẩu</a>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                                xuất</a>
                        </div>
                    </div>


                    <div>
                        {{-- <div
                        class="dropdown no-caret py-3 px-3 px-sm-6 d-flex align-items-center justify-content-end notice">
                        <a href="#" class="dropdown-toggle text-heading fs-20 font-weight-500 lh-1"
                            data-toggle="dropdown">
                            <i class="far fa-bell"></i>
                            <span
                                class="badge badge-primary badge-circle badge-absolute font-weight-bold fs-13">1</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('owners.notification-owners') }}">danh sách thông
                                báo</a>
                            <a class="dropdown-item" href="#">Thao tác khác</a>
                            <a class="dropdown-item" href="#">Tùy chọn khác</a>
                        </div>
                    </div> --}}
                        <div
                            class="dropdown no-caret py-3 px-3 px-sm-6 d-flex align-items-center justify-content-end notice">
                            <a href="#" class="dropdown-toggle text-heading fs-20 font-weight-500 lh-1"
                                data-toggle="dropdown">
                                <i class="far fa-bell"></i>
                                <span class="badge badge-primary badge-circle badge-absolute font-weight-bold fs-13">
                                    {{ $unreadNotificationCount }}
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('owners.notification-owners') }}">Danh sách
                                    thông
                                    báo</a>
                                <a class="dropdown-item" href="#">Thao tác khác</a>
                                <a class="dropdown-item" href="#">Tùy chọn khác</a>
                            </div>
                        </div>
                    </div>
            </nav>
        </div>
    </header>
