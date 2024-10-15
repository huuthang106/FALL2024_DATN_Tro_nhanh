<main id="content" class="bg-light">
    <div class="container-fluid py-5">
        <div class="row">
            <!-- Contact List -->
            <div class="col-lg-5 col-xl-4 mb-4 mb-lg-0">
                <div class="card">
                    <div class="card-header">
                        <form class="position-relative">
                            <!-- Ô tìm kiếm liên kết với thuộc tính searchTerm trong Livewire -->
                            <input type="text" class="form-control pl-4" placeholder="Tìm kiếm..."
                                wire:model.lazy="searchTerm" wire:keydown.debounce.300ms="$refresh">
                        </form>
                    </div>
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body p-0" wire:poll="pollContacts" style="height: 400px; overflow-y: auto;">
                        <!-- ... existing code ... -->
                        <div class="list-group list-group-flush">
                            @if ($contacts->isEmpty())
                                <!-- Thông báo khi không tìm thấy kết quả -->
                                <div class="text-center text-muted">
                                    Không tìm thấy kết quả.
                                </div>
                            @else
                                @foreach ($contacts as $contact)
                                    <div wire:click="selectContact({{ $contact['id'] }})" wire:poll.5s="getContacts"
                                        class="contact-item mt-2  {{ $selectedContactId == $contact['id'] ? 'active-contact' : '' }}">
                                        <div wire:key="item-{{ $contact['id'] }}" class="m-2 ">
                                            <div class="d-flex w-100 justify-content-between align-items-center mt-2">
                                                <div class="col-lg-9 d-flex align-items-center p-0">
                                                    <small>
                                                        <div class="symbol symbol-45px symbol-circle mr-2">
                                                            <div class="avatar-container"
                                                                style="width: 45px; height: 45px; overflow: hidden; border-radius: 50%;">
                                                                @if ($contact['image'])
                                                                    <img src="{{ asset('assets/images/' . $contact['image']) }}"
                                                                        alt="Avatar"
                                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                                @else
                                                                    <img src="{{ asset('assets/images/agent-43.jpg') }}"
                                                                        alt="Avatar"
                                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </small>
                                                    <div>
                                                        <small> <span
                                                                class="mb-0">{{ Str::limit($contact['name'], 25) }}
                                                            </span>

                                                        </small>
                                                        <br>
                                                        <small> <span class="mb-0">{{ $contact['email'] }}
                                                            </span>

                                                        </small>
                                                        {{-- <small class="text-muted">{{ $contact['email'] }}</small> --}}
                                                    </div>
                                                    @if ($contact['unread_count'] > 0)
                                                        <small
                                                            class="badge badge-primary badge-pill mb-5">{{ $contact['unread_count'] }}</small>
                                                    @endif
                                                </div>
                                                <div class="d-flex flex-column align-items-end">
                                                    <small class="text-muted d-block">
                                                        {{ $contact['last_message_time'] ? $this->getRelativeTime($contact['last_message_time']) : 'Chưa có tin' }}
                                                    </small>
                                                    <!-- Xóa trực tiếp -->
                                                    {{-- <button
                                                        wire:click.stop="deleteChatPermanently({{ $contact['id'] }})"
                                                        class="btn btn-sm btn-icon btn-light-danger"
                                                        title="Xóa đoạn chat">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button> --}}
                                                    <!-- Xác nhận mới xóa -->
                                                    <button wire:click.stop="confirmDelete({{ $contact['id'] }})"
                                                        class="btn btn-sm btn-icon btn-light-danger"
                                                        title="Xóa đoạn chat">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- ... existing code ... -->
                    </div>
                </div>
            </div>
            <!-- Chat -->
            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-cente">
                        <h5 class="mb-0">Chat với {{ $sender ? $sender->name : 'Chọn người nhận' }}</h5>
                        @if ($sender)
                            <a href="{{ route('client.client-agent-detail', $sender->slug) }}"
                                class="btn btn-sm btn-icon ml-auto d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px; transition: all 0.2s ease;" data-toggle="tooltip"
                                data-placement="bottom" title="Xem trang cá nhân"
                                onmouseover="this.querySelector('svg').style.fill='#007bff'"
                                onmouseout="this.querySelector('svg').style.fill='#6c757d'">
                                <svg class="icon icon-my-profile" width="16" height="16" style="fill: #6c757d;">
                                    <use xlink:href="#icon-my-profile"></use>
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div class="card-body" id="chatBox" style="height: 400px; overflow-y: auto;"
                        wire:poll="getmesseger">
                        @if (isset($messages) && count($messages) > 0)
                            @foreach ($messages as $message)
                                @if ($message['sender_id'] == $currentUserId)
                                    <!-- Tin nhắn của người dùng hiện tại -->
                                    <div class="d-flex justify-content-end mb-3">
                                        <div class="d-flex flex-column align-items-end">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-3 text-right">
                                                    <small
                                                        class="text-muted d-block">{{ $message['relative_time'] }}</small>
                                                    <a href="#" class=" text-dark">Bạn</a>
                                                </div>
                                                <div class="avatar-container rounded-circle overflow-hidden"
                                                    style="width: 35px; height: 35px; flex-shrink: 0;">
                                                    @if (auth()->user()->image)
                                                        <img src="{{ asset('assets/images/' . auth()->user()->image) }}"
                                                            alt="Avatar"
                                                            style="width: 100%; height: 100%; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('assets/images/agent-43.jpg') }}"
                                                            alt="Avatar"
                                                            style="width: 100%; height: 100%; object-fit: cover;">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="p-3 rounded bg-primary text-white  text-right"
                                                style="max-width: 400px;">
                                                {{ $message['message'] }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <!-- Tin nhắn của contact (người khác) -->
                                    <div class="d-flex justify-content-start mb-3">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="rounded-circle overflow-hidden mr-3"
                                                    style="width: 35px; height: 35px;">
                                                    @if ($sender && $sender->image)
                                                        <img src="{{ asset('assets/images/' . $sender->image) }}"
                                                            class="rounded-circle mb-2"
                                                            style="width: 40px; height: 40px;" alt="Avatar">
                                                    @else
                                                        <img src="{{ asset('assets/images/agent-43.jpg') }}"
                                                            class="rounded-circle mb-2"
                                                            style="width: 40px; height: 40px;" alt="Avatar">
                                                    @endif
                                                </div>
                                                <div>
                                                    <a href="#" class=" text-dark mr-1">
                                                        {{ $sender ? $sender->name : 'Người khác' }}
                                                    </a>
                                                    <small
                                                        class="text-muted d-block">{{ $message['relative_time'] }}</small>
                                                </div>
                                            </div>
                                            <div class="p-3 rounded bg-light text-dark " style="max-width: 400px;">
                                                {{ $message['message'] }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p class="text-center">Chưa có tin nhắn nào.</p>
                        @endif
                        {{-- @endforelse --}}
                    </div>


                    <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                        <form wire:submit.prevent="sendMessage" class="d-flex flex-column">
                            <!--begin::Input-->
                            <div class="input-group mb-3">
                                <input class="form-control" wire:model="newMessage" rows="1"
                                    data-kt-element="input" placeholder="Nhập tin nhắn..."
                                    style="resize: none;"></input>
                                <!--end::Input-->
                                <!--begin:Toolbar-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Actions-->
                                    {{-- <div class="d-flex align-items-center me-2">
                                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                    data-bs-toggle="tooltip" title="Coming soon">
                                    <i class="bi bi-paperclip fs-3"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                    data-bs-toggle="tooltip" title="Coming soon">
                                    <i class="bi bi-upload fs-3"></i>
                                </button>
                            </div> --}}
                                    <!--end::Actions-->
                                    <!--begin::Send-->
                                    <button class="btn btn-primary" type="submit" data-kt-element="send">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                                <!--end::Send-->
                            </div>
                        </form>
                        <!--end::Toolbar-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
