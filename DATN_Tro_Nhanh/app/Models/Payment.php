<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
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
        'status'
    ];

    protected $dates = ['payment_date', 'deleted_at'];

    public function resident()
    {
        return $this->belongsTo(User::class, 'resident_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function payer()
    {
        return $this->belongsTo(User::class, 'payer_id');
    }
}
