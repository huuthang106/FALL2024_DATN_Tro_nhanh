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

    protected static function booted()
    {
        // Sự kiện tạo mới record
        static::creating(function ($table) {
            // Kiểm tra nếu chưa có giá trị single_code thì tự động tạo
            if (empty($table->single_code)) {
                $table->single_code = '#' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            }
        });
    }
}