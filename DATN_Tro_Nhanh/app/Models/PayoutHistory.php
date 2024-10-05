<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayoutHistory extends Model
{
    protected $table = 'payout_history'; // Chỉ định tên bảng

    protected $fillable = [
        'user_id',
        'amount',
        'bank_name',
        'account_number',
        'card_holder_name',
        'status',
        'description',
        'requested_at'
    ];

    protected $casts = [
        'requested_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}