<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'transactionId','paymentMethod','paidDate','amount','paidBy','created_at'
    ];

    public function user(){
        return $this->belongsTo(User::class,'paidBy');
    }



}
