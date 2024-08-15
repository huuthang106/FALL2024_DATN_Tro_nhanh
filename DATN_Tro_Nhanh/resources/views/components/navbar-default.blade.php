<div>
    <div class="modal fade login-register login-register-modal" id="login-register-modal" tabindex="-1" role="dialog"
        aria-labelledby="login-register-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 p-0">
                    <div class="nav nav-tabs row w-100 no-gutters" id="myTab" role="tablist">
                        <a class="nav-item col-sm-4 ml-0 nav-link pr-6 py-4 pl-9 active fs-18" id="login-tab"
                            data-toggle="tab" href="#login" role="tab" aria-controls="login"
                            aria-selected="true">Đăng nhập</a>
                        <a class="nav-item col-sm-3 ml-0 nav-link py-4 px-6 fs-18" id="register-tab" data-toggle="tab"
                            href="#register" role="tab" aria-controls="register" aria-selected="false">Đăng
                            ký</a>
                        <div class="nav-item col-sm-5 ml-0 d-flex align-items-center justify-content-end">
                            <button type="button" class="close m-0 fs-23" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body p-4 py-sm-7 px-sm-8">
                    <div class="tab-content shadow-none p-0" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel"
                            aria-labelledby="login-tab">
                            <form class="form">
                                <div class="form-group mb-4">
                                    <label for="username" class="sr-only">Tên đăng nhập</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18"
                                                id="inputGroup-sizing-lg">
                                                <i class="far fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                            id="username" name="username" required
                                            placeholder="Tên đăng nhập / Email của bạn">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Mật khẩu</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control border-0 shadow-none fs-13"
                                            id="password" name="password" required placeholder="Mật khẩu">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                                <i class="far fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="remember-me"
                                            name="remember-me">
                                        <label class="form-check-label" for="remember-me">
                                            Nhớ mật khẩu
                                        </label>
                                    </div>
                                    <a href="password-recovery.html" class="d-inline-block ml-auto text-orange fs-15">
                                        Quên mật khẩu?
                                    </a>
                                </div>
                                <div class="d-flex p-2 border re-capchar align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="verify"
                                            name="verify">
                                        <label class="form-check-label" for="verify">
                                            Tôi không phải là robot
                                        </label>
                                    </div>
                                    <a href="#" class="d-inline-block ml-auto">
                                        <img src="{{ asset('assets/images/re-captcha.png') }}" alt="Re-capcha">
                                    </a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
                            </form>
                            <div class="divider text-center my-2">
                                <span class="px-4 bg-white lh-17 text">
                                    hoặc tiếp tục với
                                </span>
                            </div>
                            <div class="row no-gutters mx-n2">
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block facebook text-white px-0">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block google px-0">
                                        <img src="{{ asset('assets/images/google.png') }}" alt="Google">
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block twitter text-white px-0">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form class="form">
                                <div class="form-group mb-4">
                                    <label for="full-name" class="sr-only">Họ và tên</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-address-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                            id="full-name" name="full-name" required placeholder="Họ và tên">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="username01" class="sr-only">Tên đăng nhập</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                            id="username01" name="username01" required
                                            placeholder="Tên đăng nhập / Email của bạn">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password01" class="sr-only">Mật khẩu</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control border-0 shadow-none fs-13"
                                            id="password01" name="password01" required placeholder="Mật khẩu">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                                <i class="far fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <p class="form-text">Tối thiểu 8 ký tự, bao gồm 1 số và 1 chữ cái</p>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng ký</button>
                            </form>
                            <div class="divider text-center my-2">
                                <span class="px-4 bg-white lh-17 text">
                                    hoặc tiếp tục với
                                </span>
                            </div>
                            <div class="row no-gutters mx-n2">
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block facebook text-white px-0">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block google px-0">
                                        <img src="{{ asset('assets/images/google.png') }}" alt="Google">
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block twitter text-white px-0">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-2">Bằng cách tạo tài khoản, bạn đồng ý với <a class="text-heading"
                                    href="#"><u>Các điều khoản sử dụng</u></a> và <a class="text-heading"
                                    href="#"><u>Chính sách bảo mật</u></a> của HomeID.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade login-register login-register-modal" id="login-register-modal" tabindex="-1"
        role="dialog" aria-labelledby="login-register-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 p-0">
                    <div class="nav nav-tabs row w-100 no-gutters" id="myTab" role="tablist">
                        <a class="nav-item col-sm-3 ml-0 nav-link pr-6 py-4 pl-9 active fs-18" id="login-tab"
                            data-toggle="tab" href="#login" role="tab" aria-controls="login"
                            aria-selected="true">Login</a>
                        <a class="nav-item col-sm-3 ml-0 nav-link py-4 px-6 fs-18" id="register-tab"
                            data-toggle="tab" href="#register" role="tab" aria-controls="register"
                            aria-selected="false">Register</a>
                        <div class="nav-item col-sm-6 ml-0 d-flex align-items-center justify-content-end">
                            <button type="button" class="close m-0 fs-23" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body p-4 py-sm-7 px-sm-8">
                    <div class="tab-content shadow-none p-0" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel"
                            aria-labelledby="login-tab">
                            <form class="form">
                                <div class="form-group mb-4">
                                    <label for="username" class="sr-only">Username</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18"
                                                id="inputGroup-sizing-lg">
                                                <i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                            id="username" name="username" required
                                            placeholder="Username / Your email">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                            id="password" name="password" required placeholder="Password">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                                <i class="far fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="remember-me" name="remember-me">
                                        <label class="form-check-label" for="remember-me">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="password-recovery.html" class="d-inline-block ml-auto text-orange fs-15">
                                        Lost password?
                                    </a>
                                </div>
                                <div class="d-flex p-2 border re-capchar align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="verify" name="verify">
                                        <label class="form-check-label" for="verify">
                                            I'm not a robot
                                        </label>
                                    </div>
                                    <a href="#" class="d-inline-block ml-auto">
                                        <img src="{{ asset('assets/images/re-captcha.png') }}" alt="Re-capcha">
                                    </a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
                            </form>
                            <div class="divider text-center my-2">
                                <span class="px-4 bg-white lh-17 text">
                                    or continue with
                                </span>
                            </div>
                            <div class="row no-gutters mx-n2">
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block facebook text-white px-0">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block google px-0">
                                        <img src="{{ asset('assets/images/google.png') }}" alt="Google">
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block twitter text-white px-0">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form class="form">
                                <div class="form-group mb-4">
                                    <label for="full-name" class="sr-only">Full name</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                            id="full-name" name="full-name" required placeholder="Full name">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="username01" class="sr-only">Username</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                            id="username01" name="username01" required
                                            placeholder="Username / Your email">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password01" class="sr-only">Password</label>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                                                <i class="far fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow-none fs-13"
                                            id="password01" name="password01" required placeholder="Password">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                                <i class="far fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <p class="form-text">Minimum 8 characters with 1 number and 1 letter</p>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
                            </form>
                            <div class="divider text-center my-2">
                                <span class="px-4 bg-white lh-17 text">
                                    or continue with
                                </span>
                            </div>
                            <div class="row no-gutters mx-n2">
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block facebook text-white px-0">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block google px-0">
                                        <img src="{{ asset('assets/images/google.png') }}" alt="Google">
                                    </a>
                                </div>
                                <div class="col-4 px-2 mb-4">
                                    <a href="#" class="btn btn-lg btn-block twitter text-white px-0">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-2">By creating an account, you agree to HomeID
                                <a class="text-heading" href="#"><u>Terms of Use</u> </a> and
                                <a class="text-heading" href="#"><u>Privacy Policy</u></a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    <header class="main-header navbar-light header-sticky header-sticky-smart header-mobile-xl">
        <div class="sticky-area">
            <div class="container container-xxl">
                <nav class="navbar navbar-expand-xl px-0 w-100">
                    <a class="navbar-brand mr-7" href="index.html">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="HomeID"
                            class="d-none d-xl-inline-block">
                        <img src="{{ asset('assets/images/logo-white.png') }}" alt="HomeID"
                            class="d-inline-block d-xl-none">
                    </a>
                    <div class="d-flex d-xl-none ml-auto">
                        <a class="d-block mr-4 position-relative text-white p-2" href="#">
                            <i class="fal fa-heart fs-large-4"></i>
                            <span class="badge badge-primary badge-circle badge-absolute">1</span>
                        </a>
                        <button class="navbar-toggler border-0 px-0 ml-0" type="button" data-toggle="collapse"
                            data-target="#primaryMenu05" aria-controls="primaryMenu05" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="text-white fs-24"><i class="fal fa-bars"></i></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse mt-3 mt-xl-0 flex-grow-0" id="primaryMenu05">
                        <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">

                            <li id="navbar-item-listing" aria-haspopup="true" aria-expanded="false"
                                class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link dropdown-toggle p-0" href="listing.html" data-toggle="dropdown">
                                    Listing
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-xxl dropdown-menu-listing px-0 py-3"
                                    aria-labelledby="navbar-item-listing">
                                    <div class="dropdown-body">
                                        <div class="row no-gutters">

                                            <div class="col-xl-3">
                                                <!-- Heading -->
                                                <h4 class="dropdown-header text-dark fs-16 mb-2">
                                                    Grid view
                                                </h4>
                                                <!-- List -->
                                                <a class="dropdown-item" href="{{ route('client.room-listing') }}">
                                                    Danh sách trọ
                                                </a>
                                            </div>
                                            <div class="col-xl-3">
                                                <!-- Heading -->
                                                <h4 class="dropdown-header text-dark fs-16 mb-2">
                                                    Map style
                                                </h4>
                                                <!-- List -->
                                                <a class="dropdown-item"
                                                    href="{{ route('client.room-map-listing') }}">
                                                    Bản đồ trọ
                                                </a>
                                            </div>
                                            <div class="col-xl-3">
                                                <!-- Heading -->
                                                <h4 class="dropdown-header text-dark fs-16 mb-2">
                                                    Single Property
                                                </h4>
                                                <!-- List -->

                                                <a class="dropdown-item" href="{{ route('client.detail-room') }}">
                                                    Xem chi tiết
                                                </a>

                                            </div>
                                        </div>
                                        <!-- / .row -->
                                    </div>
                                </div>
                            </li>
                            <li id="navbar-item-dashboard" aria-haspopup="true" aria-expanded="false"
                                class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link dropdown-toggle p-0" href="#" data-toggle="dropdown">
                                    Dashboard
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pt-3 pb-0 pb-xl-3" aria-labelledby="navbar-item-dashboard">
                                    <li class="dropdown-item">
                                        <a id="navbar-link-dashboard" class="dropdown-link"
                                            href="{{ route('profile.dashboard') }}">
                                            Trang quản lí
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-add-new-property" class="dropdown-link"
                                            href="dashboard-add-new-property.html">
                                            Add New Property
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-my-properties" class="dropdown-link"
                                            href="dashboard-my-properties.html">
                                            My Properties
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-my-favorites" class="dropdown-link"
                                            href="dashboard-my-favorites.html">
                                            My Favorites
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-save-search" class="dropdown-link"
                                            href="dashboard-save-search.html">
                                            Save Search
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-reviews" class="dropdown-link"
                                            href="dashboard-reviews.html">
                                            Reviews
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-my-package" class="dropdown-link"
                                            href="dashboard-my-packages.html">
                                            My Package
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-my-profile" class="dropdown-link"
                                            href="dashboard-my-profiles.html">
                                            My Profile
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-signup-and-login" class="dropdown-link"
                                            href="signup-and-login.html">
                                            Signup and login
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-password-recovery" class="dropdown-link"
                                            href="password-recovery.html">
                                            Password Recovery
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li id="navbar-item-pages" aria-haspopup="true" aria-expanded="false"
                                class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link dropdown-toggle p-0" href="#" data-toggle="dropdown">
                                    Pages
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pt-3 pb-0 pb-xl-3" aria-labelledby="navbar-item-pages">
                                    <li class="dropdown-item dropdown dropright">
                                        <a id="navbar-link-news" class="dropdown-link dropdown-toggle" href="#"
                                            data-toggle="dropdown">
                                            News
                                        </a>
                                        <ul class="dropdown-menu dropdown-submenu pt-3 pb-0 pb-xl-3"
                                            aria-labelledby="navbar-link-news">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link"
                                                    href="{{ route('client.client-blog') }}">Blog</a>
                                            </li>
                                            {{-- <li class="dropdown-item">
                                                <a class="dropdown-link" href="blog-grid.html">Blog grid</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="blog-grid-with-sidebar.html">Blog grid
                                                    with sidebar</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="blog-list-width-sidebar.html">Blog list
                                                    with sidebar</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="blog-details-1.html">Blog details 1</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="blog-details-2.html">Blog details 2</a>
                                            </li> --}}
                                        </ul>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-about-us" class="dropdown-link"
                                            href="{{ route('client-about') }}">
                                            Về chúng tôi
                                        </a>
                                    </li>
                                    <li class="dropdown-item dropdown dropright">
                                        <a id="navbar-link-service" class="dropdown-link"
                                            href="{{ route('client-service') }}">
                                            Dịch vụ
                                        </a>
                                    </li>
                                    <li class="dropdown-item dropdown dropright">
                                        <a id="navbar-link-contact-us" class="dropdown-link dropdown-toggle"
                                            href="#" data-toggle="dropdown">
                                            Contact us
                                        </a>
                                        <ul class="dropdown-menu dropdown-submenu pt-3 pb-0 pb-xl-3"
                                            aria-labelledby="navbar-link-contact-us">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="contact-us-1.html">Contact us 1</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="contact-us-2.html">Contact us 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-item dropdown dropright">
                                        <a id="navbar-link-agent" class="dropdown-link"
                                            href="{{ route('client.client-agent') }}">
                                            Người đăng tin
                                        </a>
                                    </li>
                                    <li class="dropdown-item dropdown dropright">
                                        <a id="navbar-link-agency" class="dropdown-link dropdown-toggle"
                                            href="#" data-toggle="dropdown">
                                            Agency
                                        </a>
                                        <ul class="dropdown-menu dropdown-submenu pt-3 pb-0 pb-xl-3"
                                            aria-labelledby="navbar-link-agency">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="agency-grid.html">Agency grid</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="agency-list.html">Agency list</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="agency-details-1.html">Agency details
                                                    1</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="agency-details-2.html">Agency details
                                                    2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-faqs" class="dropdown-link" href="faqs.html">
                                            FAQs
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-page-404" class="dropdown-link" href="page-404.html">
                                            Page 404
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-checkout" class="dropdown-link"
                                            href="{{ route('client.payment') }}">
                                            Thanh Toán
                                        </a>

                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-checkout" class="dropdown-link"
                                            href="{{ route('client.payment-sucessful') }}">
                                            Thanh toán thành công
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-compare" class="dropdown-link"
                                            href="compare-details.html">
                                            Compare
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a id="navbar-link-packages" class="dropdown-link" href="packages.html">
                                            Packages
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li id="navbar-item-docs" aria-haspopup="true" aria-expanded="false"
                                class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link dropdown-toggle p-0" href="#" data-toggle="dropdown">
                                    Docs
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu px-0 pt-3 dropdown-menu-docs">
                                    <div class="dropdown-body">
                                        <a class="dropdown-item py-1"
                                            href="docs/getting-started/dev-environment-setup.html">
                                            <div class="media">
                                                <div class="fs-20 mr-3">
                                                    <i class="fal fa-file-alt"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span class="d-block lh-15">Documentation</span>
                                                    <small class="d-block">Kick-start customization</small>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item py-1" href="docs/content/typography.html">
                                            <div class="media">
                                                <div class="fs-20 mr-3">
                                                    <i class="fal fa-layer-group"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span class="d-block lh-15">UI Kit<span
                                                            class="badge badge-danger ml-2">50+</span></span>
                                                    <small class="d-block">Flexible components</small>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item py-1" href="docs/getting-started/changelog.html">
                                            <div class="media">
                                                <div class="fs-20 mr-3">
                                                    <i class="fal fa-edit"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span class="d-block lh-15">Changelog<span
                                                            class="badge badge-success ml-2">v1.0.1</span></span>
                                                    <small class="d-block">Regular updates</small>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item py-1" href="https://sp.g5plus.net/" target="_blank">
                                            <div class="media">
                                                <div class="fs-20 mr-3">
                                                    <i class="fal fa-life-ring"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span class="d-block lh-15">Support</span>
                                                    <small class="d-block">https://sp.g5plus.net/</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="d-block d-xl-none">
                            <ul
                                class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle mr-md-2 pr-2 pl-0 pl-lg-2" href="#"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ENG
                                    </a>
                                    <div class="dropdown-menu dropdown-sm dropdown-menu-right">
                                        <a class="dropdown-item" href="#">VN</a>
                                        <a class="dropdown-item active" href="#">ENG</a>
                                        <a class="dropdown-item" href="#">ARB</a>
                                        <a class="dropdown-item" href="#">KR</a>
                                        <a class="dropdown-item" href="#">JN</a>
                                    </div>
                                </li>
                                {{-- <li class="nav-item ">
                                    <a class="nav-link pl-3 pr-2" data-toggle="" href="{{ route('login') }}">Đăng
                                        nhập</a>
                                </li> --}}
                                <ul
                                    class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link pl-3 pr-2" href="{{ route('login') }}">Đăng nhập</a>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                &nbsp;Xin chào, {{ Auth::user()->name }}
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                                <a class="dropdown-item" href="#">Hồ sơ</a>
                                                <a class="dropdown-item" href="#">Cài đặt</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Đăng xuất
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                                <li class="nav-item ml-auto w-100 w-sm-auto">
                                    <a class="btn btn-primary btn-lg" href="dashboard-add-new-property.html">
                                        Add listing
                                        <img src="{{ asset('assets/images/add-listing-icon.png') }}"
                                            alt="Add listing" class="ml-1">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ml-auto d-none d-xl-block">
                        <ul
                            class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle mr-md-2 pr-2 pl-0 pl-lg-2" href="#"
                                    id="bd-versions" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    ENG
                                </a>
                                <div class="dropdown-menu dropdown-sm dropdown-menu-right"
                                    aria-labelledby="bd-versions">
                                    <a class="dropdown-item" href="#">VN</a>
                                    <a class="dropdown-item active" href="#">ENG</a>
                                    <a class="dropdown-item" href="#">ARB</a>
                                    <a class="dropdown-item" href="#">KR</a>
                                    <a class="dropdown-item" href="#">JN</a>
                                </div>
                            </li>
                            {{-- <li class="nav-item ">
                                <a class="nav-link pl-3 pr-2" data-toggle="" href="{{ route('login') }}">Đăng
                                    nhập</a>
                            </li> --}}
                            <ul
                                class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                                <li class="nav-item ">
                                    @if (Auth::check())
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                        <li><a class="dropdown-item" href="#">Xem thông tin</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                               Đăng xuất
                                            </a>
                                        </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <a class="nav-link pl-3 pr-2" data-toggle="modal" href="#login-register-modal">SIGN
                                        IN</a>
                                        @endif
                                </li>
                            </ul>
                            <li class="nav-item mr-auto mr-lg-6">
                                <a class="nav-link px-2 position-relative" href="#">
                                    <i class="fal fa-heart fs-large-4"></i>
                                    <span class="badge badge-primary badge-circle badge-absolute">1</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-lg text-heading border bg-hover-primary border-hover-primary hover-white d-none d-lg-block"
                                    href="dashboard-add-new-property.html">
                                    Add listing
                                    <img src="{{ asset('assets/images/add-listing-icon-primary.png') }}"
                                        alt="Add listing" class="ml-1">
                                </a>
                                <a class="btn btn-primary btn-lg d-block d-lg-none"
                                    href="dashboard-add-new-property.html">
                                    Add listing
                                    <img src="{{ asset('assets/images/add-listing-icon.png') }}" alt="Add listing"
                                        class="ml-1">
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</div>
