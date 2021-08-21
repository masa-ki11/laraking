<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestosController;

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
Route::get("/index", 'UsersController@index', function() {
	return view("index");  
});
// Route::get('/index', 'UsersController@index');
Route::get('/testo', function () {
    return view('testo');
});

Route::get('/testo', function () {
    return view('testo');
});

// API用
Route::get('/ooo', [TestosController::class, 'index']);