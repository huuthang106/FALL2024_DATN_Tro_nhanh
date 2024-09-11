<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'price_list_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function priceList()
    {
        return $this->belongsTo(PriceList::class, 'price_list_id');
    }

}
