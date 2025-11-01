<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
 
    public function store(Request $request){
        $request-> validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        
        $product = Product::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'product' => $product
        ]);
    }

    public function show($id){
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id){
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ]);
        }else{
            $product->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully',
                'product' => $product
            ]);
        }
    }

    public function destroy($id){
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ]);
        }else{
            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully',
                'product' => $product
            ]);
        }
    }

}
