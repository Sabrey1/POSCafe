<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';

    protected $fillable = [
        'order_id',
        'payment_type_id',
        'payment_status',
        'payment_amount',
        'note',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function paymentType()
    {
        return $this->belongsTo(paymentType::class);
    }
}
