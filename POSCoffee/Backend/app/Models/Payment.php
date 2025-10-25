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
        'payment_method',
        'payment_status',
        'payment_amount',
        'note',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
