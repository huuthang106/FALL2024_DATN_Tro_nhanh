<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentZones extends Model
{
    use HasFactory;
    protected $table = 'comment_zones';
    protected $fillable = [
        'user_id',
        'zone_id',
        'content',
        'rating',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
