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
}
