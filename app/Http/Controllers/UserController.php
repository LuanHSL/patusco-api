<?php

namespace App\Http\Controllers;

use App\DTOs\CredentialDto;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {}

    public function login(LoginRequest $request)
    {
        try {
            $credentials = new CredentialDto(
                email: $request->email,
                password: $request->password
            );
    
            $token = $this->authService->authenticate($credentials);

            return response()->json(['token' => $token]);
        } catch (JWTException $jWTException) {
            return response()->json(['error' => $jWTException->getMessage()], $jWTException->getCode());
        }
    }
}
