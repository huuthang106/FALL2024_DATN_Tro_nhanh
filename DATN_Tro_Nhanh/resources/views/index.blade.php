@extends('layouts.main')
@section('titleUs', 'Trang chủ trọ nhanh')
@section('contentUs')
  <main id="content">
    <section class="position-relative bg-gray-02 vh-100 landing-banner d-flex align-items-center py-lg-13 overflow-hidden">
      <div class="container-fluid">
        <div class="mxw-670 text-center py-10 py-lg-13 position-relative z-index-2">
          <h1 class="display-3 text-heading mb-4 lh-13" data-animate="fadeInDown">Powerful Solution<br>
            for Real Estate Company</h1>
          <p class="fs-16 mb-6 px-lg-8 text-landing" data-animate="fadeInDown"><span
              class="text-heading font-weight-500">HomeID - Your Ultimate Real Estate WordPress Theme</span> that
            lets
            you run a realtor company, a
            real estate agency, a broker, agents and related businesses.</p>
          <div class="row justify-content-center no-gutters" data-animate="fadeInUp">
            <div class="col-sm-6 text-sm-right px-2 mb-2 mb-sm-0">
              <a href="#demos" class="btn btn-primary btn-lg">HomeID demos</a>
            </div>
            <div class="col-sm-6 px-2 text-sm-left">
              <a href="#" class="btn btn-lg border text-heading bg-hover-accent d-inline-flex align-items-center">
                <span class="text-primary d-inline-block lh-1 fs-24 mr-1"><i
                    class="fal fa-play-circle"></i></span>
                Watch video
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="d-none d-xl-block">
    <div class="layer position-absolute z-index-1 d-none d-xxl-block" style="top:8%;left:-160px">
        <img src="{{ asset('images/banner-landing-01.png') }}" alt="Banner Landing 01">
    </div>
    <div class="layer position-absolute z-index-1 d-block d-xxl-none" style="top:8%;left:-100px">
        <img src="{{ asset('images/banner-landing-01-sm.png') }}" alt="Banner Landing 01">
    </div>
    <div class="layer position-absolute z-index-1" style="top:60%;left:5%">
        <div class="position-relative">
            <img src="{{ asset('images/banner-landing-02.png') }}" alt="Banner Landing 02" class="d-none d-xxl-block">
            <img src="{{ asset('images/banner-landing-02-sm.png') }}" alt="Banner Landing 02" class="d-block d-xxl-none">
            <div class="position-absolute" style="right:-30px;top:-30px">
                <img src="{{ asset('images/banner-landing-03.png') }}" alt="Banner Landing 03" class="d-none d-xxl-block">
                <img src="{{ asset('images/banner-landing-03-sm.png') }}" alt="Banner Landing 03" class="d-block d-xxl-none">
            </div>
        </div>
    </div>
    <div class="layer position-absolute z-index-1 d-none d-xxl-block" style="top:13%;right:10%">
        <div class="position-relative">
            <img src="{{ asset('images/banner-landing-04.png') }}" alt="Banner Landing 04">
            <div class="position-absolute" style="left:-3px;top:-10px">
                <img src="{{ asset('images/banner-landing-05.png') }}" alt="Banner Landing 05">
            </div>
        </div>
    </div>
    <div class="layer position-absolute z-index-1 d-block d-xxl-none" style="top:13%;right:8%">
        <div class="position-relative">
            <img src="{{ asset('images/banner-landing-04-sm.png') }}" alt="Banner Landing 04">
            <div class="position-absolute" style="left:-3px;top:-10px">
                <img src="{{ asset('images/banner-landing-05-sm.png') }}" alt="Banner Landing 05">
            </div>
        </div>
    </div>
    <div class="layer position-absolute z-index-1 d-none d-xxl-block" style="top:40%;right:-100px">
        <div class="position-relative">
            <img src="{{ asset('images/banner-landing-06.png') }}" alt="Banner Landing 06">
            <div class="position-absolute" style="bottom:-100px;left:-35px">
                <img src="{{ asset('images/banner-landing-07.png') }}" alt="Banner Landing 07">
            </div>
        </div>
    </div>
    <div class="layer position-absolute z-index-1 d-block d-xxl-none" style="top:40%;right:-100px">
        <div class="position-relative">
            <img src="{{ asset('images/banner-landing-06-sm.png') }}" alt="Banner Landing 06">
            <div class="position-absolute" style="bottom:-33px;left:-23px">
                <img src="{{ asset('images/banner-landing-07-sm.png') }}" alt="Banner Landing 07">
            </div>
        </div>
    </div>
    <div class="layer position-absolute z-index-1 d-none d-xxl-block" style="bottom:5%;right:26%">
        <img src="{{ asset('images/banner-landing-08.png') }}" alt="Banner Landing 08">
    </div>
    <div class="layer position-absolute z-index-1 d-block d-xxl-none" style="bottom:0%;right:26%">
        <img src="{{ asset('images/banner-landing-08-sm.png') }}" alt="Banner Landing 08">
    </div>
