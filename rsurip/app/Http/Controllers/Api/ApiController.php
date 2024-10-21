<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Terdaftar successfully',
        ]);
    }

    public function login(Request $request)
    {

        // data validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // JWTAuth
        $token = JWTAuth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (! empty($token)) {

            return response()->json([
                'status' => true,
                'message' => 'User logged in succcess',
                'token' => $token,
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Invalid details',
        ]);
    }

    // User Profile (GET)
    public function profile()
    {

        $userdata = auth()->user();

        return response()->json([
            'status' => true,
            'message' => 'Profile data',
            'data' => $userdata,
        ]);
    }

    // To generate refresh token value
    public function refreshToken()
    {

        $newToken = auth()->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Token Baru',
            'token' => $newToken,
        ]);
    }

    // User Logout (GET)
    public function logout()
    {

        auth()->logout();

        return response()->json([
            'status' => true,
            'message' => 'User logged out success',
        ]);
    }
}
