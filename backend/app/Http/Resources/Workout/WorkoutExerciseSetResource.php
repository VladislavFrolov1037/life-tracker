<?php

namespace App\Http\Resources\Workout;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutExerciseSetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'weight' => $this->weight,
            'repetitions' => $this->repetitions,
        ];
    }
}
