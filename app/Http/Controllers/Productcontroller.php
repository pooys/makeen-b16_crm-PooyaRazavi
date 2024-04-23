<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use CreateProductsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Productcontroller extends Controller
{


// public function createGet() {
//     return view('products.create');
// }
// public function editGet($id) {
//     $product = DB::table('products')->where('id', $id)->first();
//     return view('products.edit', ['product' => $product]);
// }

// public  function createPost(Request $request) {

//     $validated = $request->validate([
//         'name_product' => 'required',
//         'brand' => 'required',

//     ],[
//             'name_products.required'=>'لطفا اسم سفارش را وارد کنید',
//             'brand.required'=>'لطفا اسم برند را وارد کنید',
//     ]);
//     DB::table('products')->insert([
//         "name_product" => $request->name_product,
//         "brand" => $request->brand,
//         "model" => $request->model,
//         "price" => $request->price,
//     ]);

//     return redirect(route('products.list'));

// }

// public function editPost(Request $request, $id) {
//     DB::table('products')->where('id', $id)->update([
//         "name_product" => $request->name_product,
//         "brand" => $request->brand,
//         "model" => $request->model,
//         "price" => $request->price,
//     ]);
//     return redirect(route('products.list'));

// }
// public function delete($id){

//     DB::table('products')->where('id', $id)->delete();
//     return redirect('/products/list');

// }
// public function list() {
//     $products = DB::table('products')->get();
//     return view('products.list',["products"=>$products]);
// }
public function store(CreateProductRequest $request){
    $product = DB::table('products')->insert($request->toArray());
    $request->user()->assignrole('reseller');
    $product->lables()->attach($request->lable_id);
    return response()->json($product,201);

}


public function index($id = null) {
if($id){
        $products = DB::table('products')->where('id', $id)->first();
}
else{
    $products = DB::table('products')->get();
}

return response()->json($products);

}


public function edit(Request $request, $id){
    $product = DB::table('products')->where('id', $id)->update($request->toArray());
    return response()->json(($product));
}
public function delete($id){
$product = DB::table('products')->where('id', $id)->delete();
return response()->json($product);
}
}





