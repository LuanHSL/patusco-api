<?php

namespace App\DTOs;

class CredentialDto
{
  public function __construct(
    public string $email,
    public string $password
  ) {}
}
