<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ICoreRepository
{
  public function __invoke(string $model);
  public function init(string $model): void;
  public function resetQueryBuilder(): ICoreRepository;
  public function getOrThrow(): Collection;
}
