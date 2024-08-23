<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
    protected $fillable = ['title', 'description', 'slug'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class, 'blog_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
