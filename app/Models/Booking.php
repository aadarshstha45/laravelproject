<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkinDate','checkoutDate','noOfAdults','noOfChildren','user_id','roomNo','charge','status'
    ];


public function bookedby(){
    return $this->belongsTo(User::class,'user_id');

}

public function bookedRoomNo(){
    return $this->belongsTo(Room::class,'roomNo');
}
public function payment(){
    return $this->hasOne(Payment::class);
}


}
