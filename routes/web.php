<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EmailController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::get('/carreras', [CarreraController::class, 'index'])
->name('carreras.index');

Route::get('/carreras/create', [CarreraController::class, 'create'])
->name('carreras.create');

Route::post('/carreras', [CarreraController::class, 'store'])
->name('carreras.store');

Route::get('/carreras/{carrera}/edit', 
[CarreraController::class, 'edit'])
->name('carreras.edit');

Route::put('/carreras/{carrera}',
[CarreraController::class, 'update'])
->name('carreras.update');

Route::delete('/carreras/{carrera}',
[CarreraController::class, 'destroy'])
->name('carreras.destroy');

Route::get('/carreras/sendemail',
[EmailController::class, 'sendEmail'])
->name('carreras.sendemail');

