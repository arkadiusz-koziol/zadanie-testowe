<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'post_id' => ['required', 'integer', 'exists:posts,id'],
            'author' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'post_id.required' => __('Identyfikator posta jest wymagany.'),
            'post_id.integer' => __('Identyfikator posta musi być liczbą całkowitą.'),
            'post_id.exists' => __('Podany post nie istnieje.'),
            'author.required' => __('Autor jest wymagany.'),
            'author.string' => __('Autor musi być ciągiem znaków.'),
            'author.max' => __('Autor nie może być dłuższy niż 255 znaków.'),
            'comment.required' => __('Komentarz jest wymagany.'),
            'comment.string' => __('Komentarz musi być ciągiem znaków.'),
        ];
    }
}
