<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\loginController;

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

Route::controller(HomeController::class)->middleware('AuthAdmin')->group(function(){
  Route::get('index','index')->name('index');
  Route::get('add','add')->name('index/add');
  Route::post('info','info')->name('index/info');
  Route::post('edit/{id}','edit')->name('index/edit');
  Route::post('update/{id}','update')->name('index/update');
  Route::post('delete/{id}','delete')->name('index/delete');

  Route::get('logout','logout')->name('logout');
});

// ------------- Login-----------\\

Route::controller(loginController::class)->group(function(){
  Route::get('login','login')->name('login');
  Route::post('data','data')->name('data');
});
