<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, LoginService $service): JsonResponse
    {
        try {
            return response()->json($service->login($request->validated()));
        } catch (RuntimeException $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }
}
