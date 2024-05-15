<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';
    protected $fillable = [
        'code',
        'food_name',
        'unit',
        'qty',
        'duration',
        'is_ready',
        'cost',
        'price',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(FoodCategory::class);
    }

    public function service_order()
    {
        return $this->hasMany(ServiceOrder::class, 'food_id');
    }
}
