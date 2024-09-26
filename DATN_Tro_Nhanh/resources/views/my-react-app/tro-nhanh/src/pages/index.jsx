import React from "react";
import { List, Page, Icon, useNavigate } from "zmp-ui";
import { useRecoilValue } from "recoil";
import { userState } from "../state";
import { Helmet } from "react-helmet";



const HomePage = () => {
  const user = useRecoilValue(userState);
  const navigate = useNavigate();


  return (

    <main id="content">
      <Helmet>
        <meta charSet="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Real Estate Html Template" />
        <meta name="author" content />
        <meta name="generator" content="Jekyll" />
        <title>Home 01 - HomeID</title>
        {/* Google fonts */}
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
        {/* Vendors CSS */}
        <link rel="stylesheet" href="/assets/vendors/fontawesome-pro-5/css/all.css" />
        <link rel="stylesheet" href="/assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
        <link rel="stylesheet" href="/assets/vendors/slick/slick.min.css" />
        <link rel="stylesheet" href="/assets/vendors/magnific-popup/magnific-popup.min.css" />
        <link rel="stylesheet" href="/assets/vendors/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="/assets/vendors/chartjs/Chart.min.css" />
        <link rel="stylesheet" href="/assets/vendors/dropzone/css/dropzone.min.css" />
        <link rel="stylesheet" href="/assets/vendors/animate.css" />
        <link rel="stylesheet" href="/assets/vendors/timepicker/bootstrap-timepicker.min.css" />
        <link rel="stylesheet" href="/assets/vendors/mapbox-gl/mapbox-gl.min.css" />
        <link rel="stylesheet" href="/assets/vendors/dataTables/jquery.dataTables.min.css" />
        {/* Themes core CSS */}
        <link rel="stylesheet" href="/assets/css/themes.css" />
        {/* Favicons */}
        <link rel="icon" href="/assets/images/favicon.ico" />
        {/* Twitter */}
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@" />
        <meta name="twitter:creator" content="@" />
        <meta name="twitter:title" content="Home 01" />
        <meta name="twitter:description" content="Real Estate Html Template" />
        <meta name="twitter:image" content="images/homeid-social-logo.png" />
        {/* Facebook */}
        <meta property="og:url" content="home-01.html" />
        <meta property="og:title" content="Home 01" />
        <meta property="og:description" content="Real Estate Html Template" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="/assets/images/homeid-social.png" />
        <meta property="og:image:type" content="/assets/image/png" />
        <meta property="og:image:width" content={1200} />
        <meta property="og:image:height" content={630} />
        <script src="/assets/vendors/jquery.min.js"></script>
        <script src="/assets/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="/assets/vendors/bootstrap/bootstrap.bundle.js"></script>
        <script src="/assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
        <script src="/assets/vendors/slick/slick.min.js"></script>
        <script src="/assets/vendors/waypoints/jquery.waypoints.min.js"></script>
        <script src="/assets/vendors/counter/countUp.js"></script>
        <script src="/assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="/assets/vendors/chartjs/Chart.min.js"></script>
        <script src="/assets/vendors/dropzone/js/dropzone.min.js"></script>
        <script src="/assets/vendors/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="/assets/vendors/hc-sticky/hc-sticky.min.js"></script>
        <script src="/assets/vendors/jparallax/TweenMax.min.js"></script>
        <script src="/assets/vendors/mapbox-gl/mapbox-gl.js"></script>
        <script src="/assets/vendors/dataTables/jquery.dataTables.min.js"></script>
        {/* <!-- Theme scripts --> */}
        <script src="/assets/js/theme.js"></script>
      </Helmet>
      <section className="d-flex flex-column">
        <div style={{ backgroundImage: 'url("/assets/images/bg-home-01.jpg")' }} className="bg-cover d-flex align-items-center custom-vh-100">
          <div className="container pt-lg-15 py-8" data-animate="zoomIn">
            <p className="text-white fs-md-22 fs-18 font-weight-500 letter-spacing-367 mb-6 text-center text-uppercase">Let
              us guide your home</p>
            <h2 className="text-white display-2 text-center mb-sm-13 mb-8">Find Your Dream Home</h2>
            <form className="property-search py-lg-0 z-index-2 position-relative d-none d-lg-block">
              <div className="row no-gutters">
                <div className="col-md-5 col-lg-4 col-xl-3">
                  <input className="search-field" type="hidden" name="status" defaultValue="for-sale" data-default-value />
                  <ul className="nav nav-pills property-search-status-tab">
                    <li className="nav-item bg-secondary rounded-top" role="presentation">
                      <a href="#" role="tab" aria-selected="true" className="nav-link btn shadow-none rounded-bottom-0 text-white text-btn-focus-secondary text-uppercase d-flex align-items-center fs-13 rounded-bottom-0 bg-active-white text-active-secondary letter-spacing-087 flex-md-1 px-4 py-2 active" data-toggle="pill" data-value="for-sale">
                        <svg className="icon icon-villa fs-22 mr-2">
                          <use xlinkHref="#icon-villa" />
                        </svg>
                        for sale
                      </a>
                    </li>
                    <li className="nav-item bg-secondary rounded-top" role="presentation">
                      <a href="#" role="tab" aria-selected="true" className="nav-link btn shadow-none rounded-bottom-0 text-white text-btn-focus-secondary text-uppercase d-flex align-items-center fs-13 rounded-bottom-0 bg-active-white text-active-secondary letter-spacing-087 flex-md-1 px-4 py-2" data-toggle="pill" data-value="for-rent">
                        <svg className="icon icon-building fs-22 mr-2">
                          <use xlinkHref="#icon-building" />
                        </svg>
                        for rent
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div className="bg-white px-6 rounded-bottom rounded-top-right pb-6 pb-lg-0">
                <div className="row align-items-center" id="accordion-4">
                  <div className="col-md-6 col-lg-3 col-xl-3 pt-6 pt-lg-0 order-1">
                    <label className="text-uppercase font-weight-500 letter-spacing-093 mb-1">Home Type</label>
                    <select className="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="Select" data-style="p-0 h-24 lh-17 text-dark" name="type">
                      <option>Condominium</option>
                      <option>Single-Family Home</option>
                      <option>Townhouse</option>
                      <option>Multi-Family Home</option>
                    </select>
                  </div>
                  <div className="col-md-6 col-lg-4 col-xl-5 pt-6 pt-lg-0 order-2">
                    <label className="text-uppercase font-weight-500 letter-spacing-093">Search</label>
                    <div className="position-relative">
                      <input type="text" name="search" className="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 pl-0 pr-4 font-weight-600 border-color-input placeholder-muted" placeholder="Find something..." />
                      <i className="far fa-search position-absolute pos-fixed-right-center pr-0 fs-18 mt-n3" />
                    </div>
                  </div>
                  <div className="col-sm pr-lg-0 pt-6 pt-lg-0 order-3">
                    <a href="#advanced-search-filters-4" className="btn advanced-search btn-accent h-lg-100 w-100 shadow-none text-secondary rounded-0 fs-14 fs-sm-16 font-weight-600 text-left d-flex align-items-center collapsed" data-toggle="collapse" data-target="#advanced-search-filters-4" aria-expanded="true" aria-controls="advanced-search-filters-4">
                      Advanced Search
                    </a>
                  </div>
                  <div className="col-sm pt-6 pt-lg-0 order-sm-4 order-5">
                    <button type="submit" className="btn btn-primary shadow-none fs-16 font-weight-600 w-100 py-lg-2 lh-213">
                      Search
                    </button>
                  </div>
                  <div id="advanced-search-filters-4" className="col-12 pt-4 pb-sm-4 order-sm-5 order-4 collapse" data-parent="#accordion-4">
                    <div className="row">
                      <div className="col-sm-6 col-lg-3 pt-6">
                        <label className="text-uppercase font-weight-500 letter-spacing-093 mb-1">Bedrooms</label>
                        <select className="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" name="bedroom" title="All Bedrooms" data-style="p-0 h-24 lh-17 text-dark">
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
                      <div className="col-sm-6 col-lg-3 pt-6">
                        <label className="text-uppercase font-weight-500 letter-spacing-093 mb-1">Bathrooms</label>
                        <select className="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="All Bathrooms" data-style="p-0 h-24 lh-17 text-dark" name="bathroom">
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
                      <div className="col-sm-6 col-lg-3 pt-6">
                        <label className="text-uppercase font-weight-500 letter-spacing-093 mb-1">All
                          Cities</label>
                        <select className="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" name="city" title="All Cities" data-style="p-0 h-24 lh-17 text-dark">
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
                      <div className="col-sm-6 col-lg-3 pt-6">
                        <label className="text-uppercase font-weight-500 letter-spacing-093 mb-1">All
                          Areas</label>
                        <select className="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" name="areas" title="All Areas" data-style="p-0 h-24 lh-17 text-dark">
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
                    <div className="row pt-2">
                      <div className="col-md-6 col-lg-4 pt-6 slider-range slider-range-secondary">
                        <label htmlFor="price-1-4" className="mb-4 text-gray-light">Price Range</label>
                        <div data-slider="true" data-slider-options="{&quot;min&quot;:0,&quot;max&quot;:1000000,&quot;values&quot;:[100000,700000],&quot;type&quot;:&quot;currency&quot;}" />
                        <div className="text-center mt-2">
                          <input id="price-1-4" type="text" readOnly name="price" className="border-0 amount text-center text-body font-weight-500 bg-transparent" />
                        </div>
                      </div>
                      <div className="col-md-6 col-lg-4 pt-6 slider-range slider-range-secondary">
                        <label htmlFor="area-size-4" className="mb-4 text-gray-light">Area Size</label>
                        <div data-slider="true" data-slider-options="{&quot;min&quot;:0,&quot;max&quot;:15000,&quot;values&quot;:[0,13000],&quot;type&quot;:&quot;currency&quot;}" />
                        <div className="text-center mt-2">
                          <input id="area-size-4" type="text" readOnly name="area" className="border-0 amount text-center text-body font-weight-500 bg-transparent" />
                        </div>
                      </div>
                      <div className="col-sm-6 col-lg-3 pt-6">
                        <label className="text-uppercase font-weight-500 letter-spacing-093 mb-1">Property
                          ID</label>
                        <input type="text" name="search" className="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 p-0 font-weight-600 border-color-input" placeholder="Enter ID..." />
                      </div>
                      <div className="col-12 pt-6 pb-2">
                        <a className="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse" href="#other-feature-4" role="button" aria-expanded="false" aria-controls="other-feature-4">
                          <span className="fs-15 text-heading font-weight-500 hover-primary">Other Features</span>
                        </a>
                      </div>
                      <div className="collapse row mx-0 w-100" id="other-feature-4">
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check1-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check1-4">Air Conditioning</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check2-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check2-4">Laundry</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check4-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check4-4">Washer</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check5-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check5-4">Barbeque</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check6-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check6-4">Lawn</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check7-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check7-4">Sauna</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check8-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check8-4">WiFi</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check9-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check9-4">Dryer</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check10-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check10-4">Microwave</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check11-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check11-4">Swimming Pool</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check12-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check12-4">Window Coverings</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check13-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check13-4">Gym</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check14-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check14-4">Outdoor Shower</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check15-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check15-4">TV Cable</label>
                          </div>
                        </div>
                        <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                          <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="check16-4" name="features[]" />
                            <label className="custom-control-label" htmlFor="check16-4">Refrigerator</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <form className="property-search property-search-mobile d-lg-none z-index-2 position-relative bg-white rounded mx-md-10">
              <div className="row align-items-lg-center" id="accordion-4-mobile">
                <div className="col-12">
                  <div className="form-group mb-0 position-relative">
                    <a href="#advanced-search-filters-4-mobile" className="text-secondary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed" data-toggle="collapse" data-target="#advanced-search-filters-4-mobile" aria-expanded="true" aria-controls="advanced-search-filters-4-mobile">
                    </a>
                    <input type="text" className="form-control form-control-lg border shadow-none pr-9 pl-11 bg-white placeholder-muted" name="key-word" placeholder="Search..." />
                    <button type="submit" className="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left">
                      <i className="far fa-search" />
                    </button>
                  </div>
                </div>
                <div id="advanced-search-filters-4-mobile" className="col-12 pt-2 px-7 collapse" data-parent="#accordion-4-mobile">
                  <div className="row mx-n2">
                    <div className="col-sm-6 pt-4 px-2">
                      <select className="form-control border shadow-none form-control-lg selectpicker bg-transparent" title="Select" data-style="btn-lg py-2 h-52 bg-transparent" name="type">
                        <option>All status</option>
                        <option>For Rent</option>
                        <option>For Sale</option>
                      </select>
                    </div>
                    <div className="col-sm-6 pt-4 px-2">
                      <select className="form-control border shadow-none form-control-lg selectpicker bg-transparent" title="All Types" data-style="btn-lg py-2 h-52 bg-transparent" name="type">
                        <option>Condominium</option>
                        <option>Single-Family Home</option>
                        <option>Townhouse</option>
                        <option>Multi-Family Home</option>
                      </select>
                    </div>
                    <div className="col-sm-6 pt-4 px-2">
                      <select className="form-control border shadow-none form-control-lg selectpicker bg-transparent" name="bedroom" title="Bedrooms" data-style="btn-lg py-2 h-52 bg-transparent">
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
                    <div className="col-sm-6 pt-4 px-2">
                      <select className="form-control border shadow-none form-control-lg selectpicker bg-transparent" name="bathrooms" title="Bathrooms" data-style="btn-lg py-2 h-52 bg-transparent">
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
                    <div className="col-sm-6 pt-4 px-2">
                      <select className="form-control border shadow-none form-control-lg selectpicker bg-transparent" title="All Cities" data-style="btn-lg py-2 h-52 bg-transparent" name="city">
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
                    <div className="col-sm-6 pt-4 px-2">
                      <select className="form-control border shadow-none form-control-lg selectpicker bg-transparent" name="areas" title="All Areas" data-style="btn-lg py-2 h-52 bg-transparent">
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
                  <div className="row">
                    <div className="col-md-6 pt-6 slider-range slider-range-secondary">
                      <label htmlFor="price-4-mobile" className="mb-4 text-white">Price Range</label>
                      <div data-slider="true" data-slider-options="{&quot;min&quot;:0,&quot;max&quot;:1000000,&quot;values&quot;:[100000,700000],&quot;type&quot;:&quot;currency&quot;}" />
                      <div className="text-center mt-2">
                        <input id="price-4-mobile" type="text" readOnly className="border-0 amount text-center bg-transparent font-weight-500" name="price" />
                      </div>
                    </div>
                    <div className="col-md-6 pt-6 slider-range slider-range-secondary">
                      <label htmlFor="area-size-4-mobile" className="mb-4">Area Size</label>
                      <div data-slider="true" data-slider-options="{&quot;min&quot;:0,&quot;max&quot;:15000,&quot;values&quot;:[0,12000],&quot;type&quot;:&quot;sqrt&quot;}" />
                      <div className="text-center mt-2">
                        <input id="area-size-4-mobile" type="text" readOnly className="border-0 amount text-center bg-transparent font-weight-500" name="area" />
                      </div>
                    </div>
                    <div className="col-12 pt-4 pb-2">
                      <a className="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse" href="#other-feature-4-mobile" role="button" aria-expanded="false" aria-controls="other-feature-4-mobile">
                        <span className="fs-15 font-weight-500 hover-primary">Other Features</span>
                      </a>
                    </div>
                    <div className="collapse row mx-0 w-100" id="other-feature-4-mobile">
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check1-4-mobile" />
                          <label className="custom-control-label" htmlFor="check1-4-mobile">Air
                            Conditioning</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check2-4-mobile" />
                          <label className="custom-control-label" htmlFor="check2-4-mobile">Laundry</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check4-4-mobile" />
                          <label className="custom-control-label" htmlFor="check4-4-mobile">Washer</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check5-4-mobile" />
                          <label className="custom-control-label" htmlFor="check5-4-mobile">Barbeque</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check6-4-mobile" />
                          <label className="custom-control-label" htmlFor="check6-4-mobile">Lawn</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check7-4-mobile" />
                          <label className="custom-control-label" htmlFor="check7-4-mobile">Sauna</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check8-4-mobile" />
                          <label className="custom-control-label" htmlFor="check8-4-mobile">WiFi</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check9-4-mobile" />
                          <label className="custom-control-label" htmlFor="check9-4-mobile">Dryer</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check10-4-mobile" />
                          <label className="custom-control-label" htmlFor="check10-4-mobile">Microwave</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check11-4-mobile" />
                          <label className="custom-control-label" htmlFor="check11-4-mobile">Swimming
                            Pool</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check12-4-mobile" />
                          <label className="custom-control-label" htmlFor="check12-4-mobile">Window
                            Coverings</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check13-4-mobile" />
                          <label className="custom-control-label" htmlFor="check13-4-mobile">Gym</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check14-4-mobile" />
                          <label className="custom-control-label" htmlFor="check14-4-mobile">Outdoor
                            Shower</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check15-4-mobile" />
                          <label className="custom-control-label" htmlFor="check15-4-mobile">TV Cable</label>
                        </div>
                      </div>
                      <div className="col-sm-6 py-2">
                        <div className="custom-control custom-checkbox">
                          <input type="checkbox" className="custom-control-input" name="features[]" id="check16-4-mobile" />
                          <label className="custom-control-label" htmlFor="check16-4-mobile">Refrigerator</label>
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
      <section className="pt-lg-12 pb-lg-10 py-11">
        <div className="container container-xxl">
          <div className="row">
            <div className="col-md-6">
              <h2 className="text-heading">Best Properties For Sale</h2>
              <span className="heading-divider" />
              <p className="mb-6">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
            </div>
            <div className="col-md-6 text-md-right">
              <a href="listing-grid-with-left-filter.html" className="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">See all properties
                <i className="far fa-long-arrow-right ml-1" />
              </a>
            </div>
          </div>
          <div className="slick-slider slick-dots-mt-0 custom-arrow-spacing-30" data-slick-options="{&quot;slidesToShow&quot;: 4, &quot;autoplay&quot;:true,&quot;dots&quot;:true,&quot;responsive&quot;:[{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;:3,&quot;arrows&quot;:false}},{&quot;breakpoint&quot;: 992,&quot;settings&quot;: {&quot;slidesToShow&quot;:2,&quot;arrows&quot;:false}},{&quot;breakpoint&quot;: 768,&quot;settings&quot;: {&quot;slidesToShow&quot;: 2,&quot;arrows&quot;:false,&quot;dots&quot;:true,&quot;autoplay&quot;:true}},{&quot;breakpoint&quot;: 576,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1,&quot;arrows&quot;:false,&quot;dots&quot;:true,&quot;autoplay&quot;:true}}]}">
            <div className="box pb-7 pt-2">
              <div className="card shadow-hover-2" data-animate="zoomIn">
                <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                  <img src="/assets/images/properties-grid-02.jpg" alt="Home in Metric Way" />
                  <div className="card-img-overlay p-2 d-flex flex-column">
                    <div>
                      <span className="badge mr-2 badge-orange">featured</span>
                      <span className="badge mr-2 badge-primary">for Sale</span>
                    </div>
                    <ul className="list-inline mb-0 mt-auto hover-image">
                      <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-images" /><span className="pl-1">9</span>
                        </a>
                      </li>
                      <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-play-circle" /><span className="pl-1">2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="card-body pt-3">
                  <h2 className="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html" className="text-dark hover-primary">Home in Metric Way</a></h2>
                  <p className="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                  <ul className="list-inline d-flex mb-0 flex-wrap mr-n5">
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                      <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-bedroom" />
                      </svg>
                      3 Br
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                      <svg className="icon icon-shower fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-shower" />
                      </svg>
                      3 Ba
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                      <svg className="icon icon-square fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-square" />
                      </svg>
                      2300 Sq.Ft
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                      <svg className="icon icon-Garage fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-Garage" />
                      </svg>
                      1 Gr
                    </li>
                  </ul>
                </div>
                <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                  <p className="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent" data-toggle="tooltip" title="Wishlist"><i className="fas fa-heart" /></a>
                    </li>
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Compare"><i className="fas fa-exchange-alt" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div className="box pb-7 pt-2">
              <div className="card shadow-hover-2" data-animate="zoomIn">
                <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                  <img src="/assets/images/properties-grid-01.jpg" alt="Affordable Urban House" />
                  <div className="card-img-overlay p-2 d-flex flex-column">
                    <div>
                      <span className="badge mr-2 badge-primary">for Sale</span>
                    </div>
                    <ul className="list-inline mb-0 mt-auto hover-image">
                      <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-images" /><span className="pl-1">9</span>
                        </a>
                      </li>
                      <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-play-circle" /><span className="pl-1">2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="card-body pt-3">
                  <h2 className="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html" className="text-dark hover-primary">Affordable Urban House</a></h2>
                  <p className="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                  <ul className="list-inline d-flex mb-0 flex-wrap mr-n5">
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                      <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-bedroom" />
                      </svg>
                      3 Br
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                      <svg className="icon icon-shower fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-shower" />
                      </svg>
                      3 Ba
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                      <svg className="icon icon-square fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-square" />
                      </svg>
                      2300 Sq.Ft
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                      <svg className="icon icon-Garage fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-Garage" />
                      </svg>
                      1 Gr
                    </li>
                  </ul>
                </div>
                <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                  <p className="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Wishlist"><i className="far fa-heart" /></a>
                    </li>
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Compare"><i className="fas fa-exchange-alt" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div className="box pb-7 pt-2">
              <div className="card shadow-hover-2" data-animate="zoomIn">
                <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                  <img src="/assets/images/properties-grid-03.jpg" alt="Villa on Hollywood Boulevard" />
                  <div className="card-img-overlay p-2 d-flex flex-column">
                    <div>
                      <span className="badge mr-2 badge-primary">for Sale</span>
                    </div>
                    <ul className="list-inline mb-0 mt-auto hover-image">
                      <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-images" /><span className="pl-1">9</span>
                        </a>
                      </li>
                      <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-play-circle" /><span className="pl-1">2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="card-body pt-3">
                  <h2 className="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html" className="text-dark hover-primary">Villa on Hollywood Boulevard</a></h2>
                  <p className="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                  <ul className="list-inline d-flex mb-0 flex-wrap mr-n5">
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                      <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-bedroom" />
                      </svg>
                      3 Br
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                      <svg className="icon icon-shower fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-shower" />
                      </svg>
                      3 Ba
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                      <svg className="icon icon-square fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-square" />
                      </svg>
                      2300 Sq.Ft
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                      <svg className="icon icon-Garage fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-Garage" />
                      </svg>
                      1 Gr
                    </li>
                  </ul>
                </div>
                <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                  <p className="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Wishlist"><i className="far fa-heart" /></a>
                    </li>
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Compare"><i className="fas fa-exchange-alt" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div className="box pb-7 pt-2">
              <div className="card shadow-hover-2" data-animate="zoomIn">
                <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                  <img src="/assets/images/properties-grid-04.jpg" alt="Home in Metric Way" />
                  <div className="card-img-overlay p-2 d-flex flex-column">
                    <div>
                      <span className="badge mr-2 badge-orange">featured</span>
                      <span className="badge mr-2 badge-primary">for Sale</span>
                    </div>
                    <ul className="list-inline mb-0 mt-auto hover-image">
                      <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-images" /><span className="pl-1">9</span>
                        </a>
                      </li>
                      <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-play-circle" /><span className="pl-1">2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="card-body pt-3">
                  <h2 className="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html" className="text-dark hover-primary">Home in Metric Way</a></h2>
                  <p className="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                  <ul className="list-inline d-flex mb-0 flex-wrap mr-n5">
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                      <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-bedroom" />
                      </svg>
                      3 Br
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                      <svg className="icon icon-shower fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-shower" />
                      </svg>
                      3 Ba
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                      <svg className="icon icon-square fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-square" />
                      </svg>
                      2300 Sq.Ft
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                      <svg className="icon icon-Garage fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-Garage" />
                      </svg>
                      1 Gr
                    </li>
                  </ul>
                </div>
                <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                  <p className="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Wishlist"><i className="far fa-heart" /></a>
                    </li>
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Compare"><i className="fas fa-exchange-alt" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div className="box pb-7 pt-2">
              <div className="card shadow-hover-2" data-animate="zoomIn">
                <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                  <img src="/assets/images/properties-grid-02.jpg" alt="Home in Metric Way" />
                  <div className="card-img-overlay p-2 d-flex flex-column">
                    <div>
                      <span className="badge mr-2 badge-orange">featured</span>
                      <span className="badge mr-2 badge-primary">for Sale</span>
                    </div>
                    <ul className="list-inline mb-0 mt-auto hover-image">
                      <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-images" /><span className="pl-1">9</span>
                        </a>
                      </li>
                      <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-play-circle" /><span className="pl-1">2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="card-body pt-3">
                  <h2 className="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html" className="text-dark hover-primary">Home in Metric Way</a></h2>
                  <p className="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                  <ul className="list-inline d-flex mb-0 flex-wrap mr-n5">
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                      <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-bedroom" />
                      </svg>
                      3 Br
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                      <svg className="icon icon-shower fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-shower" />
                      </svg>
                      3 Ba
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                      <svg className="icon icon-square fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-square" />
                      </svg>
                      2300 Sq.Ft
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                      <svg className="icon icon-Garage fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-Garage" />
                      </svg>
                      1 Gr
                    </li>
                  </ul>
                </div>
                <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                  <p className="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Wishlist"><i className="far fa-heart" /></a>
                    </li>
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Compare"><i className="fas fa-exchange-alt" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div className="bg-gray-02 py-lg-13 pt-11 pb-6">
          <div className="container container-xxl">
            <div className="row">
              <div className="col-lg-4 pr-xl-13" data-animate="fadeInLeft">
                <h2 className="text-heading lh-1625">Explore <br />
                  by Property Type</h2>
                <span className="heading-divider" />
                <p className="mb-6">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
                <a href="listing-grid-with-left-filter.html" className="btn btn-lg text-secondary btn-accent">+2300 Available Properties
                  <i className="far fa-long-arrow-right ml-1" />
                </a>
              </div>
              <div className="col-lg-8" data-animate="fadeInRight">
                <div className="slick-slider arrow-haft-inner custom-arrow-xxl-hide mx-0" data-slick-options="{&quot;slidesToShow&quot;: 4, &quot;autoplay&quot;:true,&quot;dots&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;:3,&quot;arrows&quot;:false}},{&quot;breakpoint&quot;: 992,&quot;settings&quot;: {&quot;slidesToShow&quot;:3,&quot;arrows&quot;:false}},{&quot;breakpoint&quot;: 768,&quot;settings&quot;: {&quot;slidesToShow&quot;: 3,&quot;arrows&quot;:false,&quot;autoplay&quot;:true}},{&quot;breakpoint&quot;: 576,&quot;settings&quot;: {&quot;slidesToShow&quot;: 2,&quot;arrows&quot;:false,&quot;autoplay&quot;:true}}]}">
                  <div className="box px-0 py-6">
                    <a href="listing-grid-with-left-filter.html" className="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                      <img src="/assets/images/verified.png" className="card-img-top" alt="Apartment" />
                      <div className="card-body px-0 pt-5 pb-0">
                        <h4 className="card-title fs-16 lh-2 text-dark mb-0">Apartment</h4>
                      </div>
                    </a>
                  </div>
                  <div className="box px-0 py-6">
                    <a href="listing-grid-with-left-filter.html" className="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                      <img src="/assets/images/sofa.png" className="card-img-top" alt="House" />
                      <div className="card-body px-0 pt-5 pb-0">
                        <h4 className="card-title fs-16 lh-2 text-dark mb-0">House</h4>
                      </div>
                    </a>
                  </div>
                  <div className="box px-0 py-6">
                    <a href="listing-grid-with-left-filter.html" className="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                      <img src="/assets/images/architecture-and-city.png" className="card-img-top" alt="Office" />
                      <div className="card-body px-0 pt-5 pb-0">
                        <h4 className="card-title fs-16 lh-2 text-dark mb-0">Office</h4>
                      </div>
                    </a>
                  </div>
                  <div className="box px-0 py-6">
                    <a href="listing-grid-with-left-filter.html" className="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                      <img src="/assets/images/eco-house.png" className="card-img-top" alt="Villa" />
                      <div className="card-body px-0 pt-5 pb-0">
                        <h4 className="card-title fs-16 lh-2 text-dark mb-0">Villa</h4>
                      </div>
                    </a>
                  </div>
                  <div className="box px-0 py-6">
                    <a href="listing-grid-with-left-filter.html" className="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                      <img src="/assets/images/verified.png" className="card-img-top" alt="Apartment" />
                      <div className="card-body px-0 pt-5 pb-0">
                        <h4 className="card-title fs-16 lh-2 text-dark mb-0">Apartment</h4>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section className="pt-lg-12 pb-lg-11 py-11">
        <div className="container container-xxl">
          <div className="row">
            <div className="col-md-6">
              <h2 className="text-heading">Best Properties For Rent</h2>
              <span className="heading-divider" />
              <p className="mb-6">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
            </div>
            <div className="col-md-6 text-md-right">
              <a href="listing-grid-with-left-filter.html" className="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">See all properties
                <i className="far fa-long-arrow-right ml-1" />
              </a>
            </div>
          </div>
          <div className="slick-slider slick-dots-mt-0 custom-arrow-spacing-30" data-slick-options="{&quot;slidesToShow&quot;: 4,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;:3}},{&quot;breakpoint&quot;: 992,&quot;settings&quot;: {&quot;slidesToShow&quot;:2,&quot;arrows&quot;:false}},{&quot;breakpoint&quot;: 768,&quot;settings&quot;: {&quot;slidesToShow&quot;: 2,&quot;arrows&quot;:false,&quot;dots&quot;:true,&quot;autoplay&quot;:true}},{&quot;breakpoint&quot;: 576,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1,&quot;arrows&quot;:false,&quot;dots&quot;:true,&quot;autoplay&quot;:true}}]}">
            <div className="box box pb-7 pt-2" data-animate="fadeInUp">
              <div className="card shadow-hover-2">
                <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                  <img src="/assets/images/properties-grid-02.jpg" alt="Home in Metric Way" />
                  <div className="card-img-overlay p-2 d-flex flex-column">
                    <div>
                      <span className="badge mr-2 badge-orange">featured</span>
                      <span className="badge mr-2 badge-indigo">for Sale</span>
                    </div>
                    <ul className="list-inline mb-0 mt-auto hover-image">
                      <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-images" /><span className="pl-1">9</span>
                        </a>
                      </li>
                      <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-play-circle" /><span className="pl-1">2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="card-body pt-3">
                  <h2 className="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html" className="text-dark hover-primary">Home in Metric Way</a></h2>
                  <p className="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                  <ul className="list-inline d-flex mb-0 flex-wrap mr-n5">
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                      <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-bedroom" />
                      </svg>
                      3 Br
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                      <svg className="icon icon-shower fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-shower" />
                      </svg>
                      3 Ba
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                      <svg className="icon icon-square fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-square" />
                      </svg>
                      2300 Sq.Ft
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                      <svg className="icon icon-Garage fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-Garage" />
                      </svg>
                      1 Gr
                    </li>
                  </ul>
                </div>
                <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                  <p className="fs-17 font-weight-bold text-heading mb-0">$550<span className="text-gray-light font-weight-500 fs-14"> / month</span></p>
                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent" data-toggle="tooltip" title="Wishlist"><i className="fas fa-heart" /></a>
                    </li>
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Compare"><i className="fas fa-exchange-alt" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div className="box box pb-7 pt-2" data-animate="fadeInUp">
              <div className="card shadow-hover-2">
                <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                  <img src="/assets/images/properties-grid-05.jpg" alt="Affordable Urban House" />
                  <div className="card-img-overlay p-2 d-flex flex-column">
                    <div>
                      <span className="badge mr-2 badge-indigo">for Sale</span>
                    </div>
                    <ul className="list-inline mb-0 mt-auto hover-image">
                      <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-images" /><span className="pl-1">9</span>
                        </a>
                      </li>
                      <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-play-circle" /><span className="pl-1">2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="card-body pt-3">
                  <h2 className="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html" className="text-dark hover-primary">Affordable Urban House</a></h2>
                  <p className="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                  <ul className="list-inline d-flex mb-0 flex-wrap mr-n5">
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                      <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-bedroom" />
                      </svg>
                      3 Br
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                      <svg className="icon icon-shower fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-shower" />
                      </svg>
                      3 Ba
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                      <svg className="icon icon-square fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-square" />
                      </svg>
                      2300 Sq.Ft
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                      <svg className="icon icon-Garage fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-Garage" />
                      </svg>
                      1 Gr
                    </li>
                  </ul>
                </div>
                <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                  <p className="fs-17 font-weight-bold text-heading mb-0">$5.700<span className="text-gray-light font-weight-500 fs-14"> / year</span></p>
                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Wishlist"><i className="far fa-heart" /></a>
                    </li>
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Compare"><i className="fas fa-exchange-alt" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div className="box box pb-7 pt-2" data-animate="fadeInUp">
              <div className="card shadow-hover-2">
                <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                  <img src="/assets/images/properties-grid-06.jpg" alt="Villa on Hollywood Boulevard" />
                  <div className="card-img-overlay p-2 d-flex flex-column">
                    <div>
                      <span className="badge mr-2 badge-indigo">for Sale</span>
                    </div>
                    <ul className="list-inline mb-0 mt-auto hover-image">
                      <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-images" /><span className="pl-1">9</span>
                        </a>
                      </li>
                      <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-play-circle" /><span className="pl-1">2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="card-body pt-3">
                  <h2 className="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html" className="text-dark hover-primary">Villa on Hollywood Boulevard</a></h2>
                  <p className="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                  <ul className="list-inline d-flex mb-0 flex-wrap mr-n5">
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                      <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-bedroom" />
                      </svg>
                      3 Br
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                      <svg className="icon icon-shower fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-shower" />
                      </svg>
                      3 Ba
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                      <svg className="icon icon-square fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-square" />
                      </svg>
                      2300 Sq.Ft
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                      <svg className="icon icon-Garage fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-Garage" />
                      </svg>
                      1 Gr
                    </li>
                  </ul>
                </div>
                <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                  <p className="fs-17 font-weight-bold text-heading mb-0">$550<span className="text-gray-light font-weight-500 fs-14"> / month</span></p>
                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Wishlist"><i className="far fa-heart" /></a>
                    </li>
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Compare"><i className="fas fa-exchange-alt" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div className="box box pb-7 pt-2" data-animate="fadeInUp">
              <div className="card shadow-hover-2">
                <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                  <img src="/assets/images/properties-grid-07.jpg" alt="Home in Metric Way" />
                  <div className="card-img-overlay p-2 d-flex flex-column">
                    <div>
                      <span className="badge mr-2 badge-orange">featured</span>
                      <span className="badge mr-2 badge-indigo">for Sale</span>
                    </div>
                    <ul className="list-inline mb-0 mt-auto hover-image">
                      <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-images" /><span className="pl-1">9</span>
                        </a>
                      </li>
                      <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-play-circle" /><span className="pl-1">2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="card-body pt-3">
                  <h2 className="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html" className="text-dark hover-primary">Home in Metric Way</a></h2>
                  <p className="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                  <ul className="list-inline d-flex mb-0 flex-wrap mr-n5">
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                      <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-bedroom" />
                      </svg>
                      3 Br
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                      <svg className="icon icon-shower fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-shower" />
                      </svg>
                      3 Ba
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                      <svg className="icon icon-square fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-square" />
                      </svg>
                      2300 Sq.Ft
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                      <svg className="icon icon-Garage fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-Garage" />
                      </svg>
                      1 Gr
                    </li>
                  </ul>
                </div>
                <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                  <p className="fs-17 font-weight-bold text-heading mb-0">$5.700<span className="text-gray-light font-weight-500 fs-14"> / year</span></p>
                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Wishlist"><i className="far fa-heart" /></a>
                    </li>
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Compare"><i className="fas fa-exchange-alt" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div className="box box pb-7 pt-2" data-animate="fadeInUp">
              <div className="card shadow-hover-2">
                <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                  <img src="/assets/images/properties-grid-02.jpg" alt="Home in Metric Way" />
                  <div className="card-img-overlay p-2 d-flex flex-column">
                    <div>
                      <span className="badge mr-2 badge-orange">featured</span>
                      <span className="badge mr-2 badge-indigo">for Sale</span>
                    </div>
                    <ul className="list-inline mb-0 mt-auto hover-image">
                      <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Images">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-images" /><span className="pl-1">9</span>
                        </a>
                      </li>
                      <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                        <a href="#" className="text-white hover-primary">
                          <i className="far fa-play-circle" /><span className="pl-1">2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="card-body pt-3">
                  <h2 className="card-title fs-16 lh-2 mb-0"><a href="single-property-1.html" className="text-dark hover-primary">Home in Metric Way</a></h2>
                  <p className="card-text font-weight-500 text-gray-light mb-2">1421 San Pedro St, Los Angeles</p>
                  <ul className="list-inline d-flex mb-0 flex-wrap mr-n5">
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                      <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-bedroom" />
                      </svg>
                      3 Br
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                      <svg className="icon icon-shower fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-shower" />
                      </svg>
                      3 Ba
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                      <svg className="icon icon-square fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-square" />
                      </svg>
                      2300 Sq.Ft
                    </li>
                    <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                      <svg className="icon icon-Garage fs-18 text-primary mr-1">
                        <use xlinkHref="#icon-Garage" />
                      </svg>
                      1 Gr
                    </li>
                  </ul>
                </div>
                <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                  <p className="fs-17 font-weight-bold text-heading mb-0">$550<span className="text-gray-light font-weight-500 fs-14"> / month</span></p>
                  <ul className="list-inline mb-0">
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent" data-toggle="tooltip" title="Wishlist"><i className="fas fa-heart" /></a>
                    </li>
                    <li className="list-inline-item">
                      <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="Compare"><i className="fas fa-exchange-alt" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div className="bg-single-image pt-lg-13 pb-lg-12 py-11 bg-secondary">
          <div className="container container-xxl">
            <div className="row align-items-center">
              <div className="col-lg-6 pr-xl-8 pb-lg-0 pb-6" data-animate="fadeInLeft">
                <a href="#" className="hover-shine d-block">
                  <img src="/assets/images/single-image-01.jpg" className="rounded-lg w-100" alt="Find your neighborhood" />
                </a>
              </div>
              <div className="col-lg-6 pl-xl-8" data-animate="fadeInRight">
                <h2 className="text-white lh-1625">Find your<br />
                  neighborhood</h2>
                <span className="heading-divider" />
                <p className="mb-6 text-white">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse</p>
                <div className="input-group input-group-lg pr-sm-17">
                  <input type="text" className="form-control fs-13 font-weight-500 text-gray-light rounded-lg rounded-right-0 border-0 shadow-none h-52 bg-white" name="search" placeholder="Enter an address, neighbourhood" />
                  <button type="submit" className="btn btn-primary fs-18 rounded-left-0 rounded-lg px-6 border-0">
                    <i className="far fa-search" />
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section className="pt-lg-12 pb-lg-15 py-11">
        <div className="container container-xxl">
          <h2 className="text-heading">Destinations We Love The Most</h2>
          <span className="heading-divider" />
          <p className="mb-7">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
          <div className="slick-slider mx-n2" data-slick-options="{&quot;slidesToShow&quot;: 5,&quot;arrows&quot;:false, &quot;autoplay&quot;:false,&quot;dots&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;:3}},{&quot;breakpoint&quot;: 992,&quot;settings&quot;: {&quot;slidesToShow&quot;:3}},{&quot;breakpoint&quot;: 768,&quot;settings&quot;: {&quot;slidesToShow&quot;: 2}},{&quot;breakpoint&quot;: 576,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}}]}">
            <div className="box px-2" data-animate="fadeInUp">
              <div className="card text-white bg-overlay-gradient-8 hover-zoom-in">
                <img src="/assets/images/properties-city-01.jpg" className="card-img" alt="New York" />
                <div className="card-img-overlay d-flex justify-content-end flex-column p-4">
                  <h2 className="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html" className="text-white">New York</a></h2>
                  <p className="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span className="ml-2 fs-15 font-weight-bold">$540.000 - $900.000</span></p>
                </div>
              </div>
            </div>
            <div className="box px-2" data-animate="fadeInUp">
              <div className="card text-white bg-overlay-gradient-8 hover-zoom-in">
                <img src="/assets/images/properties-city-02.jpg" className="card-img" alt="Los Angeles" />
                <div className="card-img-overlay d-flex justify-content-end flex-column p-4">
                  <h2 className="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html" className="text-white">Los Angeles</a></h2>
                  <p className="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span className="ml-2 fs-15 font-weight-bold">$520.000 - $700.000</span></p>
                </div>
              </div>
            </div>
            <div className="box px-2" data-animate="fadeInUp">
              <div className="card text-white bg-overlay-gradient-8 hover-zoom-in">
                <img src="/assets/images/properties-city-03.jpg" className="card-img" alt="San Jose" />
                <div className="card-img-overlay d-flex justify-content-end flex-column p-4">
                  <h2 className="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html" className="text-white">San Jose</a></h2>
                  <p className="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span className="ml-2 fs-15 font-weight-bold">$340.000 - $600.000</span></p>
                </div>
              </div>
            </div>
            <div className="box px-2" data-animate="fadeInUp">
              <div className="card text-white bg-overlay-gradient-8 hover-zoom-in">
                <img src="/assets/images/properties-city-04.jpg" className="card-img" alt="Fort Worth" />
                <div className="card-img-overlay d-flex justify-content-end flex-column p-4">
                  <h2 className="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html" className="text-white">Fort Worth</a></h2>
                  <p className="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span className="ml-2 fs-15 font-weight-bold">$240.000 - $660.000</span></p>
                </div>
              </div>
            </div>
            <div className="box px-2" data-animate="fadeInUp">
              <div className="card text-white bg-overlay-gradient-8 hover-zoom-in">
                <img src="/assets/images/properties-city-05.jpg" className="card-img" alt="Kansas City" />
                <div className="card-img-overlay d-flex justify-content-end flex-column p-4">
                  <h2 className="card-title mb-0 fs-20 lh-182"><a href="single-property-1.html" className="text-white">Kansas City</a></h2>
                  <p className="card-text fs-13 font-weight-500 letter-spacing-087">FROM<span className="ml-2 fs-15 font-weight-bold">$380.000 - $680.000</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section className="bg-accent pt-10 pb-lg-11 pb-8 bg-patten-04">
        <div className="container container-xxl">
          <h2 className="text-dark text-center mxw-751 fs-26 lh-184 px-md-8">
            We have the most listings and constant updates.
            So you’ll never miss out.</h2>
          <span className="heading-divider mx-auto" />
          <div className="row mt-8">
            <div className="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
              <div className="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                <div className="row no-gutters">
                  <div className="col-sm-3">
                    <img src="/assets/images/group-16.png" alt="Buy a new home" />
                  </div>
                  <div className="col-sm-9">
                    <div className="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                      <a href="single-property-1.html" className="d-flex align-items-center text-dark hover-secondary"><h4 className="fs-20 lh-1625 mb-1">Buy a new home </h4>
                        <span className="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                          <svg className="icon icon-long-arrow"><use xlinkHref="#icon-long-arrow" /></svg>
                        </span>
                      </a>
                      <p className="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
              <div className="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                <div className="row no-gutters">
                  <div className="col-sm-3">
                    <img src="/assets/images/group-17.png" alt="Sell a home" />
                  </div>
                  <div className="col-sm-9">
                    <div className="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                      <a href="single-property-1.html" className="d-flex align-items-center text-dark hover-secondary"><h4 className="fs-20 lh-1625 mb-1">Sell a home </h4>
                        <span className="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                          <svg className="icon icon-long-arrow"><use xlinkHref="#icon-long-arrow" /></svg>
                        </span>
                      </a>
                      <p className="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
              <div className="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                <div className="row no-gutters">
                  <div className="col-sm-3">
                    <img src="/assets/images/group-21.png" alt="Rent a home" />
                  </div>
                  <div className="col-sm-9">
                    <div className="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                      <a href="single-property-1.html" className="d-flex align-items-center text-dark hover-secondary"><h4 className="fs-20 lh-1625 mb-1">Rent a home </h4>
                        <span className="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                          <svg className="icon icon-long-arrow"><use xlinkHref="#icon-long-arrow" /></svg>
                        </span>
                      </a>
                      <p className="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div className="container container-xxl">
          <div className="py-lg-8 py-6 border-top">
            <div className="slick-slider mx-0 partners" data-slick-options="{&quot;slidesToShow&quot;: 6, &quot;autoplay&quot;:true,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;:4}},{&quot;breakpoint&quot;: 992,&quot;settings&quot;: {&quot;slidesToShow&quot;:3}},{&quot;breakpoint&quot;: 768,&quot;settings&quot;: {&quot;slidesToShow&quot;: 3}},{&quot;breakpoint&quot;: 576,&quot;settings&quot;: {&quot;slidesToShow&quot;: 2}}]}">
              <div className="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                <a href="#" className="item position-relative hover-change-image">
                  <img src="/assets/images/partner-hover-1.png" className="hover-image position-absolute pos-fixed-top" alt="Partner 1" />
                  <img src="/assets/images/partner-1.png" alt="Partner 1" className="image" />
                </a>
              </div>
              <div className="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                <a href="#" className="item position-relative hover-change-image">
                  <img src="/assets/images/partner-hover-2.png" className="hover-image position-absolute pos-fixed-top" alt="Partner 2" />
                  <img src="/assets/images/partner-2.png" alt="Partner 2" className="image" />
                </a>
              </div>
              <div className="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                <a href="#" className="item position-relative hover-change-image">
                  <img src="/assets/images/partner-hover-3.png" className="hover-image position-absolute pos-fixed-top" alt="Partner 3" />
                  <img src="/assets/images/partner-3.png" alt="Partner 3" className="image" />
                </a>
              </div>
              <div className="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                <a href="#" className="item">
                  <img src="/assets/images/partner-4.png" alt="" className="image" />
                </a>
              </div>
              <div className="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                <a href="#" className="item position-relative hover-change-image">
                  <img src="/assets/images/partner-hover-5.png" className="hover-image position-absolute pos-fixed-top" alt="Partner 5" />
                  <img src="/assets/images/partner-5.png" alt="Partner 5" className="image" />
                </a>
              </div>
              <div className="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                <a href="#" className="item">
                  <img src="/assets/images/partner-6.png" alt="" className="image" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div id="compare" className="compare">
        <button className="btn shadow btn-open bg-white bg-hover-accent text-secondary rounded-right-0 d-flex justify-content-center align-items-center w-30px h-140 p-0">
        </button>
        <div className="list-group list-group-no-border bg-dark py-3">
          <a href="#" className="list-group-item bg-transparent text-white fs-22 text-center py-0">
            <i className="far fa-bars" />
          </a>
          <div className="list-group-item card bg-transparent">
            <div className="position-relative hover-change-image bg-hover-overlay">
              <img src="/assets/images/compare-01.jpg" className="card-img" alt="properties" />
              <div className="card-img-overlay">
                <a href="#" className="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i className="fal fa-minus-circle" /></a>
              </div>
            </div>
          </div>
          <div className="list-group-item card bg-transparent">
            <div className="position-relative hover-change-image bg-hover-overlay">
              <img src="/assets/images/compare-02.jpg" className="card-img" alt="properties" />
              <div className="card-img-overlay">
                <a href="#" className="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i className="fal fa-minus-circle" /></a>
              </div>
            </div>
          </div>
          <div className="list-group-item card card bg-transparent">
            <div className="position-relative hover-change-image bg-hover-overlay ">
              <img src="/assets/images/compare-03.jpg" className="card-img" alt="properties" />
              <div className="card-img-overlay">
                <a href="#" className="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i className="fal fa-minus-circle" /></a>
              </div>
            </div>
          </div>
          <div className="list-group-item bg-transparent">
            <a href="compare-details.html" className="btn btn-lg btn-primary w-100 px-0 d-flex justify-content-center">
              Compare
            </a>
          </div>
        </div>
      </div>
    </main>
  );
};

export default HomePage;