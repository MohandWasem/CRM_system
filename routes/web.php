<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Setup\PortController;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\ActivtyController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Setup\CountryController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Setup\ContainerController;
use App\Http\Controllers\Setup\ParameterController;

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


// ------------- Client -----------\\
Route::controller(HomeController::class)->middleware('AuthAdmin')->group(function(){
  Route::get('index','index')->name('index');
  Route::get('add','add')->name('index/add');
  Route::post('info','info')->name('index/info');
  Route::post('edit/{id}','edit')->name('index/edit');
  Route::post('update/{id}','update')->name('index/update');
  Route::post('delete/{id}','delete')->name('index/delete');
  Route::get('Home/documents/{id}','document')->name('Home/documents');

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
  Route::post("document/edit/{id}","edit")->name("document/edit");
  Route::post("document/update/{id}","update")->name("document/update");
  Route::post("document/delete/{id}","delete")->name("document/delete");
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


// ------------- Parameters -----------\\

Route::controller(ParameterController::class)->middleware('AuthAdmin')->group(function(){
Route::get('parameter','index')->name('parameter');
Route::get('parameter/edit/{id}','edit')->name('parameter/edit');
Route::post('parameter/update/{id}','update')->name('parameter/update');
});



// ------------- Ports -----------\\

Route::controller(PortController::class)->middleware('AuthAdmin')->group(function(){
  Route::get('Ports','index')->name('Ports');
  Route::get('Ports/add','add')->name('Ports.add');
  Route::post('Ports/show','show')->name('Ports.show');
  Route::post('Ports/edit/{id}','edit')->name('Ports.edit');
  Route::post('Ports/update/{id}','update')->name('Ports.update');
  Route::post('Ports/delete/{id}','delete')->name('Ports.delete');
  });

  // ------------- Countries -----------\\

  Route::controller(CountryController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Country','index')->name('Country');
    Route::get('Country/add','add')->name('Country.add');
    Route::post('Country/show','show')->name('Country.show');
    Route::post('Country/edit/{id}','edit')->name('Country.edit');
    Route::post('Country/update/{id}','update')->name('Country.update');
    Route::post('Country/delete/{id}','delete')->name('Country.delete');
    });


    // ------------- Containers -----------\\

   Route::controller(ContainerController::class)->middleware('AuthAdmin')->group(function(){
     Route::get('Container','index')->name('Container');
     Route::get('Container/add','add')->name('Container.add');
     Route::post('Container/show','show')->name('Container.show');
     Route::post('Container/edit/{id}','edit')->name('Container.edit');
     Route::post('Container/update/{id}','update')->name('Container.update');
     Route::post('Container/delete/{id}','delete')->name('Container.delete');
     });