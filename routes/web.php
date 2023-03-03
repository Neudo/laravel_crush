<?php

use App\Http\Controllers\SendMailController;
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

Route::get('/', function () {return view('home');});


Route::get('/new-message', [SendMailController::class, 'index']);
Route::post('/new-message', [SendMailController::class, 'createMessage']);

Route::get('/message/{token}', [SendMailController::class, 'show']);

Route::get('/too-late', function () {return view('too-late');});


