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
            id: null,
            name: $request->name,
            email: $request->email,
            animalName: $request->animalName,
            animalType: $request->animalType,
            animalAge: $request->animalAge,
            prognostic: $request->prognostic,
            period: $request->period,
            date: new Carbon($request->date),
            userId: $request->userId,
            user: null
        );

        $this->appointmentService->create($appointment);

        return response()->json(['message' => 'Appointment created successfully'], 201);
    }

    public function update(CreateAppointmentRequest $request, int $id)
    {
        $appointment = new AppointmentDto(
            id: null,
            name: $request->name,
            email: $request->email,
            animalName: $request->animalName,
            animalType: $request->animalType,
            animalAge: $request->animalAge,
            prognostic: $request->prognostic,
            period: $request->period,
            date: new Carbon($request->date),
            userId: $request->userId,
            user: null
        );

        $this->appointmentService->update($appointment, $id);

        return response()->json(['message' => 'Appointment updated successfully'], 200);
    }

    public function index()
    {
        $appointments = $this->appointmentService->getAll();
        return response()->json($appointments);
    }

    public function deleteAll()
    {
        $this->appointmentService->deleteAll();
        return response()->json(['message' => 'All appointments deleted successfully'], 200);
    }

    public function destroy(int $id)
    {
        $this->appointmentService->delete($id);
        return response()->json(['message' => 'Appointment deleted successfully'], 200);
    }

    public function getByUser()
    {
        $appointments = $this->appointmentService->getAll(auth()->user()->id);
        return response()->json($appointments);
    }

    public function updateByUser(CreateAppointmentRequest $request, int $id)
    {
        $isAppointmentForUser = $this->appointmentService->isAppointmentForUser($id, auth()->user()->id);

        if (!$isAppointmentForUser) {
            return response()->json(['message' => 'You do not have permission to update this appointment'], 403);
        }

        $appointment = new AppointmentDto(
            id: null,
            name: $request->name,
            email: $request->email,
            animalName: $request->animalName,
            animalType: $request->animalType,
            animalAge: $request->animalAge,
            prognostic: $request->prognostic,
            period: $request->period,
            date: new Carbon($request->date),
            userId: auth()->user()->id,
            user: null
        );

        $this->appointmentService->update($appointment, $id);

        return response()->json(['message' => 'Appointment updated successfully'], 200);
    }
}
