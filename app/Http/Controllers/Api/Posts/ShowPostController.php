<?php

namespace App\Http\Controllers\Api\Posts;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;

final class ShowPostController extends Controller
{
    public function __invoke(PostService $postService, int $id): JsonResponse
    {
        return response()->json($postService->getById($id));
    }
}
