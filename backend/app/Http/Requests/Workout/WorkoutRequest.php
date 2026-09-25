<?php

namespace App\Http\Requests\Workout;

use App\Enums\Workout\WorkoutTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkoutRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required', Rule::enum(WorkoutTypeEnum::class)],
            'date' => ['required', 'date_format:Y-m-d'],
            'feeling' => ['nullable', 'integer', 'between:1,10'],
            'notes' => ['nullable', 'string'],

            'exercises' => ['required', 'array', 'min:1'],
            'exercises.*.exercise_id' => ['required', 'integer'],

            'exercises.*.sets' => ['required', 'array', 'min:1'],
            'exercises.*.sets.*.weight' => ['required', 'numeric', 'min:0'],
            'exercises.*.sets.*.repetitions' => ['required', 'integer', 'min:1'],
            'exercises.*.sets.*.set_number' => ['required', 'integer', 'min:1'],
        ];
    }
}
