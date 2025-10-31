<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Redis;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return response()->json($employees);
    }
    public function show( $id){
        $employees = Employee::find($id);
        return response()->json($employees);
    }
    public function store(Request $request){
        $request->validate([
           
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $employees = Employee::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Employee created successfully',
            'employee' => $employees
        ]);
    }
    
    public function update($id, Request $request){
        $employee = Employee::find($id);
        if(!$employee){
            return response()->json([
                'success' => false,
                'message' => 'Employee not found'
            ]);
        }else{
            $employee->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Employee updated successfully',
                'employee' => $employee
            ]);
        }
    }
    public function destroy($id){
        $employee = Employee::find($id);
        if(!$employee){
            return response()->json([
                'success' => false,
                'message' => 'Employee not found'
            ]);
        }else{
            $employee->delete();
            return response()->json([
                'success' => true,
                'message' => 'Employee deleted successfully'
            ]);
        }
    }
}