</div>

    </section>
    <section id="demos" style="background-color: #e9edf2">
      <div class="bg-gray-02 mb-n1">
        <div class="pt-8 rounded-top-33" style="background-color: #080c42"></div>
      </div>
      <div class="rounded-bottom-33 pb-lg-6 pb-4" style="background-color: #080c42">
        <div class="text-center mb-9">
          <div class="position-relative d-inline-block pb-6 pt-10">
            <p class="text-primary fs-20 font-weight-bold mb-3 mb-sm-6">Introduction</p>
            <h2 class="fs-36 fs-sm-44 text-white">HomeID Demos</h2>
            <span class="position-absolute fs-250 text-white font-weight-bold opacity-005 lh-1 pos-fixed-top-center">01</span>
          </div>
        </div>
        <div class="container container-xxl">
    <div class="row mx-xl-n6">
        <div class="col-lg-4 col-sm-6 box-shadow-lg-5 px-xl-6 mb-9" data-animate="fadeInUp">
        <a href="{{ route('home') }}" class="hover-shine d-block">

                <img src="{{ asset('images/home-landing-01.jpg') }}" class="rounded-lg" alt="Home 01">
            </a>
            <h4 class="mt-lg-7 mt-5 mb-0 text-center">
            <a href="{{ route('home') }}" class="hover-shine d-block">

            </h4>
        </div>
        <div class="col-lg-4 col-sm-6 box-shadow-lg-5 px-xl-6 mb-9" data-animate="fadeInUp">
            <a href="home-02.html" class="hover-shine d-block">
                <img src="{{ asset('images/home-landing-02.jpg') }}" class="rounded-lg" alt="Home 02">
            </a>
            <h4 class="mt-lg-7 mt-5 mb-0 text-center">
                <a class="fs-20 text-white lh-16" href="home-02.html">Home 02</a>
            </h4>
        </div>
        <div class="col-lg-4 col-sm-6 box-shadow-lg-5 px-xl-6 mb-9" data-animate="fadeInUp">
            <a href="home-03.html" class="hover-shine d-block">
                <img src="{{ asset('images/home-landing-03.jpg') }}" class="rounded-lg" alt="Home 03">
            </a>
            <h4 class="mt-lg-7 mt-5 mb-0 text-center">
                <a class="fs-20 text-white lh-16" href="home-03.html">Home 03</a>
            </h4>
        </div>
        <div class="col-lg-4 col-sm-6 box-shadow-lg-5 px-xl-6 mb-9" data-animate="fadeInUp">
            <a href="home-04.html" class="hover-shine d-block">
                <img src="{{ asset('images/home-landing-04.jpg') }}" class="rounded-lg" alt="Home 04">
            </a>
            <h4 class="mt-lg-7 mt-5 mb-0 text-center">
                <a class="fs-20 text-white lh-16" href="home-04.html">Home 04</a>
            </h4>
        </div>
        <div class="col-lg-4 col-sm-6 box-shadow-lg-5 px-xl-6 mb-9" data-animate="fadeInUp">
            <a href="home-05.html" class="hover-shine d-block">
                <img src="{{ asset('images/home-landing-05.jpg') }}" class="rounded-lg" alt="Home 05">
            </a>
            <h4 class="mt-lg-7 mt-5 mb-0 text-center">
                <a class="fs-20 text-white lh-16" href="home-05.html">Home 05</a>
            </h4>
        </div>
        <div class="col-lg-4 col-sm-6 box-shadow-lg-5 px-xl-6 mb-9" data-animate="fadeInUp">
            <a href="home-06.html" class="hover-shine d-block">
                <img src="{{ asset('images/home-landing-06.jpg') }}" class="rounded-lg" alt="Home 06">
            </a>
            <h4 class="mt-lg-7 mt-5 mb-0 text-center">
                <a class="fs-20 text-white lh-16" href="home-06.html">Home 06</a>
            </h4>
        </div>
        <div class="col-lg-4 col-sm-6 box-shadow-lg-5 px-xl-6 mb-9" data-animate="fadeInUp">
            <a href="home-07.html" class="hover-shine d-block">
                <img src="{{ asset('images/home-landing-07.jpg') }}" class="rounded-lg" alt="Home 07">
            </a>
            <h4 class="mt-lg-7 mt-5 mb-0 text-center">
                <a class="fs-20 text-white lh-16" href="home-07.html">Home 07</a>
            </h4>
        </div>
        <div class="col-lg-4 col-sm-6 box-shadow-lg-5 px-xl-6 mb-9" data-animate="fadeInUp">
            <a href="home-08.html" class="hover-shine d-block">
                <img src="{{ asset('images/home-landing-08.jpg') }}" class="rounded-lg" alt="Home 08">
            </a>
            <h4 class="mt-lg-7 mt-5 mb-0 text-center">
                <a class="fs-20 text-white lh-16" href="home-08.html">Home 08</a>
            </h4>
        </div>
        <div class="col-lg-4 col-sm-6 box-shadow-lg-5 px-xl-6 mb-9" data-animate="fadeInUp">
            <a href="#" class="hover-shine d-block">
                <img src="{{ asset('images/home-landing-09.jpg') }}" class="rounded-lg" alt="New Demos <br/>are Coming Soon !">
            </a>
            <h4 class="mt-lg-7 mt-5 mb-0 text-center">
                <a class="fs-20 text-white lh-16" href="#">New Demos <br />are Coming Soon !</a>
            </h4>
        </div>
    </div>
</div>

      </div>
    </section>
    <section class="py-lg-11 py-8 bg-landing-featur-01">
      <div class="container container-xxl">
        <div class="position-relative mt-2 w-100 h-250">
          <p class="position-absolute pos-fixed-center z-index-1 text-white fs-250 font-weight-bold opacity-6 lh-1">
            02
          </p>
          <div class="position-absolute pos-fixed-center z-index-1 text-center mxw-411 mx-auto">
            <p class="text-primary fs-20 font-weight-bold lh-13 mb-3 mb-sm-6">Features</p>
            <h2 class="fs-36 fs-sm-44 text-secondary lh-143 mb-0">Features
              <br>
              You Will Love
            </h2>
          </div>
        </div>
        <p class="text-landing lh-188 text-center mxw-545 mx-auto fs-16 mb-lg-13 mb-9">Every most <span
            class="text-heading font-weight-500">optimized features</span> are integrated into HomeID to help you
          find your dream home.</p>
          <div class="row mx-xl-n6">
    <div class="col-lg-4 col-sm-6 px-xl-6 pb-xl-9 pb-6" data-animate="fadeInUp">
        <div class="card border-0 text-center shadow-lg-6 border-radius-10 hover-to-top overflow-hidden">
            <img class="card-img" src="{{ asset('images/landing-feature-01.jpg') }}" alt="Compare Property">
            <div class="card-body py-7 px-xxl-7 border-top position-relative mh-sm-243">
                <img class="custom-img-ft-landing position-absolute" src="{{ asset('images/icon-landing-feature-01.png') }}" alt="icon">
                <h3 class="fs-20 text-heading mb-2 mt-1">Compare Property</h3>
                <p class="text-landing fs-15 lh-187 mb-0">This function allows the audience to compare properties by its features, price and detailed information to find their dream home.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 px-xl-6 pb-xl-9 pb-6" data-animate="fadeInUp">
        <div class="card border-0 text-center shadow-lg-6 border-radius-10 hover-to-top overflow-hidden">
            <img class="card-img" src="{{ asset('images/landing-feature-02.jpg') }}" alt="Mortgage Calculator">
            <div class="card-body py-7 px-xxl-7 border-top position-relative mh-sm-243">
                <img class="custom-img-ft-landing position-absolute" src="{{ asset('images/icon-landing-feature-02.png') }}" alt="icon">
                <h3 class="fs-20 text-heading mb-2 mt-1">Mortgage Calculator</h3>
                <p class="text-landing fs-15 lh-187 mb-0">Each property page will have a finance widget to help the audience easily calculate mortgage payment in order to have a proper financial decision.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 px-xl-6 pb-xl-9 pb-6" data-animate="fadeInUp">
        <div class="card border-0 text-center shadow-lg-6 border-radius-10 hover-to-top overflow-hidden">
            <img class="card-img" src="{{ asset('images/landing-feature-03.jpg') }}" alt="Google Analytic Integration">
            <div class="card-body py-7 px-xxl-7 border-top position-relative mh-sm-243">
                <img class="custom-img-ft-landing position-absolute" src="{{ asset('images/icon-landing-feature-03.png') }}" alt="icon">
                <h3 class="fs-20 text-heading mb-2 mt-1">Google Analytic Integration</h3>
                <p class="text-landing fs-15 lh-187 mb-0">Agencies or property owners can observe and manage the number of visits on each property to make necessary changes if needed.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 px-xl-6 pb-xl-9 pb-6" data-animate="fadeInUp">
        <div class="card border-0 text-center shadow-lg-6 border-radius-10 hover-to-top overflow-hidden">
            <img class="card-img" src="{{ asset('images/landing-feature-04.jpg') }}" alt="Wishlist">
            <div class="card-body py-7 px-xxl-7 border-top position-relative mh-sm-243">
                <img class="custom-img-ft-landing position-absolute" src="{{ asset('images/icon-landing-feature-04.png') }}" alt="icon">
                <h3 class="fs-20 text-heading mb-2 mt-1">Wishlist</h3>
                <p class="text-landing fs-15 lh-187 mb-0">The audience can save their favorite property into the wishlist, arrange them as they want and open faster on the next visits.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 px-xl-6 pb-xl-9 pb-6" data-animate="fadeInUp">
        <div class="card border-0 text-center shadow-lg-6 border-radius-10 hover-to-top overflow-hidden">
            <img class="card-img" src="{{ asset('images/landing-feature-05.jpg') }}" alt="Agents & Agencies">
            <div class="card-body py-7 px-xxl-7 border-top position-relative mh-sm-243">
                <img class="custom-img-ft-landing position-absolute" src="{{ asset('images/icon-landing-feature-05.png') }}" alt="icon">
                <h3 class="fs-20 text-heading mb-2 mt-1">Agents & Agencies</h3>
                <p class="text-landing fs-15 lh-187 mb-0">Users can register as an agency or agent (approved by admin) and have their own dashboard to manage personal information and add properties.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 px-xl-6 pb-xl-9 pb-6" data-animate="fadeInUp">
        <div class="card border-0 text-center shadow-lg-6 border-radius-10 hover-to-top overflow-hidden">
            <img class="card-img" src="{{ asset('images/landing-feature-06.jpg') }}" alt="Mobile Friendly">
            <div class="card-body py-7 px-xxl-7 border-top position-relative mh-sm-243">
                <img class="custom-img-ft-landing position-absolute" src="{{ asset('images/icon-landing-feature-06.png') }}" alt="icon">
                <h3 class="fs-20 text-heading mb-2 mt-1">Mobile Friendly</h3>
                <p class="text-landing fs-15 lh-187 mb-0">HomeID is retina ready and fully responsive that allows all users to access the site from any browser without mistakes.</p>
            </div>
        </div>
    </div>
