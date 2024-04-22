<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // public  function createGet() {
    //     return view('orders.create');
    // }
    // public function editGet($id) {
    //     $order = DB::table('orders')->where('id', $id)->first();
    //     return view('orders.edit',['order' =>  $order]);
    // }
    // public function index() {
    //     $orders = DB::table('orders')->get();
    //     return view('orders.index', ["orders" =>  $orders]);
    // }
    // public function createPost(Request $request) {

    //     $validated = $request->validate([
    //         'name' => 'required',
    //         'brand' => 'required',

    //     ],[
    //             'name.required'=>'لطفا اسم سفارش را وارد کنید',
    //             'brand.required'=>'لطفا اسم برند را وارد کنید',
    //     ]);

    //         DB::table('orders')->insert([
    //             "name" => $request->name,
    //             "brand" => $request->brand,
    //             "model" => $request->model,
    //             "price" => $request->price,
    //         ]);
    //         return redirect(route('orders.index'));
    // }
    // public function editPost(Request $request , $id) {
    //     DB::table('orders')->where('id', $id)->update([
    //         "name" => $request->name,
    //         "brand" => $request->brand,
    //         "model" => $request->model,
    //         "price" => $request->price,
    //     ]);
    //     return redirect(route('orders.index'));
    // }
    // public function delete($id) {

    //     DB::table('orders')->where('id', $id)->delete();

    //     return redirect('/orders/index');
    // }
    public function store(Request $request){
        $orders = order::create($request->toArray());
        $orders->products()->attach($request->product_id);
        return response()->json($orders);

    }


public function index($id = null) {
    if($id){
            $orders = order::where('id', $id)->first();
    }
    else{
        $orders= order::with('user')->get();
    }

   return response()->json($orders);

 }

public function edit(Request $request, $id){
    $orders = order::where('id', $id)->update($request->toArray());
    return response()->json($orders);
}
    public function delete($id){
    $orders= order::where('id', $id)->delete();
    return response()->json($orders);
}
public function detach (Request $request, $id){
    $order = order::find($id);
    $order->products()->detach($request->products_id);
    return response()->json($order);
}
}



