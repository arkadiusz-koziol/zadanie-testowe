<?php

namespace App\Http\Controllers\Api\Posts;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;

final class DeletePostController extends Controller
{
    public function __invoke(PostService $postService, int $id): JsonResponse
    {
        $postService->delete($id);

        return response()->json([
            'message' => __('Post został usunięty pomyślnie.'),
        ], 200);
    }
}
