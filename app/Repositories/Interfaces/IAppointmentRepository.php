<?php

namespace App\Repositories\Interfaces;

interface IAppointmentRepository
{
  public function setWhereId(int $id): IAppointmentRepository;
  public function setWhereUserId(int $userId): IAppointmentRepository;
  public function setWhereDate(string $date): IAppointmentRepository;
  public function setWhereAnimalType(string $animalType): IAppointmentRepository;
}