</div>

      </div>
    </section>
 
  <div class="container container-xxl">
    <div class="row">
      <div class="col-xl-5 mb-8 mb-xl-0" data-animate="fadeInLeft">
        <div class="row align-items-center">
          <div class="col-sm-6 col-xl-12">
            <h2 class="fs-36 fs-md-44 lh-143 mb-7 text-center text-sm-left">
              The Property<br>
              Detail Page includes<br>
              the following Features
            </h2>
          </div>
          <div class="col-sm-6 col-xl-12 ml-n4 text-center text-sm-right text-xl-left">
            <img src="{{ asset('images/property-details-landing.png') }}" alt="The Property Detail Page includes the following Features">
          </div>
        </div>
      </div>
      <div class="col-xl-7" data-animate="fadeInRight">
        <div class="row">
          <div class="col-sm-6 mb-7">
            <div class="media">
              <img src="{{ asset('images/icon-property-details-01.png') }}" alt="Schedule Property Tour" class="mr-5">
              <div class="media-body">
                <h4 class="fs-20 text-dark lh-16 mb-2">Schedule Property Tour</h4>
                <p class="text-landing fs-15">Visitors can schedule an appointment online and arrange a property viewing easily with our schedule function.</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-7">
            <div class="media">
              <img src="{{ asset('images/icon-property-details-04.png') }}" alt="Floor Plans" class="mr-5">
              <div class="media-body">
                <h4 class="fs-20 text-dark lh-16 mb-2">Floor Plans</h4>
                <p class="text-landing fs-15">Each floor plan can be uploaded on the single property page to provide the audience with additional information of size, the number of rooms…</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-9">
            <div class="media">
              <img src="{{ asset('images/icon-property-details-02.png') }}" alt="360 Virtual Tour" class="mr-5">
              <div class="media-body">
                <h4 class="fs-20 text-dark lh-16 mb-2">360 Virtual Tour</h4>
                <p class="text-landing fs-15">A convenient way to help the audience to have an overview of the property online right in the single property page.</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-9">
            <div class="media">
              <img src="{{ asset('images/icon-property-details-05.png') }}" alt="Nearby Listings" class="mr-5">
              <div class="media-body">
                <h4 class="fs-20 text-dark lh-16 mb-2">Nearby Listings</h4>
                <p class="text-landing fs-15">Providing your customer with an overview of the property’s nearby area such as school, store, hospital…</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-7">
            <div class="media">
              <img src="{{ asset('images/icon-property-details-03.png') }}" alt="Google Analytics Integration" class="mr-5">
              <div class="media-body">
                <h4 class="fs-20 text-dark lh-16 mb-2">Google Analytics Integration</h4>
                <p class="text-landing fs-15">This function allows admin to control the statistics of the property such as the number of views in that property page.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <section id="listing" class="pt-9 pb-15 bg-landing-listing">
      <div class="text-center">
        <div class="position-relative d-inline-block pb-5 pt-10">
          <div class="position-relative z-index-1">
            <p class="text-primary fs-20 font-weight-bold mb-3 mb-sm-6">19+ Premade</p>
            <h2 class=" fs-36 fs-sm-44 text-secondary">Premade Listings Styles</h2>
          </div>
          <span class="position-absolute fs-250 text-white font-weight-bold opacity-42 lh-1 pos-fixed-top-center">03</span>
        </div>
      </div>
      <ul class="nav nav-pills mb-1 tabs-03 text-dark justify-content-center mb-12" id="pills-tab" role="tablist">
        <li class="nav-item pr-xl-11 pr-6" role="presentation">
          <a class="nav-link active letter-spacing-1 px-0 py-1 text-uppercase" id="pills-all-tab" data-toggle="pill"
            href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a>
        </li>
        <li class="nav-item pr-xl-11 pr-6" role="presentation">
          <a class="nav-link letter-spacing-1 px-0 py-1 text-uppercase" id="pills-list-tab" data-toggle="pill"
            href="#pills-list" role="tab" aria-controls="pills-list" aria-selected="false">list Layout</a>
        </li>
        <li class="nav-item pr-xl-11 pr-6" role="presentation">
          <a class="nav-link letter-spacing-1 px-0 py-1 text-uppercase" id="pills-grid-tab" data-toggle="pill"
            href="#pills-grid" role="tab" aria-controls="pills-grid" aria-selected="false">Grid Layout</a>
        </li>
        <li class="nav-item pr-xl-11 pr-6" role="presentation">
          <a class="nav-link letter-spacing-1 px-0 py-1 text-uppercase" id="pills-map-tab" data-toggle="pill"
            href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Map Layout</a>
        </li>
      </ul>
      <div class="tab-content p-0 shadow-none" id="pills-tabContent">
        <div class="tab-pane fade  show active "
          id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
          <div class="slick-slider custom-slider-1 custom-dots-center mx-0 mb-lg-2"
     data-slick-options='{"slidesToShow": 3,"dots":true,"arrows":false,"infinite":true,"centerMode":true,"centerPadding":"200px","responsive":[{"breakpoint": 1200,"settings": {"centerMode":false}},{"breakpoint": 992,"settings": {"slidesToShow":2,"centerMode":false}},{"breakpoint": 576,"settings": {"slidesToShow":1,"centerMode":false}}]}'>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-full-width-list.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/list-landing-01.jpg') }}" alt="Full Width List">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-full-width-list.html"
          class="fs-20 text-heading hover-primary">Full Width List</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-with-left-filter.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/list-landing-02.jpg') }}" alt="List With Left Filter">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-with-left-filter.html"
          class="fs-20 text-heading hover-primary">List With Left Filter</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-with-right-filter.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/list-landing-03.jpg') }}" alt="List With Right Filter">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-with-right-filter.html"
          class="fs-20 text-heading hover-primary">List With Right Filter</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-with-left-sidebar.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/list-landing-04.jpg') }}" alt="List with left sidebar">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-with-left-sidebar.html"
          class="fs-20 text-heading hover-primary">List with left sidebar</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-with-right-sidebar.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/list-landing-05.jpg') }}" alt="List with right sidebar">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-with-right-sidebar.html"
          class="fs-20 text-heading hover-primary">List with right sidebar</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-half-map-list-layout-1.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/map-landing-01.jpg') }}" alt="Half map list layout 1">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-half-map-list-layout-1.html"
          class="fs-20 text-heading hover-primary">Half map list layout 1</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-half-map-list-layout-2.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/map-landing-02.jpg') }}" alt="Half map list layout 2">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-half-map-list-layout-2.html"
          class="fs-20 text-heading hover-primary">Half map list layout 2</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-half-map-grid-layout-1.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/map-landing-03.jpg') }}" alt="Half map grid layout 1">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-half-map-grid-layout-1.html"
          class="fs-20 text-heading hover-primary">Half map grid layout 1</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-half-map-grid-layout-2.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/map-landing-04.jpg') }}" alt="Half map grid layout 2">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-half-map-grid-layout-2.html"
          class="fs-20 text-heading hover-primary">Half map grid layout 2</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-full-map-1.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/map-landing-05.jpg') }}" alt="Full map 1">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-full-map-1.html"
          class="fs-20 text-heading hover-primary">Full map 1</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-full-map-2.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/map-landing-06.jpg') }}" alt="Full map 2">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-full-map-2.html"
          class="fs-20 text-heading hover-primary">Full map 2</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-full-map-with-sidebar.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/map-landing-07.jpg') }}" alt="Full Map with sidebar">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-full-map-with-sidebar.html"
          class="fs-20 text-heading hover-primary">Full Map with sidebar</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-full-width-grid-1.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/grid-landing-01.jpg') }}" alt="Full width grid 1">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-full-width-grid-1.html"
          class="fs-20 text-heading hover-primary">Full width grid 1</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-full-width-grid-2.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/grid-landing-02.jpg') }}" alt="Full width grid 2">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-full-width-grid-2.html"
          class="fs-20 text-heading hover-primary">Full width grid 2</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-full-width-grid-3.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/grid-landing-03.jpg') }}" alt="Full width grid 3">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-full-width-grid-3.html"
          class="fs-20 text-heading hover-primary">Full width grid 3</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-grid-with-left-filter.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/grid-landing-04.jpg') }}" alt="Grid with left filter">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-grid-with-left-filter.html"
          class="fs-20 text-heading hover-primary">Grid with left filter</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-grid-with-right-filter.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/grid-landing-05.jpg') }}" alt="Grid with right filter">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-grid-with-right-filter.html"
          class="fs-20 text-heading hover-primary">Grid with right filter</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-grid-with-left-sidebar.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/grid-landing-06.jpg') }}" alt="Grid with left sidebar">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-grid-with-left-sidebar.html"
          class="fs-20 text-heading hover-primary">Grid with left sidebar</a></h4>
    </div>
    <div class="box px-xl-6" data-animate="fadeInUp">
      <a href="listing-grid-with-right-sidebar.html"
         class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
        <img src="{{ asset('images/grid-landing-07.jpg') }}" alt="Grid with right sidebar">
      </a>
      <h4 class="mb-0 text-center mt-6"><a href="listing-grid-with-right-sidebar.html"
          class="fs-20 text-heading hover-primary">Grid with right sidebar</a></h4>
    </div>
