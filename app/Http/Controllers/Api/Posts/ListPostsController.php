<?php

namespace App\Http\Controllers\Api\Posts;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;

final class ListPostsController extends Controller
{
    public function __invoke(PostService $postService): JsonResponse
    {
        return response()->json([
            'message' => __('Lista postów została pobrana pomyślnie.'),
            'data' => $postService->getAll(),
        ], 200);
    }
}
