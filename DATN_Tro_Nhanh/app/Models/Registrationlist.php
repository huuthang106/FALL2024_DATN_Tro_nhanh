<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registrationlist extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'registration_lists'; 
    protected $fillable = [
        'name',
        'description',
        'identification_number',
        'gender',
        'status',
        'user_id',
        'deleted_at',
        'created_at',
        'updated_at',
        
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function imgmember(){
        return $this->hasMany(Imagesmember::class);
    }
}
