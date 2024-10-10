{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.main')
@section('titleUs', 'Đặt Lại Mật Khẩu | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="py-13 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card border-0 shadow-xxs-2 mb-6">
                            <div class="card-body px-8 py-6">
                                <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2 text-center">Đăng Nhập</h2>
                                <p class="mb-4 text-center">Chưa có tài khoản? <a href="{{ route('client.register') }}"
                                        class="text-heading hover-primary"><u>Đăng ký</u></a></p>
                                {{-- <form class="form" method="POST" action="{{ route('password.store') }}">
                                    @csrf
                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="form-group mb-4">
                                        <label for="username-1">Email</label>
                                        <input type="text" class="form-control form-control-lg border-0" id="username-1"
                                            name="username" placeholder="Email của bạn">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password-2">Mật khẩu</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control border-0 shadow-none fs-13"
                                                id="password-2" name="password" placeholder="Mật khẩu">
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
                                                id="remember-me-1" name="remember">
                                            <label class="form-check-label" for="remember-me-1">
                                                Giữ đăng nhập
                                            </label>
                                        </div>
                                        <a href="password-recovery.html"
                                            class="d-inline-block ml-auto fs-13 lh-2 text-body">
                                            <u>Quên mật khẩu?</u>
                                        </a>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Đăng
                                        nhập</button>
                                </form> --}}
                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf

                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <!-- Email Address -->
                                    <div class="form-group mb-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-lg" id="email"
                                            name="email" value="{{ old('email', $request->email) }}"
                                            placeholder="Email của bạn" required autofocus>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- New Password -->
                                    <div class="form-group mb-4">
                                        <label for="password" class="form-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control form-control-lg" id="password"
                                            name="password" placeholder="Mật khẩu mới" required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Confirm New Password -->
                                    <div class="form-group mb-4">
                                        <label for="password_confirmation" class="form-label">Xác nhận mật khẩu
                                            mới</label>
                                        <input type="password" class="form-control form-control-lg"
                                            id="password_confirmation" name="password_confirmation"
                                            placeholder="Xác nhận mật khẩu mới" required>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded">
                                        Đặt lại mật khẩu
                                    </button>
                                </form>
                                <div class="divider text-center my-2">
                                    <span class="px-4 bg-white lh-17 text text-heading">
                                        hoặc Đăng nhập với
                                    </span>
                                </div>
                                <div class="row no-gutters mx-n2">
                                    <div class="col-sm-6 px-2 mb-4">
                                        <a href="#"
                                            class="btn btn-lg btn-block text-heading border px-0 bg-hover-accent">
                                            <img src="{{ asset('assets/images/facebook.png') }}" alt="Facebook"
                                                class="mr-2">
                                            Facebook
                                        </a>
                                    </div>
                                    <div class="col-sm-6 px-2 mb-4">
                                        <a href="{{ route('client.auth.google') }}"
                                            class="btn btn-lg btn-block text-heading border px-0 bg-hover-accent">
                                            <img src="{{ asset('assets/images/google.png') }}" alt="Google">
                                            Google
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('styleUs')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Đặt Lại Mật Khẩu | TRỌ NHANH</title>
    <!-- Google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome-pro-5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/timepicker/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dataTables/jquery.dataTables.min.css') }}">
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/images/logo-nav.png') }}">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Signup and Login">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="{{ asset('assets/images/homeid-social-logo.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ asset('assets/signup-and-login.html') }}">
    <meta property="og:title" content="Signup and Login">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/homeid-social.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endpush
@push('scriptUs')
    <script src="{{ asset('assets/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/counter/countUp.js') }}"></script>
    <script src="{{ asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropzone/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/hc-sticky/hc-sticky.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jparallax/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.js') }}"></script>
    <script src="{{ asset('assets/vendors/dataTables/jquery.dataTables.min.js') }}"></script>
    <!-- Theme scripts -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
@endpush
