<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'food_id',
        'name',
        'price',
        'qty',
        'discount',
        'sub_total',
        'status'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

}
