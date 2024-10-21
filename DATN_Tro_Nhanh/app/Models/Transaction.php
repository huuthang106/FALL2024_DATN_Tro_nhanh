<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

  
    protected $fillable = [
        'user_id',
        'added_funds',       // Số tiền sẽ được lưu dưới dạng decimal
        'type',         // Loại giao dịch
        'description',  // Mô tả
        'balance',      // Số dư
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
