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

    public function store(Request $request){
        $request->validate([
            'category_code' => 'required',
            'name' => 'required',

        ]);

        $categories = Category::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'category' => $categories
        ]);
    }

    public function show($id){
        $categories = Category::find($id);
        return response()->json($categories);
    }

    public function update($id, Request $request){
        $categories = Category::find($id);
        if(!$categories){
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ]);
        }
        else{
            $categories->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully',
                'category' => $categories
            ]);
        }

    }

    public function destroy($id){
        $categories = Category::find($id);
        if(!$categories){
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ]);
        }
        else{
            $categories->delete();
            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully'
            ]);
        }
    }

}
