<?php

use App\Http\Controllers\pagesController;
use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', [pagesController::class, 'welcome'])-> name('welcome');
Route::get('/register', [pagesController::class, 'register'])-> name('register');
Route::get('/login', [pagesController::class, 'login'])-> name('login');
Route::get('/dashboard', [pagesController::class, 'dashboard'])-> name('dashboard')->middleware('loggedStatus');
Route::get('/user/details/{id}', [pagesController::class, 'details'])-> name('user.details');
Route::post('/register', [pagesController::class, 'registerForm'])-> name('register');
Route::post('/login', [pagesController::class, 'loginForm'])-> name('login');
Route::get('/userDashboard', [pagesController::class, 'userDashboard'])-> name('userDashboard')->middleware('loggedStatus');

Route::get('/logout', [pagesController::class, 'logout'])-> name('logout')->middleware('loggedStatus');
Route::get('/modify/{id}', [pagesController::class, 'modifyUser'])-> name('modify')->middleware('loggedStatus');
Route::post('/modify/{id}', [pagesController::class, 'modifyForm'])-> name('modify')->middleware('loggedStatus');

Route::get('/delete/{id}', [pagesController::class, 'deleteUser'])-> name('delete')->middleware('loggedStatus');