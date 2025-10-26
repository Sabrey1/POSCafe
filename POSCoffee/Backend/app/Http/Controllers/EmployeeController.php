<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return response()->json($employees);
    }
    public function create(){
        //
    }
    public function store(){
        //
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
