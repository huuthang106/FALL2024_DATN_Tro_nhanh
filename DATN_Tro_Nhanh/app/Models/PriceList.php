<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceList extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'price_lists';
    protected $fillable = ['location_id', 'price', 'description', 'duration_day', 'status'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
