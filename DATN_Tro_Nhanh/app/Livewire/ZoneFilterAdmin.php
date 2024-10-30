<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Zone;

class ZoneFilterAdmin extends Component
{
    // public function render()
    // {
    //     return view('livewire.zone-filter-admin');
    // }
    private const Da_Duyet = 2;
    public $filterDate;
    public function applyFilter()
    {
        // Logic lọc sẽ được thực hiện trong phương thức render
    }
    public function render()
    {
        $allZones = Zone::with(['user', 'rooms'])
            ->where('status', self::Da_Duyet)
            ->orderBy('created_at', 'desc');

        if ($this->filterDate) {
            $allZones->whereDate('created_at', $this->filterDate);
        }

        return view('livewire.zone-filter-admin', [
            'allZones' => $allZones->get(),
        ]);
    }
}
