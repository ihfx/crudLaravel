<?php

use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Rotas publicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas privadas
Route::group(['middleware' => ['auth:sanctum']], function(){
  // Rota api/products
  Route::get('/products', [ProductController::class, 'index']);
  Route::get('/products/{id}', [ProductController::class, 'show']);
  Route::post('/products', [ProductController::class, 'store']);
  Route::put('/products/{id}', [ProductController::class, 'update']);
  Route::delete('/products/{id}', [ProductController::class, 'destroy']);

  // Rota api/users
  Route::get('/users', [UserController::class, 'index']);
  Route::get('/users/{id}', [UserController::class, 'show']);
  Route::post('/users', [UserController::class, 'store']);
  Route::put('/users/{id}', [UserController::class, 'update']);
  Route::delete('/users/{id}', [UserController::class, 'destroy']);

  // Rota de logout
  Route::post('/logout', [AuthController::class, 'logout']);
});


