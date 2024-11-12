<?php

namespace App\Repositories;

use App\Exceptions\DataBaseException;
use App\Repositories\Interfaces\ICoreRepository;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

abstract class CoreRepository implements ICoreRepository
{
  protected Builder $query;

  public function __construct(string $modelClass)
  {
    $this->query = $modelClass::query();
  }

  public function __invoke(string $model): CoreRepository
  {
    $this->query = $model::query();
    return $this;
  }

  public function init(string $model): void
  {
    $this->query = $model::query();
  }

  public function resetQueryBuilder(): CoreRepository
  {
    $this->query = $this->query->getModel()->newQuery();
    return $this;
  }

  public function getOrThrow(): Collection
  {
    try {
      return $this->query->get();
    } catch (Exception $exception) {
      throw new DataBaseException('Error getting data');
    }
  }
}
