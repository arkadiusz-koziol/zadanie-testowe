<?php

namespace App\Http\Controllers\Api\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;

final class UpdatePostController extends Controller
{
    public function __invoke(PostService $postService, UpdatePostRequest $request, int $id): JsonResponse
    {
        $postService->update($id, $request->validated());

        return response()->json([
            'message' => __('Post został zaktualizowany pomyślnie.'),
        ], 200);
    }
}
