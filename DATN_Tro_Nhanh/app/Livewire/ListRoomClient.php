<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Zone; // Thay đổi từ Room sang Zone
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class ListRoomClient extends Component
{
    use WithPagination;

    public $search;
    public $province;
    public $district;
    public $village;
    public $category;
    public $features;
    public $perPage = 8;
    public $sortBy = 'default';
    public $type;
    protected const HIEN_THI = 2;

    protected $queryString = ['search', 'province', 'district', 'village', 'category', 'type', 'features'];
    public function render()
{
    $query = Zone::with('rooms') // Tải trước mối quan hệ rooms
        ->join('users', 'zones.user_id', '=', 'users.id')
        ->where('zones.status', self::HIEN_THI)
        ->select('zones.*'); // Chỉ định rõ ràng lấy tất cả các cột từ bảng zones

    // Lọc theo loại phòng
    if (!empty($this->type)) {
        $query->whereHas('category', function ($q) {
            $q->where('name', $this->type);
        });
    }

    // Tìm kiếm theo tiêu đề, mô tả, địa chỉ
    if (!empty($this->search)) {
        $query->where(function ($q) {
            $q->where('zones.title', 'like', '%' . $this->search . '%')
                ->orWhere('zones.description', 'like', '%' . $this->search . '%')
                ->orWhere('zones.address', 'like', '%' . $this->search . '%');
        });
    }

    // Lọc theo tỉnh, huyện, xã
    if (!empty($this->province)) {
        $query->where('zones.province', $this->province);
    }
    if (!empty($this->district)) {
        $query->where('zones.district', $this->district);
    }
    if (!empty($this->village)) {
        $query->where('zones.village', $this->village);
    }

    // Lọc theo category
    if (!empty($this->category)) {
        $query->where('zones.category_id', $this->category);
    }

    // Sắp xếp theo ngày hết hạn
    $query->orderByRaw('CASE WHEN zones.vip_expiry_date > NOW() THEN 1 ELSE 0 END DESC');

    $zones = $query->paginate($this->perPage);
    $categories = Category::all();

    return view('livewire.list-room-client', [
        'zones' => $zones,
        'categories' => $categories
    ]);
}

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }
}