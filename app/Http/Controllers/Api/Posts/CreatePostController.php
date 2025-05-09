<?php

namespace App\Http\Controllers\Api\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;

final class CreatePostController extends Controller
{
    public function __invoke(PostService $postService, CreatePostRequest $request): JsonResponse
    {
        $post = $postService->create($request->validated());

        return response()->json([
            'message' => __('Post został utworzony pomyślnie.'),
            'data' => $post,
        ], 201);
    }
}
