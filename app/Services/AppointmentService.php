<?php

namespace App\Services;

use App\DTOs\AppointmentDto;
use App\DTOs\UserDto;
use App\Models\Appointment;
use App\Repositories\Interfaces\IAppointmentRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AppointmentService
{
  public function __construct(
    private readonly IAppointmentRepository $repository
  ) {}

  public function create(AppointmentDto $dto): Appointment
  {
    return $this->repository->createOrThrow($dto->toModel());
  }

  public function update(AppointmentDto $dto, int $id): Appointment
  {
    return $this->repository->updateOrThrow($id, $dto->toModel());
  }

  public function getAll(): Collection
  {
    return $this->repository
      ->setWith(['user'])
      ->getOrThrow()
      ->map(function (Appointment $appointment) {
        $user = !empty($appointment->user)
          ? new UserDto(id: $appointment->user->id, name: $appointment->user->name)
          : null;
        return new AppointmentDto(
          id: $appointment->id,
          name: $appointment->name,
          email: $appointment->email,
          animalName: $appointment->animal_name,
          animalType: $appointment->animal_type,
          animalAge: $appointment->animal_age,
          prognostic: $appointment->prognostic,
          period: $appointment->period,
          date: new Carbon($appointment->date),
          userId: null,
          user: $user
        );
      });
  }
}
