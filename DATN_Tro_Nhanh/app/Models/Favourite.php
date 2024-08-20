<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favourite extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'slug',
        'user_id',
        'room_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với bảng rooms
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    
}
