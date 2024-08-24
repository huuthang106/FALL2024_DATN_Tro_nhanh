<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'status', 'parent_id', 'slug'];
    // Thiết lập mối quan hệ one-to-many với Room
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
