<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        // cho phép thêm hàng loạt dữ liệu Nguyen Huu Thang
        'room_id',
        'filename',
        'blog_id',
       ' memberregistration_id'

    ];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
