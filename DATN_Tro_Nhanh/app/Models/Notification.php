<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['type', 'data', 'status', 'user_id', 'room_id', 'comment_id', 'watchlist_id', 'zone_id', 'blog_id'];
    public static function send(int $userId, ?int $blogId = null, string $message): void
    {
        $notification = new self();
        $notification->user_id = $userId;
        $notification->data = $message;
        $notification->type = 'info';
        $notification->blog_id = $blogId; // Lưu blog_id nếu có
        $notification->status = 1;

        $notification->save();
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    // Mối quan hệ với comment
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    // Mối quan hệ với watchlist
    public function watchlist()
    {
        return $this->belongsTo(Watchlist::class);
    }
}
