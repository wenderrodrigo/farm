<?php

use App\Http\Controllers\CountryController;
use App\Models\Country;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [EventController::class, 'index']); //Rota para mostrar todos os registros
Route::get('/events/create', [EventController::class, 'create']); //Rota para adicionar registros no banco
Route::get('/events/{id}', [EventController::class, 'show']); //Rota para msotrar apenas 1 registro especifico
Route::post('/events', [EventController::class, 'store']); // Rota para enviar os dados do banco

Route::get('/produtos', [ProductController::class, 'create']);

//Route::post('/produtos', [ProductController::class, 'index']);

Route::post('/products', [ProductController::class, 'store']); //Rota para retornar os fabricantes


Route::get('/produtos/excluir/{id}', [ProductController::class, 'excluir']);



// Route::get('/coutry/{name}', function(Country $country){

//     return response($country, 200)
//                   ->header('Content-Type', 'text/plain');
// }); //Rota para retornar o pais conforme valor recebido

// Route::get('/coutry', function(){
//     return response('Hello World', 200)
//                   ->header('Content-Type', 'text/plain');
// }); //Rota para retornar o pais conforme valor recebido