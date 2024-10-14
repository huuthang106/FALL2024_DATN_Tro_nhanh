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
        'bill_id',
        'description',
        'balance',
        'added_funds',
        'status',
        
        // Thêm các thuộc tính khác nếu cần
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
