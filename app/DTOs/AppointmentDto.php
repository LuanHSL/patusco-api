<?php

namespace App\DTOs;

use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentDto
{
  public function __construct(
    public ?int $id = null,
    public string $name,
    public string $email,
    public string $animalName,
    public string $animalType,
    public int $animalAge,
    public string $prognostic,
    public string $period,
    public Carbon|string $date,
    public ?int $userId = null,
    public ?UserDto $user = null
  ) {}

  public function toModel(): Appointment
  {
    return new Appointment([
      'name' => $this->name,
      'email' => $this->email,
      'animal_name' => $this->animalName,
      'animal_type' => $this->animalType,
      'animal_age' => $this->animalAge,
      'prognostic' => $this->prognostic,
      'period' => $this->period,
      'date' => $this->date->toDateString(),
      'user_id' => $this->userId
    ]);
  }
}
