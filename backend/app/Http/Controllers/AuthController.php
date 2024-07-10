<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileUser;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Validator;
use  App\Services\ProfileUser\ProfileUserServiceInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;


class AuthController extends Controller
{
    protected $profileUserService;

    public function __construct(ProfileUserServiceInterface $profileUserService)
    {
        $this->profileUserService  = $profileUserService;
    }
    public function showRegisterView()
    {
        return view('auth.register');
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
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        session(['jwt_token' => $token]);
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'user_not_found'], 404);
            }
        } catch (JWTException $e) {
            if ($e instanceof HttpException) {
                $statusCode = $e->getStatusCode();
                return response()->json(['error' => 'http_exception', 'status_code' => $statusCode], $statusCode);
            } else {
                return response()->json(['error' => 'token_exception', 'message' => $e->getMessage()], 500);
            }
        }

        return response()->json(compact('user'));
    }
    public function checkAuthentication()
    {
        $user = auth()->user();
        return response()->json(compact('user'));
    }
}
