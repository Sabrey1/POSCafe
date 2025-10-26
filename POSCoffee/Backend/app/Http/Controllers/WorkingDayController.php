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

    public function create()
    {
        //
    }
    public function store()
    {
        //
    }
    public function edit()
    {
        //
    }
    public function update()
    {
        //
    }
    public function destroy()
    {
        //
    }
}
