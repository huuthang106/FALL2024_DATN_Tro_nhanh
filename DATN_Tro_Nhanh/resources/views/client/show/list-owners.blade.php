@extends('layouts.main')
@section('titleUs', 'Danh Sách Người Đăng Tin | TRỌ NHANH')
@section('contentUs')
    <main id="content">
        <section class="position-relative pb-15 pt-2 page-title bg-patten bg-secondary">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-light mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Người đăng tin</li>
                    </ol>
                </nav>
                <h1 class="fs-32 mb-0 text-white font-weight-600 text-center pt-11 mb-5 lh-17 mxw-478"
                    data-animate="fadeInDown">Gặp Gỡ Những Người Đăng Tin Trọ Đang Thay Đổi Thị Trường Cho Thuê Phòng Trọ
                </h1>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="mt-n8 bg-white px-6 py-3 shadow-sm-2 rounded-lg form-search-02 position-relative z-index-3">
                    <form action="{{ route('client.client-agent') }}" method="GET"
                        class="d-none row d-md-flex flex-wrap align-items-center">
                        <div class="col-md-5 mb-3 mb-md-0">
                            <div class="row">
                                <div class="form-group mb-3 mb-md-0 col-md-4">
                                    <label for="province" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Khu
                                        vực</label>
                                    <select class="form-control form-control-sm font-weight-600  shadow-0 bg-white "
                                        id="city-province" name="province" data-style="bg-white pl-0 text-dark rounded-0">
                                        <option value='0'>&nbsp;Chọn Tỉnh/Thành Phố...
                                        </option>
                                        @foreach ([
            '01' => 'Thành phố Hà Nội',
            '79' => 'Thành phố Hồ Chí Minh',
            '31' => 'Thành phố Hải Phòng',
            '48' => 'Thành phố Đà Nẵng',
            '92' => 'Thành phố Cần Thơ',
            '02' => 'Tỉnh Hà Giang',
            '04' => 'Tỉnh Cao Bằng',
            '06' => 'Tỉnh Bắc Kạn',
            '08' => 'Tỉnh Tuyên Quang',
            '10' => 'Tỉnh Lào Cai',
            '11' => 'Tỉnh Điện Biên',
            '12' => 'Tỉnh Lai Châu',
            '14' => 'Tỉnh Sơn La',
            '15' => 'Tỉnh Yên Bái',
            '17' => 'Tỉnh Hoà Bình',
            '19' => 'Tỉnh Thái Nguyên',
            '20' => 'Tỉnh Lạng Sơn',
            '22' => 'Tỉnh Quảng Ninh',
            '24' => 'Tỉnh Bắc Giang',
            '25' => 'Tỉnh Phú Thọ',
            '26' => 'Tỉnh Vĩnh Phúc',
            '27' => 'Tỉnh Bắc Ninh',
            '30' => 'Tỉnh Hải Dương',
            '33' => 'Tỉnh Hưng Yên',
            '34' => 'Tỉnh Thái Bình',
            '35' => 'Tỉnh Hà Nam',
            '36' => 'Tỉnh Nam Định',
            '37' => 'Tỉnh Ninh Bình',
            '38' => 'Tỉnh Thanh Hóa',
            '40' => 'Tỉnh Nghệ An',
            '42' => 'Tỉnh Hà Tĩnh',
            '44' => 'Tỉnh Quảng Bình',
            '45' => 'Tỉnh Quảng Trị',
            '46' => 'Tỉnh Thừa Thiên Huế',
            '49' => 'Tỉnh Quảng Nam',
            '51' => 'Tỉnh Quảng Ngãi',
            '52' => 'Tỉnh Bình Định',
            '54' => 'Tỉnh Phú Yên',
            '56' => 'Tỉnh Khánh Hòa',
            '58' => 'Tỉnh Ninh Thuận',
            '60' => 'Tỉnh Bình Thuận',
            '62' => 'Tỉnh Kon Tum',
            '64' => 'Tỉnh Gia Lai',
            '66' => 'Tỉnh Đắk Lắk',
            '67' => 'Tỉnh Đắk Nông',
            '68' => 'Tỉnh Lâm Đồng',
            '70' => 'Tỉnh Bình Phước',
            '72' => 'Tỉnh Tây Ninh',
            '74' => 'Tỉnh Bình Dương',
            '75' => 'Tỉnh Đồng Nai',
            '77' => 'Tỉnh Bà Rịa - Vũng Tàu',
            '80' => 'Tỉnh Long An',
            '82' => 'Tỉnh Tiền Giang',
            '83' => 'Tỉnh Bến Tre',
            '84' => 'Tỉnh Trà Vinh',
            '86' => 'Tỉnh Vĩnh Long',
            '87' => 'Tỉnh Đồng Tháp',
            '89' => 'Tỉnh An Giang',
            '91' => 'Tỉnh Kiên Giang',
            '93' => 'Tỉnh Hậu Giang',
            '94' => 'Tỉnh Sóc Trăng',
            '95' => 'Tỉnh Bạc Liêu',
            '96' => 'Tỉnh Cà Mau',
        ] as $code => $name)
                                            @if (in_array($code, $provinces))
                                                <option value='{{ $code }}'
                                                    {{ $province == $code ? 'selected' : '' }}>{{ $name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3 mb-md-0 col-md-4">
                                    <label for="district"
                                        class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Quận/Huyện</label>
                                    <select class="form-control font-weight-600 pl-0 bg-white form-control-sm "
                                        id="district-town" name="district" data-style="bg-white pl-0 text-dark rounded-0"
                                        id="location">
                                        <option value='0'>&nbsp;Chọn Quận/Huyện...
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 mb-md-0 col-md-4">
                                    <label for="ward-commune"
                                        class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Xã</label>
                                    <select class="form-control font-weight-600 pl-0 bg-white form-control-sm "
                                        id="ward-commune" name="village" data-style="bg-white pl-0 text-dark rounded-0"
                                        id="location">
                                        <option value='0'>&nbsp;Chọn Xã...
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- <livewire:search-users /> --}}
                        <div class="form-group mb-3 mb-lg-0 col-md-5">
                            <label for="search" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Tìm
                                kiếm</label>
                            <div class="input-group input-group-sm">
                                <input type="text" id="search" class="form-control pl-0 rounded-0 bg-white"
                                    placeholder="Tìm kiếm theo tên người đăng tin…" name="search">
                                {{-- <div class="input-group-append ml-0">
                                    <span class="fs-18 input-group-text bg-white rounded-0"><i
                                            class="fal fa-search"></i></span>
                                </div> --}}
                            </div>

                        </div>


                        <div class="col-md-2 pl-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Tìm kiếm
                            </button>
                        </div>
                    </form>
                    <form class="d-block d-md-none">
                        <div class="d-flex align-items-center">
                            <a class="text-body hover-primary d-inline-block fs-24 lh-1 mr-5" data-toggle="collapse"
                                href="#collapseMobileSearch" role="button" aria-expanded="false"
                                aria-controls="collapseMobileSearch">
                                <i class="fal fa-cog"></i>
                            </a>
                            <div class="input-group">
                                <input type="text" class="form-control pl-0 rounded-0 bg-white"
                                    placeholder="Tìm kiếm theo tên người đăng tin…" name="search">
                                {{-- <div class="input-group-append ml-0">
                                    <span class="fs-18 input-group-text bg-white rounded-0"><i
                                            class="fal fa-search"></i></span>
                                </div> --}}
                                <div class="input-group-append ml-0">
                                    <button class="fs-18 input-group-text bg-white rounded-0" type="submit">
                                        <i class="fal fa-search"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="collapse" id="collapseMobileSearch">
                            <div class="card card-body border-0 px-0">
                                <div class="form-group mb-3">
                                    <label for="language-01" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Khu
                                        vực</label>
                                    <select
                                        class="form-control form-control-sm font-weight-600  shadow-0 bg-white selectpicker"
                                        name="province" id="city-province" name="province"
                                        data-style="bg-white pl-0 text-dark rounded-0">
                                        <option value='0'>&nbsp;Chọn Tỉnh/Thành Phố...
                                        </option>
                                        <option value='01'>&nbspThành phố Hà Nội</option>
                                        <option value='79'>&nbspThành phố Hồ Chí Minh
                                        </option>
                                        <option value='31'>&nbspThành phố Hải Phòng
                                        </option>
                                        <option value='48'>&nbspThành phố Đà Nẵng</option>
                                        <option value='92'>&nbspThành phố Cần Thơ</option>
                                        <option value='02'>&nbspTỉnh Hà Giang</option>
                                        <option value='04'>&nbspTỉnh Cao Bằng</option>
                                        <option value='06'>&nbspTỉnh Bắc Kạn</option>
                                        <option value='08'>&nbspTỉnh Tuyên Quang</option>
                                        <option value='10'>&nbspTỉnh Lào Cai</option>
                                        <option value='11'>&nbspTỉnh Điện Biên</option>
                                        <option value='12'>&nbspTỉnh Lai Châu</option>
                                        <option value='14'>&nbspTỉnh Sơn La</option>
                                        <option value='15'>&nbspTỉnh Yên Bái</option>
                                        <option value='17'>&nbspTỉnh Hoà Bình</option>
                                        <option value='19'>&nbspTỉnh Thái Nguyên</option>
                                        <option value='20'>&nbspTỉnh Lạng Sơn</option>
                                        <option value='22'>&nbspTỉnh Quảng Ninh</option>
                                        <option value='24'>&nbspTỉnh Bắc Giang</option>
                                        <option value='25'>&nbspTỉnh Phú Thọ</option>
                                        <option value='26'>&nbspTỉnh Vĩnh Phúc</option>
                                        <option value='27'>&nbspTỉnh Bắc Ninh</option>
                                        <option value='30'>&nbspTỉnh Hải Dương</option>
                                        <option value='33'>&nbspTỉnh Hưng Yên</option>
                                        <option value='34'>&nbspTỉnh Thái Bình</option>
                                        <option value='35'>&nbspTỉnh Hà Nam</option>
                                        <option value='36'>&nbspTỉnh Nam Định</option>
                                        <option value='37'>&nbspTỉnh Ninh Bình</option>
                                        <option value='38'>&nbspTỉnh Thanh Hóa</option>
                                        <option value='40'>&nbspTỉnh Nghệ An</option>
                                        <option value='42'>&nbspTỉnh Hà Tĩnh</option>
                                        <option value='44'>&nbspTỉnh Quảng Bình</option>
                                        <option value='45'>&nbspTỉnh Quảng Trị</option>
                                        <option value='46'>&nbspTỉnh Thừa Thiên Huế
                                        </option>
                                        <option value='49'>&nbspTỉnh Quảng Nam</option>
                                        <option value='51'>&nbspTỉnh Quảng Ngãi</option>
                                        <option value='52'>&nbspTỉnh Bình Định</option>
                                        <option value='54'>&nbspTỉnh Phú Yên</option>
                                        <option value='56'>&nbspTỉnh Khánh Hòa</option>
                                        <option value='58'>&nbspTỉnh Ninh Thuận</option>
                                        <option value='60'>&nbspTỉnh Bình Thuận</option>
                                        <option value='62'>&nbspTỉnh Kon Tum</option>
                                        <option value='64'>&nbspTỉnh Gia Lai</option>
                                        <option value='66'>&nbspTỉnh Đắk Lắk</option>
                                        <option value='67'>&nbspTỉnh Đắk Nông</option>
                                        <option value='68'>&nbspTỉnh Lâm Đồng</option>
                                        <option value='70'>&nbspTỉnh Bình Phước</option>
                                        <option value='72'>&nbspTỉnh Tây Ninh</option>
                                        <option value='74'>&nbspTỉnh Bình Dương</option>
                                        <option value='75'>&nbspTỉnh Đồng Nai</option>
                                        <option value='77'>&nbspTỉnh Bà Rịa - Vũng Tàu
                                        </option>
                                        <option value='80'>&nbspTỉnh Long An</option>
                                        <option value='82'>&nbspTỉnh Tiền Giang</option>
                                        <option value='83'>&nbspTỉnh Bến Tre</option>
                                        <option value='84'>&nbspTỉnh Trà Vinh</option>
                                        <option value='86'>&nbspTỉnh Vĩnh Long</option>
                                        <option value='87'>&nbspTỉnh Đồng Tháp</option>
                                        <option value='89'>&nbspTỉnh An Giang</option>
                                        <option value='91'>&nbspTỉnh Kiên Giang</option>
                                        <option value='93'>&nbspTỉnh Hậu Giang</option>
                                        <option value='94'>&nbspTỉnh Sóc Trăng</option>
                                        <option value='95'>&nbspTỉnh Bạc Liêu</option>
                                        <option value='96'>&nbspTỉnh Cà Mau</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="region-01"
                                        class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Quận/Huyện</label>
                                    <select class="form-control font-weight-600 pl-0 bg-white selectpicker form-control-sm"
                                        name="district" id="district-town"
                                        data-style="bg-white pl-0 text-dark rounded-0">
                                        <option value='0'>&nbsp;Chọn Quận/Huyện...
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="region-01"
                                        class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Xã</label>
                                    <select class="form-control font-weight-600 pl-0 bg-white selectpicker form-control-sm"
                                        name="village" id="ward-commune" data-style="bg-white pl-0 text-dark rounded-0">
                                        <option value='0'>&nbsp;Chọn Xã...
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="pt-12 pb-14">
            <div class="container">
                <div class="row align-items-sm-center mb-8">
                    <div class="col-sm-6 mb-6 mb-sm-0">
                        <span class="text-primary">{{ $users->total() }}</span> người đăng tin trọ cho bạn

                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="input-group border rounded input-group-lg w-auto mr-3">
                                <label
                                    class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3"
                                    for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>SẮP XẾP:</label>
                                <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker"
                                    data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0"
                                    id="inputGroupSelect01" name="sortby">
                                    <option selected>Tùy chọn</option>
                                    <option value="1">Ngẫu nhiên</option>
                                    <option value="1">Đánh giá</option>
                                    <option value="1">Số lượng phòng trọ</option>
                                </select>
                            </div>
                            {{-- <div class="d-none d-md-block list-layout">
                                <a class="fs-sm-18 text-muted" href="agents-list.html">
                                    <i class="fas fa-list"></i>
                                </a>
                                <span class="fs-sm-18 text-muted ml-5 active">
                                    <i class="fa fa-th-large"></i>
                                </span>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($users as $item)
                        <div class="col-sm-6 col-lg-3 mb-6">
                            <div class="card border-0 hover-change-image">
                                <div class="position-relative card-img-top">
                                    <a href="#">
                                        @if ($item->image)
                                            <img src="{{ asset('assets/images/' . $item->image) }}"
                                                alt="{{ $item->name }}" class="fixed-image">
                                        @else
                                            <img src="{{ asset('assets/images/agent-25.jpg') }}" alt="{{ $item->name }}"
                                                class="fixed-image">
                                        @endif
                                    </a>


                                    <div
                                        class="card-img-overlay bg-dark-opacity-06 hover-image d-flex flex-column rounded-lg p-4">
                                        <div class="mt-auto">
                                            <a href="tel:{{ $item->phone }}" class="text-white">
                                                <span class="text-primary"><i class="fal fa-phone"></i></span>
                                                <span class="d-inline-block ml-2">{{ $item->phone }}</span>
                                            </a>
                                            <a href="mailto:{{ $item->email }}"
                                                class="d-block text-center text-white">{{ $item->email }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-2 px-0">
                                    <a href="{{ route('client.client-agent-detail', ['slug' => $item->slug]) }}"
                                        class="card-title d-block fs-16 lh-214 text-dark font-weight-500 hover-primary mb-0">
                                        {{ $item->name }}
                                    </a>



                                    <p class="mb-3 card-text">Người đăng tin từ <a href="#"
                                            class="text-body"><u>Trọ Nhanh</u></a></p>
                                    <ul class="list-inline text-gray-lighter m-0">
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-32px h-32 rounded-lg bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            @if ($item->facebook_url)
                                                <a href="{{ $item->facebook_url }}" target="_blank"
                                                    class="w-32px h-32 rounded-lg bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            @else
                                                <span
                                                    class="w-32px h-32 rounded-lg bg-light text-muted d-flex align-items-center justify-content-center border">
                                                    <i class="fab fa-facebook-f"></i>
                                                </span>
                                            @endif
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"
                                                class="w-32px h-32 rounded-lg bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://zalo.me/{{ $item->phone }}" target="_blank"
                                                class="w-32px h-32 rounded-lg bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fas fa-comment-alt"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>



                <nav class="mt-4">
                    @if ($users->count() > 0 && $users->lastPage() > 1)
                    <nav class="mt-4">
                        <ul class="pagination rounded-active justify-content-center">
                            {{-- Trang đầu và Trang trước --}}
                            @if ($users->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="far fa-angle-double-left"></i></span>
                                </li>
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="far fa-angle-left"></i></span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->url(1) }}"><i class="far fa-angle-double-left"></i></a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->previousPageUrl() }}"><i class="far fa-angle-left"></i></a>
                                </li>
                            @endif
                
                            {{-- Các trang số --}}
                            @foreach ($users->getUrlRange(max($users->currentPage() - 2, 1), min($users->currentPage() + 2, $users->lastPage())) as $page => $url)
                                <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                
                            {{-- Trang tiếp và Trang cuối --}}
                            @if ($users->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->nextPageUrl() }}"><i class="far fa-angle-right"></i></a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->url($users->lastPage()) }}"><i class="far fa-angle-double-right"></i></a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="far fa-angle-right"></i></span>
                                </li>
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="far fa-angle-double-right"></i></span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif
                </nav>

                {{-- <div class="text-center mt-2"> {{ $users->firstItem() }}-{{ $users->lastItem() }} trên
                    {{ $users->total() }} Kết quả</div> --}}
        </section>
        <section class="pt-12 pb-11 bg-overlay-secondary bg-img-cover-center"
            style="background-image: url('{{ asset('assets/images/BG3.jpg') }}');">
            <div class="container position-relative z-index-2 text-center text-white">
                <p class="fs-18 font-weight-bold text-uppercase lh-143 letter-spacing-5 mb-3 mt-1">Trở thành</p>
                <h2 class="fs-30 fs-lg-48 lh-13 font-weight-normal mb-7 text-white">Người Đăng Tin Cho Thuê Phòng Trọ</h2>
                <a href="{{ route('owners.profile.resigter-owner') }}" class="btn btn-lg btn-primary px-9 mb-1">Đăng
                    Ký</a>
            </div>
        </section>
    </main>

@endsection
@push('styleUs')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Danh Sách Người Đăng Tin | TRỌ NHANH</title>
    <!-- Google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
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
    <link rel="stylesheet" href="{{ asset('assets/css/css-nht.css') }}">
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
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <!-- Facebook -->
    <meta property="og:url" content="home-01.html">
    <meta property="og:title" content="Home 01">
    <meta property="og:description" content="Real Estate Html Template">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    @livewireStyles --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Khám phá danh sách người đăng tin trên TRỌ NHANH. Tìm hiểu thông tin chi tiết về các người đăng tin, danh sách tin đăng và các dịch vụ cho thuê nhà và phòng trọ.">
    <meta name="author" content="TRỌ NHANH">
    <meta name="generator" content="TRỌ NHANH">

    <!-- Google Fonts -->
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
    <link rel="stylesheet" href="{{ asset('assets/css/css-nht.css') }}">

    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nav.png') }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TronNhanh">
    <meta name="twitter:creator" content="@TronNhanh">
    <meta name="twitter:title" content="Danh Sách Người Đăng Tin | TRỌ NHANH">
    <meta name="twitter:description"
        content="Khám phá danh sách người đăng tin trên TRỌ NHANH. Tìm hiểu thông tin chi tiết về các người đăng tin, danh sách tin đăng và các dịch vụ cho thuê nhà và phòng trọ.">
    <meta name="twitter:image" content="{{ asset('assets/images/tro-moi.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url('/danh-sach-nguoi-dang-tin') }}">
    <meta property="og:title" content="Danh Sách Người Đăng Tin | TRỌ NHANH">
    <meta property="og:description"
        content="Khám phá danh sách người đăng tin trên TRỌ NHANH. Tìm hiểu thông tin chi tiết về các người đăng tin, danh sách tin đăng và các dịch vụ cho thuê nhà và phòng trọ.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/tro-moi.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endpush
@push('scriptUs')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
    <script>
        var districts = @json($districts);
        var villages = @json($villages);
    </script>

    <script src="{{ asset('assets/js/search-api-vn.js') }}"></script>
    {{-- @livewireScripts --}}
@endpush
