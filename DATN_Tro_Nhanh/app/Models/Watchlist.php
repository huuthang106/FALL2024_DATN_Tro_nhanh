<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Watchlist extends Model
{
    use HasFactory;

    protected $table = 'watch_lists'; // Đặt tên bảng là 'watch_list'
    protected $fillable = ['user_id', 'follower', 'status'];
    public function personBeingFollowed()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function followe()
    {
        return $this->belongsTo(User::class);
    }
}
