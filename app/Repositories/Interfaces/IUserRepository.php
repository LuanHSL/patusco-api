<?php

namespace App\Repositories\Interfaces;

interface IUserRepository
{
  public function setWhereRole(string $role): IUserRepository;
}
