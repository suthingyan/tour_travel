<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_name',
        'phone_no',
        'owner_name',
    ];
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}