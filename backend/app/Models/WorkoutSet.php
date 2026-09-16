<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['weight', 'repetitions', 'set_number', 'workout_exercise_id'])]
class WorkoutSet extends Model
{
}
