<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class ShowWithdrawal extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5; // Số lượng kết quả mỗi trang
    protected $queryString = ['search', 'perPage'];
    protected const naptien = 1;
    public $filterDate;
    public function applyFilter()
    {
        // Logic lọc sẽ được thực hiện trong phương thức render
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function updatingPerPage()
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

        if ($this->filterDate) {
            $query->whereDate('created_at', $this->filterDate);
        } 

        $withdrawal = $query->paginate($this->perPage);

        return view('livewire.show-withdrawal', [
            'withdrawal' => $withdrawal
        ]);
    }
}
