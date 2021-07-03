<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Model\User;
use App\Model\Article;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth::routes();

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('logout', [LoginController::class, 'logout'])->name('apiLogout');
// Route::post('register', [RegisterController::class, 'register'])->name('apiRegister');
// Route::post('login', [LoginController::class, 'login'])->name('apiLogin');

    Route::get('articles', [ArticleController::class,'index'])->name('getArticles');
    Route::get('articlesJoin', [ArticleController::class,'indexJoin'])->name('getArticlesAndComments');
    Route::get('articles/{article}', [ArticleController::class,'show'])->name('getArticle');
    Route::post('articles', [ArticleController::class,'store'])->name('storeArticles');
    Route::put('articles/{article}', [ArticleController::class,'update'])->name('updateArticle');
    Route::delete('articles/{article}', [ArticleController::class,'delete'])->name('deleteArticle');

    Route::get('comments', [CommentController::class,'index'])->name('getComments');
    Route::get('commentsJoin/{article}', [CommentController::class,'indexJoin'])->name('getCommentsForArticle');
    Route::get('comments/{comment}', [CommentController::class,'show'])->name('getComment');
    Route::post('comments', [CommentController::class,'store'])->name('storeComments');
    Route::put('comments/{comment}', [CommentController::class,'update'])->name('updateComment');
    Route::delete('comments/{comment}', [CommentController::class,'delete'])->name('deleteComment');
