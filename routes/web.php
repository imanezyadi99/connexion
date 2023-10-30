<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/connexion','App\Http\Controllers\UserController@formulaire');
Route::post('/connexion','App\Http\Controllers\UserController@traitement');
Route::post('/connexion','App\Http\Controllers\UserController@upload');
Route::post('/connexion','App\Http\Controllers\UserController@enregistrer');



