<?php

namespace App\Repositories;

use App\Exceptions\DataBaseException;
use App\Repositories\Interfaces\ICoreRepository;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

  public function createOrThrow(Model $model): Model
  {
    try {
      DB::beginTransaction();

      $saved = $this->query->create($model->toArray());

      DB::commit();
      return $saved;
    } catch (Exception $e) {
      DB::rollBack();
      dd($e);
      throw new DataBaseException('Error saving data');
    }
  }

  public function updateOrThrow(int $id, Model $model): Model
  {
    try {
      DB::beginTransaction();

      $saved = $this->query->find($id);
      $saved->update($model->toArray());

      DB::commit();
      return $saved->refresh();
    } catch (Exception $e) {
      DB::rollBack();
      throw new DataBaseException('Error updating data');
    }
  }

  public function deleteOrThrow(): void
  {
    try {
      $this->query->delete();
    } catch (Exception $exception) {
      throw new DataBaseException('Error deleting data');
    }
  }

  public function setWith(array $relationships): CoreRepository
  {
    $this->query->with($relationships);
    return $this;
  }

  public function existsOrThrow(): bool
  {
    try {
      return $this->query->exists();
    } catch (Exception $exception) {
      throw new DataBaseException('Error getting data');
    }
  }

  public function firstOrThrow(): null|Model
  {
    try {
      return $this->query->first();
    } catch (Exception $exception) {
      throw new DataBaseException('Error getting data');
    }
  }
}
