<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => __('Identyfikator użytkownika jest wymagany.'),
            'user_id.integer' => __('Identyfikator użytkownika musi być liczbą całkowitą.'),
            'user_id.exists' => __('Podany użytkownik nie istnieje.'),
            'title.required' => __('Tytuł jest wymagany.'),
            'title.string' => __('Tytuł musi być ciągiem znaków.'),
            'title.max' => __('Tytuł nie może być dłuższy niż 255 znaków.'),
            'content.required' => __('Treść jest wymagana.'),
            'content.string' => __('Treść musi być ciągiem znaków.'),
        ];
    }
}
