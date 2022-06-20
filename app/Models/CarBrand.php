<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $fillable = [
        'brand',
    ];
    public function car(){
        return $this->hasOne(CarBrand::class);
    }
    use HasFactory;
}
