<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response()->json($categories);
    }
    public function create(){
        //
    }

    public function store(){
        //
    }

    public function edit(){
        // Show the form for editing a category
    }

    public function update(){
        //
    }

    public function destroy(){
        //
    }

}
