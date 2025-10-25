<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  
class Order extends Model
{
     use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
        'note',
    ];

    // 🔗 Relationship: Each order belongs to one customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // 🔗 Relationship: Each order belongs to one product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
