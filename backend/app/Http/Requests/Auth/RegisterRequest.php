<?php

namespace App\Http\Requests\Auth;

use App\Enums\User\UserGenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'age' => ['nullable', 'integer', 'between:1,100'],
            'gender' => ['nullable', Rule::enum(UserGenderEnum::class)],
            'weight' => ['nullable', 'integer', 'between:1,300'],
            'height' => ['nullable', 'integer', 'between:1,250'],
        ];
    }
}
