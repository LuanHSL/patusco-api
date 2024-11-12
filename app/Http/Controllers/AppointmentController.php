<?php

namespace App\Http\Controllers;

use App\Constants\AnimalTypeConst;
use App\DTOs\AppointmentDto;
use App\Http\Requests\CreateAppointmentRequest;
use App\Services\AppointmentService;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function __construct(
        private AppointmentService $appointmentService
    ) {}

    public function store(CreateAppointmentRequest $request)
    {
        $appointment = new AppointmentDto(
            name: $request->name,
            email: $request->email,
            animalName: $request->animalName,
            animalType: $request->animalType,
            animalAge: $request->animalAge,
            prognostic: $request->prognostic,
            period: $request->period,
            date: new Carbon($request->date),
            userId: $request->userId  
        );

        $this->appointmentService->create($appointment);

        return response()->json(['message' => 'Appointment created successfully'], 201);
    }
}
