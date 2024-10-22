<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Registrationlist; // Giả sử model của bạn là Registrationlist

class ListRegister extends Component
{
    use WithPagination;

    public $search = ''; // Thuộc tính để lưu trữ giá trị tìm kiếm

    public function render()
    {
        $list = Registrationlist::with('user') // Eager load user relationship
            ->where('status', 1) // Chỉ lấy các bản ghi có status là 1
            ->where('description', 'like', '%' . $this->search . '%')
            ->paginate(10);
    
        return view('livewire.list-register', ['list' => $list]);
    }
    
    public function approve($registrationId)
    {
        $registration = Registrationlist::with('identity.user')->find($registrationId);
    
        if ($registration && $registration->identity && $registration->identity->user) {
            $user = $registration->identity->user;
            $user->role = 2; // Cập nhật vai trò thành 2
            $user->save();
    
            $registration->status = 2; // Cập nhật trạng thái thành 2
            $registration->save();
    
            session()->flash('message', 'Duyệt thành công và vai trò đã được cập nhật.');
        } else {
            session()->flash('error', 'Không tìm thấy người dùng hoặc đăng ký.');
        }
    }
}