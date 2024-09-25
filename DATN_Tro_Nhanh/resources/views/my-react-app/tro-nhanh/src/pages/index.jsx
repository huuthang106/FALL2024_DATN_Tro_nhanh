import React from "react";
import { List, Page, Icon, useNavigate } from "zmp-ui";
import { useRecoilValue } from "recoil";
import { userState } from "../state";
import { Helmet } from "react-helmet";
import UserCard from "../components/user-card";


const HomePage = () => {
  const user = useRecoilValue(userState);
  const navigate = useNavigate();
  const rooms = [
    {
        id: 1,
        title: "Phòng 1",
        address: "Địa chỉ 1",
        price: 1000000,
        bedroom: 2,
        bathroom: 1,
        acreage: 50,
        images: [{ filename: "tro-moi.png" }],
        expiration_date: new Date(Date.now() + 86400000), // Hết hạn sau 1 ngày
        slug: "phong-1"
    },
    {
        id: 2,
        title: "Phòng 2",
        address: "Địa chỉ 2",
        price: 2000000,
        bedroom: 3,
        bathroom: 2,
        acreage: 70,
        images: [{ filename: "tro-moi.png" }],
        expiration_date: new Date(Date.now() + 86400000), // Hết hạn sau 1 ngày
        slug: "phong-2"
    },
    // Thêm nhiều phòng nếu cần
];

  return (
    <main id="content">
                   <Helmet>
                   <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <meta name="description" content="TRỌ NHANH cung cấp giải pháp cho thuê nhà và phòng trọ nhanh chóng và dễ dàng. Khám phá các dịch vụ của chúng tôi và tìm kiếm nơi ở phù hợp với nhu cầu của bạn ngay hôm nay." />
                <meta name="author" content="TRỌ NHANH" />
                <meta name="generator" content="TRỌ NHANH" />

                {/* Google Fonts */}
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
                <link rel="stylesheet" href="/assets/css/hoangtuchile.css" />
                <link rel="stylesheet" href="/assets/css/themes.css" />

                {/* Favicons */}
                <link rel="icon" href="/assets/images/favicon.ico" />

                {/* Twitter Meta Tags */}
                <meta name="twitter:card" content="summary_large_image" />
                <meta name="twitter:site" content="@TronNhanh" />
                <meta name="twitter:creator" content="@TronNhanh" />
                <meta name="twitter:title" content="Trang Chủ | TRỌ NHANH" />
                <meta name="twitter:description" content="TRỌ NHANH cung cấp giải pháp cho thuê nhà và phòng trọ nhanh chóng và dễ dàng. Khám phá các dịch vụ của chúng tôi và tìm kiếm nơi ở phù hợp với nhu cầu của bạn ngay hôm nay." />
                <meta name="twitter:image" content="/assets/images/tro-moi.png" />

                {/* Facebook Meta Tags */}
                <meta property="og:url" content={window.location.href} />
                <meta property="og:title" content="Trang Chủ | TRỌ NHANH" />
                <meta property="og:description" content="TRỌ NHANH cung cấp giải pháp cho thuê nhà và phòng trọ nhanh chóng và dễ dàng. Khám phá các dịch vụ của chúng tôi và tìm kiếm nơi ở phù hợp với nhu cầu của bạn ngay hôm nay." />
                <meta property="og:type" content="website" />
                <meta property="og:image" content="/assets/images/tro-moi.png" />
                <meta property="og:image:type" content="image/png" />
                <meta property="og:image:width" content="1200" />
                <meta property="og:image:height" content="630" />
                  {/* Các thẻ <script> */}
                  {/* <script src="/assets/vendors/jquery.min.js" />
                <script src="/assets/vendors/jquery-ui/jquery-ui.min.js" />
                <script src="/assets/vendors/bootstrap/bootstrap.bundle.js" />
                <script src="/assets/vendors/bootstrap-select/js/bootstrap-select.min.js" />
                <script src="/assets/vendors/slick/slick.min.js" />
                <script src="/assets/vendors/waypoints/jquery.waypoints.min.js" />
                <script src="/assets/vendors/counter/countUp.js" />
                <script src="/assets/vendors/magnific-popup/jquery.magnific-popup.min.js" />
                <script src="/assets/vendors/chartjs/Chart.min.js" />
                <script src="/assets/vendors/dropzone/js/dropzone.min.js" />
                <script src="/assets/vendors/timepicker/bootstrap-timepicker.min.js" />
                <script src="/assets/vendors/hc-sticky/hc-sticky.min.js" />
                <script src="/assets/vendors/jparallax/TweenMax.min.js" />
                <script src="/assets/vendors/mapbox-gl/mapbox-gl.js" />
                <script src="/assets/vendors/dataTables/jquery.dataTables.min.js" />
                <script src="/assets/js/theme.js" />
                <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" />
                <script>
                    {`
                        var districts = @json($districts);
                        var villages = @json($villages);
                    `}
                </script>
                <script src="/assets/js/search-api-vn.js" />
                <script src="/assets/js/yeuthich.js" /> */}
            </Helmet>
      <section className="d-flex flex-column">
        <div style={{ backgroundImage: `url('assets/images/bg-home-01.jpg')` }} className="bg-cover d-flex align-items-center custom-vh-100">
          <div className="container pt-lg-15 py-8" data-animate="zoomIn">
            <p className="text-white fs-md-22 fs-18 font-weight-500 letter-spacing-367 mb-6 text-center text-uppercase">
              Hãy để chúng tôi hướng dẫn ngôi nhà của bạn
            </p>
            <h2 className="text-white display-2 text-center mb-sm-13 mb-8">Tìm Ngôi Nhà Mơ Ước của bạn</h2>
            <form action="/client/room-listing" method="GET" className="property-search py-lg-0 z-index-2 position-relative d-none d-lg-block">
              <div className="row no-gutters">
                <div className="col-md-5 col-lg-4 col-xl-3">
                  <input className="search-field" type="hidden" name="status" value="for-sale" />
                  <ul className="nav nav-pills property-search-status-tab">
                    {/* Các tab trạng thái tài sản */}
                    {/* <li className="nav-item bg-secondary rounded-top" role="presentation">...</li> */}
                  </ul>
                </div>
              </div>
              <div className="bg-white px-6 rounded-bottom rounded-top-right pb-6 pb-lg-0">
                <div className="row align-items-center" id="accordion-4">
                  <div className="col-md-6 col-lg-3 col-xl-3 pt-6 pt-lg-0 order-1">
                    <label className="text-uppercase font-weight-500 letter-spacing-093 mb-1">Loại phòng</label>
                    <select className="form-control custom-select bg-transparent border-bottom rounded-0 border-color-input" title="Chọn" name="category">
                      <option value="">Tất cả loại phòng</option>
                      {/* {categories.map(category => (
                        <option key={category.id} value={category.id}>
                          {category.name}
                        </option>
                      ))} */}
                    </select>
                  </div>
                  <div className="col-md-6 col-lg-4 col-xl-5 pt-6 pt-lg-0 order-2">
                    <label className="text-uppercase font-weight-500 letter-spacing-093">Tìm kiếm</label>
                    <div className="position-relative">
                      <input type="text" name="search" className="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 pl-0 pr-4 font-weight-600 border-color-input placeholder-muted" placeholder="Tìm kiếm..." />
                      <i className="far fa-search position-absolute pos-fixed-right-center pr-0 fs-18 mt-n3"></i>
                    </div>
                  </div>
                  <div className="col-sm pr-lg-0 pt-6 pt-lg-0 order-3">
                    <a href="#advanced-search-filters-4" className="btn advanced-search btn-accent h-lg-100 w-100 shadow-none text-secondary rounded-0 fs-14 fs-sm-16 font-weight-600 text-left d-flex align-items-center collapsed" data-toggle="collapse" data-target="#advanced-search-filters-4" aria-expanded="true" aria-controls="advanced-search-filters-4">
                      Tìm kiếm nâng cao
                    </a>
                  </div>
                  <div className="col-sm pt-6 pt-lg-0 order-sm-4 order-5">
                    <button type="submit" className="btn btn-primary shadow-none fs-16 font-weight-600 w-100 py-lg-2 lh-213">
                      Tìm kiếm
                    </button>
                  </div>
                  <div id="advanced-search-filters-4" className="col-12 pt-4 pb-sm-4 order-sm-5 order-4 collapse" data-parent="#accordion-4">
                    <div className="row">
                      {/* Các bộ lọc tìm kiếm nâng cao */}
                      {/* ... */}
                    </div>
                  </div>
                </div>
              </div>
            </form>
            {/* Form tìm kiếm di động */}
            <form action="/client/room-listing" method="GET" className="property-search property-search-mobile d-lg-none z-index-2 position-relative bg-white rounded mx-md-10">
              <div className="row align-items-lg-center" id="accordion-4-mobile">
                <div className="col-12">
                  <div className="form-group mb-0 position-relative">
                    <a href="#advanced-search-filters-4-mobile" className="text-secondary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed" data-toggle="collapse" data-target="#advanced-search-filters-4-mobile" aria-expanded="true" aria-controls="advanced-search-filters-4-mobile">
                    </a>
                    <input type="text" className="form-control form-control-lg border shadow-none pr-9 pl-11 bg-white placeholder-muted" name="key-word" placeholder="Tìm kiếm..." />
                    <button type="submit" className="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left">
                      <i className="far fa-search"></i>
                    </button>
                  </div>
                </div>
                <div id="advanced-search-filters-4-mobile" className="col-12 pt-2 px-7 collapse" data-parent="#accordion-4-mobile">
                  <div className="row mx-n2">
                    {/* Các bộ lọc tìm kiếm nâng cao di động */}
                    {/* ... */}
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
              <h2 className="text-heading">Những Tài Sản Tốt Nhất Để Bán</h2>
              <span className="heading-divider"></span>
              <p className="mb-6">Xem Thêm</p>
            </div>
            <div className="col-md-6 text-md-right">
              <a href="/client/room-listing" className="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">Xem tất cả tài sản
                <i className="far fa-long-arrow-right ml-1"></i>
              </a>
            </div>
          </div>
          <div className="slick-slider slick-dots-mt-0 custom-arrow-spacing-30" data-slick-options='{"slidesToShow": 4, "autoplay": true, "dots": true}'>
            {rooms.map(room => (
              <div className="box pb-7 pt-2" key={room.id}>
                <div className="card shadow-hover-2 h-100" data-animate="zoomIn">
                  <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top" style={{ height: '200px', overflow: 'hidden' }}>
                    <img src={room.images.length > 0 ? `assets/images/${room.images[0].filename}` : 'assets/images/properties-grid-01.jpg'} alt={room.title} className="img-fluid w-100 h-100 rounded" style={{ objectFit: 'cover' }} />
                    <div className="card-img-overlay p-2 d-flex flex-column">
                      {room.expiration_date > new Date() && (
                        <span className="badge bg-danger text-white" style={{ top: '1px', right: '1px' }}>
                          VIP
                        </span>
                      )}
                      <ul className="list-inline mb-0 mt-auto hover-image">
                        <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Hình ảnh">
                          <a href="#" className="text-white hover-primary">
                            <i className="far fa-images"></i><span className="pl-1">9</span>
                          </a>
                        </li>
                        <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                          <a href="#" className="text-white hover-primary">
                            <i className="far fa-play-circle"></i><span className="pl-1">2</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div className="card-body pt-3 d-flex flex-column">
                    <h2 className="card-title fs-16 lh-2 mb-0">
                      <a href={`/client/detail-room/${room.slug}`} className="text-dark hover-primary"><small>{room.title}</small></a>
                    </h2>
                    <p className="card-text font-weight-500 text-gray-light mb-2">
                      {room.address}
                    </p>
                    <ul className="list-inline d-flex mb-0 flex-wrap mr-n5 mt-auto">
                      <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Phòng ngủ">
                        <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                          <use xlinkHref="#icon-bedroom"></use>
                        </svg>
                        {room.bedroom ?? '3'} Phòng
                      </li>
                      <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Phòng tắm">
                        <svg className="icon icon-shower fs-18 text-primary mr-1">
                          <use xlinkHref="#icon-shower"></use>
                        </svg>
                        {room.bathroom ?? '1'} Phòng
                      </li>
                      <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Diện tích">
                        <svg className="icon icon-square fs-18 text-primary mr-1">
                          <use xlinkHref="#icon-square"></use>
                        </svg>
                        {room.acreage ?? '200'} m²
                      </li>
                    </ul>
                  </div>
                  <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                    <p className="fs-17 font-weight-bold text-heading mb-0">
                      {new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(room.price)}
                    </p>
                    <ul className="list-inline mb-0">
                      <li className="list-inline-item">
                        <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center favorite-btn">
                          <i className="fas fa-heart"></i>
                        </a>
                      </li>
                      <li className="list-inline-item">
                        <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="So sánh">
                          <i className="fas fa-exchange-alt"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
      <section>
        <div className="bg-gray-02 py-lg-13 pt-11 pb-6">
          <div className="container container-xxl">
            <div className="row">
              <div className="col-lg-4 pr-xl-13" data-animate="fadeInLeft">
                <h2 className="text-heading lh-1625">Khám Phá <br /> Theo Loại Tài Sản</h2>
                <span className="heading-divider"></span>
                <p className="mb-6">Xem Thêm</p>
                <form action="/client/room-listing" method="GET">
                  <div className="input-group input-group-lg ">
                    <input type="text" className="form-control fs-13 font-weight-500 text-gray-light rounded-lg rounded-right-0 border-0 shadow-none h-52 bg-white" name="type" placeholder="Nhập loại phòng" />
                    <button type="submit" className="btn btn-primary fs-18 rounded-left-0 rounded-lg px-6 border-0">
                      <i className="far fa-search"></i>
                    </button>
                  </div>
                </form>
              </div>
              <div className="col-lg-8" data-animate="fadeInRight">
                <div className="slick-slider arrow-haft-inner custom-arrow-xxl-hide mx-0" data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":false}'>
                  {/* Các loại tài sản */}
                  {/* ... */}
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
              <h2 className="text-heading">Những Bất Động Sản Tốt Nhất Để Thuê</h2>
              <span className="heading-divider"></span>
              <p className="mb-6">Xem Thêm</p>
            </div>
            <div className="col-md-6 text-md-right">
              <a href="/client/room-listing" className="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">Xem tất cả bất động sản
                <i className="far fa-long-arrow-right ml-1"></i>
              </a>
            </div>
          </div>
          <div className="slick-slider slick-dots-mt-0 custom-arrow-spacing-30" data-slick-options='{"slidesToShow": 4,"dots":true,"arrows":false}'>
            {rooms.map(room => (
              <div className="box pb-7 pt-2" key={room.id}>
                <div className="card shadow-hover-2 h-100" data-animate="zoomIn">
                  <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top" style={{ height: '200px', overflow: 'hidden' }}>
                    <img src={room.images.length > 0 ? `assets/images/${room.images[0].filename}` : 'assets/images/properties-grid-01.jpg'} alt={room.title} className="img-fluid w-100 h-100 rounded" style={{ objectFit: 'cover' }} />
                    <div className="card-img-overlay p-2 d-flex flex-column">
                      {room.expiration_date > new Date() && (
                        <span className="badge bg-danger text-white" style={{ top: '1px', right: '1px' }}>
                          VIP
                        </span>
                      )}
                      <ul className="list-inline mb-0 mt-auto hover-image">
                        <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Hình ảnh">
                          <a href="#" className="text-white hover-primary">
                            <i className="far fa-images"></i><span className="pl-1">9</span>
                          </a>
                        </li>
                        <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                          <a href="#" className="text-white hover-primary">
                            <i className="far fa-play-circle"></i><span className="pl-1">2</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div className="card-body pt-3 d-flex flex-column">
                    <h2 className="card-title fs-16 lh-2 mb-0">
                      <a href={`/client/detail-room/${room.slug}`} className="text-dark hover-primary"><small>{room.title}</small></a>
                    </h2>
                    <p className="card-text font-weight-500 text-gray-light mb-2">
                      {room.address}
                    </p>
                    <ul className="list-inline d-flex mb-0 flex-wrap mr-n5 mt-auto">
                      <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Phòng ngủ">
                        <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                          <use xlinkHref="#icon-bedroom"></use>
                        </svg>
                        {room.bedroom ?? '3'} Phòng
                      </li>
                      <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Phòng tắm">
                        <svg className="icon icon-shower fs-18 text-primary mr-1">
                          <use xlinkHref="#icon-shower"></use>
                        </svg>
                        {room.bathroom ?? '1'} Phòng
                      </li>
                      <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Diện tích">
                        <svg className="icon icon-square fs-18 text-primary mr-1">
                          <use xlinkHref="#icon-square"></use>
                        </svg>
                        {room.acreage ?? '200'} m²
                      </li>
                    </ul>
                  </div>
                  <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                    <p className="fs-17 font-weight-bold text-heading mb-0">
                      {new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(room.price)}
                    </p>
                    <ul className="list-inline mb-0">
                      <li className="list-inline-item">
                        <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center favorite-btn">
                          <i className="fas fa-heart"></i>
                        </a>
                      </li>
                      <li className="list-inline-item">
                        <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="So sánh">
                          <i className="fas fa-exchange-alt"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
      <section>
        <div className="bg-single-image pt-lg-13 pb-lg-12 py-11 bg-secondary">
          <div className="container container-xxl">
            <div className="row align-items-center">
              <div className="col-lg-6 pr-xl-8 pb-lg-0 pb-6" data-animate="fadeInLeft">
                <a href="#" className="hover-shine d-block">
                  <img src="assets/images/single-image-01.jpg" className="rounded-lg w-100" alt="Tìm khu phố của bạn" />
                </a>
              </div>
              <div className="col-lg-6 pl-xl-8" data-animate="fadeInRight">
                <h2 className="text-white lh-1625">Tìm khu phố của bạn<br /></h2>
                <span className="heading-divider"></span>
                <p className="mb-6 text-white">Xem Thêm</p>
                <div className="input-group input-group-lg pr-sm-17">
                  <input type="text" className="form-control fs-13 font-weight-500 text-gray-light rounded-lg rounded-right-0 border-0 shadow-none h-52 bg-white" name="search" placeholder="Nhập địa chỉ, khu phố" />
                  <button type="submit" className="btn btn-primary fs-18 rounded-left-0 rounded-lg px-6 border-0">
                    <i className="far fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section className="pt-lg-12 pb-lg-15 py-11">
        <div className="container container-xxl">
          <h2 className="text-heading">Các phòng trọ nổi bật</h2>
          <span className="heading-divider"></span>
          <p className="mb-7">Xem Thêm</p>
          <div className="slick-slider slick-dots-mt-0 custom-arrow-spacing-30" data-slick-options='{"slidesToShow": 4, "autoplay": true, "dots": true}'>
            {rooms.map(room => (
              <div className="box pb-7 pt-2" key={room.id}>
                <div className="card shadow-hover-2 h-100" data-animate="zoomIn">
                  <div className="hover-change-image bg-hover-overlay rounded-lg card-img-top" style={{ height: '200px', overflow: 'hidden' }}>
                    <img src={room.images.length > 0 ? `assets/images/${room.images[0].filename}` : 'assets/images/properties-grid-01.jpg'} alt={room.title} className="img-fluid w-100 h-100 rounded" style={{ objectFit: 'cover' }} />
                    <div className="card-img-overlay p-2 d-flex flex-column">
                      {room.expiration_date > new Date() && (
                        <span className="badge bg-danger text-white" style={{ top: '1px', right: '1px' }}>
                          VIP
                        </span>
                      )}
                      <ul className="list-inline mb-0 mt-auto hover-image">
                        <li className="list-inline-item mr-2" data-toggle="tooltip" title="9 Hình ảnh">
                          <a href="#" className="text-white hover-primary">
                            <i className="far fa-images"></i><span className="pl-1">9</span>
                          </a>
                        </li>
                        <li className="list-inline-item" data-toggle="tooltip" title="2 Video">
                          <a href="#" className="text-white hover-primary">
                            <i className="far fa-play-circle"></i><span className="pl-1">2</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div className="card-body pt-3 d-flex flex-column">
                    <h2 className="card-title fs-16 lh-2 mb-0">
                      <a href={`/client/detail-room/${room.slug}`} className="text-dark hover-primary"><small>{room.title}</small></a>
                    </h2>
                    <p className="card-text font-weight-500 text-gray-light mb-2">
                      {room.address}
                    </p>
                    <ul className="list-inline d-flex mb-0 flex-wrap mr-n5 mt-auto">
                      <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Phòng ngủ">
                        <svg className="icon icon-bedroom fs-18 text-primary mr-1">
                          <use xlinkHref="#icon-bedroom"></use>
                        </svg>
                        {room.bedroom ?? '3'} Phòng
                      </li>
                      <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Phòng tắm">
                        <svg className="icon icon-shower fs-18 text-primary mr-1">
                          <use xlinkHref="#icon-shower"></use>
                        </svg>
                        {room.bathroom ?? '1'} Phòng
                      </li>
                      <li className="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Diện tích">
                        <svg className="icon icon-square fs-18 text-primary mr-1">
                          <use xlinkHref="#icon-square"></use>
                        </svg>
                        {room.acreage ?? '200'} m²
                      </li>
                    </ul>
                  </div>
                  <div className="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                    <p className="fs-17 font-weight-bold text-heading mb-0">
                      {new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(room.price)}
                    </p>
                    <ul className="list-inline mb-0">
                      <li className="list-inline-item">
                        <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center favorite-btn">
                          <i className="fas fa-heart"></i>
                        </a>
                      </li>
                      <li className="list-inline-item">
                        <a href="#" className="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="So sánh">
                          <i className="fas fa-exchange-alt"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
      <section className="bg-accent pt-10 pb-lg-11 pb-8 bg-patten-04">
        <div className="container container-xxl">
          <h2 className="text-dark text-center mxw-751 fs-26 lh-184 px-md-8">
            Chúng tôi có nhiều danh sách nhất và cập nhật liên tục.
            Vì vậy bạn sẽ không bỏ lỡ thông tin nào.
          </h2>
          <span className="heading-divider mx-auto"></span>
          <div className="row mt-8">
            <div className="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
              <div className="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                <div className="row no-gutters">
                  <div className="col-sm-3">
                    <img src="assets/images/group-16.png" alt="Mua nhà mới" />
                  </div>
                  <div className="col-sm-9">
                    <div className="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                      <a href="/client/room-listing" className="d-flex align-items-center text-dark hover-secondary">
                        <h4 className="fs-20 lh-1625 mb-1">Tìm trọ mới</h4>
                        <span className="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                          <svg className="icon icon-long-arrow">
                            <use xlinkHref="#icon-long-arrow"></use>
                          </svg>
                        </span>
                      </a>
                      <p className="mb-0">Xem thêm</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
              <div className="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                <div className="row no-gutters">
                  <div className="col-sm-3">
                    <img src="assets/images/group-17.png" alt="Bán nhà" />
                  </div>
                  <div className="col-sm-9">
                    <div className="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                      <a href="/client/home" className="d-flex align-items-center text-dark hover-secondary">
                        <h4 className="fs-20 lh-1625 mb-1">Đăng tin</h4>
                        <span className="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                          <svg className="icon icon-long-arrow">
                            <use xlinkHref="#icon-long-arrow"></use>
                          </svg>
                        </span>
                      </a>
                      <p className="mb-0">Xem Thêm</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-4 mb-6 mb-lg-0" data-animate="zoomIn">
              <div className="card border-hover shadow-2 shadow-hover-lg-1 pl-5 pr-6 py-6 h-100 hover-change-image">
                <div className="row no-gutters">
                  <div className="col-sm-3">
                    <img src="assets/images/group-21.png" alt="Thuê nhà" />
                  </div>
                  <div className="col-sm-9">
                    <div className="card-body p-0 pl-0 pl-sm-5 pt-5 pt-sm-0">
                      <a href="/client/client-list-zone" className="d-flex align-items-center text-dark hover-secondary">
                        <h4 className="fs-20 lh-1625 mb-1">Tìm quanh đây</h4>
                        <span className="ml-2 text-primary fs-42 lh-1 hover-image d-inline-flex align-items-center">
                          <svg className="icon icon-long-arrow">
                            <use xlinkHref="#icon-long-arrow"></use>
                          </svg>
                        </span>
                      </a>
                      <p className="mb-0">Xem Thêm</p>
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
            <div className="slick-slider mx-0 partners" data-slick-options='{"slidesToShow": 6, "autoplay":true,"dots":false}'>
              {/* Các đối tác */}
              {/* ... */}
            </div>
          </div>
        </div>
      </section>
      <div id="compare" className="compare">
        <button className="btn shadow btn-open bg-white bg-hover-accent text-secondary rounded-right-0 d-flex justify-content-center align-items-center w-30px h-140 p-0"></button>
        <div className="list-group list-group-no-border bg-dark py-3">
          <a href="#" className="list-group-item bg-transparent text-white fs-22 text-center py-0">
            <i className="far fa-bars"></i>
          </a>
          {/* Các tài sản để so sánh */}
          {/* ... */}
          <div className="list-group-item bg-transparent">
            <a href="compare-details.html" className="btn btn-lg btn-primary w-100 px-0 d-flex justify-content-center">
              So sánh
            </a>
          </div>
        </div>
      </div>
    </main>
  );
};

export default HomePage;