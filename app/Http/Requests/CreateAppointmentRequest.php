<?php

namespace App\Http\Requests;

use App\Constants\AnimalTypeConst;
use App\Constants\PeriodConst;
use Illuminate\Foundation\Http\FormRequest;

class CreateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'animalName' => 'required',
            'animalType' => 'required|in:' . implode(',', [AnimalTypeConst::CAT, AnimalTypeConst::DOG]),
            'animalAge' => 'required',
            'prognostic' => 'required',
            'period' => 'required|in:' . implode(',', [PeriodConst::MORNING, PeriodConst::AFTERNOON]),
            'date' => 'required|date',
            'userId' => 'nullable|exists:users,id',
        ];
    }
}
