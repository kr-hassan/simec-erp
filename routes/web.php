<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudeController;
use App\Http\Controllers\MenuManagerController;

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
Route::post('login', [AuthController::class, 'login'])->name('custom.login');
Route::get('register', [AuthController::class, 'registration'])->name('custom.registration');
Route::post('user-register', [AuthController::class, 'userRegistration'])->name('user.registration');
Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
/*Auth Routes End*/

/*Dashboard Routes*/

Route::group(['middleware' => 'auth'], function () {
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

	/*Auto Routes*/
//    Route::get('{btnid}/form', [HomeController::class, 'form'])->name('form');
//    Route::post('/form/create', [HomeController::class, 'form.create'])->name('form.create');
//    Route::get('{btnid}/form/edit', [HomeController::class, 'form.edit'])->name('form.edit');
//    Route::get('/form/update', [HomeController::class, 'form.update'])->name('form.uUpdate');
//    Route::get('/form/delete', [HomeController::class, 'form.delete'])->name('form.delete');

//    Route::post('/edit', [MenuManagerController::class, 'edit'])->name('editMenuPage');

    /*Routes*/
    Route::get('form', [HomeController::class, 'form'])->name('form');
    Route::post('form/create', [HomeController::class, 'form.create'])->name('form.create');
    Route::get('form/edit', [HomeController::class, 'form.edit'])->name('form.edit');
    Route::get('/form/update', [HomeController::class, 'form.update'])->name('form.uUpdate');
    Route::get('/form/delete', [HomeController::class, 'form.delete'])->name('form.delete');


	/*Menu Manager Routes*/
    Route::get('/menu-manager', [MenuManagerController::class, 'index'])->name('viewMenuManager');
    Route::get('/create', [MenuManagerController::class, 'create'])->name('createMenuPage');
    Route::post('/create', [MenuManagerController::class, 'insert'])->name('saveMenuPage');
    Route::get('/edit/{id}', [MenuManagerController::class, 'edit'])->name('editMenuPage');
    Route::post('/update/{id}', [MenuManagerController::class, 'update'])->name('updateMenuPage');


});





