<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return response()->json($orders);
    }
    public function create(){
        //


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
