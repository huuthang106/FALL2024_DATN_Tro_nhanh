<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @stack('styleUs')
    <!-- Fonts -->


</head>

<body>
    @if (Request::is('/'))
        <x-navbar-home />
    @else
        <x-navbar-default />
    @endif
    @yield('contentUs')
    <footer class="bg-dark pt-8 pb-6 footer text-muted">
        <div class="container container-xxl">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
                    <a class="d-block mb-2" href="#">
                        <img src="images/logo-white-primary.png" alt="HomeID">
                    </a>
                    <div class="lh-26 font-weight-500">
                        <p class="mb-0">58 Howard Street #2 San Francisco</p>
                        <a class="d-block text-muted hover-white"
                            href="mailto:contact@homeid.com">contact@homeid.com</a>
                        <a class="d-block text-lighter font-weight-bold fs-15 hover-white"
                            href="tel:(+68)122109876">(+68)1221
                            09876</a>
                        <a class="d-block text-muted hover-white" href=".">www.homeid.com</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 mb-6 mb-md-0">
                    <h4 class="text-white fs-16 my-4 font-weight-500">Popular Searches</h4>
                    <ul class="list-group list-group-flush list-group-no-border">
                        <li class="list-group-item bg-transparent p-0">
                            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Apartment for
                                Rent</a>
                        </li>
                        <li class="list-group-item bg-transparent p-0">
                            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Apartment Low to
                                hide</a>
                        </li>
                        <li class="list-group-item bg-transparent p-0">
                            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Offices for Buy</a>
                        </li>
                        <li class="list-group-item bg-transparent p-0">
                            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Offices for Rent</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-2 mb-6 mb-md-0">
                    <h4 class="text-white fs-16 my-4 font-weight-500">Quick links</h4>
                    <ul class="list-group list-group-flush list-group-no-border">
                        <li class="list-group-item bg-transparent p-0">
                            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Terms of Use</a>
                        </li>
                        <li class="list-group-item bg-transparent p-0">
                            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Privacy Policy</a>
                        </li>
                        <li class="list-group-item bg-transparent p-0">
                            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Contact Support</a>
                        </li>
                        <li class="list-group-item bg-transparent p-0">
                            <a href="#" class="text-muted lh-26 hover-white font-weight-500">Careers</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
                    <h4 class="text-white fs-16 my-4 font-weight-500">Sign Up for Our Newsletter</h4>
                    <p class="font-weight-500 text-muted lh-184">Lorem ipsum dolor sit amet, consecte tur cing elit.
                        Suspe ndisse suscipit sagittis </p>
                    <form>
                        <div class="input-group input-group-lg mb-6">
                            <input type="email" name="email"
                                class="form-control bg-white shadow-none border-0 z-index-1" placeholder="Your email">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Subscribe</button>
                            </div>
                        </div>
                    </form>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-0">
                            <a href="#" class="text-white opacity-3 fs-25 px-4 opacity-hover-10"><i
                                    class="fab fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item mr-0">
                            <a href="#" class="text-white opacity-3 fs-25 px-4 opacity-hover-10"><i
                                    class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item mr-0">
                            <a href="#" class="text-white opacity-3 fs-25 px-4 opacity-hover-10"><i
                                    class="fab fa-skype"></i></a>
                        </li>
                        <li class="list-inline-item mr-0">
                            <a href="#" class="text-white opacity-3 fs-25 px-4 opacity-hover-10"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-0 mt-md-10 row">
                <ul class="list-inline mb-0 col-md-6 mr-auto">
                    <li class="list-inline-item mr-6">
                        <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Terms of Use</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Privacy Policy</a>
                    </li>
                </ul>
                <p class="col-md-auto mb-0 text-muted">
                    © 2020 homeID. All Rights Reserved
                </p>
            </div>
        </div>
    </footer>
</body>
@stack('scriptUs')

</html>
