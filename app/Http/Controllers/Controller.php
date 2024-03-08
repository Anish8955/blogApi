<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Validator;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    
    public function registeruser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user instance
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Return a success response
        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function loginuser(Request $request)
    {
        
        $this->userValidation($request);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
       
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'user' => $user,
            ]);
        }

        
        return response()->json([
            'status' => false,
            'message' => 'Invalid credentials',
        ], 401); 
    }


    private function userValidation($request)
    {
        $validatedData = Validator::make($request->all(), [
            
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'data' => $validatedData->errors()
            ]);
        }
    }
   

}
