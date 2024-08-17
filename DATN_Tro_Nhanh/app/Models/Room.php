<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'price',
        'phone',
        'address',
        'quantity',
        'longitude',
        'latitude',
        'view',
        'slug',
        'status',
        'user_id',
        'room_type_id',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function acreage()
    {
        return $this->belongsTo(Acreage::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room_type()
    {
        return $this->belongsTo(RoomType::class);
    }
}
