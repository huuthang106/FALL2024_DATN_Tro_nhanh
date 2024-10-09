<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;

class PayoutHistoryAdminController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index(){
        $payouts = $this->paymentService->getPayouts();
        return view('admincp.show.show-Payout-History', compact('payouts'));
    }

    public function browsePayout($id){
        $payout = $this->paymentService->transferStatusPayout($id);
        if($payout){
            return redirect()->back()->with('success', 'Duyệt thành công');
        }else{
            return redirect()->back()->with('error', 'Duyệt thất bại');
        }
    }

    public function rejectPayout(Request $request, $payoutID)
    {
        $result = $this->paymentService->rejectPayout($request, $payoutID);

        if ($result) {
            return redirect()->back()->with('success', 'Yêu cầu rút tiền đã bị từ chối thành công.');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi từ chối yêu cầu rút tiền.');
        }
    }
}
