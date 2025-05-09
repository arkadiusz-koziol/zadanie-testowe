<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

final class DeleteUserController extends Controller
{
    public function __invoke(UserService $service, int $id): JsonResponse
    {
        $service->delete($id);

        return response()->json([
            'message' => __('Użytkownik został usunięty pomyślnie.'),
        ], 200);
    }
}

