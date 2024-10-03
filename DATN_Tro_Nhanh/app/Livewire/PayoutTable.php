<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PayoutHistory;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PayoutTable extends Component
{
    use WithPagination;
    public $confirmingDelete = false;
    public $payoutToDelete;
    public $perPage = 5;
    public $search = '';
    public $orderBy = 'requested_at';
    public $orderAsc = false;
    public $timeFilter = '';
    public $hasData = true;
    protected $queryString = ['search', 'timeFilter', 'orderBy', 'orderAsc'];
    public function confirmDelete($payoutId)
    {
        $this->confirmingDelete = true;
        $this->payoutToDelete = $payoutId;
    }
    public function render()
    {
        $query = PayoutHistory::where('user_id', Auth::id());

        // Xử lý lọc theo thời gian
        if ($this->timeFilter) {
            $startDate = Carbon::now();
            switch ($this->timeFilter) {
                case '1_day':
                    $startDate->subDay();
                    break;
                case '7_day':
                    $startDate->subDays(7);
                    break;
                case '1_month':
                    $startDate->subMonth();
                    break;
                case '3_month':
                    $startDate->subMonths(3);
                    break;
                case '6_month':
                    $startDate->subMonths(6);
                    break;
                case '1_year':
                    $startDate->subYear();
                    break;
            }
            $query->where('requested_at', '>=', $startDate);
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('description', 'like', '%' . $this->search . '%')
                    ->orWhere('bank_name', 'like', '%' . $this->search . '%');
            });
        }

        $payouts = $query->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

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
            $payout->delete();
            session()->flash('message', 'Yêu cầu rút tiền đã được xóa thành công.');
            $this->emit('refreshComponent');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra khi xóa yêu cầu rút tiền: ' . $e->getMessage());
        }
    }
}
