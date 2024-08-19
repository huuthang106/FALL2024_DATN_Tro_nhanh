<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use HasFactory;
    use SoftDeletes;
   
    protected $fillable = [
        'name',
        'description',
        'address',
        'village',
        'district',
        'province',
        'longitude',
        'latitude',
        'total_rooms',
        'status',
        'slug',
        'user_id',
    ];
}
