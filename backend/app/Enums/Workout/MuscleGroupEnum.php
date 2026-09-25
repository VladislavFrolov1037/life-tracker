<?php

namespace App\Enums\Workout;

enum MuscleGroupEnum: string
{
    // Грудь
    case CHEST = 'chest';

    // Спина
    case BACK = 'back';
    case LATS = 'lats';
    case TRAPS = 'traps';
    case LOWER_BACK = 'lower_back';

    // Ноги
    case QUADS = 'quads';
    case HAMSTRINGS = 'hamstrings';
    case CALVES = 'calves';
    case GLUTES = 'glutes';

    // Плечи
    case SHOULDERS = 'shoulders';
    case REAR_DELTS = 'rear_delts';

    // Руки
    case BICEPS = 'biceps';
    case TRICEPS = 'triceps';
    case FOREARMS = 'forearms';

    // Кор
    case ABS = 'abs';
    case OBLIQUES = 'obliques';

    // Общее
    case CARDIO = 'cardio';
    case FULL_BODY = 'full_body';
}
