<?php

use App\Http\Controllers\FactorController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\ResselerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\user\usercontroller;
use App\Http\Controllers\WarrantyController;
use App\Models\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Translation\MessageCatalogue;

// use Laravel\Sanctum\Sanctum;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
route::post('login',[usercontroller::class, 'login'])->name('login');
route::post('logout',[usercontroller::class, 'logout'])->middleware('auth:sanctum')->name('logout');

Route::group(['prefix'=>'users','as'=>'users.','middleware'=>'auth:sanctum'], function(){
    route::get('index/{id?}', [usercontroller::class, 'index'])->name('index');
    // Route::post('create', 'create')->middleware('role:admin|permition:user create')->name('create');
    route::post('store',[usercontroller::class, 'store'])->name('store')->withoutMiddleware('auth:sanctum');
    route::put('edit/{id}',[usercontroller::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[usercontroller::class, 'delete'])->name('delete');

});

Route::group(['prefix'=>'products','as'=>'products.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[Productcontroller::class, 'index'])->name('index');
    route::post('store',[Productcontroller::class, 'store'])->name('store');
    route::put('edit/{id}',[Productcontroller::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[Productcontroller::class, 'delete'])->name('delete');
});

Route::group(['prefix'=>'orders','as'=>'orders.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[OrderController::class, 'index'])->name('index');
    route::post('store',[OrderController::class, 'store'])->name('store');
    route::post('detach/{id}',[OrderController::class, 'detach'])->name('detach');
    route::put('edit/{id}',[OrderController::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[OrderController::class, 'delete'])->name('delete');
});
Route::group(['prefix'=>'factors','as'=>'factors.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[FactorController::class, 'index'])->name('index');
    route::post('store',[FactorController::class, 'store'])->name('store');
    route::put('edit/{id}',[FactorController::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[FactorController::class, 'delete'])->name('delete');
});
Route::group(['prefix'=>'teams','as'=>'teams.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[TeamController::class, 'index'])->name('index');
    route::post('store',[TeamController::class, 'store'])->name('store');
    route::put('edit/{id}',[TeamController::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[TeamController::class, 'delete'])->name('delete');
});
Route::group(['prefix'=>'resselers','as'=>'resselers.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[ResselerController::class, 'index'])->name('index');
    route::post('store',[ResselerController::class, 'store'])->name('store');
    route::put('edit/{id}',[ResselerController::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[ResselerController::class, 'delete'])->name('delete');
});
Route::group(['prefix'=>'tasks','as'=>'tasks.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[TaskController::class, 'index'])->name('index');
    route::post('store',[TaskController::class, 'store'])->name('store');
    route::put('edit/{id}',[TaskController::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[TaskController::class, 'delete'])->name('delete');
});
Route::group(['prefix'=>'notes','as'=>'notes.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[NoteController::class, 'index'])->name('index');
    route::post('store',[NoteController::class, 'store'])->name('store');
    route::put('edit/{id}',[NoteController::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[NoteController::class, 'delete'])->name('delete');
});
Route::group(['prefix'=>'tickets','as'=>'tickets.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[TicketController::class, 'index'])->name('index');
    route::post('store',[TicketController::class, 'store'])->name('store');
    route::put('edit/{id}',[TicketController::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[TicketController::class, 'delete'])->name('delete');
});
Route::group(['prefix'=>'messages','as'=>'messages.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[TicketController::class, 'index'])->name('index');
    route::post('store',[TicketController::class, 'store'])->name('store');
    route::put('edit/{id}',[TicketController::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[TicketController::class, 'delete'])->name('delete');
});
Route::group(['prefix'=>'warrantys','as'=>'warrantys.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[WarrantyController::class, 'index'])->name('index');
    route::post('store',[WarrantyController::class, 'store'])->name('store');
    route::put('edit/{id}',[WarrantyController::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[WarrantyController::class, 'delete'])->name('delete');
});
Route::group(['prefix'=>'lables','as'=>'lables.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[WarrantyController::class, 'index'])->name('index');
    route::post('store',[WarrantyController::class, 'store'])->name('store');
    route::put('edit/{id}',[WarrantyController::class, 'edit'])->name('edit');
    route::delete('delete/{id}',[WarrantyController::class, 'delete'])->name('delete');
});



