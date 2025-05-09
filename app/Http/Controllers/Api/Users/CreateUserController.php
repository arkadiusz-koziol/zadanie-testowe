<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Throwable;

final class CreateUserController extends Controller
{
    public function __invoke(UserService $service, CreateUserRequest $request): JsonResponse
    {
        $user = $service->create($request->validated());

        return response()->json([
            'message' => __('Użytkownik został utworzony pomyślnie.'),
            'data' => $user,
        ], 201);
    }

}
