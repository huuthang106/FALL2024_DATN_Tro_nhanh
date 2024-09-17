@extends('layouts.admin')
@section('titleAdmin', 'Chỉnh Sửa Phòng Trọ | TRỌ NHANH')
@section('linkAdmin', 'Chỉnh sửa phòng trọ')

@section('contentAdmin')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Sửa phòng</h3>
                        </div>
                    </div>
                    <div id="kt_account_profile_details" class="collapse show">
                        <form class="form" action="{{ route('admin.update-room', ['slug' => $rooms->slug]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body border-top p-9">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Tiêu đề</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" id="title" name="title"
                                                    value="{{ $rooms->title }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('title')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Mô tả</label>
                                            <div class="col-lg-8 fv-row">
                                                <textarea name="description" class="form-control form-control-lg form-control-solid" placeholder="">{{ $rooms->description }}</textarea>
                                                @error('description')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Giá</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="number" name="price" value="{{ $rooms->price }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('price')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">Số điện
                                                thoại</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="tel" name="phone" value="{{ $rooms->phone }}"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    maxlength="13" />
                                                @error('phone')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Số lượng</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="number" name="quantity" value="{{ $rooms->quantity }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('quantity')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-6" style="display: none">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">View</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="hidden" name="view" value="{{ $rooms->view }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('view')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Trạng thái</label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="status" class="form-select form-select-solid form-select-lg">
                                                    <option value="1" {{ $rooms->status == 1 ? 'selected' : '' }}>
                                                        Kích
                                                        hoạt
                                                    </option>
                                                    <option value="0" {{ $rooms->status == 0 ? 'selected' : '' }}>
                                                        Không
                                                        kích
                                                        hoạt</option>
                                                </select>
                                                @error('status')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row mb-6">
                                                <label class="col-lg-4 col-form-label fw-bold fs-6 required">Kinh
                                                    độ</label>
                                                <div class="col-lg-8 fv-row">
                                                    <input type="text" id="longitude" name="longitude"
                                                        value="{{ $rooms->longitude }}"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="" />
                                                    @error('logitude')
                                                        <div class="text-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-6">
                                                <label class="col-lg-4 col-form-label fw-bold fs-6 required">Vĩ độ</label>
                                                <div class="col-lg-8 fv-row">
                                                    <input type="text" id="latitude" name="latitude"
                                                        value="{{ $rooms->latitude }}"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="" />
                                                    @error('latitude')
                                                        <div class="text-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Loại phòng</label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="category_id"
                                                    class="form-select form-select-solid form-select-lg">
                                                    @if ($categories->isEmpty())
                                                        <option value="">Không có dữ liệu
                                                        </option>
                                                    @else
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Diện tích</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="acreage" value="{{ $rooms->acreage }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('acreage')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Vị trí</label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="zone_id"
                                                    class="form-select form-select-solid form-select-lg">
                                                    @foreach ($zones as $zone)
                                                        <option value="{{ $zone->id }}"
                                                            {{ $rooms->zone_id == $zone->id ? 'selected' : '' }}>
                                                            {{ $zone->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Tỉnh</label>
                                            <div class="col-lg-8 fv-row">
                                                <select class="form-select form-select-lg form-select-solid"
                                                    id="city-province" name="province">
                                                    <option value=''>Chọn Tỉnh/Thành Phố...</option>
                                                    <option value='01'
                                                        {{ old('province', $rooms->province) == '01' ? 'selected' : '' }}>
                                                        Thành phố
                                                        Hà Nội</option>
                                                    <option value='79'
                                                        {{ old('province', $rooms->province) == '79' ? 'selected' : '' }}>
                                                        Thành phố
                                                        Hồ Chí Minh</option>
                                                    <option value='31'
                                                        {{ old('province', $rooms->province) == '31' ? 'selected' : '' }}>
                                                        Thành phố
                                                        Hải Phòng</option>
                                                    <option value='48'
                                                        {{ old('province', $rooms->province) == '48' ? 'selected' : '' }}>
                                                        Thành phố
                                                        Đà Nẵng</option>
                                                    <option value='92'
                                                        {{ old('province', $rooms->province) == '92' ? 'selected' : '' }}>
                                                        Thành phố
                                                        Cần Thơ</option>
                                                    <option value='02'
                                                        {{ old('province', $rooms->province) == '02' ? 'selected' : '' }}>
                                                        Tỉnh Hà
                                                        Giang</option>
                                                    <option value='04'
                                                        {{ old('province', $rooms->province) == '04' ? 'selected' : '' }}>
                                                        Tỉnh Cao
                                                        Bằng</option>
                                                    <option value='06'
                                                        {{ old('province', $rooms->province) == '06' ? 'selected' : '' }}>
                                                        Tỉnh Bắc
                                                        Kạn</option>
                                                    <option value='08'
                                                        {{ old('province', $rooms->province) == '08' ? 'selected' : '' }}>
                                                        Tỉnh Tuyên
                                                        Quang</option>
                                                    <option value='10'
                                                        {{ old('province', $rooms->province) == '10' ? 'selected' : '' }}>
                                                        Tỉnh Lào
                                                        Cai</option>
                                                    <option value='11'
                                                        {{ old('province', $rooms->province) == '11' ? 'selected' : '' }}>
                                                        Tỉnh Điện
                                                        Biên</option>
                                                    <option value='12'
                                                        {{ old('province', $rooms->province) == '12' ? 'selected' : '' }}>
                                                        Tỉnh Lai
                                                        Châu</option>
                                                    <option value='14'
                                                        {{ old('province', $rooms->province) == '14' ? 'selected' : '' }}>
                                                        Tỉnh Sơn
                                                        La</option>
                                                    <option value='15'
                                                        {{ old('province', $rooms->province) == '15' ? 'selected' : '' }}>
                                                        Tỉnh Yên
                                                        Bái</option>
                                                    <option value='17'
                                                        {{ old('province', $rooms->province) == '17' ? 'selected' : '' }}>
                                                        Tỉnh Hoà
                                                        Bình</option>
                                                    <option value='19'
                                                        {{ old('province', $rooms->province) == '19' ? 'selected' : '' }}>
                                                        Tỉnh Thái
                                                        Nguyên</option>
                                                    <option value='20'
                                                        {{ old('province', $rooms->province) == '20' ? 'selected' : '' }}>
                                                        Tỉnh Lạng
                                                        Sơn</option>
                                                    <option value='22'
                                                        {{ old('province', $rooms->province) == '22' ? 'selected' : '' }}>
                                                        Tỉnh Quảng
                                                        Ninh</option>
                                                    <option value='24'
                                                        {{ old('province', $rooms->province) == '24' ? 'selected' : '' }}>
                                                        Tỉnh Bắc
                                                        Giang</option>
                                                    <option value='25'
                                                        {{ old('province', $rooms->province) == '25' ? 'selected' : '' }}>
                                                        Tỉnh Phú
                                                        Thọ</option>
                                                    <option value='26'
                                                        {{ old('province', $rooms->province) == '26' ? 'selected' : '' }}>
                                                        Tỉnh Vĩnh
                                                        Phúc</option>
                                                    <option value='27'
                                                        {{ old('province', $rooms->province) == '27' ? 'selected' : '' }}>
                                                        Tỉnh Bắc
                                                        Ninh</option>
                                                    <option value='30'
                                                        {{ old('province', $rooms->province) == '30' ? 'selected' : '' }}>
                                                        Tỉnh Hải
                                                        Dương</option>
                                                    <option value='33'
                                                        {{ old('province', $rooms->province) == '33' ? 'selected' : '' }}>
                                                        Tỉnh Hưng
                                                        Yên</option>
                                                    <option value='34'
                                                        {{ old('province', $rooms->province) == '34' ? 'selected' : '' }}>
                                                        Tỉnh Thái
                                                        Bình</option>
                                                    <option value='35'
                                                        {{ old('province', $rooms->province) == '35' ? 'selected' : '' }}>
                                                        Tỉnh Hà
                                                        Nam</option>
                                                    <option value='36'
                                                        {{ old('province', $rooms->province) == '36' ? 'selected' : '' }}>
                                                        Tỉnh Nam
                                                        Định</option>
                                                    <option value='37'
                                                        {{ old('province', $rooms->province) == '37' ? 'selected' : '' }}>
                                                        Tỉnh Ninh
                                                        Bình</option>
                                                    <option value='38'
                                                        {{ old('province', $rooms->province) == '38' ? 'selected' : '' }}>
                                                        Tỉnh Thanh
                                                        Hóa</option>
                                                    <option value='40'
                                                        {{ old('province', $rooms->province) == '40' ? 'selected' : '' }}>
                                                        Tỉnh Nghệ
                                                        An</option>
                                                    <option value='42'
                                                        {{ old('province', $rooms->province) == '42' ? 'selected' : '' }}>
                                                        Tỉnh Hà
                                                        Tĩnh</option>
                                                    <option value='44'
                                                        {{ old('province', $rooms->province) == '44' ? 'selected' : '' }}>
                                                        Tỉnh Quảng
                                                        Bình</option>
                                                    <option value='45'
                                                        {{ old('province', $rooms->province) == '45' ? 'selected' : '' }}>
                                                        Tỉnh Quảng
                                                        Trị</option>
                                                    <option value='46'
                                                        {{ old('province', $rooms->province) == '46' ? 'selected' : '' }}>
                                                        Tỉnh Thừa
                                                        Thiên Huế</option>
                                                    <option value='49'
                                                        {{ old('province', $rooms->province) == '49' ? 'selected' : '' }}>
                                                        Tỉnh Quảng
                                                        Nam</option>
                                                    <option value='51'
                                                        {{ old('province', $rooms->province) == '51' ? 'selected' : '' }}>
                                                        Tỉnh Quảng
                                                        Ngãi</option>
                                                    <option value='52'
                                                        {{ old('province', $rooms->province) == '52' ? 'selected' : '' }}>
                                                        Tỉnh Bình
                                                        Định</option>
                                                    <option value='54'
                                                        {{ old('province', $rooms->province) == '54' ? 'selected' : '' }}>
                                                        Tỉnh Phú
                                                        Yên</option>
                                                    <option value='56'
                                                        {{ old('province', $rooms->province) == '56' ? 'selected' : '' }}>
                                                        Tỉnh Khánh
                                                        Hòa</option>
                                                    <option value='58'
                                                        {{ old('province', $rooms->province) == '58' ? 'selected' : '' }}>
                                                        Tỉnh Ninh
                                                        Thuận</option>
                                                    <option value='60'
                                                        {{ old('province', $rooms->province) == '60' ? 'selected' : '' }}>
                                                        Tỉnh Bình
                                                        Thuận</option>
                                                    <option value='62'
                                                        {{ old('province', $rooms->province) == '62' ? 'selected' : '' }}>
                                                        Tỉnh Kon
                                                        Tum</option>
                                                    <option value='64'
                                                        {{ old('province', $rooms->province) == '64' ? 'selected' : '' }}>
                                                        Tỉnh Gia
                                                        Lai</option>
                                                    <option value='66'
                                                        {{ old('province', $rooms->province) == '66' ? 'selected' : '' }}>
                                                        Tỉnh Đắk
                                                        Lắk</option>
                                                    <option value='67'
                                                        {{ old('province', $rooms->province) == '67' ? 'selected' : '' }}>
                                                        Tỉnh Đắk
                                                        Nông</option>
                                                    <option value='68'
                                                        {{ old('province', $rooms->province) == '68' ? 'selected' : '' }}>
                                                        Tỉnh Lâm
                                                        Đồng</option>
                                                    <option value='70'
                                                        {{ old('province', $rooms->province) == '70' ? 'selected' : '' }}>
                                                        Tỉnh Bình
                                                        Phước</option>
                                                    <option value='72'
                                                        {{ old('province', $rooms->province) == '72' ? 'selected' : '' }}>
                                                        Tỉnh Tây
                                                        Ninh</option>
                                                    <option value='74'
                                                        {{ old('province', $rooms->province) == '74' ? 'selected' : '' }}>
                                                        Tỉnh Bình
                                                        Dương</option>
                                                    <option value='75'
                                                        {{ old('province', $rooms->province) == '75' ? 'selected' : '' }}>
                                                        Tỉnh Đồng
                                                        Nai</option>
                                                    <option value='77'
                                                        {{ old('province', $rooms->province) == '77' ? 'selected' : '' }}>
                                                        Tỉnh Bà
                                                        Rịa - Vũng Tàu</option>
                                                    <option value='80'
                                                        {{ old('province', $rooms->province) == '80' ? 'selected' : '' }}>
                                                        Tỉnh Long
                                                        An</option>
                                                    <option value='82'
                                                        {{ old('province', $rooms->province) == '82' ? 'selected' : '' }}>
                                                        Tỉnh Tiền
                                                        Giang</option>
                                                    <option value='83'
                                                        {{ old('province', $rooms->province) == '83' ? 'selected' : '' }}>
                                                        Tỉnh Bến
                                                        Tre</option>
                                                    <option value='84'
                                                        {{ old('province', $rooms->province) == '84' ? 'selected' : '' }}>
                                                        Tỉnh Trà
                                                        Vinh</option>
                                                    <option value='86'
                                                        {{ old('province', $rooms->province) == '86' ? 'selected' : '' }}>
                                                        Tỉnh Vĩnh
                                                        Long</option>
                                                    <option value='87'
                                                        {{ old('province', $rooms->province) == '87' ? 'selected' : '' }}>
                                                        Tỉnh Đồng
                                                        Tháp</option>
                                                    <option value='89'
                                                        {{ old('province', $rooms->province) == '89' ? 'selected' : '' }}>
                                                        Tỉnh An
                                                        Giang</option>
                                                    <option value='91'
                                                        {{ old('province', $rooms->province) == '91' ? 'selected' : '' }}>
                                                        Tỉnh Kiên
                                                        Giang</option>
                                                    <option value='93'
                                                        {{ old('province', $rooms->province) == '93' ? 'selected' : '' }}>
                                                        Tỉnh Hậu
                                                        Giang</option>
                                                    <option value='94'
                                                        {{ old('province', $rooms->province) == '94' ? 'selected' : '' }}>
                                                        Tỉnh Sóc
                                                        Trăng</option>
                                                    <option value='95'
                                                        {{ old('province', $rooms->province) == '95' ? 'selected' : '' }}>
                                                        Tỉnh Bạc
                                                        Liêu</option>
                                                    <option value='96'
                                                        {{ old('province', $rooms->province) == '96' ? 'selected' : '' }}>
                                                        Tỉnh Cà
                                                        Mau</option>
                                                </select>
                                                @error('province')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Huyện</label>
                                            <div class="col-lg-8 fv-row">
                                                <select class="selectpicker form-select form-select-solid form-select-lg"
                                                    id="district-town" name="district">
                                                </select>
                                                @error('district')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Xã</label>
                                            <div class="col-lg-8 fv-row">
                                                <select class="selectpicker form-select form-select-solid form-select-lg"
                                                    id="ward-commune" name="village">
                                                </select>
                                                @error('village')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Địa chỉ</label>
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="address" value="{{ $rooms->address }}"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="" />
                                                @error('address')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Hình ảnh</label>
                                            <div class="col-lg-8 fv-row">
                                                @if ($rooms->images->isNotEmpty())
                                                    @foreach ($rooms->images as $image)
                                                        <img src="{{ asset('assets/images/' . $image->filename) }}"
                                                            class="img-s" alt="{{ $rooms->title }}">
                                                    @endforeach
                                                @else
                                                    <p>Phòng không có ảnh.</p>
                                                @endif
                                                @error('images')
                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                @enderror
                                                @foreach ($errors->get('images.*') as $error)
                                                    <div class="text-danger mt-3">{{ $error[0] }}</div>
                                                @endforeach
                                                <div id="image-input-container" class="mt-5">
                                                    <input type="file" name="images[]"
                                                        class="form-control form-control-lg form-control-solid mb-3"
                                                        placeholder="" />
                                                </div>
                                                <button type="button" id="add-image-input"
                                                    class="btn btn-primary float-end">
                                                    Thêm ảnh
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <!-- Bản đồ -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold fs-6">Các tiện ích</label>
                                            <div class="row mt-2">
                                                {{-- <div class="col-sm-6 col-lg-3">
                                                    <div class="form-check custom-bathroom">
                                                        <input class="bathroom-input" type="number" id="bathroomInput"
                                                            value="{{ isset($utilities) ? $utilities->bathrooms : 0 }}"
                                                            min="0" step="1" name="bathrooms">
                                                        <label class="bathroom-label" for="bathroomInput">
                                                            Phòng tắm
                                                        </label>
                                                        @error('bathrooms')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                                <div class="col-sm-6 col-lg-3">
                                                    <div class="form-check custom-checkbox">
                                                        <input type="checkbox" class="form-check-input" name="bathrooms"
                                                            id="attic-01"
                                                            {{ isset($utilities) && $utilities->bathrooms == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="bathrooms">Phòng
                                                            tắm</label>
                                                    </div>
                                                    @error('bathrooms')
                                                        <div class="text-danger">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 col-lg-3">
                                                    <div class="form-check custom-checkbox">
                                                        <input class="form-check-input" type="checkbox" id="attic"
                                                            name="wifi"
                                                            {{ isset($utilities) && $utilities->wifi == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Wifi
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-3">
                                                    <div class="form-check custom-checkbox">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="air_conditioning" id="attic-02"
                                                            {{ isset($utilities) && $utilities->air_conditioning == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Máy điều hòa
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-3">
                                                    <div class="form-check custom-checkbox">
                                                        <input class="form-check-input" type="checkbox"id="attic-03"
                                                            name="garage"
                                                            {{ isset($utilities) && $utilities->garage == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Ga-ra
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold fs-6">Bản đồ</label>
                                            <div id="map" style="height: 400px;"></div>
                                            @error('map')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Hủy</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    <!--begin::Footer-->

    <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->

    <!--end::Activities drawer-->
    <!--begin::Chat drawer-->

    <!--end::Chat drawer-->
    <!--begin::Exolore drawer toggle-->

    <!--end::Exolore drawer toggle-->
    <!--begin::Exolore drawer-->

    <!--end::Exolore drawer-->
    <!--end::Drawers-->
    <!--begin::Modals-->
    <!--begin::Modal - Invite Friends-->

    <!--end::Modal - Invite Friend-->
    <!--begin::Modal - Create App-->

    <!--end::Modal - Create App-->
    <!--begin::Modal - Upgrade plan-->

    <!--end::Modal - Upgrade plan-->
    <!--end::Modals-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->



@endsection
@push('styleAdmin')
    <base href="{{ asset('..') }}">
    {{-- <title>Chỉnh Sửa Phòng Trọ | TRỌ NHANH</title> --}}
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    {{-- <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" /> --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/tro-moi.png') }}" />
    {{-- hien thi thong bao --}}
    <meta name="success" content="{{ session('success') }}">
    <meta name="error" content="{{ session('error') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/toastr-notification.js') }}"></script>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link rel="stylesheet" href="{{ asset('assets/css/toan.css') }}">
    <link href="{{ asset('assets/css/style-ntt.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
@endpush

@push('scriptsAdmin')
    <script>
        var hostUrl = "{{ asset('assets/') }}";
    </script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/two-factor-authentication.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/image-ntt.js') }}"></script>


    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/api-ggmap-nht.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/api-country-vn-nht.js') }}"></script> --}}
    <script src="{{ asset('assets/js/api-ntt.js') }}"></script>
    <script>
        window.roomData = {
            provinceId: '{{ $rooms->province }}',
            districtId: '{{ $rooms->district }}',
            communeId: '{{ $rooms->village }}'
        };
    </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        var map;
        // Lấy kinh độ và vĩ độ từ dữ liệu PHP
        var currentPosition = [
            parseFloat('{{ $rooms->latitude }}') || 10.0354, // Vĩ độ, mặc định là 10.0354
            parseFloat('{{ $rooms->longitude }}') || 105.7553 // Kinh độ, mặc định là 105.7553
        ];
        var marker; // Biến để lưu trữ marker

        function initMap() {
            // Khởi tạo bản đồ với vị trí từ dữ liệu PHP
            map = L.map('map').setView(currentPosition, 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Tạo marker và cho phép kéo thả
            marker = L.marker(currentPosition, {
                draggable: true
            }).addTo(map);

            // Cập nhật giá trị vào các trường input ngay khi khởi tạo
            document.getElementById('latitude').value = currentPosition[0]; // Cập nhật vĩ độ
            document.getElementById('longitude').value = currentPosition[1]; // Cập nhật kinh độ

            // Lắng nghe sự kiện khi marker được kéo thả
            marker.on('dragend', function(event) {
                var position = marker.getLatLng(); // Lấy vị trí mới
                console.log("Kinh độ: " + position.lng + ", Vĩ độ: " + position.lat); // In ra kinh độ và vĩ độ

                // Cập nhật giá trị vào các trường input
                document.getElementById('latitude').value = position.lat; // Cập nhật vĩ độ
                document.getElementById('longitude').value = position.lng; // Cập nhật kinh độ
            });

            // Thêm nút quay lại vị trí hiện tại
            var returnButton = L.control({
                position: 'topright'
            });
            returnButton.onAdd = function() {
                var button = L.DomUtil.create('button', 'return-button');
                button.innerHTML = '<i class="fas fa-location-arrow"></i>'; // Sử dụng biểu tượng Font Awesome
                button.style.backgroundColor = 'white'; // Tùy chỉnh màu nền
                button.style.border = 'none'; // Bỏ viền
                button.style.borderRadius = '50%'; // Bo góc để tạo hình tròn
                button.style.width = '40px'; // Đặt chiều rộng
                button.style.height = '40px'; // Đặt chiều cao
                button.style.display = 'flex'; // Sử dụng flexbox để căn giữa
                button.style.alignItems = 'center'; // Căn giữa theo chiều dọc
                button.style.justifyContent = 'center'; // Căn giữa theo chiều ngang
                button.onclick = function(e) {
                    e.preventDefault(); // Ngăn chặn hành động mặc định
                    map.setView(currentPosition, 13); // Quay lại vị trí hiện tại
                    marker.setLatLng(currentPosition); // Đặt lại vị trí của marker
                };
                return button;
            };
            returnButton.addTo(map);

            // Cập nhật kích thước bản đồ ngay sau khi khởi tạo
            updateMapSize();
        }

        function updateMapSize() {
            if (map) {
                map.invalidateSize(); // Cập nhật kích thước của bản đồ
            }
        }

        // Hàm để tìm kiếm tọa độ từ tên tỉnh, huyện hoặc xã
        function geocodeLocation(location) {
            var apiUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(location)}`;

            return fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        return {
                            lat: data[0].lat,
                            lng: data[0].lon
                        };
                    } else {
                        throw new Error('Không tìm thấy vị trí.');
                    }
                });
        }

        // Lắng nghe sự kiện thay đổi cho dropdown tỉnh
        document.getElementById('city-province').addEventListener('change', function() {
            var selectedProvince = this.options[this.selectedIndex].text; // Lấy tên tỉnh
            geocodeLocation(selectedProvince)
                .then(coords => {
                    map.setView([coords.lat, coords.lng], 13); // Di chuyển bản đồ đến tỉnh đã chọn
                    marker.setLatLng([coords.lat, coords.lng]); // Đặt lại vị trí của marker
                    document.getElementById('latitude').value = coords.lat; // Cập nhật vĩ độ
                    document.getElementById('longitude').value = coords.lng; // Cập nhật kinh độ
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Không thể tìm thấy vị trí cho tỉnh đã chọn.');
                });
        });

        // Lắng nghe sự kiện thay đổi cho dropdown huyện
        document.getElementById('district-town').addEventListener('change', function() {
            var selectedDistrict = this.options[this.selectedIndex].text; // Lấy tên huyện
            geocodeLocation(selectedDistrict)
                .then(coords => {
                    map.setView([coords.lat, coords.lng], 13); // Di chuyển bản đồ đến huyện đã chọn
                    marker.setLatLng([coords.lat, coords.lng]); // Đặt lại vị trí của marker
                    document.getElementById('latitude').value = coords.lat; // Cập nhật vĩ độ
                    document.getElementById('longitude').value = coords.lng; // Cập nhật kinh độ
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Không thể tìm thấy vị trí cho huyện đã chọn.');
                });
        });

        // Lắng nghe sự kiện thay đổi cho dropdown xã
        document.getElementById('ward-commune').addEventListener('change', function() {
            var selectedWard = this.options[this.selectedIndex].text; // Lấy tên xã
            geocodeLocation(selectedWard)
                .then(coords => {
                    map.setView([coords.lat, coords.lng], 13); // Di chuyển bản đồ đến xã đã chọn
                    marker.setLatLng([coords.lat, coords.lng]); // Đặt lại vị trí của marker
                    document.getElementById('latitude').value = coords.lat; // Cập nhật vĩ độ
                    document.getElementById('longitude').value = coords.lng; // Cập nhật kinh độ
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Không thể tìm thấy vị trí cho xã đã chọn.');
                });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Khởi tạo bản đồ
            initMap();

            // Kiểm tra xem có thông báo thành công trong session không
            if (window.successMessage) {
                showSuccessMessage(window.successMessage); // Gọi hàm để hiển thị thông báo
            }
        });

        // Hàm hiển thị thông báo thành công
        function showSuccessMessage(message) {
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: message,
                showConfirmButton: true
            });
        }

        // Hàm hiển thị thông báo lỗi
        function showErrorMessage(message) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: message,
                showConfirmButton: true
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Khi tab location-tab được kích hoạt, cập nhật kích thước bản đồ
            var locationTab = document.querySelector('#location-tab');
            if (locationTab) {
                locationTab.addEventListener('click', function(e) {
                    setTimeout(updateMapSize, 100); // Cập nhật kích thước bản đồ khi tab được nhấn
                });
            }
            // Gọi updateMapSize() ngay sau khi khởi tạo bản đồ
            updateMapSize(); // Đảm bảo bản đồ hiển thị đúng ngay khi tải trang
        });
    </script>
@endpush
