<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository extends CoreRepository implements IUserRepository
{
  public function __construct()
  {
    parent::__construct(modelClass: User::class);
  }

  public function setWhereRole(string $role): UserRepository
  {
    $this->query = $this->query->where('role', $role);
    return $this;
  }
}
