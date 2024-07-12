<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use  App\Services\ProfileUser\ProfileUserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller implements HasMiddleware
{
    protected $profileUserService;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(ProfileUserServiceInterface $profileUserService)
    {
        $this->profileUserService  = $profileUserService;
    }
    public static function middleware(): array
    {
        return [
            new Middleware('auth:api', except: ['login', 'register'])
        ];
    }
    public function register(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->profileUserService->createProfileUser($validatedData);
        $token = Auth::login($user);
        return response()->json(compact('user', 'token'), 201);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(compact('token'));
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }


    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    // public function refresh()
    // {
    //     return auth()->refresh;
    // }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory->getTTL() * 60
        ]);
    }
}
