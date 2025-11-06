<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function login(Request $request){
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if($user){
            return response()->json([
            'success' => true,
            'user' => $user,
            'message' => 'Login successfully'
        ]);
        }else{
            return response()->json([
            'success' => false,
            'message' => 'Login failed'
        ]);

        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role_id'=> 'required',
        ]);
        $user = User::create($request->all());
        return response()->json([
            'success' => true,
            'user' => $user,
            'message' => 'User created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $user = User::find($id);
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ]);
        }else{
            $user->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Users updated successfully',
                'users' => $user
            ]);
        }
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ]);
        }
        else{
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully'
            ]);
        }
    }
}
