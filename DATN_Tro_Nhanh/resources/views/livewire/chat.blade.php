<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Chat với {{ $contact ? $contact->name : 'Chọn người nhận' }}</h5>
        </div>
        <div class="card-body" style="height: 400px; overflow-y: auto;">
            @if($isLoading)
                <p class="text-center">Đang tải dữ liệu...</p>
            @elseif($selectedContactId)
                @forelse($messages as $message)
                    <div class="message">
                        {{ $message->content }}
                    </div>
                @empty
                    <p class="text-center">Chưa có tin nhắn nào.</p>
                @endforelse
            @else
                <p class="text-center">Vui lòng chọn một liên hệ để bắt đầu trò chuyện.</p>
            @endif
        </div>
        <div class="card-footer">
            <form wire:submit.prevent="sendMessage">
                <div class="input-group">
                    <input type="text" wire:model="newMessage" class="form-control" placeholder="Nhập tin nhắn...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Gửi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    ádkjandkjsahkj
</div>
