<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Resident;
use Livewire\WithPagination;

class RoomDetail extends Component
{
    use WithPagination;

    public $slug; // Biến để lưu slug của khu trọ
    public $status = 2; // Trạng thái cư dân (có thể thay đổi nếu cần)
    public $searchRoom = ''; // Từ khóa tìm kiếm phòng
    public $searchResident = ''; // Từ khóa tìm kiếm cư dân
    public $perPage = 10; // Số lượng phòng và cư dân trên mỗi trang

    protected const user_is_in = 2;

    public function render()
    {
        $room = Room::where('slug', $this->slug)->firstOrFail();

        // Lấy danh sách cư dân trong phòng với status = 2
        $residents = Resident::where('room_id', $room->id)
            ->where('status', $this->status)
            ->paginate($this->perPage); // Phân trang cư dân

        return view('livewire.room-detail', [
            'room' => $room, // Trả về thông tin phòng
            'residents' => $residents, // Trả về danh sách cư dân
            'user_is_in' => self::user_is_in,
        ]);
    }
}
