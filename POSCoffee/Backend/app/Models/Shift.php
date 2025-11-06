<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Shift extends Model
{
     use HasFactory;

    protected $fillable = [
        'shift_code',
        'name',
        'shift_date',
        'working_day_id',
        'note',
    ];

    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class);
    // }

    public function workingDay()
    {
        return $this->belongsTo(WorkingDay::class, 'working_day_id');
    }

    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
}
