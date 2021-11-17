<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudeController;

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
/*Route::get('/cache', function () {
    Artisan::call('cache:clear');

    return redirect()->back();
})->name('cache');
Auth Routes Start*/
Route::get('/', [HomeController::class, 'login'])->name('login');
Route::get('{id}/form', [HomeController::class, 'form'])->name('form');


Route::post('login', [AuthController::class, 'login'])->name('custom.login');
Route::get('register', [AuthController::class, 'registration'])->name('custom.registration');
Route::post('user-register', [AuthController::class, 'userRegistration'])->name('user.registration');
Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
/*Auth Routes End*/

/*Dashboard Routes*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    /*Menu Manager Routes*/
    Route::get('/menu-manager', [CrudeController::class, 'view'])->name('viewMenuManager');
    Route::post('/create', [CrudeController::class, 'insert'])->name('createMenuManager');

});





