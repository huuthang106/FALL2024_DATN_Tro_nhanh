<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'description',
        'status',
        'user_id',
        'room_id',
        'reported_person',
        'zone_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Quan hệ với bảng User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
