<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Acreage extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function room()
    {
        return $this->hasMany(Room::class, 'room_id');
    }
}
