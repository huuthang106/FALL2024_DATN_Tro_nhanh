import React, { Component } from 'react';
import { Helmet } from "react-helmet";

class ListingHalfMapListLayout1 extends Component {
    constructor(props) {
        super(props);
        this.state = {
            data: []
        };
    }

    // componentDidMount() {
    //     // Giả sử bạn có một API để lấy dữ liệu
    //     fetch('/api/data')
    //         .then(response => response.json())
    //         .then(data => this.setState({ data }))
    //         .catch(error => console.error('Error fetching data:', error));
    // }

    render() {
        return (
            <main id="content">
                <Helmet>
                    <meta charSet="utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                    <meta name="description" content="Real Estate Html Template" />
                    <meta name="author" content />
                    <meta name="generator" content="Jekyll" />
                    <title>Listing Half Map List Layout-1 - HomeID</title>
                    {/* Google fonts */}
                    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
                    {/* /assets/Vendors CSS */}
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
                    <meta name="twitter:title" content="Listing Half Map List Layout-1" />
                    <meta name="twitter:description" content="Real Estate Html Template" />
                    <meta name="twitter:image" content="images/homeid-social-logo.png" />
                    {/* Facebook */}
                    <meta property="og:url" content="listing-half-map-list-layout-1.html" />
                    <meta property="og:title" content="Listing Half Map List Layout-1" />
                    <meta property="og:description" content="Real Estate Html Template" />
                    <meta property="og:type" content="website" />
                    <meta property="og:image" content="/assets/images/homeid-social.png" />
                    <meta property="og:image:type" content="image/png" />
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
                    <script src="/assets/js/theme.js"></script>
                </Helmet>
                <section className="bg-secondary">
                    <div className="container">
                        <form className="property-search d-none d-lg-block">
                            <div className="row align-items-lg-center" id="accordion-2">
                                <div className="col-xl-2 col-lg-3 col-md-4">
                                    <div className="property-search-status-tab d-flex flex-row">
                                        <input className="search-field" type="hidden" name="status" defaultValue="for-rent" data-default-value />
                                        <button type="button" data-value="for-rent" className="btn shadow-none btn-active-primary text-white rounded-0 hover-white text-uppercase h-lg-80 border-right-0 border-top-0 border-bottom-0 border-left border-white-opacity-03 active flex-md-1">
                                            Rent
                                        </button>
                                        <button type="button" data-value="for-sale" className="btn shadow-none btn-active-primary text-white rounded-0 hover-white text-uppercase h-lg-80 border-left-0 border-top-0 border-bottom-0 border-right border-white-opacity-03 flex-md-1">
                                            Sale
                                        </button>
                                    </div>
                                </div>
                                <div className="col-xl-8 col-lg-7 d-md-flex">
                                    <select className="form-control shadow-none form-control-lg selectpicker rounded-right-md-0 rounded-md-top-left-0 rounded-lg-top-left flex-md-1 mt-3 mt-md-0" title="All Types" data-style="btn-lg py-2 h-52 border-right bg-white" id="type-1" name="type">
                                        <option>Condominium</option>
                                        <option>Single-Family Home</option>
                                        <option>Townhouse</option>
                                        <option>Multi-Family Home</option>
                                    </select>
                                    <div className="form-group mb-0 position-relative flex-md-3 mt-3 mt-md-0">
                                        <input type="text" className="form-control form-control-lg border-0 shadow-none rounded-left-md-0 pr-8 bg-white placeholder-muted" id="key-word-1" name="key-word" placeholder="Enter an address, neighbourhood..." />
                                        <button type="submit" className="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 mr-4 shadow-none">
                                            <i className="far fa-search" />
                                        </button>
                                    </div>
                                </div>
                                <div className="col-lg-2">
                                    <a href="#advanced-search-filters-2" className="icon-primary btn advanced-search w-100 shadow-none text-white text-left rounded-0 fs-14 font-weight-600 position-relative collapsed px-0 d-flex align-items-center" data-toggle="collapse" data-target="#advanced-search-filters-2" aria-expanded="true" aria-controls="advanced-search-filters-2">
                                        Advanced Search
                                    </a>
                                </div>
                                <div id="advanced-search-filters-2" className="col-12 pb-6 pt-lg-2 collapse" data-parent="#accordion-2">
                                    <div className="row mx-n2">
                                        <div className="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" name="status" title="Status" data-style="btn-lg py-2 h-52 bg-white">
                                                <option>All status</option>
                                                <option>For Rent</option>
                                                <option>For Sale</option>
                                            </select>
                                        </div>
                                        <div className="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" name="bedroom" title="Bedrooms" data-style="btn-lg py-2 h-52 bg-white">
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
                                        <div className="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" name="bathrooms" title="Bathrooms" data-style="btn-lg py-2 h-52 bg-white">
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
                                        <div className="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" title="All Cities" data-style="btn-lg py-2 h-52 bg-white" name="city">
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
                                        <div className="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" name="areas" title="All Areas" data-style="btn-lg py-2 h-52 bg-white">
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
                                        <div className="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                                            <input type="text" className="form-control form-control-lg border-0 shadow-none bg-white" placeholder="Property ID" name="property-id" />
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-md-6 col-lg-5 pt-6 slider-range slider-range-primary">
                                            <label htmlFor="price-2" className="mb-4 text-white">Price Range</label>
                                            <div data-slider="true" data-slider-options="{&quot;min&quot;:0,&quot;max&quot;:1000000,&quot;values&quot;:[100000,700000],&quot;type&quot;:&quot;currency&quot;}" />
                                            <div className="text-center mt-2">
                                                <input id="price-2" type="text" readOnly className="border-0 amount text-center text-white bg-transparent font-weight-500" name="price" />
                                            </div>
                                        </div>
                                        <div className="col-md-6 col-lg-5 pt-6 slider-range slider-range-primary offset-lg-1">
                                            <label htmlFor="area-size-2" className="mb-4 text-white">Area Size</label>
                                            <div data-slider="true" data-slider-options="{&quot;min&quot;:0,&quot;max&quot;:15000,&quot;values&quot;:[0,12000],&quot;type&quot;:&quot;currency&quot;}" />
                                            <div className="text-center mt-2">
                                                <input id="area-size-2" type="text" readOnly className="border-0 amount text-center text-white bg-transparent font-weight-500" name="area" />
                                            </div>
                                        </div>
                                        <div className="col-12 pt-4 pb-2">
                                            <a className="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse" href="#other-feature-2" role="button" aria-expanded="false" aria-controls="other-feature-2">
                                                <span className="fs-15 text-white font-weight-500 hover-primary">Other Features</span>
                                            </a>
                                        </div>
                                        <div className="collapse row mx-0 w-100" id="other-feature-2">
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check1-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check1-2">Air
                                                        Conditioning</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check2-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check2-2">Laundry</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check4-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check4-2">Washer</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check5-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check5-2">Barbeque</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check6-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check6-2">Lawn</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check7-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check7-2">Sauna</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check8-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check8-2">WiFi</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check9-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check9-2">Dryer</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check10-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check10-2">Microwave</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check11-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check11-2">Swimming
                                                        Pool</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check12-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check12-2">Window
                                                        Coverings</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check13-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check13-2">Gym</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check14-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check14-2">Outdoor
                                                        Shower</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check15-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check15-2">TV Cable</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check16-2" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check16-2">Refrigerator</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form className="property-search property-search-mobile d-lg-none py-6">
                            <div className="row align-items-lg-center" id="accordion-2-mobile">
                                <div className="col-12">
                                    <div className="form-group mb-0 position-relative">
                                        <a href="#advanced-search-filters-2-mobile" className="icon-primary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed" data-toggle="collapse" data-target="#advanced-search-filters-2-mobile" aria-expanded="true" aria-controls="advanced-search-filters-2-mobile">
                                        </a>
                                        <input type="text" className="form-control form-control-lg border-0 shadow-none pr-9 pl-11 bg-white placeholder-muted" name="key-word" placeholder="Search..." />
                                        <button type="submit" className="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left bg-white">
                                            <i className="far fa-search" />
                                        </button>
                                    </div>
                                </div>
                                <div id="advanced-search-filters-2-mobile" className="col-12 pt-2 collapse" data-parent="#accordion-2-mobile">
                                    <div className="row mx-n2">
                                        <div className="col-sm-6 pt-4 px-2">
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" title="Select" data-style="btn-lg py-2 h-52 bg-white" name="type">
                                                <option>All status</option>
                                                <option>For Rent</option>
                                                <option>For Sale</option>
                                            </select>
                                        </div>
                                        <div className="col-sm-6 pt-4 px-2">
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" title="All Types" data-style="btn-lg py-2 h-52 bg-white" name="type">
                                                <option>Condominium</option>
                                                <option>Single-Family Home</option>
                                                <option>Townhouse</option>
                                                <option>Multi-Family Home</option>
                                            </select>
                                        </div>
                                        <div className="col-sm-6 pt-4 px-2">
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" name="bedroom" title="Bedrooms" data-style="btn-lg py-2 h-52 bg-white">
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
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" name="bathrooms" title="Bathrooms" data-style="btn-lg py-2 h-52 bg-white">
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
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" title="All Cities" data-style="btn-lg py-2 h-52 bg-white" name="city">
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
                                            <select className="form-control border-0 shadow-none form-control-lg selectpicker bg-white" name="areas" title="All Areas" data-style="btn-lg py-2 h-52 bg-white">
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
                                        <div className="col-md-6 pt-6 slider-range slider-range-primary">
                                            <label htmlFor="price-2-mobile" className="mb-4 text-white">Price Range</label>
                                            <div data-slider="true" data-slider-options="{&quot;min&quot;:0,&quot;max&quot;:1000000,&quot;values&quot;:[100000,700000],&quot;type&quot;:&quot;currency&quot;}" />
                                            <div className="text-center mt-2">
                                                <input id="price-2-mobile" type="text" readOnly className="border-0 amount text-center text-white bg-transparent font-weight-500" name="price" />
                                            </div>
                                        </div>
                                        <div className="col-md-6 pt-6 slider-range slider-range-primary">
                                            <label htmlFor="area-size-2-mobile" className="mb-4 text-white">Area Size</label>
                                            <div data-slider="true" data-slider-options="{&quot;min&quot;:0,&quot;max&quot;:15000,&quot;values&quot;:[0,12000],&quot;type&quot;:&quot;sqrt&quot;}" />
                                            <div className="text-center mt-2">
                                                <input id="area-size-2-mobile" type="text" readOnly className="border-0 amount text-center text-white bg-transparent font-weight-500" name="area" />
                                            </div>
                                        </div>
                                        <div className="col-12 pt-4 pb-2">
                                            <a className="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse" href="#other-feature-2-mobile" role="button" aria-expanded="false" aria-controls="other-feature-2-mobile">
                                                <span className="fs-15 text-white font-weight-500 hover-primary">Other Features</span>
                                            </a>
                                        </div>
                                        <div className="collapse row mx-0 w-100" id="other-feature-2-mobile">
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check1-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check1-2-mobile">Air
                                                        Conditioning</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check2-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check2-2-mobile">Laundry</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check4-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check4-2-mobile">Washer</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check5-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check5-2-mobile">Barbeque</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check6-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check6-2-mobile">Lawn</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check7-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check7-2-mobile">Sauna</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check8-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check8-2-mobile">WiFi</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check9-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check9-2-mobile">Dryer</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check10-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check10-2-mobile">Microwave</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check11-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check11-2-mobile">Swimming
                                                        Pool</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check12-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check12-2-mobile">Window
                                                        Coverings</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check13-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check13-2-mobile">Gym</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check14-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check14-2-mobile">Outdoor
                                                        Shower</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check15-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check15-2-mobile">TV
                                                        Cable</label>
                                                </div>
                                            </div>
                                            <div className="col-sm-6 py-2">
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input" id="check16-2-mobile" name="feature[]" />
                                                    <label className="custom-control-label text-white" htmlFor="check16-2-mobile">Refrigerator</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <section className="pt-6 pb-5 shadow-xs-1 bg-white position-relative z-index-2">
                    <div className="container-fluid px-xxl-6">
                        <form className="form-inline mx-n1" id="accordion-5">
                            <div className="form-group p-1">
                                <label htmlFor="location-2" className="sr-only">Location</label>
                                <select className="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker" title="Location" data-style="bg-white" id="location-2" name="location">
                                    <option>Austin</option>
                                    <option>Boston</option>
                                    <option>Chicago</option>
                                    <option>Denver</option>
                                    <option>Los Angeles</option>
                                    <option>New York</option>
                                    <option>San Francisco</option>
                                </select>
                            </div>
                            <div className="form-group p-1">
                                <label htmlFor="any-price" className="sr-only">Any Price</label>
                                <select className="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker" title="Any Price" data-style="bg-white" id="any-price" name="any-price">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                            <div className="form-group p-1">
                                <label htmlFor="type" className="sr-only">Type</label>
                                <select className="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker" title="Type" data-style="bg-white" id="type" name="type">
                                    <option selected>house</option>
                                    <option>hotel</option>
                                    <option>motel</option>
                                </select>
                            </div>
                            <div className="form-group p-1">
                                <label htmlFor="status" className="sr-only">All status</label>
                                <select className="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker" title="All status" data-style="bg-white" id="status" name="status">
                                    <option>All status</option>
                                    <option>For Rent</option>
                                    <option>For Sale</option>
                                </select>
                            </div>
                            <div className="form-group p-1">
                                <label htmlFor="area" className="sr-only">Area</label>
                                <select className="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker" title="Area" data-style="bg-white" id="area" name="areas">
                                    <option>hotel</option>
                                    <option>motel</option>
                                </select>
                            </div>
                            <div className="form-group p-1">
                                <label htmlFor="room" className="sr-only">Room</label>
                                <select className="form-control border-0 shadow-xxs-1 bg-transparent font-weight-600 selectpicker" title="Room" data-style="bg-white" id="room" name="room">
                                    <option selected>2+ Beds</option>
                                    <option>3+ Beds</option>
                                </select>
                            </div>
                            <div className="form-group p-1">
                                <a href="#advanced-search-filters-5" className="btn bg-transparent border-0 shadow-xxs-1 text-gray-light" data-toggle="collapse" data-target="#advanced-search-filters-5" aria-expanded="true" aria-controls="advanced-search-filters-5">
                                    <span>More</span>
                                    <span className="ml-auto">...</span>
                                </a>
                            </div>
                            <div className="form-group p-1 custom-control custom-switch custom-switch-right ml-lg-auto">
                                <label className="fs-13 text-heading font-weight-500 custom-switch-right mr-7">Map</label>
                                <input type="checkbox" className="custom-control-input" name="features" id="customSwitch1" defaultChecked />
                                <label className="custom-control-label h-24" htmlFor="customSwitch1" />
                            </div>
                            <div id="advanced-search-filters-5" className="row pb-6 pt-2 collapse p-1 w-100" data-parent="#accordion-5">
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check1-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check1-5">Air
                                            Conditioning</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check2-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check2-5">Laundry</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check4-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check4-5">Washer</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check5-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check5-5">Barbeque</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check6-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check6-5">Lawn</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check7-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check7-5">Sauna</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check8-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check8-5">WiFi</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check9-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check9-5">Dryer</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check10-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check10-5">Microwave</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check11-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check11-5">Swimming
                                            Pool</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check12-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check12-5">Window
                                            Coverings</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check13-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check13-5">Gym</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check14-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check14-5">Outdoor
                                            Shower</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check15-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check15-5">TV
                                            Cable</label>
                                    </div>
                                </div>
                                <div className="col-sm-6 col-md-4 col-lg-3 py-2">
                                    <div className="custom-control custom-checkbox">
                                        <input type="checkbox" className="custom-control-input" name="features" id="check16-5" />
                                        <label className="custom-control-label justify-content-start" htmlFor="check16-5">Refrigerator</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <section className="position-relative">
                    <div className="container-fluid px-0">
                        <div className="row no-gutters">
                            <div className="col-xl-6 col-xxl-5 px-3 px-xxl-6 pt-7 order-2 order-xl-1 pb-11">
                                <div className="row align-items-sm-center mb-6">
                                    <div className="col-md-6 col-xl-5 col-xxl-6">
                                        <h2 className="fs-15 text-dark mb-0">We found <span className="text-primary">45</span> properties
                                            available for
                                            you
                                        </h2>
                                    </div>
                                    <div className="col-md-6 col-xl-7 col-xxl-6 mt-6 mt-md-0">
                                        <div className="d-flex justify-content-md-end align-items-center">
                                            <div className="input-group border rounded input-group-lg w-auto bg-white mr-3">
                                                <label className="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" htmlFor="inputGroupSelect01"><i className="fas fa-align-left fs-16 pr-2" />Sortby:</label>
                                                <select className="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01" name="sortby">
                                                    <option selected>Top Selling</option>
                                                    <option value={1}>Most Viewed</option>
                                                    <option value={2}>Price(low to high)</option>
                                                    <option value={3}>Price(high to low)</option>
                                                </select>
                                            </div>
                                            <div className="d-none d-md-block">
                                                <a className="fs-sm-18 text-dark" href="#">
                                                    <i className="fas fa-list" />
                                                </a>
                                                <a className="fs-sm-18 text-dark opacity-2 ml-5" href="listing-half-map-grid-layout-1.html">
                                                    <i className="fa fa-th-large" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-12">
                                        <div className="card mb-8 mb-lg-6 border-0" data-animate="fadeInUp">
                                            <div className="row no-gutters">
                                                <div className="col-md-6 mb-5 mb-md-0 pr-md-6">
                                                    <div className="position-relative hover-change-image bg-hover-overlay h-100 pt-75 bg-img-cover-center rounded-lg" style={{ backgroundImage: 'url("/assets/images/properties-list-06.jpg")' }}>
                                                        <div className="card-img-overlay p-2 d-flex flex-column">
                                                            <div>
                                                                <span className="badge badge-primary">For Sale</span>
                                                            </div>
                                                            <div className="mt-auto d-flex hover-image">
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-auto">
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
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                    <li className="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="far fa-heart" />
                                                                        </a>
                                                                    </li>
                                                                    <li className="list-inline-item h-32  mr-3" data-toggle="tooltip" title="Compare">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="fas fa-exchange-alt" />
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6 ">
                                                    <div className="card-body p-0">
                                                        <h2 className="card-title my-0"><a href="single-property-1.html" className="fs-16 lh-2 text-dark hover-primary d-block">Home in Metric Way</a>
                                                        </h2>
                                                        <p className="card-text mb-1 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                                        <p className="card-text mb-2 ml-0">Lorem ipsum dolor sit amet, sectetur cing elit uspe ndisse suscorem ipsum dolor sitorem sit amet, sectetur cing elit uspe ndisse suscorem</p>
                                                        <p className="card-text fs-17 font-weight-bold text-heading mb-3">
                                                            $1.250.000
                                                        </p>
                                                    </div>
                                                    <div className="card-footer pt-3 bg-transparent px-0 pb-0">
                                                        <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between mr-n2">
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bedroom">
                                                                <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-bedroom" />
                                                                </svg>
                                                                3 Br
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bathrooms">
                                                                <svg className="icon icon-shower fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-shower" />
                                                                </svg>
                                                                3 Ba
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="Size">
                                                                <svg className="icon icon-square fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-square" />
                                                                </svg>
                                                                2300 Sq.Ft
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="1 Garage">
                                                                <svg className="icon icon-Garage fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-Garage" />
                                                                </svg>
                                                                1 Gr
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="card mb-8 mb-lg-6 border-0" data-animate="fadeInUp">
                                            <div className="row no-gutters">
                                                <div className="col-md-6 mb-5 mb-md-0 pr-md-6">
                                                    <div className="position-relative hover-change-image bg-hover-overlay h-100 pt-75 bg-img-cover-center rounded-lg" style={{ backgroundImage: 'url("/assets/images/properties-list-16.jpg")' }}>
                                                        <div className="card-img-overlay p-2 d-flex flex-column">
                                                            <div>
                                                                <span className="badge badge-indigo">for Rent</span>
                                                            </div>
                                                            <div className="mt-auto d-flex hover-image">
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-auto">
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
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                    <li className="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="far fa-heart" />
                                                                        </a>
                                                                    </li>
                                                                    <li className="list-inline-item h-32  mr-3" data-toggle="tooltip" title="Compare">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="fas fa-exchange-alt" />
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6 ">
                                                    <div className="card-body p-0">
                                                        <h2 className="card-title my-0"><a href="single-property-1.html" className="fs-16 lh-2 text-dark hover-primary d-block">Garden Gingerbread House</a>
                                                        </h2>
                                                        <p className="card-text mb-1 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                                        <p className="card-text mb-2 ml-0">Lorem ipsum dolor sit amet, sectetur cing elit uspe ndisse suscorem ipsum dolor sitorem sit amet, sectetur cing elit uspe ndisse suscorem</p>
                                                        <p className="card-text fs-17 font-weight-bold text-heading mb-3">
                                                            $550
                                                            <span className="fs-14 font-weight-500 text-gray-light"> /month</span>
                                                        </p>
                                                    </div>
                                                    <div className="card-footer pt-3 bg-transparent px-0 pb-0">
                                                        <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between mr-n2">
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bedroom">
                                                                <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-bedroom" />
                                                                </svg>
                                                                3 Br
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bathrooms">
                                                                <svg className="icon icon-shower fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-shower" />
                                                                </svg>
                                                                3 Ba
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="Size">
                                                                <svg className="icon icon-square fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-square" />
                                                                </svg>
                                                                2300 Sq.Ft
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="1 Garage">
                                                                <svg className="icon icon-Garage fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-Garage" />
                                                                </svg>
                                                                1 Gr
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="card mb-8 mb-lg-6 border-0" data-animate="fadeInUp">
                                            <div className="row no-gutters">
                                                <div className="col-md-6 mb-5 mb-md-0 pr-md-6">
                                                    <div className="position-relative hover-change-image bg-hover-overlay h-100 pt-75 bg-img-cover-center rounded-lg" style={{ backgroundImage: 'url("/assets/images/properties-list-05.jpg")' }}>
                                                        <div className="card-img-overlay p-2 d-flex flex-column">
                                                            <div>
                                                                <span className="badge badge-indigo">for Rent</span>
                                                            </div>
                                                            <div className="mt-auto d-flex hover-image">
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-auto">
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
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                    <li className="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="far fa-heart" />
                                                                        </a>
                                                                    </li>
                                                                    <li className="list-inline-item h-32  mr-3" data-toggle="tooltip" title="Compare">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="fas fa-exchange-alt" />
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6 ">
                                                    <div className="card-body p-0">
                                                        <h2 className="card-title my-0"><a href="single-property-1.html" className="fs-16 lh-2 text-dark hover-primary d-block">Affordable Urban House</a>
                                                        </h2>
                                                        <p className="card-text mb-1 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                                        <p className="card-text mb-2 ml-0">Lorem ipsum dolor sit amet, sectetur cing elit uspe ndisse suscorem ipsum dolor sitorem sit amet, sectetur cing elit uspe ndisse suscorem</p>
                                                        <p className="card-text fs-17 font-weight-bold text-heading mb-3">
                                                            $550
                                                            <span className="fs-14 font-weight-500 text-gray-light"> /month</span>
                                                        </p>
                                                    </div>
                                                    <div className="card-footer pt-3 bg-transparent px-0 pb-0">
                                                        <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between mr-n2">
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bedroom">
                                                                <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-bedroom" />
                                                                </svg>
                                                                3 Br
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bathrooms">
                                                                <svg className="icon icon-shower fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-shower" />
                                                                </svg>
                                                                3 Ba
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="Size">
                                                                <svg className="icon icon-square fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-square" />
                                                                </svg>
                                                                2300 Sq.Ft
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="1 Garage">
                                                                <svg className="icon icon-Garage fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-Garage" />
                                                                </svg>
                                                                1 Gr
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="card mb-8 mb-lg-6 border-0" data-animate="fadeInUp">
                                            <div className="row no-gutters">
                                                <div className="col-md-6 mb-5 mb-md-0 pr-md-6">
                                                    <div className="position-relative hover-change-image bg-hover-overlay h-100 pt-75 bg-img-cover-center rounded-lg" style={{ backgroundImage: 'url("/assets/images/properties-list-17.jpg")' }}>
                                                        <div className="card-img-overlay p-2 d-flex flex-column">
                                                            <div>
                                                                <span className="badge badge-primary">For Sale</span>
                                                            </div>
                                                            <div className="mt-auto d-flex hover-image">
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-auto">
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
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                    <li className="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="far fa-heart" />
                                                                        </a>
                                                                    </li>
                                                                    <li className="list-inline-item h-32  mr-3" data-toggle="tooltip" title="Compare">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="fas fa-exchange-alt" />
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6 ">
                                                    <div className="card-body p-0">
                                                        <h2 className="card-title my-0"><a href="single-property-1.html" className="fs-16 lh-2 text-dark hover-primary d-block">Villa on Hollywood Boulevard</a>
                                                        </h2>
                                                        <p className="card-text mb-1 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                                        <p className="card-text mb-2 ml-0">Lorem ipsum dolor sit amet, sectetur cing elit uspe ndisse suscorem ipsum dolor sitorem sit amet, sectetur cing elit uspe ndisse suscorem</p>
                                                        <p className="card-text fs-17 font-weight-bold text-heading mb-3">
                                                            $1.250.000
                                                        </p>
                                                    </div>
                                                    <div className="card-footer pt-3 bg-transparent px-0 pb-0">
                                                        <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between mr-n2">
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bedroom">
                                                                <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-bedroom" />
                                                                </svg>
                                                                3 Br
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bathrooms">
                                                                <svg className="icon icon-shower fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-shower" />
                                                                </svg>
                                                                3 Ba
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="Size">
                                                                <svg className="icon icon-square fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-square" />
                                                                </svg>
                                                                2300 Sq.Ft
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="1 Garage">
                                                                <svg className="icon icon-Garage fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-Garage" />
                                                                </svg>
                                                                1 Gr
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="card mb-8 mb-lg-6 border-0" data-animate="fadeInUp">
                                            <div className="row no-gutters">
                                                <div className="col-md-6 mb-5 mb-md-0 pr-md-6">
                                                    <div className="position-relative hover-change-image bg-hover-overlay h-100 pt-75 bg-img-cover-center rounded-lg" style={{ backgroundImage: 'url("/assets/images/properties-list-18.jpg")' }}>
                                                        <div className="card-img-overlay p-2 d-flex flex-column">
                                                            <div>
                                                                <span className="badge badge-primary">For Sale</span>
                                                            </div>
                                                            <div className="mt-auto d-flex hover-image">
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-auto">
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
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                    <li className="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="far fa-heart" />
                                                                        </a>
                                                                    </li>
                                                                    <li className="list-inline-item h-32  mr-3" data-toggle="tooltip" title="Compare">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="fas fa-exchange-alt" />
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6 ">
                                                    <div className="card-body p-0">
                                                        <h2 className="card-title my-0"><a href="single-property-1.html" className="fs-16 lh-2 text-dark hover-primary d-block">Explore Old Barcelona</a>
                                                        </h2>
                                                        <p className="card-text mb-1 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                                        <p className="card-text mb-2 ml-0">Lorem ipsum dolor sit amet, sectetur cing elit uspe ndisse suscorem ipsum dolor sitorem sit amet, sectetur cing elit uspe ndisse suscorem</p>
                                                        <p className="card-text fs-17 font-weight-bold text-heading mb-3">
                                                            $1.250.000
                                                        </p>
                                                    </div>
                                                    <div className="card-footer pt-3 bg-transparent px-0 pb-0">
                                                        <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between mr-n2">
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bedroom">
                                                                <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-bedroom" />
                                                                </svg>
                                                                3 Br
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bathrooms">
                                                                <svg className="icon icon-shower fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-shower" />
                                                                </svg>
                                                                3 Ba
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="Size">
                                                                <svg className="icon icon-square fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-square" />
                                                                </svg>
                                                                2300 Sq.Ft
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="1 Garage">
                                                                <svg className="icon icon-Garage fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-Garage" />
                                                                </svg>
                                                                1 Gr
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="card mb-8 mb-lg-6 border-0" data-animate="fadeInUp">
                                            <div className="row no-gutters">
                                                <div className="col-md-6 mb-5 mb-md-0 pr-md-6">
                                                    <div className="position-relative hover-change-image bg-hover-overlay h-100 pt-75 bg-img-cover-center rounded-lg" style={{ backgroundImage: 'url("/assets/images/properties-list-19.jpg")' }}>
                                                        <div className="card-img-overlay p-2 d-flex flex-column">
                                                            <div>
                                                                <span className="badge badge-indigo">for Rent</span>
                                                            </div>
                                                            <div className="mt-auto d-flex hover-image">
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-auto">
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
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                    <li className="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="far fa-heart" />
                                                                        </a>
                                                                    </li>
                                                                    <li className="list-inline-item h-32  mr-3" data-toggle="tooltip" title="Compare">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="fas fa-exchange-alt" />
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6 ">
                                                    <div className="card-body p-0">
                                                        <h2 className="card-title my-0"><a href="single-property-1.html" className="fs-16 lh-2 text-dark hover-primary d-block">Home in Metric Way</a>
                                                        </h2>
                                                        <p className="card-text mb-1 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                                        <p className="card-text mb-2 ml-0">Lorem ipsum dolor sit amet, sectetur cing elit uspe ndisse suscorem ipsum dolor sitorem sit amet, sectetur cing elit uspe ndisse suscorem</p>
                                                        <p className="card-text fs-17 font-weight-bold text-heading mb-3">
                                                            $550
                                                            <span className="fs-14 font-weight-500 text-gray-light"> /month</span>
                                                        </p>
                                                    </div>
                                                    <div className="card-footer pt-3 bg-transparent px-0 pb-0">
                                                        <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between mr-n2">
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bedroom">
                                                                <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-bedroom" />
                                                                </svg>
                                                                3 Br
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bathrooms">
                                                                <svg className="icon icon-shower fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-shower" />
                                                                </svg>
                                                                3 Ba
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="Size">
                                                                <svg className="icon icon-square fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-square" />
                                                                </svg>
                                                                2300 Sq.Ft
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="1 Garage">
                                                                <svg className="icon icon-Garage fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-Garage" />
                                                                </svg>
                                                                1 Gr
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="card mb-8 mb-lg-6 border-0" data-animate="fadeInUp">
                                            <div className="row no-gutters">
                                                <div className="col-md-6 mb-5 mb-md-0 pr-md-6">
                                                    <div className="position-relative hover-change-image bg-hover-overlay h-100 pt-75 bg-img-cover-center rounded-lg" style={{ backgroundImage: 'url("/assets/images/properties-list-20.jpg")' }}>
                                                        <div className="card-img-overlay p-2 d-flex flex-column">
                                                            <div>
                                                                <span className="badge badge-primary">For Sale</span>
                                                            </div>
                                                            <div className="mt-auto d-flex hover-image">
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-auto">
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
                                                                <ul className="list-inline mb-0 d-flex align-items-end mr-n3">
                                                                    <li className="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="far fa-heart" />
                                                                        </a>
                                                                    </li>
                                                                    <li className="list-inline-item h-32  mr-3" data-toggle="tooltip" title="Compare">
                                                                        <a href="#" className="text-white fs-20 hover-primary">
                                                                            <i className="fas fa-exchange-alt" />
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6 ">
                                                    <div className="card-body p-0">
                                                        <h2 className="card-title my-0"><a href="single-property-1.html" className="fs-16 lh-2 text-dark hover-primary d-block">Home in Metric Way</a>
                                                        </h2>
                                                        <p className="card-text mb-1 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                                        <p className="card-text mb-2 ml-0">Lorem ipsum dolor sit amet, sectetur cing elit uspe ndisse suscorem ipsum dolor sitorem sit amet, sectetur cing elit uspe ndisse suscorem</p>
                                                        <p className="card-text fs-17 font-weight-bold text-heading mb-3">
                                                            $1.250.000
                                                        </p>
                                                    </div>
                                                    <div className="card-footer pt-3 bg-transparent px-0 pb-0">
                                                        <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between mr-n2">
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bedroom">
                                                                <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-bedroom" />
                                                                </svg>
                                                                3 Br
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="3 Bathrooms">
                                                                <svg className="icon icon-shower fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-shower" />
                                                                </svg>
                                                                3 Ba
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="Size">
                                                                <svg className="icon icon-square fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-square" />
                                                                </svg>
                                                                2300 Sq.Ft
                                                            </li>
                                                            <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-2" data-toggle="tooltip" title="1 Garage">
                                                                <svg className="icon icon-Garage fs-18 text-primary mr-1">
                                                                    <use xlinkHref="#icon-Garage" />
                                                                </svg>
                                                                1 Gr
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-12">
                                        <nav className="pt-2 pt-lg-4">
                                            <ul className="pagination rounded-active justify-content-center mb-0">
                                                <li className="page-item"><a className="page-link" href="#"><i className="far fa-angle-double-left" /></a>
                                                </li>
                                                <li className="page-item"><a className="page-link" href="#">1</a></li>
                                                <li className="page-item active"><a className="page-link" href="#">2</a></li>
                                                <li className="page-item d-none d-sm-block"><a className="page-link" href="#">3</a></li>
                                                <li className="page-item">...</li>
                                                <li className="page-item"><a className="page-link" href="#">6</a></li>
                                                <li className="page-item"><a className="page-link" href="#"><i className="far fa-angle-double-right" /></a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div className="col-xl-6 col-xxl-7 order-1 order-xl-2 primary-map map-sticky overflow-hidden" id="map-sticky">
                                <div className="primary-map-inner">
                                    <div className="mapbox-gl map-grid-property-01 xl-vh-100" id="map" data-marker-target="#template-properties" data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ">
                                    </div>
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
                <div className="d-none" id="template-properties">
                    <div className="marker-item" data-icon-marker="/assets/images/googlle-market-02.png" data-position="[-73.9893691, 40.6751204]" data-marker-style="{&quot;className&quot;:&quot;marker&quot;,&quot;style&quot;:{&quot;width&quot;:&quot;45px&quot;,&quot;height&quot;:&quot;48px&quot;},&quot;popup&quot;:{&quot;className&quot;:&quot;popup-map-property-02&quot;,&quot;maxWidth&quot;:&quot;319px&quot;}}">
                        <div className="position-relative">
                            <div className="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                                <div className="col-3 mr-2 card border-0"><img src="/assets/images/properties-list-03.jpg" className="card-img" alt="Home in Metric Way" /></div>
                                <div className="media-body">
                                    <h2 className="my-0"><a href="single-property-1.html" className="fs-13 lh-2 text-dark hover-primary d-block">Home in
                                        Metric
                                        Way</a></h2>
                                    <p className="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                    <p className="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                                </div>
                            </div>
                            <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-bedroom" />
                                    </svg>
                                    3 Br
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-shower fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-shower" />
                                    </svg>
                                    3 Ba
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-square fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-square" />
                                    </svg>
                                    2300 Sq.Ft
                                </li>
                            </ul>
                            <div className="badge badge-primary">For Sale</div>
                        </div>
                    </div>
                    <div className="marker-item" data-icon-marker="/assets/images/googlle-market-02.png" data-position="[-73.9934889, 40.6743149]" data-marker-style="{&quot;className&quot;:&quot;marker&quot;,&quot;style&quot;:{&quot;width&quot;:&quot;45px&quot;,&quot;height&quot;:&quot;48px&quot;},&quot;popup&quot;:{&quot;className&quot;:&quot;popup-map-property-02&quot;,&quot;maxWidth&quot;:&quot;319px&quot;}}">
                        <div className="position-relative">
                            <div className="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                                <div className="col-3 mr-2 card border-0"><img src="/assets/images/properties-list-04.jpg" className="card-img" alt="Home in Metric Way" /></div>
                                <div className="media-body">
                                    <h2 className="my-0"><a href="single-property-1.html" className="fs-13 lh-2 text-dark hover-primary d-block">Home in
                                        Metric
                                        Way</a></h2>
                                    <p className="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                    <p className="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                                </div>
                            </div>
                            <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-bedroom" />
                                    </svg>
                                    3 Br
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-shower fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-shower" />
                                    </svg>
                                    3 Ba
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-square fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-square" />
                                    </svg>
                                    2300 Sq.Ft
                                </li>
                            </ul>
                            <div className="badge badge-primary">For Sale</div>
                        </div>
                    </div>
                    <div className="marker-item" data-icon-marker="/assets/images/googlle-market-03.png" data-position="[-73.9947227, 40.6734035]" data-marker-style="{&quot;className&quot;:&quot;marker&quot;,&quot;style&quot;:{&quot;width&quot;:&quot;45px&quot;,&quot;height&quot;:&quot;48px&quot;},&quot;popup&quot;:{&quot;className&quot;:&quot;popup-map-property-02&quot;,&quot;maxWidth&quot;:&quot;319px&quot;}}">
                        <div className="position-relative">
                            <div className="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                                <div className="col-3 mr-2 card border-0"><img src="/assets/images/properties-list-11.jpg" className="card-img" alt="Home in Metric Way" /></div>
                                <div className="media-body">
                                    <h2 className="my-0"><a href="single-property-1.html" className="fs-13 lh-2 text-dark hover-primary d-block">Home in
                                        Metric
                                        Way</a></h2>
                                    <p className="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                    <p className="fs-17 font-weight-bold text-heading mb-0">$2500<span className="fs-14 font-weight-500 text-gray-light"> /month</span></p>
                                </div>
                            </div>
                            <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-bedroom" />
                                    </svg>
                                    3 Br
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-shower fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-shower" />
                                    </svg>
                                    3 Ba
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-square fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-square" />
                                    </svg>
                                    2300 Sq.Ft
                                </li>
                            </ul>
                            <div className="badge badge-indigo">For Rent</div>
                        </div>
                    </div>
                    <div className="marker-item" data-icon-marker="/assets/images/googlle-market-02.png" data-position="[-73.9968864, 40.6747657]" data-marker-style="{&quot;className&quot;:&quot;marker&quot;,&quot;style&quot;:{&quot;width&quot;:&quot;45px&quot;,&quot;height&quot;:&quot;48px&quot;},&quot;popup&quot;:{&quot;className&quot;:&quot;popup-map-property-02&quot;,&quot;maxWidth&quot;:&quot;319px&quot;}}">
                        <div className="position-relative">
                            <div className="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                                <div className="col-3 mr-2 card border-0"><img src="/assets/images/properties-list-12.jpg" className="card-img" alt="Home in Metric Way" /></div>
                                <div className="media-body">
                                    <h2 className="my-0"><a href="single-property-1.html" className="fs-13 lh-2 text-dark hover-primary d-block">Home in
                                        Metric
                                        Way</a></h2>
                                    <p className="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                    <p className="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                                </div>
                            </div>
                            <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-bedroom" />
                                    </svg>
                                    3 Br
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-shower fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-shower" />
                                    </svg>
                                    3 Ba
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-square fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-square" />
                                    </svg>
                                    2300 Sq.Ft
                                </li>
                            </ul>
                            <div className="badge badge-primary">For Sale</div>
                        </div>
                    </div>
                    <div className="marker-item" data-icon-marker="/assets/images/googlle-market-02.png" data-position="[-73.9929114, 40.6731454]" data-marker-style="{&quot;className&quot;:&quot;marker&quot;,&quot;style&quot;:{&quot;width&quot;:&quot;45px&quot;,&quot;height&quot;:&quot;48px&quot;},&quot;popup&quot;:{&quot;className&quot;:&quot;popup-map-property-02&quot;,&quot;maxWidth&quot;:&quot;319px&quot;}}">
                        <div className="position-relative">
                            <div className="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                                <div className="col-3 mr-2 card border-0"><img src="/assets/images/properties-list-13.jpg" className="card-img" alt="Home in Metric Way" /></div>
                                <div className="media-body">
                                    <h2 className="my-0"><a href="single-property-1.html" className="fs-13 lh-2 text-dark hover-primary d-block">Home in
                                        Metric
                                        Way</a></h2>
                                    <p className="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                    <p className="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
                                </div>
                            </div>
                            <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-bedroom" />
                                    </svg>
                                    3 Br
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-shower fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-shower" />
                                    </svg>
                                    3 Ba
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-square fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-square" />
                                    </svg>
                                    2300 Sq.Ft
                                </li>
                            </ul>
                            <div className="badge badge-primary">For Sale</div>
                        </div>
                    </div>
                    <div className="marker-item" data-icon-marker="/assets/images/googlle-market-03.png" data-position="[-73.9927934, 40.674364]" data-marker-style="{&quot;className&quot;:&quot;marker&quot;,&quot;style&quot;:{&quot;width&quot;:&quot;45px&quot;,&quot;height&quot;:&quot;48px&quot;},&quot;popup&quot;:{&quot;className&quot;:&quot;popup-map-property-02&quot;,&quot;maxWidth&quot;:&quot;319px&quot;}}">
                        <div className="position-relative">
                            <div className="media flex-row no-gutters align-items-center pb-2 border-bottom p-2">
                                <div className="col-3 mr-2 card border-0"><img src="/assets/images/properties-list-03.jpg" className="card-img" alt="Home in Metric Way" /></div>
                                <div className="media-body">
                                    <h2 className="my-0"><a href="single-property-1.html" className="fs-13 lh-2 text-dark hover-primary d-block">Home in
                                        Metric
                                        Way</a></h2>
                                    <p className="mb-0 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                                    <p className="fs-17 font-weight-bold text-heading mb-0">$2500<span className="fs-14 font-weight-500 text-gray-light"> /month</span></p>
                                </div>
                            </div>
                            <ul className="list-inline d-flex mb-0 flex-wrap justify-content-between p-2">
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-bedroom" />
                                    </svg>
                                    3 Br
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-shower fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-shower" />
                                    </svg>
                                    3 Ba
                                </li>
                                <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center">
                                    <svg className="icon icon-square fs-18 text-primary mr-1">
                                        <use xlinkHref="#icon-square" />
                                    </svg>
                                    2300 Sq.Ft
                                </li>
                            </ul>
                            <div className="badge badge-indigo">For Rent</div>
                        </div>
                    </div>
                </div>
            </main>
        );
    }
}

export default ListingHalfMapListLayout1;
