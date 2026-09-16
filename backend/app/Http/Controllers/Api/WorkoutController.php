<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Workout;
use App\Services\Workout\WorkoutService;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function __construct(private readonly WorkoutService $workoutService)
    {
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Workout $workout)
    {
        //
    }

    public function update(Request $request, Workout $workout)
    {
        //
    }

    public function destroy(Workout $workout)
    {
        //
    }
}
