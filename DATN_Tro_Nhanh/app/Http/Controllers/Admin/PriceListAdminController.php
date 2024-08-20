<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceListRequest;
use App\Services\PriceListService;
use Illuminate\Http\Request;

class PriceListAdminController extends Controller
{
    protected $priceListService;

    public function __construct(PriceListService $priceListService)
    {
        $this->priceListService = $priceListService;
    }

    public function addPriceListForm()
    {
        $locations = $this->priceListService->getLocations();
        return view('admincp.create.addPriceList', compact('locations'));
    }

    public function addPriceList(PriceListRequest $request)
    {
        $result = $this->priceListService->createPriceList($request->validated());
        if ($result) {
            return redirect()->route('admin.danh-sach-bang-gia')->with('success', 'Bảng giá được thêm thành công.');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
        }
    }
    public function listPriceList()
    {
        $locations = $this->priceListService->getLocations();
        $priceLists = $this->priceListService->getAllPriceLists();
        return view('admincp.show.pricelist', compact('priceLists'));
    }

    public function editPriceListForm($id)
    {
        $locations = $this->priceListService->getLocations();
        $priceList = $this->priceListService->getPriceListById($id);
        return view('admincp.edit.updatePriceList', compact('priceList', 'locations'));
    }

    public function updatePriceList($id, PriceListRequest $request)
    {
        $result = $this->priceListService->updatePriceList($id, $request->validated());
        if ($result) {
            return redirect()->route('admin.danh-sach-bang-gia')->with('success', 'Sửa bảng giá thành công.');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra.');
        }
    }
}

