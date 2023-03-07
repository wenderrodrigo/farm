<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProdutosController;

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

Route::get('/produtos', [ProdutosController::class, 'create']);

Route::post('/produtos', [ProdutosController::class, 'index']);

Route::get('/produtos/excluir/{id}', [ProdutosController::class, 'excluir']);


