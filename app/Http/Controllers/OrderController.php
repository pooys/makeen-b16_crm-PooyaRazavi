<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function store(Request $request){
        $orders = order::create($request->toArray());
        $request->user()->assignrole('reseller');
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



