<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentType extends Model
{
    use HasFactory;

    protected $table = 'payment_type';

    protected $fillable = [
        'name',
        'description',
        'note'
    ];

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
