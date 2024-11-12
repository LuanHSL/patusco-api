<?php

namespace App\Services;

use App\DTOs\CredentialDto;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthService
{
  public function authenticate(CredentialDto $credentialDto): string
  {
    if (!$token = auth()->attempt((array) $credentialDto)) {
      throw new JWTException('Unauthorized', 401);                
    }

    return $token;
  }
}
