<?php

namespace App\Repositories\Interfaces;

interface IAppointmentRepository
{
  public function setWhereId(int $id): IAppointmentRepository;
}
