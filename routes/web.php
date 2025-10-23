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

#added
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

#added
Route::get('/',[HomeController::class,'my_home']);

Route::get('/home',[HomeController::class,'index']);

Route::get('/add_food',[AdminController::class,'add_food']);

Route::post('/upload_food',[AdminController::class,'upload_food']);

Route::get('/view_food',[AdminController::class,'view_food']);

Route::get('/delete_food/{id}',[AdminController::class,'delete_food']);

Route::get('/update_food/{id}',[AdminController::class,'update_food']);

Route::post('/edit_food/{id}',[AdminController::class,'edit_food']);

Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

Route::get('/my_cart',[HomeController::class,'my_cart']);

Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
