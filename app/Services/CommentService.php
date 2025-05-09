<?php

namespace App\Services;

use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

class
CommentService
{
    public function __construct(
        private CommentRepositoryInterface $repository,
        private CacheRepository $cache
    ) {
    }

    public function getAll(): Collection
    {
        return $this->cache->remember('comments.all', 3600, function () {
            return $this->repository->all();
        });
    }

    public function getById(int $id): Comment
    {
        return $this->repository->find($id);
    }

    public function create(array $data): Comment
    {
        try {
            return $this->repository->create($data);
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            throw new RuntimeException(__('Nie udało się utworzyć komentarza.'));
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            return $this->repository->update($id, $data);
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            throw new RuntimeException(__('Nie udało się zaktualizować komentarza.'));
        }
    }

    public function delete(int $id): bool
    {
        try {
            return $this->repository->delete($id);
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            throw new RuntimeException(__('Nie udało się usunąć komentarza.'));
        }
    }
}
