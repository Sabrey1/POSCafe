<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::all();
        return response()->json($positions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'position_code'=> 'required',
            'name' => 'required',
        ]);
        $position = Position::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Position created successfully',
            'position' => $position
        ]);
    }

   
    public function show(Position $position, $id)
    {
        $position = Position::find($id);
        return response()->json($position);
    }
 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position, $id)
    {
        $position = Position::find($id);
        if(!$position){
            return response()->json([
                'success' => false,
                'message' => 'Position not found'
            ]);
        }else{
            $position->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Position updated successfully',
                'position' => $position
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position, $id)
    {
        $position = Position::find($id);
        if(!$position){
            return response()->json([
                'success' => false,
                'message' => 'Position not found'
            ]);
        }else{
            $position->delete();
            return response()->json([
                'success' => true,
                'message' => 'Position deleted successfully'
            ]);
        }
    }
}
