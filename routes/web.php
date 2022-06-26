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
    return view('frontend.fronthome');
});

Auth::routes();




Route::get('/home', function(){return view  ('frontend.fronthome');})->name('home');
Route::get('/rooms', [App\Http\Controllers\FrontendController::class, 'showrooms'])->name('showrooms');
Route::get('/aboutus',function(){return view ('frontend.aboutus');})->name('aboutus');
Route::get('/contactus',function(){return view ('frontend.contactus');})->name('contactus');
Route::get('rooms/{id}',[App\Http\Controllers\FrontendController::class, 'room_details'])->name('roombook');
Route::post('/bookroom',[App\Http\Controllers\FrontendController::class, 'bookroom'])->name('bookroom')->middleware(['web','auth']);
Route::get('/mybookings',[App\Http\Controllers\FrontendController::class, 'mybookings'])->name('mybookings')->middleware(['web','auth']);
Route::delete('mybookings/delete', [App\Http\Controllers\RoomController::class, 'delete'])->name('mybookings.delete');

Route::get('/',function(){return view  ('frontend.fronthome');})->name('fronthome');

Route::middleware(['web','auth','isAdmin'])->group(function () {


Route::get('/admin',[App\Http\Controllers\HomeController::class, 'restricr'])->name('dashboard');

     //RoomCategory
     Route::get('roomcategory', [App\Http\Controllers\RoomCategoryController::class, 'index'])->name('roomcategory.index');
     Route::get('roomcategory/create', [App\Http\Controllers\RoomCategoryController::class, 'create'])->name('roomcategory.create');
     Route::post('roomcategory', [App\Http\Controllers\RoomCategoryController::class, 'store'])->name('roomcategory');
     Route::get('roomcategory/{id}', [App\Http\Controllers\RoomCategoryController::class, 'show'])->name('roomcategory.show');
     Route::get('roomcategory/{id}/edit', [App\Http\Controllers\RoomCategoryController::class, 'edit'])->name('roomcategory.edit');
     Route::put('roomcategory/{id}/update', [App\Http\Controllers\RoomCategoryController::class, 'update'])->name('roomcategory.update');
     Route::delete('roomcategory/{id}/delete', [App\Http\Controllers\RoomCategoryController::class, 'delete'])->name('roomcategory.delete');

    //Room
      Route::get('room', [App\Http\Controllers\RoomController::class, 'index'])->name('room.index');
      Route::get('room/create', [App\Http\Controllers\RoomController::class, 'create'])->name('room.create');
      Route::post('room', [App\Http\Controllers\RoomController::class, 'store'])->name('room');
      Route::get('room/{id}', [App\Http\Controllers\RoomController::class, 'show'])->name('room.show');
      Route::get('room/{id}/edit', [App\Http\Controllers\RoomController::class, 'edit'])->name('room.edit');
      Route::put('room/{id}/update', [App\Http\Controllers\RoomController::class, 'update'])->name('room.update');
      Route::delete('room/{id}/delete', [App\Http\Controllers\RoomController::class, 'delete'])->name('room.delete');

      //User
      Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
      Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');

      //Payment
      Route::get('payment', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
      Route::get('payment/{id}', [App\Http\Controllers\PaymentController::class, 'show'])->name('payment.show');




});
