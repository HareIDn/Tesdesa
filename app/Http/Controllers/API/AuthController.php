<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Login user dan mendapatkan token.
     */
    public function login(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!Auth::attempt($validatedData)) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed. Please check your credentials.'
            ], 401);
        }
        try {
            $user->update(['is_logged_in' => true]);

            $token = $user->createToken($user->name)->plainTextToken;

            return response()->json([
                'success' => true,
                'user' => $user,
                'access_token' => $token
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Login failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Logout user dan hapus token.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil!',
        ]);
    }

    /**
     * Mendapatkan user yang sedang login.
     */
    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }
}
