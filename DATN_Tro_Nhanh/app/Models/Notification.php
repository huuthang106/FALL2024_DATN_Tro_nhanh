<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['type', 'data', 'status','user_id','room_id','comment_id','watchlist_id', 'zone_id'];
    public static function send(int $userId, string $message): void
    {
    
        $notification = new self();
        $notification->user_id = $userId;
        $notification->data = $message;  
        $notification->type = 'info';  
        $notification->status = 1; 
        $notification->save();
    }
}
