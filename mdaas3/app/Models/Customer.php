<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'cnic_passport',
        'email',
        'address',
        'city',
        'country',
        'tel_no',
        'mobile',
        'notes',
        'status'
    ];

    public function reservation()
    {
        return $this->hasOne(Reservation::class, 'customer_id');
    }
}
