<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Workout\WorkoutRequest;
use App\Http\Resources\Workout\WorkoutResource;
use App\Models\Workout;
use App\Services\WorkoutService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class WorkoutController extends Controller
{
    public function __construct(private readonly WorkoutService $workoutService) {}

    public function index(Request $request): AnonymousResourceCollection
    {
        $workouts = Workout::with(['workoutExercises.exercise', 'workoutExercises.sets'])->where('user_id', $request->user()->id);

        return WorkoutResource::collection($workouts->get());
    }

    public function store(WorkoutRequest $request): JsonResponse
    {
        $workout = $this->workoutService->createWorkout($request->user(), $request->validated());

        return response()->json(new WorkoutResource($workout), Response::HTTP_CREATED);
    }

    public function show(Workout $workout): WorkoutResource
    {
        return new WorkoutResource($workout->load(['workoutExercises.sets', 'workoutExercises.Exercise']));
    }

    public function update(WorkoutRequest $request, Workout $workout): JsonResponse
    {
        $workout = $this->workoutService->updateWorkout($request->validated(), $workout);

        return response()->json(new WorkoutResource($workout), Response::HTTP_OK);
    }

    public function destroy(Workout $workout): JsonResponse
    {
        $workout->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
