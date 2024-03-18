<?php

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
//product routs
Route::get('products/create', function () {
    return view('products.create');
});

Route::get('products/edit/{id}', function ($id) {
    $product = DB::table('products')->where('id', $id)->first();
    return view('products.edit', ['product' => $product]);
});

Route::get('products/list', function () {
    $products = DB::table('products')->get();
    return view('products.list',["products"=>$products]);
});

//products post route
Route::post('/products/create', function (Request $request) {

    $validated = $request->validate([
        'name_product' => 'required',
        'brand' => 'required',

    ],[
            'name_products.required'=>'لطفا اسم سفارش را وارد کنید',
            'brand.required'=>'لطفا اسم برند را وارد کنید',
    ]);
    DB::table('products')->insert([
        "name_product" => $request->name_product,
        "brand" => $request->brand,
        "model" => $request->model,
        "price" => $request->price,
    ]);

    return "Product added successfully";

});


Route::post('/products/edit/{id}', function (Request $request, $id) {
    DB::table('products')->where('id', $id)->update([
        "name_product" => $request->name_product,
        "brand" => $request->brand,
        "model" => $request->model,
        "price" => $request->price,
    ]);

});


Route::delete('products/delete/{id}', function ($id){

    DB::table('products')->where('id', $id)->delete();
    return redirect('/products/list');
});


//order
Route::get('/orders/create', function () {
    return view('orders.create');
});
Route::get('/ordes/edit/{id}', function ($id) {
    $order = DB::table('orders')->where('id', $id)->first();
    return view('orders.edit',['order' =>  $order]);
});

Route::get('/orders/index/', function () {
    $orders = DB::table('orders')->get();
    return view('orders.index', ["orders" =>  $orders]);
});

Route::post('/orders/create', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required',
        'brand' => 'required',

    ],[
            'name.required'=>'لطفا اسم سفارش را وارد کنید',
            'brand.required'=>'لطفا اسم برند را وارد کنید',
    ]);

        DB::table('orders')->insert([
            "name" => $request->name,
            "brand" => $request->brand,
            "model" => $request->model,
            "price" => $request->price,
        ]);
        return "orders added successfully";
});
Route::post('/orders/edit/{id}', function (Request $request , $id) {
    DB::table('orders')->where('id', $id)->update([
        "name" => $request->name,
        "brand" => $request->brand,
        "model" => $request->model,
        "price" => $request->price,
    ]);
    return "orders added successfully";
});
Route::delete('/orders/delete/{id}', function ($id) {

    DB::table('orders')->where('id', $id)->delete();

    return redirect('/orders/index');
});






Route::get('/users/create', function () {
    return view('users.create');
});
Route::get('/users/edit{id}', function ($id) {
    $user = DB::table('users')->where('id', $id)->first();
    return view('users.edit', ['user' => $user]);
});
Route::get('/users/index', function () {
   $users = DB::table('users')->get();
   return view('users.index',["users" => $users]);

});









Route::post('/users/create', function (Request $request ) {

    $validated = $request->validate([
        'name' => 'required',

    ],[
            'name.required'=>'لطفا اسم خود را وارد کنید',
    ]);
        DB::table('users')->insert([
            "name" => $request->name,
            "codemeli" => $request->codemeli,
            "mobile" => $request->mobile,
            "tarikht_tavalod" => $request->tarikht_tavalod,
            "sex" => $request->sex,
            // "email" => $request->email,
            "password" => $request->password,
        ]);

        return "product added";
});
Route::post('/users/edit/{id}', function (Request $request,$id) {

    DB::table('users')->where('id', $id)->update([
        "name" => $request->name,
        "codemeli" => $request->codemeli,
        "mobile" => $request->mobile,
        "tarikht_tavalod" => $request->tarikht_tavalod,
        "sex" => $request->sex,
        // "email" => $request->email,
        "password" => $request->password,
    ]);
    return "update added";
});
Route::delete('/users/delete/{id}', function ($id) {

    DB::table('users')->where('id', $id)->delete();

    return redirect('/users/index');
});


////
Route::get('/posts/create', function () {
    return view('posts.create');
});
Route::get('/posts/edit/{id}', function ($id) {
    $post = DB::table('posts')->where('id', $id)->first();
    return view('posts.edit', ['post' => $post]);
});
Route::get('/posts/index', function () {
        $posts = DB::table('posts')->get();
    return view('posts.index', ["posts" => $posts]);
});


Route::post('/posts/create', function (Request $request) {
        DB::table('posts')->insert([
            "name" => $request->name,
            "brand" => $request->brand,
            "cat" => $request->cat,
        ]);
        return "posts added";
});
Route::post('/posts/edit/{id}', function (Request $request,$id) {

    DB::table('posts')->where('id', $id)->update([

        "name" => $request->name,
        "brand" => $request->brand,
        "cat" => $request->cat,
    ]);
    return "posts updated";
});
Route::delete('/posts/delete/{id}', function ($id) {

    DB::table('posts')->where('id', $id)->delete();

    return redirect('/posts/index');
});
