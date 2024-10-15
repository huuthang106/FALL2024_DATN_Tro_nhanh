<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\Transaction;

class ShowWithdrawal extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'date_new_to_old';
    public $perPage = 5; // Số lượng kết quả mỗi trang
    protected $queryString = ['search', 'sortBy', 'perPage'];
    public $timeFilter = '';
    protected const naptien = 1;

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingFilterByDate()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $demo = Transaction::where('status', self::naptien)->get();
        // dd($demo);
        $query = Transaction::query()
        ->where('status', self::naptien)
        ->where('description', 'like', '%GD%') // Add this condition
        ->orderBy('created_at', 'desc');

            if ($this->search) {
                $query->where(function ($q) {
                    $q->where('description', 'like', '%' . $this->search . '%')
                        ->orWhere('balance', 'like', '%' . $this->search . '%')
                        ->orWhere('added_funds', 'like', '%' . $this->search . '%')
                        ->orWhereHas('user', function ($q) {
                            $q->where('name', 'like', '%' . $this->search . '%');
                        });
                });
            }

        if ($this->timeFilter) {
            $startDate = Carbon::now();  // Thời gian bắt đầu của bộ lọc

            // \Log::info("Current date before filter: " . Carbon::now()->toDateTimeString());

            // Xử lý bộ lọc thời gian
            switch ($this->timeFilter) {
                case '1_day':
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

            // \Log::info("Lọc dữ liệu trước ngày: " . $startDate->toDateTimeString());

            // Lọc dữ liệu với created_at nhỏ hơn ngày bắt đầu
            $query->whereDate('created_at', '<=', $startDate);

            // Log số lượng bản ghi sau khi lọc
            // \Log::info("Số lượng bản ghi sau khi lọc: " . $query->count());
        }

        $query->orderBy('created_at', 'desc');

        $withdrawal = $query->paginate($this->perPage);

        return view('livewire.show-withdrawal', [
            'withdrawal' => $withdrawal
        ]);
    }
}
