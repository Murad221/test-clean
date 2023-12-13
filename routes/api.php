<?php

use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('posts', [PostApiController::class, 'index']);
// Route::get('posts/{post}', [PostApiController::class, 'show']);



Route::apiResource('posts', PostApiController::class);


