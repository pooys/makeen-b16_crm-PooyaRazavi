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
route::group(['prefix'=>'store', 'as'=>'store'] , function(){
    route::post('/admin',[UserController::class , 'admin'])->name('admin');
    route::post('/super_admin',[UserController::class , 'super_admin'])->name('super_admin');
});
//->withoutMiddleware('auth:sanctum')
Route::group(['prefix'=>'users','as'=>'users.','middleware'=>'auth:sanctum'], function(){
    route::get('index/{id?}', [usercontroller::class, 'index'])->middleware('permission:user.index')->name('index');
    route::post('store',[usercontroller::class, 'store'])->middleware('permission:user.create')->name('store');
    route::put('edit/{id}',[usercontroller::class, 'edit'])->name('edit')->middleware('permission:user.edit');
    route::get('userOrders',[usercontroller::class, 'edit'])->name('userOrders');
    route::post('profile/{id}',[usercontroller::class, 'profile'])->name('profile')->middleware('permission:create.profile');
    route::post('/super_admin',[UserController::class , 'super_admin'])->name('super_admin')->withoutMiddleware('auth:sanctum');
    route::post('/admin',[UserController::class , 'admin'])->name('admin')->withoutMiddleware('auth:sanctum');
    route::delete('delete/{id}',[usercontroller::class, 'delete'])->name('delete')->middleware('permisison:delete.user');

});

Route::group(['prefix'=>'products','as'=>'products.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[Productcontroller::class, 'index'])->middleware('permission:products.index')->name('index');
    route::post('store',[Productcontroller::class, 'store'])->middleware('permission:products.create')->name('store');
    route::put('edit/{id}',[Productcontroller::class, 'edit'])->middleware('permission:products.edit')->name('edit');
    route::delete('delete/{id}',[Productcontroller::class, 'delete'])->middleware('permission:products.delete')->name('delete');
});

Route::group(['prefix'=>'orders','as'=>'orders.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[OrderController::class, 'index'])->middleware('permission:orders.index')->name('index');
    route::post('store',[OrderController::class, 'store'])->name('store')->middleware('permission:orders.create');
    route::post('detach/{id}',[OrderController::class, 'detach'])->name('detach');
    route::put('edit/{id}',[OrderController::class, 'edit'])->name('edit')->middleware('permission:orders.edit');
    route::delete('delete/{id}',[OrderController::class, 'delete'])->name('delete')->middleware('permission:orders.delete');
});
//Route::group(['prefix'=>'store','as' => 'store','middleware'=>'auth:sanctum'],function(){
//    route::post('/admin', [usercontroller::class, 'admin'])->name('admin');
//    route::post('/superadmin',[usercontroller::class, 'super_admin'])->name('super_admin');
//}
//);

