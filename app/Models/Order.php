<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'payment_id',
        'total_qty',
        'total_amt',
        'first_name',
        'phone_no',
        'last_name',
        'capital',
        'district',
        'township',
        'address',
        'status',
        'payment_image',
        'order_no',
        'note',
        'package_ids',
        'package_prices'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
