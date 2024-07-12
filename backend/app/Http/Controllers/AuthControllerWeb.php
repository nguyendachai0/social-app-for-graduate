<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Services\ProfileUser\ProfileUserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthControllerWeb extends Controller
{
    public  $profileUserService;
    public function __construct(ProfileUserServiceInterface $profileUserService)
    {
        $this->profileUserService  = $profileUserService;
    }
    public function showRegisterView()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(compact('token'));
    }
    public function showLoginView()
    {
        return view('auth.login');
    }
    public function register(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->profileUserService->createProfileUser($validatedData);
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user', 'token'), 201);
    }
}
