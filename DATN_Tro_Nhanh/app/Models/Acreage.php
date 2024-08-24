<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Acreage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'name',
         'min_size',
          'max_size',
          'status',
          'deleted_at',
          'created_at',
          'updated_at' ,
    ];
    public function room()
    {
        return $this->hasMany(Room::class, 'room_id');
    }
}
