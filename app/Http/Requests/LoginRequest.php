<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('Email jest wymagany.'),
            'email.email' => __('Podaj poprawny adres email.'),
            'password.required' => __('Hasło jest wymagane.'),
            'password.string' => __('Hasło musi być ciągiem znaków.'),
        ];
    }
}
