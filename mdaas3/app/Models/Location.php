<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_name',
        'division',
        'district',
        'tehsil',
        'mineral',
        'latitude',
        'longitude',
        'description'
    ];
}
