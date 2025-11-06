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
        'gender',
        'dob',
        'hire_date',
        'position',
        'salary',
        'email',
        'phone',
        'address',
        'note',

    ];
     public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
