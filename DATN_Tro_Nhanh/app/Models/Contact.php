<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'contact_user_id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the contact user.
     */
// app/Models/Contact.php

public function contactUser()
{
    return $this->belongsTo(User::class, 'contact_user_id');
}


    /**
     * Get the messages for the contact.
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'contact_id');
    }
    // Trong model Contact
public function updateLastMessageTime()
{
    $this->last_message_time = now();
    $this->save();
}

public function latestMessage()
{
    return $this->hasOne(Message::class)->latest();
}
}
