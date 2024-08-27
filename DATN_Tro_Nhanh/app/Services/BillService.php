<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\BlogCreated;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateBlogRequest;
class BillService
{
    public function getCurrentUserBills()
    {
        // Lấy user hiện tại
        $userId = Auth::id();

        // Lấy tất cả giao dịch của user đó
        return Bill::where('payer_id', $userId)->get();
    }
}
