<?php

namespace App\Services;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

class PostService
{
    public function __construct(
        private PostRepositoryInterface $repository,
        private CacheRepository $cache
    ) {
    }

    public function getAll(): Collection
    {
        return $this->cache->remember('posts.all', 3600, function () {
            return $this->repository->all();
        });
    }

    public function getById(int $id): Post
    {
        return $this->repository->find($id);
    }

    public function create(array $data): Post
    {
        try {
            return $this->repository->create($data);
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            throw new RuntimeException(__('Nie udało się utworzyć posta.'));
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            return $this->repository->update($id, $data);
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            throw new RuntimeException(__('Nie udało się zaktualizować posta.'));
        }
    }

    public function delete(int $id): bool
    {
        try {
            return $this->repository->delete($id);
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            throw new RuntimeException(__('Nie udało się usunąć posta.'));
        }
    }
}
