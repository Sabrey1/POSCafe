<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_code',
        'name',
        'email',
        'phone',
        'address',

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
