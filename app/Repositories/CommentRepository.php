<?php
namespace App\Repositories;

use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;
use Illuminate\Support\Collection;

class CommentRepository implements CommentRepositoryInterface
{
    public function all(): Collection
    {
        return Comment::all();
    }

    public function find(int $id): Comment
    {
        return Comment::findOrFail($id);
    }

    public function create(array $data): Comment
    {
        return Comment::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $comment = $this->find($id);
        return $comment->update($data);
    }

    public function delete(int $id): bool
    {
        $comment = $this->find($id);
        return $comment->delete();
    }
}
