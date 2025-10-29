<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   use HasFactory;
   protected $fillable = ['customer_code', 'name', 'email', 'phone','gender','address','status','customer_type','country','owner','note'];

   public function orders(){
        return $this->hasMany(Order::class);
   }
}
