<main id="content" class="bg-light">
    <div class="container-fluid py-5">
        <div class="row">
            <!-- Contact List -->
            <div class="col-lg-5 col-xl-4 mb-4 mb-lg-0">
                <div class="card">
                    <div class="card-header">
                        <form class="position-relative">
                            <input type="text" class="form-control pl-4" placeholder="Tìm kiếm...">
                        </form>
                    </div>
                    <div class="card-body" wire:poll="pollContacts">
                        <!-- ... existing code ... -->
                        <div class="list-group list-group-flush">
                            @foreach ($contacts as $contact)
                                <div wire:click="selectContact({{ $contact['id'] }})" class="contact-item">
                                    <div wire:key="item-{{ $contact['id'] }}">
                                        <div class="d-flex w-100 justify-content-between align-items-center mt-2">
                                            <div class="d-flex align-items-center">
                                                @if ($contact['image'])
                                                    <img src="{{ asset('assets/images/' . $contact['image']) }}"
                                                        class="rounded-circle mb-2" style="width: 40px; height: 40px;"
                                                        alt="Avatar">
                                                @else
                                                    <img src="{{ asset('assets/images/agent-4-lg.jpg') }}"
                                                        class="rounded-circle mb-2" style="width: 40px; height: 40px;"
                                                        alt="Avatar">
                                                @endif
                                                <div>
                                                    <h6 class="mb-0">{{ $contact['name'] }}</h6>
                                                    <small class="text-muted">{{ $contact['email'] }}</small>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-end">
                                                @if ($contact['unread_count'] > 0)
                                                    <span
                                                        class="badge badge-primary badge-pill">{{ $contact['unread_count'] }}</span>
                                                @endif
                                                <small
                                                    class="text-muted d-block">{{ $this->getRelativeTime($contact['last_message_time']) }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- ... existing code ... -->
                    </div>
                </div>
            </div>
            <!-- Chat -->
            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Chat với {{ $sender ? $sender->name : 'Chọn người nhận' }}</h5>
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
                                                    <a href="#" class="font-weight-bold text-dark">Bạn</a>
                                                </div>
                                                <div class="rounded-circle overflow-hidden"
                                                    style="width: 35px; height: 35px;">
                                                    @if (auth()->user()->image)
                                                        <img src="{{ asset('assets/images/' . auth()->user()->image) }}"
                                                            class="rounded-circle mb-2"
                                                            style="width: 40px; height: 40px;" alt="Avatar">
                                                    @else
                                                        <img src="{{ asset('assets/images/agent-4-lg.jpg') }}"
                                                            class="rounded-circle mb-2"
                                                            style="width: 40px; height: 40px;" alt="Avatar">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="p-3 rounded bg-primary text-white font-weight-bold text-right"
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
                                                        <img src="{{ asset('assets/images/agent-4-lg.jpg') }}"
                                                            class="rounded-circle mb-2"
                                                            style="width: 40px; height: 40px;" alt="Avatar">
                                                    @endif
                                                </div>
                                                <div>
                                                    <a href="#" class="font-weight-bold text-dark mr-1">
                                                        {{ $sender ? $sender->name : 'Người khác' }}
                                                    </a>
                                                    <small
                                                        class="text-muted d-block">{{ $message['relative_time'] }}</small>
                                                </div>
                                            </div>
                                            <div class="p-3 rounded bg-light text-dark font-weight-bold"
                                                style="max-width: 400px;">
                                                {{ $message['message'] }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                      

                        {{-- @endforelse --}}
                    </div>
                    <div class="card-footer">
                        <form wire:submit.prevent="sendMessage">
                            <div class="input-group">
                                <input type="text" wire:model="newMessage" class="form-control"
                                    placeholder="Nhập tin nhắn...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <p class="text-center">Chưa có tin nhắn nào.</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</main>
