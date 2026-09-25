<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exercise::create(['name' => 'Жим лежа', 'description' => 'техника выполнения', 'muscle_group' => 'chest', 'media' => 'гифка']);
        Exercise::create(['name' => 'Жим ногами', 'description' => 'техника выполнения', 'muscle_group' => 'quads', 'media' => 'гифка']);
    }
}
