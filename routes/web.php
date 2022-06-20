<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard')->middleware('isAdmin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['web','auth'])->group(function () {

    // Test
    Route::get('test', [App\Http\Controllers\TestController::class, 'index'])->name('test.index');
    Route::get('test/create', [App\Http\Controllers\TestController::class, 'create'])->name('test.create');
    Route::post('test', [App\Http\Controllers\TestController::class, 'store'])->name('test');
    Route::get('test/{id}', [App\Http\Controllers\TestController::class, 'show'])->name('test.show');
    Route::get('test/{id}/edit', [App\Http\Controllers\TestController::class, 'edit'])->name('test.edit');
    Route::put('test/{id}/update', [App\Http\Controllers\TestController::class, 'update'])->name('test.update');
    Route::delete('test/{id}/delete', [App\Http\Controllers\TestController::class, 'delete'])->name('test.delete');

     //CarBrand
     Route::get('carbrand', [App\Http\Controllers\CarBrandController::class, 'index'])->name('carbrand.index');
     Route::get('carbrand/create', [App\Http\Controllers\CarBrandController::class, 'create'])->name('carbrand.create');
     Route::post('carbrand', [App\Http\Controllers\CarBrandController::class, 'store'])->name('carbrand');
     Route::get('carbrand/{id}', [App\Http\Controllers\CarBrandController::class, 'show'])->name('carbrand.show');
     Route::get('carbrand/{id}/edit', [App\Http\Controllers\CarBrandController::class, 'edit'])->name('carbrand.edit');
     Route::put('carbrand/{id}/update', [App\Http\Controllers\CarBrandController::class, 'update'])->name('carbrand.update');
     Route::delete('carbrand/{id}/delete', [App\Http\Controllers\CarBrandController::class, 'delete'])->name('carbrand.delete');

    //Car
      Route::get('car', [App\Http\Controllers\CarController::class, 'index'])->name('car.index');
      Route::get('car/create', [App\Http\Controllers\CarController::class, 'create'])->name('car.create');
      Route::post('car', [App\Http\Controllers\CarController::class, 'store'])->name('car');
      Route::get('car/{id}', [App\Http\Controllers\CarController::class, 'show'])->name('car.show');
      Route::get('car/{id}/edit', [App\Http\Controllers\CarController::class, 'edit'])->name('car.edit');
      Route::put('car/{id}/update', [App\Http\Controllers\CarController::class, 'update'])->name('car.update');
      Route::delete('car/{id}/delete', [App\Http\Controllers\CarController::class, 'delete'])->name('car.delete');

      //User
      Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
      Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');



});
