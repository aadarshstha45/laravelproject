<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'roomNo','room_categories_id','images','status','price','addedBy'
    ];
    public function room_category(){
        return $this->belongsTo(RoomCategory::class,'room_categories_id');
    }
    public function addedBy(){
        return $this->belongsTo(User::class,'addedBy');
    }
    use HasFactory;
}
