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

  public function setWhereId(int $id): AppointmentRepository
  {
    $this->query = $this->query->where('id', $id);
    return $this;
  }

  public function setWhereUserId(int $userId): AppointmentRepository
  {
    $this->query = $this->query->where('user_id', $userId);
    return $this;
  }
}
