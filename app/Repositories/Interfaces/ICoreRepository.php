<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ICoreRepository
{
  public function __invoke(string $model);
  public function init(string $model): void;
  public function resetQueryBuilder(): ICoreRepository;
  public function getOrThrow(): Collection;
  public function createOrThrow(Model $model): Model;
  public function updateOrThrow(int $id, Model $model): Model;
  public function deleteOrThrow(): void;
  public function setWith(array $relationships): ICoreRepository;
  public function existsOrThrow(): bool;
  public function firstOrThrow(): null|Model;
  public function setOrderBy(string $column, string $direction = 'asc'): ICoreRepository;
}
