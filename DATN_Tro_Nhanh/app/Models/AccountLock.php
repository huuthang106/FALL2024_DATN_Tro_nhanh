<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLock extends Model
{
    use HasFactory;

    protected $table = 'account_locks';
    
    protected $fillable = [
        'user_id', 'lock_until', 'lock_reason', 'status'
    ];

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
