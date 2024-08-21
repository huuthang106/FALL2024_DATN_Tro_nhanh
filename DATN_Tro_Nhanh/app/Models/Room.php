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
        'acreages_id',
        'price_id',
        'category_id',
        'area_id',
        'location_id',
        'room_type_id',
        'zone_id',
        'user_id',
        'view',
        'slug'
    ];

    // Thiết lập mối quan hệ many-to-one với Category
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function acreage()
    // {
    //     return $this->belongsTo(Acreage::class, 'acreages_id');
    // }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function acreage()
    {
        return $this->belongsTo(Acreage::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'room_id');
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
