<?php

use App\Http\Controllers\categorisController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\postController;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\user\usercontroller;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
//users routs
Route::get('/users/create', function () {
    return view('users.create');
});



Route::get('/users/create', [usercontroller::class,'createGet'])->name('users.createGet');
Route::get('/users/edit{id}', [usercontroller::class,'editGet'])->name('users.editGet');
Route::get('/users/index', [usercontroller::class, 'index'])->name('users.index');

Route::post('/users/create', [usercontroller::class, 'createPost'])->name('users.createPost');
Route::post('/users/edit/{id}', [usercontroller::class,'editPost'])->name('users.editPost');
Route::delete('/users/delete/{id}', [usercontroller::class, 'delete'])->name('users.delete');


//product routs
Route::get('products/create',[Productcontroller::class, 'createGet'])->name('products.createGet');
Route::get('products/edit/{id}',[Productcontroller::class, 'editGet'])->name('products.editGet');
Route::get('products/list',[Productcontroller::class, 'list'])->name('products.list');

Route::post('/products/create',[Productcontroller::class, 'createPost'])->name('products.createPost');
Route::post('/products/edit/{id}',[Productcontroller::class, 'editPost'])->name('products.editPost');
Route::delete('products/delete/{id}',[Productcontroller::class, 'delete'])->name('delete');


//order
Route::get('/orders/create',[OrderController::class, 'createGet'])->name('orders.createGet');
Route::get('/ordes/edit/{id}', [OrderController::class, 'editGet'])->name('orders.editGet');

Route::get('/orders/index/', [OrderController::class,'index'])->name('orders.index');

Route::post('/orders/create', [OrderController::class,'createPost'])->name('orders.createPost');
Route::post('/orders/edit/{id}', [OrderController::class,'editPost'])->name('orders.editPost');
Route::delete('/orders/delete/{id}', [OrderController::class,'delete'])->name(('orders.delete'));








////
Route::get('/posts/create', [postController::class,'createGet'])->name('posts.createGet');
Route::get('/posts/edit/{id}',[postController::class,'editGet'])->name('posts.editGet');
Route::get('/posts/index', [postController::class,'index'])->name('posts.index');


Route::post('/posts/create', [postController::class,'createPost'])->name('posts.createPost');
Route::post('/posts/edit/{id}', [postController::class,'editPost'])->name('posts.editPost');
Route::delete('/posts/delete/{id}', [postController::class,'delete'])->name('posts.delete');


Route::get('/categoris/create',[categorisController::class,'createGet'])->name('categoris.creatGet');


Route::post('/categoris/create', [categorisController::class,'createPost'])->name('categoris.createPost');


