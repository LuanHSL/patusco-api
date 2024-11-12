<?php

namespace App\DTOs;

class UserDto
{
  public function __construct(
    public int $id,
    public string $name
  ) {}
}
