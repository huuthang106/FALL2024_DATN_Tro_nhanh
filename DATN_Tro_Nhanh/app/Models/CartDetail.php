<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $fillable = ['name_price_list', 'description', 'name_location', 'end_date', 'price'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
