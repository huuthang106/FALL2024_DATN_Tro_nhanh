<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Zone; // Thay đổi từ Room sang Zone
use App\Models\Category;
use App\Models\Room;
use Illuminate\Support\Facades\Log;
use App\Models\Favourite;
use Illuminate\Support\Facades\DB;

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
    public $favouriteCount;
    protected const HIEN_THI = 2;
    public $userLat;
    public $userLng;
    public $radius = 10; // Bán kính tìm kiếm mặc định (km)
    public $minPrice;
    public $maxPrice;
    public $priceRange;
    public $priceRanges;
    protected $queryString = ['search', 'province', 'district', 'village', 'category', 'type', 'features', 'lat', 'lng', 'radius', 'priceRange'];
    protected $listeners = [
        'favoriteUpdated' => 'updateFavouriteCount',
        'updateUserLocation'
    ];
    public function mount()
    {
        $this->favouriteCount = Favourite::where('user_id', auth()->id())->count();
        // 
        $this->userLat = request('lat');
        $this->userLng = request('lng');
        // 
        $this->minPrice = Room::min('price');
        $this->maxPrice = Room::max('price');
        $this->priceRange = $this->minPrice . '-' . $this->maxPrice;
        $this->priceRanges = $this->generatePriceRanges();
    }
    public function updatedPriceRange($value)
    {
        $this->dispatch('priceRangeUpdated', $value);
    }
    private function generatePriceRanges()
    {
        $ranges = [];
        $step = ceil(($this->maxPrice - $this->minPrice) / 5); // Chia thành 5 khoảng

        $ranges[] = ['0-' . $this->minPrice, 'Dưới ' . number_format($this->minPrice, 0, ',', '.') . ' VND'];

        for ($i = $this->minPrice; $i < $this->maxPrice; $i += $step) {
            $ranges[] = [
                $i . '-' . min($i + $step, $this->maxPrice),
                number_format($i, 0, ',', '.') . ' - ' . number_format(min($i + $step, $this->maxPrice), 0, ',', '.') . ' VND'
            ];
        }

        $ranges[] = [$this->maxPrice . '-', 'Trên ' . number_format($this->maxPrice, 0, ',', '.') . ' VND'];

        return $ranges;
    }
    public function updatePriceRange($min, $max)
    {
        $this->priceRange = $min . '-' . $max;
    }
    public function updateUserLocation($lat, $lng)
    {
        $this->userLat = $lat;
        $this->userLng = $lng;
    }
    public function updateFavouriteCount($count)
    {
        $this->favouriteCount = $count;
    }
    public function render()
    {
        // $query = Zone::with('rooms') // Tải trước mối quan hệ rooms
        //     ->join('users', 'zones.user_id', '=', 'users.id')
        //     ->where('zones.status', self::HIEN_THI)
        //     ->select('zones.*'); // Chỉ định rõ ràng lấy tất cả các cột từ bảng zones

        // // Lọc theo loại phòng
        // if (!empty($this->type)) {
        //     $query->whereHas('category', function ($q) {
        //         $q->where('name', $this->type);
        //     });
        // }
        $query = Zone::with('rooms')
            ->join('users', 'zones.user_id', '=', 'users.id')
            ->where('zones.status', self::HIEN_THI)
            ->select('zones.*');
        if ($this->userLat && $this->userLng) {
            $radius = $this->radius ?? 10;
            $query->addSelect(DB::raw("(6371 * acos(cos(radians($this->userLat)) 
            * cos(radians(zones.latitude)) 
            * cos(radians(zones.longitude) - radians($this->userLng)) 
            + sin(radians($this->userLat)) 
            * sin(radians(zones.latitude)))) AS distance"))
                ->orderByRaw("CASE WHEN distance <= $radius THEN 0 ELSE 1 END, distance");
        } else {
            $query->orderBy('created_at', 'desc');
        }
        // Tìm kiếm theo tiêu đề, mô tả, địa chỉ
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('zones.name', 'like', '%' . $this->search . '%')
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
        // Lọc theo khoảng giá
        // if (!empty($this->priceRange)) {
        //     list($minPrice, $maxPrice) = explode('-', $this->priceRange);
        //     $query->whereHas('rooms', function ($q) use ($minPrice, $maxPrice) {
        //         $q->where('price', '>=', $minPrice);
        //         if ($maxPrice !== '') {
        //             $q->where('price', '<=', $maxPrice);
        //         }
        //     });
        // }
        // Lọc theo khoảng giá
        if (!empty($this->priceRange)) {
            list($minPrice, $maxPrice) = explode('-', $this->priceRange);
            $query->whereHas('rooms', function ($q) use ($minPrice, $maxPrice) {
                $q->where('price', '>=', $minPrice)
                    ->where('price', '<=', $maxPrice);
            });
        }
        // Sắp xếp theo ngày hết hạn
        // $query->orderByRaw('CASE WHEN zones.vip_expiry_date > NOW() THEN 1 ELSE 0 END DESC');

        $zones = $query->paginate($this->perPage);

        $categories = Category::all();

        return view('livewire.list-room-client', [
            'zones' => $zones,
            'categories' => $categories,
            'searchRadius' => $this->radius ?? $this->radius,
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice,
            'priceRanges' => $this->priceRanges,
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
