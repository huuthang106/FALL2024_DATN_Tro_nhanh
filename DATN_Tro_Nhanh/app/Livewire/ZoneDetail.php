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
    public $searchResident ='' ; // Từ khóa tìm kiếm cư dân
    public $perPage = 10; // Số lượng phòng và cư dân trên mỗi trang

    protected const user_is_in = 2;

    public function mount($slug, ZoneServices $zoneServices)
    {
        $this->slug = $slug;
        // $this->zoneServices = $zoneServices; // Nếu cần sử dụng zoneServices, hãy bỏ comment dòng này
    }

    public function updatedSearchRoom() // Reset trang khi tìm kiếm phòng
    {
        $this->resetPage();
    }

    public function updatedSearchResident() // Reset trang khi tìm kiếm cư dân
    {
        $this->resetPage();
    }

    public function render()
    {
        // Lấy zone dựa trên slug
        $zone = Zone::where('slug', $this->slug)->firstOrFail();

        // Lấy danh sách phòng thuộc zone này với tìm kiếm
        $rooms = Room::where('zone_id', $zone->id)
            ->where('title', 'like', '%' . $this->searchResident . '%') // Tìm kiếm theo tên phòng
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage); // Sử dụng biến $perPage để phân trang

        // Kiểm tra nếu có phòng trước khi lấy danh sách cư dân
        $roomIds = $rooms->pluck('id'); // Lấy danh sách ID phòng

        // Lấy danh sách người ở (residents) thuộc zone này với tìm kiếm
        $residents = Resident::whereIn('room_id', $roomIds)
            ->where('zone_id', $zone->id)
            ->where('status', $this->status) // Chỉ lấy resident có status = 2
            // ->whereHas('user', function($query) {
            //     $query->where('name', 'like', '%' . $this->searchResident . '%'); // Tìm kiếm theo tên cư dân
            // })
            ->paginate($this->perPage); // Sử dụng biến $perPage để phân trang

        return view('livewire.zone-detail', [
            'user_is_in' => self::user_is_in, // Trả về hằng số user_is_in
            'zone' => $zone, // Trả về biến $zone
            'rooms' => $rooms, // Trả về danh sách phòng
            'residents' => $residents, // Trả về danh sách cư dân
        ]);
    }
}