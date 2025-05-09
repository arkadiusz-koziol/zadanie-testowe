<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

final class ListUsersController extends Controller
{
    public function __invoke(UserService $service): JsonResponse
    {
        return response()->json([
            'message' => __('Lista użytkowników została pobrana pomyślnie.'),
            'data' => $service->getAll(),
        ], 200);
    }
}
