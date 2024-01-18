<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () { return 'Ответ метода Get';});
Route::post('/', function () { return 'Ответ метода Post';});
Route::patch('/', function () { return 'Ответ метода Patch';});
Route::delete('/', function () { return 'Ответ метода Delete';});


use \App\Http\Controllers\RoleController;

Route::middleware('auth:api')->get('/roles', [RoleController::class, 'index']);
Route::middleware('auth:api')->post('/roles', [RoleController::class, 'create']);
Route::middleware('auth:api')->get('/roles/{id}', [RoleController::class, 'show']);
Route::middleware('auth:api')->patch('/roles/{id}', [RoleController::class, 'update']);
Route::middleware('auth:api')->delete('/roles/{id}', [RoleController::class, 'destroy']);


use \App\Http\Controllers\UserController;

Route::middleware('auth:api')->get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'create']);
Route::middleware('auth:api')->get('/users/{id}', [UserController::class, 'show']);
Route::middleware('auth:api')->patch('/users/{id}', [UserController::class, 'update']);
Route::middleware('auth:api')->delete('/users/{id}', [UserController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
