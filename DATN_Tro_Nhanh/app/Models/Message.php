<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['sender_id', 'message','contact_id', 'is_read',];
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    // Mối quan hệ với User
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
