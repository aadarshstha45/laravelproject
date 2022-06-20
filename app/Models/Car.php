<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'car_name','car_brand_id','plate_no','minimum_charge','charge_per_km','seat_capacity','fuel_type','logo','stock',
    ];
    public function car_brand(){
        return $this->belongsTo(CarBrand::class);
    }
    use HasFactory;
}
