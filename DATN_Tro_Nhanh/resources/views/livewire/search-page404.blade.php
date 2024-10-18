<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="text-center">
        <img src="{{ asset('assets/images/page-404.jpg') }}" alt="Page 404" class="mb-5">
        <h1 class="fs-30 lh-16 text-dark font-weight-600 mb-5">Ối! Không thể tìm thấy trang đó.</h1>
        <p class="mb-8">Có vẻ như không có gì được tìm thấy ở vị trí này. Có thể thử tìm kiếm phòng trọ tại đây.</p>
        <div class="input-group mb-6 mxw-670 shadow-xxs-2 custom-input-group mb-2 mx-auto">
            <div class="input-group-prepend">
                <button class="btn shadow-none text-dark fs-18" type="button"><i class="fal fa-search"></i>
                </button>
            </div>
            <input type="text" class="form-control bg-white shadow-none border-0 z-index-1"
                placeholder="Nhập tên phòng trọ" wire:keydown.debounce.300ms="$refresh" wire:model.lazy="search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </div>
    @if ($hasSearched)
        @if ($results->isNotEmpty())
            {{-- Hiển thị kết quả tìm kiếm --}}
            <div class="search-results mt-2 mxw-670 mx-auto text-left mb-10">
                @foreach ($results as $room)
                    <div class="result-item p-2 border-bottom">
                        <div class="media">
                            <div class="mr-3 position-relative">
                                <a href="{{ route('client.detail-zone', ['slug' => $room->slug]) }}">
                                    <div class="position-relative image-container">
                                        <img src="{{ $this->getRoomImageUrl($room) }}" alt="{{ $room->title }}"
                                            class="room-image">
                                        @if ($room->expiration_date > now())
                                            <span class="badge badge-danger position-absolute"
                                                style="bottom: 5px; right: 5px;">
                                                VIP
                                            </span>
                                        @endif
                                    </div>
                                </a>
                                <span class="badge badge-info position-absolute" style="top: 5px; left: 5px;">Cho
                                    thuê</span>
                            </div>
                            <div class="media-body overflow-hidden">
                                <a href="{{ route('client.detail-zone', ['slug' => $room->slug]) }}" class="text-dark">
                                    <h5 class="mt-0 mb-1">{{ $room->title }}</h5>
                                </a>
                                <p class="mb-1 text-muted">{{ $room->address }}</p>
                                <strong class="text-primary">
                                    {{ number_format($room->price, 0, ',', '.') }} VND
                                </strong>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-results mt-2 mxw-670 mx-auto text-center mb-10">
                Không tìm thấy phòng trọ phù hợp.
            </div>
        @endif
    @endif
    <div class="row">
        <div class="col-lg-6 mb-6">
            <h2 class="fs-22 lh-15 text-dark border-bottom pb-2 mb-2 pr-lg-7">Danh sách phòng mới</h2>
            <ul class="list-unstyled row">
                @foreach ($this->latestRooms as $room)
                    <li class="col-md-6 lh-26 mb-2">
                        <a href="{{ route('client.detail-zone', ['slug' => $room->slug]) }}"
                            class="text-body hover-dark d-flex align-items-center">
                            <div class="mr-2 position-relative">
                                <img src="{{ $this->getRoomImageUrl($room) }}" alt="{{ $room->title }}"
                                    class="img-fluid rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                @if ($room->expiration_date > now())
                                    <span class="badge badge-danger position-absolute"
                                        style="top: 0; right: 0; font-size: 0.6rem;">VIP</span>
                                @endif
                            </div>
                            <div class="flex-grow-1 min-width-0">
                                <div class="title-truncate">{{ $room->title }}</div>
                                <small class="text-dark">{{ number_format($room->price, 0, ',', '.') }} VND</small>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-6 mb-6">
            <h2 class="fs-22 lh-15 text-dark border-bottom pb-2 mb-2">Bài viết mới</h2>
            <ul class="list-unstyled row">
                @foreach ($this->latestBlogs as $blog)
                    <li class="col-md-6 lh-26 mb-2">
                        <a href="{{ route('client.client-blog-detail', $blog->slug) }}"
                            class="text-body hover-dark d-flex align-items-center">
                            <div class="mr-2 position-relative">
                                @php
                                    $image = $blog->image->first();
                                @endphp
                                <img src="{{ asset('assets/images/' . ($image ? $image->filename : 'default.jpg')) }}"
                                    alt="{{ $blog->title }}" class="img-fluid rounded"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                            </div>
                            <div class="flex-grow-1 min-width-0">
                                <div class="title-truncate">{{ $blog->title }}</div>
                                <small class="text-dark">{{ $blog->created_at->format('d/m/Y') }}</small>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
