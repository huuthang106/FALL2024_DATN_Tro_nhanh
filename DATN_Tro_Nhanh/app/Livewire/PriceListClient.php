<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PriceList;

class PriceListClient extends Component
{
    // public function render()
    // {
    //     return view('livewire.price-list-client');
    // }
    use WithPagination;

    public $perPage = 8;
    public const Nangcaptaikhoan = 1;
    public function render()
    {
        $priceLists = PriceList::where('status', self::Nangcaptaikhoan)->orderBy('created_at', 'desc')->paginate($this->perPage);
        return view('livewire.price-list-client', [
            'priceLists' => $priceLists,
        ]);
    }
}
