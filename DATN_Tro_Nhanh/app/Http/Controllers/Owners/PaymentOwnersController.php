<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Models\Room;
use App\Models\User;
use App\Models\PriceList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentOwnersController extends Controller
{
    //
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
   
    public function page_add_invoice()
    {
        return view('owners.create.add-new-invoice');
    }


    public function submitPayoutRequest(Request $request)
    {
        try {
            $data = $request->validate([
                'bank_code' => 'required|string',
                'account_number' => 'required|string',
                'amount' => 'required|numeric|min:1',
                'card_holder_name' => 'required|string',
                'description' => 'nullable|string',
            ]);
    
            $data['user_id'] = Auth::id();
    
            $result = $this->paymentService->createPayout($data);
    
            if ($result['success']) {
                return response()->json([
                    'success' => true,
                    'message' => 'Yêu cầu rút tiền đã được gửi thành công',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => $result['message'] ?? 'Có lỗi xảy ra khi xử lý yêu cầu',
                ], 400); // Trả về HTTP status code 400 cho lỗi
            }
        } catch (\Exception $e) {
            Log::error('Lỗi trong submitPayoutRequest: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }


    

}
