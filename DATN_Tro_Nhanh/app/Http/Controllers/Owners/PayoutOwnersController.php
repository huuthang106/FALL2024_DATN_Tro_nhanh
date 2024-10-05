<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Models\Room;
use App\Models\User;
use App\Models\PriceList;
use Illuminate\Support\Facades\Auth;

class PaymentOwnersController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function page_add_invoice()
    {
        return view('owners.create.add-new-invoice');
    }

    public function showRequestPayoutForm()
    {
        return view('owners.create.request-payout');
    }

    public function createPayout(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:0',
            'bank_name' => 'required|string',
            'account_number' => 'required|string',
            'card_holder_name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $data['user_id'] = Auth::id();

        $result = $this->paymentService->createPayout($data);

        if ($result['success']) {
            return redirect()->route('don-rut-tien')->with('success', $result['message']);
        } else {
            return back()->withErrors($result['message'])->withInput();
        }
    }
}