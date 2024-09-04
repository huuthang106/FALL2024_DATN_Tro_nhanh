<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\UserClientServices;
class UnreadMessageCount extends Component
{
    public $unreadCount = 0;

    protected $userClientServices;

    public function boot(UserClientServices $userClientServices)
    {
        $this->userClientServices = $userClientServices;
    }

    public function mount()
    {
        $this->updateUnreadCount();
    }

    public function getListeners()
    {
        return [
            "echo-private:user.".auth()->id().",MessageSent" => 'updateUnreadCount',
            'updateUnreadCount'
        ];
    }

    public function updateUnreadCount()
    {
        $this->unreadCount = $this->userClientServices->getUnreadMessagesCount(auth()->id());
    }

    public function render()
    {
        return view('livewire.unread-message-count');
    }
}