Route::group(['prefix'=>'factors','as'=>'factors.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[FactorController::class, 'index'])->middleware('permission:factors.index')->name('index');
    route::post('store',[FactorController::class, 'store'])->middleware('permission:factors.create')->name('store');
    route::put('edit/{id}',[FactorController::class, 'edit'])->middleware('permission:factors.edit')->name('edit');
    route::delete('delete/{id}',[FactorController::class, 'delete'])->middleware('permission:factors.delete')->name('delete');
});
Route::group(['prefix'=>'teams','as'=>'teams.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[TeamController::class, 'index'])->middleware('permission:teams.index')->name('index');
    route::post('store',[TeamController::class, 'store'])->middleware('permission:teams.create')->name('store');
    route::put('edit/{id}',[TeamController::class, 'edit'])->middleware('permission:teams.edit')->name('edit');
    route::delete('delete/{id}',[TeamController::class, 'delete'])->middleware('permission:teams.delete')->name('delete');
});
Route::group(['prefix'=>'resselers','as'=>'resselers.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[ResselerController::class, 'index'])->middleware('permission:resselers.index')->name('index');
    route::post('store',[ResselerController::class, 'store'])->middleware('permission:resselers.create')->name('store');
    route::put('edit/{id}',[ResselerController::class, 'edit'])->middleware('permission:resselers.edit')->name('edit');
    route::delete('delete/{id}',[ResselerController::class, 'delete'])->middleware('permission:resselers.delete')->name('delete');
});
Route::group(['prefix'=>'tasks','as'=>'tasks.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[TaskController::class, 'index'])->middleware('permission:tasks.index')->name('index');
    route::post('store',[TaskController::class, 'store'])->middleware('permission:tasks.create')->name('store');
    route::put('edit/{id}',[TaskController::class, 'edit'])->middleware('permission:tasks.edit')->name('edit');
    route::delete('delete/{id}',[TaskController::class, 'delete'])->middleware('permission:tasks.delete')->name('delete');
});
Route::group(['prefix'=>'notes','as'=>'notes.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[NoteController::class, 'index'])->middleware('permission:notes.index')->name('index');
    route::post('store',[NoteController::class, 'store'])->middleware('permission:notes.create')->name('store');
    route::put('edit/{id}',[NoteController::class, 'edit'])->middleware('permission:notes.edit')->name('edit');
    route::delete('delete/{id}',[NoteController::class, 'delete'])->middleware('permission:notes.delete')->name('delete');
});
Route::group(['prefix'=>'tickets','as'=>'tickets.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[TicketController::class, 'index'])->middleware('permission:tickets.index')->name('index');
    route::post('store',[TicketController::class, 'store'])->middleware('permission:tickets.create')->name('store');
    route::put('edit/{id}',[TicketController::class, 'edit'])->middleware('permission:tickets.edit')->name('edit');
    route::delete('delete/{id}',[TicketController::class, 'delete'])->middleware('permission:tickets.delete')->name('delete');
});
Route::group(['prefix'=>'messages','as'=>'messages.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[MessageController::class, 'index'])->middleware('permission:messages.index')->name('index');
    route::post('store',[MessageController::class, 'store'])->middleware('permission:messages.create')->name('store');
    route::put('edit/{id}',[MessageController::class, 'edit'])->middleware('permission:messages.edit')->name('edit');
    route::delete('delete/{id}',[MessageController::class, 'delete'])->middleware('permission:messages.delete')->name('delete');
});
Route::group(['prefix'=>'warranties','as'=>'warranties.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[WarrantyController::class, 'index'])->middleware('permission:warrantys.index')->name('index');
    route::post('store',[WarrantyController::class, 'store'])->middleware('permission:warrantys.create')->name('store');
    route::put('edit/{id}',[WarrantyController::class, 'edit'])->middleware('permission:warrantys.edit')->name('edit');
    route::delete('delete/{id}',[WarrantyController::class, 'delete'])->middleware('permission:warrantys.delete')->name('delete');
});
Route::group(['prefix'=>'resellers','as'=>'resselers.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[ResselerController::class, 'index'])->middleware('permission:resellers.index')->name('index');
    route::post('store',[ResselerController::class, 'store'])->middleware('permission:resellers.create')->name('store');
    route::put('edit/{id}',[ResselerController::class, 'edit'])->middleware('permission:resellers.edit')->name('edit');
    route::delete('delete/{id}',[ResselerController::class, 'delete'])->middleware('permission:resellers.delete')->name('delete');
});
Route::group(['prefix'=>'lables','as'=>'lables.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[LableController::class, 'index'])->middleware('permission:lables.index')->name('index');
    route::post('store',[LableController::class, 'store'])->middleware('permission:lables.create')->name('store');
    route::put('edit/{id}',[LableController::class, 'edit'])->middleware('permission:lables.edit')->name('edit');
    route::delete('delete/{id}',[LableController::class, 'delete'])->middleware('permission:lables.delete')->name('delete');
});
Route::group(['prefix'=>'files','as'=>'files.','middleware'=>'auth:sanctum'],function(){
    route::get('index/{id?}',[\App\Http\Controllers\FileController::class, 'index'])->middleware('permission:medias.index')->name('index');
    route::post('create/{id}',[\App\Http\Controllers\FileController::class, 'create'])->name('create');
    route::get('download',[\App\Http\Controllers\FileController::class, 'download'])->name('download');
    route::post('profile/{id}',[\App\Http\Controllers\FileController::class, 'profile'])->name('profile');
    route::put('edit/{id}',[\App\Http\Controllers\FileController::class, 'edit'])->middleware('permission:medias.edit')->name('edit');
    route::delete('delete/{id}',[\App\Http\Controllers\FileController::class, 'delete'])->name('delete');
});

Route::get('test',function(){
    \App\Jobs\newProduct::class::dispatch();
});



