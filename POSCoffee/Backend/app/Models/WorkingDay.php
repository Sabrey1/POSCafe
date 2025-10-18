<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkingDay extends Model
{
     protected $fillable = [
        'working_date',
        'description',
    ];

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
