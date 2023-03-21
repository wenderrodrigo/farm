<?php

use App\Http\Controllers\CountryController;
use App\Models\Country;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/coutry/{name}', [CountryController::class, 'show']); //Rota para retornar o pais conforme valor recebido


Route::get('/coutry', [CountryController::class, 'index']); //Rota para retornar o pais conforme valor recebido
