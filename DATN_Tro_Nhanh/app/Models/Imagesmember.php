<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagesmember extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'memberregistration_id'];

    public function registrationList()
    {
        return $this->belongsTo(RegistrationList::class);
    }
}
