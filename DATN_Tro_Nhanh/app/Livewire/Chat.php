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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Chat extends Component
{
    public $contacts;
    public $sender;

    public $selectedContactId = null;
    public $messages = [];
    public $newMessage = ''; // Thuộc tính để lưu tin nhắn mới
    public $searchTerm = ''; // Thuộc tính tìm kiếm
    protected $listeners = ['deleteChatPermanently'];
    public function mount()
    {
        $this->getContacts();
    }


    // public function selectContact($contactId)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('client.home')->with('error', 'Phiên đăng nhập của bạn đã hết hạn. Vui lòng đăng nhập lại.');
    //     }
    //     $contact = Contact::find($contactId);
    //     if ($contact) {
    //         $currentUserId = auth()->id();
    //         $this->sender = $contact->user_id == $currentUserId ? $contact->contactUser : $contact->user;
    //         $this->selectedContactId = $contactId;
    //         $this->getmesseger();
    //         $this->markMessagesAsRead($contactId);
    //         $this->selectedContactId = $contactId;
    //     }
    // }
    public function selectContact($contactId)
    {
        $currentUserId = auth()->id();
        $contact = Contact::find($contactId);

        if ($contact) {
            $deletedBy = $contact->deleted_by ?? [];

            if (in_array($currentUserId, $deletedBy)) {
                // Nếu liên hệ đã bị xóa bởi người dùng hiện tại, tạo lại liên hệ
                $deletedBy = array_diff($deletedBy, [$currentUserId]);
                $contact->deleted_by = empty($deletedBy) ? null : $deletedBy;
                $contact->save();

                Log::info("Liên hệ $contactId đã được khôi phục cho người dùng $currentUserId");
            }

            $this->sender = $contact->user_id == $currentUserId ? $contact->contactUser : $contact->user;
            $this->selectedContactId = $contactId;
            $this->getmesseger();
            $this->markMessagesAsRead($contactId);
        } else {
            // Xử lý trường hợp không tìm thấy liên hệ
            Log::warning("Không tìm thấy liên hệ với ID: $contactId");
            session()->flash('error', 'Không tìm thấy liên hệ.');
            $this->selectedContactId = null;
            $this->sender = null;
            $this->messages = [];
        }
    }
    // public function getmesseger()
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('client.home')->with('error', 'Phiên đăng nhập của bạn đã hết hạn. Vui lòng đăng nhập lại.');
    //     }

    //     if ($this->selectedContactId) {
    //         $this->messages = Message::where('contact_id', $this->selectedContactId)
    //             ->orderBy('created_at', 'asc')
    //             ->get()
    //             ->map(function ($message) {
    //                 return [
    //                     'id' => $message->id,
    //                     'message' => $message->message,
    //                     'sender_id' => $message->sender_id,
    //                     'created_at' => $message->created_at,
    //                     'relative_time' => $this->getRelativeTime($message->created_at)
    //                 ];
    //             });
    //         Log::info('Đã lấy ' . $this->messages->count() . ' tin nhắn cho contact ID: ' . $this->selectedContactId);
    //     }
    //     $this->dispatch('messagesUpdated');
    // }
    public function getmesseger()
    {
        if ($this->selectedContactId) {
            $currentUserId = auth()->id();
            $this->messages = Message::where('contact_id', $this->selectedContactId)
                ->where(function ($query) use ($currentUserId) {
                    $query->whereNull('deleted_by')
                        ->orWhereJsonDoesntContain('deleted_by', $currentUserId);
                })
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
        if (!Auth::check()) {
            return redirect()->route('client.home')->with('error', 'Phiên đăng nhập của bạn đã hết hạn. Vui lòng đăng nhập lại.');
        }
        Message::where('contact_id', $contactId)
            ->where('sender_id', '!=', auth()->id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $this->updateUnreadCount($contactId);
    }
    public function updateUnreadCount($contactId)
    {
        if (!Auth::check()) {
            return redirect()->route('client.home')->with('error', 'Phiên đăng nhập của bạn đã hết hạn. Vui lòng đăng nhập lại.');
        }
        $this->contacts = $this->contacts->map(function ($contact) use ($contactId) {
            if ($contact['id'] == $contactId) {
                $contact['unread_count'] = 0;
            }
            return $contact;
        });
    }
    // public function sendMessage()
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('client.home')->with('error', 'Phiên đăng nhập của bạn đã hết hạn. Vui lòng đăng nhập lại.');
    //     }

    //     // dd($this->selectedContactId);
    //     Log::info('Selected Contact ID: ' . $this->selectedContactId);
    //     Log::info('New Message: ' . $this->newMessage);

    //     // Kiểm tra điều kiện trước khi tạo tin nhắn
    //     if ($this->selectedContactId && $this->newMessage) {
    //         try {
    //             // Tạo mới tin nhắn
    //             Message::create([
    //                 'contact_id' => $this->selectedContactId,
    //                 'sender_id' => auth()->id(),
    //                 'message' => $this->newMessage,
    //             ]);

    //             // Xóa nội dung tin nhắn sau khi gửi
    //             $this->newMessage = '';

    //             // Tải lại tin nhắn để hiển thị
    //             $this->getmesseger();
    //             $this->emit('messageUpdated');
    //             // Ghi log thành công
    //             Log::info('Message sent successfully.');
    //         } catch (\Exception $e) {
    //             // Ghi log lỗi nếu có
    //             Log::error('Error sending message: ' . $e->getMessage());
    //         }
    //     } else {
    //         // Ghi log nếu dữ liệu không hợp lệ
    //         Log::warning('Invalid data for sending message.');
    //     }
    // }
    public function sendMessage()
    {
        Log::info('Selected Contact ID: ' . $this->selectedContactId);
        Log::info('New Message: ' . $this->newMessage);

        if ($this->selectedContactId && $this->newMessage) {
            try {
                DB::transaction(function () {
                    $currentUserId = auth()->id();
                    $contact = Contact::find($this->selectedContactId);

                    if (!$contact) {
                        // Nếu liên hệ không tồn tại, tạo mới
                        $contact = $this->createNewContact($currentUserId);
                    } else {
                        // Kiểm tra xem liên hệ có bị xóa bởi cả hai bên không
                        $deletedBy = $contact->deleted_by ?? [];
                        $receiverId = $contact->user_id == $currentUserId ? $contact->contact_user_id : $contact->user_id;

                        if (count($deletedBy) == 2) {
                            // Nếu cả hai bên đều đã xóa, tạo liên hệ mới
                            $contact = $this->createNewContact($currentUserId, $receiverId);
                        } elseif (in_array($currentUserId, $deletedBy)) {
                            // Nếu chỉ người gửi hiện tại đã xóa, khôi phục liên hệ
                            $deletedBy = array_diff($deletedBy, [$currentUserId]);
                            $contact->deleted_by = empty($deletedBy) ? null : $deletedBy;
                            $contact->save();
                        }
                    }

                    // Tạo mới tin nhắn
                    $message = Message::create([
                        'contact_id' => $contact->id,
                        'sender_id' => $currentUserId,
                        'message' => $this->newMessage,
                    ]);

                    if (!$message) {
                        throw new \Exception('Không thể tạo tin nhắn');
                    }

                    // Cập nhật selectedContactId nếu đã tạo liên hệ mới
                    $this->selectedContactId = $contact->id;

                    // Xóa nội dung tin nhắn sau khi gửi
                    $this->newMessage = '';

                    // Tải lại tin nhắn để hiển thị
                    $this->getmesseger();
                    $this->dispatch('messageUpdated');

                    Log::info('Message sent successfully.');
                });
            } catch (\Exception $e) {
                Log::error('Error sending message: ' . $e->getMessage());
                session()->flash('error', 'Có lỗi xảy ra khi gửi tin nhắn: ' . $e->getMessage());
            }
        } else {
            Log::warning('Invalid data for sending message.');
            session()->flash('error', 'Dữ liệu không hợp lệ để gửi tin nhắn.');
        }
    }
    private function getRelativeTime($dateTime)
    {
        if (!$dateTime) {
            return '';
        }

        $carbon = Carbon::parse($dateTime);
        $now = Carbon::now();

        // Kiểm tra nếu thời gian là dưới 1 phút
        if ($carbon->diffInMinutes($now) < 1) {
            return 'Vừa xong';
        }

        // Nếu tin nhắn trong ngày hôm nay thì hiển thị dạng tương đối (x phút trước, x giờ trước)
        if ($carbon->isToday()) {
            return $carbon->diffForHumans($now, true); // Hiển thị dạng tương đối
        }

        // Nếu là ngày hôm qua, hiển thị 'Hôm qua'
        elseif ($carbon->isYesterday()) {
            return 'Hôm qua';
        }

        // Nếu cùng năm, hiển thị ngày/tháng
        elseif ($carbon->isSameYear($now)) {
            return $carbon->format('d/m');
        }

        // Nếu khác năm, hiển thị đầy đủ ngày/tháng/năm
        else {
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
        // $userId = auth()->id();
        // $contacts = Contact::where(function ($query) use ($userId) {
        //     $query->where('user_id', $userId)
        //         ->orWhere('contact_user_id', $userId);
        // })
        //     ->where(function ($query) use ($userId) {
        //         $query->whereNull('deleted_by')
        //             ->orWhereJsonDoesntContain('deleted_by', $userId);
        //     })
        //     ->with(['user', 'contactUser', 'latestMessage'])
        //     ->get();
        $userId = auth()->id();
        $contacts = Contact::where(function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->orWhere('contact_user_id', $userId);
        })
            ->where(function ($query) use ($userId) {
                $query->whereNull('deleted_by')
                    ->orWhereJsonDoesntContain('deleted_by', $userId)
                    ->orWhereHas('messages', function ($q) use ($userId) {
                        $q->where('sender_id', '!=', $userId)
                            ->whereNull('deleted_by')
                            ->orWhereJsonDoesntContain('deleted_by', $userId);
                    });
            })
            ->with(['user', 'contactUser', 'latestMessage'])
            ->get();

        $this->contacts = $contacts->map(function ($contact) use ($userId) {
            $otherUser = $contact->user_id == $userId ? $contact->contactUser : $contact->user;
            $unreadCount = $contact->messages()
                ->where('sender_id', '!=', $userId)
                ->where('is_read', false)
                ->where(function ($query) use ($userId) {
                    $query->whereNull('deleted_by')
                        ->orWhereJsonDoesntContain('deleted_by', $userId);
                })
                ->count();

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
            ->filter()
            ->sortByDesc('last_message_time')
            ->values();
    }

    public function render()
    {
        $currentUserId = auth()->id(); // Lấy ID của người dùng hiện tại

        return view('livewire.chat', [

            'currentUserId' => $currentUserId // Truyền thông tin người dùng hiện tại đến view
        ]);
    }
    // Xác nhận xóa
    public function confirmDelete($contactId)
    {
        $this->dispatch('confirmDelete', $contactId);
    }
    // Xóa chat
    public function deleteChatPermanently($contactId)
    {
        $currentUserId = auth()->id();

        DB::transaction(function () use ($contactId, $currentUserId) {
            // Xử lý xóa tin nhắn
            $messages = Message::where('contact_id', $contactId)->get();
            foreach ($messages as $message) {
                $deletedBy = $message->deleted_by ?? [];
                if (!in_array($currentUserId, $deletedBy)) {
                    $deletedBy[] = $currentUserId;
                    $message->deleted_by = $deletedBy;
                    $message->save();
                }
            }

            // Xử lý xóa contact
            $contact = Contact::find($contactId);
            if ($contact) {
                $deletedBy = $contact->deleted_by ?? [];
                if (!in_array($currentUserId, $deletedBy)) {
                    $deletedBy[] = $currentUserId;
                    $contact->deleted_by = $deletedBy;
                    $contact->save();
                }
            }
        });

        // Cập nhật danh sách liên hệ
        $this->getContacts();
        // Nếu liên hệ đang được chọn là liên hệ vừa xóa, reset các thuộc tính liên quan
        if ($this->selectedContactId == $contactId) {
            $this->selectedContactId = null;
            $this->sender = null;
            $this->messages = [];
        }

        // Thông báo cho frontend cập nhật giao diện
        $this->dispatch('contactDeleted', $contactId);
    }
}
