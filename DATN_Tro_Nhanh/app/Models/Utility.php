<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'wifi',
        'bathrooms',
        'air_conditioning',
        'garage',
        'created_at',
        'updated_at',
        'deleted_at',
        'room_id',
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
