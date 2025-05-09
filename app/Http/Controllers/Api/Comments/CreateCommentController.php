<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;

final class CreateCommentController extends Controller
{
    public function __invoke(CommentService $service, CreateCommentRequest $request): JsonResponse
    {
        return response()->json([
            'message' => __('Komentarz został utworzony pomyślnie.'),
            'data' => $service->create($request->validated()),
        ], 201);
    }
}
