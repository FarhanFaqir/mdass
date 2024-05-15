<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'customer_id',
        'checkin_date',
        'checkin_time',
        'days',
        'hours',
        'adults',
        'childrens',
        'deposite',
        'vehicle_no',
        'checkout_date',
        'checkout_time',
        'reference',
        'description'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function service_order()
    {
        return $this->hasOne(ServiceOrder::class, 'reservation_id');
    }
}
