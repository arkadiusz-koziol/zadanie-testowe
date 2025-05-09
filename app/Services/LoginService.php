<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use RuntimeException;

final class LoginService
{
    public function __construct(private HasherContract $hasher)
    {
    }

    public function login(array $credentials): array
    {
        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! $this->hasher->check($credentials['password'], $user->password)) {
            throw new RuntimeException(__('Nieprawidłowe dane logowania.'));
        }

        return [
            'message' => __('Zalogowano pomyślnie.'),
            'token' => $user->createToken('api-token')->plainTextToken,
        ];
    }
}
