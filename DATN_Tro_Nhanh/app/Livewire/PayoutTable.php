<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PayoutHistory;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Transaction;
use App\Models\User;

class PayoutTable extends Component
{
    use WithPagination;
    public $confirmingDelete = false;
    public $payoutToDelete;
    public $perPage = 5;
    public $search = '';
    public $sortBy = 'date_new_to_old';
    public $orderBy = 'requested_at';
    public $timeFilter = '';
    public $hasData = true;
    protected $queryString = ['search', 'sortBy', 'perPage'];
    public function confirmDelete($payoutId)
    {
        $this->confirmingDelete = true;
        $this->payoutToDelete = $payoutId;
    }
    public function render()
    {
        $query = PayoutHistory::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('single_code', 'like', '%' . $this->search . '%')
                    ->orWhere('bank_name', 'like', '%' . $this->search . '%');
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

        $payouts = $query->paginate($this->perPage);

        $this->hasData = $payouts->total() > 0;

        return view('livewire.payout-table', [
            'payouts' => $payouts,
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingTimeFilter()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->orderBy === $field) {
            $this->orderAsc = !$this->orderAsc;
        } else {
            $this->orderAsc = true;
        }
        $this->orderBy = $field;
    }


    public function deletePayout($payoutId)
    {
        try {
            $payout = PayoutHistory::findOrFail($payoutId);
            $payout->status = '3';
            $payout->canceled_at = now();
            $payout->save();
            // nguyen huu thang bo sung + tien lai cho user 
            // Cập nhật số dư của người dùng
            // Truy vấn lại người dùng từ cơ sở dữ liệu
            $user = User::findOrFail(Auth::id()); // Truy vấn lại người dùng từ bảng users
            // Cập nhật số dư của người dùng
            $user->balance += $payout->amount; // Thêm số tiền vào số dư
            $user->save(); // Lưu thay đổi
            
            $transaction = new Transaction();
            $transaction->type = 'Hủy rút tiền';
            $transaction->user_id = Auth::id();
            $transaction->added_funds = $payout->amount;
            $transaction->balance = Auth::user()->balance + $payout->amount;
            $transaction->description = 'Hủy đơn rút tiền có mã đơn là ' . $payout->single_code;
            $transaction->save();

            session()->flash('message', 'Yêu cầu rút tiền đã được hủy thành công.');
            $this->emit('refreshComponent');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra khi hủy yêu cầu rút tiền: ' . $e->getMessage());
        }
    }
}
