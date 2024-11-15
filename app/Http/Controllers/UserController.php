<?php

namespace App\Http\Controllers;

use App\DTOs\CredentialDto;
use App\DTOs\UserDto;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Services\UserService;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function __construct(
        private AuthService $authService,
        private UserService $userService
    ) {}

    public function login(LoginRequest $request)
    {
        try {
            $credentials = new CredentialDto(
                email: $request->email,
                password: $request->password
            );
    
            $token = $this->authService->authenticate($credentials);

            $user = auth()->user();

            return response()->json([
                'user' => new UserDto(
                    id: $user->id,
                    name: $user->name,
                    role: $user->role
                ),
                'token' => $token
            ]);
        } catch (JWTException $jWTException) {
            return response()->json(['error' => $jWTException->getMessage()], $jWTException->getCode());
        }
    }

    public function getDoctors()
    {
        $doctors = $this->userService->getDoctors();
        return response()->json($doctors);
    }
}
