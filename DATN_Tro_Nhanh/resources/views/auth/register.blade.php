{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.main')
@section('titleUs', 'Trang chủ trọ nhanh')
@section('contentUs')
    <main id="content">
        <section class="py-13 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card border-0 shadow-xxs-2 mb-6">
                            <div class="card-body px-8 py-6">
                                <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2 text-center">Đăng ký</h2>
                                <form method="POST" action="{{ route('client.register') }}">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="name">Họ và Tên</label>
                                        <input type="text" class="form-control form-control-lg border-0" id="name"
                                            name="name" placeholder="Tên của bạn" value="{{ old('name') }}" autofocus
                                            required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control-lg border-0" id="email"
                                            name="email" placeholder="Email của bạn" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password-1">Mật khẩu</label>
                                        <div class="input-group input-group-lg">
                                            <input type="password" class="form-control border-0 shadow-none fs-13"
                                                id="password-1" name="password" placeholder="Mật khẩu" required>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="re-password">Nhập lại mật khẩu</label>
                                        <div class="input-group input-group-lg">
                                            <input type="password" class="form-control border-0 shadow-none fs-13"
                                                id="re-password" name="password_confirmation"
                                                placeholder="Nhập lại mật khẩu" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Đăng ký</button>
                                </form>
                                <div class="divider text-center my-2">
                                    <span class="px-4 bg-white lh-17 text text-heading">
                                        hoặc Đăng ký bằng
                                    </span>
                                </div>
                                <div class="row no-gutters mx-n2">
                                    <div class="col-sm-6 px-2 mb-4">
                                        <a href="#"
                                            class="btn btn-lg btn-block text-heading border px-0 bg-hover-accent">
                                            <img src="{{ asset('assets/images/facebook.png') }}" alt="Facebook"
                                                class="mr-2">Facebook
                                        </a>
                                    </div>
                                    <div class="col-sm-6 px-2 mb-4">
                                        <a href="#"
                                            class="btn btn-lg btn-block text-heading border px-0 bg-hover-accent">
                                            <img src="{{ asset('assets/images/google.png') }}" alt="Google"> Google
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
    <title>Signup and Login - HomeID</title>
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
