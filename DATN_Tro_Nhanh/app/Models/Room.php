<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
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
    public function comments()
    {
        return $this->hasMany(Comment::class);
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


    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }


    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }


    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function utility()
    {
        return $this->hasOne(Utility::class);
    }
    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
    public function favourites()
    {
        return $this->hasMany(Favourite::class, 'room_id');
    }
    public function isFavoritedByUser($userId)
    {
        return $this->favourites()->where('user_id', $userId)->exists();
    }
}
