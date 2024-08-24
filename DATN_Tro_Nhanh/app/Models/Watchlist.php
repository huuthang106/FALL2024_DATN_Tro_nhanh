<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Watchlist extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'watch_lists'; // Đặt tên bảng là 'watch_list'

}
