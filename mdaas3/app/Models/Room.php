<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_code',
        'floor',
        'capacity',
        'fare',
        'type',
        'is_reserved',
        'image',
        'services',
        'description'
    ];

    public function reservation()
    {
        return $this->hasOne(Reservation::class, 'room_id');
    }
}
