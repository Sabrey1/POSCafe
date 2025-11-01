<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_code'=> 'required',
            'name'=> 'required'
        ]);
        $role = Role::create($request->all());
        return response()->json([
            'success' => true,
            'role' => $role,
            'message' => 'Role created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role, $id)
    {
        $role = Role::find($id);
        return response()->json([
            'success' => true,
            'role' => $role,
            'message' => 'Role retrieved successfully'
        ]);
    }

     
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role, $id)
    {
        $role = Role::find($id);
        if(!$role){
            return response()->json([
                'success' => false,
                'message' => 'Role not found'
            ]);
        }
        else{
            $role->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Role updated successfully',
                'role' => $role
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if(!$role){
            return response()->json([
                'success' => false,
                'message' => 'Role not found'
            ]);
        }
        else{
            $role->delete();
            return response()->json([
                'success' => true,
                'message' => 'Role deleted successfully'
            ]);
        }
    }
}
