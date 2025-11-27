<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;

class OrderController extends Controller
{
    public function index(){
        $order = Order::all();
        return response()->json($order);
    }

    public function show($id){
        $order = Order::find($id);
        return response()->json($order);
    }

    public function create(){
        $product = Product::all();
        $customer = Customer::all();
        return response()->json([
            'product' => $product,
            'customer' => $customer
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'order_code'=> 'required',
            'product_id'=> 'required',
            'quantity'=> 'required',
            'total'=> 'required',
        ]);

        $order = Order::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Order created successfully',
            'order' => $order
        ]);
    }


    public function update(Request $request, $id){
        $order = Order::find($id);
        if(!$order){
            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ]);
        }else{
            $order->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Order updated successfully',
                'order' => $order
            ]);
        }
    }
    public function destroy($id){
        $order = Order::find($id);
        if(!$order){
            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ]);
        }else{
            $order->delete();
            return response()->json([
                'success' => true,
                'message' => 'Order deleted successfully',
                'order' => $order
            ]);
        }
    }
}
