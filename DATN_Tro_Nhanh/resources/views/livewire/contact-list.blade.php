<main id="content" class="bg-light">
    <div class="container-fluid py-5">
        <div class="row">
            <!-- Contact List -->
            <div class="col-lg-4 p-2" wire:poll="pollContacts">
                <div class="card h-100 shadow-sm" style="border-radius: 8px; min-height: 650px;">
                    <div class="card-header bg-white border-0 p-3">
                        <form class="position-relative">
                            <i class="fas fa-search position-absolute"
                                style="right: 15px; top: 50%; transform: translateY(-50%); color: gray;"></i>
                            <input type="text" class="form-control border-0 pl-5" placeholder="Tìm kiếm liên hệ..."
                                wire:model.lazy="searchTerm" wire:keydown.debounce.300ms="$refresh"
                                style="background-color: #f1f3f4; color: gray; border-radius: 20px;">
                        </form>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @if ($contacts->isEmpty())
                                <div class="text-center text-muted p-3">Không tìm thấy kết quả.</div>
                            @else
                            @foreach ($contacts as $contact)
                            <div class="contact-item p-2 d-flex align-items-center position-relative {{ $selectedContactId == $contact['id'] ? 'active-contact' : '' }}"
                                style="cursor: pointer; transition: background-color 0.3s; border-radius: 8px; margin: 4px 8px;"
                                wire:click="selectContact({{ $contact['id'] }})"> <!-- Thêm wire:click ở đây -->
                                <div class="avatar-container mr-2" style="width: 50px; height: 50px;">
                                    <img src="{{ asset('assets/images/' . ($contact['image'] ?? 'agent-43.jpg')) }}"
                                        class="rounded-circle"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div class="flex-grow-1 mr-2">
                                    <div class="font-weight-bold">{{ Str::limit($contact['name'], 20) }}</div>
                                    <small class="text-muted">{{ Str::limit($contact['latest_message'] ?? 'Chưa có tin nhắn', 16) }}</small>
                                    <span class="mx-1 text-muted">·</span>
                                    <small class="text-muted ml-auto">{{ $contact['last_message_time'] ? $this->getRelativeTime($contact['last_message_time']) : '' }}</small>
                                </div>
                        
                                @if ($contact['unread_count'] > 0)
                                    <span class="badge badge-primary ml-1">{{ $contact['unread_count'] }}</span>
                                @endif
                        
                                <!-- Dropdown for more options -->
                                <div class="dropdown ml-2">
                                    <button class="btn btn-sm" type="button"
                                        id="dropdownMenuButton{{ $contact['id'] }}" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton{{ $contact['id'] }}">
                                        <a class="dropdown-item" href="#"
                                            wire:click.stop="confirmDelete({{ $contact['id'] }})">
                                            <i class="fas fa-trash-alt mr-2"></i>Xóa đoạn chat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Chat Box -->
            <div class="col-lg-8 p-2" wire:poll="getmesseger" >
                <div class="card h-100 shadow-sm" style="border-radius: 8px;  min-height: 650px;">
                    <div class="card-header d-flex justify-content-between align-items-center bg-white p-3">
                        @if ($sender)
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/' . ($sender->image ?? 'agent-43.jpg')) }}"
                                    alt="Avatar" class="rounded-circle mr-2"
                                    style="width: 40px; height: 40px; object-fit: cover;">
                                <h6 class="mb-0 font-weight-bold">{{ $sender->name }}</h6>
                            </div>
                            <a href="{{ route('client.client-agent-detail', $sender->slug) }}" class="btn btn-sm "
                                data-toggle="tooltip" title="Xem trang cá nhân">
                                <i class="fas fa-user "></i>
                            </a>
                        @else
                            <h5 class="mb-0">Chọn người nhận</h5>
                        @endif
                    </div>
                    <div class="card-body p-4" id="chatBox"
                    style="overflow-y: auto; max-height: 600px; background-color: #f7f7f7;">
                    @if (isset($messages) && count($messages) > 0)
                        @foreach ($messages as $message)
                            @if ($message['sender_id'] == $currentUserId)
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="p-2 bg-primary text-white dv-message">
                                            {{ $message['message'] }}
                                        </div>
                                        <div class="text-muted small mb-1">{{ $message['relative_time'] }}</div>
                                    </div>
                                </div>
                            @else
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="p-2 bg-white text-dark dv-message">
                                            {{ $message['message'] }}
                                        </div>
                                        <div class="text-muted small mb-1">{{ $message['relative_time'] }}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p class="text-center text-muted">Chưa có tin nhắn nào.</p>
                    @endif
                </div>
                
                <!-- Thêm điều kiện để ẩn input và button khi chưa chọn người chat -->
                @if ($selectedContactId)
                    <div class="card-footer bg-white p-3">
                        <form wire:submit.prevent="sendMessage" class="d-flex">
                            <input type="text" class="form-control border-0 mr-2" placeholder="Nhập tin nhắn..."
                                wire:model="newMessage" style="background-color: #f1f3f4; border-radius: 30px;">
                            <button class="btn btn-primary" type="submit"
                                style="border-radius: 25px; transition: background-color 0.3s;">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    Livewire.on('messageUpdated', () => {
        const chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight; // Cuộn xuống cuối khung chat
    });
</script>