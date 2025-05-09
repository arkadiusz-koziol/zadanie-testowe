<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->route('id')],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Imię jest wymagane.'),
            'name.string' => __('Imię musi być ciągiem znaków.'),
            'name.max' => __('Imię nie może być dłuższe niż 255 znaków.'),
            'email.required' => __('Email jest wymagany.'),
            'email.email' => __('Email musi być poprawnym adresem email.'),
            'email.unique' => __('Email już istnieje w bazie danych.'),
        ];
    }
}
