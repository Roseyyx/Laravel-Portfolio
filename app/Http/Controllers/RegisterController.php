<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(Request $request){

        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $username = User::where('username', $data['username'])->first();
        $email = User::where('email', $data['email'])->first();

        if ($username) {
            return response()->json([
                'message' => 'Username already exists'
            ], 409);
        }

        if ($email) {
            return response()->json([
                'message' => 'Email already exists'
            ], 409);
        }

        $user = User::create($data);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }
}
