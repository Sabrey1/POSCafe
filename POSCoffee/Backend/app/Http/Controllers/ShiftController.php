<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::all();
        return response()->json($shifts);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'shift_code'=> 'required',
            'name' => 'required',
        ]);
        $shift = Shift::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Shift created successfully',
            'shift' => $shift
        ]);
    }
    public function show($id)
    {
        $shift = Shift::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Shift retrieved successfully',
            'shift' => $shift
        ]);
    }
    public function update(Request $request,$id)
    {
        $shift = Shift::find($id);
        if(!$shift){
            return response()->json([
                'success' => false,
                'message' => 'Shift not found'
            ]);
        }else{
            $shift->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Shift updated successfully',
                'shift' => $shift
            ]);
        }
    }
    public function destroy($id)
    {
        $shift = Shift::find($id);
        if(!$shift){
            return response()->json([
                'success' => false,
                'message' => 'Shift not found'
            ]);
        }else{
            $shift->delete();
            return response()->json([
                'success' => true,
                'message' => 'Shift deleted successfully'
            ]);
        }
    }
}
