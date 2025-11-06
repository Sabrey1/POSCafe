<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingDay;

class WorkingDayController extends Controller
{
    public function index()
    {
        $workingDays = WorkingDay::all();
        return response()->json($workingDays);
    }


    public function store(Request $request)
    {
        $request->validate([
            'working_day_code' => 'required',
            'name' => 'required',
            'date' => 'required',
        ]);

        $workingday = WorkingDay::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Working Day created successfully',
            'workingday' => $workingday
        ]);
    }

     public function show($id)
    {
        $workingday = WorkingDay::find($id);
        return response()->json($workingday);
    }

    public function update(Request $request, $id)
    {
        $workingday = WorkingDay::find($id);
        if(!$workingday){
            return response()->json([
                'success' => false,
                'message' => 'Working Day not found'
            ]);
        }else{
            $workingday->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Working Day updated successfully',
                'workingday' => $workingday
            ]);
        }
    }
    public function destroy($id)
    {
        $workingday = WorkingDay::find($id);
        if(!$workingday){
            return response()->json([
                'success' => false,
                'message' => 'Working Day not found'
            ]);
        }else{
            $workingday->delete();
            return response()->json([
                'success' => true,
                'message' => 'Working Day deleted successfully'
            ]);
        }
    }
}
