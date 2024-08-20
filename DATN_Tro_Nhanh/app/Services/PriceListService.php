<?php

namespace App\Services;

use App\Models\PriceList;
use App\Models\Location;

class PriceListService
{
    public function getLocations()
    {
        return Location::all();
    }
    public function createPriceList(array $data)
    {   
        return PriceList::create($data);
    }

    public function getAllPriceLists()
    {
        return PriceList::all();
    }

    public function getPriceListById($id)
    {
        return PriceList::findOrFail($id);
    }

    public function updatePriceList($id, array $data)
    {
        $priceList = PriceList::findOrFail($id);
        $priceList->update($data);
        return $priceList;
    }
}
