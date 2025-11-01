<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $order = Order::all();
        return response()->json($order);
    }
  
    public function store(){
        //
    }
    public function edit(){

        //
    }
    public function update(){
        //
    }
    public function destroy(){
        //
    }
}
