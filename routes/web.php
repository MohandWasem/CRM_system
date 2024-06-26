<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ReplayController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Setup\PortController;
use App\Http\Controllers\Setup\UserController;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Setup\AgentController;
use App\Http\Controllers\Admin\ActivtyController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Setup\CarrierController;
use App\Http\Controllers\Setup\CountryController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Operation\ReadController;
use App\Http\Controllers\Setup\CurrencyController;
use App\Http\Controllers\Setup\SupplierController;
use App\Http\Controllers\Sales\QuotationController;
use App\Http\Controllers\Setup\CommodityController;
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

  // ------------- Home -----------\\

  Route::controller(DashboradController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Home','index')->name('home.dash');
    Route::put('/tasks/{approve}/approve', [DashboradController::class, 'approve'])->name('tasks.approve');
    Route::get('/mark-notification/{notifiable_id}', 'markNotificationAsRead')->name('mark-notification');
    Route::get('Replay', 'show')->name('replay.show');
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
    Route::get('all_ports/{type_id}','ports')->name('allports');
    Route::get('/search-ports', 'searchPorts')->name('search.ports');
    Route::get('/search-trucking', 'searchTrucking')->name('search.trucking');
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

    // ------------- Commodities -----------\\
  Route::controller(CommodityController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Commodity','index')->name('Commodity');
    Route::get('Commodity/add','add')->name('Commodity.add');
    Route::post('Commodity/show','show')->name('Commodity.show');
    Route::post('Commodity/edit/{id}','edit')->name('Commodity.edit');
    Route::post('Commodity/update/{id}','update')->name('Commodity.update');
    Route::post('Commodity/delete/{id}','delete')->name('Commodity.delete');
    });


    // ------------- Agents -----------\\
  Route::controller(AgentController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Agents','index')->name('Agents');
    Route::get('Agents/add','add')->name('Agents.add');
    Route::post('Agents/show','show')->name('Agents.show');
    Route::post('Agents/edit/{id}','edit')->name('Agents.edit');
    Route::post('Agents/update/{id}','update')->name('Agents.update');
    Route::post('Agents/delete/{id}','delete')->name('Agents.delete');
    });

    // ------------- Carriers -----------\\
  Route::controller(CarrierController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Carriers','index')->name('Carriers');
    Route::get('Carriers/add','add')->name('Carriers.add');
    Route::post('Carriers/show','show')->name('Carriers.show');
    Route::post('Carriers/edit/{id}','edit')->name('Carriers.edit');
    Route::post('Carriers/update/{id}','update')->name('Carriers.update');
    Route::post('Carriers/delete/{id}','delete')->name('Carriers.delete');
    });

    // ------------- Suppliers -----------\\
  Route::controller(SupplierController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('suppliers','index')->name('suppliers');
    Route::get('suppliers/add','add')->name('suppliers.add');
    Route::post('suppliers/show','show')->name('suppliers.show');
    Route::post('suppliers/edit/{id}','edit')->name('suppliers.edit');
    Route::post('suppliers/update/{id}','update')->name('suppliers.update');
    Route::post('suppliers/delete/{id}','delete')->name('suppliers.delete');
  });

   // ------------- Currency -----------\\
  Route::controller(CurrencyController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Currency','index')->name('Currency');
    Route::get('Currency/add','add')->name('Currency.add');
    Route::post('Currency/show','show')->name('Currency.show');
    Route::post('Currency/edit/{id}','edit')->name('Currency.edit');
    Route::post('Currency/update/{id}','update')->name('Currency.update');
    Route::post('Currency/delete/{id}','delete')->name('Currency.delete');
  });

   // ------------- Rates -----------\\

  Route::controller(ReadController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Rates','index')->name('Rates');
    Route::get('Rates/add','add')->name('Rates.add');
    Route::post('Rates/show','show')->name('Rates.show');
    Route::post('Rates/edit/{id}','edit')->name('Rates.edit');
    Route::post('Rates/update/{id}','update')->name('Rates.update');
    Route::post('Rates/delete/{id}','delete')->name('Rates.delete');
    Route::get('all_ports/{type_id}','ports')->name('allports');
    Route::get('/all_carriers/{value}', 'getAllCarriers');
    Route::get('/search-rates', 'searchRates')->name('search.rates');
  });

     // ------------- Users -----------\\

  Route::controller(UserController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Users','index')->name('Users');
    Route::get('Users/add','add')->name('Users.add');
    Route::post('Users/show','show')->name('Users.show');
    Route::post('Users/edit/{id}','edit')->name('Users.edit');
    Route::post('Users/update/{id}','update')->name('Users.update');
    Route::post('Users/delete/{id}','delete')->name('Users.delete');
  });

     // ------------- RequestsApproved -----------\\

  Route::controller(TaskController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('RequestsApproved','index')->name('Request.Approved');
    Route::POST('RequestsApproved/store','store')->name('Request.Approved.store');
  });


   // ------------- ReplayApproved -----------\\

  Route::controller(ReplayController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('ReplayRequest','index')->name('Replay.Request');
    
  });

     // ------------- quotations -----------\\

  Route::controller(QuotationController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('Quotations','index')->name('Quotations');
    Route::post('Quotations/edit/{id}','edit')->name('Quotations.edit');
    Route::post('Quotations/update/{id}','update')->name('Quotations.update');
      
    });

  
 

    


    
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.auth');
