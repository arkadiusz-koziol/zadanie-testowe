<?php

namespace App\Services;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\ValueObjects\PasswordHasher;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

class UserService
{
    public function __construct(
        private UserRepositoryInterface $repository,
        private CacheRepository $cache)
    {
    }

    public function getAll(): Collection
    {
        return $this->cache->remember('users.all', 3600, function () {
            return $this->repository->all();
        });
    }

    public function getById(int $id): User
    {
        return $this->repository->find($id);
    }

    public function create(array $data): User
    {
        try {
            $data['password'] = (new PasswordHasher())->hash($data['password']);

            return $this->repository->create($data);
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            throw new RuntimeException(__('Nie udało się utworzyć użytkownika.'));
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            return $this->repository->update($id, $data);
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            throw new RuntimeException(__('Nie udało się zaktualizować użytkownika.'));
        }
    }

    public function delete(int $id): bool
    {
        try {
            return $this->repository->delete($id);
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            throw new RuntimeException(__('Nie udało się usunąć użytkownika.'));
        }
    }
}
