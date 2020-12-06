<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;

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

use App\Http\Controllers\PostsApiController;
use App\Http\Controllers\PostsController;

Route::get('/',[PostsController::class,'index']);

Route::resource('posts',PostsController::class);

//Api routes
Route::get('api',[PostsApiController::class,'getAll']);
Route::get('api/{id}',[PostsApiController::class,'getByID']);
