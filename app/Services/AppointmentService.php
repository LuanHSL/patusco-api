<?php

namespace App\Services;

use App\DTOs\AppointmentDto;
use App\Repositories\Interfaces\IAppointmentRepository;

class AppointmentService
{
  public function __construct(
    private readonly IAppointmentRepository $repository
  ) {}

  public function create(AppointmentDto $dto)
  {
    return $this->repository->createOrThrow($dto->toModel());
  }
}
