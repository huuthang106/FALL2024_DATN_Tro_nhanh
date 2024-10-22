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
        'address',
        'quantity',
        'longitude',
        'latitude',
        'zone_id',
        'view',
        'image',
        'slug'

    ];

    public function getImagesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    // public function setImagesAttribute($value)
    // {
    //     $this->attributes['images'] = json_encode($value);
    // }
    // Thiết lập mối quan hệ many-to-one với Category
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // public function acreage()
    // {
    //     return $this->belongsTo(Acreage::class, 'acreages_id');
    // }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }




    public function location()
    {
        return $this->belongsTo(Location::class);
    }


    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }


    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
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
        return $this->hasMany(Favourite::class, 'zone_id');
    }
    public function isFavoritedByUser($userId)
    {
        return $this->favourites()->where('user_id', $userId)->exists();
    }
}
