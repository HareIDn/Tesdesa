<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function loginAPi(){
        $tokens = PersonalAccessToken::all();

        $loggedInUsers = [];

        foreach ($tokens as $token) {
        $user = User::find($token->tokenable_id);

            if ($user) {

                $loggedInUsers[] = [
                    'user' => [
                        'id' => $user->id,
                        'nama_lengkap' => $user->nama_lengkap,
                        'email' => $user->email,
                    ],
                    'token' => $token->token,
                ];
            }
        }

        return response()->json([
            'status' => 'Success',
            'logged_in_users' => $loggedInUsers,
        ], 200);
    }


    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $request->email)->first();

        if(!Auth::attempt($validatedData)) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed. Please check your credentials.'
            ], 401);
        }
        try{
            $user->update(['is_logged_in' => true]);

            $token = $user->createToken($user->nama_lengkap)->plainTextToken;

            return response()->json([
                'success' => true,
                'user' => $user,
                'access_token' => $token
            ], 200);
        }catch(\Exception $e){
            return response()->json([
               'status' => 'Login failed.',
                'error' => $e->getMessage(),
            ],500);
        }

    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => 'No authenticated user found.',
            ], 401);
        }

        try {

            $user->tokens()->delete();

            $user->update(['is_logged_in' => false]);

            return response()->json([
                'status' => 'Logout success!',
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'Logout failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
