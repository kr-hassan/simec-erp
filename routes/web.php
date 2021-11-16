<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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
//

/*Auth Routes Start*/
Route::get('/', [HomeController::class, 'login'])->name('login');
Route::get('/form', [HomeController::class, 'form'])->name('form');
Route::get('/anotherForm', [HomeController::class, 'anotherForm'])->name('anotherForm');

Route::post('login', [AuthController::class, 'login'])->name('custom.login');
Route::get('register', [AuthController::class, 'registration'])->name('custom.registration');
Route::post('user-register', [AuthController::class, 'userRegistration'])->name('user.registration');
Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
/*Auth Routes End*/

/*Dashboard Routes*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

});





