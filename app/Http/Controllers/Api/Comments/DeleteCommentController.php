<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;

final class DeleteCommentController extends Controller
{
    public function __invoke(CommentService $service, int $id): JsonResponse
    {
        $service->delete($id);

        return response()->json([
            'message' => __('Komentarz został usunięty pomyślnie.'),
        ], 200);
    }
}
