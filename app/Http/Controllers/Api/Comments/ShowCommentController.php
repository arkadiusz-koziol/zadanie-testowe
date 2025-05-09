<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;

final class ShowCommentController extends Controller
{
    public function __invoke(CommentService $service, int $id): JsonResponse
    {
        return response()->json($service->getById($id));
    }
}
