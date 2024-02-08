<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\ActivtyController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\RequestController;

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

// ------------- Activity-----------\\

Route::controller(ActivtyController::class)->middleware('AuthAdmin')->group(function(){
  Route::get("activty","activty")->name("activty");
  Route::get("add_act","add_act")->name("activty/add_act");
  Route::post("insert_act","insert_act")->name("activty/insert_act");
});

// ------------- Document-----------\\

Route::controller(DocumentController::class)->middleware('AuthAdmin')->group(function(){
  Route::get("document","index")->name("document");
  Route::get("document/add","shows")->name("document/add");
  Route::post("document/insert","doc_insert")->name("document/insert");
});

// ------------- Request-----------\\

Route::controller(RequestController::class)->middleware('AuthAdmin')->group(function(){
  Route::get("request","index")->name("request");
  Route::get("request/add","show")->name("request/add");
  Route::post("request/insert","info")->name("request/insert");
  Route::post("request/edit/{id}","edit")->name("request/edit");
  Route::post("request/update/{id}","update")->name("request/update");
  Route::post("request/delete/{id}","delete")->name("request/delete");
});