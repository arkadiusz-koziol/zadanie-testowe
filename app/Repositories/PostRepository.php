<?php
namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Collection;

class PostRepository implements PostRepositoryInterface
{
    public function all(): Collection
    {
        return Post::all();
    }

    public function find(int $id): Post
    {
        return Post::findOrFail($id);
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $post = $this->find($id);
        return $post->update($data);
    }

    public function delete(int $id): bool
    {
        $post = $this->find($id);
        return $post->delete();
    }
}
