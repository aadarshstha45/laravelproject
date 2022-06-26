<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category'
    ];
    public function room(){
        return $this->hasMany(Room::class);
    }

}

