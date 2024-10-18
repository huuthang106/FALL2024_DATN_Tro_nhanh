<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBlogs extends Model
{
    use HasFactory;
    protected $table = 'comment_blog'; 
    protected $fillable = ['content', 'rating', 'user_id', 'room_id', 'parent_id', 'blog_id', 'zone_id', 'commented_user_id' ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
