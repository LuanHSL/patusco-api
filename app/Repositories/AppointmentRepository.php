<?php

namespace App\Repositories;

use App\Models\Appointment;
use App\Repositories\Interfaces\IAppointmentRepository;

class AppointmentRepository extends CoreRepository implements IAppointmentRepository
{
  public function __construct()
  {
    parent::__construct(modelClass: Appointment::class);
  }
}
