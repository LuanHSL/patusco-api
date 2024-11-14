<?php

namespace App\Services;

use App\Constants\RoleTypeConst;
use App\DTOs\UserDto;
use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Support\Collection;

class UserService
{
  public function __construct(
    private readonly IUserRepository $repository
  ) {}

  public function getDoctors(): Collection
  {
    return $this->repository
      ->setWhereRole(RoleTypeConst::DOCTOR)
      ->getOrThrow()
      ->map(function (User $user) {
        return new UserDto(id: $user->id, name: $user->name, role: null);
      });
  }
}
