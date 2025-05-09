<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

final class UpdateUserController extends Controller
{
    public function __invoke(UserService $service, UpdateUserRequest $request, int $id): JsonResponse
    {
        $service->update($id, $request->validated());

        return response()->json([
            'message' => __('Użytkownik został zaktualizowany pomyślnie.'),
        ], 200);
    }
}
