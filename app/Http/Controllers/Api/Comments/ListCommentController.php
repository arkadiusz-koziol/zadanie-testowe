<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;

final class ListCommentController extends Controller
{
    public function __invoke(CommentService $service): JsonResponse
    {
        return response()->json([
            'message' => __('Lista komentarzy została pobrana pomyślnie.'),
            'data' => $service->getAll(),
        ], 200);
    }
}
