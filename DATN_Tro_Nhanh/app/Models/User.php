<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use App\Notifications\CustomResetPasswordNotification;

class User extends Authenticatable
{
    use Searchable;
    use HasFactory, Notifiable;

    use SoftDeletes;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'image',
        'slug',
        'province',
        'district',
        'village',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    // public function zones()
    // {
    //     return $this->hasMany(Zone::class);
    // }
    public function commentUsers()
    {
        return $this->hasMany(CommentUsers::class,'user_id');
    }
    public function zones()
    {
        return $this->hasMany(Zone::class, 'user_id'); // Thiết lập mối quan hệ với Zone
    }
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }
    public function comments()
    {
        return $this->hasMany(CommentZones::class, 'user_id');
    }
    // public function receivedComments()
    // {
    //     return $this->hasMany(Comment::class, 'commented_user_id');
    // }
    public function receivedComments()
    {
        return $this->hasMany(CommentZones::class, 'user_id');
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'user_id');
    }

    // Quan hệ với bảng AccountLock
    public function accountLock()
    {
        return $this->hasOne(AccountLock::class, 'user_id');
    }

    public function contactUsers()
    {
        return $this->hasMany(Contact::class, 'contact_user_id');
    }
    /**
     * Get the messages sent or received by the user.
     */
    public function messages()
    {
        return $this->hasManyThrough(
            Message::class,
            Contact::class,
            'user_id', // Foreign key on Contact table
            'contact_id', // Foreign key on Message table
            'id', // Local key on User table
            'id' // Local key on Contact table
        );
    }
    public function identity()
    {
        return $this->hasOne(Identity::class);
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }
}
