<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();




Route::get('/home', [App\Http\Controllers\FrontendController::class, 'home'])->name('home');
Route::get('/rooms', [App\Http\Controllers\FrontendController::class, 'showrooms'])->name('showrooms');
Route::get('/aboutus',[App\Http\Controllers\FrontendController::class, 'aboutus'])->name('aboutus');
Route::get('/contactus',[App\Http\Controllers\FrontendController::class, 'contactus'])->name('contactus');
Route::get('rooms/{id}',[App\Http\Controllers\FrontendController::class, 'room_details'])->name('roombook');
Route::post('/bookroom',[App\Http\Controllers\FrontendController::class, 'bookroom'])->name('bookroom')->middleware(['web','auth']);
Route::get('/mybookings',[App\Http\Controllers\FrontendController::class, 'mybookings'])->name('mybookings')->middleware(['web','auth']);
Route::delete('mybookings/delete/{id}', [App\Http\Controllers\FrontendController::class, 'cancel'])->name('mybookings.cancel');
Route::get('myprofile/', [App\Http\Controllers\FrontendController::class, 'myprofile'])->name('myprofile');
Route::get('myprofile/edit/{id}', [App\Http\Controllers\FrontendController::class, 'myprofile_edit'])->name('myprofile.edit');
Route::put('myprofile/update/{id}', [App\Http\Controllers\FrontendController::class, 'myprofile_update'])->name('myprofile.update');
Route::get('/', [App\Http\Controllers\FrontendController::class, 'home'])->name('fronthome');

Route::middleware(['web','auth','isAdmin'])->group(function () {


Route::get('/admin',[App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');

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
      Route::post('paynow', [App\Http\Controllers\PaymentController::class, 'khaltipayment'])->name('khalti.payment');

      //Bookings

      Route::get('/bookings', [App\Http\Controllers\BookingsController::class, 'bookingslist'])->name('bookings.list');
      Route::get('/bookings/{id}', [App\Http\Controllers\BookingsController::class, 'details'])->name('bookings.details');



});
