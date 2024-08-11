@extends('layouts.main')
@section('titleUs', 'Trang chủ trọ nhanh')
@section('contentUs')
<main id="content">
    <section class="d-flex flex-column">
      <div style="background-image: url('images/bg-home-01.jpg')"
       class="bg-cover d-flex align-items-center custom-vh-100">
        <div class="container pt-lg-15 py-8" data-animate="zoomIn">
          <p class="text-white fs-md-22 fs-18 font-weight-500 letter-spacing-367 mb-6 text-center text-uppercase">Let
            us guide your home</p>
          <h2 class="text-white display-2 text-center mb-sm-13 mb-8">Find Your Dream Home</h2>
          <form class="property-search py-lg-0 z-index-2 position-relative d-none d-lg-block">
            <div class="row no-gutters">
              <div class="col-md-5 col-lg-4 col-xl-3">
                <input class="search-field" type="hidden" name="status" value="for-sale"
                             data-default-value="">
                <ul class="nav nav-pills property-search-status-tab">
                  <li class="nav-item bg-secondary rounded-top" role="presentation">
                    <a href="#" role="tab" aria-selected="true"
                                 class="nav-link btn shadow-none rounded-bottom-0 text-white text-btn-focus-secondary text-uppercase d-flex align-items-center fs-13 rounded-bottom-0 bg-active-white text-active-secondary letter-spacing-087 flex-md-1 px-4 py-2 active"
                                 data-toggle="pill" data-value="for-sale">
                      <svg class="icon icon-villa fs-22 mr-2">
                        <use xlink:href="#icon-villa"></use>
                      </svg>
                      for sale
                    </a>
                  </li>
                  <li class="nav-item bg-secondary rounded-top" role="presentation">
                    <a href="#" role="tab" aria-selected="true"
                                 class="nav-link btn shadow-none rounded-bottom-0 text-white text-btn-focus-secondary text-uppercase d-flex align-items-center fs-13 rounded-bottom-0 bg-active-white text-active-secondary letter-spacing-087 flex-md-1 px-4 py-2"
                                 data-toggle="pill" data-value="for-rent">
                      <svg class="icon icon-building fs-22 mr-2">
                        <use xlink:href="#icon-building"></use>
                      </svg>
                      for rent
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="bg-white px-6 rounded-bottom rounded-top-right pb-6 pb-lg-0">
              <div class="row align-items-center"
                       id="accordion-4">
                <div class="col-md-6 col-lg-3 col-xl-3 pt-6 pt-lg-0 order-1">
                  <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Home Type</label>
                  <select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input"
                                  title="Select" data-style="p-0 h-24 lh-17 text-dark" name="type">
                    <option>Condominium</option>
                    <option>Single-Family Home</option>
                    <option>Townhouse</option>
                    <option>Multi-Family Home</option>
                  </select>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-5 pt-6 pt-lg-0 order-2">
                  <label class="text-uppercase font-weight-500 letter-spacing-093">Search</label>
                  <div class="position-relative">
                    <input type="text" name="search"
                                     class="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 pl-0 pr-4 font-weight-600 border-color-input placeholder-muted"
                                     placeholder="Find something...">
                    <i class="far fa-search position-absolute pos-fixed-right-center pr-0 fs-18 mt-n3"></i>
                  </div>
                </div>
                <div class="col-sm pr-lg-0 pt-6 pt-lg-0 order-3">
                  <a href="#advanced-search-filters-4"
                             class="btn advanced-search btn-accent h-lg-100 w-100 shadow-none text-secondary rounded-0 fs-14 fs-sm-16 font-weight-600 text-left d-flex align-items-center collapsed"
                             data-toggle="collapse" data-target="#advanced-search-filters-4" aria-expanded="true"
                             aria-controls="advanced-search-filters-4">
                    Advanced Search
                  </a>
                </div>
                <div class="col-sm pt-6 pt-lg-0 order-sm-4 order-5">
                  <button type="submit"
                                  class="btn btn-primary shadow-none fs-16 font-weight-600 w-100 py-lg-2 lh-213">
                    Search
                  </button>
                </div>
                <div id="advanced-search-filters-4" class="col-12 pt-4 pb-sm-4 order-sm-5 order-4 collapse"
                           data-parent="#accordion-4">
                  <div class="row">
                    <div class="col-sm-6 col-lg-3 pt-6">
                      <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Bedrooms</label>
                      <select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input"
                                          name="bedroom"
                                          title="All Bedrooms" data-style="p-0 h-24 lh-17 text-dark">
                        <option>All Bedrooms</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                      </select>
                    </div>
                    <div class="col-sm-6 col-lg-3 pt-6">
                      <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Bathrooms</label>
                      <select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input"
                                          title="All Bathrooms" data-style="p-0 h-24 lh-17 text-dark" name="bathroom">
                        <option>All Bathrooms</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                      </select>
                    </div>
                    <div class="col-sm-6 col-lg-3 pt-6">
                      <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">All
                        Cities</label>
                      <select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input"
                                          name="city"
                                          title="All Cities" data-style="p-0 h-24 lh-17 text-dark">
                        <option>All Cities</option>
                        <option>New York</option>
                        <option>Los Angeles</option>
                        <option>Chicago</option>
                        <option>Houston</option>
                        <option>San Diego</option>
                        <option>Las Vegas</option>
                        <option>Las Vegas</option>
                        <option>Atlanta</option>
                      </select>
                    </div>
                    <div class="col-sm-6 col-lg-3 pt-6">
                      <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">All
                        Areas</label>
                      <select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input"
                                          name="areas"
                                          title="All Areas" data-style="p-0 h-24 lh-17 text-dark">
                        <option>All Areas</option>
                        <option>Albany Park</option>
                        <option>Altgeld Gardens</option>
                        <option>Andersonville</option>
                        <option>Beverly</option>
                        <option>Brickel</option>
                        <option>Central City</option>
                        <option>Coconut Grove</option>
                      </select>
                    </div>
                  </div>
                  <div class="row pt-2">
                    <div class="col-md-6 col-lg-4 pt-6 slider-range slider-range-secondary">
                      <label for="price-1-4" class="mb-4 text-gray-light">Price Range</label>
                      <div data-slider="true"
                                       data-slider-options='{"min":0,"max":1000000,"values":[100000,700000],"type":"currency"}'></div>
                      <div class="text-center mt-2">
                        <input id="price-1-4" type="text" readonly name="price"
                                             class="border-0 amount text-center text-body font-weight-500 bg-transparent">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4 pt-6 slider-range slider-range-secondary">
                      <label for="area-size-4" class="mb-4 text-gray-light">Area Size</label>
                      <div data-slider="true"
                                       data-slider-options='{"min":0,"max":15000,"values":[0,13000],"type":"currency"}'></div>
                      <div class="text-center mt-2">
                        <input id="area-size-4" type="text" readonly name="area"
                                             class="border-0 amount text-center text-body font-weight-500 bg-transparent">
                      </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 pt-6">
                      <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Property
                        ID</label>
                      <input type="text" name="search"
                                         class="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 p-0 font-weight-600 border-color-input"
                                         placeholder="Enter ID...">
                    </div>
                    <div class="col-12 pt-6 pb-2">
                      <a class="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse"
                                     href="#other-feature-4"
                                     role="button"
                                     aria-expanded="false" aria-controls="other-feature-4">
                        <span class="fs-15 text-heading font-weight-500 hover-primary">Other Features</span>
                      </a>
                    </div>
                    <div class="collapse row mx-0 w-100" id="other-feature-4">
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check1-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check1-4">Air Conditioning</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check2-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check2-4">Laundry</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check4-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check4-4">Washer</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check5-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check5-4">Barbeque</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check6-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check6-4">Lawn</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check7-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check7-4">Sauna</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check8-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check8-4">WiFi</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check9-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check9-4">Dryer</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check10-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check10-4">Microwave</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check11-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check11-4">Swimming Pool</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check12-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check12-4">Window Coverings</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check13-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check13-4">Gym</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check14-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check14-4">Outdoor Shower</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check15-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check15-4">TV Cable</label>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="check16-4"
                                                 name="features[]">
                          <label class="custom-control-label" for="check16-4">Refrigerator</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <form class="property-search property-search-mobile d-lg-none z-index-2 position-relative bg-white rounded mx-md-10">
            <div class="row align-items-lg-center" id="accordion-4-mobile">
              <div class="col-12">
                <div class="form-group mb-0 position-relative">
                  <a href="#advanced-search-filters-4-mobile"
                             class="text-secondary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed"
                             data-toggle="collapse" data-target="#advanced-search-filters-4-mobile"
                             aria-expanded="true"
                             aria-controls="advanced-search-filters-4-mobile">
                  </a>
                  <input type="text"
                                 class="form-control form-control-lg border shadow-none pr-9 pl-11 bg-white placeholder-muted"
                                 name="key-word"
                                 placeholder="Search...">
                  <button type="submit"
                                  class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left">
                    <i class="far fa-search"></i>
                  </button>
                </div>
              </div>
              <div id="advanced-search-filters-4-mobile" class="col-12 pt-2 px-7 collapse"
                       data-parent="#accordion-4-mobile">
                <div class="row mx-n2">
                  <div class="col-sm-6 pt-4 px-2">
                    <select class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                      title="Select" data-style="btn-lg py-2 h-52 bg-transparent" name="type">
                      <option>All status</option>
                      <option>For Rent</option>
                      <option>For Sale</option>
                    </select>
                  </div>
                  <div class="col-sm-6 pt-4 px-2">
                    <select class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                      title="All Types" data-style="btn-lg py-2 h-52 bg-transparent" name="type">
                      <option>Condominium</option>
                      <option>Single-Family Home</option>
                      <option>Townhouse</option>
                      <option>Multi-Family Home</option>
                    </select>
                  </div>
                  <div class="col-sm-6 pt-4 px-2">
                    <select class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                      name="bedroom"
                                      title="Bedrooms" data-style="btn-lg py-2 h-52 bg-transparent">
                      <option>All Bedrooms</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                  </div>
                  <div class="col-sm-6 pt-4 px-2">
                    <select class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                      name="bathrooms"
                                      title="Bathrooms" data-style="btn-lg py-2 h-52 bg-transparent">
                      <option>All Bathrooms</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                  </div>
                  <div class="col-sm-6 pt-4 px-2">
                    <select class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                      title="All Cities" data-style="btn-lg py-2 h-52 bg-transparent" name="city">
                      <option>All Cities</option>
                      <option>New York</option>
                      <option>Los Angeles</option>
                      <option>Chicago</option>
                      <option>Houston</option>
                      <option>San Diego</option>
                      <option>Las Vegas</option>
                      <option>Las Vegas</option>
                      <option>Atlanta</option>
                    </select>
                  </div>
                  <div class="col-sm-6 pt-4 px-2">
                    <select class="form-control border shadow-none form-control-lg selectpicker bg-transparent"
                                      name="areas"
                                      title="All Areas" data-style="btn-lg py-2 h-52 bg-transparent">
                      <option>All Areas</option>
                      <option>Albany Park</option>
                      <option>Altgeld Gardens</option>
                      <option>Andersonville</option>
                      <option>Beverly</option>
                      <option>Brickel</option>
                      <option>Central City</option>
                      <option>Coconut Grove</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pt-6 slider-range slider-range-secondary">
                    <label for="price-4-mobile" class="mb-4 text-white">Price Range</label>
                    <div data-slider="true"
                                   data-slider-options='{"min":0,"max":1000000,"values":[100000,700000],"type":"currency"}'></div>
                    <div class="text-center mt-2">
                      <input id="price-4-mobile" type="text" readonly
                                         class="border-0 amount text-center bg-transparent font-weight-500"
                                         name="price">
                    </div>
                  </div>
                  <div class="col-md-6 pt-6 slider-range slider-range-secondary">
                    <label for="area-size-4-mobile" class="mb-4">Area Size</label>
                    <div data-slider="true"
                                   data-slider-options='{"min":0,"max":15000,"values":[0,12000],"type":"sqrt"}'></div>
                    <div class="text-center mt-2">
                      <input id="area-size-4-mobile" type="text" readonly
                                         class="border-0 amount text-center bg-transparent font-weight-500"
                                         name="area">
                    </div>
                  </div>
                  <div class="col-12 pt-4 pb-2">
                    <a class="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse"
                                 href="#other-feature-4-mobile"
                                 role="button"
                                 aria-expanded="false" aria-controls="other-feature-4-mobile">
                      <span class="fs-15 font-weight-500 hover-primary">Other Features</span>
                    </a>
                  </div>
                  <div class="collapse row mx-0 w-100" id="other-feature-4-mobile">
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check1-4-mobile">
                        <label class="custom-control-label" for="check1-4-mobile">Air
                          Conditioning</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check2-4-mobile">
                        <label class="custom-control-label" for="check2-4-mobile">Laundry</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check4-4-mobile">
                        <label class="custom-control-label" for="check4-4-mobile">Washer</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check5-4-mobile">
                        <label class="custom-control-label" for="check5-4-mobile">Barbeque</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check6-4-mobile">
                        <label class="custom-control-label" for="check6-4-mobile">Lawn</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check7-4-mobile">
                        <label class="custom-control-label" for="check7-4-mobile">Sauna</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check8-4-mobile">
                        <label class="custom-control-label" for="check8-4-mobile">WiFi</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check9-4-mobile">
                        <label class="custom-control-label" for="check9-4-mobile">Dryer</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check10-4-mobile">
                        <label class="custom-control-label" for="check10-4-mobile">Microwave</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check11-4-mobile">
                        <label class="custom-control-label" for="check11-4-mobile">Swimming
                          Pool</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check12-4-mobile">
                        <label class="custom-control-label" for="check12-4-mobile">Window
                          Coverings</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check13-4-mobile">
                        <label class="custom-control-label" for="check13-4-mobile">Gym</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check14-4-mobile">
                        <label class="custom-control-label" for="check14-4-mobile">Outdoor
                          Shower</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check15-4-mobile">
                        <label class="custom-control-label" for="check15-4-mobile">TV Cable</label>
                      </div>
                    </div>
                    <div class="col-sm-6 py-2">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="features[]"
                                             id="check16-4-mobile">
                        <label class="custom-control-label"
                                             for="check16-4-mobile">Refrigerator</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="pt-lg-12 pb-lg-10 py-11">
      <div class="container container-xxl">
        <div class="row">
          <div class="col-md-6">
            <h2 class="text-heading">Best Properties For Sale</h2>
            <span class="heading-divider"></span>
            <p class="mb-6">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
          </div>
          <div class="col-md-6 text-md-right">
            <a href="listing-grid-with-left-filter.html"
                 class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">See all properties
              <i class="far fa-long-arrow-right ml-1"></i>
            </a>
          </div>
        </div>
        <div class="slick-slider slick-dots-mt-0 custom-arrow-spacing-30"
           data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":true,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
          <div class="box pb-7 pt-2">
            <div class="card shadow-hover-2" data-animate="zoomIn">
              <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                <img src="images/properties-grid-02.jpg"
                           alt="Home in Metric Way">
                <div class="card-img-overlay p-2 d-flex flex-column">
                  <div>
                    <span class="badge mr-2 badge-orange">featured</span>
                    <span class="badge mr-2 badge-primary">for Sale</span>
                  </div>
                  <ul class="list-inline mb-0 mt-auto hover-image">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-3">
                <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                                class="text-dark hover-primary">Home in Metric Way</a></h2>
                <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent"
                                 data-toggle="tooltip" title="Wishlist"><i
                                      class="fas fa-heart"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Compare"><i
                                      class="fas fa-exchange-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box pb-7 pt-2">
            <div class="card shadow-hover-2" data-animate="zoomIn">
              <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                <img src="images/properties-grid-01.jpg"
                           alt="Affordable Urban House">
                <div class="card-img-overlay p-2 d-flex flex-column">
                  <div>
                    <span class="badge mr-2 badge-primary">for Sale</span>
                  </div>
                  <ul class="list-inline mb-0 mt-auto hover-image">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-3">
                <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                                class="text-dark hover-primary">Affordable Urban House</a></h2>
                <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Wishlist"><i
                                      class="far fa-heart"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Compare"><i
                                      class="fas fa-exchange-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box pb-7 pt-2">
            <div class="card shadow-hover-2" data-animate="zoomIn">
              <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                <img src="images/properties-grid-03.jpg"
                           alt="Villa on Hollywood Boulevard">
                <div class="card-img-overlay p-2 d-flex flex-column">
                  <div>
                    <span class="badge mr-2 badge-primary">for Sale</span>
                  </div>
                  <ul class="list-inline mb-0 mt-auto hover-image">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-3">
                <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                                class="text-dark hover-primary">Villa on Hollywood Boulevard</a></h2>
                <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Wishlist"><i
                                      class="far fa-heart"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Compare"><i
                                      class="fas fa-exchange-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box pb-7 pt-2">
            <div class="card shadow-hover-2" data-animate="zoomIn">
              <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                <img src="images/properties-grid-04.jpg"
                           alt="Home in Metric Way">
                <div class="card-img-overlay p-2 d-flex flex-column">
                  <div>
                    <span class="badge mr-2 badge-orange">featured</span>
                    <span class="badge mr-2 badge-primary">for Sale</span>
                  </div>
                  <ul class="list-inline mb-0 mt-auto hover-image">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-3">
                <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                                class="text-dark hover-primary">Home in Metric Way</a></h2>
                <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Wishlist"><i
                                      class="far fa-heart"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Compare"><i
                                      class="fas fa-exchange-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box pb-7 pt-2">
            <div class="card shadow-hover-2" data-animate="zoomIn">
              <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                <img src="images/properties-grid-02.jpg"
                           alt="Home in Metric Way">
                <div class="card-img-overlay p-2 d-flex flex-column">
                  <div>
                    <span class="badge mr-2 badge-orange">featured</span>
                    <span class="badge mr-2 badge-primary">for Sale</span>
                  </div>
                  <ul class="list-inline mb-0 mt-auto hover-image">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-3">
                <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                                class="text-dark hover-primary">Home in Metric Way</a></h2>
                <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Wishlist"><i
                                      class="far fa-heart"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Compare"><i
                                      class="fas fa-exchange-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="bg-gray-02 py-lg-13 pt-11 pb-6">
        <div class="container container-xxl">
          <div class="row">
            <div class="col-lg-4 pr-xl-13" data-animate="fadeInLeft">
              <h2 class="text-heading lh-1625">Explore <br>
                 by Property Type</h2>
              <span class="heading-divider"></span>
              <p class="mb-6">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
              <a href="listing-grid-with-left-filter.html"
                     class="btn btn-lg text-secondary btn-accent">+2300 Available Properties
                <i class="far fa-long-arrow-right ml-1"></i>
              </a>
            </div>
            <div class="col-lg-8" data-animate="fadeInRight">
              <div class="slick-slider arrow-haft-inner custom-arrow-xxl-hide mx-0"
                       data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 3,"arrows":false,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 2,"arrows":false,"autoplay":true}}]}'>
                <div class="box px-0 py-6">
                  <a href="listing-grid-with-left-filter.html"
                             class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                    <img src="images/verified.png" class="card-img-top"
                                   alt="Apartment">
                    <div class="card-body px-0 pt-5 pb-0">
                      <h4 class="card-title fs-16 lh-2 text-dark mb-0">Apartment</h4>
                    </div>
                  </a>
                </div>
                <div class="box px-0 py-6">
                  <a href="listing-grid-with-left-filter.html"
                             class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                    <img src="images/sofa.png" class="card-img-top"
                                   alt="House">
                    <div class="card-body px-0 pt-5 pb-0">
                      <h4 class="card-title fs-16 lh-2 text-dark mb-0">House</h4>
                    </div>
                  </a>
                </div>
                <div class="box px-0 py-6">
                  <a href="listing-grid-with-left-filter.html"
                             class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                    <img src="images/architecture-and-city.png" class="card-img-top"
                                   alt="Office">
                    <div class="card-body px-0 pt-5 pb-0">
                      <h4 class="card-title fs-16 lh-2 text-dark mb-0">Office</h4>
                    </div>
                  </a>
                </div>
                <div class="box px-0 py-6">
                  <a href="listing-grid-with-left-filter.html"
                             class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                    <img src="images/eco-house.png" class="card-img-top"
                                   alt="Villa">
                    <div class="card-body px-0 pt-5 pb-0">
                      <h4 class="card-title fs-16 lh-2 text-dark mb-0">Villa</h4>
                    </div>
                  </a>
                </div>
                <div class="box px-0 py-6">
                  <a href="listing-grid-with-left-filter.html"
                             class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                    <img src="images/verified.png" class="card-img-top"
                                   alt="Apartment">
                    <div class="card-body px-0 pt-5 pb-0">
                      <h4 class="card-title fs-16 lh-2 text-dark mb-0">Apartment</h4>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pt-lg-12 pb-lg-11 py-11">
      <div class="container container-xxl">
        <div class="row">
          <div class="col-md-6">
            <h2 class="text-heading">Best Properties For Rent</h2>
            <span class="heading-divider"></span>
            <p class="mb-6">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
          </div>
          <div class="col-md-6 text-md-right">
            <a href="listing-grid-with-left-filter.html"
                 class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">See all properties
              <i class="far fa-long-arrow-right ml-1"></i>
            </a>
          </div>
        </div>
        <div class="slick-slider slick-dots-mt-0 custom-arrow-spacing-30"
           data-slick-options='{"slidesToShow": 4,"dots":true,"arrows":false,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
          <div class="box box pb-7 pt-2" data-animate="fadeInUp">
            <div class="card shadow-hover-2">
              <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                <img src="images/properties-grid-02.jpg"
                           alt="Home in Metric Way">
                <div class="card-img-overlay p-2 d-flex flex-column">
                  <div>
                    <span class="badge mr-2 badge-orange">featured</span>
                    <span class="badge mr-2 badge-indigo">for Sale</span>
                  </div>
                  <ul class="list-inline mb-0 mt-auto hover-image">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-3">
                <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                                class="text-dark hover-primary">Home in Metric Way</a></h2>
                <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <p class="fs-17 font-weight-bold text-heading mb-0">$550<span
                              class="text-gray-light font-weight-500 fs-14"> / month</span></p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent"
                                 data-toggle="tooltip" title="Wishlist"><i
                                      class="fas fa-heart"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Compare"><i
                                      class="fas fa-exchange-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box box pb-7 pt-2" data-animate="fadeInUp">
            <div class="card shadow-hover-2">
              <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                <img src="images/properties-grid-05.jpg"
                           alt="Affordable Urban House">
                <div class="card-img-overlay p-2 d-flex flex-column">
                  <div>
                    <span class="badge mr-2 badge-indigo">for Sale</span>
                  </div>
                  <ul class="list-inline mb-0 mt-auto hover-image">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-3">
                <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                                class="text-dark hover-primary">Affordable Urban House</a></h2>
                <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <p class="fs-17 font-weight-bold text-heading mb-0">$5.700<span
                              class="text-gray-light font-weight-500 fs-14"> / year</span></p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Wishlist"><i
                                      class="far fa-heart"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Compare"><i
                                      class="fas fa-exchange-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box box pb-7 pt-2" data-animate="fadeInUp">
            <div class="card shadow-hover-2">
              <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                <img src="images/properties-grid-06.jpg"
                           alt="Villa on Hollywood Boulevard">
                <div class="card-img-overlay p-2 d-flex flex-column">
                  <div>
                    <span class="badge mr-2 badge-indigo">for Sale</span>
                  </div>
                  <ul class="list-inline mb-0 mt-auto hover-image">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-3">
                <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                                class="text-dark hover-primary">Villa on Hollywood Boulevard</a></h2>
                <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <p class="fs-17 font-weight-bold text-heading mb-0">$550<span
                              class="text-gray-light font-weight-500 fs-14"> / month</span></p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Wishlist"><i
                                      class="far fa-heart"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Compare"><i
                                      class="fas fa-exchange-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box box pb-7 pt-2" data-animate="fadeInUp">
            <div class="card shadow-hover-2">
              <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                <img src="images/properties-grid-07.jpg"
                           alt="Home in Metric Way">
                <div class="card-img-overlay p-2 d-flex flex-column">
                  <div>
                    <span class="badge mr-2 badge-orange">featured</span>
                    <span class="badge mr-2 badge-indigo">for Sale</span>
                  </div>
                  <ul class="list-inline mb-0 mt-auto hover-image">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-3">
                <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                                class="text-dark hover-primary">Home in Metric Way</a></h2>
                <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <p class="fs-17 font-weight-bold text-heading mb-0">$5.700<span
                              class="text-gray-light font-weight-500 fs-14"> / year</span></p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Wishlist"><i
                                      class="far fa-heart"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Compare"><i
                                      class="fas fa-exchange-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box box pb-7 pt-2" data-animate="fadeInUp">
            <div class="card shadow-hover-2">
              <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                <img src="images/properties-grid-02.jpg"
                           alt="Home in Metric Way">
                <div class="card-img-overlay p-2 d-flex flex-column">
                  <div>
                    <span class="badge mr-2 badge-orange">featured</span>
                    <span class="badge mr-2 badge-indigo">for Sale</span>
                  </div>
                  <ul class="list-inline mb-0 mt-auto hover-image">
                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-images"></i><span class="pl-1">9</span>
                      </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="2 Video">
                      <a href="#" class="text-white hover-primary">
                        <i class="far fa-play-circle"></i><span class="pl-1">2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body pt-3">
                <h2 class="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html"
                                                                class="text-dark hover-primary">Home in Metric Way</a></h2>
                <p class="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                              data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                </ul>
              </div>
              <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <p class="fs-17 font-weight-bold text-heading mb-0">$550<span
                              class="text-gray-light font-weight-500 fs-14"> / month</span></p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent"
                                 data-toggle="tooltip" title="Wishlist"><i
                                      class="fas fa-heart"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                                 data-toggle="tooltip" title="Compare"><i
                                      class="fas fa-exchange-alt"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="bg-single-image pt-lg-13 pb-lg-12 py-11 bg-secondary">
        <div class="container container-xxl">
          <div class="row align-items-center">
            <div class="col-lg-6 pr-xl-8 pb-lg-0 pb-6" data-animate="fadeInLeft">
              <a href="#" class="hover-shine d-block">
                <img src="images/single-image-01.jpg" class="rounded-lg w-100"
                           alt="Find your neighborhood">
              </a>
            </div>
            <div class="col-lg-6 pl-xl-8" data-animate="fadeInRight">
              <h2 class="text-white lh-1625">Find your<br/>
                neighborhood</h2>
              <span class="heading-divider"></span>
              <p class="mb-6 text-white">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse</p>
              <div class="input-group input-group-lg pr-sm-17">
                <input type="text"
                             class="form-control fs-13 font-weight-500 text-gray-light rounded-lg rounded-right-0 border-0 shadow-none h-52 bg-white"
                             name="search" placeholder="Enter an address, neighbourhood">
                <button type="submit" class="btn btn-primary fs-18 rounded-left-0 rounded-lg px-6 border-0">
                  <i class="far fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pt-lg-12 pb-lg-15 py-11">
      <div class="container container-xxl">
        <h2 class="text-heading">Destinations We Love The Most</h2>
        <span class="heading-divider"></span>
        <p class="mb-7">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
        <div class="slick-slider mx-n2"
           data-slick-options='{"slidesToShow": 5,"arrows":false, "autoplay":false,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
          <div class="box px-2" data-animate="fadeInUp">
            <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
              <img src="images/properties-city-01.jpg" class="card-img" alt="New York">
              <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                                                  class="text-white">New York</a></h2>
                <p class="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span
                              class="ml-2 fs-15 font-weight-bold">$540.000 - $900.000</span></p>
              </div>
            </div>
          </div>
          <div class="box px-2" data-animate="fadeInUp">
            <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
              <img src="images/properties-city-02.jpg" class="card-img" alt="Los Angeles">
              <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                                                  class="text-white">Los Angeles</a></h2>
                <p class="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span
                              class="ml-2 fs-15 font-weight-bold">$520.000 - $700.000</span></p>
              </div>
            </div>
          </div>
          <div class="box px-2" data-animate="fadeInUp">
            <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
              <img src="images/properties-city-03.jpg" class="card-img" alt="San Jose">
              <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                                                  class="text-white">San Jose</a></h2>
                <p class="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span
                              class="ml-2 fs-15 font-weight-bold">$340.000 - $600.000</span></p>
              </div>
            </div>
          </div>
          <div class="box px-2" data-animate="fadeInUp">
            <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
              <img src="images/properties-city-04.jpg" class="card-img" alt="Fort Worth">
              <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                                                  class="text-white">Fort Worth</a></h2>
                <p class="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span
                              class="ml-2 fs-15 font-weight-bold">$240.000 - $660.000</span></p>
              </div>
            </div>
          </div>
          <div class="box px-2" data-animate="fadeInUp">
            <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
              <img src="images/properties-city-05.jpg" class="card-img" alt="Kansas City">
              <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                <h2 class="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html"
                                                                  class="text-white">Kansas City</a></h2>
                <p class="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span
                              class="ml-2 fs-15 font-weight-bold">$380.000 - $680.000</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-accent pt-10 pb-lg-11 pb-8 bg-patten-04">
      <div class="container container-xxl">
        <h2 class="text-dark text-center mxw-751 fs-26 lh-184 px-md-8">
          We have the most listings and constant updates.
          So you’ll never miss out.</h2>
        <span class="heading-divider mx-auto"></span>
        <div class="row mt-8">
          <div class="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
            <div class="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
              <div class="row no-gutters">
                <div class="col-sm-3">
                  <img src="images/group-16.png"
                               alt="Buy a new home">
                </div>
                <div class="col-sm-9">
                  <div class="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                    <a href="single-property-1.html"
                                 class="d-flex align-items-center text-dark hover-secondary"><h4
                                      class="fs-20 lh-1625 mb-1">Buy a new home </h4>
                      <span class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                        <svg class="icon icon-long-arrow"><use
                                          xlink:href="#icon-long-arrow"></use></svg>
                      </span>
                    </a>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
            <div class="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
              <div class="row no-gutters">
                <div class="col-sm-3">
                  <img src="images/group-17.png"
                               alt="Sell a home">
                </div>
                <div class="col-sm-9">
                  <div class="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                    <a href="single-property-1.html"
                                 class="d-flex align-items-center text-dark hover-secondary"><h4
                                      class="fs-20 lh-1625 mb-1">Sell a home </h4>
                      <span class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                        <svg class="icon icon-long-arrow"><use
                                          xlink:href="#icon-long-arrow"></use></svg>
                      </span>
                    </a>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
            <div class="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
              <div class="row no-gutters">
                <div class="col-sm-3">
                  <img src="images/group-21.png"
                               alt="Rent a home">
                </div>
                <div class="col-sm-9">
                  <div class="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                    <a href="single-property-1.html"
                                 class="d-flex align-items-center text-dark hover-secondary"><h4
                                      class="fs-20 lh-1625 mb-1">Rent a home </h4>
                      <span class="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                        <svg class="icon icon-long-arrow"><use
                                          xlink:href="#icon-long-arrow"></use></svg>
                      </span>
                    </a>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container container-xxl">
        <div class="py-lg-8 py-6 border-top">
          <div class="slick-slider mx-0 partners"
               data-slick-options='{"slidesToShow": 6, "autoplay":true,"dots":false,"arrows":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":4}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 3}},{"breakpoint": 576,"settings": {"slidesToShow": 2}}]}'>
            <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
              <a href="#" class="item position-relative hover-change-image">
                <img src="images/partner-hover-1.png"
                           class="hover-image position-absolute pos-fixed-top" alt="Partner 1">
                <img src="images/partner-1.png" alt="Partner 1"
                           class="image">
              </a>
            </div>
            <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
              <a href="#" class="item position-relative hover-change-image">
                <img src="images/partner-hover-2.png"
                           class="hover-image position-absolute pos-fixed-top" alt="Partner 2">
                <img src="images/partner-2.png" alt="Partner 2"
                           class="image">
              </a>
            </div>
            <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
              <a href="#" class="item position-relative hover-change-image">
                <img src="images/partner-hover-3.png"
                           class="hover-image position-absolute pos-fixed-top" alt="Partner 3">
                <img src="images/partner-3.png" alt="Partner 3"
                           class="image">
              </a>
            </div>
            <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
              <a href="#" class="item">
                <img src="images/partner-4.png" alt=""
                           class="image">
              </a>
            </div>
            <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
              <a href="#" class="item position-relative hover-change-image">
                <img src="images/partner-hover-5.png"
                           class="hover-image position-absolute pos-fixed-top" alt="Partner 5">
                <img src="images/partner-5.png" alt="Partner 5"
                           class="image">
              </a>
            </div>
            <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
              <a href="#" class="item">
                <img src="images/partner-6.png" alt=""
                           class="image">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div id="compare" class="compare">
      <button class="btn shadow btn-open bg-white bg-hover-accent text-secondary rounded-right-0 d-flex justify-content-center align-items-center w-30px h-140 p-0">
      </button>
      <div class="list-group list-group-no-border bg-dark py-3">
        <a href="#" class="list-group-item bg-transparent text-white fs-22 text-center py-0">
          <i class="far fa-bars"></i>
        </a>
        <div class="list-group-item card bg-transparent">
          <div class="position-relative hover-change-image bg-hover-overlay">
            <img src="images/compare-01.jpg" class="card-img" alt="properties">
            <div class="card-img-overlay">
              <a href="#" class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i class="fal fa-minus-circle"></i></a>
            </div>
          </div>
        </div>
        <div class="list-group-item card bg-transparent">
          <div class="position-relative hover-change-image bg-hover-overlay">
            <img src="images/compare-02.jpg" class="card-img" alt="properties">
            <div class="card-img-overlay">
              <a href="#" class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i class="fal fa-minus-circle"></i></a>
            </div>
          </div>
        </div>
        <div class="list-group-item card card bg-transparent">
          <div class="position-relative hover-change-image bg-hover-overlay ">
            <img src="images/compare-03.jpg" class="card-img" alt="properties">
            <div class="card-img-overlay">
              <a href="#" class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i class="fal fa-minus-circle"></i></a>
            </div>
          </div>
        </div>
        <div class="list-group-item bg-transparent">
          <a href="compare-details.html" class="btn btn-lg btn-primary w-100 px-0 d-flex justify-content-center">
            Compare
          </a>
        </div>
      </div>
    </div>
  </main>
  <footer class="bg-dark pt-8 pb-6 footer text-muted">
    <div class="container container-xxl">
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
          <a class="d-block mb-2" href="#">
            <img src="images/logo-white-primary.png" alt="HomeID">
          </a>
          <div class="lh-26 font-weight-500">
            <p class="mb-0">58 Howard Street #2 San Francisco</p>
            <a class="d-block text-muted hover-white" href="mailto:contact@homeid.com">contact@homeid.com</a>
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
              <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Apartment for Rent</a>
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
              <input type="email" name="email" class="form-control bg-white shadow-none border-0 z-index-1" placeholder="Your email">
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
@endsection

