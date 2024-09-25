<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use App\Models\Category;

class ListRoomClient extends Component
{
    use WithPagination;

    public $search;
    public $province;
    public $district;
    public $village;
    public $category; // Thêm biến này
    public $perPage = 8;
    public $sortBy = 'default';

    protected $queryString = ['search', 'province', 'district', 'village', 'category']; // Thêm 'category' vào đây


    public function render()
    {
        // $query = Room::join('users', 'rooms.user_id', '=', 'users.id')
        //     ->where('rooms.status', 2)
        //     ->withCount('images');
        $query = Room::join('users', 'rooms.user_id', '=', 'users.id')

            ->where('rooms.status', 2)
            ->withCount('images');


        if ($this->search) {
            $query->where(function ($q) {
                $q->where('rooms.title', 'like', '%' . $this->search . '%')
                    ->orWhere('rooms.description', 'like', '%' . $this->search . '%')
                    ->orWhere('rooms.address', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->province) {
            $query->where('rooms.province', $this->province);
        }
        if ($this->district) {
            $query->where('rooms.district', $this->district);
        }
        if ($this->village) {
            $query->where('rooms.village', $this->village);
        }
        if ($this->category) { // Thêm điều kiện lọc theo category
            $query->where('rooms.category_id', $this->category);
        }

        // Sắp xếp ưu tiên VIP trước

        $query->orderBy('rooms.expiration_date', 'desc')
            ->orderBy('rooms.created_at', 'desc')
            ->orderBy('rooms.view', 'desc');


        // Sau đó sắp xếp theo giá hoặc thời gian tạo
        // switch ($this->sortBy) {
        //     case 'price_asc':
        //         $query->orderBy('rooms.price', 'asc');
        //         break;
        //     case 'price_desc':
        //         $query->orderBy('rooms.price', 'desc');
        //         break;
        //     default:
        //         $query->orderBy('rooms.created_at', 'desc');
        //         break;
        // }
        switch ($this->sortBy) {
            case 'price_asc':
                $query->orderBy('rooms.price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('rooms.price', 'desc');
                break;
                // case 'most_viewed':
                //     $query->orderBy('rooms.view', 'desc');
                //     break;
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