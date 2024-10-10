<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class ListRoomClient extends Component
{
    use WithPagination;

    public $search;
    public $province;
    public $district;
    public $village;
    public $category; // Thêm biến này
    public $features;
    public $perPage = 8;
    public $sortBy = 'default';
    public $type;
    protected const HIEN_THI = 2;

    protected $queryString = ['search', 'province', 'district', 'village', 'category', 'type', 'features']; // Thêm 'category' vào đây




    // protected $queryString = ['search', 'province', 'district', 'village',];
    public function render()
    {
        $query = Room::join('users', 'rooms.user_id', '=', 'users.id')
            ->where('rooms.status', self::HIEN_THI)
            ->withCount('images');


        // Lọc theo loại phòng
        if (!empty($this->type)) { // Kiểm tra nếu $this->type không rỗng
            $query->whereHas('category', function ($q) {
                $q->where('name', $this->type);
            });
        }

        // Tìm kiếm theo tiêu đề, mô tả, địa chỉ
        if (!empty($this->search)) { // Kiểm tra nếu $this->search không rỗng
            $query->where(function ($q) {
                $q->where('rooms.title', 'like', '%' . $this->search . '%')
                    ->orWhere('rooms.description', 'like', '%' . $this->search . '%')
                    ->orWhere('rooms.address', 'like', '%' . $this->search . '%');
            });
        }

        // Lọc theo tỉnh, huyện, xã
        if (!empty($this->province)) { // Kiểm tra nếu $this->province không rỗng
            $query->where('rooms.province', $this->province);
        }
        if (!empty($this->district)) { // Kiểm tra nếu $this->district không rỗng
            $query->where('rooms.district', $this->district);
        }
        if (!empty($this->village)) { // Kiểm tra nếu $this->village không rỗng
            $query->where('rooms.village', $this->village);
        }

        // Lọc theo category
        if (!empty($this->category)) { // Kiểm tra nếu $this->category không rỗng
            $query->where('rooms.category_id', $this->category);
        }

        // Lọc theo tiện ích
        if (!empty($this->features)) { // Kiểm tra nếu $this->features không rỗng
            $query->whereHas('utility', function ($q) {
                foreach ($this->features as $feature) {
                    if ($feature === 'bathroom') {
                        $q->where('bathrooms', '>', 0); // Kiểm tra nếu bathrooms > 0
                    } elseif ($feature === 'wifi') {
                        $q->where('wifi', '>', 0); // Kiểm tra nếu wifi > 0
                    } elseif ($feature === 'air_conditioning') {
                        $q->where('air_conditioning', '>', 0); // Kiểm tra nếu air_conditioning > 0
                    } elseif ($feature === 'garage') {
                        $q->where('garage', '>', 0); // Kiểm tra nếu garage > 0
                    }
                }
            });
        }
        // Log::info('tim được tiện ích: ' . $this->features);
        // Sắp xếp theo ngày hết hạn
        $query->orderByRaw('CASE WHEN rooms.expiration_date > NOW() THEN 1 ELSE 0 END DESC');

        // Sắp xếp theo giá
        switch ($this->sortBy) {
            case 'price_asc':
                $query->orderBy('rooms.price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('rooms.price', 'desc');
                break;
            default:
                $query->orderBy('rooms.created_at', 'desc');
                break;
        }

        $rooms = $query->paginate($this->perPage);
        $categories = Category::all(); // Lấy tất cả categories

        return view('livewire.list-room-client', [
            'rooms' => $rooms,
            'categories' => $categories // Truyền categories vào view
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
