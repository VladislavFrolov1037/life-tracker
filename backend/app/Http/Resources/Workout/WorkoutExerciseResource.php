<?php

namespace App\Http\Resources\Workout;

use App\Http\Resources\Exercise\ExerciseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutExerciseResource extends JsonResource
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
            'exercise' => new ExerciseResource($this->whenLoaded('exercise')),
            'sets' => WorkoutExerciseSetResource::collection($this->whenLoaded('sets')),
        ];
    }
}
