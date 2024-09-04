<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'room_id',
        'zone_id',
        'status',
        'start_date',
        'end_date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
