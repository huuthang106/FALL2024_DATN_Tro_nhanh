<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PriceListService;

class PriceListClientController extends Controller
{
    protected $priceListService;

    public function __construct(PriceListService $priceListService)
    {
        $this->priceListService = $priceListService;
    }
    //
    public function index(){
        $locations = $this->priceListService->getLocations();
        $priceLists = $this->priceListService->getAllPriceLists();
        return view('client.show.packages', compact('priceLists', 'locations'));
    }
}
