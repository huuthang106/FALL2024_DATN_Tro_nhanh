<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Watchlist;
use Carbon\Carbon;

class Followings extends Component
{
    use WithPagination;

    public $userId;
    public $limit = 10; // Số lượng bản ghi trên mỗi trang
  
    public $search = ''; // Từ khóa tìm kiếm
    public $timeFilter = ''; // Khoảng thời gian lọc
   
    public function mount($id)
    {
        $this->userId = $id;
    }
    public function render()
    {
        $query = Watchlist::where('user_id', $this->userId)
            ->with('followers');
    
        // Tìm kiếm theo tên
        if ($this->search) {
            $query->whereHas('followers', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        }
    
        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $date = Carbon::now();
            switch ($this->timeFilter) {
                case '1_day':
                    $date->subDays(1);
                    break;
                case '7_day':
                    $date->subDays(7);
                    break;
                case '1_month':
                    $date->subMonth();
                    break;
                case '3_month':
                    $date->subMonths(3);
                    break;
                case '6_month':
                    $date->subMonths(6);
                    break;
                case '1_year':
                    $date->subYear();
                    break;
            }
            $query->where('created_at', '>=', $date); // Lọc theo ngày tạo
        }
    
        // Sắp xếp theo thời gian mới nhất
        $myFollowings = $query->orderBy('created_at', 'desc')->paginate($this->limit);
    
        return view('livewire.followings', [
            'myFollowings' => $myFollowings,
        ]);
    }
    public function deleteFollowing($followingId)
    {
        $watchList = WatchList::where('user_id', $this->userId)
                              ->where('id', $followingId)
                              ->first();

        if ($watchList) {
            $watchList->delete();
            session()->flash('message', 'Đã xóa người theo dõi thành công.');
        } else {
            session()->flash('error', 'Không tìm thấy người theo dõi để xóa.');
        }
    }
}
