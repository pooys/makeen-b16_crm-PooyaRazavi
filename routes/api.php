<?php

use App\Http\Controllers\FactorController;
use App\Http\Controllers\LableController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'users','as'=>'users.','middleware'=>'auth:sanctum'], function(){
    route::get('index/{id?}', [usercontroller::class, 'index'])->middleware('permisson:super_admin|admin|user')->name('index');
    route::post('store',[usercontroller::class, 'store'])->name('store' )->withoutMiddleware('auth:sanctum');
    route::put('edit/{id}',[usercontroller::class, 'edit'])->name('edit')->middleware('role:admin|user|super_admin');
    route::delete('delete/{id}',[usercontroller::class, 'delete'])->name('delete')->middleware('role:admin|user|super_admin');

});

Route::group(['prefix'=>'products','as'=>'products.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[Productcontroller::class, 'index'])->middleware('role:super_admin|resseler')->name('index');
    route::post('store',[Productcontroller::class, 'store'])->middleware('role:super_admin|resseler|user')->name('store');
    route::put('edit/{id}',[Productcontroller::class, 'edit'])->middleware('role:super_admin|reseller')->name('edit');
    route::delete('delete/{id}',[Productcontroller::class, 'delete'])->middleware('role:super_admin|reseller')->name('delete');
});

Route::group(['prefix'=>'orders','as'=>'orders.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[OrderController::class, 'index'])->middleware('role:admin|super_admin')->name('index');
    route::post('store',[OrderController::class, 'store'])->name('store')->middleware('role:admin|super_admin|customer|user');
    route::post('detach/{id}',[OrderController::class, 'detach'])->name('detach');
    route::put('edit/{id}',[OrderController::class, 'edit'])->name('edit')->middleware('role:admin|super_admin');
    route::delete('delete/{id}',[OrderController::class, 'delete'])->name('delete')->middleware('role:admin|super_admin');
});
Route::group(['prefix'=>'store','as' => 'store','middleware'=>'auth:sanctum'],function(){
    route::post('/admin', [usercontroller::class, 'admin'])->name('admin');
    route::post('/superadmin',[usercontroller::class, 'super_admin'])->name('super_admin');
}
);

Route::group(['prefix'=>'factors','as'=>'factors.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[FactorController::class, 'index'])->middleware('role:super_admin|user|admin')->name('index');
    route::post('store',[FactorController::class, 'store'])->middleware('role:super_admin|user')->name('store');
    route::put('edit/{id}',[FactorController::class, 'edit'])->middleware('role:super_admin|user')->name('edit');
    route::delete('delete/{id}',[FactorController::class, 'delete'])->middleware('role:super_admin|user')->name('delete');
});
Route::group(['prefix'=>'teams','as'=>'teams.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[TeamController::class, 'index'])->middleware('role:admin|super_admin')->name('index');
    route::post('store',[TeamController::class, 'store'])->middleware('role:admin|super_admin')->name('store');
    route::put('edit/{id}',[TeamController::class, 'edit'])->middleware('role:admin|super_admin')->name('edit');
    route::delete('delete/{id}',[TeamController::class, 'delete'])->middleware('role:admin|super_admin')->name('delete');
});
Route::group(['prefix'=>'resselers','as'=>'resselers.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[ResselerController::class, 'index'])->middleware('role:admin|super_admin')->name('index');
    route::post('store',[ResselerController::class, 'store'])->middleware('role:admin|super_admin')->name('store');
    route::put('edit/{id}',[ResselerController::class, 'edit'])->middleware('role:admin|super_admin')->name('edit');
    route::delete('delete/{id}',[ResselerController::class, 'delete'])->middleware('role:admin|super_admin')->name('delete');
});
Route::group(['prefix'=>'tasks','as'=>'tasks.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[TaskController::class, 'index'])->middleware('role:super_admin')->name('index');
    route::post('store',[TaskController::class, 'store'])->middleware('role:super_admin')->name('store');
    route::put('edit/{id}',[TaskController::class, 'edit'])->middleware('role:super_admin')->name('edit');
    route::delete('delete/{id}',[TaskController::class, 'delete'])->middleware('role:super_admin')->name('delete');
});
Route::group(['prefix'=>'notes','as'=>'notes.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[NoteController::class, 'index'])->middleware('role:admin|super_admin')->name('index');
    route::post('store',[NoteController::class, 'store'])->middleware('role:admin|super_admin')->name('store');
    route::put('edit/{id}',[NoteController::class, 'edit'])->middleware('role:admin|super_admin')->name('edit');
    route::delete('delete/{id}',[NoteController::class, 'delete'])->middleware('role:admin|super_admin')->name('delete');
});
Route::group(['prefix'=>'tickets','as'=>'tickets.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[TicketController::class, 'index'])->middleware('role:super_admin|user')->name('index');
    route::post('store',[TicketController::class, 'store'])->middleware('role:super_admin|user')->name('store');
    route::put('edit/{id}',[TicketController::class, 'edit'])->middleware('role:super_admin|user')->name('edit');
    route::delete('delete/{id}',[TicketController::class, 'delete'])->middleware('role:super_admin|user')->name('delete');
});
Route::group(['prefix'=>'messages','as'=>'messages.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[MessageController::class, 'index'])->middleware('role:admin|super_admin|user')->name('index');
    route::post('store',[MessageController::class, 'store'])->middleware('role:admin|super_admin|user')->name('store');
    route::put('edit/{id}',[MessageController::class, 'edit'])->middleware('role:admin|super_admin|user')->name('edit');
    route::delete('delete/{id}',[MessageController::class, 'delete'])->middleware('role:admin|super_admin|user')->name('delete');
});
Route::group(['prefix'=>'warranties','as'=>'warranties.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[WarrantyController::class, 'index'])->middleware('role:admin|super_admin')->name('index');
    route::post('store',[WarrantyController::class, 'store'])->middleware('role:admin|super_admin|user')->name('store');
    route::put('edit/{id}',[WarrantyController::class, 'edit'])->middleware('role:admin|super_admin')->name('edit');
    route::delete('delete/{id}',[WarrantyController::class, 'delete'])->middleware('role:admin|super_admin')->name('delete');
});
Route::group(['prefix'=>'lables','as'=>'lables.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[LableController::class, 'index'])->middleware('role:admin|super_admin|user')->name('index');
    route::post('store',[LableController::class, 'store'])->middleware('role:super_admin|user')->name('store');
    route::put('edit/{id}',[LableController::class, 'edit'])->middleware('role:super_admin')->name('edit');
    route::delete('delete/{id}',[LableController::class, 'delete'])->middleware('role:super_admin')->name('delete');
});




