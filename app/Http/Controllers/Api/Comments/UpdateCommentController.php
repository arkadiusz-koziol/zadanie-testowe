<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCommentRequest;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;

final class UpdateCommentController extends Controller
{
    public function __invoke(CommentService $service, UpdateCommentRequest $request, int $id): JsonResponse
    {
        $service->update($id, $request->validated());

        return response()->json([
            'message' => __('Komentarz został zaktualizowany pomyślnie.'),
        ], 200);
    }
}
