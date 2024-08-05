<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personaController;

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

Route::get('/persona',[personaController::class,'listar']);

Route::get('/persona/{id}',[personaController::class,'obtener']);

Route::post('/persona',[personaController::class,'crear']);

Route::put('/persona/{id}',[personaController::class,'actualizar']);

Route::delete('/persona/{id}',[personaController::class,'eliminar']);

Route::get('/persona/restaurar/{id}',[personaController::class,'restaurar']);

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
