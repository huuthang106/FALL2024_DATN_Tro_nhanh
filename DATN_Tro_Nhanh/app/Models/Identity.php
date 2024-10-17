<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Identity extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'identity'; 
    protected $fillable = [
        'name',
        'identification_number',
        
        'status',
        'user_id',
        'deleted_at',
        'created_at',
        'updated_at',
        'front_id_card_image',
        'back_id_card_image',   
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
   
}
