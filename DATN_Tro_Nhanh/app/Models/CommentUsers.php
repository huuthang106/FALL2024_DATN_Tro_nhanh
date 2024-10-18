<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentUsers extends Model
{
    use HasFactory;
    protected $table = 'comment_user';
    protected $fillable = [
        'user_id', // ID của người dùng đã bình luận
       
        'content', // Nội dung bình luận
        'rating', // Đánh giá
        'commented_user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function room()
    // {
    //     return $this->belongsTo(Room::class);
    // }
    // public function blog()
    // {
    //     return $this->belongsTo(Blog::class);
    // }
   
}
