<?php

use App\Http\Controllers\api\v1\{
    PostController,
    MessageController,
    CommunityController,
    CommentController,
    CommunityPostController,
    CommunityCommentController
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('/posts', PostController::class);
Route::resource('/messages', MessageController::class);
Route::resource('/comunnities', CommunityController::class);
Route::resource('/comments', CommentController::class);
Route::prefix('community')->group(function (){
    Route::resource('/{comunnity}/posts', CommunityPostController::class);
    Route::resource('/{comunnity}/comments', CommunityCommentController::class);
});
