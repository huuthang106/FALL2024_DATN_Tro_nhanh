@extends('layouts.owner')
@section('titleOwners', 'Trang chủ trọ nhanh')
@section('contentOwners')
    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15">Thêm thuộc tính
                </h2>
                {{-- <p class="mb-1">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p> --}}
            </div>
            <div class="collapse-tabs new-property-step">
                <ul class="nav nav-pills border py-2 px-3 mb-6 d-none d-md-flex mb-6" role="tablist">
                    <li class="nav-item col">
                        <a class="nav-link active bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="description-tab" data-toggle="pill" data-number="1." href="#description" role="tab"
                            aria-controls="description" aria-selected="true"><span class="number">1.</span>Mô tả</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="media-tab" data-toggle="pill" data-number="2." href="#media" role="tab"
                            aria-controls="media" aria-selected="false"><span class="number">2.</span>Phương tiện
                            truyền thông</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="location-tab" data-toggle="pill" data-number="3." href="#location" role="tab"
                            aria-controls="location" aria-selected="false"><span class="number">3.</span>Vị trí</a>
                    </li>
                    {{-- <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="detail-tab" data-toggle="pill" data-number="4." href="#detail" role="tab"
                            aria-controls="detail" aria-selected="false"><span class="number">4.</span>
                            Chi tiết</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="amenities-tab" data-toggle="pill" data-number="5." href="#amenities" role="tab"
                            aria-controls="amenities" aria-selected="false"><span class="number">5.</span>Tiện nghi</a>
                    </li> --}}
                </ul>
                <div class="tab-content shadow-none p-0">
                    <form id="add-room" class="form" enctype="multipart/form-data"
                        action="{{ route('owners.store-room') }}" method="POST">
                        @csrf
                        <div id="collapse-tabs-accordion">
                            <div class="tab-pane tab-pane-parent fade show active px-0" id="description" role="tabpanel"
                                aria-labelledby="description-tab">

                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                        id="heading-description">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                data-toggle="collapse" data-number="1." data-target="#description-collapse"
                                                aria-expanded="true" aria-controls="description-collapse">
                                                <span class="number">1.</span>Mô tả
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="description-collapse" class="collapse show collapsible"
                                        aria-labelledby="heading-description" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <!-- Cột bên trái -->
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Thông tin
                                                                trọ</h3>
                                                            <hr>
                                                            <div class="form-group">
                                                                <label for="title" class="text-heading">Tiêu đề <span
                                                                        class="text-muted">(Bắt buộc)</span></label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="title" name="title">
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <label for="description" class="text-heading">Mô
                                                                    tả <span class="text-muted">(Bắt buộc)</span></label>
                                                                <textarea class="form-control border-0" rows="5" name="description" id="descriptions"></textarea>
                                                            </div>
                                                            <div class="form-group mt-1">
                                                                <label for="acreages_id" class="text-heading">Diện tích
                                                                    m²</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="acreages_id" name="acreages_id">
                                                                    <option value="">Chọn diện tích</option>
                                                                    @foreach ($acreages as $acreage)
                                                                        <option value="{{ $acreage->id }}">
                                                                            {{ $acreage->max_size }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Chọn danh
                                                                mục</h3>
                                                            <hr>
                                                            <div class="form-row mx-n2">
                                                                <div
                                                                    class="col-md-6 col-lg-12 col-xxl-6 px-2 mb-4 mb-md-0">
                                                                    <div class="form-group mb-0">
                                                                        <label for="category_id" class="text-heading">Danh
                                                                            mục</label>
                                                                        <select
                                                                            class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                            title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                            id="category_id" name="category_id">
                                                                            <!-- Các lựa chọn loại phòng -->
                                                                            @if ($categories->isEmpty())
                                                                                <option value="">Không có dữ liệu
                                                                                </option>
                                                                            @else
                                                                                @foreach ($categories as $category)
                                                                                    <option value="{{ $category->id }}">
                                                                                        {{ $category->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-6 col-lg-12 col-xxl-6 px-2 mb-4 mb-md-0">
                                                                    <div class="form-group mb-0">
                                                                        <label for="room_type_id"
                                                                            class="text-heading">Loại phòng</label>
                                                                        <select
                                                                            class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                            title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                            id="room_type_id" name="room_type_id">
                                                                            <!-- Các lựa chọn loại phòng -->
                                                                            @if ($roomTypes->isEmpty())
                                                                                <option value="">Không có dữ liệu
                                                                                </option>
                                                                            @else
                                                                                @foreach ($roomTypes as $roomType)
                                                                                    <option value="{{ $roomType->id }}">
                                                                                        {{ $roomType->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Cột bên phải -->
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Giá và
                                                                Thông tin liên hệ</h3>
                                                            <hr>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="price" class="text-heading">Giá
                                                                            bằng VND <span class="text-muted">(Bắt
                                                                                buộc)</span></label>
                                                                        <input type="number"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="price" name="price">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="phone" class="text-heading">Số điện
                                                                            thoại</label>
                                                                        <input type="text" name="phone"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="phone"
                                                                            value="{{ Auth::check() ? Auth::user()->phone : 'Chưa có' }}">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="user_name" class="text-heading">Họ và
                                                                            Tên</label>
                                                                        <!-- Hiển thị tên người dùng -->
                                                                        <input type="text"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="user_name"
                                                                            value="{{ Auth::check() ? Auth::user()->name : 'Chưa có' }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>

                                                                <!-- Trường ẩn để lưu ID người dùng -->
                                                                <input type="hidden" id="user_id" name="user_id"
                                                                    value="{{ Auth::check() ? Auth::user()->id : '' }}">

                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="email"
                                                                            class="text-heading">Email</label>
                                                                        <input type="email"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="email" name="email"
                                                                            value="{{ Auth::check() ? Auth::user()->email : 'Chưa có' }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-0"><label for="price_id"
                                                                            class="text-heading">Giá ID</label>
                                                                        <select
                                                                            class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                            title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                            id="price_id" name="price_id">
                                                                            <!-- Các lựa chọn loại phòng -->
                                                                            @if ($prices->isEmpty())
                                                                                <option value="">Không có dữ liệu
                                                                                </option>
                                                                            @else
                                                                                @foreach ($prices as $price)
                                                                                    <option value="{{ $price->id }}">
                                                                                        {{ $price->price_range }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Chọn số
                                                                lượng</h3>
                                                            <hr>
                                                            <div class="form-group mb-0">
                                                                <label for="quantity" class="text-heading">Số người ở tối
                                                                    đa <span class="text-muted">(Bắt buộc)</span><span
                                                                        class="text-muted">(Ví dụ: 1,
                                                                        2,...)</span></label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="quantity" name="quantity">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button class="btn btn-lg btn-primary next-button">Tiếp theo <span
                                                        class="d-inline-block ml-2 fs-16">
                                                        <i class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane tab-pane-parent fade px-0" id="media" role="tabpanel"
                                aria-labelledby="media-tab">

                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                        id="heading-media">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                data-toggle="collapse" data-number="2." data-target="#media-collapse"
                                                aria-expanded="true" aria-controls="media-collapse">
                                                <span class="number">2.</span> Phương tiện truyền thông
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="media-collapse" class="collapse collapsible" aria-labelledby="heading-media"
                                        data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                                Tải lên hình ảnh bất động sản của bạn
                                                            </h3>
                                                            <hr>
                                                            <div class="dropzone upload-file text-center py-5"
                                                                id="myDropzone">
                                                                <div class="dz-default dz-message">
                                                                    <span class="upload-icon lh-1 d-inline-block mb-4">
                                                                        <i class="fal fa-cloud-upload-alt"></i>
                                                                    </span>
                                                                    <p class="text-heading fs-22 lh-15 mb-4">
                                                                        Kéo và thả hình ảnh hoặc
                                                                    </p>
                                                                    <button class="btn btn-indigo px-7 mb-2"
                                                                        type="button"
                                                                        onclick="document.getElementById('fileInput').click();">
                                                                        Chọn thư mục
                                                                    </button>
                                                                    <input type="file" hidden id="fileInput" multiple
                                                                        accept="image/jpeg, image/png" name="images[]"
                                                                        onchange="previewImages();">
                                                                    <p>Chọn 1 lúc nhiều ảnh</p>
                                                                </div>
                                                            </div>

                                                            <!-- Phần tử để hiển thị ảnh đã chọn trong form -->
                                                            <div id="imagePreview" class="text-center mt-4"></div>
                                                            <!-- Ẩn View -->
                                                            <input type="hidden" class="form-control" id="view"
                                                                name="view" value="1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                                Tùy chọn video
                                                            </h3>
                                                            <hr>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="status" class="text-heading">Trạng
                                                                            thái</label>
                                                                        <select
                                                                            class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                            data-style="btn-lg py-2 h-52" id="status"
                                                                            name="status">
                                                                            <option value="0">Chưa kích hoạt</option>
                                                                            <option value="1">Kích hoạt</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="category_id"
                                                                            class="text-heading">Trạng
                                                                            Loại</label>
                                                                        <select
                                                                            class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                            data-style="btn-lg py-2 h-52" id="category_id"
                                                                            name="category_id">
                                                                            <option value="0">Chưa kích hoạt</option>
                                                                            <option value="1">Kích hoạt</option>
                                                                        </select>
                                                                    </div>
                                                                </div> --}}
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="embed-video-id"
                                                                            class="text-heading">Đường
                                                                            dẫn Video</label>
                                                                        <input type="text" name="embed-video-id"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="embed-video-id">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Removed commented out "Virtual Tour" section -->
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="#"
                                                    class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i
                                                            class="fal fa-long-arrow-left"></i></span>Phía trước
                                                </a>
                                                <button class="btn btn-lg btn-primary next-button mb-3">Tiếp theo
                                                    <span class="d-inline-block ml-2 fs-16"><i
                                                            class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane tab-pane-parent fade px-0" id="location" role="tabpanel"
                                aria-labelledby="location-tab">

                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                        id="heading-location">
                                        <h5 class="mb-0">
                                            <button class="btn btn-block collapse-parent collapsed border shadow-none"
                                                data-toggle="collapse" data-number="3." data-target="#location-collapse"
                                                aria-expanded="true" aria-controls="location-collapse">
                                                <span class="number">3.</span> Vị trí
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="location-collapse" class="collapse collapsible"
                                        aria-labelledby="heading-location" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Địa chỉ
                                                                cho thuê</h3>
                                                            <hr>
                                                            <div class="form-row mx-n2">
                                                                <!-- Removed the "Quốc gia / Tiểu bang" section -->
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <div class="select-item">
                                                                            <label for="city-province">Tỉnh/Thành Phố
                                                                                :</label>
                                                                            <select id="city-province"
                                                                                class="form-control border-0 shadow-none">
                                                                                <option value='0'>&nbsp;Chọn
                                                                                    Tỉnh/Thành Phố...</option>
                                                                                <option value='01'>&nbspThành phố Hà
                                                                                    Nội</option>
                                                                                <option value='79'>&nbspThành phố Hồ
                                                                                    Chí Minh</option>
                                                                                <option value='31'>&nbspThành phố Hải
                                                                                    Phòng</option>
                                                                                <option value='48'>&nbspThành phố Đà
                                                                                    Nẵng</option>
                                                                                <option value='92'>&nbspThành phố Cần
                                                                                    Thơ</option>
                                                                                <option value='02'>&nbspTỉnh Hà Giang
                                                                                </option>
                                                                                <option value='04'>&nbspTỉnh Cao Bằng
                                                                                </option>
                                                                                <option value='06'>&nbspTỉnh Bắc Kạn
                                                                                </option>
                                                                                <option value='08'>&nbspTỉnh Tuyên
                                                                                    Quang</option>
                                                                                <option value='10'>&nbspTỉnh Lào Cai
                                                                                </option>
                                                                                <option value='11'>&nbspTỉnh Điện Biên
                                                                                </option>
                                                                                <option value='12'>&nbspTỉnh Lai Châu
                                                                                </option>
                                                                                <option value='14'>&nbspTỉnh Sơn La
                                                                                </option>
                                                                                <option value='15'>&nbspTỉnh Yên Bái
                                                                                </option>
                                                                                <option value='17'>&nbspTỉnh Hoà Bình
                                                                                </option>
                                                                                <option value='19'>&nbspTỉnh Thái
                                                                                    Nguyên</option>
                                                                                <option value='20'>&nbspTỉnh Lạng Sơn
                                                                                </option>
                                                                                <option value='22'>&nbspTỉnh Quảng Ninh
                                                                                </option>
                                                                                <option value='24'>&nbspTỉnh Bắc Giang
                                                                                </option>
                                                                                <option value='25'>&nbspTỉnh Phú Thọ
                                                                                </option>
                                                                                <option value='26'>&nbspTỉnh Vĩnh Phúc
                                                                                </option>
                                                                                <option value='27'>&nbspTỉnh Bắc Ninh
                                                                                </option>
                                                                                <option value='30'>&nbspTỉnh Hải Dương
                                                                                </option>
                                                                                <option value='33'>&nbspTỉnh Hưng Yên
                                                                                </option>
                                                                                <option value='34'>&nbspTỉnh Thái Bình
                                                                                </option>
                                                                                <option value='35'>&nbspTỉnh Hà Nam
                                                                                </option>
                                                                                <option value='36'>&nbspTỉnh Nam Định
                                                                                </option>
                                                                                <option value='37'>&nbspTỉnh Ninh Bình
                                                                                </option>
                                                                                <option value='38'>&nbspTỉnh Thanh Hóa
                                                                                </option>
                                                                                <option value='40'>&nbspTỉnh Nghệ An
                                                                                </option>
                                                                                <option value='42'>&nbspTỉnh Hà Tĩnh
                                                                                </option>
                                                                                <option value='44'>&nbspTỉnh Quảng Bình
                                                                                </option>
                                                                                <option value='45'>&nbspTỉnh Quảng Trị
                                                                                </option>
                                                                                <option value='46'>&nbspTỉnh Thừa Thiên
                                                                                    Huế</option>
                                                                                <option value='49'>&nbspTỉnh Quảng Nam
                                                                                </option>
                                                                                <option value='51'>&nbspTỉnh Quảng Ngãi
                                                                                </option>
                                                                                <option value='52'>&nbspTỉnh Bình Định
                                                                                </option>
                                                                                <option value='54'>&nbspTỉnh Phú Yên
                                                                                </option>
                                                                                <option value='56'>&nbspTỉnh Khánh Hòa
                                                                                </option>
                                                                                <option value='58'>&nbspTỉnh Ninh Thuận
                                                                                </option>
                                                                                <option value='60'>&nbspTỉnh Bình Thuận
                                                                                </option>
                                                                                <option value='62'>&nbspTỉnh Kon Tum
                                                                                </option>
                                                                                <option value='64'>&nbspTỉnh Gia Lai
                                                                                </option>
                                                                                <option value='66'>&nbspTỉnh Đắk Lắk
                                                                                </option>
                                                                                <option value='67'>&nbspTỉnh Đắk Nông
                                                                                </option>
                                                                                <option value='68'>&nbspTỉnh Lâm Đồng
                                                                                </option>
                                                                                <option value='70'>&nbspTỉnh Bình Phước
                                                                                </option>
                                                                                <option value='72'>&nbspTỉnh Tây Ninh
                                                                                </option>
                                                                                <option value='74'>&nbspTỉnh Bình Dương
                                                                                </option>
                                                                                <option value='75'>&nbspTỉnh Đồng Nai
                                                                                </option>
                                                                                <option value='77'>&nbspTỉnh Bà Rịa -
                                                                                    Vũng Tàu</option>
                                                                                <option value='80'>&nbspTỉnh Long An
                                                                                </option>
                                                                                <option value='82'>&nbspTỉnh Tiền Giang
                                                                                </option>
                                                                                <option value='83'>&nbspTỉnh Bến Tre
                                                                                </option>
                                                                                <option value='84'>&nbspTỉnh Trà Vinh
                                                                                </option>
                                                                                <option value='86'>&nbspTỉnh Vĩnh Long
                                                                                </option>
                                                                                <option value='87'>&nbspTỉnh Đồng Tháp
                                                                                </option>
                                                                                <option value='89'>&nbspTỉnh An Giang
                                                                                </option>
                                                                                <option value='91'>&nbspTỉnh Kiên Giang
                                                                                </option>
                                                                                <option value='93'>&nbspTỉnh Hậu Giang
                                                                                </option>
                                                                                <option value='94'>&nbspTỉnh Sóc Trăng
                                                                                </option>
                                                                                <option value='95'>&nbspTỉnh Bạc Liêu
                                                                                </option>
                                                                                <option value='96'>&nbspTỉnh Cà Mau
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <div class="select-item district-town-select">
                                                                            <label for="district-town">Quận/Huyện :</label>
                                                                            <select
                                                                                class="form-control border-0 shadow-none"
                                                                                id="district-town">
                                                                                <option value='0'>&nbsp;Chọn
                                                                                    Quận/Huyện...</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <div class="select-item ward-commune-select">
                                                                            <label for="ward-commune">Xã/Phường :</label>
                                                                            <select
                                                                                class="form-control border-0 shadow-none"
                                                                                id="ward-commune">
                                                                                <option value='0'>&nbsp;Chọn
                                                                                    Phường/Xã...</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address" class="text-heading">Địa chỉ chính
                                                                    xác</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="address" name="address">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="location_id" class="text-heading">Vị
                                                                    trí</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="location_id" name="location_id">
                                                                    <!-- Các lựa chọn loại phòng -->
                                                                    @if ($locations->isEmpty())
                                                                        <option value="">Không có dữ liệu
                                                                        </option>
                                                                    @else
                                                                        @foreach ($locations as $location)
                                                                            <option value="{{ $location->id }}">
                                                                                {{ $location->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="zone" class="text-heading">Khu vực</label>
                                                                {{-- <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="zone" name="zone"> --}}
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="zone_id" name="zone_id">
                                                                    <!-- Các lựa chọn loại phòng -->
                                                                    @if ($zones->isEmpty())
                                                                        <option value="">Không có dữ liệu
                                                                        </option>
                                                                    @else
                                                                        @foreach ($zones as $zone)
                                                                            <option value="{{ $zone->id }}">
                                                                                {{ $zone->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-6 text-heading fs-22 lh-15">Bản đồ
                                                            </h3>
                                                            {{-- <div id="map" class="mapbox-gl map-point-animate mb-6"
                                                                style="height: 296px"
                                                                data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ"
                                                                data-mapbox-options='{"center":[-73.981566, 40.739011],"setLngLat":[-73.981566, 40.739011]}'
                                                                data-mapbox-marker='[{"position":[-73.981566, 40.739011],"className":"marker","backgroundImage":"images/googlle-market-01.png","backgroundRepeat":"no-repeat","width":"32px","height":"40px"}]'>
                                                            </div> --}}
                                                            <div id="map" class="mapbox-gl map-point-animate mb-6"
                                                                style="height: 296px">
                                                            </div>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="latitude" class="text-heading">Vĩ
                                                                            độ</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="latitude" name="latitude" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="longitude" class="text-heading">Kinh
                                                                            độ</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="longitude" name="longitude" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="d-flex flex-wrap">
                                                <a href="#"
                                                    class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i
                                                            class="fal fa-long-arrow-left"></i></span> Phía trước
                                                </a>
                                                <button class="btn btn-lg btn-primary next-button mb-3">Tiếp theo
                                                    <span class="d-inline-block ml-2 fs-16"><i
                                                            class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div> --}}
                                            <div class="d-flex flex-wrap">
                                                <a href="#"
                                                    class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i
                                                            class="fal fa-long-arrow-left"></i></span>Phía
                                                    trước
                                                </a>
                                                <button class="btn btn-lg btn-primary mb-3" type="submit">Gửi
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- <div class="tab-pane tab-pane-parent fade px-0" id="detail" role="tabpanel"
                                aria-labelledby="detail-tab">

                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                        id="heading-detail">
                                        <h5 class="mb-0">
                                            <button class="btn btn-block collapse-parent collapsed border shadow-none"
                                                data-toggle="collapse" data-number="4." data-target="#detail-collapse"
                                                aria-expanded="true" aria-controls="detail-collapse">
                                                <span class="number">4.</span>Chi tiết
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="detail-collapse" class="collapse collapsible"
                                        aria-labelledby="heading-detail" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <!-- Card for listing details -->
                                            <div class="card mb-6">
                                                <div class="card-body p-6">
                                                    <h3 class="card-title mb-0 text-heading fs-22 lh-15">Chi tiết niêm yết
                                                    </h3>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="size-in-ft" class="text-heading">Diện tích m2
                                                                    <span class="text-muted">(chỉ có số)</span></label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="size-in-ft" name="size-in-ft">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="view" class="text-heading">Lượt
                                                                    xem</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="view" name="view">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="room" class="text-heading">Phòng</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="room" name="rooms">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="bedrooms" class="text-heading">Phòng
                                                                    ngủ</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="bedrooms" name="bedrooms">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="bathrooms" class="text-heading">Phòng
                                                                    tắm</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="bathrooms" name="bathrooms">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="customID" class="text-heading">ID tùy chỉnh
                                                                    <span class="text-muted">(văn bản)</span></label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="customID" name="customID">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="garages" class="text-heading">Nhà để
                                                                    xe</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="garages" name="garages">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="garage-size" class="text-heading">Kích thước
                                                                    gara</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="garage-size" name="garage-size">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="year-built" class="text-heading">Năm xây dựng
                                                                    <span class="text-muted">(số)</span></label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="year-built" name="year-built">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="available-from" class="text-heading">Có sẵn từ
                                                                    <span class="text-muted">(ngày)</span></label>
                                                                <input type="date"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="available-from" name="available-from">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="basement" class="text-heading">Tầng
                                                                    hầm</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="basement" name="basement">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="extra-details" class="text-heading">Chi tiết
                                                                    bổ sung</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="extra-details" name="extra-details">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="roofing" class="text-heading">Mái nhà</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="roofing" name="roofing">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exterior-material" class="text-heading">Vật
                                                                    liệu bên ngoài</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="exterior-material" name="exterior-material">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="structure-type" class="text-heading">Kiểu cấu
                                                                    trúc</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Chọn" data-style="btn-lg py-2 h-52"
                                                                    id="structure-type" name="structure-type">
                                                                    <option>Cho thuê</option>
                                                                    <option>Để bán</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <label for="floors-no" class="text-heading">Số
                                                                    tầng</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Chọn" data-style="btn-lg py-2 h-52"
                                                                    id="floors-no" name="floors-no">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="form-group mb-0">
                                                                <label for="owner" class="text-heading">Chủ sở hữu/ Đại
                                                                    lý không có thông tin (không hiển thị ở mặt
                                                                    trước)</label>
                                                                <textarea class="form-control border-0" id="owner" name="owner"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card for energy class -->
                                            <div class="card mb-6">
                                                <div class="card-body p-6">
                                                    <h3 class="card-title mb-0 text-heading fs-22 lh-15">Chọn Lớp Năng
                                                        Lượng</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-lg-0">
                                                                <label for="energy-class" class="text-heading">Lớp năng
                                                                    lượng</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Chọn" data-style="btn-lg py-2 h-52"
                                                                    id="energy-class" name="energy-class">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-lg-0">
                                                                <label for="energy-index" class="text-heading">Chỉ số năng
                                                                    lượng tính bằng kWh/m2a</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Chọn" data-style="btn-lg py-2 h-52"
                                                                    id="energy-index" name="energy-index">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="#"
                                                    class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i
                                                            class="fal fa-long-arrow-left"></i></span>Phía trước
                                                </a>
                                                <button class="btn btn-lg btn-primary next-button mb-3">Tiếp theo <span
                                                        class="d-inline-block ml-2 fs-16"><i
                                                            class="fal fa-long-arrow-right"></i></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> --}}

                            {{-- <div class="tab-pane tab-pane-parent fade px-0" id="amenities" role="tabpanel"
                                aria-labelledby="amenities-tab">

                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                        id="heading-amenities">
                                        <h5 class="mb-0">
                                            <button class="btn btn-block collapse-parent collapsed border shadow-none"
                                                data-toggle="collapse" data-number="5." data-target="#amenities-collapse"
                                                aria-expanded="true" aria-controls="amenities-collapse">
                                                <span class="number">5.</span>Tiện nghi
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="amenities-collapse" class="collapse collapsible"
                                        aria-labelledby="heading-amenities" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="card mb-6">
                                                <div class="card-body p-6">
                                                    <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                        Chi tiết niêm yết</h3>
                                                    <p class="card-text mb-5">Lorem ipsum dolor sit amet,
                                                        consectetur
                                                        adipiscing elit</p>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-3">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="attic">
                                                                        <label class="custom-control-label"
                                                                            for="attic">Gác
                                                                            xếp</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="basketball-court">
                                                                        <label class="custom-control-label"
                                                                            for="basketball-court">Sân bóng
                                                                            rổ</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="doorman">
                                                                        <label class="custom-control-label"
                                                                            for="doorman">Người gác
                                                                            cửa</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="front-yard">
                                                                        <label class="custom-control-label"
                                                                            for="front-yard">Sân trước</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="lake-view">
                                                                        <label class="custom-control-label"
                                                                            for="lake-view">Cảnh hồ</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="ocean-view">
                                                                        <label class="custom-control-label"
                                                                            for="ocean-view">Cảnh biển</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="private-space">
                                                                        <label class="custom-control-label"
                                                                            for="private-space">Không gian
                                                                            riêng tư</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="sprinklers">
                                                                        <label class="custom-control-label"
                                                                            for="sprinklers">Máy phun
                                                                            nước</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="wine-cellar">
                                                                        <label class="custom-control-label"
                                                                            for="wine-cellar">Hầm rượu</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-sm-6 col-lg-3">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="attic">
                                                                        <label class="custom-control-label"
                                                                            for="attic">Gác
                                                                            xếp</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="basketball-court">
                                                                        <label class="custom-control-label"
                                                                            for="basketball-court">Sân bóng
                                                                            rổ</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="doorman">
                                                                        <label class="custom-control-label"
                                                                            for="doorman">Người gác
                                                                            cửa</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="front-yard">
                                                                        <label class="custom-control-label"
                                                                            for="front-yard">Sân trước</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="lake-view">
                                                                        <label class="custom-control-label"
                                                                            for="lake-view">Cảnh hồ</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="ocean-view">
                                                                        <label class="custom-control-label"
                                                                            for="ocean-view">Cảnh biển</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="private-space">
                                                                        <label class="custom-control-label"
                                                                            for="private-space">Không gian
                                                                            riêng tư</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="sprinklers">
                                                                        <label class="custom-control-label"
                                                                            for="sprinklers">Máy phun
                                                                            nước</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="wine-cellar">
                                                                        <label class="custom-control-label"
                                                                            for="wine-cellar">Hầm rượu</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-sm-6 col-lg-3">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="attic">
                                                                        <label class="custom-control-label"
                                                                            for="attic">Gác
                                                                            xếp</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="basketball-court">
                                                                        <label class="custom-control-label"
                                                                            for="basketball-court">Sân bóng
                                                                            rổ</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="doorman">
                                                                        <label class="custom-control-label"
                                                                            for="doorman">Người gác
                                                                            cửa</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="front-yard">
                                                                        <label class="custom-control-label"
                                                                            for="front-yard">Sân trước</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="lake-view">
                                                                        <label class="custom-control-label"
                                                                            for="lake-view">Cảnh hồ</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="ocean-view">
                                                                        <label class="custom-control-label"
                                                                            for="ocean-view">Cảnh biển</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="private-space">
                                                                        <label class="custom-control-label"
                                                                            for="private-space">Không gian
                                                                            riêng tư</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="sprinklers">
                                                                        <label class="custom-control-label"
                                                                            for="sprinklers">Máy phun
                                                                            nước</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="wine-cellar">
                                                                        <label class="custom-control-label"
                                                                            for="wine-cellar">Hầm rượu</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-sm-6 col-lg-3">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="attic">
                                                                        <label class="custom-control-label"
                                                                            for="attic">Gác
                                                                            xếp</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="basketball-court">
                                                                        <label class="custom-control-label"
                                                                            for="basketball-court">Sân bóng
                                                                            rổ</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="doorman">
                                                                        <label class="custom-control-label"
                                                                            for="doorman">Người gác
                                                                            cửa</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="front-yard">
                                                                        <label class="custom-control-label"
                                                                            for="front-yard">Sân trước</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="lake-view">
                                                                        <label class="custom-control-label"
                                                                            for="lake-view">Cảnh hồ</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="ocean-view">
                                                                        <label class="custom-control-label"
                                                                            for="ocean-view">Cảnh biển</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="private-space">
                                                                        <label class="custom-control-label"
                                                                            for="private-space">Không gian
                                                                            riêng tư</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="sprinklers">
                                                                        <label class="custom-control-label"
                                                                            for="sprinklers">Máy phun
                                                                            nước</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="features[]"
                                                                            id="wine-cellar">
                                                                        <label class="custom-control-label"
                                                                            for="wine-cellar">Hầm rượu</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="#"
                                                    class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i
                                                            class="fal fa-long-arrow-left"></i></span>Phía
                                                    trước
                                                </a>
                                                <button class="btn btn-lg btn-primary mb-3" type="submit">Gửi
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    </div>
    </div>
    </div>


@endsection
@push('styleOwners')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Add new property - HomeID</title>
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
    <link rel="icon" href="images/favicon.ico">
    {{-- Link Alert --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- Link Map --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
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
@push('scriptOwners')
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
    {{-- Show - Alert --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/alert/room-owners-alert.js') }}"></script>
    {{-- Link Axios  --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/province/api-province.js') }}"></script>
    {{-- Map OpenStreetMap + Laft --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="{{ asset('assets/js/map/map.js') }}"></script>
@endpush
