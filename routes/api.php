<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Comments\CreateCommentController;
use App\Http\Controllers\Api\Comments\DeleteCommentController;
use App\Http\Controllers\Api\Comments\ListCommentController;
use App\Http\Controllers\Api\Comments\ShowCommentController;
use App\Http\Controllers\Api\Comments\UpdateCommentController;
use App\Http\Controllers\Api\Posts\CreatePostController;
use App\Http\Controllers\Api\Posts\DeletePostController;
use App\Http\Controllers\Api\Posts\ListPostsController;
use App\Http\Controllers\Api\Posts\ShowPostController;
use App\Http\Controllers\Api\Posts\UpdatePostController;
use App\Http\Controllers\Api\Users\CreateUserController;
use App\Http\Controllers\Api\Users\DeleteUserController;
use App\Http\Controllers\Api\Users\ListUsersController;
use App\Http\Controllers\Api\Users\ShowUserController;
use App\Http\Controllers\Api\Users\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function (): void {
    Route::post('/login', LoginController::class);
});

Route::middleware(['api', 'auth:sanctum'])->group(function (): void {
    Route::get('posts', ListPostsController::class);
    Route::get('posts/{id}', ShowPostController::class);
    Route::post('posts', CreatePostController::class);
    Route::put('posts/{id}', UpdatePostController::class);
    Route::delete('posts/{id}', DeletePostController::class);

    Route::get('comments', ListCommentController::class);
    Route::get('comments/{id}', ShowCommentController::class);
    Route::post('comments', CreateCommentController::class);
    Route::put('comments/{id}', UpdateCommentController::class);
    Route::delete('comments/{id}', DeleteCommentController::class);

    Route::get('users', ListUsersController::class);
    Route::get('users/{id}', ShowUserController::class);
    Route::post('users', CreateUserController::class);
    Route::put('users/{id}', UpdateUserController::class);
    Route::delete('users/{id}', DeleteUserController::class);
});
