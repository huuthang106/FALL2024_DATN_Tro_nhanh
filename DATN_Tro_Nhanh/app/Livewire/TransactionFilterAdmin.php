<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class TransactionFilterAdmin extends Component
{
    // public function render()
    // {
    //     return view('livewire.transaction-filter-admin');
    // }
    public $filterDate;
    public function applyFilter()
    {
        // Logic lọc sẽ được thực hiện trong phương thức render
    }
    public function render()
    {
        $transactions = Transaction::with('user')
            ->orderBy('created_at', 'desc');

        if ($this->filterDate) {
            $transactions->whereDate('created_at', $this->filterDate);
        }

        return view('livewire.transaction-filter-admin', [
            'transactions' => $transactions->get(),
        ]);
    }
}
