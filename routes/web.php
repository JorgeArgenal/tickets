<?php

use App\Http\Controllers\ActualizacionController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(TicketController::class)->group(function () {
    Route::get('/tickets/show/{id}', 'show')->name('tickets.show');
    Route::get('/tickets', 'index')->name('tickets.index');
    Route::get('tickets/create', 'create')->name('tickets.create');
    Route::get('tickets/{filtro}', 'filtro')->name('tickets.filtro');
    Route::post('/tickets', 'store')->name('tickets.store');
    Route::put('tickets/update/{id}', 'update')->name('tickets.update');
});

Route::controller(ActualizacionController::class)->group(function () {
    Route::get('tickets/show/{id}/actualizacion/create', 'create')->name('actualizacion.create');
    Route::get('tickets/show/{id}/actualizacion/{idActualizacion}', 'show')->name('actualizacion.show');
});
