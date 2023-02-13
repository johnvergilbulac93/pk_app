<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }
        $result =  [
            'token' => $user->createToken('Peanut Kisses')->plainTextToken,
            'user' => $user
        ];
        return response()->json(
            [
                "message" => 'Login Successfully',
                "data" => $result
            ],
            200
        );
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    }

    public function auth_user()
    {
        $user = new UserResource(Auth::user());
        return response()->json(
            [
                "message" => '_AUTH_USER',
                "data" => $user
            ],
            200
        );
    }
}
