<?php

namespace App\Services;

use App\Models\User;
use App\Models\Workout;
use Illuminate\Support\Facades\DB;

class WorkoutService
{
    public function createWorkout(User $user, array $data): Workout
    {
        return DB::transaction(function () use ($user, $data) {
            $workout = $user->workouts()->create([
                'type' => $data['type'],
                'date' => $data['date'],
                'feeling' => $data['feeling'] ?? null,
                'notes' => $data['notes'] ?? null,
            ]);

            // todo Сделать создание без n+1
            foreach ($data['exercises'] as $exercise) {
                $workoutExercise = $workout->workoutExercises()->create([
                    'exercise_id' => $exercise['exercise_id'],
                ]);

                foreach ($exercise['sets'] as $set) {
                    $workoutExercise->sets()->create([
                        'weight' => $set['weight'],
                        'repetitions' => $set['repetitions'],
                        'set_number' => $set['set_number'],
                    ]);
                }
            }

            return $workout->load([
                'workoutExercises.sets',
                'workoutExercises.exercise',
            ]);
        });
    }

    public function updateWorkout(array $data, Workout $workout): Workout
    {
        return DB::transaction(function () use ($data, $workout) {
            $workout->update([
                'type' => $data['type'],
                'date' => $data['date'],
                'feeling' => $data['feeling'] ?? null,
                'notes' => $data['notes'] ?? null,
            ]);

            $workout->workoutExercises()->delete();

            // TODO fix duplicate
            foreach ($data['exercises'] as $exercise) {
                $workoutExercise = $workout->workoutExercises()->create([
                    'exercise_id' => $exercise['exercise_id'],
                ]);

                foreach ($exercise['sets'] as $set) {
                    $workoutExercise->sets()->create([
                        'weight' => $set['weight'],
                        'repetitions' => $set['repetitions'],
                        'set_number' => $set['set_number'],
                    ]);
                }
            }

            return $workout->load([
                'workoutExercises.sets',
                'workoutExercises.exercise',
            ]);
        });
    }
}
