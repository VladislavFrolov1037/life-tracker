<?php

namespace App\Http\Resources\Workout;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutResource extends JsonResource
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
            'type' => $this->type,
            'date' => $this->date,
            'feeling' => $this->feeling,
            'notes' => $this->notes,
            'workoutExercises' => WorkoutExerciseResource::collection($this->whenLoaded('workoutExercises')),
        ];
    }
}
