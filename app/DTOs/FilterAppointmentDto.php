<?php

namespace App\DTOs;

class FilterAppointmentDto
{
  public function __construct(
    public ?string $animalType = null,
    public ?string $date = null
  ) {}
}
