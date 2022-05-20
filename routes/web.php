<?php

use App\Http\Controllers\PostController;
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
Route::get('/', [PostController::class , 'index']);
Route::get('/{id}', [PostController::class, 'show'])->name('post.show');
Route::post('/create', [PostController::class, 'create']);
Route::post('/{id}/update', [PostController::class, 'update']);
Route::post('/{id}/delete', [PostController::class, 'delete']);
Route::post('/comment/{post_id}', [PostController::class, 'comment']);
