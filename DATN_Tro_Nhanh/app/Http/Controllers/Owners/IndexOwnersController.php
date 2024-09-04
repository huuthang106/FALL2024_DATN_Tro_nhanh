<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BillService;

class IndexOwnersController extends Controller
{
    //
    protected $BillService;

    public function __construct(BillService $BillService)
    {
        $this->BillService = $BillService;
    }
    public function indexInvoice()
    {
        $bills = $this->BillService->getCurrentUserBills();

        // Truyền dữ liệu bills sang view
        return view('owners.show.dashboard-invoice-listing', compact('bills'));
    }

    public function editInvoice()
    {
        return view('owners.edit.dashboard-edit-invoice');
    }
    public function createInvoice()
    {
        return view('owners.create.dashboard-add-new-invoice');
    }
    public function previewInvoice($id)
    {
        // Gọi hàm getBillBySlug từ BillService
        $data = $this->BillService->getBillBySlug($id);

        if (!$data['bill']) {
            // Xử lý nếu không tìm thấy bill
            abort(404, 'Không tìm thấy bill');
        }
        return view('owners.show.dashboard-preview-invoice', [
            'bill' => $data['bill'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'name' => $data['name'],
            'address' => $data['address'],
            'totalAmount' => $data['totalAmount']
        ]);
    }

    public function pay(Request $request, $billId)
    {
        // Gọi hàm processPayment từ service
        $result = $this->BillService->processPayment($billId);

        // Kiểm tra kết quả từ service
        if ($result['success']) {
            // Redirect hoặc trả về thông báo thành công
            return redirect()->route('owners.invoice-listing')->with('success', 'Thanh toán thành công');
        }

        // Xử lý nếu không thành công
        return redirect()->back()->with('error', 'Thanh toán thất bại.');
    }
}
