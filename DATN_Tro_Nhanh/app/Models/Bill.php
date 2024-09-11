<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'bills'; // Đặt tên bảng là 'bills'
    protected $fillable = [
        'creator_id',
        'payer_id',
        'payment_date',
        'amount',
        'description',
        'title',
        'status',
        'payment_due_date'
    ];
       
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function payer()
    {
        return $this->belongsTo(User::class, 'payer_id');
    }
}
