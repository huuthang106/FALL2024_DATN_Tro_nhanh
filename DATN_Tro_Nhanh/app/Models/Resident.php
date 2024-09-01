<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    protected $fillable = [
        'user_id',
        'room_id',
        'zone_id',
        
    ];
}
