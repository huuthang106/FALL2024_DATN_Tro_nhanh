<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentZones extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // ID của người dùng đã bình luận
        'zone_id', // ID của khu vực
        'content', // Nội dung bình luận
        'rating', // Đánh giá
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function room()
    // {
    //     return $this->belongsTo(Room::class);
    // }
    // public function blog()
    // {
    //     return $this->belongsTo(Blog::class);
    // }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
