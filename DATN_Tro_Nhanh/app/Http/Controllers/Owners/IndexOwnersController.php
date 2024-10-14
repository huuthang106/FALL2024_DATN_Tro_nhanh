<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BillService;
use Illuminate\Support\Facades\Auth;

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
    $currentUserRole = Auth::user()->role; // Lấy role của user hiện tại
    $bills = $this->BillService->getCurrentUserBills(); // Lấy danh sách hóa đơn của user hiện tại

    // Truyền biến $bills và $currentUserRole sang view
    return view('owners.show.dashboard-invoice-listing', compact('bills', 'currentUserRole'));
    }

    public function indexBill()
    {
    $currentUserRole = Auth::user()->role; // Lấy role của user hiện tại    
    $bills = $this->BillService->getBillsByCreatorId(); // Lấy danh sách hóa đơn của user hiện tại
    // Truyền biến $bills và $currentUserRole sang view
    return view('owners.show.dashboard-invoice-bill', compact('bills', 'currentUserRole'));
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
            'totalAmount' => $data['totalAmount'],
            'status' => $data['bill']->status // Thêm status của bill
        ]);
    }
    

    public function pay(Request $request, $billId)
{
   
    // Gọi hàm processPayment từ service
    $result = $this->BillService->SaveBill($billId);

    // Kiểm tra kết quả từ service
    if ($result['success']) {
        // Redirect hoặc trả về thông báo thành công
        return redirect()->route('owners.invoice-listing')->with('success', 'Thanh toán thành công');
    }

    // Xử lý nếu không thành công
    return redirect()->back()->with('error', 'Số dư không đủ để thanh toán !');
}

}