</div>

        </div>
        <div class="tab-pane fade "
          id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
          <div class="slick-slider custom-slider-1 custom-dots-center mx-0 mb-lg-2"
            data-slick-options='{"slidesToShow": 3,"dots":true,"arrows":false,"infinite":true,"centerMode":true,"centerPadding":"200px","responsive":[{"breakpoint": 1200,"settings": {"centerMode":false}},{"breakpoint": 992,"settings": {"slidesToShow":2,"centerMode":false}},{"breakpoint": 576,"settings": {"slidesToShow":1,"centerMode":false}}]}'>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-full-width-list.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/list-landing-01.jpg" alt="Full Width List">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-full-width-list.html"
                  class="fs-20 text-heading hover-primary">Full Width List</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-with-left-filter.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/list-landing-02.jpg" alt="List With Left Filter">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-with-left-filter.html"
                  class="fs-20 text-heading hover-primary">List With Left Filter</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-with-right-filter.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/list-landing-03.jpg" alt="List With Right Filter">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-with-right-filter.html"
                  class="fs-20 text-heading hover-primary">List With Right Filter</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-with-left-sidebar.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/list-landing-04.jpg" alt="List with left sidebar">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-with-left-sidebar.html"
                  class="fs-20 text-heading hover-primary">List with left sidebar</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-with-right-sidebar.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/list-landing-05.jpg" alt="List with right sidebar">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-with-right-sidebar.html"
                  class="fs-20 text-heading hover-primary">List with right sidebar</a></h4>
            </div>
          </div>
        </div>
        <div class="tab-pane fade "
          id="pills-grid" role="tabpanel" aria-labelledby="pills-grid-tab">
          <div class="slick-slider custom-slider-1 custom-dots-center mx-0 mb-lg-2"
            data-slick-options='{"slidesToShow": 3,"dots":true,"arrows":false,"infinite":true,"centerMode":true,"centerPadding":"200px","responsive":[{"breakpoint": 1200,"settings": {"centerMode":false}},{"breakpoint": 992,"settings": {"slidesToShow":2,"centerMode":false}},{"breakpoint": 576,"settings": {"slidesToShow":1,"centerMode":false}}]}'>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-full-width-grid-1.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/grid-landing-01.jpg" alt="Full width grid 1">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-full-width-grid-1.html"
                  class="fs-20 text-heading hover-primary">Full width grid 1</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-full-width-grid-2.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/grid-landing-02.jpg" alt="Full width grid 2">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-full-width-grid-2.html"
                  class="fs-20 text-heading hover-primary">Full width grid 2</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-full-width-grid-3.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/grid-landing-03.jpg" alt="Full width grid 3">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-full-width-grid-3.html"
                  class="fs-20 text-heading hover-primary">Full width grid 3</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-grid-with-left-filter.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/grid-landing-04.jpg" alt="Grid with left filter">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-grid-with-left-filter.html"
                  class="fs-20 text-heading hover-primary">Grid with left filter</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-grid-with-right-filter.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/grid-landing-05.jpg" alt="Grid with right filter">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-grid-with-right-filter.html"
                  class="fs-20 text-heading hover-primary">Grid with right filter</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-grid-with-left-sidebar.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/grid-landing-06.jpg" alt="Grid with left sidebar">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-grid-with-left-sidebar.html"
                  class="fs-20 text-heading hover-primary">Grid with left sidebar</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-grid-with-right-sidebar.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/grid-landing-07.jpg" alt="Grid with right sidebar">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-grid-with-right-sidebar.html"
                  class="fs-20 text-heading hover-primary">Grid with right sidebar</a></h4>
            </div>
          </div>
        </div>
        <div class="tab-pane fade "
          id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
          <div class="slick-slider custom-slider-1 custom-dots-center mx-0 mb-lg-2"
            data-slick-options='{"slidesToShow": 3,"dots":true,"arrows":false,"infinite":true,"centerMode":true,"centerPadding":"200px","responsive":[{"breakpoint": 1200,"settings": {"centerMode":false}},{"breakpoint": 992,"settings": {"slidesToShow":2,"centerMode":false}},{"breakpoint": 576,"settings": {"slidesToShow":1,"centerMode":false}}]}'>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-half-map-list-layout-1.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/map-landing-01.jpg" alt="Half map list layout 1">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-half-map-list-layout-1.html"
                  class="fs-20 text-heading hover-primary">Half map list layout 1</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-half-map-list-layout-2.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/map-landing-02.jpg" alt="Half map list layout 2">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-half-map-list-layout-2.html"
                  class="fs-20 text-heading hover-primary">Half map list layout 2</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-half-map-grid-layout-1.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/map-landing-03.jpg" alt="Half map grid layout 1">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-half-map-grid-layout-1.html"
                  class="fs-20 text-heading hover-primary">Half map grid layout 1</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-half-map-grid-layout-2.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/map-landing-04.jpg" alt="Half map grid layout 2">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-half-map-grid-layout-2.html"
                  class="fs-20 text-heading hover-primary">Half map grid layout 2</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-full-map-1.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/map-landing-05.jpg" alt="Full map 1">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-full-map-1.html"
                  class="fs-20 text-heading hover-primary">Full map 1</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-full-map-2.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/map-landing-06.jpg" alt="Full map 2">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-full-map-2.html"
                  class="fs-20 text-heading hover-primary">Full map 2</a></h4>
            </div>
            <div class="box px-xl-6" data-animate="fadeInUp">
              <a href="listing-full-map-with-sidebar.html"
                class="hover-zoom-in d-block rounded-15 border border-3x border-secondary">
                <img src="images/map-landing-07.jpg" alt="Full Map with sidebar">
              </a>
              <h4 class="mb-0 text-center mt-6"><a href="listing-full-map-with-sidebar.html"
                  class="fs-20 text-heading hover-primary">Full Map with sidebar</a></h4>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-gray-02 pt-lg-15 pt-7 bg-cover"
      style="background-image: url('images/bg-search-utility-landing.png')">
      <div class="container container-xxl pt-2">
        <div class="row align-items-center">
          <div class="col-lg-6" data-animate="fadeInLeft">
            <div class="position-relative mt-2 w-100 h-230">
              <p class="position-absolute pos-fixed-left-center z-index-1 landing-title-light fs-250 font-weight-bold opacity-6 lh-1 ml-xl-n9">
                04
              </p>
              <div class="position-absolute pos-fixed-left-center z-index-1 mxw-411 mx-auto">
                <p class="text-primary fs-20 font-weight-bold lh-13 mb-3 mb-sm-6">Search</p>
                <h2 class="fs-36 fs-sm-44 text-heading lh-143 mb-0">Powerful<br>
                  Search Utility
                </h2>
              </div>
            </div>
            <p class="text-landing lh-188 mxw-545 fs-16 mb-lg-11 mb-8">
              <span class="text-heading font-weight-500">A powerful and detailed filter system</span> is built for
              HomeID to meet any requirements from visitors in finding their dream home.
            </p>
            <img src="images/banner-landing-09.png" alt="Powerful Search Utility">
          </div>
          <div class="col-lg-6 pt-lg-0 pt-6" data-animate="fadeInRight">
            <div class="card border-0 shadow-hover-lg-6 border-radius-10 mb-6">
              <div class="row no-gutters align-items-center ">
                <div class="col-xxl-3 col-lg-4 col-sm-3 px-7 pt-7 pb-sm-7">
                  <img src="images/icon-landing-search-01.png" class="card-img w-575-auto"
                    alt="Great Number of Search Fields">
                </div>
                <div class="col-xxl-9 col-lg-8 col-sm-9">
                  <div class="card-body  pb-7 pr-7 pt-sm-7 pt-5 pl-7 pl-sm-0">
                    <h3 class="fs-20 font-weight-500 lh-16 text-heading">
                      Great Number of Search Fields
                    </h3>
                    <p class="mb-0">Users can manage the field position and create more fields in numbers, text, and other formats that you want them in the advanced search.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card border-0 shadow-hover-lg-6 border-radius-10 mb-6">
              <div class="row no-gutters align-items-center ">
                <div class="col-xxl-3 col-lg-4 col-sm-3 px-7 pt-7 pb-sm-7">
                  <img src="images/icon-landing-search-02.png" class="card-img w-575-auto"
                    alt="Unlimited Amenities CheckBox">
                </div>
                <div class="col-xxl-9 col-lg-8 col-sm-9">
                  <div class="card-body  pb-7 pr-7 pt-sm-7 pt-5 pl-7 pl-sm-0">
                    <h3 class="fs-20 font-weight-500 lh-16 text-heading">
                      Unlimited Amenities CheckBox
                    </h3>
                    <p class="mb-0">There is a great number of amenities are used when filtering properties, you can add your own features and select which to show in the advanced search.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card border-0 shadow-hover-lg-6 border-radius-10 mb-6">
              <div class="row no-gutters align-items-center ">
                <div class="col-xxl-3 col-lg-4 col-sm-3 px-7 pt-7 pb-sm-7">
                  <img src="images/icon-landing-search-03.png" class="card-img w-575-auto"
                    alt="Autocomplete Search Suggestion">
                </div>
                <div class="col-xxl-9 col-lg-8 col-sm-9">
                  <div class="card-body  pb-7 pr-7 pt-sm-7 pt-5 pl-7 pl-sm-0">
                    <h3 class="fs-20 font-weight-500 lh-16 text-heading">
                      Autocomplete Search Suggestion
                    </h3>
                    <p class="mb-0">Including the option to search with the auto-complete feature, helping visitors complete their search quickly by providing suggestions.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card border-0 shadow-hover-lg-6 border-radius-10 mb-6">
              <div class="row no-gutters align-items-center ">
                <div class="col-xxl-3 col-lg-4 col-sm-3 px-7 pt-7 pb-sm-7">
                  <img src="images/icon-landing-search-04.png" class="card-img w-575-auto"
                    alt="AJAX Search">
                </div>
                <div class="col-xxl-9 col-lg-8 col-sm-9">
                  <div class="card-body  pb-7 pr-7 pt-sm-7 pt-5 pl-7 pl-sm-0">
                    <h3 class="fs-20 font-weight-500 lh-16 text-heading">
                      AJAX Search
                    </h3>
                    <p class="mb-0">Provide visitors with a smooth searching experience when they are looking for their dream home. It raises the satisfaction when surfing on the site.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-gray-02 pt-2 py-lg-9 pb-7">
      <div class="container container-xxl">
        <div class="row align-items-center">
          <div class="col-lg-5 col-md-6" data-animate="fadeInLeft">
            <div class="position-relative mt-2 w-100 h-230">
              <p class="position-absolute pos-fixed-left-center z-index-1 landing-title-light fs-250 font-weight-bold opacity-6 lh-1 ml-xl-n9">
                05
              </p>
              <div class="position-absolute pos-fixed-left-center z-index-1 mxw-411 mx-auto">
                <p class="text-primary fs-20 font-weight-bold lh-13 mb-3 mb-sm-6">Maps Box</p>
                <h2 class="fs-36 fs-sm-44 text-heading lh-143 mb-0">Maps Box<br>
                  Integration
                </h2>
              </div>
            </div>
            <p class="text-landing lh-188 mxw-545 fs-16 mt-1 mb-lg-11 mb-6">
              HomeID has Powerful Mapping, custom-built Google Maps integration, with marker clusters, awesome
              infobox, and pins to show your properties on maps by using Google Maps APIs.
            </p>
          </div>
          <div class="col-lg-7 col-md-6" data-animate="fadeInRight">
            <img src="images/banner-landing-10.png" alt="Google Maps Integration"
              class="float-xl-right mr-xl-n7">
          </div>
        </div>
      </div>
    </section>
    <section class="pt-9 pb-lg-15 pb-11" style="background-color: #e9edf2" id="property">
      <div class="text-center mb-lg-11 mb-8">
        <div class="position-relative d-inline-block pb-5 pt-10">
          <div class="position-relative z-index-1">
            <p class="text-primary fs-20 font-weight-bold mb-3 mb-sm-6">9+ Different layouts</p>
            <h2 class=" fs-36 fs-sm-44 text-secondary">Property Page Styles</h2>
          </div>
          <span class="position-absolute fs-250 text-white font-weight-bold opacity-42 lh-1 pos-fixed-top-center">06</span>
        </div>
      </div>
      <div class="slick-slider custom-slider-1 custom-dots-center text-heading mx-0 mb-lg-2"
        data-slick-options='{"slidesToShow": 3,"dots":true,"arrows":false,"infinite":true,"centerMode":true,"centerPadding":"200px","responsive":[{"breakpoint": 1200,"settings": {"centerMode":false}},{"breakpoint": 992,"settings": {"slidesToShow":2,"centerMode":false}},{"breakpoint": 576,"settings": {"slidesToShow":1,"centerMode":false}}]}'>
        <div class="box px-xl-6" data-animate="fadeInUp">
          <a href="single-property-1.html" class="hover-shine d-block">
            <img src="images/single-landing-01.jpg" alt="Page with Image Gallery 01"
              class="border-radius-10 shadow-lg-lg-5">
          </a>
          <h4 class="mb-0 text-center mt-6 lh-16"><a href="single-property-1.html"
              class="fs-20 text-heading hover-primary">Page with Image Gallery 01</a>
          </h4>
        </div>
        <div class="box px-xl-6" data-animate="fadeInUp">
          <a href="single-property-2.html" class="hover-shine d-block">
            <img src="images/single-landing-02.jpg" alt="Page with Image Gallery 02"
              class="border-radius-10 shadow-lg-lg-5">
          </a>
          <h4 class="mb-0 text-center mt-6 lh-16"><a href="single-property-2.html"
              class="fs-20 text-heading hover-primary">Page with Image Gallery 02</a>
          </h4>
        </div>
        <div class="box px-xl-6" data-animate="fadeInUp">
          <a href="single-property-3.html" class="hover-shine d-block">
            <img src="images/single-landing-03.jpg" alt="Page with Image Gallery 03"
              class="border-radius-10 shadow-lg-lg-5">
          </a>
          <h4 class="mb-0 text-center mt-6 lh-16"><a href="single-property-3.html"
              class="fs-20 text-heading hover-primary">Page with Image Gallery 03</a>
          </h4>
        </div>
        <div class="box px-xl-6" data-animate="fadeInUp">
          <a href="single-property-4.html" class="hover-shine d-block">
            <img src="images/single-landing-04.jpg" alt="Page with Google Map"
              class="border-radius-10 shadow-lg-lg-5">
          </a>
          <h4 class="mb-0 text-center mt-6 lh-16"><a href="single-property-4.html"
              class="fs-20 text-heading hover-primary">Page with Google Map</a>
          </h4>
        </div>
        <div class="box px-xl-6" data-animate="fadeInUp">
          <a href="single-property-5.html" class="hover-shine d-block">
            <img src="images/single-landing-05.jpg" alt="Page with Properties Slider"
              class="border-radius-10 shadow-lg-lg-5">
          </a>
          <h4 class="mb-0 text-center mt-6 lh-16"><a href="single-property-5.html"
              class="fs-20 text-heading hover-primary">Page with Properties Slider</a>
          </h4>
        </div>
        <div class="box px-xl-6" data-animate="fadeInUp">
          <a href="single-property-6.html" class="hover-shine d-block">
            <img src="images/single-landing-06.jpg" alt="Page with Image Gallery 04"
              class="border-radius-10 shadow-lg-lg-5">
          </a>
          <h4 class="mb-0 text-center mt-6 lh-16"><a href="single-property-6.html"
              class="fs-20 text-heading hover-primary">Page with Image Gallery 04</a>
          </h4>
        </div>
        <div class="box px-xl-6" data-animate="fadeInUp">
          <a href="single-property-7.html" class="hover-shine d-block">
            <img src="images/single-landing-07.jpg" alt="Page with Image Gallery 05"
              class="border-radius-10 shadow-lg-lg-5">
          </a>
          <h4 class="mb-0 text-center mt-6 lh-16"><a href="single-property-7.html"
              class="fs-20 text-heading hover-primary">Page with Image Gallery 05</a>
          </h4>
        </div>
        <div class="box px-xl-6" data-animate="fadeInUp">
          <a href="single-property-8.html" class="hover-shine d-block">
            <img src="images/single-landing-08.jpg" alt="Page with Contact Form"
              class="border-radius-10 shadow-lg-lg-5">
          </a>
          <h4 class="mb-0 text-center mt-6 lh-16"><a href="single-property-8.html"
              class="fs-20 text-heading hover-primary">Page with Contact Form</a>
          </h4>
        </div>
        <div class="box px-xl-6" data-animate="fadeInUp">
          <a href="single-property-9.html" class="hover-shine d-block">
            <img src="images/single-landing-09.jpg" alt="Page with Image Gallery 06"
              class="border-radius-10 shadow-lg-lg-5">
          </a>
          <h4 class="mb-0 text-center mt-6 lh-16"><a href="single-property-9.html"
              class="fs-20 text-heading hover-primary">Page with Image Gallery 06</a>
          </h4>
        </div>
      </div>
    </section>
    <section class="bg-gray-02 pb-15 pt-13 pt-lg-0" id="dashboard"
      style="background-image: url('images/bg-poweful-landing.png');background-position: left;background-repeat: no-repeat;background-size: contain;">
      <div class="container container-xxl">
        <div class="row align-items-center">
          <div class="col-md-5 col-xxl-4" data-animate="fadeInLeft">
            <div class="position-relative mt-2 w-100 h-250 ml-n3">
              <p class="position-absolute pos-fixed-top z-index-1 landing-title-light fs-250 font-weight-bold opacity-6 lh-1">
                07
              </p>
              <div class="position-absolute pos-fixed-left-center z-index-1 mxw-411 pl-4">
                <p class="text-primary fs-20 font-weight-bold lh-13 mb-3 mb-sm-6">Dashboard</p>
                <h2 class="fs-36 fs-sm-44 text-heading lh-143 mb-0">Powerful
                  <br>
                  User Dashboard
                </h2>
              </div>
            </div>
            <p class="text-landing fs-16 mt-6 mt-lg-n2"><span
                class="text-heading font-weight-500">A thoroughly-built system</span> that allows admin to
              control everything on the website including registered
              agencies, agents, manage real estate marketplace, coordinate agents, and accept property
              submissions​.</p>
          </div>
          <div class="col-md-7 col-xxl-8" data-animate="fadeInRight">
            <a href="dashboard.html" class="lading-dashboard-img">
              <img src="images/powerful-landing-01.png" alt="Powerful User Dashboard"
                class="pt-8 pt-md-11">
            </a>
          </div>
        </div>
      </div>
      <div class="container container-xxl">
        <div class="row position-relative pt-4">
          <div class="col-xxl-3 col-lg-4 col-sm-6 mb-6" data-animate="fadeInUp">
            <div class="powerful-dashboard-img">
              <img src="images/powerful-landing-02.png" alt="Powerful User Dashboard">
            </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-sm-6 mb-6" data-animate="fadeInUp">
            <div class="card border-0 h-100">
              <div class="card-body p-6">
                <div class="media mb-2 align-items-end">
                  <img src="images/icon-powerful-01.png" alt="Powerful User Dashboard"
                    class="mr-3">
                  <div class="media-body">
                    <h4 class="card-title fs-20 text-dark lh-16 mb-0">Submit<br>
                      Properties</h4>
                  </div>
                </div>
                <p class="card-title text-landing fs-15 mb-0">
                  Click on Add New Property to submit a new one, you can fully manage the submit fields and
                  add your own custom fields.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-sm-6 mb-6" data-animate="fadeInUp">
            <div class="card border-0 h-100">
              <div class="card-body p-6">
                <div class="media mb-2 align-items-end">
                  <img src="images/icon-powerful-02.png" alt="Powerful User Dashboard"
                    class="mr-3">
                  <div class="media-body">
                    <h4 class="card-title fs-20 text-dark lh-16 mb-0">Manage
                      <br>
                      Properties
                    </h4>
                  </div>
                </div>
                <p class="card-title text-landing fs-15 mb-0">
                  Users are full control of their properties (edit, delete, enable, disable) and also can find
                  particular properties using the search tool.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-sm-6 mb-6" data-animate="fadeInUp">
            <div class="card border-0 h-100">
              <div class="card-body p-6">
                <div class="media mb-2 align-items-end">
                  <img src="images/icon-powerful-03.png" alt="Powerful User Dashboard"
                    class="mr-3">
                  <div class="media-body">
                    <h4 class="card-title fs-20 text-dark lh-16 mb-0">User
                      <br>
                      Properties
                    </h4>
                  </div>
                </div>
                <p class="card-title text-landing fs-15 mb-0">
                  Each user will have their own profile page. The profile pages display all the information
                  and can be published only with admin approval.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-sm-6 mb-6" data-animate="fadeInUp">
            <div class="card border-0 h-100">
              <div class="card-body p-6">
                <div class="media mb-2 align-items-end">
                  <img src="images/icon-powerful-04.png" alt="Powerful User Dashboard"
                    class="mr-3">
                  <div class="media-body">
                    <h4 class="card-title fs-20 text-dark lh-16 mb-0">Manage
                      <br>
                      Agents/Agencies
                    </h4>
                  </div>
                </div>
                <p class="card-title text-landing fs-15 mb-0">
                  Agency can add and manage agents from the front end dashboard. The membership packages will
                  limit the agent and agency’s action.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-sm-6 mb-6" data-animate="fadeInUp">
            <div class="card border-0 h-100">
              <div class="card-body p-6">
                <div class="media mb-2 align-items-end">
                  <img src="images/icon-powerful-05.png" alt="Powerful User Dashboard"
                    class="mr-3">
                  <div class="media-body">
                    <h4 class="card-title fs-20 text-dark lh-16 mb-0">Payment
                      <br>
                      Integration
                    </h4>
                  </div>
                </div>
                <p class="card-title text-landing fs-15 mb-0">
                  Most popular payment gates: Bank Transfer, PayPal and Stripe are integrated into HomeID to
                  provide users with more payment options.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-sm-6 mb-6" data-animate="fadeInUp">
            <div class="card border-0 h-100">
              <div class="card-body p-6">
                <div class="media mb-2 align-items-end">
                  <img src="images/icon-powerful-06.png" alt="Powerful User Dashboard"
                    class="mr-3">
                  <div class="media-body">
                    <h4 class="card-title fs-20 text-dark lh-16 mb-0">Membership
                      <br>
                      System
                    </h4>
                  </div>
                </div>
                <p class="card-title text-landing fs-15 mb-0">
                  We create membership packages for each user role and set for each package the number of
                  listings, number of properties…
                </p>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-sm-6 mb-6" data-animate="fadeInUp">
            <div class="card border-0 h-100">
              <div class="card-body p-6">
                <div class="media mb-2 align-items-end">
                  <img src="images/icon-powerful-07.png" alt="Powerful User Dashboard"
                    class="mr-3">
                  <div class="media-body">
                    <h4 class="card-title fs-20 text-dark lh-16 mb-0">Notification
                      <br>
                      System
                    </h4>
                  </div>
                </div>
                <p class="card-title text-landing fs-15 mb-0">
                  Private messages and instant notification will be sent via email or in the user dashboard
                  for each change made.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pt-10">
      <div class="position-relative mt-2 w-100 h-250">
        <p class="position-absolute pos-fixed-center z-index-1 landing-title-light fs-250 font-weight-bold opacity-6 lh-1">
          08
        </p>
        <div class="position-absolute pos-fixed-center z-index-1 text-center mxw-411 mx-auto">
          <p class="text-primary fs-20 font-weight-bold lh-13 mb-3 mb-sm-6">Other pages</p>
          <h2 class="fs-36 fs-md-44 text-heading lh-143 mb-0" style="max-width: 340px;">Agent &
            Agency Page
          </h2>
        </div>
      </div>
      <div class="pt-8 pt-sm-0 mb-8 mb-md-0"
        style="background-image: url('images/agent-landing-01.png');background-position:right center;background-size: contain; background-repeat: no-repeat">
        <div class="container container-xxl">
          <div class="row align-items-center">
            <div class="col-md-5" data-animate="fadeInLeft">
              <div class="mxw-470">
                <h2 class="fs-34 lh-141 text-heading mb-4">Agent Page</h2>
                <p class="text-landing fs-16"><span class="text-heading font-weight-500">Agents</span>
                  can
                  publish
                  their listings,
                  and information from the front end interface. The customers can find their detailed
                  information,
                  contact form and their properties on the agent page.
                </p>
              </div>
            </div>
            <div class="col-md-7" data-animate="fadeInRight">
              <a href="agents-grid-1.html">
                <img src="images/agency-page-02.png" alt="Agent Page">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div style="background-image: url('images/agent-landing-01.png');background-position: left bottom;background-size: contain; background-repeat: no-repeat"
        class="pb-10">
        <div class="container container-xxl">
          <div class="row align-items-center">
            <div class="col-md-7 mb-6 mb-md-0 order-1 order-md-0" data-animate="fadeInLeft">
              <a href="agency-grid.html">
                <img src="images/agency-page-01.png" alt="Banner Landing 01">
              </a>
            </div>
            <div class="col-md-5 order-0 order-md-1" data-animate="fadeInRight">
              <div class="text-left mxw-470">
                <h2 class="fs-34 lh-141 text-heading mb-4">Agency Page</h2>
                <p class="text-landing fs-16">
                  On the <span class="text-heading font-weight-500">agency page</span>, the company logo and
                  contact information will be displayed publicly. Visitors also can find the agency’s listing
                  here
                  including the agents’ properties.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section style="background-image: url('images/customer-support.jpg')" class="bg-img-cover-center">
      <div class="container">
        <div class="row align-items-center py-11">
          <div class="col-md-5" data-animate="fadeInDown">
            <div class="pl-xl-13">
              <img src="images/icon-customer-support.png" alt="Customer support icon"
                class="mb-3">
              <a href="https://sp.g5plus.net/">
                <h2 class="fs-34 lh-141 text-white mb-5">Dedicated<br>
                  Customer Support</h2>
              </a>
              <div class="heading-divider"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section style="background-image: url('images/document.jpg')" class="bg-img-cover-center">
      <div class="container">
        <div class="row align-items-center py-13">
          <div class="col-md-5 ml-auto d-flex  justify-content-end justify-content-md-start"
            data-animate="fadeInDown">
            <div>
              <img src="images/youtube.png" alt="Tutorial Videos and Documentation" class="mb-3">
              <a href="docs">
                <h2 class="fs-34 lh-141 text-white mb-5">Tutorial Videos and<br>
                  Documentation</h2>
              </a>
              <span class="heading-divider"></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-gray-02 py-15">
      <div class="container">
        <div class="mxw-940 text-center">
          <h2 class="fs-30 fs-md-42 text-heading lh-15 mb-7" data-animate="fadeInDown">Get HomeID and build your most
            powerful Real Estate
            website.</h2>
          <a href="#" class="btn btn-primary btn-lg px-10 fs-18 py-3 lh-14 shadow-xs-6">
            Buy HomeID
          </a>
        </div>
      </div>
    </section>
  </main>
  <!-- Vendors scripts -->

  <div class="modal fade login-register login-register-modal" id="login-register-modal" tabindex="-1" role="dialog"
    aria-labelledby="login-register-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
      <div class="modal-content">
        <div class="modal-header border-0 p-0">
          <div class="nav nav-tabs row w-100 no-gutters" id="myTab" role="tablist">
            <a class="nav-item col-sm-3 ml-0 nav-link pr-6 py-4 pl-9 active fs-18" id="login-tab"
              data-toggle="tab"
              href="#login"
              role="tab"
              aria-controls="login" aria-selected="true">Login</a>
            <a class="nav-item col-sm-3 ml-0 nav-link py-4 px-6 fs-18" id="register-tab" data-toggle="tab"
              href="#register"
              role="tab"
              aria-controls="register" aria-selected="false">Register</a>
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
                      id="password" name="password" required
                      placeholder="Password">
                    <div class="input-group-append">
                      <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                        <i class="far fa-eye-slash"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="d-flex mb-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="remember-me" name="remember-me">
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
                    <input class="form-check-input" type="checkbox" value="" id="verify" name="verify">
                    <label class="form-check-label" for="verify">
                      I'm not a robot
                    </label>
                  </div>
                  <a href="#" class="d-inline-block ml-auto">
                    <img src="images/re-captcha.png" alt="Re-capcha">
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
                    <img src="images/google.png" alt="Google">
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
                      id="full-name" name="full-name" required
                      placeholder="Full name">
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
                      id="password01" name="password01" required
                      placeholder="Password">
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
                    <img src="images/google.png" alt="Google">
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

  <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
    <a href="#"
      class="gtf-back-to-top bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center"
      title="Back To Top"><i
        class="fal fa-arrow-up"></i></a>
  </div>

@endsection
@push('styleUs')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Real Estate Html Template">
<meta name="author" content="">
<meta name="generator" content="Jekyll">
<title>Landing - HomeID</title>
<!-- Google fonts -->
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
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
<link rel="icon" href="images/favicon.ico">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Home 01">
    <meta name="twitter:description" content="Real Estate Html Template">
    <meta name="twitter:image" content="{{ asset('images/homeid-social-logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url('/home-01.php') }}">

    <meta property="og:title" content="Home 01">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/homeid-social.png">
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