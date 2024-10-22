<?php

namespace App\Livewire;

use App\Services\ZoneServices; // Import ZoneServices
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Zone;
use App\Models\Room;
use App\Models\Resident;
use Livewire\WithPagination;

class ZoneDetail extends Component
{
    use WithPagination;

    public $slug; // Biến để lưu slug của khu trọ
    public $status = 2; // Trạng thái cư dân (có thể thay đổi nếu cần)
    public $searchRoom = ''; // Từ khóa tìm kiếm phòng
    public $searchResident = ''; // Từ khóa tìm kiếm cư dân
    public $perPage = 10; // Số lượng phòng và cư dân trên mỗi trang
    public $selectedRooms = [];
    protected const user_is_in = 2;
    public $selectAll = false;
    public $zone;
    public function mount($slug, ZoneServices $zoneServices)
    {
        $this->slug = $slug;
        $this->zone = Zone::where('slug', $this->slug)->firstOrFail(); // Lưu thông tin zone
        // $this->zoneServices = $zoneServices; // Nếu cần sử dụng zoneServices, hãy bỏ comment dòng này
    }

    public function updatedSearchRoom() // Reset trang khi tìm kiếm phòng
    {
        $this->resetPage();
    }
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedRooms = $this->getRoomIds();
        } else {
            $this->selectedRooms = [];
        }
    }
    public function updatedSearchResident() // Reset trang khi tìm kiếm cư dân
    {
        $this->resetPage();
    }
    private function getRoomIds()
    {
        return Room::where('zone_id', $this->zone->id)->pluck('id')->toArray();
    }
    // public function render()
    // {
    //     // Lấy zone dựa trên slug
    //     $zone = Zone::where('slug', $this->slug)->firstOrFail();

    //     // Lấy danh sách phòng thuộc zone này với tìm kiếm
    //     $rooms = Room::where('zone_id', $zone->id)
    //         ->where('title', 'like', '%' . $this->searchResident . '%') // Tìm kiếm theo tên phòng
    //         ->orderBy('created_at', 'desc')
    //         ->paginate($this->perPage); // Sử dụng biến $perPage để phân trang

    //     // Kiểm tra nếu có phòng trước khi lấy danh sách cư dân
    //     $roomIds = $rooms->pluck('id'); // Lấy danh sách ID phòng

    //     // Lấy danh sách người ở (residents) thuộc zone này với tìm kiếm
    //     $residents = Resident::whereIn('room_id', $roomIds)
    //         ->where('status', $this->status) // Chỉ lấy resident có status = 2
    //         // ->whereHas('user', function($query) {
    //         //     $query->where('name', 'like', '%' . $this->searchResident . '%'); // Tìm kiếm theo tên cư dân
    //         // })
    //         ->paginate($this->perPage); // Sử dụng biến $perPage để phân trang

    //     return view('livewire.zone-detail', [
    //         'user_is_in' => self::user_is_in, // Trả về hằng số user_is_in
    //         'zone' => $zone, // Trả về biến $zone
    //         'rooms' => $rooms, // Trả về danh sách phòng
    //         'residents' => $residents, // Trả về danh sách cư dân
    //     ]);
    // }
//     public function render()
// {
//     // Lấy zone dựa trên slug
//     $zone = Zone::where('slug', $this->slug)->firstOrFail();

//     // Lấy danh sách phòng thuộc zone này với tìm kiếm
//     $rooms = Room::where('zone_id', $zone->id)
//         ->where('title', 'like', '%' . $this->searchResident . '%') // Tìm kiếm theo tên phòng
//         ->orderBy('created_at', 'desc')
//         ->paginate($this->perPage); // Sử dụng biến $perPage để phân trang

//     // Lấy danh sách ID phòng
//     $roomIds = $rooms->pluck('id'); // Lấy danh sách ID phòng

//     // Lấy danh sách cư dân thuộc các phòng này
//     $residents = Resident::whereIn('room_id', $roomIds)
//         ->where('status', operator: $this->status) // Chỉ lấy resident có status = 2
//         ->paginate($this->perPage); // Lấy tất cả cư dân mà không phân trang

//     return view('livewire.zone-detail', [
//         'user_is_in' => self::user_is_in, // Trả về hằng số user_is_in
//         'zone' => $zone, // Trả về biến $zone
//         'rooms' => $rooms, // Trả về danh sách phòng
//         'residents' => $residents, // Trả về danh sách cư dân
//     ]);
// }
public function render()
    {
        $rooms = Room::where('zone_id', $this->zone->id)
            ->where('title', 'like', '%' . $this->searchResident . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.zone-detail', [
            'user_is_in' => self::user_is_in,
            'zone' => $this->zone,
            'rooms' => $rooms,
        ]);
    }
public function deleteSelectedRooms()
{
    Room::whereIn('id', $this->selectedRooms)->delete();

    // Reset selected rooms and select all checkbox
    $this->selectedRooms = [];
    $this->selectAll = false;

    // Dispatch an event to show a success message
    $this->dispatch('showAlert', [
        'type' => 'success',
        'message' => 'Các phòng đã chọn đã được xóa.'
    ]);

    // Refresh the component to update the list
    $this->dispatch('refreshComponent');
}
}
