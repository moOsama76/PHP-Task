<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function getAllUsers(){
        return User::all();
    }

    function createUser(Request $request){
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email',
        //     'password' => 'required|string|min:6',
        // ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    function deleteUser($userId){
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    function updateUser(Request $request, $userId){
        $user = User::find($userId);
        if ($user) {
            // $request->validate([
            //     'name' => 'required|string|max:255',
            //     'email' => 'required|email',
            //     'password' => 'required|string|min:6',
            // ]);
    
            $user->update([
                'name' => $request->input('name'),
            ]);
            
            return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
        } 
        return response()->json(['message' => 'User not found'], 404);

    }
}