@push('styleUs')  
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Real Estate Html Template">
<meta name="author" content="">
<meta name="generator" content="Jekyll">
<title>Home 01 - HomeID</title>
<!-- Google fonts -->
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet">
<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('assets/vendors/fontawesome-pro-5/css/all.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/slick/slick.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/magnific-popup/magnific-popup.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/jquery-ui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/chartjs/Chart.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/dropzone/css/dropzone.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/animate.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/timepicker/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/mapbox-gl/mapbox-gl.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/dataTables/jquery.dataTables.min.css')}}">
<!-- Themes core CSS -->
<link rel="stylesheet" href="{{asset('assets/css/themes.css')}}">
<!-- Favicons -->
<link rel="icon" href="images/favicon.ico">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@">
<meta name="twitter:creator" content="@">
<meta name="twitter:title" content="Home 01">
<meta name="twitter:description" content="Real Estate Html Template">
<meta name="twitter:image" content="images/homeid-social-logo.png">
<!-- Facebook -->
<meta property="og:url" content="home-01.html">
<meta property="og:title" content="Home 01">
<meta property="og:description" content="Real Estate Html Template">
<meta property="og:type" content="website">
<meta property="og:image" content="images/homeid-social.png">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
@endpush
@push('scriptUs')
<script src="{{asset('assets/vendors/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/bootstrap.bundle.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/vendors/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/vendors/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/vendors/counter/countUp.js')}}"></script>
<script src="{{asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/dropzone/js/dropzone.min.js')}}"></script>
<script src="{{asset('assets/vendors/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/vendors/hc-sticky/hc-sticky.min.js')}}"></script>
<script src="{{asset('assets/vendors/jparallax/TweenMax.min.js')}}"></script>
<script src="{{asset('assets/vendors/mapbox-gl/mapbox-gl.js')}}"></script>
<script src="{{asset('assets/vendors/dataTables/jquery.dataTables.min.js')}}"></script>
<!-- Theme scripts -->
<script src="{{asset('assets/js/theme.js')}}"></script>

@endpush