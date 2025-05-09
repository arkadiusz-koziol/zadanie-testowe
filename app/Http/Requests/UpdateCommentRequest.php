<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'author' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string'],
        ];
    }
}
