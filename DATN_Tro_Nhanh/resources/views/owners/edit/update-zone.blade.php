@extends('layouts.owner')
@section('titleOwners', 'Chỉnh Sửa Khu Trọ | TRỌ NHANH')
@section('contentOwners')

    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15">Thêm khu trọ của bạn
                </h2>

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
                            id="location-tab" data-toggle="pill" data-number="2." href="#location" role="tab"
                            aria-controls="location" aria-selected="false"><span class="number">2.</span> Vị trí</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                            id="media-tab" data-toggle="pill" data-number="3. " href="#media" role="tab"
                            aria-controls="media" aria-selected="false"><span class="number">3.</span> Tiện ích</a>
                    </li>

                </ul>
                <div class="tab-content shadow-none p-0">
                    <form action="{{ route('owners.zone-start-update', $zone->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('Put')
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
                                                <span class="number">1.</span> Mô tả
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
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Thông
                                                                tin
                                                                trọ</h3>
                                                            <hr>
                                                            <div class="form-group">
                                                                <label for="title" class="text-heading">Tiêu đề <span
                                                                        class="text-muted">(Bắt buộc)</span></label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="title" name="title"
                                                                    value="{{ old('title', $zone->name) }}">
                                                                @error('title')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <label for="description" class="text-heading">Mô
                                                                    tả <span class="text-muted">(Bắt
                                                                        buộc)</span></label>
                                                                <textarea class="form-control border-0" rows="5" name="description" id="description"> {{ old('description', $zone->description) }}</textarea>
                                                                @error('description')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            {{-- <div class="form-group mt-1">
                                                                    <label for="acreages" class="text-heading">Diện tích
                                                                        m² <span class="text-muted">(Bắt
                                                                            buộc)</span></label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg border-0"
                                                                        id="acreage" name="acreage"
                                                                        value="{{ old('acreage') }}">
                                                                    @error('acreage')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div> --}}

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Cột bên phải -->
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">
                                                                Thông tin liên hệ</h3>
                                                            <hr>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="phone" class="text-heading">Số
                                                                            điện
                                                                            thoại <span class="text-muted">(Bắt
                                                                                buộc)</span></label>
                                                                        <input type="text" name="phone"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="phone"
                                                                            value="{{ old('phone', $zone->phone) }}">
                                                                        @error('phone')
                                                                            <div class="text-danger">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group mt-1">
                                                                <label for="category_id" class="text-heading">Loại
                                                                    phòng</label>
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
                                                                            <option value="{{ $category->id }}"
                                                                                {{ $category->id == $zone->category_id ? 'selected' : '' }}>
                                                                                <!-- Kiểm tra ID loại phòng cũ -->
                                                                                {{ $category->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('category_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <!-- Trường ẩn để lưu ID người dùng -->
                                                            <input type="hidden" id="user_id" name="user_id"
                                                                value="{{ Auth::check() ? Auth::user()->id : '' }}">
                                                            <input type="hidden"
                                                                class="form-control form-control-lg border-0"
                                                                id="name" name="name"
                                                                value="{{ Auth::check() ? Auth::user()->name : 'Chưa có' }}"
                                                                readonly>
                                                            @error('name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <input type="hidden"
                                                                class="form-control form-control-lg border-0"
                                                                id="email" name="email"
                                                                value="{{ Auth::check() ? Auth::user()->email : 'Chưa có' }}">
                                                            @error('email')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right mt-2">
                                                <button class="btn btn-lg btn-primary next-button">Tiếp theo <span
                                                        class="d-inline-block ml-2 fs-16">
                                                        <i class="fal fa-long-arrow-right"></i></span>
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
                                                data-toggle="collapse" data-number="2." data-target="#location-collapse"
                                                aria-expanded="true" aria-controls="location-collapse">
                                                <span class="number">2.</span> Vị trí
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
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Địa
                                                                chỉ
                                                                cho thuê</h3>
                                                            <hr>
                                                            <!-- Tỉnh -->
                                                            <div class="form-group">
                                                                <label for="city-province"
                                                                    class="text-heading">Tỉnh</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="city-province" name="province">
                                                                    <option value='0'>&nbsp;Chọn Tỉnh/Thành Phố...
                                                                    </option>
                                                                    <option value='01'
                                                                        {{ $zone->province == '01' ? 'selected' : '' }}>
                                                                        &nbsp;Thành phố Hà Nội
                                                                    </option>
                                                                    <option value='79'
                                                                        {{ $zone->province == '79' ? 'selected' : '' }}>
                                                                        &nbsp;Thành phố Hồ Chí Minh
                                                                    </option>
                                                                    <option value='31'
                                                                        {{ $zone->province == '31' ? 'selected' : '' }}>
                                                                        &nbsp;Thành phố Hải Phòng
                                                                    </option>
                                                                    <option value='48'
                                                                        {{ $zone->province == '48' ? 'selected' : '' }}>
                                                                        &nbsp;Thành phố Đà Nẵng
                                                                    </option>
                                                                    <option value='92'
                                                                        {{ $zone->province == '92' ? 'selected' : '' }}>
                                                                        &nbsp;Thành phố Cần Thơ
                                                                    </option>
                                                                    <option value='02'
                                                                        {{ $zone->province == '02' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Hà Giang</option>
                                                                    <option value='04'
                                                                        {{ $zone->province == '04' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Cao Bằng</option>
                                                                    <option value='06'
                                                                        {{ $zone->province == '06' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Bắc Kạn</option>
                                                                    <option value='08'
                                                                        {{ $zone->province == '08' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Tuyên Quang
                                                                    </option>
                                                                    <option value='10'
                                                                        {{ $zone->province == '10' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Lào Cai</option>
                                                                    <option value='11'
                                                                        {{ $zone->province == '11' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Điện Biên</option>
                                                                    <option value='12'
                                                                        {{ $zone->province == '12' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Lai Châu</option>
                                                                    <option value='14'
                                                                        {{ $zone->province == '14' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Sơn La</option>
                                                                    <option value='15'
                                                                        {{ $zone->province == '15' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Yên Bái</option>
                                                                    <option value='17'
                                                                        {{ $zone->province == '17' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Hoà Bình</option>
                                                                    <option value='19'
                                                                        {{ $zone->province == '19' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Thái Nguyên
                                                                    </option>
                                                                    <option value='20'
                                                                        {{ $zone->province == '20' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Lạng Sơn</option>
                                                                    <option value='22'
                                                                        {{ $zone->province == '22' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Quảng Ninh
                                                                    </option>
                                                                    <option value='24'
                                                                        {{ $zone->province == '24' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Bắc Giang</option>
                                                                    <option value='25'
                                                                        {{ $zone->province == '25' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Phú Thọ</option>
                                                                    <option value='26'
                                                                        {{ $zone->province == '26' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Vĩnh Phúc</option>
                                                                    <option value='27'
                                                                        {{ $zone->province == '27' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Bắc Ninh</option>
                                                                    <option value='30'
                                                                        {{ $zone->province == '30' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Hải Dương</option>
                                                                    <option value='33'
                                                                        {{ $zone->province == '33' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Hưng Yên</option>
                                                                    <option value='34'
                                                                        {{ $zone->province == '34' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Thái Bình</option>
                                                                    <option value='35'
                                                                        {{ $zone->province == '35' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Hà Nam</option>
                                                                    <option value='36'
                                                                        {{ $zone->province == '36' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Nam Định</option>
                                                                    <option value='37'
                                                                        {{ $zone->province == '37' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Ninh Bình</option>
                                                                    <option value='38'
                                                                        {{ $zone->province == '38' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Thanh Hóa</option>
                                                                    <option value='40'
                                                                        {{ $zone->province == '40' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Nghệ An</option>
                                                                    <option value='42'
                                                                        {{ $zone->province == '42' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Hà Tĩnh</option>
                                                                    <option value='44'
                                                                        {{ $zone->province == '44' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Quảng Bình
                                                                    </option>
                                                                    <option value='45'
                                                                        {{ $zone->province == '45' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Quảng Trị</option>
                                                                    <option value='46'
                                                                        {{ $zone->province == '46' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Thừa Thiên Huế
                                                                    </option>
                                                                    <option value='49'
                                                                        {{ $zone->province == '49' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Quảng Nam</option>
                                                                    <option value='51'
                                                                        {{ $zone->province == '51' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Quảng Ngãi</option>
                                                                    <option value='52'
                                                                        {{ $zone->province == '52' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Bình Định</option>
                                                                    <option value='54'
                                                                        {{ $zone->province == '54' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Phú Yên</option>
                                                                    <option value='56'
                                                                        {{ $zone->province == '56' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Khánh Hòa</option>
                                                                    <option value='58'
                                                                        {{ $zone->province == '58' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Ninh Thuận
                                                                    </option>
                                                                    <option value='60'
                                                                        {{ $zone->province == '60' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Bình Thuận
                                                                    </option>
                                                                    <option value='62'
                                                                        {{ $zone->province == '62' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Kon Tum</option>
                                                                    <option value='64'
                                                                        {{ $zone->province == '64' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Gia Lai</option>
                                                                    <option value='66'
                                                                        {{ $zone->province == '66' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Đắk Lắk</option>
                                                                    <option value='67'
                                                                        {{ $zone->province == '67' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Đắk Nông</option>
                                                                    <option value='68'
                                                                        {{ $zone->province == '68' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Lâm Đồng</option>
                                                                    <option value='70'
                                                                        {{ $zone->province == '70' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Bình Phước
                                                                    </option>
                                                                    <option value='72'
                                                                        {{ $zone->province == '72' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Tây Ninh</option>
                                                                    <option value='74'
                                                                        {{ $zone->province == '74' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Bình Dương</option>
                                                                    <option value='75'
                                                                        {{ $zone->province == '75' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Đồng Nai</option>
                                                                    <option value='77'
                                                                        {{ $zone->province == '77' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Bà Rịa - Vũng Tàu
                                                                    </option>
                                                                    <option value='80'
                                                                        {{ $zone->province == '80' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Long An</option>
                                                                    <option value='82'
                                                                        {{ $zone->province == '82' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Tiền Giang
                                                                    </option>
                                                                    <option value='83'
                                                                        {{ $zone->province == '83' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Bến Tre</option>
                                                                    <option value='84'
                                                                        {{ $zone->province == '84' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Trà Vinh</option>
                                                                    <option value='86'
                                                                        {{ $zone->province == '86' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Vĩnh Long</option>
                                                                    <option value='87'
                                                                        {{ $zone->province == '87' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Đồng Tháp</option>
                                                                    <option value='89'
                                                                        {{ $zone->province == '89' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh An Giang</option>
                                                                    <option value='91'
                                                                        {{ $zone->province == '91' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Kiên Giang
                                                                    </option>
                                                                    <option value='93'
                                                                        {{ $zone->province == '93' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Hậu Giang</option>
                                                                    <option value='94'
                                                                        {{ $zone->province == '94' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Sóc Trăng</option>
                                                                    <option value='95'
                                                                        {{ $zone->province == '95' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Bạc Liêu</option>
                                                                    <option value='96'
                                                                        {{ $zone->province == '96' ? 'selected' : '' }}>
                                                                        &nbsp;Tỉnh Cà Mau</option>
                                                                    <!-- Thêm các tùy chọn khác ở đây -->
                                                                </select>
                                                                @error('province')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            {{-- huyen --}}
                                                            <div class="form-group district-town-select">
                                                                <label for="district-town"
                                                                    class="text-heading">Huyện</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="district-town" name="district">
                                                                    <option value='0'>&nbsp;Chọn Quận/Huyện...
                                                                    </option>
                                                                    <!-- Các tùy chọn khác sẽ được thêm vào qua JavaScript -->
                                                                </select>
                                                                @error('district')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <!-- Xã -->
                                                            <div class="form-group ward-commune-select">
                                                                <label for="ward-commune" class="text-heading">Xã</label>
                                                                <select
                                                                    class="form-control border-0 shadow-none form-control-lg selectpicker"
                                                                    title="Lựa chọn" data-style="btn-lg py-2 h-52"
                                                                    id="ward-commune" name="village">
                                                                    <option value='0'>&nbsp;Chọn Phường/Xã...
                                                                    </option>
                                                                    <!-- Các tùy chọn khác sẽ được thêm vào qua JavaScript -->
                                                                </select>
                                                                @error('village')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address" class="text-heading">Địa chỉ
                                                                    chính
                                                                    xác</label>
                                                                <input type="text"
                                                                    class="form-control form-control-lg border-0"
                                                                    id="address" name="address"
                                                                    value="{{ old('address', $zone->address) }}">
                                                                <!-- Hiển thị địa chỉ cũ -->
                                                                @error('address')
                                                                    <div class="text-danger">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-6 text-heading fs-22 lh-15">Bản đồ
                                                            </h3>
                                                            <div id="map" class="primary-map-inner">
                                                            </div>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="latitude" class="text-heading">Vĩ
                                                                            độ</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="latitude" name="latitude" readonly>
                                                                        @error('latitude')
                                                                            <div class="text-danger">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="longitude" class="text-heading">Kinh
                                                                            độ</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-lg border-0"
                                                                            id="longitude" name="longitude" readonly>
                                                                        @error('longitude')
                                                                            <div class="text-danger">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap mt-2">
                                                <a href="#"
                                                    class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i
                                                            class="fal fa-long-arrow-left"></i></span>Phía trước
                                                </a>
                                                <button class="btn btn-lg btn-primary next-button mb-3 ">Tiếp theo
                                                    <span class="d-inline-block ml-2 fs-16"><i
                                                            class="fal fa-long-arrow-right"></i></span>
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
                                                <span class="number">2.</span> Truyền thông
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="media-collapse" class="collapse collapsible" aria-labelledby="heading-media"
                                        data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="card mb-6">
                                                <div class="card-body p-6">
                                                    <h3 class="card-title mb-0 text-heading fs-22 lh-15">Danh sách tiện
                                                        ích
                                                    </h3>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-3">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="wifi"
                                                                            id="attic" value="attic"
                                                                            {{ $zone->wifi ? 'checked' : '' }}>
                                                                        <!-- Kiểm tra từ CSDL -->
                                                                        <label class="custom-control-label"
                                                                            for="attic">Wifi</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-sm-6 col-lg-3">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="bathrooms"
                                                                            id="attic-01" value="attic-01"
                                                                            {{ $zone->bathrooms ? 'checked' : '' }}>
                                                                        <!-- Kiểm tra từ CSDL -->
                                                                        <label class="custom-control-label"
                                                                            for="attic-01">Phòng tắm</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            @error('bathrooms')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-sm-6 col-lg-3">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="air_conditioning" id="attic-02"
                                                                            value="attic-02"
                                                                            {{ $zone->air_conditioning ? 'checked' : '' }}>
                                                                        <!-- Kiểm tra từ CSDL -->
                                                                        <label class="custom-control-label"
                                                                            for="attic-02">Máy điều hòa</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-sm-6 col-lg-3">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" name="garage"
                                                                            id="attic-03" value="attic-03"
                                                                            {{ $zone->garage ? 'checked' : '' }}>
                                                                        <!-- Kiểm tra từ CSDL -->
                                                                        <label class="custom-control-label"
                                                                            for="attic-03">Ga-ra</label>
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
                                                            class="fal fa-long-arrow-left"></i></span>Phía trước
                                                </a>

                                                <button type="submit" class="btn btn-lg btn-primary  mb-3">Gửi
                                                    <span class="d-inline-block ml-2 fs-16"><i
                                                            class="fal fa-long-arrow-right"></i></span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

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
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
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
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />
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
    <meta property="og:image:height" content="630"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Chỉnh sửa thông tin khu trọ dễ dàng và nhanh chóng trên TRỌ NHANH. Cập nhật thông tin khu trọ của bạn để thu hút nhiều khách thuê hơn.">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">
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
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TroNhanh">
    <meta name="twitter:creator" content="@TroNhanh">
    <meta name="twitter:title" content="Chỉnh Sửa Khu Trọ - TRỌ NHANH">
    <meta name="twitter:description"
        content="Cập nhật và chỉnh sửa thông tin khu trọ của bạn để thu hút khách thuê tiềm năng trên TRỌ NHANH.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Chỉnh Sửa Khu Trọ - TRỌ NHANH">
    <meta property="og:description"
        content="Chỉnh sửa thông tin khu trọ của bạn để tiếp cận nhiều người thuê hơn trên TRỌ NHANH.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
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
    <script>
        window.zoneData = {
            provinceId: '{{ $zone->province }}',
            districtId: '{{ $zone->district }}',
            communeId: '{{ $zone->village }}'
        };
    </script>
    <script>
        function previewImages(input) {
            var preview = document.getElementById('imagePreview');

            if (input.files) {
                [].forEach.call(input.files, function(file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var div = document.createElement("div");
                        div.className = "image-preview mx-auto";

                        var img = document.createElement("img");
                        img.src = e.target.result;
                        img.className = "img-fluid";
                        img.style = "max-width: 100%; height: auto;";

                        div.appendChild(img);
                        preview.insertBefore(div, preview.firstChild);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }
    </script>
    {{-- <script>
    const apiUrl = "https://vietnam-administrative-division-json-server-swart.vercel.app";
    const apiEndpointDistrict = apiUrl + '/district/?idProvince=';
    const apiEndpointCommune = apiUrl + '/commune/?idDistrict=';

    async function getDistrict(idProvince) {
        const { data: districtList } = await axios.get(apiEndpointDistrict + idProvince);
        return districtList;
    }

    async function getCommune(idDistrict) {
        const { data: communeList } = await axios.get(apiEndpointCommune + idDistrict);
        return communeList;
    }

    async function loadZoneData(provinceId, districtId, communeId) {
        try {
            // Get districts based on the selected province
            const { data: districts } = await axios.get(apiEndpointDistrict + provinceId);
            let districtOptions = "<option value='0'>&nbsp;Chọn Quận/Huyện...</option>";

            districts.forEach(district => {
                districtOptions += `<option value='${district.idDistrict}' ${district.idDistrict == districtId ? 'selected' : ''}>${district.name}</option>`;
            });
            document.querySelector('#district-town').innerHTML = districtOptions;
            $('#district-town').selectpicker('refresh'); // Đảm bảo dropdown được làm mới
            $('#district-town').selectpicker('val', districtId); // Chọn giá trị nếu có

            // Get communes based on the selected district
            if (districtId) {
                const { data: communes } = await axios.get(apiEndpointCommune + districtId);
                let communeOptions = "<option value='0'>&nbsp;Chọn Phường/Xã...</option>";

                communes.forEach(commune => {
                    communeOptions += `<option value='${commune.idCommune}' ${commune.idCommune == communeId ? 'selected' : ''}>${commune.name}</option>`;
                });
                document.querySelector('#ward-commune').innerHTML = communeOptions;
                $('#ward-commune').selectpicker('refresh'); // Đảm bảo dropdown được làm mới
                $('#ward-commune').selectpicker('val', communeId); // Chọn giá trị nếu có
            } else {
                // Reset commune dropdown if no district is selected
                document.querySelector('#ward-commune').innerHTML = "<option value='0'>&nbsp;Chọn Phường/Xã...</option>";
                $('#ward-commune').selectpicker('refresh'); // Đảm bảo dropdown được làm mới
            }
        } catch (error) {
            console.error('Error loading zone data:', error);
        }
    }

    document.addEventListener('DOMContentLoaded', async () => {
        // Replace with your actual values from server-side rendering
        const provinceId = '{{ $zone->province }}';
        const districtId = '{{ $zone->district }}';
        const communeId = '{{ $zone->village }}';

        // Load initial data for province, district, and commune
        if (provinceId) {
            await loadZoneData(provinceId, districtId, communeId);
        }
    });

    document.querySelector('#city-province').addEventListener('change', async () => {
        // Get the selected province ID
        const idProvince = document.querySelector('#city-province').value;

        // Clear commune options
        let outputCommune = "<option value='0'>&nbsp;Chọn Phường/Xã...</option>";
        document.querySelector('#ward-commune').innerHTML = outputCommune;
        $('#ward-commune').selectpicker('refresh');

        // Get districts based on the selected province
        const districtList = await getDistrict(idProvince) || [];
        let outputDistrict = "<option value='0'>&nbsp;Chọn Quận/Huyện...</option>";
        districtList.forEach(district => {
            outputDistrict += `<option value='${district.idDistrict}'>${district.name}</option>`;
        });
        document.querySelector('#district-town').innerHTML = outputDistrict;
        $('#district-town').selectpicker('refresh');

        // Reset commune selection
        $('#ward-commune').selectpicker('val', '0');
    });

    document.querySelector('#district-town').addEventListener('change', async () => {
        // Get the selected district ID
        const idDistrict = document.querySelector('#district-town').value;

        // Get communes based on the selected district
        const communeList = await getCommune(idDistrict) || [];
        let outputCommune = "<option value='0'>&nbsp;Chọn Phường/Xã...</option>";
        communeList.forEach(commune => {
            outputCommune += `<option value='${commune.idCommune}'>${commune.name}</option>`;
        });
        document.querySelector('#ward-commune').innerHTML = outputCommune;
        $('#ward-commune').selectpicker('refresh');
    });
</script> --}}


    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-ggmap-nht.js') }}"></script>
    <script src="{{ asset('assets/js/alert/room-owners-alert.js') }}"></script>
    <script src="{{ asset('assets/js/api-update-zone-nht.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        var roomData = @json($zone);
    </script>
    <script src="{{ asset('assets/js/openstreet-map-edit-form.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Đang xử lý...',
                            text: 'Vui lòng đợi trong giây lát!',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close();
                        if (response.success) {
                            Swal.fire({
                                title: 'Thành công!',
                                text: 'Khu trọ đã được cập nhật thành công.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href =
                                        '{{ route('owners.zone-list') }}';
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Lỗi!',
                                text: response.message ||
                                    'Đã xảy ra lỗi khi cập nhật khu trọ.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.close();
                        let errorMessage = 'Đã xảy ra lỗi khi xử lý yêu cầu.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            title: 'Lỗi!',
                            text: errorMessage,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>
@endpush
