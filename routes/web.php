<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');



Route::group(['middleware' => 'auth'], function () {

    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/article/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::post('/comments/{article}', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/response/{comment}', [CommentController::class, 'response'])->name('response');
});


require __DIR__ . '/auth.php';
