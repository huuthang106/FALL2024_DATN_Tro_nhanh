<?php

namespace App\Livewire;

use App\Models\Resident;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class MyMaintenanceOwnerList extends Component
{
    use WithPagination;

    public $timeFilter =''; // Biến để lưu trữ khoảng thời gian lọc
    protected const LIMIT = 10; // Đổi tên hằng số thành chữ hoa
    protected const PARTICIPATED = 2; // Đổi tên hằng số thành chữ hoa
    public $roomIds = []; // Biến để lưu trữ ID của các phòng
    public $totalRooms; // Biến để lưu trữ tổng số phòng
    public $search = '';
    public $startDate;

    public function render()
    {
        $userId = auth()->id(); // Lấy ID của người dùng hiện tại

        // Bắt đầu truy vấn
               // Bắt đầu truy vấn
               $query = Resident::where('residents.tenant_id', auth()->id()) // Chỉ định rõ ràng bảng residents
               ->where('residents.status', self::PARTICIPATED) // Chỉ lấy status từ bảng residents
               ->join('rooms', 'residents.room_id', '=', 'rooms.id') // Kết hợp bảng rooms
               ->where(function ($query) {
                   if ($this->search) {
                       $query->where('rooms.title', 'like', '%' . $this->search . '%') // Tìm kiếm theo title trong bảng rooms
                           ->orWhere('residents.room_id', 'like', '%' . $this->search . '%'); // Tìm kiếm theo room_id trong bảng residents
                   }
               })
               ->select('residents.*', 'rooms.title as room_title'); // Chọn tất cả các trường từ residents và title từ rooms
   
           // Thêm điều kiện lọc theo thời gian nếu có
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
               $query->whereDate('residents.updated_at', '<=', $startDate);
               \Log::info('Thời gian bắt đầu lọc', [
                'startDate' => $startDate,
                'data' => $query,
            ]
        );
        \Log::info('Truy vấn SQL', ['sql' => $query->toSql(), 'bindings' => $query->getBindings()]);
           }
         
           // Lấy danh sách residents mà người dùng đang ở
           $residents = $query->paginate(self::LIMIT); // Sử dụng paginate để phân trang
   
           return view('livewire.my-maintenance-owner-list', [
               'rooms' => $residents, // Truyền danh sách residents đã phân trang vào view
           ]);
    }
}
