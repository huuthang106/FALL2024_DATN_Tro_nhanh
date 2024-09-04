<?php

    namespace App\Livewire;

    use Livewire\Component;
    use App\Models\Message;
    use App\Models\Contact;
    use Livewire\Attributes\On;
    use Illuminate\Support\Facades\Log;

    class Chat extends Component
    {   public $selectedContactId;
        public $contact;
        public $messages = [];
        public $isLoading = false;
        public $newMessage = '';
        public $receiverId;

        #[On('contact-selected')]
    //     public function handleContactSelected($data)
    //     {
    //         Log::info('Chat: Đã nhận dữ liệu', $data);
    //         $this->selectedContactId = $data['contactId'];
    //         $this->isLoading = true;
    //         $this->loadContact();
    //         $this->loadMessages();
    //         $this->isLoading = false; // Đặt là false khi dữ liệu đã được tải xong
    //     }
    //     public function loadContact()
    //     {
    //         $this->contact = $this->selectedContactId ? Contact::find($this->selectedContactId) : null;
    //     }

    
    // public function loadMessages()
    // {
    //     if ($this->selectedContactId) {
    //         $this->messages = Message::where('contact_id', $this->selectedContactId)->get();
    //     }
    // }

    //     public function sendMessage()
    //     {
    //         // Xử lý gửi tin nhắn ở đây
    //         $this->loadMessages();
    //         $this->newMessage = '';
    //     }

        public function render()
        {
            // Log::info('Chat: Đang render', [
            //     'messages' => $this->messages,
            //     'contact' => $this->contact,
            //     'selectedContactId' => $this->selectedContactId,
            //     'isLoading' => $this->isLoading,
            // ]);
            return view('livewire.chat');
        }
    }
