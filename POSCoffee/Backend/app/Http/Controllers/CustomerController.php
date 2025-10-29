<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        return response()->json(Customer::all());
    }
    public function store(Request $request){
         $request->validate([
            'customer_code' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        
        $customer = Customer::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Customer created successfully',
            'customer' => $customer
        ]);
    }
    public function update(Request $request, $id){
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json([
                'message' => 'Customer not found'
            ]);
        }else{
            $customer->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Customer updated successfully',
                'customer' => $customer
            ]);
        }
       
    }
    public function destroy($id){
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json([
                'message' => 'Customer not found'
            ], 404);
        }
        $customer->delete();
        return response()->json([
            'success' => true,
            'message' => 'Customer deleted successfully'
        ]);
        
    }

}
