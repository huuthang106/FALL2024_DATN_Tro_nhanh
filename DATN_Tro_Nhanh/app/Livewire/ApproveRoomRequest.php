<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Resident;
use Illuminate\Support\Facades\Auth;
use App\Services\ResidentOwnersService;

use Carbon\Carbon;
use Livewire\WithPagination;

class ApproveRoomRequest extends Component
{
    protected const Pending  = 1;
    protected const LIMIT = 10;
    public $search = '';
    public $timeFilter = ''; // Biến để lưu trữ khoảng thời gian lọc
    public $startDate;
    public function render()
    {
        $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập

        // Gọi hàm lấy dữ liệu residents với chức năng tìm kiếm
        $query = Resident::where('residents.status', self::Pending) // Chỉ lấy status từ bảng residents
        ->join('rooms', 'residents.room_id', '=', 'rooms.id') // Kết hợp bảng rooms
        ->join('zones', 'rooms.zone_id', '=', 'zones.id') // Kết hợp bảng zones
        ->where('zones.user_id', $user_id) // Chỉ lấy các zone mà người dùng hiện tại là người tạo
        ->where(function ($query) {
            if ($this->search) {
                $query->where('rooms.title', 'like', '%' . $this->search . '%') // Tìm kiếm theo title trong bảng rooms
                    ->orWhere('residents.room_id', 'like', '%' . $this->search . '%'); // Tìm kiếm theo room_id trong bảng residents
            }
        })
        ->select('residents.*', 'rooms.title as room_title', 'zones.name as zone_name'); // Lấy thêm zone_name
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

        return view('livewire.approve-room-request', [
            'residents' => $residents,
            'user_is_in' => $user_is_in,
        ]);
    }
}
