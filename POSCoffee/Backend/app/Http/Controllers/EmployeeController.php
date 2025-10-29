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
    public function edit(){
        // Show the form for editing an employee
    }
    public function update(){
        //
    }
    public function destroy(){
        //
    }
}
