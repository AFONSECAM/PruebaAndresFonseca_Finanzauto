<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\RetiroController;
use App\Http\Controllers\ConsultaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cuentas', CuentaController::class);

Route::resource('deposito', DepositoController::class);
Route::resource('retiro', RetiroController::class);
Route::post('saldo', [App\Http\Controllers\ConsultaController::class, 'saldo'])->name('saldo');
Route::resource('consulta', ConsultaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
