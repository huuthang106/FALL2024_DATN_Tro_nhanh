<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Helpers\TimeHelper;
use App\Events\NewMessage;
use Carbon\Carbon;
// use Livewire\WithPagination;
class ContactList extends Component
{
    public $contacts;
    public $sender;

    public $selectedContactId = null;
    public $messages = [];
    public $newMessage = ''; // Thuộc tính để lưu tin nhắn mới
    public $searchTerm = ''; // Thuộc tính tìm kiếm
    public function mount()
    {
        $this->getContacts();
    }


    public function selectContact($contactId)
    {
        $contact = Contact::find($contactId);
        if ($contact) {
            $currentUserId = auth()->id();
            $this->sender = $contact->user_id == $currentUserId ? $contact->contactUser : $contact->user;
            $this->selectedContactId = $contactId;
            $this->getmesseger();
            $this->markMessagesAsRead($contactId);
            $this->selectedContactId = $contactId;
        }
    }
    public function getmesseger()
    {
        if ($this->selectedContactId) {
            $this->messages = Message::where('contact_id', $this->selectedContactId)
                ->orderBy('created_at', 'asc')
                ->get()
                ->map(function ($message) {
                    return [
                        'id' => $message->id,
                        'message' => $message->message,
                        'sender_id' => $message->sender_id,
                        'created_at' => $message->created_at,
                        'relative_time' => $this->getRelativeTime($message->created_at)
                    ];
                });
            Log::info('Đã lấy ' . $this->messages->count() . ' tin nhắn cho contact ID: ' . $this->selectedContactId);
        }
        $this->dispatch('messagesUpdated');
    }


    public function markMessagesAsRead($contactId)
    {
        Message::where('contact_id', $contactId)
            ->where('sender_id', '!=', auth()->id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $this->updateUnreadCount($contactId);
    }
    public function updateUnreadCount($contactId)
    {
        $this->contacts = $this->contacts->map(function ($contact) use ($contactId) {
            if ($contact['id'] == $contactId) {
                $contact['unread_count'] = 0;
            }
            return $contact;
        });
    }
    public function sendMessage()
    {
        // dd($this->selectedContactId);
        Log::info('Selected Contact ID: ' . $this->selectedContactId);
        Log::info('New Message: ' . $this->newMessage);

        // Kiểm tra điều kiện trước khi tạo tin nhắn
        if ($this->selectedContactId && $this->newMessage) {
            try {
                // Tạo mới tin nhắn
                Message::create([
                    'contact_id' => $this->selectedContactId,
                    'sender_id' => auth()->id(),
                    'message' => $this->newMessage,
                ]);

                // Xóa nội dung tin nhắn sau khi gửi
                $this->newMessage = '';

                // Tải lại tin nhắn để hiển thị
                $this->getmesseger();
                $this->emit('messageUpdated');
                // Ghi log thành công
                Log::info('Message sent successfully.');
            } catch (\Exception $e) {
                // Ghi log lỗi nếu có
                Log::error('Error sending message: ' . $e->getMessage());
            }
        } else {
            // Ghi log nếu dữ liệu không hợp lệ
            Log::warning('Invalid data for sending message.');
        }
    }
    private function getRelativeTime($dateTime)
    {
        if (!$dateTime) {
            return '';
        }

        $carbon = Carbon::parse($dateTime);
        $now = Carbon::now();

        // Kiểm tra xem thời gian có phải là trong tương lai không
        if ($carbon->isFuture()) {
            return 'Tin nhắn chưa được gửi'; // Hoặc một thông báo khác nếu thời gian là trong tương lai
        }

        // Tính toán sự khác biệt
        $diff = $now->diff($carbon);
        $diffInSeconds = $diff->s + ($diff->i * 60) + ($diff->h * 3600); // Tính tổng số giây
        $diffInMinutes = $diff->i + ($diff->h * 60); // Tính tổng số phút

        // Ghi log để kiểm tra giá trị
      

        // Hiển thị "Vừa xong" nếu tin nhắn được gửi trong vòng 1 phút (dưới 60 giây)
        if ($diffInSeconds < 60) {
            return 'Vừa xong';
        } elseif ($diffInMinutes < 60) {
            return $diffInMinutes . ' phút trước';
        } elseif ($carbon->isToday()) {
            return  $carbon->format('H:i'); // Hiển thị giờ nếu trong cùng ngày
        } elseif ($carbon->isYesterday()) {
            return 'Hôm qua';
        } elseif ($carbon->isSameYear($now)) {
            return $carbon->format('d/m');
        } else {
            return $carbon->format('d/m/Y');
        }
    }
    public function pollContacts()
    {
        $this->getContacts();
    }
    // Tìm kiếm liên hệ và cập nhật danh sách
    public function updatedSearchTerm()
    {
        $this->getContacts();
    }
    public function getContacts()
    {
        $userId = auth()->id();
        // $contacts = Contact::where('user_id', $userId)
        //     ->orWhere('contact_user_id', $userId)
        //     ->with(['user', 'contactUser', 'latestMessage'])
        //     ->get();
        $contacts = Contact::where(function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->orWhere('contact_user_id', $userId);
        })
            ->with(['user', 'contactUser', 'latestMessage'])
            ->get();
        $this->contacts = $contacts->map(function ($contact) use ($userId) {
            $otherUser = $contact->user_id == $userId ? $contact->contactUser : $contact->user;
            $unreadCount = $contact->messages()
                ->where('sender_id', '!=', $userId)
                ->where('is_read', false)
                ->count();
            // return [
            //     'id' => $contact->id,
            //     'name' => $otherUser->name,
            //     'email' => $otherUser->email,
            //     'image' => $otherUser->image,
            //     'unread_count' => $unreadCount,
            //     'last_message_time' => $contact->latestMessage ? $contact->latestMessage->created_at : null,
            // ];
            // Tìm kiếm dựa trên tên hoặc email
            if (
                stripos($otherUser->name, $this->searchTerm) !== false ||
                stripos($otherUser->email, $this->searchTerm) !== false
            ) {
                return [
                    'id' => $contact->id,
                    'name' => $otherUser->name,
                    'email' => $otherUser->email,
                    'image' => $otherUser->image,
                    'unread_count' => $unreadCount,
                    'last_message_time' => $contact->latestMessage ? $contact->latestMessage->created_at : null,
                ];
            }
        })
            // ->sortByDesc('last_message_time')
            // ->values();
            ->filter()->sortByDesc('last_message_time')->values();
        // Bỏ ->all() ở cuối
    }

    public function render()
    {
        $currentUserId = auth()->id(); // Lấy ID của người dùng hiện tại

        return view('livewire.contact-list', [

            'currentUserId' => $currentUserId // Truyền thông tin người dùng hiện tại đến view
        ]);
    }
}
