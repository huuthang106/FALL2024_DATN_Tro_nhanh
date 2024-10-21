<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Services\ResidentOwnersService;
use App\Models\Resident;
use Carbon\Carbon;
use Livewire\WithPagination;

class JoinRoom extends Component
{
    use WithPagination;
    protected const not_yet_approved = 1; // Hoặc giá trị status mà bạn muốn lọc
    protected const LIMIT = 10; // Hoặc giá trị status mà bạn muốn lọc
    protected $residentOwnersService;
    public $search = '';
    public $timeFilter = ''; // Biến để lưu trữ khoảng thời gian lọc
    public $startDate;
    protected const success = 2;


    public function mount(ResidentOwnersService $residentOwnersService)
    {
        $this->residentOwnersService = $residentOwnersService;
    }
    public function deleteSelectedJoinRoom()
    {
        Resident::whereIn('id', $this->selectedNotifications)->delete();
        $this->selectedNotifications = [];
        $this->dispatch('joinRoom-deleted', ['message' => 'Xóa thành công']);
    }
    public $selectedNotifications = [];
    public function render()
    {
        $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập

        // Gọi hàm lấy dữ liệu residents với chức năng tìm kiếm
        $query = Resident::where('residents.user_id', auth()->id()) // Chỉ định rõ ràng bảng residents
        ->where('residents.status', '!=', self::success)  // Chỉ lấy status từ bảng residents
        ->join('rooms', 'residents.room_id', '=', 'rooms.id') // Kết hợp bảng rooms
        ->join('zones', 'rooms.zone_id', '=', 'zones.id') // Kết hợp bảng zones
        ->where(function ($query) {
            if ($this->search) {
                $query->where('rooms.title', 'like', '%' . $this->search . '%') // Tìm kiếm theo title trong bảng rooms
                    ->orWhere('residents.room_id', 'like', '%' . $this->search . '%'); // Tìm kiếm theo room_id trong bảng residents
            }
        })
        ->select('residents.*', 'rooms.title as room_title', 'zones.name as zone_name'); // Lấy thêm zone_name // Chọn tất cả các trường từ residents và title từ rooms

        if ($this->timeFilter) {
            $startDate = Carbon::now();  // Thời gian bắt đầu của bộ lọc

            // Xử lý bộ lọc thời gian
            switch ($this->timeFilter) {
                case '1_day':
                    // log::info($this->timeFilter);

                    $startDate = Carbon::now()->subDay()->startOfDay();  // Bắt đầu của ngày hôm qua
                    break;
                case '7_day':
                    $startDate = Carbon::now()->subDays(7)->startOfDay();  // Bắt đầu của 7 ngày trước
                    break;
                case '1_month':
                    $startDate = Carbon::now()->subMonth()->startOfDay();  // Bắt đầu của 1 tháng trước
                    break;
                case '3_month':
                    $startDate = Carbon::now()->subMonths(3)->startOfDay();  // Bắt đầu của 3 tháng trước
                    break;
                case '6_month':
                    $startDate = Carbon::now()->subMonths(6)->startOfDay();  // Bắt đầu của 6 tháng trước
                    break;
                case '1_year':
                    $startDate = Carbon::now()->subYear()->startOfDay();  // Bắt đầu của 1 năm trước
                    break;
            }

            // Lọc dữ liệu với updated_at lớn hơn hoặc bằng ngày bắt đầu
            $query->whereDate('residents.created_at', '<=', $startDate);
            // \Log::info(
            //     'Thời gian bắt đầu lọc',
            //     [
            //         'startDate' => $startDate,
            //         'data' => $query,
            //     ]
            // );
            // \Log::info('Truy vấn SQL', ['sql' => $query->toSql(), 'bindings' => $query->getBindings()]);
        }


        $residents = $query->paginate(self::LIMIT); // Sử dụng paginate để phân trang

        // Đặt giá trị cho biến $user_is_in
        $user_is_in = 'some_status_value'; // Giá trị phù hợp của status mà bạn muốn kiểm tra

        return view('livewire.join-room', [
            'residents' => $residents,
            'user_is_in' => $user_is_in,
        ]);
    }
}
