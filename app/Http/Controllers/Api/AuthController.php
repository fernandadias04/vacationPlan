<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->only(
            [
                'email',
                'password',
                'device_name'
            ]
        );

        $user = User::Where('email', $request->email)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'The credentials are incorets'
            ]);
        }


        $token =  $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }
}
