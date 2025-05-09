<?php

namespace App\Http\Controllers\Api\Users;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

final class ShowUserController extends Controller
{
    public function __invoke(UserService $service, int $id): JsonResponse
    {
        return response()->json($service->getById($id));
    }
}
