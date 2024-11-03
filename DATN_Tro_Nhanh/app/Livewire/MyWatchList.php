<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Watchlist;
use Carbon\Carbon;

class MyWatchList extends Component
{
    // public function render()
    // {
    //     return view('livewire.my-watch-list');
    // }
    use WithPagination;
    public $userId;
    public $limit = 10;
    public $search = '';
    public $timeFilter = '';
    public function mount($id)
    {
        $this->userId = $id;
    }
    public function render()
    {
        $query = WatchList::where('follower', $this->userId)
            ->with('followedUser');

        if ($this->search) {
            $query->whereHas('followedUser', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->timeFilter) {
            $startDate = Carbon::now();
            switch ($this->timeFilter) {
                case '1_day':
                    $startDate = Carbon::now()->subDay()->startOfDay();
                    break;
                case '7_day':
                    $startDate = Carbon::now()->subDays(7)->startOfDay();
                    break;
                case '1_month':
                    $startDate = Carbon::now()->subMonth()->startOfDay();
                    break;
                case '3_month':
                    $startDate = Carbon::now()->subMonths(3)->startOfDay();
                    break;
                case '6_month':
                    $startDate = Carbon::now()->subMonths(6)->startOfDay();
                    break;
                case '1_year':
                    $startDate = Carbon::now()->subYear()->startOfDay();
                    break;
            }
            $query->where('created_at', '<=', $startDate);
        }

        $myFollowings = $query->orderBy('created_at', 'desc')->paginate($this->limit);

        return view('livewire.my-watch-list', [
            'myFollowings' => $myFollowings,
        ]);
    }
    public function xoaNguoiTheoDoi($idNguoiTheoDoi)
    {
        $nguoiTheoDoi = WatchList::where('follower', $this->userId)
            ->where('id', $idNguoiTheoDoi)
            ->first();

        if ($nguoiTheoDoi) {
            $nguoiTheoDoi->delete();
            session()->flash('thongBao', 'Đã xóa người theo dõi thành công.');
        } else {
            session()->flash('loiThongBao', 'Không tìm thấy người theo dõi để xóa.');
        }
    }
}
