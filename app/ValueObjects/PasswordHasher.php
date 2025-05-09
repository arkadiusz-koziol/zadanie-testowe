<?php

namespace App\ValueObjects;

class PasswordHasher
{
    public function hash(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
