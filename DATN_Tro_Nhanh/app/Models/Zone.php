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
        'status',
        'slug',
        'user_id',
        'category_id',
        'wifi',
        'air_conditioning',
        'garage',
        'bathrooms',
        'phone',
        'created_at',
        'updated_at',
        'deleted_at',
        'vip_expiry_date',
        'type_vip',
        'view',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
    // public function images()
    // {
    //     return $this->hasMany(Image::class);
    // }
    public function utilities()
    {
        return $this->hasMany(Utility::class, 'zone_id');
    }
    public function utility()
    {
        return $this->hasOne(Utility::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
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
