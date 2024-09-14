<?php

namespace App\Livewire;

use App\Models\Resident;
use Livewire\Component;
use Livewire\WithPagination;

class MyMaintenanceOwnerList extends Component
{
    use WithPagination; // Sử dụng trait WithPagination

    protected const LIMIT = 10; // Đổi tên hằng số thành chữ hoa
    protected const participated = 2; // Đổi tên hằng số thành chữ hoa
    public $roomIds = []; // Biến để lưu trữ ID của các phòng
    public $totalRooms; // Biến để lưu trữ tổng số phòng

    public function mount()
    {
        $this->loadRooms(); // Gọi hàm để tải danh sách phòng khi component được khởi tạo
    }

    public function loadRooms()
    {
        $userId = auth()->id(); // Lấy ID của người dùng hiện tại

        // Lấy danh sách residents mà người dùng đang ở
        $residents = Resident::where('tenant_id', $userId)
            ->paginate(self::LIMIT); // Sử dụng paginate để phân trang

        // Lưu trữ ID của các phòng
        $this->roomIds = $residents->pluck('room_id')->toArray(); // Lấy ID của các phòng
        $this->totalRooms = $residents->total(); // Lưu trữ tổng số phòng
    }

    public function render()
    {
        return view('livewire.my-maintenance-owner-list', [
            'roomIds' => $this->roomIds, // Truyền danh sách ID phòng vào view
            'totalRooms' => $this->totalRooms, // Truyền tổng số phòng vào view
            'rooms' => Resident::where('tenant_id', auth()->id())->where('status', self::participated)->paginate(self::LIMIT), // Truyền đối tượng phân trang vào view
        ]);
    }
}
