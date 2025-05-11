<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['error' => 'Email atau Password anda tidak ditemukan!'], Response::HTTP_NOT_FOUND);
            }

            if (!Hash::check($request->password, $user->password)) {
                return response()->json(['error' => 'Password yang anda masukkan salah!'], Response::HTTP_UNAUTHORIZED);
            }

            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        $user = $request->user();
        return response()->json(compact('user', 'token'));
    }


    public function logout()
    {
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if ($removeToken) {
            //return response JSON
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil!',
            ]);
        }
    }
}
