<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function sign_up(RegisterRequest $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token,
        ];
        return response($res, 201);

    }
    public function login(LoginRequest $request)
    {
         // login user
         if(!Auth::attempt($request->only('email','password'))){
            Helper::sendError('Email Or Password is wrong !!!');
        }
        // send response
        return new UserResource(auth()->user());

    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'user logged out',
        ];
    }
}
