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

    public function create(){
        //
    }

    public function store(){
        //
    }

    public function edit(){
        // Show the form for editing a product
    }

    public function update(){
        //
    }

    public function destroy(){

    }

}
