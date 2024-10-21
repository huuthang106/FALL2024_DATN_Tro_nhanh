<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VipZonePosition extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow Laravel's naming convention
    // protected $table = 'vip_zone_positions';

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'zone_id',
        'location_id',
        'status',
        'end_date',
    ];

    // Define any relationships, e.g., a VipZonePosition belongs to a Zone
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
